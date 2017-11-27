<?php
class Assets extends MY_Controller {

    function __construct(){
            parent::__construct();
            if (!$this->aauth->is_loggedin())
                redirect('auth/sign-in');
        }

    public function index(){
            $this->template->title = 'Assets Member';

            $data = array();
            $this->template->content->view('assets/index', $data);

            $this->template->publish();
        }
        
    public function get_list(){
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
                $row[] = '<a href="'.base_url("member/assets/form_update/").$object->assets_id.'" class="btn btn-default btn-sm"><i class="fa fa-edit"></i> Update</a>
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
            $this->load->model('Legal', 'legal');
            $this->load->model('Marked', 'model');
            $account = $this->account->get_account($member);
            $key = $this->uri->segment(4);
            $list_document = $this->legal->showAllDoc($key);
            $list_profince = $this->model->provinsi("DKI Jakarta");
            $list_legality = $this->model->get_list_legality();
            $list_exist = $this->model->get_list_exist_type();
            
            $data = array(
                "list_document" => $list_document,
                "account" => $account,
                "list_province" => $list_profince,
                "list_legality" => $list_legality,
                "list_exist" => $list_exist,
            );
        
            $this->template->content->view('assets/form', $data);
            
            $this->template->publish();
        }
    
    function form_update($key = FALSE){
            $this->load->model('Marked', 'model');
            $this->load->model('Members', 'model');
            if($key){
            
            $this->template->title = 'Update Register';
            
            $list_profince = $this->model->provinsi("DKI Jakarta");
            $list_legality = $this->model->get_list_legality();
            $list_exist = $this->model->get_list_exist_type();
                $object = $this->model->get_marked($key);
            
            $data = array(
                "object" => $object,
                "list_province" => $list_profince,
                "list_legality" => $list_legality,
                "list_exist" => $list_exist,
            );
            $this->template->content->view('assets/form-update', $data);
            
            $this->template->publish();
            } else {
                redirect('member/assets');
            }
        }
    
    public function save($key = false){
        
        $this->form_validation->set_rules('typeExist', 'is required', 'required');
        $this->form_validation->set_rules('district', 'is required', 'required');
        $this->form_validation->set_rules('assetsName', 'is required', 'required');
        $this->form_validation->set_rules('assetsAddress', 'is required', 'required');
        $this->form_validation->set_rules('assetsGeometry', 'is required', 'required');
        $this->form_validation->set_rules('assetsLuas', 'is required', 'required');
        $this->form_validation->set_rules('assetsHarga', 'is required', 'required');

        if($this->form_validation->run() == true) {
            $this->load->model('Marked', 'model');
            $key = $this->input->post('assetsId');
            $result = false;
            $object = array(
                'account_id' => $this->input->post('accountId'),
                'assets_existtype' => $this->input->post('typeExist'),
                'kelurahan' => $this->input->post('district'),
                'assets_name' => $this->input->post('assetsName'),
                'assets_address' => $this->input->post('assetsAddress'),
                'assets_geometry' => $this->input->post('assetsGeometry'),
                'assets_luas' => $this->input->post('assetsLuas'),
                'assets_harga' => $this->input->post('assetsHarga'),
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
            
            redirect('member/register');
        }
        else {
            $this->session->set_flashdata('error', 'Data not saved, please try again.');
            $this->session->keep_flashdata('error');
            redirect('member/register');
        }
    }
    
    public function delete(){
        if ($this->input->is_ajax_request()) {
            $key = $this->input->post('id');

            $this->load->model("Marked", "model");
            $this->model->delete($key);

            return true;
        }
        else {
            return false;
        }
    }
        
    public function showAllDoc($key = false){
        $this->load->model('Legal', 'model');
        if($key){
            $result = $this->model->showAllDoc($key);
            echo json_encode($result);
        }else{
            return false;
        }
    }
    
    public function showUpdateDoc($assets = false){
        $this->load->model('Legal', 'model');
        if($assets){
            $result = $this->model->showUpdateDoc($assets);
            echo json_encode($result);
        }else{
            return false;
        }
        //print_r($key);
    }
    
    public function ajax_add($key = false){
            $this->load->model('Legal', 'model');
            $this->_validate();
            
            $data = array(
                    'account_id' => $this->input->post('memIdDoc'),
                    'legality_id' => $this->input->post('typeIdDoc'),
                    'legal_num' => $this->input->post('numLettDoc'),
                );

            if(!empty($_FILES['userfile']['name']))
            {
                $upload = $this->_do_upload();
                $data['legal_file'] = $upload;
            }
            
            $insert = $this->model->save("assets_legal",$data);   
        
            echo json_encode(array("status" => TRUE));
        
            
    }
    
    public function ajax_submit(){
        $this->load->model('Legal', 'model');
        $data = array();
        $count = count($this->input->post['getDoc']);
        for($i=0; $i < $count; $i++){
            $data[] = array(
                'assets_id' => $this->input->post['getDoc'][$i],
            );
        }
        
        $insert = $this->model->document_update("assets_legal",$data);
        
        echo json_encode(array("status" => TRUE));
        
    }
        
    private function _do_upload(){
            $this->load->helper(array('form', 'url'));
            $this->load->model('Legal', 'model');
            
            $this->config =  array(
                              'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/uploads/document/",
                              'upload_url'      => base_url()."assets/uploads/document/",
                              'allowed_types'   => "jpg|png|jpeg|pdf",
                              'overwrite'       => TRUE,
                              'max_size'        => "10000KB",
                              'max_height'      => "1000",
                              'max_width'       => "1000",
                              'file_name'       => round(microtime(true) * 100),
                            );
            
            $this->load->library('upload', $this->config);

            if(!$this->upload->do_upload('userfile')) //upload and validate
            {
                $data['inputerror'][] = 'userfile';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
            return $this->upload->data('file_name');
        }

    private function _validate(){
            $this->load->model('Legal', 'model');
            
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = TRUE;

            if($this->input->post('memIdDoc') == '')
            {
                $data['inputerror'][] = 'memIdDoc';
                $data['error_string'][] = 'Owner is required';
                $data['status'] = FALSE;
            }

            if($this->input->post('typeIdDoc') == '')
            {
                $data['inputerror'][] = 'typeIdDoc';
                $data['error_string'][] = 'Please select type';
                $data['status'] = FALSE;
            }

            if($this->input->post('numLettDoc') == '')
            {
                $data['inputerror'][] = 'numLettDoc';
                $data['error_string'][] = 'Number is required';
                $data['status'] = FALSE;
            }
            
            if(empty($_FILES['userfile']['name'])) //upload validate
            {
                $data['inputerror'][] = 'userfile';
                $data['error_string'][] = 'File is required';
                $data['status'] = FALSE;
            }
            
            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
        }
        
    public function ajax_delete($id){
            $this->load->model('Legal', 'model');
            //delete file
            $legal = $this->model->get_by_id($id);
            if(file_exists('assets/uploads/document/'.$legal->legal_file) && $legal->legal_file)
                unlink('assets/uploads/document/'.$legal->legal_file);

            $this->model->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
        }
    
}
