<div class="info">
                <a href="#" class="d-block">Welcome User -
                    <?php
                        session_start();
                        //$role = $_SESSION['sess_userrole'];
                        $user = $_SESSION['sess_username'];
                        echo $_SESSION["sess_username"];
                        if(!isset($_SESSION['sess_username'])){
                            header('Location:../login2.php?err=2');
                        }
                    ?>
                </a>
            </div>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
      <img src="../template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PMS</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://sfmmkpjsh.com/images/doctors/1595137653979596070.jpg" class="img elevation-2" alt="User Image"  style="height:60px; width:50px;">
            </div>
            <div class="info">
                <a href="#" class="d-block">Dr. Razeeb Hasan</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
  </aside>