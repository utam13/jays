<!DOCTYPE html>
<!-- Template by Quackit.com -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>CMS PT. Jayz Zahara Mandiri</title>

    <!-- icons -->
    <link href="<?= base_url(); ?>assets/img/cms.svg" rel="icon">

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url(); ?>assets/cms/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="<?= base_url(); ?>assets/cms/css/custom.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?= base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- DATA TABLES -->
    <link href="<?= base_url(); ?>assets/cms/datatables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        table {
            font-size: 9pt;
        }

        #divloading {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('upload/page-loader.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .8;
        }

        select {
            font-family: 'FontAwesome', 'sans-serif';
        }
    </style>
</head>

<body>
    <!-- loading page animated until page ready -->
    <div id="divloading" style="display:none;"></div>