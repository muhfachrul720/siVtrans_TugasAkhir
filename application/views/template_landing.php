<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SIVTrans</title>

      <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/dist/css/adminlte.min.css">

      <link rel="stylesheet" href="<?= base_url()?>assets/admin-lte/plugins/fontawesome-free/css/all.min.css">

       <!-- jQuery -->
       <script src="<?= base_url()?>assets/admin-lte/plugins/jquery/jquery.min.js"></script>

    </head>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@100;300;500&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap');

        .all-white {
          background-color:white;
          color:black;
          border:none;
        }
        .side-blue {
          font-family: 'Kanit', sans-serif;
          background: linear-gradient(108.22deg, #80CDFF 0.47%, #59BDFF 58.3%, #56BDFF 95.69%);
          border:none;
          color:white;
        }
        .img-interact {
          cursor:pointer;
        }
        .img-interact:hover{
          transition:0.2s ease;
          transform:rotate(10deg);
        }
        .ps-relative {
          position:relative;
        }
        .vertical-centered-content {
          position:absolute;
          left:50%;
          top:50%;
          transform:translate(-50%, -50%);
          width:60%;
        }
        .custom-card {
          padding:10px 20px;
          border-radius:3px;
        }
        .thin {
          font-weight:300;
        }
        .upload-box{
            border-radius:3px;
            width:80%;
            border:dashed 4px #ffffff;
            height:290px;
            color:#ffffff;
            text-align:center;
            display:table;
            margin:auto;
        }  
        .upload-box .upload-icon {
            display:table-cell;
            vertical-align:middle;
        }

        .upload-icon i, .icon-lg {
            font-size: 36px;
        }

        .upload-box--drag {
            border:solid 4px #FFFFFF;
            color:#FFFFFF;
        }

        .fa-times {
          color:red;
        }

        .fa-check {
          color:green;
        }

    </style>
    <body>

    <div class="all-white" style="position:relative">
      <?php echo $contents; ?>
    </div>

    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url()?>assets/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()?>assets/admin-lte/dist/js/adminlte.js"></script>

  </body>
</html>