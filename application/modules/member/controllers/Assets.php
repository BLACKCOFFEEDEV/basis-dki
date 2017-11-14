<?php
class Assets extends MY_Controller {

        function __construct(){
            parent::__construct();
            if (!$this->aauth->is_loggedin())
                redirect('auth/sign-in');
        }

        public function index(){
            $this->template->title = 'Register Assets Member';

            $data = array();
            $this->template->content->view('assets/index', $data);

            $this->template->publish();
        }
        
        public function get_list()
    {
        $length = (!empty($_POST['length'])) ? $_POST['length'] : 10;
        $start = (!empty($_POST['start'])) ? $_POST['start'] : 0;
        $draw  = (!empty($_POST['draw'])) ? $_POST['draw'] : 10;

        $this->load->model('Marked', 'model');
        $list = $this->model->get_list_assets($length, $start);

        $data = array();
        $no = $start;
        foreach ($list as $object) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $object->pin;
            $row[] = $object->first_name." ".$object->last_name;
            $row[] = $object->assets_address;
            $row[] = $object->assets_luas;
            $row[] = $object->assets_harga;
            $row[] = '<a href="'.base_url("masters/building/form/").$object->assets_id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
					<button type="button" id="delete" class="btn btn-default btn-sm btn-danger" data-toggle="modal" data-target="#confirmation" onclick="set_value('.$object->assets_id.');"><i class="fa fa-trash"></i> Delete</button>';

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
    
        function form($member = FALSE){
            if(!$member)
                redirect('member/register');
            
            $this->template->title = 'Asstes Register';
            
            $this->load->model('Account', 'account');
            $this->load->model('Marked', 'model');
            $account = $this->account->get_account($member);
            $list_profince = $this->model->provinsi("DKI Jakarta");
            $list_legal = $this->model->get_list_legal();
                        
            $data = array(
                "account" => $account,
                "list_province" => $list_profince,
                "list_legal" => $list_legal
            );
            $this->template->content->view('assets/form', $data);

            $this->template->publish();
        }
    
}
