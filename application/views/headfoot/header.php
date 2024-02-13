
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="icon" href="<?php echo base_url() ?>assets/favicon.ico">
    <!-- Custom styles for this template-->
    <?php
    $cssVersion = time(); // Using current timestamp as the version
    ?>
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script> src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="<?php echo base_url('assets/js/jspdf.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jspdf.umd.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/html2canvas.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.css"/> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-datetimepicker.min.css"/> 
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/SweetAlert.all.min.css"/> 
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css?v=<?php echo $cssVersion; ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/SweetAlert.min.all.js?>"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment.js?>"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment.js?>"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.js?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.js?>"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/Datatables2/datatables.min.css"/> 
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #view-ocf {
            color: black;
        }
        #view-mrf {
            color: black;
        }
        #export {
            color: black;
        }
    </style>

</head>
    <body id="page-top">
         <?php
        if($this->session->userdata('usergate') != null){
         if(has_alert()):  
            foreach(has_alert() as $type => $message): ?>  

                <div id="something" class="alert alert-dismissible <?php echo $type; ?> alert-check">  
                    <button type="button" class="close" data-dismiss="alert" onclick="location.reload();"><span>&times;</span></button>
                    <?php echo $message; ?>  
                </div>  
                
            <?php endforeach;  
        endif;} ?>

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view('/headfoot/'.$sidebar) ?>
            <!-- End of Sidebar -->

            <?php $this->load->view('/headfoot/navbar') ?>
