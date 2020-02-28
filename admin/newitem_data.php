<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT newitem FROM invpara";
    $result = $conn->query($sql);

    $row = $result->fetch();
    $no = $row['newitem'];
    $uniq = uniqid();
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "<uniq><![CDATA[$uniq]]></uniq>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}
if ($_POST["Command"] == "save_inv") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
//        $sql = "delete from addmeal_item where room_no = '" . $_GET ['room_no'] . "'";
//        $result = $conn->query($sql);
//  
        $target_dir = "img/bg-img/";
        $imageFileType = $_FILES["file"]["tmp_name"];
        $path = $_FILES["file"]["name"];
        $imageFileType = pathinfo($path, PATHINFO_EXTENSION);

        $no = uniqid();

        $target_file = $target_dir . $no . "." . $imageFileType;
        $sfile = explode(".", $target_file);

        $sfile = $no . "." . $sfile[1];
        $uploadOk = 1;

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

        $mok = "no";
//while ($mok == "ok") {
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $mok = "ok";
        } else {
            $mok = "ok";
        }
//} 

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
//            echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        if($_SESSION["CURRENT_USER"]=='user'){
            $flag='1';
        }else{
            $flag='0';
        }
        
        $sql = "insert into item(code, name, category, price, sdate, pic,user,uniq,descrip,flag) values
                ('" . $_POST ['code'] . "','" . $_POST ['name'] . "', '" . $_POST ['category'] . "', $'" . $_POST ['price'] . "', '" . date("Y-m-d H:i:s") . "', '" . $target_file . "','" . $_SESSION["CURRENT_USER"] . "','" . $_POST ['uniq'] . "','" . $_POST ['descrip'] . "','".$flag."')";

        $result = $conn->query($sql);

        $sql = "update invpara set newitem=newitem+1";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "itemdel") {
    $sql = "update item set cancel='1' where id='" . $_GET['id'] . "'";
    $result = $conn->query($sql);
}
?>