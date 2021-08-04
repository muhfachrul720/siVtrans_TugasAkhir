<?php
Class Send extends MY_Controller{

    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_sign');
    }

    public function send_whatsapp()
    {
        $post = $this->input->post();
        $dbRes = $this->m_sign->get_sign_info($post['idDoc'])->row_array();

        $url = base_url().''.$dbRes['file_name'];

        if($post['telephone'] != ''){
            $notarget = $post['telephone'];
        } else {$notarget = $dbRes['target_whatsapp'];}

        $this->sendwa($notarget, $url);

        redirect($_SERVER['HTTP_REFERER']);
    }
}