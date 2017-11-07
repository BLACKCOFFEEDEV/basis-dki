<link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
<script src="<?php echo base_url('assets/face/back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Member
            <small>update member</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register</a></li>
            <li class="active">Update Member</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Member</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('member/register/update-member') ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name *</label>
                                <input type="hidden" name="account-id" value="<?php if(isset($object)) echo $object->id ?>">
                                <input type="text" class="form-control" name="account-first-name" id="fisrtName" placeholder="First Name" value="<?php if(isset($object)) echo $object->first_name ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" class="form-control" name="account-last-name" id="lastName" placeholder="First Name" value="<?php if(isset($object)) echo $object->last_name ?>" required="required">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Place of birth *</label>
                                <input type="text" class="form-control" name="account-place-of-birth" id="place" placeholder="Place of Birth" value="<?php if(isset($object)) echo $object->place_of_birth ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date of birth *</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="account-date-of-birth" id="dob" placeholder="Date of Birth" value="<?php if(isset($object)) echo $object->date_of_birth ?>" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email *</label>
                                <input type="email" class="form-control" name="user-email" id="email" placeholder="Email" value="<?php if(isset($user)) echo $user->email ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone *</label>
                                <input type="text" class="form-control" name="account-phone" id="phone" placeholder="Phone" value="<?php if(isset($object)) echo $object->phone ?>" required="required">
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Country *</label>
                                    <select class="form-control" id="country" onchange="loadProvince(this)">
                                        <option value="">Select Country</option>
                                        <?php foreach ($list_negara as $row) : ?>
                                            <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Province *</label>
                                    <select id="province" class="form-control" onchange="loadCity(this)">
                                        <option value="">Select Province</option>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">City *</label>
                                    <select id="city" class="form-control" onchange="loadState(this)">
                                        <option value="">Select City</option>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">State *</label>
                                    <select id="state" class="form-control" onchange="loadDistrict(this)">
                                        <option value="">Select State</option>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">District *</label>
                                    <select id="district" class="form-control" name="account-district">
                                        <option value="">Select District</option>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address *</label>
                                    <textarea class="form-control" rows="7" name="account-address"><?php if(isset($object)) echo $object->address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Identity Number *</label>
                                    <input type="text" class="form-control" name="member-ktp" id="ktp" placeholder="Identity Number" value="<?php if(isset($object)) echo $object->ktp ?>" required="required">
                                    <p class="help-block">e.g. KTP, Passport</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address in Identity *</label>
                                    <textarea class="form-control" rows="8" name="member-address"><?php if(isset($object)) echo $object->ktp_address ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Expired Date *</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="member-until" id="expired" placeholder="Expired Date" value="<?php if(isset($object)) echo $object->member_until ?>" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="freeze()"><i class="fa fa-save"></i> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dob').datepicker({
            autoclose: true
        });
        $('#expired').datepicker({
            autoclose: true
        });
    });

    function loadProvince(object) {
        $.ajax({
            url : "<?php echo base_url('member/register/province') ?>",
            method : "post",
            data : {
                id : $(object).val()
            },
            beforeSend : function() {
                freeze();
            },
            success : function(data) {
                $("#province").empty();
                $("#province").append("<option value=''>Select Province</option>");
                $.each(data, function(i, data){
                    $("#province").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error : function() {
                //
            }
        });
    }

    function loadCity(object) {
        $.ajax({
            url : "<?php echo base_url('member/register/city') ?>",
            method : "post",
            data : {
                id : $(object).val()
            },
            beforeSend : function() {
                freeze();
            },
            success : function(data) {
                $("#city").empty();
                $("#city").append("<option value=''>Select City</option>");
                $.each(data, function(i, data){
                    $("#city").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error : function() {
                //
            }
        });
    }

    function loadState(object) {
        $.ajax({
            url : "<?php echo base_url('member/register/state') ?>",
            method : "post",
            data : {
                id : $(object).val()
            },
            beforeSend : function() {
                freeze();
            },
            success : function(data) {
                $("#state").empty();
                $("#state").append("<option value=''>Select State</option>");
                $.each(data, function(i, data){
                    $("#state").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error : function() {
                //
            }
        });
    }

    function loadDistrict(object) {
        $.ajax({
            url : "<?php echo base_url('member/register/district') ?>",
            method : "post",
            data : {
                id : $(object).val()
            },
            beforeSend : function() {
                freeze();
            },
            success : function(data) {
                $("#district").empty();
                $("#district").append("<option value=''>Select District</option>");
                $.each(data, function(i, data){
                    $("#district").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error : function() {
                //
            }
        });
    }
</script>