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
            $list_legality = $this->model->get_list_legality();
            
            $data = array(
                "account" => $account,
                "list_province" => $list_profince,
                "list_legality" => $list_legality,
            );
            
            
            $this->template->content->view('assets/form', $data);
            
            $this->template->publish();
        }
        
        public function showAllDoc($account = FALSE){
            $this->load->model('Account', 'account');
            $this->load->model('Legal', 'model');
            
            $result = $this->model->showAllDoc($account);
            echo json_encode($result);
        
        }
        
        public function ajax_add()
        {
            $this->load->model('Legal', 'model');
            
            $this->_validate();

            $data = array(
                    'account_id' => $this->input->post('memIdDoc'),
                    'legality_id' => $this->input->post('typeIdDoc'),
                    'legal_num' => $this->input->post('numLettDoc'),
                );

            if(!empty($_FILES['fileLettDoc']['name']))
            {
                $upload = $this->_do_upload();
                $data['legal_file'] = $upload;
            }

            $insert = $this->model->save($data);
            
            echo json_encode(array("status" => TRUE));
        }
        
        private function _do_upload()
        {
            $this->load->model('Legal', 'model');
            
            $config['upload_path']          = 'assets/uploads/document/';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 1000; //set max size allowed in Kilobyte
            $config['max_width']            = 1000; // set max width image allowed
            $config['max_height']           = 1000; // set max height allowed
            $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
            
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('fileLettDoc')) //upload and validate
            {
                $data['inputerror'][] = 'fileLettDoc';
                $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            }
            return $this->upload->data('file_name');
        }

        private function _validate()
        {
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

            if($data['status'] === FALSE)
            {
                echo json_encode($data);
                exit();
            }
        }
        
        public function ajax_delete($id)
        {
            $this->load->model('Legal', 'model');
            //delete file
            $legal = $this->model->get_by_id($id);
            if(file_exists('assets/uploads/document/'.$legal->legal_file) && $legal->legal_file)
                unlink('assets/uploads/document/'.$legal->legal_file);

            $this->model->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
        }

}
