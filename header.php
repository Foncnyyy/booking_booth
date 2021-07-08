<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> | Booth Square</title>
    <!--  icon -->
    <link rel="icon" href="" type="image/x-icon">
    
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/dist/mdb/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="assets/dist/mdb/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="assets/dist/mdb/css/style.css">
    <link href="assets/dist/mdb/css/addons/datatables.min.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <style>
      .er{
        color: red;
      } 
      body {
        font-family: 'Kanit', sans-serif;
      }
    </style> 
  </head>
  <body>
    <?php include "connect.php"; ?>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color fixed-top" style="background-color: #fbfbfb !important;">
      <div class="container">
        <!-- Navbar brand -->
        <a class="navbar-brand text-dark" href="web_booking.php">
        <img src="Image/logoss.png" height="40 px"> Booth Square</a>
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
          <!-- Links -->
          <ul class="nav navbar-nav  ml-auto">
            <li class="nav-item dropdown">       
              <a href="" class="nav-link dropdown-toggle text-dark" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="" aria-expanded="">หมวดหมู่</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">             
                  <a class="dropdown-item text-dark" href="web_booking.php">ทั้งหมด</a>
                  <?php 
                  $sql ="SELECT * FROM tb_category";
                  $query = mysqli_query($conn,$sql);
                  while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>       
                    <a class="dropdown-item" href="web_booking.php?c_id=<?php echo $result['c_id'] ?>"><?php echo $result['c_name']; ?></a>             
                  <?php 
                  }
                  ?>              
              </div>
            </li>
            <li class="nav-item">
              <?php
								$count_item=0;
								if(isset($_SESSION["strProductID"])){
									for($k=0;$k<count($_SESSION["strProductID"]);$k++){
										if($_SESSION["strProductID"][$k] == '' or $_SESSION["strProductID"][$k] == ' '){}
										else{
											$count_item=$count_item+1;
										}
									}
								}
							?>
              <a target="" class="nav-link text-dark" href="show_booth.php"><img src="Image/cart4.svg" alt="Kiwi standing on oval"> ตะกร้า <span class="total-count"><?php echo $count_item;?></span></a>
            </li>
            <?php
            if(isset($_SESSION["StatusLogin1"])){
              if ($_SESSION["StatusLogin1"]!=1){
            ?>
                <li class="nav-item">
                  <a target="" class="nav-link text-dark" href="web_register.php">สมัครสมาชิก</a>
                </li>
                <li class="nav-item">
                  <a target="" class="nav-link text-dark" href="member_login.php">เข้าสู่ระบบ</a>
                </li>
            <?php
              }else{
            ?>
                <li class="nav-item">
                  <a target="" class="nav-link text-dark" href="member_profile.php">ข้อมูลส่วนตัว</a>
                </li>
                <li class="nav-item">
                  <a target="" class="nav-link text-dark" href="member_logout.php">ออกจากระบบ</a>
                </li>
            <?php
              }
            }else{
            ?>
              <li class="nav-item">
                <a target="" class="nav-link text-dark" href="web_register.php">สมัครสมาชิก</a>
              </li>
              <li class="nav-item">
                <a target="" class="nav-link text-dark" href="member_login.php">เข้าสู่ระบบ</a>
              </li>
            <?php
            }
            
            ?>
          </ul>
        </div>
      <!-- Collapsible content -->  
      </div>
    </nav>
    <!--/.Navbar-->
    <br><br><hr>

