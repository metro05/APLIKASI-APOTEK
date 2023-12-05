<?php
session_start();
if (!isset($_SESSION['login'])) {
  header('location:login.php');
  exit(); // Tambahkan exit() setelah header untuk menghentikan eksekusi kode
}
include 'config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Panel | Aplikasi Penjualan Obat Berbasis Web</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="description" content="Aplikasi Persediaan Obat pada Apotek">
  <meta name="author" content="Indra Styawantoro" />

  <!-- favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" />
  <!-- fontawesome -->
<script src="https://kit.fontawesome.com/b331dbb5a5.js" crossorigin="anonymous"></script>
  <!-- Bootstrap 3.3.2 -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- FontAwesome 4.3.0 -->
  <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- DATA TABLES -->
  <link href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Datepicker -->
  <link href="assets/plugins/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />
  <!-- Chosen Select -->
  <link rel="stylesheet" type="text/css" href="assets/plugins/chosen/css/chosen.min.css" />
  <!-- Theme style -->
  <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link href="assets/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
  <!-- Date Picker -->
  <link href="assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <!-- Custom CSS -->
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="skin-blue fixed">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="" class="logo">
        <img style="margin-top:-15px;margin-right:5px" src="assets/img/logo-blue.png" alt="Logo">
        <span style="font-size:30px">Apotek</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"></span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar menu -->
            <ul class="sidebar-menu">
              <li class="header">MAIN MENU</li>
              <li><a href="index.php?page=home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
              <li class="header">Data</li>

              <li><a href="index.php?page=obat/obat"><i class="fa fa-folder"></i> <span>Data Obat</span></a></li>

              <li class="treeview">
              <a href="javascript:void(0);"><i class="fa fa-desktop"></i> <span>Transaksi Penjualan</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="index.php?page=penjualan/penjualan" class="active"><i class="fa fa-circle-o"></i>Penjualan</a></li>
              </ul>
              </li>

              <li class="treeview">
              <a href="javascript:void(0);"><i class="fa fa-desktop"></i> <span>Laporan Transaksi</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
              <li><a href="index.php?page=laporan/penjualan" class="active"><i class="fa fa-circle-o"></i>Laporan Penjualan</a></li>
              </ul>
              </li>
              
              <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-file-text"></i> <span>Laporan</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                  <li><a href="laporan_obat.php" onclick="cetakExcel()"><i class="fa fa-circle-o"></i> Cetak Data Obat </a></li>
                </ul>
              </li>

              <li><a href="index.php?page=user/user"><i class="fa fa-user"></i> <span>Data User</span></a></li>

              <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a></li>

            </ul>
          </section>
        </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- panggil file "content-menu.php" untuk menampilkan content -->
      <!-- Replace this line with the code to display your menu content -->
      <div id="page-content-wrapper" class="w-75">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">

              <!-- halaman -->
              <section class="item content">
                <div class="container">
                  <div class="row">
                    <?php
                    if (isset($_GET['page'])) {
                      $halaman = $_GET['page'];
                    } else {
                      $halaman = "";
                    }

                    if ($halaman == "") {
                      include "page/home.php";
                      //include "page/tambah.php";
                      // include "page/buku.php";
                      // include "page/kontak.php";
                    } else if (!file_exists("page/$halaman.php")) {
                      echo "halaman yang dicari tidak ditemukan";
                    } else {
                      include "page/$halaman.php";
                    }

                    ?>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- jQuery 2.1.3 -->
  <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- datepicker -->
  <script src="assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- chosen select -->
  <script src="assets/plugins/chosen/js/chosen.jquery.min.js"></script>
  <!-- DATA TABES SCRIPT -->
  <script src="assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
  <!-- Datepicker -->
  <script src="assets/plugins/datepicker/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='assets/plugins/fastclick/fastclick.min.js'></script>
  <!-- maskMoney -->
  <script src="assets/js/jquery.maskMoney.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/app.min.js" type="text/javascript"></script>
</body>
</html>
