<?php

session_start();

include './admin/connection_sql.php';
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');


if ($_GET["Command"] == "addcart") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql1 = "SELECT * FROM item where id='" . $_GET ['id'] . "'";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch();

        $sql = "insert into cart(code,name,user,qty, sdate,pic,price) values
                ('" . $_GET ['id'] . "','" . $row1["name"] . "','" . $_SESSION["CURRENT_USER"] . "','1', '" . date("Y-m-d H:i:s") . "','" . $row1["pic"] . "','" . $row1["price"] . "' )";
echo $sql;
        $result = $conn->query($sql);

//        $sql = "update problems set problems=problems+1";
//        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delcart") {

    $sql = " DELETE FROM cart WHERE id='" . $_GET ['id'] . "'";

    $result = $conn->query($sql);
}
?>