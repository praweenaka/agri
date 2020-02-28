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
                <h2>SHOP DETAILS</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Breadcrumb Area End ##### -->

        <!-- ##### Single Product Details Area Start ##### -->
        <section class="single_product_details_area mb-50">
            <div class="produts-details--content mb-50">
                <div class="container">
                    <div class="row justify-content-between">
                        <?php
                        $content = "";
                        include './admin/connection_sql.php';
                        $query = "select * from item where id=" . $_GET['var'] . " and cancel='0' order by sdate desc ";

                        foreach ($conn->query($query) as $row) {
                            $content .= "
                        <div class='col-12 col-md-6 col-lg-5'>
                            <div class='single_product_thumb'>
                                <div id='product_details_slider' class='carousel slide' data-ride='carousel'>
                                    <div class='carousel-inner'>
                                        <div class='carousel-item active'>
                                            <a class='product-img' href=admin/" . $row['pic'] . " title='Product Image'>
                                                <img class='d-block w-100' style='width:445px;height:328px;' src=admin/" . $row['pic'] . " alt='1'>
                                            </a>
                                        </div>
                                        <div class='carousel-item'>
                                            <a class='product-img' href=admin/" . $row['pic'] . " title='Product Image'>
                                                <img class='d-block w-100' style='width:445px;height:328px;' src=admin/" . $row['pic'] . " alt='1'>
                                            </a>
                                        </div>
                                        <div class='carousel-item'>
                                            <a class='product-img' href=admin/" . $row['pic'] . " title='Product Image'>
                                                <img class='d-block w-100' style='width:445px;height:328px;' src=admin/" . $row['pic'] . " alt='1'>
                                            </a>
                                        </div>
                                    </div>
                                    <ol class='carousel-indicators'>
                                        <li class='active' data-target='#product_details_slider' data-slide-to='0' style='background-image: url(admin/" . $row['pic'] . ");'>
                                        </li>
                                        <li data-target='#product_details_slider' data-slide-to='1' style='background-image: url(admin/" . $row['pic'] . ");'>
                                        </li>
                                        <li data-target='#product_details_slider' data-slide-to='2' style='background-image: url(admin/" . $row['pic'] . ");'>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                           <div class='col-12 col-md-6'>
                            <div class='single_product_desc'>
                                <h4 class='title'>" . $row['name'] . "</h4>
                                <h4 class='price'>RS:" . $row['price'] . "</h4>
                                <div class='short_overview'>
                                    <p>" . $row['description'] . "</p>
                                </div>

                                <div class='cart--area d-flex flex-wrap align-items-center'>
                                    <!-- Add to Cart Form -->
                                    <form class='cart clearfix d-flex align-items-center' method='post'>
                                        <div class='quantity'>
                                            <span class='qty-minus' onclick='var effect = document.getElementById('qty');
                            var qty = effect.value;
                            if (!isNaN(qty) & amp;
                            & amp;
                            qty & gt;
                            1) effect.value--;
                            return false;
                            '><i class='fa fa-minus' aria-hidden='true'></i></span>
                                            <input type='number' class='qty-text' id='qty' step='1' min='1' max='12' name='quantity' value='1'>
                                            <span class='qty-plus' onclick='var effect = document.getElementById('qty');
                            var qty = effect.value;
                            if (!isNaN(qty))
                            effect.value++;
                            return false;
                            '><i class='fa fa-plus' aria-hidden='true'></i></span>
                                        </div>
                                        <button type='submit' onclick='itemadd(" . $row['id'] . ");' name='addtocart' value='5' class='btn alazea-btn ml-15'>Add to cart</button>
                                    </form>
                                    <!-- Wishlist & Compare -->
                                    <div class='wishlist-compare d-flex flex-wrap align-items-center'>
                                        <a href='#' class='wishlist-btn ml-15'><i class='icon_heart_alt'></i></a>
                            <a href = '#' class = 'compare-btn ml-15'><i class = 'arrow_left-right_alt'></i></a>
                            </div>
                            </div>

                            <div class = 'products--meta'> 
                            <p><span>Category:</span> <span>" . $row['category'] . "</span></p>
                            <p><span>Tags:</span> <span>plants, green, cactus </span></p>
                             <p><span>Description:</span> <span>" . $row['descrip'] . "</span></p>
                            <p>
                            <span>Share on:</span>
                            <span>
                            <a href = '#'><i class = 'fa fa-facebook'></i></a>
                            <a href = '#'><i class = 'fa fa-twitter'></i></a>
                            <a href = '#'><i class = 'fa fa-pinterest'></i></a>
                            <a href = '#'><i class = 'fa fa-google-plus'></i></a>
                            </span>
                            </p>
                           
                            </div>

                            </div>
                           
                            
                            </div>
                            ";
                           
                        }
                         echo $content;
                        ?>
                    </div>
                </div>
            </div>
 
        </section>
        <!--##### Single Product Details Area End ##### -->

        <!--##### Related Product Area Start ##### -->
        <div class = "related-products-area">
            <div class = "container">
                <div class = "row">
                    <div class = "col-12">
                        <!--Section Heading -->
                        <div class = "section-heading text-center">
                            <h2>Related Products</h2>
                        </div>
                    </div>
                </div>

                <div class = "row">
                    <?php
                    $content = "";
                    include './admin/connection_sql.php';
                    $query = "select * from item  where cancel='0' order by sdate desc limit 4 ";

                    foreach ($conn->query($query) as $row) {
                        $content = "  
                            <div class = 'col-12 col-sm-6 col-lg-3'>
                                <div class = 'single-product-area mb-100'>
                                    <!--Product Image -->
                                    <div class = 'product-img'>
                                        <a href = 'shop-details.php'><img style='width:255px;height:302px;' src = admin/" . $row['pic'] . " alt = ''></a>
                                        <!--Product Tag -->
                                        <div class = 'product-tag'>
                                            <a href = '#'>Hot</a>
                                        </div>
                                        <div class = 'product-meta d-flex'>
                                            <a href = '#' class = 'wishlist-btn'><i class = 'icon_heart_alt'></i></a>
                                            <a href = 'cart.php' class = 'add-to-cart-btn'>Add to cart</a>
                                            <a href = '#' class = 'compare-btn'><i class = 'arrow_left-right_alt'></i></a>
                                        </div>
                                    </div>
                                    <!--Product Info -->
                                    <div class = 'product-info mt-15 text-center'>
                                        <a href ='shop-details.php?var=" . $row['id'] . "'>
                                            <p>" . $row['name'] . "</p>
                                        </a>
                                        <h6>RS:" . $row['price'] . "</h6>
                                    </div>
                                </div>
                            </div> ";
                        echo $content;
                    }
                    ?>

                </div>
            </div>
        </div>
        <!--##### Related Product Area End ##### -->

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