<?php
Class Dashboard extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_sign');
    }

    public function index()
    {
        $data['countSign'] = $this->m_sign->get_all_sign($this->session->userdata('id_user'))->num_rows();
        $this->template->load('template_admin','user/page_dashboard', $data);
    }

}
?>