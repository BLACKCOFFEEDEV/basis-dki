<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Groups Controller
 * Created by Syahril Hermana
 */

class Legality extends MY_Controller
{
    function __construct(){
        parent::__construct();

        if (!$this->aauth->is_loggedin())
            redirect('auth/sign-in');
    }

    public function index()
    {
        $this->template->title = 'Legality';

        $data = array();
        $this->template->content->view('legality/index', $data);

        $this->template->publish();
    }

    public function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('surattanah', 'model');
        $list = $this->model->get_list($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->name;
            $row[] = '<a href="'.base_url("masters/legality/form/").$object->id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
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
            $this->template->title = 'Legality Update';

            $this->load->model('surattanah', 'model');
            $data = array(
                "object" => $this->model->get($key)
            );
            $this->template->content->view('legality/form', $data);
        }
        else {
            $this->template->title = 'Create New Legality';

            $data = array();
            $this->template->content->view('legality/form', $data);
        }

        $this->template->publish();
    }

    public function save()
    {
        $this->form_validation->set_rules('name', 'Legality is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('surattanah', 'model');
            $key = $this->input->post('id');
            $result = false;
            $object = array(
                'name' => $this->input->post('name')
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

            redirect('masters/legality');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('masters/legality');
        }
    }

    public function delete()
    {
        if ($this->input->is_ajax_request()) {
            $key = $this->input->post('id');

            $this->load->model("Surattanah", "model");
            $this->model->delete($key);

            return true;
        }
        else {
            return false;
        }
    }
}