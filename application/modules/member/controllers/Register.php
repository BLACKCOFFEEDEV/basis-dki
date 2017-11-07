<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Register Controller
 * Created by Syahril Hermana
 */

class Register extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->template->title = 'Register';

        $data = array();
        $this->template->content->view('register/index', $data);

        $this->template->publish();
    }

    // MEMBERS
    public function get_list_member()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Members', 'model');
        $list = $this->model->get_list_member($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->first_name." ".$object->last_name;
            $row[] = $object->ktp;
            $row[] = $object->address;
            $row[] = $object->phone;
            $row[] = $object->member_until;
            $row[] = '<a href="'.base_url("member/assets/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Add Asset</a>
            <a href="'.base_url("member/register/member/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->id.');"><i class="fa fa-ban"></i> Ban User</button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->model->count_member_all(),
            "recordsFiltered" => $this->model->count_member_filtered(),
            "data" => $data,
        );

        if ($this->input->is_ajax_request())
            echo json_encode($output);
    }

    public function member($key=false)
    {
        $this->load->model('Members', 'model');

        if($key) {
            $this->template->title = 'Member Update';

            $data = array(
                "object" => $this->model->get_member($key),
                "user" => $this->aauth->get_user($this->model->get_member($key)->user_id),
                "list_negara" => $this->model->get_list_country()
            );
            $this->template->content->view('register/member-form-update', $data);
        }
        else {
            $this->template->title = 'Create New Member';

            $data = array(
                "list_negara" => $this->model->get_list_country()
            );
            $this->template->content->view('register/member-form', $data);
        }

        $this->template->publish();
    }

    public function save_member()
    {
        $this->form_validation->set_rules('account-first-name', 'is required', 'required');
        $this->form_validation->set_rules('account-last-name', 'is required', 'required');
        $this->form_validation->set_rules('account-place-of-birth', 'is required', 'required');
        $this->form_validation->set_rules('account-date-of-birth', 'is required', 'required');
        $this->form_validation->set_rules('account-phone', 'is required', 'required');
        $this->form_validation->set_rules('account-district', 'is required', 'required');
        $this->form_validation->set_rules('account-address', 'is required', 'required');
        $this->form_validation->set_rules('member-ktp', 'is required', 'required');
        $this->form_validation->set_rules('member-address', 'is required', 'required');
        $this->form_validation->set_rules('member-until', 'is required', 'required');
        $this->form_validation->set_rules('user-email', 'is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('Members', 'model');
            $key = $this->input->post('id');
            $result = false;

            // create user
            $password = $this->_randomize_token(10);
            $email = $this->input->post('user-email');
            $username = explode("@", $email);
            $username = $username[0];
            $username = preg_replace('/[^A-Za-z0-9]/', '', $username);

            $user = $this->aauth->create_user($email, $password, $username);

            if($user) {
                $date = $this->input->post('account-date-of-birth');
                $date = date('Y-m-d', strtotime(str_replace('/', '-', $date)));

                $account = array(
                    'first_name' => $this->input->post('account-first-name'),
                    'last_name' => $this->input->post('account-last-name'),
                    'place_of_birth' => $this->input->post('account-place-of-birth'),
                    'date_of_birth' => date('Y-m-d', strtotime($date)),
                    'phone' => $this->input->post('account-phone'),
                    'kelurahan_id' => $this->input->post('account-district'),
                    'address' => $this->input->post('account-address'),
                    'user_id' => $user,
                    'created_by' => $this->aauth->get_user()->id,
                    'created_date' => date('Y-m-d')
                );

                $account_id = $this->model->save_account($account);

                $date = $this->input->post('member-until');
                $date = date('Y-m-d', strtotime(str_replace('/', '-', $date)));

                $member = array(
                    'account_id' => $account_id,
                    'ktp' => $this->input->post('member-ktp'),
                    'ktp_address' => $this->input->post('member-address'),
                    'member_until' => date('Y-m-d', strtotime($date)),
                    'member_since' => date('Y-m-d')
                );

                $this->model->save_member($member);
                $result = true;
            }

            if($result) {
                $this->load->library('email');
                $this->email->from('mail.bogcamp@gmail.com', 'no-reply@gmail.com');
                $this->email->to($email);
                $this->email->subject('Registration Basis DKI');
                $messages = 'Hey ' . $this->input->post('account-first-name') . ' ' . $this->input->post('account-last-name') . '<br/>';
                $messages .= 'This your username <b>' . $username . '</b> and password <b>' . $password . '</b>';
                $this->email->message($messages);
                $this->email->send();

                $this->session->set_flashdata('success', 'Data has been saved.');
                $this->session->keep_flashdata('success');
            }
            else {
                $this->session->set_flashdata('error', 'Data not saved, please try again.');
                $this->session->keep_flashdata('error');
            }

            redirect('member/register');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('privileges/groups');
        }
    }


    // EMPLOYEE
    public function get_list_employee()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Members', 'model');
        $list = $this->model->get_list_employee($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->first_name." ".$object->last_name;
            $row[] = $object->nip;
            $row[] = $object->address;
            $row[] = $object->phone;
            $row[] = get_custom_field("master_office", "name", "id", $object->office);
            $row[] = '<a href="'.base_url("privileges/groups/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->id.');"><i class="fa fa-trash"></i> Delete</button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->model->count_member_all(),
            "recordsFiltered" => $this->model->count_member_filtered(),
            "data" => $data,
        );

        if ($this->input->is_ajax_request())
            echo json_encode($output);
    }

    public function employee($key=false)
    {
        if($key) {
            $this->template->title = 'Group Update';

            $this->load->model('Group', 'model');
            $data = array(
                "object" => $this->model->get($key)
            );
            $this->template->content->view('groups/form', $data);
        }
        else {
            $this->template->title = 'Create New Group';

            $data = array();
            $this->template->content->view('groups/form', $data);
        }

        $this->template->publish();
    }



    // PRIVATE METHOD
    private function _generate_unique_pin($token)
    {
        $this->load->model("Members", "model");
        $pin = $token;

        if($this->model->is_unique("pin", $token) > 0)
            $this->_generate_unique_pin($this->_randomize_token(8));

        return $pin;
    }
    private function _randomize_token($length)
    {
        $token = "";
        $string = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $string .= "abcdefghijklmnopqrstuvwxyz";
        $string .= "0123456789";
        $total = strlen($string);

        for($i=0; $i<$length; $i++) {
            $token .= $string[random_int(0, $total-1)];
        }

        return $token;
    }

    // AJAX DEPENDENCY SELECT
    public function province()
    {
        if ($this->input->is_ajax_request()) {
            if(isset($_POST['id'])) {
                $this->load->model("Members", "model");

                $key = $_POST['id'];
                $list = $this->model->get_list_province($key);

                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode($list));
            }
        } else {
            show_404();
        }
    }
    public function city()
    {
        if ($this->input->is_ajax_request()) {
            if(isset($_POST['id'])) {
                $this->load->model("Members", "model");

                $key = $_POST['id'];
                $list = $this->model->get_list_city($key);

                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode($list));
            }
        } else {
            show_404();
        }
    }
    public function state()
    {
        if ($this->input->is_ajax_request()) {
            if(isset($_POST['id'])) {
                $this->load->model("Members", "model");

                $key = $_POST['id'];
                $list = $this->model->get_list_state($key);

                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode($list));
            }
        } else {
            show_404();
        }
    }
    public function district()
    {
        if ($this->input->is_ajax_request()) {
            if(isset($_POST['id'])) {
                $this->load->model("Members", "model");

                $key = $_POST['id'];
                $list = $this->model->get_list_district($key);

                $this->output
                    ->set_content_type("application/json")
                    ->set_output(json_encode($list));
            }
        } else {
            show_404();
        }
    }
}