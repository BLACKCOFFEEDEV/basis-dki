<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Permissions Controller
 * Created by Syahril Hermana
 */

class Permissions extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->template->title = 'Permissions';

        $data = array();
        $this->template->content->view('permissions/index', $data);

        $this->template->publish();
    }

    public function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Permission', 'model');
        $list = $this->model->get_list_groups($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<b>'.$object->name.'</b>';
            $row[] = '';
            $row[] = '<a href="'.base_url("privileges/permissions/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-key"></i> Add Permission</a>';

            $data[] = $row;

            $navigations = $this->model->get_list_navigation($object->id);
            foreach ($navigations as $navigation) {
                $row2 = array();
                $row2[] = '';
                $row2[] = '';
                $row2[] = $navigation->label;
                $row2[] = '<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->id.', '.$navigation->id.');"><i class="fa fa-trash"></i> Delete Permission</button>';

                $data[] = $row2;
            }
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->model->count_groups_all(),
            "recordsFiltered" => $this->model->count_groups_filtered(),
            "data" => $data,
        );

        if ($this->input->is_ajax_request())
            echo json_encode($output);
    }

    public function form($key=false)
    {
        if($key) {
            $this->template->title = 'Permission Update';

            $this->load->model('Permission', 'model');
            $this->load->model('Generals', 'nav');
            $data = array(
                "group" => $key,
                "navigations" => $this->nav->get_list()
            );
            $this->template->content->view('permissions/form', $data);
        }
        else {
            $this->template->title = 'Create New Permission';

            $data = array(
                "navigations" => $this->nav->get_list()
            );
            $this->template->content->view('permissions/form', $data);
        }

        $this->template->publish();
    }

    public function save()
    {
        $this->form_validation->set_rules('group', 'Group is required', 'required');
        $this->form_validation->set_rules('navigation', 'Navigation is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('Permission', 'model');
            $key = $this->input->post('id');
            $result = false;
            $object = array(
                'group_id' => $this->input->post('group'),
                'navigation_id' => $this->input->post('navigation')
            );

            if ($this->model->exists($object['group_id'], $object['navigation_id']) <= 0) {
                if($key != null || $key != '')
                    $result = $this->model->save($object, $key);
                else
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

            redirect('privileges/permissions');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('privileges/permissions');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $group = $this->input->post('group');
            $navigation = $this->input->post('navigation');

            $this->load->model("Permission", "model");
            $this->model->delete($group, $navigation);

            return true;
        }
        else {
            return false;
        }
    }
}