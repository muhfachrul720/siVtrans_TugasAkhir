<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url()?>assets/lp/style1.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/fontawesome-free/css/all.min.css">
  
  <title>SIPENTAS</title>
</head>

<style>
    .nav-bar {
        font-size:20px !important;
    }

    .text-center {
        text-align:center;
    } 

    .container h1{
        text-align:center;
        width : 100% !important;
        font-size:40px !important;
    }

    .file-input {
        width:100%;
        padding: 10px 20px;
        border : solid 2px rgb(220, 20, 60);
        color:white;
        font-size:14px;
        cursor:pointer;
    }

    .file-input:hover {
        background-color: rgb(220, 20, 60);
        transition : 0.2s ease;
    }

    .button-verif {
        margin:0px 10px;
        padding: 12px 20px;
        font-size:15px;
        background-color: rgb(220, 20, 60);
        border:none;
        color:white;
        font-weight:bold;
    }

    .button-verif:hover {
        background-color: rgb(180, 20, 60);
    }
</style>

<body>
  <!-- Header -->
  <section id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="<?= base_url()?>welcome">
            <h1 style="font-size:20px !important">SIPENTAS</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          <ul>
            <li><a style="font-size:15px !important" href="<?= base_url()?>welcome/verifikasi" data-after="About">Verifikasi</a></li>
            <li><a style="font-size:15px !important" href="<?= base_url()?>auth" data-after="Contact">Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->
  
  <?= $contents ?>


  <!-- Footer -->
  <section id="footer">
    <div class="footer container">
      <p>Copyright © 2020 Arfan. All rights reserved</p>
    </div>
  </section>
  <!-- End Footer -->

    <!-- jQuery -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/lp/app.js"></script>
    <script>
        $('#fileTrans').on('change', function(){
            var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
            $(this).prev().text(filename);
            $(this).prev().css('background-color', 'rgb(220, 20, 60)');
        })

        $(document).ready(function() {
            $('#myModal').modal('show');
        } );
    </script>
</body>

</html>