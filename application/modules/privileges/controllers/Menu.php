<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Navigation Controller
 * Created by Syahril Hermana
 */

class Menu extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->template->title = 'Modules';

        $data = array();
        $this->template->content->view('menu/index', $data);

        $this->template->publish();
    }

    public function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Generals', 'model');
        $list = $this->model->get_list_parent($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->label;
            $row[] = $object->link;
            $row[] = 'As Parent';
            $row[] = '<a href="'.base_url("privileges/menu/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->id.');"><i class="fa fa-trash"></i> Delete</button>';

            $data[] = $row;

            $childs = $this->model->get_list_childs("parent", $object->id);
            foreach ($childs as $child) {
                $row2 = array();
                $row2[] = '';
                $row2[] = $child->label;
                $row2[] = $child->link;
                $row2[] = $object->label;
                $row2[] = '<a href="'.base_url("privileges/menu/form/").$child->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$child->id.');"><i class="fa fa-trash"></i> Delete</button>';

                $data[] = $row2;
            }
        }

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $this->model->count_all_parent(),
            "recordsFiltered" => $this->model->count_filtered(),
            "data" => $data,
        );

        if ($this->input->is_ajax_request())
            echo json_encode($output);
    }

    public function form($key=false)
    {
        $this->load->model('Generals', 'model');
        if($key) {
            $this->template->title = 'Navigation Update';

            $data = array(
                "object" => $this->model->get($key),
                "parents" => $this->model->get_list_parent()
            );
            $this->template->content->view('menu/form', $data);
        }
        else {
            $this->template->title = 'Create New Navigation';

            $data = array(
                "parents" => $this->model->get_list_parent()
            );
            $this->template->content->view('menu/form', $data);
        }

        $this->template->publish();
    }

    public function save()
    {
        $this->form_validation->set_rules('label', 'Navigation Label is required', 'required');
        $this->form_validation->set_rules('link', 'Navigation Link is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('Generals', 'model');
            $key = $this->input->post('id');
            $result = false;
            $object = array(
                'label' => $this->input->post('label'),
                'link' => $this->input->post('link'),
                'icon' => $this->input->post('icon')
            );

            if(strlen($this->input->post('parent')) > 0) {
                $object['parent'] = $this->input->post('parent');
            }

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

            redirect('privileges/menu');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('privileges/menu');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $key = $this->input->post('id');

            $this->load->model("Navigations", "model");
            $this->model->delete($key);

            return true;
        }
        else {
            return false;
        }
    }
}