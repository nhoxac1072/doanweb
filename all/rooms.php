<?php
session_start();
include("connection/connection.php");
              // echo "  Số dòng:"  . $stm->rowCount();    
    $sql="Select * from loaiphong";
    $stm=$conn->query($sql);

    $data1=$stm->fetchAll(PDO::FETCH_ASSOC);
    
    if(isset($_POST['timkiem'])) 
    {
        $loai=$_POST['loaiphong'];
        if($loai != "tatca")  // tất cả là toàn bộ danh sách phòng
        {
            $sql="Select * from phong where MaLoai ='$loai'";
            $stm=$conn->query($sql);
            $data=$stm->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $sql="Select * from phong ";
            $stm=$conn->query($sql);
            $data=$stm->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    else if(!isset($_POST['timkiem']))
    {
        $sql="Select * from phong";
        $stm=$conn->query($sql);
        $data=$stm->fetchAll(PDO::FETCH_ASSOC);

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
                                        <li><a href="profile.php"><?php echo $_SESSION['username']['username'] ?> </a> </li>
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
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/rooms-bg.jpg">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Rooms</h1>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
             
            <form action="rooms.php" method="post">
                <table align="center">   
                       
                    <tr>
                        <td> Loại phòng : </td>
                        <td>
                            <select name="loaiphong" >
                                <option value="tatca"> Tất cả </option>
                                <?php 
                                foreach ($data1 as $key => $value)  // data1 là dữ liệu của bảng loại phòng
                                {
                                    ?>
                                    <option value="<?php echo $value['MaLoai'] ?>">
                                        <?php echo $value['MaLoai'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </td>
                        <td colspan="2">
                            <input type="submit" value="Tìm kiếm" name="timkiem">
                        </td>
                    </tr>
                </table>
            </form>
    <!-- Hero Section End -->

    <!-- Rooms Section Begin -->
    <section class="room-section spad">
        <div class="container">
            <?php
                foreach($data as $key=>$value) // data lấy từ câu lệnh đầu trang
                {
            ?>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
                                <img src="img/<?php echo $value['photo'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        
                        <div class="room-text">
                            <div class="room-title">
                                <h3><?php echo $value['Tenphong'] ?></h3>
                                <div class="room-price">
                                    <span>From</span>
                                    <h2><?php echo $value['price'] ?>$</h2>
                                    <sub>/night</sub>
                                </div>
                            </div>
                            <div class="room-desc">
                                <p>mã :<?php echo $value['Maphong'] ?></p>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>Smart TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <span>High Wi-fii</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>
                                <div class="room-info last">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <span>Pool</span>
                                </div>
                            </div>
                            <div class="room-title">
                                <a href="./insert_Cart.php?Maphong=<?php echo $value['Maphong'] ?>&price=<?php echo $value['price'] ?>&action=them" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>
                                <div class="room-price">
                                    <h5 name="soluong"> <?php echo "Số lượng:"." ".$value['Soluong'] ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="rooms-page-item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-pic-slider owl-carousel">
                            <div class="single-room-pic">
                                <img src="img/room/rooms-5.jpg" alt="">
                            </div>
                            <div class="single-room-pic">
                                <img src="img/room/rooms-2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="room-text">
                            <div class="room-title">
                                <h2>Standard Room</h2>
                                <div class="room-price">
                                    <span>From</span>
                                    <h2>$99</h2>
                                    <sub>/night</sub>
                                </div>
                            </div>
                            <div class="room-desc">
                                <p> Describe. </p>
                            </div>
                            <div class="room-features">
                                <div class="room-info">
                                    <i class="flaticon-019-television"></i>
                                    <span>Smart TV</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <span>High Wi-fii</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <span>AC</span>
                                </div>
                                <div class="room-info">
                                    <i class="flaticon-036-parking"></i>
                                    <span>Parking</span>
                                </div>
                                <div class="room-info last">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <span>Pool</span>
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Book Now <i class="lnr lnr-arrow-right"></i></a>
                        </div>
                    </div>
                </div> <!-- khung mẫu -->
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->

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