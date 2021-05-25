<?php
Class Setting extends MY_Controller{

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('m_user'); 
        $this->load->model('m_key'); 
        $this->load->library('rsa/rsa_key');
    }

    public function index()
    {
        $data['account'] = $this->m_user->get_user_detail($this->session->userdata('id_user'))->row_array(); 
        $this->template->load('template_admin','user/form_acc_setting', $data);
    }

    public function key()
    {
        $data['key'] = $this->m_user->get_user_key($this->session->userdata('id_user'))->row_array();
        $this->template->load('template_admin','user/form_key_setting', $data);
    }

    public function update_account()
    {
        $post = $this->input->post();
        $id_user = $this->session->userdata('id_user');

        $this->form_validation->set_rules('username', 'username', 'required|min_length[8]');
        $this->form_validation->set_rules('pass', 'password', 'min_length[8]');

        if($this->form_validation->run() != False){
            // Check if username already had 
            if($this->m_user->validate($post['username'], $id_user) == null){

                $data_db = array(
                    'username' => $post['username'],
                );
                
                if($_FILES['fp_images']['name'] != null){
                    $path = './upload/foto_profil_user';
                    $file = $this->file_upload($path, 'fp_images');
                    $data_db['picture_profile'] = $file['file_name'];
                } 
                
                if($post['pass'] != ''){
                    $hashPass = password_hash($post['pass'],PASSWORD_DEFAULT);
                    $data_db['password'] = $hashPass;
                }

                if($ck = $this->m_user->update('tbl_user',array('id_user' => $id_user), $data_db)){
                    $this->session->set_flashdata('msg', 'scs');
                    redirect('user/setting');
                } else {$this->debug($ck);}
            }
            else {
                $this->session->set_flashdata('fail', 'Username telah digunakan');
                redirect('user/setting');
            }
        } else {
            $this->index();
        }
    }

    public function update_default_key(){

        $post = $this->input->post();

        $this->form_rules_required($post);
        if($this->form_validation->run() != False){

            $key = $this->rsa_key->generate($post['number1'], $post['number2']);
            $dataKey = array('public_key' => $key['public'], 'private_key' => $key['private']);
            $idKey = $this->m_key->insert($dataKey);

            if($ck = $this->m_user->update('tbl_user', array('id_user' => $this->session->userdata('id_user')), array('default_key' => $idKey))){
                $this->session->set_flashdata('msg', 'scs');
                redirect('user/setting/key');
            } else { $this->debug($ck); }
        } else { $this->key(); }
    }

}
?>