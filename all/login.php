<?php
session_start();
try
{
require_once("connection/connection.php");

    if(isset($_POST["click"]))
    {
      if(empty($_POST["username"])  || empty($_POST["Password"]))
      {
        $message = '<label> All field is required </lable>';
      }
      else
      {
          $username=$_POST["username"];
          $password=$_POST["Password"];
        $query = "SELECT * FROM account WHERE username = '$username' AND Password = '$password' LIMIT 1";// gán biến chứ đừng gọi name nó không hiểu, limit 1 là lấy giá trị trong db
        $statement = $conn->prepare($query);
        $statement->execute( array('username' => $_POST["username"],'Password' => $_POST["Password"] ) );	
        $count = $statement->rowCount(); // xem thử có lấy được dữ liệu ko
        if($count != 0) 	//!0 tức đã lấy được DB
        {
            $_SESSION["username"] = $username;
            $_SESSION['username']= $statement->fetch();
           // $_SESSION["user"]=$statement;
            header("location:index.php");/////////////////
        }	
        else
        {
            $message = '<label> Username OR Password is wrong </label>';
        }
      }	
    }	
}
catch(PDOException $error)	
{
    $message =$error->getMessage();	
}

?>




<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/linearicons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
</head>
<body>
	<!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="./index.php"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <nav class="main-menu mobile-menu">
                                <ul>
                                    <li><a href="./index.php">Home</a></li>
                                    <li><a href="./about-us.php">About</a></li>
                                    <li><a href="./rooms.php">Rooms</a></li>
                        
                                    <li><a href="./contact.php">Contact</a></li>
                                    <li><a href="./admintest2/admin/login.php">Admin</a></li>
                                    
                                </ul>
                            </nav>
                            <div class="top-info">
                            
                            <!-- <img src="img/placeholder.png" alt=""> -->
                            <nav class="main-menu mobile-menu">
                                <ul> 
                                    <?php if (isset($_SESSION['username'])) : ?>
                                    <li><a href="profile.php" name="info"><?php echo $_SESSION['username']['username'] ?> </a> </li>
                                    <li><a href="./logout.php">LogOUT</a></li>
                                    <li><a href="./giohang.php">đơn phòng</a></li>
                                    <?php else : ?>
                                    <li><a href="./login.php">Login</a></li>                        
                                    <li><a href="./register.php">Register</a></li>
                                    <li><a href="./giohang.php">đơn phòng</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                           
                        </div>
                        </div>
                    </div>
                </div>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
</br>
</br>
</br>
    <!-- Header End -->






<!-- Login -->
<div class="container">
	   <!--header-->
        <div class="header-w3l">
            <h1>Online Login Form</h1> 
        </div>
        <!--End Header-->

        <div class="main-content-agile">
            <div class="sub-main-w3">
                <div class="wthree-pro">
                    <h2 > Login Quick</h2>
                </div>
                <form action="login.php" method="post">
                    <div class="pom-agile">  
                        <?php if(isset($message)) // đỗi màu báo lỗi
                                echo "<p style='color: red'>.".$message."</p>"  ?>
                                
                        <input placeholder="Username" name="username" class="user" type="text" >
                        <span class="icon1"><i class="fa fa-user"></i></span>
                    </div>
                    <div class="pom-agile">
                        <input  placeholder="Password" name="Password" class="pass" type="password" required="">
                        <span class="icon2"><i class="fa fa-unlock" ></i></span>
                    </div>
                    <div class="sub-w3l">
                        <h6><a href="#">Forgot Password?</a></h6>
                        <div class="right-w3l">
                            <input type="submit" value="Login" name="click" >
                        </div>

                    </div>
                </form>
            </div>
        </div>
</div>
<!-- End Login -->

	<!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-logo">
                        <a href="#"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="row pb-50">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Location</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-map-marker"></i>
                            <p> Address </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Reception</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p> 123456789 </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Shuttle Service</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p> 123456789 </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-footer-widget">
                        <h5>Restaurant</h5>
                        <div class="widget-text">
                            <i class="lnr lnr-phone-handset"></i>
                            <p> 123456789 </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
    </footer>
    <!-- Footer Section End -->


	<!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
