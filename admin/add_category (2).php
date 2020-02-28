<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Category</h3>
        </div>
        <form role="form" class="form-horizontal">
            <div class="box-body">
                <input type="hidden" id="uniq" class="form-control">

                <div class="form-group">
                    <a onclick="newent();" class="btn btn-default">
                        <span class="fa fa-user-plus"></span> &nbsp; New
                    </a>
                    <a onclick="save_inv();" class="btn btn-success">
                        <span class="fa fa-save"></span> &nbsp; Save
                    </a>

                </div>

                <div id="msg_box"  class="span12 text-center"  >

                </div>
<div class="row">
                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="txt_usernm">Code</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Code" disabled="" id="code" class="form-control">
                                        </div>
                                    </div>
                    
                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="txt_usernm">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" placeholder="Name" id="name" class="form-control">
                                        </div>
                                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 
 
                            </div>
                            <!-- /.panel-heading -->


                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <p id="demo" ></p>
                                    <tbody>
                                        <?php
                                        include './connection_sql.php';
                                        $sql = "select * from category where cancel='0' order by  sdate";
                                        foreach ($conn->query($sql) as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['name']; ?></td> 
                                                <td style='width:25%'>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" onclick="itemdele(<?php echo $row['id']; ?>);" data-target="#del_<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Cancel</button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
            </div>
        </form>
    </div>

</section>

<script src="js/add_category.js"></script>

<script>newent();</script>

<script>
    
     function itemdele(cdate) {
 
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "add_category_data.php";
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