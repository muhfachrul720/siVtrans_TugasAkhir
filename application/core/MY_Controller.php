<?php

    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function form_rules_required($data, $required = 'required')
        {
            foreach($data as $key => $value){
                $this->form_validation->set_rules($key, strtoupper($key), $required);
            }
        }

        public function file_upload($path, $name, $type = 'gif|jpg|jpeg|png|docx')
        {
            $config['upload_path']          = $path;
            $config['allowed_types']        = $type;
            $config['overwrite']			= true;
            $config['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $config);
    
            if($bool = $this->upload->do_upload($name)){
                return $this->upload->data();
            }else {
                echo $this->upload->display_errors();
                die;
            }
        }

        function debug($params)
        {
            if(is_array($params) == true){
                echo '<pre>';
                    print_r($params);
                echo '</pre>';
            } else {
                var_dump($params);
            }
        }
    }

    class User_Controller extends MY_Controller {
        
        public function __construct()
        {
            // checkuser();
            parent::__construct();
        }

        function checkuser()
        {
            
        }

    }


    

?>