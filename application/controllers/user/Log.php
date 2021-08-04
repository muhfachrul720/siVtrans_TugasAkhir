<?php
Class Log extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_sign');
    }

    public function index()
    {
        $data['log'] = $this->m_sign->get_all_sign($this->session->userdata('id_user'))->result_array();

        // $this->debug($data);
        // die;

        $this->template->load('template_admin','user/list_log', $data);
    }

    public function delete_log($id)
    {
        $ck = 0;
        $filepath = $this->m_sign->get_pathfile($id)->row_array();

        if($this->m_sign->delete('tbl_sign', array('id' => $id))){
            if($ck = file_exists($filepath['file_name'])){
                unlink($filepath['file_name']);
                $this->session->set_flashdata('Notif', 'success|Berhasil Menghapus Dokumen'); redirect($_SERVER['HTTP_REFERER']);}
        } else { redirect($_SERVER['HTTP_REFERER']); }
    }

}
?>