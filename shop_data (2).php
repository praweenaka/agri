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
    // if($_GET["cat"]!=""){
         $query = "select * from item where category='" . $_GET["cat"] . "' order by sdate";
    // }else{
    //      $query = "select * from item";
    // }
   
// echo $query;
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
                                
    $ResponseXML .= "<content><![CDATA[" . $content . "]]></content>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>