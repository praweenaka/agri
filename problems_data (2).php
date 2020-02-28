<?php

session_start();

include './admin/connection_sql.php';
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');


if ($_GET["Command"] == "problems") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql = "insert into problems(code, name, email,description, sdate) values
                ('" . $_GET ['code'] . "','" . $_GET ['name'] . "', '" . $_GET ['email'] . "', '" . $_GET ['descrip'] . "', '" . date("Y-m-d H:i:s") . "' )";

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


if ($_GET["Command"] == "sub_comment") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        if ($_SESSION["CURRENT_USER"] != "") {
            $user = $_SESSION["CURRENT_USER"];
        } else {
            $user = 'user';
        }
        $sql = "insert into sub_comment(main_comment,subcomment,user_nm,sdate) values
                ('" . $_GET['cmnt'] . "','" . $_GET['subcom'] . "','" . $user . "', '" . date("Y-m-d H:i:s") . "')";

        $result = $conn->query($sql);


        $conn->commit();

        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "getdata") {


    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
    if ($_GET['name'] !== "") {
        $sql1 = "select * from farmers  where  name like '%" . $_GET['name'] . "%' or address like '%" . $_GET['name'] . "%'   order by sdate desc limit 10";
    } else {
        $sql1 = "select * from farmers  order by sdate desc limit 10";
    }


    foreach ($conn->query($sql1) as $row) {
        $content .= "
                    <div class = 'single-latest-post d-flex align-items-center'>
                        <div class = 'post-thumb'>
                            <img src = 'img/bg-img/30.jpg' alt = ''>
                        </div>
                        <div class = 'post-content'>
                            <a href = '#' class = 'post-title'><h6>" . $row['name'] . "</h6></a>
                            <a href = '#' class = 'post-date'>" . $row['contact'] . "</a>
                            <a href = '#' class = 'post-date'>" . $row['address'] . "</a>
                    </div>
                    </div>
               ";
    }
    $ResponseXML .= "<getdata1><![CDATA[$content]]></getdata1>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "load") {


    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $tb = "";
    $tb .= "<new>";
    $query = "select * from problems order by sdate desc ";

    foreach ($conn->query($query) as $row) {
        $idd = "comm" . $row['id'];
        $tb .= "<ol > ";
        $tb .= " <li class = 'single_comment_area'>";
        $tb .= " <div class = 'comment-wrapper d-flex'>";

        $tb .= " <div class = 'comment-author'>";
        $tb .= " <img src = 'img/bg-img/37.jpg' alt = ''>";
        $tb .= " </div>";

        $tb .= " <div class = 'comment-content'>";
        $tb .= " <div class = 'd-flex align-items-center justify-content-between'>";
        $tb .= " <h5>" . $row['name'] . "</h5>";
        $tb .= " <span class = 'comment-date'>" . $row['sdate'] . "</span>";
        $tb .= " </div>";
        $tb .= " <p>" . $row['description'] . "</p>";
        $tb .= " </div>";
        $tb .= " </div>";
        $t = 0;
        $sql = "SELECT * FROM sub_comment  where main_comment = '" . $row['id'] . " '";

        foreach ($conn->query($sql) as $row1) {

            $tb .= " <ol class = 'children'>";
            $tb .= " <li class = 'single_comment_area'>";
            $tb .= " <div class = 'comment-wrapper d-flex'>";

            $tb .= " <div class = 'comment-author'>";
            $tb .= " <img src = 'img/bg-img/38.jpg' alt = ''>";
            $tb .= " </div>";

            $tb .= " <div class = 'comment-content'>";
            $tb .= " <div class = 'd-flex align-items-center justify-content-between'>";
            $tb .= " <h5>" . $row1['user_nm'] . "</h5>";
            $tb .= " <span class = 'comment-date'>" . $row1['sdate'] . "</span>";
            $tb .= " </div>";
            $tb .= " <p>" . $row1['subcomment'] . "</p>";


            $tb .= "   </div>";
            $tb .= "    </div>";
            $tb .= "   </li>";
            $tb .= " </ol>";
        }
        $tb .= " <ol class = 'children'>";
        $tb .= " <li class = 'single_comment_area'>";
        $tb .= " <div class = 'comment-wrapper d-flex'>";

        $tb .= " <div class = 'comment-author'>";
        $tb .= " <img src = 'img/bg-img/38.jpg' alt = ''>";
        $tb .= " </div>";

        $tb .= " <input type = 'text'   class='form-control' id='$idd' placeholder='Reply'>";
        $tb .= "<a onclick=\"reply(" . $row["id"] . ");\" style='color: white; height:40px;' class='btn btn-primary'>
                                                    <span class='fa fa-save'></span> &nbsp;&nbsp;&nbsp; Reply
                                                </a> ";
//        $tb .= " <a class = 'active' onclick=\"reply(" . $row["id"] . ");\" >Reply</a>&nbsp;&nbsp;&nbsp;";

        $tb .= "   </div>";
        $tb .= "    </div>";
        $tb .= "   </li>";
        $tb .= " </ol>";

        $tb .= "  </li>";

        $tb .= " </ol>";
        $t = $t + 1;
    }

    $tb .= "</new>";

    echo $tb;
}
?>