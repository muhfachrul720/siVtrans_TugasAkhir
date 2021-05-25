<?php
Class Auth extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user');
    }

    public function index()
    {
        $this->template->load('template_landing', 'auth/login_page');
    }

    public function auth()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);

        if($this->form_validation->run()){
            if($sess_data = $this->m_user->validate($post['username'])){
                if(password_verify($post['pass'], $sess_data['password'])){
                    $this->session->set_userdata($sess_data);
                    $this->redirect_page($sess_data['user_level']);
                }
                else {
                    $this->session->set_flashdata('msg', 'fail');
                    redirect($post['access']);
                }
            }
            else {
                $this->session->set_flashdata('msg', 'fail');
                redirect($post['access']);
            }
        }
        else {
            $this->session->set_flashdata('msg', 'fail');
            redirect($post['access']);
        }
    }

    function redirect_page($level)
    {
        switch($level){
            case 1:
                redirect('admin/dashboard');
                break;
            case 2: 
                redirect('user/dashboard');
                break;
        }
    }

    public function log_out()
    {
        session_destroy();
        redirect('welcome');
    }

};