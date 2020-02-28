<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
        <!-- Preloader -->
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-circle"></div>
            <div class="preloader-img">
                <img src="img/core-img/leaf.png" alt="">
            </div>
        </div>

        <!-- ##### Header Area Start ##### -->
        <?php include './header.php'; ?>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Breadcrumb Area Start ##### -->
        <div class="breadcrumb-area">
            <!-- Top Breadcrumb Area -->
            <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
                <h2>SINGLE BLOG POST</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Single Blog Post</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->



        <!-- ##### Blog Content Area Start ##### -->
        <section class="blog-content-area section-padding-0-100">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Blog Posts Area -->
                    <div class="col-12 col-md-9">

                        <!-- Leave A Comment -->
                        <div class="leave-comment-area clearfix">
                            <div class="comment-form">
                                <h4 class="headline">Type Your Problems</h4>

                                <div class="contact-form-area">
                                    <!-- Comment Form -->
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="message" id="descrip" required="" cols="30" rows="10" placeholder="Problem.."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <a onclick="save_inv();" style="color: white" class="btn alazea-btn">
                                                    <span class="fa fa-save"></span> &nbsp; Post Problems
                                                </a> 
                                                <input type="hidden" id="uniq" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"></div>

                        <div class="blog-posts-area">
                            <!-- Comment Area Start -->
                            <div class='comment_area clearfix' id='itemdetails'>

                            </div>
                        </div>
                    </div>

                    <!-- Blog Sidebar Area -->
                    <div class="col-12 col-sm-9 col-md-3">
                        <div class="post-sidebar-area">

                            <!-- ##### Single Widget Area ##### -->
                            <div class="single-widget-area">
                                <form action="#" method="get" class="search-form">
                                    <input type = "search" name = "search" id = "widgetSearch" onkeyup="farmersearch();" placeholder = "Search...">
                                    <button type = "submit"><i class = "icon_search"></i></button>
                                </form>
                            </div>

                            <!--##### Single Widget Area ##### -->
                            <div class = "single-widget-area">
                                <!--Title -->
                                <div class = "widget-title">
                                    <h4>Contact List</h4>
                                </div>

                                <!--Single Latest Posts -->
                                <div id="searchdiv">
                                    <?php
                                    $content = "";
                                    include './admin/connection_sql.php';
                                    $query = "select * from farmers order by sdate desc ";

                                    foreach ($conn->query($query) as $row) {
                                        $content = "
                                            <div class = 'single-latest-post d-flex align-items-center'>
                                                <div class = 'post-thumb'>
                                                    <img src = 'img/bg-img/30.jpg' alt = ''>
                                                </div>
                                                <div class = 'post-content'>
                                                    <a href = '#' class = 'post-title'><h6>" . $row['name'] . "</h6></a>
                                                    <a href = '#' class = 'post-date'>" . $row['contact'] . "</a>
                                                    <a href = '#' class = 'post-date'>" . $row['address'] . "</a>
                                            </div>
                                            </div>
                                       ";
                                        echo $content;
                                    }
                                    ?>

                                </div>
                            </div>

                            <!--##### Single Widget Area ##### -->
                            <div class = "single-widget-area">
                                <!--Title -->
                                <div class = "widget-title">
                                    <h4>Tag Cloud</h4>
                                </div>
                                <!--Tags -->
                                <ol class = "popular-tags d-flex flex-wrap">
                                    <li><a href = "#">PLANTS</a></li>
                                    <li><a href = "#">NEW PRODUCTS</a></li>
                                    <li><a href = "#">CACTUS</a></li>
                                    <li><a href = "#">DESIGN</a></li>
                                    <li><a href = "#">NEWS</a></li>
                                    <li><a href = "#">TRENDING</a></li>
                                    <li><a href = "#">VIDEO</a></li>
                                    <li><a href = "#">GARDEN DESIGN</a></li>
                                </ol>
                            </div>

                            <!--##### Single Widget Area ##### -->
                            <div class = "single-widget-area">
                                <!--Title -->
                                <div class = "widget-title">
                                    <h4>BEST SELLER</h4>
                                </div>
                                <?php
                                $content = "";
                                include './admin/connection_sql.php';
                                $query = "select * from item  order by sdate limit 3";

                                foreach ($conn->query($query) as $row) {
                                    $content = " 
                                <!--Single Best Seller Products -->
                                <div class = 'single-best-seller-product d-flex align-items-center'>
                                    <div class = 'product-thumbnail'>
                                        <a href = 'shop-details.php'><img src = admin/" . $row['pic'] . " alt = ''></a>
                                    </div>
                                    <div class = 'product-info'>
                                        <a href='shop-details.php?var=" . $row['id'] . "'>" . $row['name'] . "</a>
                                        <p>" . $row['price'] . "</p>
                                        <div class = 'ratings'>
                                            <i class = 'fa fa-star'></i>
                                            <i class = 'fa fa-star'></i>
                                            <i class = 'fa fa-star'></i>
                                            <i class = 'fa fa-star'></i>
                                            <i class = 'fa fa-star'></i>
                                        </div>
                                    </div>
                                </div>";
                                    echo $content;
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--##### Blog Content Area End ##### -->

        <!--##### Footer Area Start ##### -->
        <?php include './footer.php'; ?>
        <!--##### Footer Area End ##### -->

        <!--##### All Javascript Files ##### -->
        <!--jQuery-2.2.4 js -->
        <script src = "js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/bootstrap/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <!-- All Plugins js -->
        <script src="js/plugins/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
    </body>

</html>
<script src="js/problems.js" type="text/javascript"></script>

<script>load();</script>