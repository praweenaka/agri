<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Title -->
        <title>Alazea - Gardening   </title>

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
                        <div class="blog-posts-area">

                            <!-- Post Details Area -->
                            <?php
                            $content = "";
                            include './admin/connection_sql.php';
                            $query = "select * from post where id=" . $_GET['p'] . "";

                            foreach ($conn->query($query) as $row) {
                                $content = " <div class='single-post-details-area'>
                                <div class='post-content'>
                                    <h4 class='post-title'>" . substr($row['name'], 1, 86) . "</h4>
                                    <div class='post-meta mb-30'>
                                        <a href='#'><i class='fa fa-clock-o' aria-hidden='true'></i>" . $row['sdate'] . "</a>
                                <a href = '#'><i class = 'fa fa-user' aria-hidden = 'true'></i>" . $row['user'] . "</a>
                                </div>
                                <div class = 'post-thumbnail mb-30'>
                                <img src = admin/" . $row['pic'] . " alt = ''>
                                </div>
                                <p>" . $row['description'] . "</>
                                </div>
                                </div>";
                                echo $content;
                            }
                            ?>

                            <!-- Post Tags & Share -->
                            <div class="post-tags-share d-flex justify-content-between align-items-center">
                                <!-- Tags -->
                                <ol class="popular-tags d-flex align-items-center flex-wrap">
                                    <li><span>Tag:</span></li>
                                    <li><a href="#">PLANTS</a></li>
                                    <li><a href = "#">CACTUS</a></li>
                                </ol>
                                <!--Share -->
                                <div class = "post-share">
                                    <a href = "#"><i class = "fa fa-facebook" aria-hidden = "true"></i></a>
                                    <a href = "#"><i class = "fa fa-twitter" aria-hidden = "true"></i></a>
                                    <a href = "#"><i class = "fa fa-google-plus" aria-hidden = "true"></i></a>
                                    <a href = "#"><i class = "fa fa-instagram" aria-hidden = "true"></i></a>
                                </div>
                            </div>

                            <!--Comment Area Start -->
                            <div class = "comment_area clearfix">
                                <h4 class = "headline">2 Comments</h4>

                                <ol>
                                    <!--Single Comment Area -->
                                    <li class = "single_comment_area">
                                        <div class = "comment-wrapper d-flex">
                                            <!--Comment Meta -->
                                            <div class = "comment-author">
                                                <img src = "img/bg-img/37.jpg" alt = "">
                                            </div>
                                            <!--Comment Content -->
                                            <div class = "comment-content">
                                                <div class = "d-flex align-items-center justify-content-between">
                                                    <h5>Simona Halep</h5>
                                                    <span class = "comment-date">09:00 AM, 20 Jun 2018</span>
                                                </div>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                                                <a class = "active" href = "#">Reply</a>
                                            </div>
                                        </div>
                                        <ol class = "children">
                                            <li class = "single_comment_area">
                                                <div class = "comment-wrapper d-flex">
                                                    <!--Comment Meta -->
                                                    <div class = "comment-author">
                                                        <img src = "img/bg-img/38.jpg" alt = "">
                                                    </div>
                                                    <!--Comment Content -->
                                                    <div class = "comment-content">
                                                        <div class = "d-flex align-items-center justify-content-between">
                                                            <h5>Rafael Nadal</h5>
                                                            <span class = "comment-date">09:30 AM, 20 Jun 2018</span>
                                                        </div>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                                                        <a class = "active" href = "#">Reply</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                    <li class = "single_comment_area">
                                        <div class = "comment-wrapper d-flex">
                                            <!--Comment Meta -->
                                            <div class = "comment-author">
                                                <img src = "img/bg-img/39.jpg" alt = "">
                                            </div>
                                            <!--Comment Content -->
                                            <div class = "comment-content">
                                                <div class = "d-flex align-items-center justify-content-between">
                                                    <h5>Maria Sharapova</h5>
                                                    <span class = "comment-date">02:20 PM, 20 Jun 2018</span>
                                                </div>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetu adipisci velit, sed quia non numquam eius modi</p>
                                                <a class = "active" href = "#">Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                            </div>

                            <!--Leave A Comment -->
                            <div class = "leave-comment-area clearfix">
                                <div class = "comment-form">
                                    <h4 class = "headline">Leave A Comment</h4>

                                    <div class = "contact-form-area">
                                        <!--Comment Form -->
                                        <form action = "#" method = "post">
                                            <div class = "row">
                                                <div class = "col-12 col-md-6">
                                                    <div class = "form-group">
                                                        <input type = "text" class = "form-control" id = "contact-name" placeholder = "Name">
                                                    </div>
                                                </div>
                                                <div class = "col-12 col-md-6">
                                                    <div class = "form-group">
                                                        <input type = "email" class = "form-control" id = "contact-email" placeholder = "Email">
                                                    </div>
                                                </div>
                                                <div class = "col-12">
                                                    <div class = "form-group">
                                                        <textarea class = "form-control" name = "message" id = "message" cols = "30" rows = "10" placeholder = "Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class = "col-12">
                                                    <button type = "submit" class = "btn alazea-btn">Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Blog Sidebar Area -->
                    <div class = "col-12 col-sm-9 col-md-3">
                        <div class = "post-sidebar-area">

                            <!--##### Single Widget Area ##### -->
                            <div class = "single-widget-area">
                                <form action = "#" method = "get" class = "search-form">
                                    <input type = "search" name = "search" id = "widgetSearch" onkeyup="postsearch();" placeholder = "Search...">
                                    <button type = "submit"><i class = "icon_search"></i></button>
                                </form>
                            </div>

                            <!--##### Single Widget Area ##### -->
                            <div class = "single-widget-area">
                                <!--Title -->
                                <div class = "widget-title">
                                    <h4>Recent post</h4>
                                </div>
                                <div id="searchdiv">
                                    <!--Single Latest Posts -->
                                    <?php
                                    $content = "";
                                    include './admin/connection_sql.php';
                                    $query = "select * from post  order by sdate limit 25";

                                    foreach ($conn->query($query) as $row) {
                                        $content = " <div class='single-latest-post d-flex align-items-center'>
                                                    <div href='single-post.php?p=" . $row['id'] . "' class='post-thumb'>
                                                        <img src=admin/" . $row['pic'] . " alt=''>
                                                    </div>
                                                    <div href='index.php?p=" . $row['id'] . "' class='post-content'>
                                                        <a href='single-post.php?p=" . $row['id'] . "' class='post-title'>
                                                        <h6>" . substr($row['name'], 0, 50) . "</h6>
                                                        </a>
                                                        <a href='single-post.php?p=" . $row['id'] . "' class = 'post-date'>" . $row['sdate'] . "</a>
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
            </div>
        </section>
        <!--##### Blog Content Area End ##### -->

        <!--##### Footer Area Start ##### -->
        <?php include './footer.php'; ?>
        <!-- ##### Footer Area End ##### -->

        <!-- ##### All Javascript Files ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
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
<script src="js/single-post.js" type="text/javascript"></script>