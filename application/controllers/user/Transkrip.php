<?php
Class Transkrip extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->template->load('template_admin','user/list_transkrip');
    }

}