<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT farmers FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['farmers'];
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}
if ($_GET["Command"] == "fam_save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "insert into farmers(code, name,contact,address,sdate,user,uniq) values
                ('" . $_GET ['code'] . "','" . $_GET ['name'] . " ','" . $_GET ['contact'] . " ','" . $_GET ['address'] . " ', '" . date("Y-m-d H:i:s") . "','" . $_SESSION["CURRENT_USER"] . "','" . $_GET ['uniq'] . "' )";
 
        $result = $conn->query($sql);

        $sql = "update invpara set farmers=farmers+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Save";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "itemdel") {
    $sql = "update farmers set cancel='1' where id='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
}

?>