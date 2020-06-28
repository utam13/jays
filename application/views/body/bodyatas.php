<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PT. JAYS ZAHARA MANDIRI</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="PT. JAYS ZAHARA MANDIRI" name="keywords">
  <meta content="Company Profile for PT. JAYS ZAHARA MANDIRI" name="description">

  <!-- icons -->
  <link href="<?= $file_logo; ?>" rel="icon">

  <!-- Google Fonts -->
  <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">-->

  <!-- Bootstrap CSS File -->
  <link href="<?= base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?= base_url(); ?>assets/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="<?= base_url(); ?>assets/css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="<?= base_url(); ?>assets/css/responsive.css" rel="stylesheet">

  <style>
    @media only screen and (max-width: 800px) {
      .sticky-logo h1 {
        font-size: 14pt;
      }
    }

    @media only screen and (min-width: 780px) and (max-width: 1024px) {
      .sticky-logo h1 {
        font-size: 12pt;
      }
    }

    .modal-login {
      color: #636363;
      width: 350px;
    }

    .modal-login .modal-content {
      padding: 20px;
      border-radius: 5px;
      border: none;
    }

    .modal-login .modal-header {
      border-bottom: none;
      position: relative;
      justify-content: center;
    }

    .modal-login h4 {
      text-align: center;
      font-size: 26px;
      margin: 30px 0 -15px;
    }

    .modal-login .form-control:focus {
      border-color: #70c5c0;
    }

    .modal-login .form-control,
    .modal-login .btn {
      min-height: 40px;
      border-radius: 3px;
    }

    .modal-login .close {
      position: absolute;
      top: -5px;
      right: -5px;
    }

    .modal-login .modal-footer {
      background: #ecf0f1;
      border-color: #dee4e7;
      text-align: center;
      justify-content: center;
      margin: 0 -20px -20px;
      border-radius: 5px;
      font-size: 13px;
    }

    .modal-login .modal-footer a {
      color: #999;
    }

    .modal-login .avatar {
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      top: -70px;
      width: 95px;
      height: 95px;
      border-radius: 50%;
      z-index: 9;
      background: #60c7c1;
      padding: 15px;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-login .avatar img {
      width: 100%;
    }

    .modal-login.modal-dialog {
      margin-top: 80px;
    }

    .modal-login .btn {
      color: #fff;
      border-radius: 4px;
      background: #60c7c1;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      border: none;
    }

    .modal-login .btn:hover,
    .modal-login .btn:focus {
      background: #45aba6;
      outline: none;
    }
  </style>

  <? if ($page_name == "blog") { ?>
    <style>
      .header-bg {
        background: url(<?= $file_gambar_slide; ?>);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: top center;
        background-attachment: fixed;
      }
    </style>
  <? } ?>

  <? if ($pesanlogin != "") { ?>
    <script>
      alert('<?= str_replace("%20", " ", $pesanlogin); ?>');
    </script>
  <? } ?>

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>