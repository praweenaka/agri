<footer class = "footer-area bg-img" style = "background-image: url(img/bg-img/3.jpg);">
    <!--Main Footer Area -->
    <link rel="stylesheet" href="style1.css">
    <div class = "main-footer-area">
        <div class = "container">
            <div class = "row">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">

                <!--Single Footer Widget -->
                <div class = "col-12 col-sm-6 col-lg-3">
                    <div class = "single-footer-widget">
                        <div class = "footer-logo mb-30">
                            <a href = "#"><h3>ගොවියා.LK</h3></a>
                        </div>
                      
                        <div class = "social-info">
                            <a href = "https://www.facebook.com/groups/300238173822512/"><i class = "fa fa-facebook" aria-hidden = "true"></i></a>
                            <a href = "#"><i class = "fa fa-twitter" aria-hidden = "true"></i></a>
                            <a href = "#"><i class = "fa fa-google-plus" aria-hidden = "true"></i></a>
                            <a href = "#"><i class = "fa fa-instagram" aria-hidden = "true"></i></a>
                            <a href = "#"><i class = "fa fa-linkedin" aria-hidden = "true"></i></a>
                        </div>
                    </div>
                </div>

                <!--Single Footer Widget -->
                <div class = "col-12 col-sm-6 col-lg-3">
                    <div class = "single-footer-widget">
                        <div class = "widget-title">
                            <h5>QUICK LINK</h5>
                        </div>
                        <nav class = "widget-nav">
                            <ul>
                                <li><a href = "#">Purchase</a></li>
                                <li><a href = "#">FAQs</a></li>
                                <li><a href = "#">Payment</a></li>
                                <li><a href = "#">News</a></li>
                                <li><a href = "#">Return</a></li>
                                <li><a href = "#">Advertise</a></li>
                                <li><a href = "#">Shipping</a></li>
                                <li><a href = "#">Career</a></li>
                                <li><a href = "#">Orders</a></li>
                                <li><a href = "#">Policities</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!--Single Footer Widget -->
                <div class = "col-12 col-sm-6 col-lg-3">
                    <div class = "single-footer-widget">
                        <div class = "widget-title">
                            <h5>BEST SELLER</h5>
                        </div>

                        <!--Single Best Seller Products -->
                        <?php
                        $content = "";
                        include './admin/connection_sql.php';
                        $query = "select * from item  where cancel='0' order by sdate desc limit 2";

                        foreach ($conn->query($query) as $row) {
//                       <!-- Single Blog Post Area -->
                            $content = " 
                                <div class = 'single-best-seller-product d-flex align-items-center'>
                                    <div class = 'product-thumbnail'>
                                        <a href = 'shop-details.php?var=" . $row['id'] . "'><img src = admin/" . $row['pic'] . " alt = ''></a>
                                    </div>
                                    <div class = 'product-info'>
                                        <a href = 'shop-details.php?var=" . $row['id'] . "'>" . $row['name'] . "</a>
                                        <p>RS:" . $row['price'] . "</p>
                                    </div>
                                </div>";
                            echo $content;
                        }
                        ?>


                    </div>
                </div>

                <!--Single Footer Widget -->
                <div class = "col-12 col-sm-6 col-lg-3">
                    <div class = "single-footer-widget">
                        <div class = "widget-title">
                            <h5>CONTACT</h5>
                        </div>

                            <p><span>Address:</span> 105.5 Ihalagama,Kirindiwela</p>
                            <p><span>Phone:</span> 0711602438</p>
                            <p><span>Email:</span> archchi@gmail.com</p>
                            <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                            <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer Bottom Area -->
    <div class = "footer-bottom-area">
        <div class = "container">
            <div class = "row">
                <div class = "col-12">
                    <div class = "border-line"></div>
                </div>
                <!--Copywrite Text -->
                <div class = "col-12 col-md-6">
                    <div class = "copywrite-text">
                        <p> <a href = "#" target = "_blank"></a></p>
                    </div>
                </div>
                <!--Footer Nav -->
                <div class = "col-12 col-md-6">
                    <div class = "footer-nav">
                        <nav>
                            <ul>
                                <li><a href = "#">Home</a></li>
                                <li><a href = "#">About</a></li>
                                <li><a href = "#">Service</a></li>
                                <li><a href = "#">Portfolio</a></li>
                                <li><a href = "#">Blog</a></li>
                                <li><a href = "#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>