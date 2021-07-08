    <?php include "header.php"; ?>
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
                <a  href="" class="nav-link "><i class="nav-icon fas fa-user"></i><p>ข้อมูลส่วนตัว</p></a>
              </li>
              <div><hr></div>
            </ul>

            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">MENU</li>
              <li class="nav-item">
                <a href="" class="nav-link active">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>จัดการ Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-users"></i>
                  <p>จัดการ สมากชิก </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>จัดการ ข่าวสาร</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-sitemap"></i>
                  <p>จัดการ พื้นที่</p>
                </a>
              </li> 
              <div><hr></div>
            </ul>

            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">SETTING</li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>ตั้งค่า โครงการ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="nav-icon fas fa-images"></i>
                  <p>ตั้งค่า Slide</p>
                </a>
              </li>
              <div><hr></div>
            </ul>

          
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header text-secondary">LOGOUT</li>
              <li class="nav-item">
                <a href="" class="nav-link text-danger">
                  <i class="nav-icon fas fa-power-off"></i>
                  <p>ออกจากระบบ</p>
                </a>
              </li>        
            </ul>
          </nav>
        </div>
    </aside>