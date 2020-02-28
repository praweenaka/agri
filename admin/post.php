<?php
session_start();
?> 
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><b>New Post</b></h3>
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

                    <a onclick="sess_chk('cancel', 'crn');" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash-o"></span> &nbsp; Cancel
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
                    <label class="col-md-2 " for="contact">Category</label>
                    <div class="col-md-3">
                        <select id="category" onchange="category();" class="form-control input-sm">
                            <option value='Select Category'>Select Category</option>
                            <?php
                            $sql = "select name from category";
                            foreach ($conn->query($sql) as $row) {
                                echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                            }
                            ?>
                        </select> 
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Name</label>
                    <div class="col-md-4">
                        <textarea style="width: 750px;" class="form-control" id="name" placeholder="Name"  rows="2"></textarea> 
                    </div>

                </div>
 
                <div class="form-group">
                    <label class="col-md-2" for="contact">Description</label>
                    <div class="col-md-4">
                        <textarea style="width: 750px;height: 250px;" class="form-control" id="descrip" placeholder="Description"  rows="2"></textarea> 
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-md-2" for="contact">Picture</label>
                    <div class="col-md-2">
                        <input type='file'id="file" onchange="readURL(this);" />
                        <img id="blah" src="http://placehold.it/180" alt="your image" />
                    </div>

                </div>

            </div>
        </form>
    </div>

</section> 

<script src="js/post.js" type="text/javascript"></script>
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