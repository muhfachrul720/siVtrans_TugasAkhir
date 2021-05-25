<?php
Class Sign extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user'); 
        $this->load->model('m_key');
        $this->load->model('m_sign');
        $this->load->library('rsa/rsa_key');
        $this->load->library('zip');
    }

    public function index()
    {   
        $data['key'] = $this->m_user->get_user_key($this->session->userdata('id_user'))->row_array();
        $this->template->load('template_admin','user/form_sign', $data);
    }

    public function generate()
    {
        $post = $this->input->post();
        $validate = \array_diff_key($post, ['key' => 0]);

        $this->form_rules_required($post);
        if($this->form_validation->run() != FALSE){
            if($_FILES['file_original']['name'] != ''){

                $path = './upload/sign_file/original_file';
                $file = $this->file_upload($path, 'file_original');
                
                $idKey = $post['key'];
                if(strpos($post['key'], ',')){
                    $newKey = explode(',', $post['key']);
                    $idKey = $this->m_key->insert(
                        array('public_key' => $newKey[0], 'private_key' => $newKey[1])
                    );
                }
                
                $encrypt = $this->rsa_key->encrypt(hash_file('sha256', './upload/sign_file/original_file/'.$file['file_name']), $post['public_key']);

                $signName = $this->create_zip_file($_FILES['file_original']['name'], $file['file_name'], $encrypt);

                $dataSign = array(
                    'date_sign' => strtotime(date('Y-m-d')),
                    'target_email' => $post['target_email'],
                    'signature_name' => $signName,
                    'original_name' => $file['file_name'],
                    'id_user' => $this->session->userdata('id_user'),
                    'id_key' => $idKey,
                );

                if($ck = $this->m_sign->insert($dataSign)) {
                    $this->session->set_flashdata('msg', 'Scs'); 
                    redirect('user/log');
                } else {$this->debug($ck);};
            } else {$this->session->set_flashdata('mark', 'Anda Belum Mengupload File'); redirect('user/sign');}
        } else {$this->index();}
    }

    public function ajax_key()
    {
        $post = $this->input->post();
        $key = $this->rsa_key->generate($post['Postnumber'][0], $post['Postnumber'][1]);

        echo json_encode($key);
        
    }

    public function create_zip_file($filename, $originalfile, $content)
    {
        $pathFile1 = './upload/sign_file/original_file/'.$originalfile;
        $pathFile2 = './upload/sign_file/signature_file/DS_'.substr($filename, 0, -4).'.txt';

        // Make txt file
        if(! write_file($pathFile2 ,$content)){
            echo 'Failed To Create'; 
        } else {echo 'Success';}

        // Make zip File
        $this->zip->read_file($pathFile1);
        $this->zip->read_file($pathFile2);

        $zipName = 'DS_'.substr($filename, 0, -3).'zip';

        $this->zip->archive(FCPATH.'/upload/sign_file/zip_file/'.$zipName);

        return $zipName;

    }

}
?>