<?php
if (file_exists('@dmin/action/DBConnect.php')) {
    include_once '@dmin/action/DBConnect.php';
}

if (file_exists('../@dmin/action/DBConnect.php')) {
    include_once '../@dmin/action/DBConnect.php';
}

//product
$sql_1 = "SELECT * FROM navigation WHERE category=? AND tab_stat=1";
$query_1 = $conn->prepare($sql_1);
$query_1->execute(['product']);
$product = $query_1->fetchAll();

//services
$sql_2 = "SELECT * FROM navigation WHERE category=? AND tab_stat=1";
$query_2 = $conn->prepare($sql_2);
$query_2->execute(['services']);
$services = $query_2->fetchAll();

//designing
$sql_3 = "SELECT * FROM navigation WHERE category=? AND tab_stat=1";
$query_3 = $conn->prepare($sql_3);
$query_3->execute(['designing']);
$designing = $query_3->fetchAll();

//echo "<pre>";
//print_r($product);
//print_r($services);
//print_r($designing);
//echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,900,700,500,300' rel='stylesheet' type='text/css'>
    <!-- Flaticon CSS -->
    <link href="fonts/flaticon/flaticon.css" rel="stylesheet">
    <!-- font-awesome CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- owl.carousel CSS -->
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <!-- Offcanvas CSS -->
    <link href="css/hippo-off-canvas.css" rel="stylesheet">
    <!-- animate CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.1.min.js"></script>
    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/vendor/html5shim.js"></script>
    <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>


<body>
<div id="st-container" class="st-container" style="background: grey">
    <div class="st-pusher">
        <div class="st-content">
            <div class="st-content-inner">
                <header>
                    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- offcanvas-trigger-effects -->
                                <h1 class="logo"><a class="navbar-brand" href="index"><img height='45px' width="45px" src="img/logo.png"
                                                                                           alt="Logo"></a></h1>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="index">Home</a></li>

                                    <li><a href="about">About Us</a></li>


                                    <li class="dropdown"><a href="productList?id=product">Products <b class="caret"></b></a>
                                        <!-- submenu-wrapper -->
                                        <div class="submenu-wrapper submenu-wrapper-topbottom">
                                            <div class="submenu-inner  submenu-inner-topbottom">
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    foreach ($product as $item1) {
                                                        echo "<li title='" . $item1['title'] . "'><a href='product?id=" . $item1['id'] . "'>" . substr($item1['title'], 0, 20) . "</a></li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div><!-- /.submenu-inner -->
                                        </div> <!-- /.submenu-wrapper -->
                                    </li>

                                    <li class="dropdown"><a href="productList?id=services">Services <b
                                                    class="caret"></b></a>
                                        <!-- submenu-wrapper -->
                                        <div class="submenu-wrapper submenu-wrapper-topbottom">
                                            <div class="submenu-inner  submenu-inner-topbottom">
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    foreach ($services as $item2) {
                                                        echo "<li title='" . $item2['title'] . "'><a href='product?id=" . $item2['id'] . "'>" . substr($item2['title'], 0, 20) . "</a></li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div><!-- /.submenu-inner -->
                                        </div> <!-- /.submenu-wrapper -->
                                    </li>


                                    <li class="dropdown"><a href="productList?id=designing">Electrical Design <b
                                                    class="caret"></b></a>
                                        <!-- submenu-wrapper -->
                                        <div class="submenu-wrapper submenu-wrapper-topbottom">
                                            <div class="submenu-inner  submenu-inner-topbottom">
                                                <ul class="dropdown-menu">
                                                    <?php
                                                    foreach ($designing as $item3) {
                                                        echo "<li title='" . $item3['title'] . "'><a href='product?id=" . $item3['id'] . "'>" . substr($item3['title'], 0, 20) . "</a></li>";
                                                    }
                                                    ?>                                                </ul>
                                            </div><!-- /.submenu-inner -->
                                        </div> <!-- /.submenu-wrapper -->
                                    </li>
                                    <li><a href="gallery">Gallery</a></li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container -->
                    </nav>
                </header>