<div class="content-wrapper">
    <section class="content-header">
        <h1>
            User Profile
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Account</a></li>
            <li class="active">User profile</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('account/profile/image') ?>" alt="<?php echo $account->first_name." ".$account->last_name ?>">

                        <h3 class="profile-username text-center"><?php echo $account->first_name." ".$account->last_name ?></h3>

                        <p class="text-muted text-center"><?php echo $this->aauth->get_user()->email; ?></p>

                    </div>
                </div>

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                        <p class="text-muted"><?php echo $account->address ?></p>

                        <hr>

                        <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                        <p><?php echo $account->phone ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#assets" data-toggle="tab">Assets</a></li>
                        <li><a href="#wishlish" data-toggle="tab">Wishlish</a></li>
                        <li><a href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="assets">
                            <p class="text-center">No data found yet.</p>
                        </div>

                        <div class="tab-pane" id="wishlish">
                            <p class="text-center">No data found yet.</p>
                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" action="<?php echo base_url('account/profile/update') ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Image</label>

                                    <div class="col-sm-10">
                                        <img class="profile-user-img img-responsive img-circle" id="priview" src="<?php echo base_url('account/profile/image') ?>" alt="priview" style="min-width: 100px; min-height: 100px;" />
                                        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" onchange="validateFileType(this)" style="margin-top: -65px;" >
                                        <div class="clear-fix" style="padding-bottom: 35px;"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $account->phone ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Address</label>

                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="5" name="address"><?php echo $account->address ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger" onclick="freeze()">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<script type="text/javascript">
    function validateFileType(input){
        var fileName = $(input).val();
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
            readURL(input);
        }else{
            readURL(input);
            alert("Only jpg/jpeg and png files are allowed!");
        }
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#priview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#priview').attr('src', '<?php echo base_url('account/profile/image') ?>');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>