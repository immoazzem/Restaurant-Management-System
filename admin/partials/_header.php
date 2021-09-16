<?php
session_start();
if($_SESSION['IS_LOGIN']==null)
{
  header('location:login.php');
}
$mysqli = new mysqli('localhost', 'root', '', 'wdpf47_rms') or die('error');
// session_start();
// require_once 'partials/database.inc.php';
// require_once 'partials/function.php';
// if(isset($_SESSION['IS_LOGIN']))
// {
//   header('location:login.php');
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Restaurant Management System</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../assets/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/node_modules/bootstrap-icons/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- datatables -->
  <link rel="stylesheet" href="../assets/node_modules/datatables.net-bs/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="../assets/node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="../assets/node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css">
  <link rel="stylesheet" href="../assets/node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/node_modules/overlayscrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/node_modules/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/node_modules/summernote/dist/summernote-bs4.min.css">
  <!-- Select 2 -->
  <link rel="stylesheet" href="../assets/node_modules/select2/dist/css/select2.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../assets/node_modules/bs-stepper/dist/css/bs-stepper.min.css">
  <link rel="stylesheet" href="../assets/node_modules/bootstrap-fileinput/css/fileinput.css">
  <link rel="stylesheet" href="../assets/node_modules/bootstrap-fileinput/css/fileinput-rtl.min.css">
</head>
<body class="layout-fixed control-sidebar-slide-open text-sm layout-footer-fixed">
<div class="wrapper">
   