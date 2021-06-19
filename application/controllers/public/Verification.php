<?php
Class Verification extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user');
        $this->load->library('zipopen');
        $this->load->library('rsa/rsa_key');
    }

    public function index()
    {
        $data['signer'] = $this->m_user->get_all_signer()->result_array();

        $this->template->load('template_landing','public/verification_page', $data);
    }   

    public function verified()
    {
        $post = $this->input->post();

        $this->form_rules_required($post);
        if($this->form_validation->run() != False){
            if($_FILES['fileSign']['name'] != ''){

                $path = './upload/sign_verification';
                $file = $this->file_upload($path, 'fileSign', 'pdf');

                $verificateSign = $path.'/'.$file['file_name'];
                $pdfText = $this->parserPDF($verificateSign, 'V');
                $cipher = explode('|', $pdfText['sign'] )[1];

                $fileMD = hash('sha256', $pdfText['file']);
                $signMD = $this->rsa_key->decrypt($cipher, $post['privatKey']);
                
                if($fileMD === $signMD){echo 'Sama'; } else {echo 'Tidak Sama'; };
            }   
        }
    }

    public function qrcode_verified($id)
    {
        $this->m_
    }

    function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                        unlink($dirname."/".$file);
                else
                        delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

}
?>