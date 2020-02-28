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
                <h2>BLOG DEFAULT</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Blog Area Start ##### -->
        <section class="alazea-blog-area mb-100">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-9">
                        <div class="row">
                            <?php
                            $content = "";
                            include './admin/connection_sql.php';
                            $query = "select * from post";

                            foreach ($conn->query($query) as $row) {
//                       <!-- Single Blog Post Area -->
                                $content = "
                            <!-- Single Blog Post Area -->
                            <div class='col-12 col-lg-6'>
                                <div class='single-blog-post mb-50'>
                                    <div class='post-thumbnail mb-30'>
                                         <a href='single-post.php?p=" . $row['id'] . "'><img src=admin/" . $row['pic'] . " alt=''></a>
                                    </div>
                                    <div class='post-content'>
                                      <a href='single-post.php?p=" . $row['id'] . "' id='r' class='post-title'>
                                            <h5>" . substr($row['name'], 1, 86) . "</h5>
                                        </a>
                                        <div class='post-meta'>
                                            <a href='#'><i class='fa fa-clock-o' aria-hidden='true'></i> " . $row['sdate'] . "</a>
                                             <a href='#'><i class='fa fa-user' aria-hidden='true'></i>" . $row['user'] . "</a>
                                        </div>
                                        <p class='post-excerpt'>" . substr($row['description'], 1, 250) . "</p>
                                    </div>
                                </div>
                            </div>
                                ";
                                echo $content;
                            }
                            ?> 


                        </div>

                        <div class="row">
                            <div class="col-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="post-sidebar-area">

                            <!-- ##### Single Widget Area ##### -->
                            <div class="single-widget-area">
                                <form action = "#" method = "get" class = "search-form">
                                    <input type = "search" name = "search" id = "widgetSearch" onkeyup="postsearch();" placeholder = "Search...">
                                    <button type = "submit"><i class = "icon_search"></i></button>
                                </form>
                            </div>

                            <!-- ##### Single Widget Area ##### -->
                            <div class="single-widget-area">
                                <!-- Title -->
                                <div class="widget-title">
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
        </section>
        <!-- ##### Blog Area End ##### -->

        <!-- ##### Footer Area Start ##### -->
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