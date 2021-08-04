<?php
Class Mahasiswa extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->template->load('template_admin','user/form_import_mhs');
    }

    public function individual_mhs(){
        $this->template->load('template_admin','user/form_insert_mhs');
    }

    public function angkatan(){
        $this->template->load('template_admin','user/form_angkatan');
    }
}