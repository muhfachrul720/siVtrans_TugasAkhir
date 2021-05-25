<?php
Class Level extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user');
    }

    // Level
    public function index()
    {
        $data['data'] = $this->m_user->get_all_lvl()->result_array();
        // $this->debug($data);

        $this->template->load('template_admin','admin/management_level', $data);
    }

    public function add_level()
    {
        // Inisialisasi
        $data['action'] = 'admin/level/insert_level';
        $data['data'] = array(
            'id' => 0,
            'nama' => '',
        );

        $this->template->load('template_admin','admin/form_level', $data);
    }

    public function insert_level()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);
        if($this->form_validation->run() != FALSE){
            $data_db = array(
                'nama' => $post['nama_level'],
                'date_created' => strtotime(date('Y-m-d h:m:s')),
                'date_modificate' => strtotime(date('Y-m-d h:m:s')),
            );

            if($ck = $this->m_user->insert('tbl_user_level', $data_db)){
                $this->session->set_flashdata('msg', 'scs');
                redirect('admin/level');
            } else {$this->debug($ck);}
        } else {
            $this->template->load('template_admin','admin/form_level');
        }
    }

    public function delete_level($id)
    {
        if($ck = $this->m_user->delete('tbl_user_level', array('id' => $id))){
            $this->session->set_flashdata('msg', 'scs');
            redirect('admin/level');
        } else {$this->debug($ck);}
        
    }

    public function edit_level($id)
    {
        // Inisialisasi 
        $data['action'] = 'admin/level/update_level';
        $data['data'] = $this->m_user->get_level_detail($id)->row_array();

        $this->template->load('template_admin','admin/form_level', $data);
    }

    public function update_level()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);
        if($this->form_validation->run() != FALSE){
            $data_db = array(
                'nama' => $post['nama_level'],
                'date_modificate' => strtotime(date('Y-m-d h:m:s')),
            );

            if($ck = $this->m_user->update('tbl_user_level', array('id' => $post['id_level']), $data_db)){
                $this->session->set_flashdata('msg', 'scs');
                redirect('admin/level');
            } else {$this->debug($ck);}
        } else {
            $this->edit_level($post['id_level']);
        }
    }
}
