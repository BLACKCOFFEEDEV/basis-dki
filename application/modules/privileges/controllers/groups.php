<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Groups Controller
 * Created by Syahril Hermana
 */

class Groups extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->template->title = 'Groups';

        $data = array();
        $this->template->content->view('groups/index', $data);

        $this->template->publish();
    }

    public function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Group', 'model');
        $list = $this->model->get_list($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->name;
            $row[] = $object->definition;
            $row[] = '<a href="'.base_url("privileges/groups/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->id.');"><i class="fa fa-trash"></i> Delete</button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->model->count_all(),
            "recordsFiltered" => $this->model->count_filtered(),
            "data" => $data,
        );

        if ($this->input->is_ajax_request())
            echo json_encode($output);
    }

    public function form($key=false)
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

    public function save()
    {
        $this->form_validation->set_rules('name', 'Group Name is required', 'required');
        $this->form_validation->set_rules('definition', 'Group Definition is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('Group', 'model');
            $key = $this->input->post('id');
            $result = false;
            $object = array(
                'name' => $this->input->post('name'),
                'definition' => $this->input->post('definition')
            );

            if($key != null || $key != '') {
                $result = $this->model->save($object, $key);
            }
            else {
                $result = $this->model->save($object);
            }

            if($result) {
                $this->session->set_flashdata('success', 'Data has been saved.');
                $this->session->keep_flashdata('success');
            }
            else {
                $this->session->set_flashdata('error', 'Data not saved, please try again.');
                $this->session->keep_flashdata('error');
            }

            redirect('privileges/groups');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('privileges/groups');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $key = $this->input->post('id');

            $this->load->model("Group", "model");
            $this->model->delete($key);

            return true;
        }
        else {
            return false;
        }
    }
}