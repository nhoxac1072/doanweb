<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>trang chủ admin quarb lý khách sạn</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="admin.php" class="simple-text">
                      admintator
                    </a>
                </div>
                <ul class="nav">
                    <li class="">
                        <a class="nav-link" href="admin.php">
                            <!-- <i class="nc-icon nc-icon nc-paper-2"></i> -->
                            <p>trang chủ</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="phong.php">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>phòng</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="loaiphong.php">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>loại phòng</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>danh sách Account</p>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" href="user_info.php">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>user information</p>
                        </a>
                    </li>
                    <li >
                        <a class="nav-link" href="#">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>đơn hàng</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="javascript:;">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade plan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin.html">Trang chủ</a>
                    <!-- <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button> -->
                    &nbsp; &nbsp;&nbsp;
                    <div class="collapse navbar-collapse">
                        <a class="navbar-brand" href="../../index.php">index</a>   
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon"><?php echo strtoupper(($_SESSION['user'])) ?></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">
                                    <span class="no-icon">Log out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            
            <h2 style='color: #ff007f'> Danh sách tài khoản Khách hàng </h2>
            <table class="table" border="1" >
                <thead>
                    <tr>
                        <th width="30px">STT </th>                     
                        <th>Username</th>
                        <th>PASSWORD</th>
                        <Th width="90px">xóa</th>
                        <Th width="90px">update</th>
                    </tr>
                </thead>
                <tbody>
                        <?php

                            $i=1;
                            include '../connect.php';
                            $sql="select * from account";
                            $stm=$conn->query($sql);
                            //$rows =$stm->fetchAll(PDO::FETCH_ASSOC);
                           // $rows =$stm->fetchAll();
                            //print_r($rows);
                            $stm->setFetchMode(PDO::FETCH_ASSOC);
                            
                        ?>
                          <?php while($row =$stm->fetch()): ?>
                                                 
                                <tr>
                                    <td align="center"><?php echo $i ?></td>
                                    <td align="center"> <?php echo htmlspecialchars($row['username']) ?> </td>
                                    <td align="center"> <?php echo htmlspecialchars($row['Password']) ?> </td>

                                    <td ><button class="btn btn-danger"> <a href="xoa_Account.php?Xoa=ok&username=<?php echo htmlspecialchars($row['username']);?>" name="Xoa">xóa</a> </button></td>   
                                    <td><button class="btn btn-info"> <a href="" name="matkhau">Edit</a> </button></td>
                                    
                                </tr>
                                
                            <?php endwhile; ?>
                            
                </tbody>
                
            </table>
<br>

            <h2 style='color: #ff007f'> Danh sách tài khoản  </h2>
            <table class="table" border="1" >
                <thead>
                    <tr>
                        <th width="30px">STT </th>                     
                        <th>Username</th>
                        <th>PASSWORD</th>
                        <Th width="90px">xóa</th>
                        <Th width="90px">update</th>
                    </tr>
                </thead>
                <tbody>
                        <?php

                            $i=1;
                            include '../connect.php';
                            $sql="select * from admin";
                            $stm=$conn->query($sql);
                            //$rows =$stm->fetchAll(PDO::FETCH_ASSOC);
                           // $rows =$stm->fetchAll();
                            //print_r($rows);
                            $stm->setFetchMode(PDO::FETCH_ASSOC);
                            
                        ?>
                          <?php while($row =$stm->fetch()): ?>
                                                 
                                <tr>
                                    <td align="center"><?php echo $i ?></td>
                                    <td align="center"> <?php echo htmlspecialchars($row['username']) ?> </td>
                                    <td align="center"> <?php echo htmlspecialchars($row['Password']) ?> </td>

                                    <td ><button class="btn btn-danger"> <a href="xoa_Account.php?delete=ok&username=<?php echo htmlspecialchars($row['username']);?>" name="delete">xóa</a> </button></td>   
                                    <td><button class="btn btn-info"> <a href="" name="matkhau">Edit</a> </button></td>
                                    
                                </tr>
                                
                            <?php endwhile; ?>
                            
                </tbody>
                
            </table>
            <div class="content">
                <div class="container-fluid">
                    <div class="section">
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">ADMIN</a>, hẹn gặp lại.. byes
                        </p>
                    </nav>
                </div>
            </footer>
        </div>
    </div>

    <!-- --------------------------------------------------------------- -->


</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
