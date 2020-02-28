<?php

session_start();

include './admin/connection_sql.php';
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "catsearch") {
    header('Content-Type: text/xml');
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $content = "";

    $query = "select * from item where category='" . $_GET["cat"] . "'";

    foreach ($conn->query($query) as $row) {
        $content .= "<div class='col-12 col-sm-6 col-lg-4'>
                    <div class='single-product-area mb-50'>
                        <!-- Product Image -->
                        <div class='product-img'>
                            <a href='shop-details.php'><img src=admin/" . $row['pic'] . " alt=''></a>
                            <!-- Product Tag -->
                            <div class='product-tag'>
                                <a href='#'>Hot</a>
                            </div>
                            <div class='product-meta d-flex'>
                                <a href='#' class='wishlist-btn'><i class='icon_heart_alt'></i></a>
                                <a href='cart.html' class='add-to-cart-btn'>Add to cart</a>
                                <a href='#' class='compare-btn'><i class='arrow_left-right_alt'></i></a>
                            </div>
                        </div>
                        <!-- Product Info -->
                        <div class='product-info mt-15 text-center'>
                            <a href='shop-details.php'>
                                 <p>" . $row['name'] . "</p>
                            </a>
                            <h6>$" . $row['price'] . "</h6>
                        </div>
                    </div>
                </div>

            ";
    }
    $ResponseXML .= "<content><![CDATA[" . $content . "]]></content>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>