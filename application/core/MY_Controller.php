<?php

    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function form_rules_required($data, $required = 'required|trim')
        {
            foreach($data as $key => $value){
                $this->form_validation->set_rules($key, strtoupper($key), $required);
            }
        }

        public function form_rules_required_multiple($data, $rules = 'required|trim')
        {
            $this->form_validation->set_error_delimiters('<small style="color:red">', '</small>');
            foreach($data as $key => $value){
                if(is_array($data[$key]) == true){
                    foreach($data[$key] as $keyTwo => $val){
                        $this->form_validation->set_rules($key.'['.$keyTwo.']', 'Form Harus Diisi Dan Tidak Boleh Kosong', $rules);
                    }
                } else { $this->form_validation->set_rules($key, strtoupper($key), $rules); }
            }
        } 

        public function file_upload($path, $name, $type = 'gif|jpg|jpeg|png|docx')
        {
            $config['upload_path']          = $path;
            $config['allowed_types']        = $type;
            $config['overwrite']			= true;
            $config['encrypt_name']         = TRUE;
    
            $this->load->library('upload', $config);
    
            if($bool = $this->upload->do_upload($name)){
                return $this->upload->data();
            }else {
                echo $this->upload->display_errors();
                die;
            }
        }

        function sendwa($notujuan, $url)
        {
            $token = "lSxFYK7Oir9w9LfDRWsz1tEhapWiV08EcOrFuAeoHs2ehwVzOg00gVAWCebAYNhK";
            $pesan = 'Berikut merupakan file transkrip anda, silahkan mengklik <br> Link url dibawah untuk mengunduh <br>'.urlencode($url);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://us.wablas.com/api/send-message?token=".$token."&phone=".$notujuan."&message=".$pesan);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            curl_close($ch);
            return $output;

        }

        function debug($params)
        {
            if(is_array($params) == true){
                echo '<pre>';
                    print_r($params);
                echo '</pre>';
            } else {
                var_dump($params);
            }
        }

        function parserPDF($filepath, $status = 'S')   
        {
            $pdfText['file'] = '';
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($filepath);

            $lastPages = count($pdf->getPages());
            $targetPages = $pdf->getPages();

            if($status == 'S'){
                for($i=0; $i < $lastPages; $i++){
                    $pdfText['file'] .= $targetPages[$i]->getText();}
            } else if($status == 'V'){
                for($i=0; $i < $lastPages - 1; $i++){
                    $pdfText['file'] .= $targetPages[$i]->getText();}
                $pdfText['sign'] = $targetPages[$lastPages - 1]->getText();}           
            
            return $pdfText;
        }

      
    }

    class User_Controller extends MY_Controller {
        
        public function __construct()
        {
            // checkuser();
            parent::__construct();
        }

        function checkuser()
        {
            
        }

    }


    

?>