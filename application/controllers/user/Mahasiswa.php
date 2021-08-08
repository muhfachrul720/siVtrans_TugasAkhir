<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;

Class Mahasiswa extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('m_mahasiswa');
        $this->load->model('m_nilai');
    }

    public function index(){
        $this->template->load('template_admin','user/form_import_mhs');
    }

    // angkatan
    public function angkatan(){
        $data['result'] = $this->m_mahasiswa->get_all_ang()->result_array();
        $this->template->load('template_admin','user/form_angkatan', $data);
    }

    public function insert_angkatan()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);

        if($this->form_validation->run()){
            $dataAngkatan = array(
                'nama' => $post['angkatanName'],
            ); $ck = $this->m_mahasiswa->insert($dataAngkatan, 'tbl_angkatan');

            if($ck){$this->session->set_flashdata('notif', 'success|Berhasil Menambahkan Nama Angkatan Baru'); redirect($_SERVER['HTTP_REFERER']);}
            else $this->debug($dataAngkatan);
        }
    }

    public function update_angkatan()
    {
        $post = $this->input->post();
        $this->form_rules_required($post);

        if($this->form_validation->run()){
            $dataAngkatan = array(
                'nama' => $post['updateNama'], 
                'jumlah_siswa' => $post['updateJmlSiswa'],
            ); $ck = $this->m_mahasiswa->update('tbl_angkatan', array('id' => $post['idAngkatan']), $dataAngkatan);

            if($ck){$this->session->set_flashdata('notif', 'success|Berhasil Memperbaharui Angkatan'); redirect($_SERVER['HTTP_REFERER']);}
            else $this->debug($dataAngkatan);
        }
    }

    public function delete_angkatan()
    {
        $post = $this->input->post();
        $ck = $this->m_mahasiswa->delete('tbl_angkatan', array('id' => $post['idAng']));
        if($ck){$this->session->set_flashdata('notif', 'success|Berhasil Menghapus Angkatan'); redirect($_SERVER['HTTP_REFERER']);}
            else $this->debug($dataAngkatan);
    }
    

    // mahasiswa
    public function individual_mhs(){
        $this->template->load('template_admin','user/form_insert_mhs');
    }

    public function insert_import(){
        $dataExcel = $this->import_excel();
        $arrayNilai = ['E', 'D', 'C', 'B', 'A'];
        $dataInfo = array(); $post = $this->input->post();

        foreach($dataExcel['DataInfo'] as $info){
            array_push($dataInfo, array(
                'nama_mhs_info' => $info['NAMA'],
                'nim_mhs_info' => $info['STB'],
                'prgstd_mhs_info' => $info['PROG.STUDI'],
                'jml_sks' => $info['JMLSKS'],
                'nilai_ipk' => $info['IPK'],
                'id_angkatan' => $post['angkatanID']
            ));       
        } $firstID = $this->m_mahasiswa->insert($dataInfo, 'tbl_info_trans', true);

        $idx = $firstID; 
        foreach($dataExcel['DataNilai'] as $nilai){
            $dataNilai = array();
            foreach($nilai as $n){  
                array_push($dataNilai, array(
                    'kode_mk_trans' => $n['kodeMatkul'],
                    'mata_kuliah_trans' => $n['namaMatkul'],
                    'sks_mk_trans' => $n['sksMatkul'],
                    'ket_trans' => '',
                    'nilai_mk_trans' => $n['nilaiMatkul'],
                    'sks_angka_trans' => $n['sksMatkul'] * $n['nilaiMatkul'],
                    'id_info_trans' => $idx,
                ));
            } $idx++; 
            $this->m_mahasiswa->insert($dataNilai, 'tbl_detail_trans', true);
        }
        $this->session->set_flashdata('notif', 'success|Berhasil Menambahkan Data Nilai Mahasiswa'); redirect($_SERVER['HTTP_REFERER']);
    }
    
    private function import_excel(){
        if($_FILES['file_original']['name'] != ''){
            
            $extension = pathinfo($_FILES['file_original']['name'], PATHINFO_EXTENSION);     

            if($extension == 'csv'){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } elseif($extension == 'xlsx') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }
            
            $createArray = array('No.', 'Kode M.K.', 'Mata Kuliah', 'SKS', 'Nilai', 'Angka', 'SKS x Angka', 'Ket');
            $makeArray = array('No.' => 'No.', 'KodeM.K.' => 'KodeM.K.', 'MataKuliah' => 'MataKuliah', 'SKS' => 'SKS', 'Nilai' => 'Nilai', 'Angka' => 'Angka', 'SKSxAngka' => 'SKSxAngka');

            $spreadsheet = $reader->load($_FILES['file_original']['tmp_name']);
            $count = $spreadsheet->getSheetCount();
            $arrayData = array(); $arrayUmum = array(); $sheetError = 0;

            for($i = 0; $i < $count; $i++ ){
                $sheetData = $spreadsheet->getSheet($i);
                $highestRow = $sheetData->getHighestRow() - 12;
                
                $sheetDataNilai = $sheetData->rangeToArray('A14:J'.$highestRow, null, true, true, true);
                $arrayCount = count($sheetDataNilai);
                $flag = 0; $sheetDataKey = array();

                foreach($sheetDataNilai as $dataInSheet) {
                    foreach($dataInSheet as $key => $value){
                        if(in_array(trim($value), $createArray)){
                            $value = preg_replace('/\s+/', '', $value);
                            $sheetDataKey[trim($value)] = $key;
                        }
                    }
                }

                if(empty(array_diff_key($makeArray, $sheetDataKey))){$flag = 1;} else {$sheetError = $i + 1;} 

                if($flag == 1){

                    $infoUmumArray = array();
                    $infoUmum = $sheetData->rangeToArray('A10:D12', null, true, true, true); $contSks = 0; $contAngka = 0;
                    
                    for($j = 16; $j<=$highestRow; $j++){
                        $kodeMatkul = filter_var(trim($sheetDataNilai[$j][$sheetDataKey['KodeM.K.']]), FILTER_SANITIZE_STRING);
                        $namaMatkul = filter_var(trim($sheetDataNilai[$j][$sheetDataKey['MataKuliah']]), FILTER_SANITIZE_STRING);
                        $sksMatkul = filter_var(trim($sheetDataNilai[$j][$sheetDataKey['SKS']]), FILTER_SANITIZE_STRING);
                        $nilaiMatkul = filter_var(trim($sheetDataNilai[$j][$sheetDataKey['Angka']]), FILTER_SANITIZE_STRING);
                        
                        $fetchData[] = array('namaMatkul' => $namaMatkul, 'kodeMatkul' => $kodeMatkul, 'sksMatkul' => $sksMatkul, 'nilaiMatkul' => $nilaiMatkul);    

                        $contSks = $contSks + intval($sksMatkul); 
                        $contAngka = $contAngka + (intval($sksMatkul) * intval($nilaiMatkul));
                    }

                    echo '<br><br>';

                    foreach($infoUmum as $info){
                        $infoUmumArray[preg_replace('/\s+/', '', $info['B'])] = substr($info['D'], 2);
                    }   

                    $infoUmumArray['JMLSKS'] = $contSks; $infoUmumArray['IPK'] = round($contAngka / $contSks, 2);

                    array_push($arrayData, $fetchData);
                    array_push($arrayUmum, $infoUmumArray);

                    unset($fetchData);

                } else {
                    $this->session->set_flashdata('notif', 'danger|Format Excel Tidak Sesuai Pada Sheet Index'.$sheetError);  
                    redirect($_SERVER['HTTP_REFERER']);
                }

            }

            return array('DataNilai' => $arrayData, 'DataInfo' => $arrayUmum);
            
        } else {
            $this->session->set_flashdata('notif', 'danger|Silahkan Mengupload File terlebih dahulu');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function insert_individual(){   
        $post = $this->input->post();
        $this->form_rules_required_multiple($post);

        // $this->debug($post);
        // die;

        if($this->form_validation->run() != FALSE){

            $dataInfo = array(
                'nama_mhs_info' => $post['namaMhsInfo'],
                'nim_mhs_info' => $post['nimMhsInfo'],
                'prgstd_mhs_info' => $post['programStudiInfo'],
                'jml_sks' => $post['jmlSks'],
                'nilai_ipk' => $post['nilaiIpk'],
                'id_angkatan' => $post['idAngkatan'],
            ); $firstID = $this->m_mahasiswa->insert($dataInfo, 'tbl_info_trans');

            $idx = 0; $dataNilai = array();
            foreach($post['kodeMkNilai'] as $i){
                array_push($dataNilai, array(
                    'kode_mk_trans' => $post['kodeMkNilai'][$idx],
                    'mata_kuliah_trans' => $post['mataKuliahNilai'][$idx],
                    'sks_mk_trans' => $post['sksNilai'][$idx],
                    'ket_trans' => '-',
                    'nilai_mk_trans' => $post['nilai'][$idx],
                    'sks_angka_trans' => $post['sksNilai'][$idx] * $post['nilai'][$idx],
                    'id_info_trans' => $firstID,
                ));
            $idx++; } $ck = $this->m_mahasiswa->insert($dataNilai, 'tbl_detail_trans', true);

            if($firstID != null && $ck != null){
                $this->session->set_flashdata('notif', 'success|Data Berhasil Masuk');
            } else { $this->debug($dataInfo); }

            redirect($_SERVER['HTTP_REFERER']);
            
        } else {$this->session->set_flashdata('notif', 'danger|Silahkan Mengisi dengan lenkap');
        redirect($_SERVER['HTTP_REFERER']);}
    }

    public function edit_individual($id){
        $data['info'] = $this->m_mahasiswa->get_mhs_info($id)->row_array();
        $data['nilai'] = $this->m_nilai->get_nilai_individual($id)->result_array();

        $this->template->load('template_admin','user/form_edit_mhs', $data);
    }

    public function update_individual()
    {
        $post = $this->input->post();
        $this->form_rules_required_multiple($post);
        if($this->form_validation->run() != FALSE){

            // Update Info Record
            $dataInfo = array(
                'nama_mhs_info' => $post['namaMhsInfo'],
                'nim_mhs_info' => $post['nimMhsInfo'],
                'prgstd_mhs_info' => $post['programStudiInfo'],
                'jml_sks' => $post['jmlSks'],
                'nilai_ipk' => $post['nilaiIpk'],
                'id_angkatan' => $post['idAngkatan'],
            ); $ckFirst = $this->m_mahasiswa->update($dataInfo, array('id_info_trans' => $post['idInfo']), 'tbl_info_trans');

            // Delete Old Record
            $this->m_mahasiswa->delete('tbl_detail_trans', array('id_info_trans' => $post['idInfo']));

            // Insert New Record
            $idx = 0; $dataNilai = array();
            foreach($post['kodeMkNilai'] as $i){
                array_push($dataNilai, array(
                    'kode_mk_trans' => $post['kodeMkNilai'][$idx],
                    'mata_kuliah_trans' => $post['mataKuliahNilai'][$idx],
                    'sks_mk_trans' => $post['sksNilai'][$idx],
                    'ket_trans' => '-',
                    'nilai_mk_trans' => $post['nilai'][$idx],
                    'sks_angka_trans' => $post['sksNilai'][$idx] * $post['nilai'][$idx],
                    'id_info_trans' => $post['idInfo'],
                ));
            $idx++; } $ck = $this->m_mahasiswa->insert($dataNilai, 'tbl_detail_trans', true);

            if($ckFirst != null && $ck != null){
                $this->session->set_flashdata('notif', 'success|Data Berhasil Masuk');
            } else { $this->debug($dataInfo); }

            redirect($_SERVER['HTTP_REFERER']);
            
        } else {$this->session->set_flashdata('notif', 'danger|Silahkan Mengisi dengan lenkap');
        redirect($_SERVER['HTTP_REFERER']);}

    }

    public function delete_individual()
    {
        $post = $this->input->post();
        
        $this->m_mahasiswa->delete('tbl_detail_trans', array('id_info_trans' => $post['idInfo']));
        $this->m_mahasiswa->delete('tbl_info_trans', array('id_info_trans' => $post['idInfo']));

        redirect('user/transkrip');
    }
    

}