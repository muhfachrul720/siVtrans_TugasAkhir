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
        $this->template->load('template_admin','user/list_log', $data);
    }

}
?>