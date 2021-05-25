
<?php
Class User extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_key');
        $this->load->model('m_user');
        $this->load->library('rsa/rsa_key');
    }

    // User
    public function index()
    {
        $data['data'] = $this->m_user->get_all()->result_array();
        
        $this->template->load('template_admin','admin/management_user', $data);
    }

    public function add_user()
    {
        // Inisialisasi
        $data['action'] = 'admin/user/insert_user';
        $data['data'] = array(
            'id_user' => 0,
            'username' => '',
            'user_level' => '',
        );

        $this->template->load('template_admin','admin/form_user', $data);
    }

    public function insert_user()
    {
        $post = $this->input->post();
        $validate = \array_diff_key($post, ['id_user' => 0, 'level' => '0']);

        $this->form_rules_required($validate, 'trim|required|min_length[8]');
        if($this->form_validation->run() != False){
            // Check if username already had 
            if($this->m_user->validate($post['username']) == null){

                $hashPass = password_hash($post['pass'],PASSWORD_DEFAULT);

                if($_FILES['fp_images']['name'] != null){
                    $path = './upload/foto_profil_user';
                    $file = $this->file_upload($path, 'fp_images');
                } 

                $data_db = array(
                    'username' => $post['username'],
                    'password' => $hashPass,
                    'user_level' => $post['level'],
                    'picture_profile' => isset($file) ? $file['file_name'] : '',
                    'default_key' => $this->make_default_key()
                );

                if($ck = $this->m_user->insert('tbl_user', $data_db)){
                    $this->session->set_flashdata('msg', 'scs');
                    redirect('admin/user');
                } else {$this->debug($ck);}
            }
            else {
                $this->session->set_flashdata('fail', 'Username telah digunakan');
                // redirect('admin/user/add_user');
            }
        } else {
            $this->add_user();
        }
    }

    public function delete_user($id)
    {
        if($ck = $this->m_user->delete('tbl_user', array('id_user' => $id))){
            $this->session->set_flashdata('msg', 'scs');
            redirect('admin/user');
        } else {$this->debug($ck);}
    }

    public function edit_user($id)
    {
        $data['data'] = $this->m_user->get_user_detail($id)->row_array();
        $data['action'] = 'admin/user/update_user';
        // $this->debug($data);
        $this->template->load('template_admin','admin/form_user', $data);
    }

    public function update_user()
    {
        $post = $this->input->post();
        $validate = \array_diff_key($post, ['level' => '0', 'pass' => '0', 'id_user' => '0']);

        $this->form_rules_required($validate, 'trim|required|min_length[8]');
        if($this->form_validation->run() != False){
            // Check if username already had 
            if($this->m_user->validate($post['username'], $post['id_user']) == null){
                
                $data_db = array(
                    'username' => $post['username'],
                    'user_level' => $post['level'],
                    'picture_profile' => '',
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

                if($ck = $this->m_user->update('tbl_user',array('id_user' => $post['id_user']), $data_db)){
                    $this->session->set_flashdata('msg', 'scs');
                    redirect('admin/user');
                } else {$this->debug($ck);}
            }
            else {
                $this->session->set_flashdata('fail', 'Username telah digunakan');
                redirect('admin/user/edit_user/'.$post['id_user']);
            }
        } else {
            $this->edit_user($post['id_user']);
        }
    }

    function make_default_key(){
        $key = $this->rsa_key->generate(rand(1000, 2000), rand(1000,2000));
        $dataKey = array('public_key' => $key['public'], 'private_key' => $key['private']);

        return $this->m_key->insert($dataKey);
    }

}
