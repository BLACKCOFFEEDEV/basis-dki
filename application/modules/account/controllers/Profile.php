<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Groups Controller
 * Created by Syahril Hermana
 */

class Profile extends MY_Controller
{
    var $employee = false;
    var $member = false;

    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->load->model('Account', 'account');

        $user = $this->aauth->get_user();
        $account = $this->account->get_account($user->id);

        $this->template->title = 'Profile';

        $data = array(
            'account' => $account
        );
        $this->template->content->view('profile/index', $data);

        $this->template->publish();
    }

    public function image($key = FALSE)
    {
        $this->load->model('Account', 'account');

        if(!$key) {
            $user = $this->aauth->get_user();
            $account = $this->account->get_account("user_id", $user->id);
        } else {
            $account = $this->account->get_account("user_id", $key);
        }

        header('Content-Type: image/jpeg');
        readfile(base_url('assets/uploads/profile/' . $account->image), true);
    }

    public function update()
    {
        $this->load->model('Account', 'model');
        $user = $this->aauth->get_user();
        $account = $this->model->get_account($user->id);

        $result = false;
        $object = array();

        if(strlen($_FILES['image']['name']) > 0) {
            $this->load->library('upload');
            $file_name = md5($user->id);

            $config['upload_path'] = './assets/uploads/profile/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $file_name;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                $upload = $this->upload->data();
                $object['image'] = $upload['file_name'];
            }else{
                $this->session->set_flashdata('error', 'Upload failed, please try again.');
                $this->session->keep_flashdata('error');
            }
        }

        if(strlen($this->input->post('phone')) > 0) {
            $object['phone'] = $this->input->post('phone');
        }

        if(strlen($this->input->post('address')) > 0) {
            $object['address'] = $this->input->post('address');
        }

        $result = $this->model->save($object, $account->id);

        if($result) {
            $this->session->set_flashdata('success', 'Data has been saved.');
            $this->session->keep_flashdata('success');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
        }

        redirect('account/profile');
    }
}