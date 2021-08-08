<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .infoTable tr td {
        padding: 5px 0px; 
        font-size:14px;
    }

    .nilaiTable{
        margin-top:20px;
        border-collapse : collapse;
        font-size:12px;
    }
    
    .nilaiTable tr td {
        text-align:center;
        padding: 3px 5px;
    }

    @page {
        margin:
    }
</style>
<body>
    
    <!-- KOP Surat -->
    <div style="border-bottom:3px solid black; padding-bottom:4px;">
        <div style="float:left; width:70px; padding-top:8px;">
            <img src="<?= base_url()?>assets/images/pdf/logoristek.jpg" alt="">
        </div>

        <div style="float:left; padding:10px 10px; width:540px; text-align:center; font-size: 14px;">
            <b>KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI <br> UNIVERSITAS HALU OLEO <br> JURUSAN TEKNIK INFORMATIKA <br></b>
            <small style="font-size:10px;">
            Kampus Hijau Bumi Tridharma Anduonohu, Jl.HEA. Mokodompit Kendari <br> 
            Gedung F.Teknik Lt. 3, Telp. (0401) 3194347, Fax. (0401) 31952874, Website: ti.eng.uho.ac.id
            </small>     
        </div>
        <div style="float:left; width:80px; padding-top:8px;">
            <img src="<?= base_url()?>assets/images/pdf/logouho.png" alt="">
        </div>
    </div>

    <div>
        <h4 style="text-align:center; text-decoration:underline; line-height:2">TRANSKRIP NILAI</h4>
        <table width="100%" class="infoTable">
            <tr>
                <td width="30%"><b>N A M A</b></td>
                <td width="2%">: </td>
                <td><?= $info['nama_mhs_info']?></td>
            </tr>
            <tr>
                <td><b>STB</b></td>
                <td>: </td>
                <td><?= $info['nim_mhs_info']?></td>
            </tr>
            <tr>
                <td><b>PROGRAM STUDI</b></td>
                <td>: </td>
                <td><?= $info['prgstd_mhs_info']?></td>
            </tr>
        </table>

        <table width="100%" class="nilaiTable" border="1">
            <tr style="background-color: rgb(191, 191, 191)">
                <td>No</td>
                <td>Kode M.K</td>
                <td>Mata Kuliah</td>
                <td>SKS</td>
                <td>Nilai</td>
                <td>Angka</td>
                <td>Sks x Angka</td>
                <td width="10%"> Ket</td>
            </tr>

            <?php 
            $cont=0 ;$no=1; $arrayNilai = array(null, 'D', 'C', 'B', 'A'); 
            foreach($nilai as $d) {?>
            <tr>
                <td width="5%"><?= $no ?></td>
                <td><?= $d['kode_mk_trans'] ?></td>
                <td style="text-align:left"><?= $d['mata_kuliah_trans'] ?></td>
                <td><?= $d['sks_mk_trans'] ?></td>
                <td><?= $d['nilai_mk_trans'] ?></td>
                <td><?= $arrayNilai[$d['nilai_mk_trans']] ?></td>
                <td width="10%"><?= $d['sks_mk_trans'] * $d['nilai_mk_trans'] ?></td>
                <td><?= $d['ket_trans']?> </td>
            </tr>
            <?php $cont=$cont + ($d['sks_mk_trans'] * $d['nilai_mk_trans']); $no++; }; ?>
            
            <tr>
                <td colspan="3"><b>JUMLAH</b></td>
                <td><b><?= $info['jml_sks']?></b></td>
                <td></td>
                <td></td>
                <td><b><?= $cont ?></b></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="6"><b>IP KUMULATIF</b></td>
                <td><b><?= $info['nilai_ipk'] ?></b></td>
                <td></td>
            </tr>
        </table>
    </div>

</body>
</html>