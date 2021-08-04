<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chillerlan\QRCode\{QRCode, QROptions};
use PhpOffice\PhpSpreadsheet\Spreadsheet;

Class Sign extends MY_Controller{
    
    public function __construct()
    {
        parent::__construct();  
        $this->load->model('m_user'); 
        $this->load->model('m_sign');
        $this->load->library('rsa/rsa_key');
    }

    public function index()
    {   
        $this->template->load('template_admin','user/form_sign');
    }
    
    public function convert_transcript()
    {
        // $this->debug($_FILES);
        if($_FILES['file_original']['name'] != ''){
            $extension = pathinfo($_FILES['file_original']['name'], PATHINFO_EXTENSION);     

            if($extension == 'csv'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            
            $spreadsheet = $reader->load($_FILES['file_original']['tmp_name']);
            $getActiveSheet = $spreadsheet->getActiveSheet();
            $highestRow = $getActiveSheet->getHighestRow() - 2;

            $sheetData = $getActiveSheet->rangeToArray('A14:H'.$highestRow, null, true, true, true);

            // Filter Data
            $arrayCount = count($sheetData);
            $flag = 0;
            $createArray = array('NO', 'KODE. MK', 'NAMA  MATA  KULIAH', 'SKS', 'NILAI', 'ANGKA', '(SKS)X(ANGKA)');
            $makeArray = array('NO' => 'NO', 'KODE.MK' => 'KODE.MK', 'NAMAMATAKULIAH' => 'NAMAMATAKULIAH', 'SKS' => 'SKS', 'NILAI' => 'NILAI', 'ANGKA' => 'ANGKA', '(SKS)X(ANGKA)' => '(SKS)X(ANGKA)');
            $sheetDataKey = array();

            foreach($sheetData as $dataInSheet) {
                foreach($dataInSheet as $key => $value){
                    if(in_array(trim($value), $createArray)){
                        $value = preg_replace('/\s+/', '', $value);
                        $sheetDataKey[trim($value)] = $key;
                    }
                }
            }

            if(empty(array_diff_key($makeArray, $sheetDataKey))){$flag = 1;};

            if($flag == 1){
                for($i = 16; $i<=$highestRow; $i++){
                    $kodeMatkul = filter_var(trim($sheetData[$i][$sheetDataKey['KODE.MK']]), FILTER_SANITIZE_STRING);
                    $namaMatkul = filter_var(trim($sheetData[$i][$sheetDataKey['NAMAMATAKULIAH']]), FILTER_SANITIZE_STRING);
                    $sksMatkul = filter_var(trim($sheetData[$i][$sheetDataKey['SKS']]), FILTER_SANITIZE_STRING);
                    $nilaiMatkul = filter_var(trim($sheetData[$i][$sheetDataKey['ANGKA']]), FILTER_SANITIZE_STRING);
                    
                    $fetchData[] = array('namaMatkul' => $namaMatkul, 'kodeMatkul' => $kodeMatkul, 'sksMatkul' => $sksMatkul, 'nilaiMatkul' => $nilaiMatkul);    
                }

                $infoUmumArray = array();
                $infoUmum = $getActiveSheet->rangeToArray('A10:D12', null, true, true, true);
                foreach($infoUmum as $info){
                    $infoUmumArray[preg_replace('/\s+/', '', $info['A'])] = substr($info['D'], 2);
                }

                
                $data['info_umum'] = $infoUmumArray;
                $data['trans'] = $fetchData;
                $data['no_surat'] = 'NO SURAT';

                $this->template->load('template_admin','user/new_form_overview_nilai', $data);

            } else {
                $this->session->set_flashdata('msg', 'Format Excel Tidak Sesuai dengan Format Transcript Nilai');
                $this->index();
            }

        } else {
            $this->session->set_flashdata('msg', 'File Belum Diupload');
            $this->index();
        }
    }
    
    public function generate_trans()
    {   
        $post = $this->input->post();
        $originalPath = "pdffile/original/DS_Transcript_".str_replace(' ', '_', $post['namaMhsInfo']).'_'.$post['nimMhsInfo'].'.pdf';
        $signedPath = "pdffile/signed/DS_Transcript_".str_replace(' ', '_', $post['namaMhsInfo']).'_'.$post['nimMhsInfo'].'.pdf';
        
        // Insert to Sign
        $dataFile = array(
            'date_sign' => strtotime(date('Y-m-d')),
            'target_whatsapp' => $post['noTargetWhatsapp'],
            'target_email' => '-',
            'file_name' => $signedPath,
            'id_user' => $this->session->userdata('id_user'),
        ); $idSign = $this->m_sign->insert($dataFile, 'tbl_sign');

        // Insert to Info
        $data['info'] = array(
            'no_surat_trans' => '-',
            'nama_mhs_info' => $post['namaMhsInfo'],
            'nim_mhs_info' => $post['nimMhsInfo'],
            'prgstd_mhs_info' => $post['programStudiInfo'],
            'jml_sks' => $post['jmlSks'],
            'nilai_ipk' => $post['nilaiIpk'],
            'id_sign' => $idSign,
        ); $idDetail = $this->m_sign->insert($data['info'], 'tbl_info_trans');
        $data['info']['sksxangka'] = $post['jmlTotalAngka'];

        // Insert to Tbl Detail
        $i = 0;
        $data['detail'] = array();
        foreach($post['mataKuliahNilai'] as $m) {
            array_push($data['detail'],  array(
                'kode_mk_trans' => $post['kodeMkNilai'][$i],
                'mata_kuliah_trans' => $post['mataKuliahNilai'][$i],
                'sks_mk_trans' => $post['sksNilai'][$i],
                'ket_trans' => $post['keteranganNilai'][$i],
                'nilai_mk_trans' => $post['nilai'][$i],
                'sks_angka_trans' => $post['angka'][$i],
                'id_info_trans' => $idDetail,
            ));
            $i++;
        } $this->m_sign->insert($data['detail'], 'tbl_detail_trans', true);

        // Print and Send
        if($idDetail != null){
            
            //Content QRCODE 
            $data['qrcode'] = base_url().'public/verification/qrcode_verified/'.$idSign;

            // Create PDF to get Hash
            $fileOriginal = $this->print_trans($originalPath, $data);

            // Get PDF content
            $pdfText = $this->parserPDF($originalPath);

            // Hashing the content
            $MD = hash('sha256', $pdfText['file']);

            // Get public Key for encrypt
            $key = $this->m_user->get_user_key($this->session->userdata('id_user'))->row_array();

            // Begin Making Digital Signature by Encrypting Message Digest contain hashed pdf content using Public Key
            $data['sign'] = $this->rsa_key->encrypt($MD, $key['public_key']);

            // Implement the sign to Last page of File 
            $this->print_trans($signedPath, $data, $key['private_key']);

            // Sending
            // $this->sendwa($post['noTargetWhatsapp'], base_url().''.$signedPath);

            $this->session->set_flashdata('filePath', $signedPath); redirect('user/log');
        }
        
    }

    function print_trans($path, $data, $prKey = null, $saves = "F") 
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
?>