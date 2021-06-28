<?php
Class Verification extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user');
        $this->load->model('m_sign');
        $this->load->library('rsa/rsa_key');
    }

    public function index()
    {
        $data['signer'] = $this->m_user->get_all_signer()->result_array();

        $this->template->load('template_landing','public/verification_page', $data);
    }   

    public function notification_verified()
    {
        $this->template->load('template_landing', 'public/notification_verif_page');
    }

    public function verified()
    {
        if($_FILES['fileTrans']['name'] != ''){
            $path = './upload/sign_verification';
            $file = $this->file_upload($path, 'fileTrans', 'pdf');

            $verificateSign = $path.'/'.$file['file_name'];
            $pdfText = $this->parserPDF($verificateSign, 'V');
            if(isset(explode('|', $pdfText['sign'])[1])){
                $cipher = explode('|', $pdfText['sign'])[1];
            
                $privatKey = explode('|', $pdfText['sign'])[3];
    
                $fileMD = hash('sha256', $pdfText['file']);
                $signMD = $this->rsa_key->decrypt($cipher, $privatKey);
                
                if($fileMD === $signMD){
                    $this->session->set_flashdata('success', 'Hash File : '.$fileMD.' <br> Hash Signature : '.$signMD); redirect('public/verification/notification_verified');
                } else {  $this->session->set_flashdata('fail', 'Hash File : '.$fileMD.' <br> Hash Signature : '.$signMD); redirect('public/verification/notification_verified'); };
            } else {$this->session->set_flashdata('message', 'Format File Transkrip Berbeda atau belum ditanda tanganin'); redirect($_SERVER['HTTP_REFERER']); }
        } else { $this->session->set_flashdata('message', 'Tidak Mengupload File'); redirect($_SERVER['HTTP_REFERER']); }
    }

    public function qrcode_verified($id)
    {
        $row = $this->m_sign->check_sign($id);

        if($row->num_rows() < 1){
            $this->session->set_flashdata('fail', 'fail'); 
            $this->template->load('template_landing','public/qrcode_verification_page', array('detail' => $row->row_array()));
        } else {
            $this->session->set_flashdata('succ', 'succ'); 
            $this->template->load('template_landing','public/qrcode_verification_page', array('detail' => $row->row_array()));
        }
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