
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> | Booth Square </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

    <link href="assets/plugins/bootstrap-tagsinput/tagsinput.css?v=11" rel="stylesheet" type="text/css">

    <!-- ckeditor -->
    <script src="assets/adminlte/bower_components/ckeditor/ckeditor.js"></script>

    <style>
      .er{
        color: red;
      } 
      body {
        font-family: 'Kanit', sans-serif;
      }
    </style>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <?php include("../connect.php"); ?>
    <div class="wrapper">
      <nav class="main-header  navbar navbar-expand navbar-orange navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a href="admin_logout.php" class="nav-link ">
              <i class="fa fa-power-off"></i>
            </a>         
          </li>
        </ul>
      </nav>
      <aside class="main-sidebar sidebar-light-orange elevation-4">
        <a href="" class="brand-link bg-orange">
          <img src="logoss-w.png"
              alt="AdminLTE Logo"
              class="brand-image"
              style="opacity: .">
          <span class="brand-text text-white font-weight-light">Booth Square</span>
        </a>
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="a_img/<?php echo $_SESSION["a_img"]; ?>" class="img-rounded elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"> 
                <?php echo $_SESSION["a_name"];?>            
              </a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">PROFILE</li>
              <li class="nav-item">
                <a  href="index.php" class="nav-link <?php if($ClickFunction=='index'){ echo 'active'; }?>">
                  <i class="nav-icon fas fa-user"></i>
                  <p>ข้อมูลส่วนตัว</p>
                </a>
              </li>
              <div><hr></div>
            </ul>
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">Booking</li>
              <li class="nav-item">
                <a  href="show_booking.php" class="nav-link <?php if($ClickFunction=='show_booking'){ echo 'active'; }?>">
                  <i class="nav-icon fa fa-calendar"></i>
                  <p>การจอง</p>
                </a>
              </li>
              <div><hr></div>
            </ul>

            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">MENU</li>
              <li class="nav-item">
                <a href="setting_category.php" class="nav-link <?php if($ClickFunction=='setting_category'){ echo 'active'; }?>">
                  <i class="nav-icon fa fa-bars"></i>
                  <p>จัดการหมวดหมู่</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="setting_booth.php" class="nav-link <?php if($ClickFunction=='setting_booth'){ echo 'active'; }?>">
                  <i class="nav-icon fa fa-university"></i>
                  <p>จัดการงานออกบูธ</p>
                </a>
              </li>
              <div><hr></div>
            </ul>

            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">LOGOUT</li>
              <li class="nav-item">
                <a href="admin_logout.php" class="nav-link text-danger">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>ออกจากระบบ</p>
                </a>
              </li>        
            </ul>
          </nav>
        </div>
      </aside>
      <div class="content-wrapper">
      
      