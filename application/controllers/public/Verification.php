<?php
Class Verification extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->library('zipopen');
        $this->load->library('rsa/rsa_key');
    }

    public function index()
    {
        $this->template->load('template_landing','public/verification_page');
    }

    public function verified()
    {
        $post = $this->input->post();

        $this->form_rules_required($post);
        if($this->form_validation->run() != False){
            if($_FILES['file_zip']['name'] != ''){

                // Upload File
                $path = './upload/zip_verification';
                $file = $this->file_upload($path, 'file_zip', 'zip|rar');

                // Make folder for Extraction
                $extpath = './extract/'.substr($file['file_name'], 0, -4);
                $old = umask(0);
                mkdir($extpath, 0777);
                umask($old);

                // Extract the file to
                if($zipdata = $this->zipopen->extract_to($path.'/'.$file['file_name'], $extpath)) {
                    foreach($zipdata as $z){
                        if(mime_content_type($extpath.'/'.$z) == 'text/plain') {
                            $MD_sign = $this->rsa_key->decrypt(file_get_contents($extpath.'/'.$z), $post['private_key']);
                        } else {
                            $MD_file = hash_file('sha256', $extpath.'/'.$z);
                        };
                    }   

                    if($MD_file === $MD_sign){
                        $this->session->set_flashdata('notif', 'true'); } 
                    else {
                        $this->session->set_flashdata('notif', 'false'); } 

                    $this->delete_directory($extpath);
                    redirect('public/verification');

                } else {

                    $this->delete_directory($extpath);

                    $this->session->set_flashdata('mark', 'File Zip Tidak Memenuhi Kriteria'); 
                    redirect('public/verification');
                };
            } else {$this->session->set_flashdata('mark', 'File belum di upload'); redirect('public/verification');} 
        } else {$this->session->set_flashdata('mark', 'Kunci Privat tidak boleh kosong'); redirect('public/verification');}
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