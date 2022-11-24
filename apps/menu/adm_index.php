<?php
if (isset($_GET['page'])) {
  if ($_GET['page'] == 'dashboard') {
    include('pages/dashboard.php');
  } else if ($_GET['page'] == 'jemaat') {
    include('pages/jemaat.php');
  } else if ($_GET['page'] == 'keluarga') {
    include('pages/keluarga.php');
  } else if ($_GET['page'] == 'kematian') {
    include('pages/kematian.php');
  } else if ($_GET['page'] == 'edit_jemaat') {
    include('manage/edit_jemaat.php');
  } else if ($_GET['page'] == 'edit_keluarga') {
    include('manage/edit_keluarga.php');
  } else if ($_GET['page'] == 'edit_kematian') {
    include('manage/edit_kematian.php');
  } else if ($_GET['page'] == 'adminpage') {
    include('pages/adminpage.php');
  } else if ($_GET['page'] == 'kartu') {
    include('pages/kartu.php');
  } else if ($_GET['page'] == 'sakit') {
    include('pages/sakit.php');
  } else if ($_GET['page'] == 'ibadah') {
    include('pages/ibadah.php');
  } else if ($_GET['page'] == 'edit_ibadah') {
    include('manage/edit_ibadah.php');
  } else if ($_GET['page'] == 'perayaan') {
    include('pages/perayaan.php');
  } else if ($_GET['page'] == 'edit_perayaan') {
    include('manage/edit_perayaan.php');
  } else if ($_GET['page'] == 'errpage') {
    include('pages/errpage.php');
  } else {
    include('pages/notfound.php');
  }
} else {
  include('pages/dashboard.php');
}
