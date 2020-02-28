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
                <h2>Shop</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Shop Area Start ##### -->
        <section class="shop-page section-padding-0-100">
            <div class="container">
                <div class="row">
                    <!-- Shop Sorting Data -->
                    <div class="col-12">
                        <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                            <!-- Shop Page Count -->
                            <div class="shop-page-count">
                                <p>Showing 1–9 of 72 results</p>
                            </div>
                            <!-- Search by Terms -->
                            <div class="search_by_terms">
                                <form action="#" method="post" class="form-inline">
                                    <select class="custom-select widget-title">
                                        <option selected>Short by Popularity</option>
                                        <option value="1">Short by Newest</option>
                                        <option value="2">Short by Sales</option>
                                        <option value="3">Short by Ratings</option>
                                    </select>
                                    <select class="custom-select widget-title">
                                        <option selected>Show: 9</option>
                                        <option value="1">12</option>
                                        <option value="2">18</option>
                                        <option value="3">24</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Sidebar Area -->
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="shop-sidebar-area">

                            <!-- Shop Widget -->
                            <div class="shop-widget price mb-50">
                                <h4 class="widget-title">Prices</h4>
                                <div class="widget-desc"  >
                                    <div class="slider-range"  >
                                        <div onclick="pricechange();" data-min="1" data-max="200" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="1" data-value-max="200" data-label-result="Price:">
                                            <div   class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span   class="ui-slider-handle ui-state-default ui-corner-all first-handle" tabindex="0"></span>
                                            <span   class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Price: $1 - $200</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget catagory mb-50">
                                <h4 class="widget-title">Categories</h4>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->

                                    <?php
                                    $content = "";
                                    include './admin/connection_sql.php';
                                    $query = "select count(category) as count,category from item where cancel='0' group by category";

                                    foreach ($conn->query($query) as $row) {
                                        $content = "  <div class='custom-control custom-checkbox d-flex align-items-center mb-2'>
                                                        <input type='checkbox' onClick=\"catsearch('" . $row['category'] . "')\" class='custom-control-input' id=" . $row['category'] . ">
                                                        <label class='custom-control-label' for= " . $row['category'] . ">" . $row['category'] . "<span class='text-muted'>(" . $row['count'] . ")</span></label>
                                                     </div> ";
                                        echo $content;
                                    }
                                    ?>

                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget sort-by mb-50">
                                <h4 class="widget-title">Sort by</h4>
                                <div class="widget-desc">
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                        <label class="custom-control-label" for="customCheck7">New arrivals</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8">
                                        <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                        <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                        <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                    </div>
                                    <!-- Single Checkbox -->
                                    <div class="custom-control custom-checkbox d-flex align-items-center">
                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                        <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Shop Widget -->
                            <div class="shop-widget best-seller mb-50">
                                <h4 class="widget-title">Best Seller</h4>
                                <div class="widget-desc">

                                    <!-- Single Best Seller Products -->
                                    <?php
                                    $content = "";
                                    include './admin/connection_sql.php';
                                    $query = "select * from item  where cancel='0' order by sdate desc limit 4 ";

                                    foreach ($conn->query($query) as $row) {
                                        $content = " <div class='single-best-seller-product d-flex align-items-center'>
                                        <div class='product-thumbnail'>
                                            <a href='shop-details.php'><img  src=admin/" . $row['pic'] . " alt=''></a>
                                        </div>
                                        <div class='product-info'>
                                            <a href='shop-details.php?var=" . $row['id'] . "'  >" . $row['name'] . "</a>
                                            <p href='shop-details.php?var=" . $row['id'] . "'  >RS:" . $row['price'] . "</p>
                                            <div class='ratings'>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
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

                    <!-- All Products Area -->
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop-products-area">
                            <div class="row" id="itemdetails">

                                <!-- Single Product Area -->

                                <?php
                                $content = "";
                                date_default_timezone_set('Asia/Colombo');
                                include './admin/connection_sql.php';
                                $query = "select * from item where cancel='0' order by sdate desc ";

                                foreach ($conn->query($query) as $row) {
                                    $content .= "<div class='col-12 col-sm-6 col-lg-4'  >";
                                    $content .= " <div class='single-product-area mb-50'>";

                                    $content .= " <div class='product-img'>";
                                    $content .= "    <a href='shop-details.php'><img style='width:255px;height:302px;' src=admin/" . $row['pic'] . " alt=''></a>";
 
                                    $content .= "   <div class='product-tag'>";
                                    if (date('m') == (substr($row['sdate'], 5, 2))) {
                                        $content .= "    <a href='#'>Hot</a>";
                                    }
                                    $content .= "</div>";
                                    $content .= " <div class='product-meta d-flex' onclick='ss();'>";
                                    $content .= " <a href='#' class='wishlist-btn'><i class='icon_heart_alt'></i></a>";
                                    $content .= " <a onclick='itemadd(" . $row['id'] . ");'  class='add-to-cart-btn'>Add to cart</a>";
                                    $content .= " <a href='#' class='compare-btn'><i class='arrow_left-right_alt'></i></a>";
                                    $content .= " </div>";
                                    $content .= " </div>";
                                    $content .= " <div class='product-info mt-15 text-center'>";
                                    $content .= " <a href='shop-details.php?var=" . $row['id'] . "'>";
                                    $content .= " <p href='shop-details.php?var=" . $row['id'] . "'>" . $row['name'] . "</p>";
                                    $content .= " </a>";
                                    $content .= " <h6 >RS:" . $row['price'] . "</h6>";
                                    $content .= " </div>";
                                    $content .= " </div>";
                                    $content .= " </div>";
                                }
                                echo $content;
                                ?>

                            </div>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class = "page-item"><a class = "page-link" href = "#">2</a></li>
                                    <li class = "page-item"><a class = "page-link" href = "#"><i class = "fa fa-angle-right"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--##### Shop Area End ##### -->

        <!--##### Footer Area Start ##### -->
        <?php include './footer.php';
        ?>
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
<script src="js/shop.js" type="text/javascript"></script>
 