<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Hotel Template">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel</title>

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
                                <li><a href="profile.php"><?php echo $_SESSION['username']['username'] ?></a></li>
                                <li><a href="./logout.php">Logout</a></li>
                                <li><a href="./giohang.php">Đơn phòng</a></li>
                                <?php else : ?>
                                <li><a href="./login.php">Login</a></li>                        
                                <li><a href="./register.php">Register</a></li>
                                <li><a href="./giohang.php">Đơn phòng</a></li>
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

    <!-- Hero Slider Begin -->
    <div class="hero-slider">
        <div class="slider-item">
            <div class="single-slider-item set-bg" data-setbg="img/slider-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>We hope you’ll enjoy <br/> your stay. </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-nav">
                                <a href="#" class="single-slider-nav">
                                    <img src="img/nav-1.jpg" alt="">
                                    <div class="nav-text active">
                                        <p>Pool<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                                
                                <a href="#" class="single-slider-nav last">
                                    <img src="img/nav-3.jpg" alt="">
                                    <div class="nav-text">
                                        <p>Restaurant<i class="lnr lnr-arrow-right"></i></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Slider End -->

    <!-- Room Availability Section Begin -->
    <section class="room-availability spad">
        <div class="container">
            <div class="room-check">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="room-item">
                            <div class="room-pic-slider room-pic-item owl-carousel">
                                <div class="room-pic">
                                    <img src="img/room-slider/room-1.jpg" alt="">
                                </div>
                                <div class="room-pic">
                                    <img src="img/room-slider/room-2.jpg" alt="">
                                </div>                                
                            </div>
                            <div class="room-text">
                                <div class="room-title">
                                    <h2>Junior Suite</h2>
                                    <div class="room-price">
                                        <span>From</span>
                                        <h2>$252</h2>
                                    </div>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="check-form">
                            <h2>Check Availability</h2>
                            <form action="#">
                                <div class="datepicker">
                                    <div class="date-select">
                                        <p>From</p>
                                        <input type="text" class="datepicker-1" value="dd / mm / yyyy">
                                        <img src="img/calendar.png" alt="">
                                    </div>
                                    <div class="date-select to">
                                        <p>To</p>
                                        <input type="text" class="datepicker-2" value="dd / mm / yyyy">
                                        <img src="img/calendar.png" alt="">
                                    </div>
                                </div>
                                <div class="room-quantity">
                                    <div class="single-quantity">
                                        <p>Adults</p>
                                        <div class="pro-qty"><input type="text" value="0"></div>
                                    </div>
                                    <div class="single-quantity">
                                        <p>Children</p>
                                        <div class="pro-qty"><input type="text" value="0"></div>
                                    </div>
                                    <div class="single-quantity last">
                                        <p>Rooms</p>
                                        <div class="pro-qty"><input type="text" value="0"></div>
                                    </div>
                                </div>
                                <div class="room-selector">
                                    <p>Room</p>
                                    <select class="suit-select">
                                        <option>Eg. Master suite</option>
                                        <option value="">Double Room</option>
                                        <option value="">Single Room</option>
                                        <option value="">Special Room</option>
                                    </select>
                                </div>
                                <button type="button">CHECK Availability<i class="lnr lnr-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Availability Section End -->

    <!-- Facilities Section Begin -->
    <div class="facilities-section spad">
        <div class="container">
            <div class="facilities-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h1>Facilities</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="facilities-img set-bg" data-setbg="img/facilities-1.jpg"></div>
                    </div>
                    <div class="col-lg-6 p-0 ">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <h2>Wellness Center</h2>
                                <p> Comment. </p>
                                <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-1 order-2">
                        <div class="facilities-text-warp">
                            <div class="facilities-text">
                                <h2>Wellness Center</h2>
                                <p> Comment. </p>
                                <a href="#" class="primary-btn fac-btn">Visit Center <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0 order-lg-2 order-1">
                        <div class="facilities-img set-bg" data-setbg="img/facilities-2.jpg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Section End -->


    <!-- Follow Instagram Section Begin -->
    <section class="follow-instagram">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Follow us on admin dashbroah</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Follow Instagram Section End -->

    <!-- Footer Room Pic Section Begin -->
    <div class="footer-room-pic">
        <div class="container-fluid">
            <div class="row">
                <img src="img/room-footer-pic/room-1.jpg" alt="">
                <img src="img/room-footer-pic/room-2.jpg" alt="">
                <img src="img/room-footer-pic/room-3.jpg" alt="">
                <img src="img/room-footer-pic/room-4.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- Footer Room Pic Section End -->

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