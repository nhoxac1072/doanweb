<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
       // echo" <h2>đăng nhập để tiếp tục</h2>";
        header('location:login.php');
    }
    $id=$_SESSION['username']['username'];
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> Admin quản lý khách hàng</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
    <link href="assets/css/util.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <!-- -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="index.php" class="simple-text">
                      <h2><?php echo $_SESSION['username']['username'] ?></h2>
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a class="nav-link active" href="#">

                            <p>thông tin cá nhân</p>
                        </a>
                    </li>                   
                    <li>
                        <a class="nav-link" href="chance_pass.php">

                            <p>đỗi mật khẩu</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="donphong.php">

                            <p>đơn đặt phòng</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " >
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">HOME</a>

                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="nav navbar-nav mr-auto">                      
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <span class="no-icon"></span>
                                </a>
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
                        <?php 
                            require_once("connection/connection.php");
                            $sql="Select * from account where username = '$id'";
                            $stm=$conn->query($sql);
                            $data=$stm->fetchall();
                            foreach($data as $key => $value)
                            {
                            ?>
                                <div class="container-login100">
                                    <div class="wrap-login100 p-l-55 p-r-55 p-t-25 p-b-25">
                                        <form class="login100-form validate-form flex-sb flex-w" method="post" action="update_profile.php">
                                            <span class="txt1 p-b-11">
                                                Username
                                            </span>                     
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                            <input class="input100" type="text" name="username" value="<?php echo $id ?>" readonly> <!-- thuộc tính chỉ đọc -->
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Password
                                            </span>                 
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="password" name="password" value="<?php echo $value['Password'] ?>" readonly> 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Họ Tên
                                            </span>                 
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="text" name="fullname" value="<?php echo $value['fullname'] ?>"> 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                Ngày sinh
                                                </span>                 
                                                <div class="wrap-input100 validate-input m-b-36" >                  
                                                    <input class="input100" type="date" name="birthday" value="<?php echo $value['birthday']?>"> 
                                                    <span class="focus-input100"></span>
                                                </div> 
                                            <span class="txt1 p-b-11">
                                                Số điện thoại
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="text" name="phone" value="<?php echo $value['phone_number']?>">  
                                                <span class="focus-input100"></span>
                                            </div>
                                            <span class="txt1 p-b-11">
                                                E-mail
                                            </span>
                                            <div class="wrap-input100 validate-input m-b-36" >                  
                                                <input class="input100" type="email" name="email" value="<?php echo $value['email']?>" > 
                                                <span class="focus-input100"></span>
                                            </div>
                                            <button type="" name="update">Cập Nhật <i class="lnr lnr-arrow-right"></i></button>
                                        </form>
                                    </div>
                                </div> 
                                <?php
                            }
                        ?>


        </div>
    </div>

    <!-- --------------------------------------------------------------- -->
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
            <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
                <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div> -->

</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Chartist Plugin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
