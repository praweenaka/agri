<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Farmers</h3>
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

                <div class="form-group">
                    <label class="col-sm-2 " for="txt_usernm">Code</label>
                    <div class="col-sm-2">
                        <input type="text" placeholder="Code" disabled="" id="code" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 " for="txt_usernm">Name</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Name" id="name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 " for="txt_usernm">Contact</label>
                    <div class="col-sm-3">
                        <input type="text" placeholder="Contact" id="contact" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 " for="txt_usernm">Address</label>
                    <div class="col-sm-4">
                        <input type="text" placeholder="Address" id="address" class="form-control">
                    </div>
                </div>
 
            </div>
        </form>
    </div>

</section>

<script src="js/add_farmers.js"></script>

<script>newent();</script>