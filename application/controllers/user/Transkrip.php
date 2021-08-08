<?php

use chillerlan\QRCode\{QRCode, QROptions};

Class Transkrip extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_mahasiswa');
        $this->load->model('m_nilai');
        $this->load->model('m_user');
        $this->load->library('rsa/rsa_key');
    }

    public function index(){
        $this->template->load('template_admin','user/list_transkrip');
    }

    public function search()
    {
        $post = $this->input->post();

        $data['result'] = $this->m_mahasiswa->get_trans_byakt($post['angkatanID'])->result_array();

        // $this->debug($data);
        $this->template->load('template_admin','user/list_transkrip', $data);
    }

    public function download_trans($id)
    {
        $filePath = $this->generate_trans($id);
        redirect($filePath);
    }

    public function send_trans()
    {
        $post = $this->input->post();
        $data['info'] = $this->m_mahasiswa->get_mhs_info($post['id'])->row_array();
        $signedPath = "pdffile/signed/DS_Transcript_".str_replace(' ', '_', $data['info']['nama_mhs_info']).'_'.$data['info']['nim_mhs_info'].'.pdf';

        if(file_exists($signedPath)){
            unlink($signedPath);}

        $this->generate_trans($post['id']); 

        $this->sendwa($post['noTargetWhatsapp'], base_url().''.$signedPath);
    }
    
    private function generate_trans($id)
    {
        // Data
        $data['info'] = $this->m_mahasiswa->get_mhs_info($id)->row_array();
        $data['nilai'] = $this->m_nilai->get_nilai_individual($id)->result_array();
        
        // Path
        $originalPath = "pdffile/original/DS_Transcript_".str_replace(' ', '_', $data['info']['nama_mhs_info']).'_'.$data['info']['nim_mhs_info'].'.pdf';
        $signedPath = "pdffile/signed/DS_Transcript_".str_replace(' ', '_', $data['info']['nama_mhs_info']).'_'.$data['info']['nim_mhs_info'].'.pdf';
        $data['qrcode'] = base_url().'public/verification/qrcode_verified/'.$data['info']['id_info_trans'];

        // Pre Process
        if(file_exists($originalPath)){
            unlink($originalPath);}

        // Make PDF Content
        $fileOriginal = $this->print_trans($originalPath, $data);

        // Get PDF Content
        $pdfText = $this->parserPDF($originalPath);

        // Create Message Digest by Hash Content
        $MD = hash('sha256', $pdfText['file']);

        // Get public key 
        $key = $this->m_user->get_user_key($this->session->userdata('id_user'))->row_array();

        // Begin Making Digital Signature by Encrypting Message Digest contain hashed pdf content using Public Key
        $data['sign'] = $this->rsa_key->encrypt($MD, $key['public_key']);

        // Implement the sign to Last page of File 
        $this->print_trans($signedPath, $data, $key['private_key'], 'F');

        return $signedPath;
        // $this->debug($data);
    }

    private function print_trans($path, $data, $prKey = null, $saves = "F") 
    {
        // $this->debug($data['sign']); 
        $html = $this->load->view('admin/print_transcript_ver2', $data, true);

        //First Page
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 16,
            'margin_bottom' => 16,
            'margin_header' => 9,
            'margin_footer' => 9,
        ]);

        $mpdf->AddPage('P'); 
        $mpdf->WriteHTML($html);
        
        if(isset($data['sign'])){

            $signHtml = '<div style="font-size:12px">Generate Digital Signature : <br><br>
            |'.$data['sign'].'| <br><br>
            Signed By : '.$this->session->userdata('username').' <br>
            Privat Key : |'.$prKey.'| <br>
            Created By : Sivtrans.com</div>
            <br><br>
            <img src="'.(new QRCode)->render($data['qrcode']).'" alt="QR Code" />
            ';

            $mpdf->AddPage('P'); 
            $mpdf->WriteHTML($signHtml);

        }

        $mpdf->Output($path, $saves);  

        return $path;
    }


}