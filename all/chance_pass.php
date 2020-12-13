<?php
    require_once("connection/connection.php");
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location:login.php');
    }
    

    if(isset($_POST['submit']))
    {
            
            $user= $_SESSION['username'];
            $password= $_POST['password'];

            $password1=$_POST['password1'];

            $sql="select username,Password from account where username ='$user'";
           // $statement = $conn->prepare($sql);
           // $statement->execute( array('username' => $_POST["username"],'Password' => $_POST["password"] ) );	
            $statement=$conn->query($sql);
            $count = $statement->rowCount();
          //  var_dump($count); exit;
            if($count>0)
            {
                    $sql=("update account set Password='$password1' where username='$user'");  
                    $stm= $conn->query($sql);        
                    $message=" đỗi mật khẩu thành công";
            }
            else
            {
                $message="mật khẩu không dúng ";
            }
        
    }
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
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" /> -->
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
                        <a class="nav-link active" href="profile.php">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>thông tin cá nhân</p>
                        </a>
                    </li>                   
                    <li>
                        <a class="nav-link" href="#">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
                            <p>đỗi mật khẩu</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#">
                            <!-- <i class="nc-icon nc-bell-55"></i> -->
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
                    
                    <div class="container-login100">
                        
                        <div class="wrap-login100 p-l-55 p-r-55 p-t-25 p-b-25">
                        <div><?php if(isset($message)){
                                 echo "<p style='color: green '>.".$message."</p>";
                        } ?> </div>
                            <form class="login100-form validate-form flex-sb flex-w" method="post" action="chance_pass.php">
                                <span class="login100-form-title p-b-32">
                                    Đỗi mật khẩu
                                </span>
                                <!-- ---------------------------- -->
                                <!-- <input type="hidden" name="username" value="">  -->
                                <span class="txt1 p-b-11">
                                    mật khẩu cũ
                                </span>					
                                <div class="wrap-input100 validate-input m-b-36" >					
                                    <input class="input100" type="password" name="password" value="" > 
                                    <span class="focus-input100"></span>
                                </div>
                                <!-- ---------------------------- -->

                                <span class="txt1 p-b-11">
                                    mật khẩu mới
                                </span>					
                                <div class="wrap-input100 validate-input m-b-36" >					
                                    <input class="input100" type="password" name="password1" value="" > 
                                    <span class="focus-input100"></span>
                                </div>
                                <!-- ---------------------------- -->

                                <span class="txt1 p-b-11">
                                    nhập lại mật khẩu mới
                                </span>					
                                <div class="wrap-input100 validate-input m-b-36">					
                                    <input class="input100" type="password" name="password2" value="" > 
                                    <span class="focus-input100"></span>
                                </div>

                                <!-- ---------------------------- -->
                                <div class="container-login100-form-btn">
                                    <button class="login100-form-btn" name="submit">
                                        đỗi mật khẩu
                                    </button>
                                </div> 
                            </form>
                        </div>            
                    </div>
            <div class="limiter">              
	        
            </div>
    </div>

    <!-- --------------------------------------------------------------- -->
    <!--   -->

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
