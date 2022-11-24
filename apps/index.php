<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!$_SESSION['nama_adm']) {
  header('Location: ../index.php?session-expired');
}
include('pages/header.php') ?>
<?php
include('../conf/config.php');
$user = $_SESSION['nama_adm'];
$userlvl = $_SESSION['level']
?>


<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class="wrapper">
    <?php include('pages/loader.php') ?>
    <?php include('pages/sidebar.php') ?>
    <?php include('pages/navbar.php') ?>
    <?php include('menu/adm_index.php') ?>
    <?php include('pages/footer.php') ?>
    <?php include('pages/script.php') ?>




</body>

</html>