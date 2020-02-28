<?php
session_start();
?> 
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>New Item</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">

                <input type="hidden" id="uniq" class="form-control">

                <input type="hidden" id="item_count" class="form-control">
                <div class="form-group">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; New
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>

                    <a onclick="print_inv();" class="btn btn-default btn-sm">
                        <span class="fa fa-print"></span> &nbsp; Print
                    </a>


                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group">
                    <label class="col-md-2" for="contact">Code</label>
                    <div class="col-md-2">
                        <input type="text" disabled="" name="code" id="code" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Name</label>
                    <div class="col-md-3">
                        <input type="text" id="name" class="form-control input-sm">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 " for="contact">Category</label>
                    <div class="col-md-3">
                        <select id="category" onchange="category();" class="form-control input-sm">
                            <option value='Select Category'>Select Category</option>
                            <?php
                            $sql = "select name from category where cancel='0'";
                            foreach ($conn->query($sql) as $row) {
                                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                            }
                            ?>
                        </select> 
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Price</label>
                    <div class="col-md-2">
                        <input type="number"  id="price" class="form-control input-sm">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Description</label>
                    <div class="col-md-4">
                        <textarea style="resize: none" class="form-control" id="descrip" placeholder="Description"  rows="2"></textarea> 
                    </div>
                    <label class="col-md-2" for="contact">Price</label>
                    <div class="col-md-2">
                        <input type="number"  id="price" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Picture</label>
                    <div class="col-md-2">
                        <input type='file'id="file" onchange="readURL(this);" />
                        <img id="blah" src="http://placehold.it/180" alt="your image" />
                    </div>

                </div>
                <?php
                if ($_SESSION["CURRENT_USER"] == 'admin') {
                    echo "<div class='row'>";
                    echo "<div class='col-lg-12'>";
                    echo "<div class='panel panel-default'>";
                    echo "<div class='panel-heading'>";


                    echo " </div> ";
                    echo " <div class='panel-body'>";
                    echo " <table width='100%' class='table table-striped table-bordered table-hover' id='dataTables-example'>";
                    echo " <thead>";
                    echo " <tr>";
                    echo " <th>Name</th>";
                    echo " <th>Category</th>";
                    echo " <th>Price</th>";
                    echo " <th>Description</th> ";
                    echo "<th>Image</th> ";
                    echo "<th>Action</th>";
                    echo " </tr>";
                    echo "  </thead>";
                    echo "  <p id='demo' ></p>";
                    echo " <tbody>";

                    include './connection_sql.php';
                    $sql = "select * from item where cancel='0' order by  sdate";
                    foreach ($conn->query($sql) as $row) {

                        echo "  <tr>";
                        echo " <td>" . $row['name'] . "</td>";
                        echo " <td>" . $row['category'] . "'</td> ";
                        echo "<td>'" . $row['price'] . "'</td> ";
                        echo "<td>'" . $row['descrip'] . "'</td>";
                        echo "<td><img style='width: 50px;height: 30px;' src='" . $row['pic'] . "' alt=''></td>";
                        echo "<td>";
                        echo "  <button type= 'button' class='btn btn-danger btn-sm' data-toggle='modal' onclick='itemdele(" . $row['id'] . ");' data-target=#del_" . $row['id'] . "><i class='fa fa-trash'></i> Cancel</button>";
                        echo " </td>";
                        echo " </tr>";
                    }

                    echo " </tbody>";
                    echo "  </table>";
                    echo "</div>";
                    echo "</div>";
                    echo " </div>";
                    echo " </div>";
                }
                ?>

            </div>
        </form>
    </div>

</section> 

<script src="js/newitem.js" type="text/javascript"></script>
<script>newent();</script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
<style>
    img{
        max-width:280px;
    }
    input[type=file]{
        padding:10px;
        background:white;}
</style>
<script>

    function itemdele(cdate) {

        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }

        var url = "newitem_data.php";
        url = url + "?Command=" + "itemdel";
        url = url + "&id=" + cdate;

        xmlHttp.onreadystatechange = item_del;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }

    function item_del() {

        var XMLAddress1;

        if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
            setTimeout("location.reload(true);", 500);
        }
    }
</script>