<?php

session_start();


require_once ("./admin/connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdata") {


    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";
    if ($_GET['name'] !== "") {
        $sql1 = "select * from post  where  name like '%" . $_GET['name'] . "%' or description like '%" . $_GET['name'] . "%'   order by sdate desc limit 10";
    } else {
        $sql1 = "select * from post   order by sdate desc limit 10";
    }
    //  echo $sql1;
    

    foreach ($conn->query($sql1) as $row) {
        $content .= " <div class='single-latest-post d-flex align-items-center'>
                                                    <div href='single-post.php?p=" . $row['id'] . "' class='post-thumb'>
                                                        <img src=admin/" . $row['pic'] . " alt=''>
                                                    </div>
                                                    <div href='index.php?p=" . $row['id'] . "' class='post-content'>
                                                        <a href='single-post.php?p=" . $row['id'] . "' class='post-title'>
                                                        <h6>" . substr($row['name'], 0, 50) . "</h6>
                                                        </a>
                                                        <a href='single-post.php?p=" . $row['id'] . "' class = 'post-date'>" . $row['sdate'] . "</a>
                                                </div>
                                                </div>
               ";
    }
    $ResponseXML .= "<getdata><![CDATA[$content]]></getdata>";

    $ResponseXML .= "</new>";

    echo $ResponseXML;
}
?>