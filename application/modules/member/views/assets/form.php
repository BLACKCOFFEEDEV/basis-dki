<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registrasi Assets
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Form Member</a></li>
            <li class="active">Form Registrasi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Digitasi Luas Bangunan</h3>
                        <input type="button" style="float:right;" id="clear_shapes" value="Reset"/>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php echo $this->template->widget("Mapsreg"); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success"
                     style="position: absolute; left: 0; overflow-y: scroll; height: 468px; width: 98%;">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="post" action="">
                            <!-- text input -->

                            <div class="form-group">
                                <h5 class="box-title"><p><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('account/profile/image/'.$account->id) ?>" alt="<?php echo $account->first_name." ".$account->last_name ?>"></p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>NAMA: <?php echo $account->first_name." ".$account->last_name ?></p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>EMAIL: <?php echo $account->email ?></p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>ALAMAT: <?php echo $account->address ?></p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>KONTAK: <?php echo $account->phone ?></p></h5>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="Legality" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Province *</label>
                                    <select id="province" class="form-control" onchange="loadCity(this)">
                                        <option value="">Select Province</option>
                                        <?php foreach($list_province as $row): ?>
                                        <option value="<?php echo $row->id ?>"><?php echo $row->name ?></option>
                                        <?php endforeach; ?>
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
                                    <select id="district" class="form-control" name="district">
                                        <option value="">Select District</option>
                                    </select>
                                    <p class="help-block">Member domicile</p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="NAMA TEMPAT" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="marker_address"
                                          placeholder="Alamat Lokasi"></textarea>
                                <span class="help-block with-errors"><?php echo form_error("marker_address"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="geoMet" placeholder="Polygon"
                                       readonly type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="sqmeters" placeholder="Luas  Polygon" readonly
                                       type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="acres" placeholder="Hektar Polygon" readonly
                                       type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="" placeholder="Luas di Sertifikat"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_type" placeholder="Jenis Izin Lokasi"
                                       type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="Rp.    " type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option>SURAT USAHA</option>
                                    <option>SIUP</option>
                                    <option>IUP</option>
                                </select>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" value="2" placeholder="poly_prop"
                                       readonly type="hidden">
                            </div>
                            <div class="box-footer">
                                <div class="from-group">
                                    <input type="submit" name="insert" value="Submit" onclick='saveData()'
                                           class="btn btn-primary">
                                    <button type="reset" class="btn btn-default">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#dob').datepicker({
            autoclose: true
        });
        $('#expired').datepicker({
            autoclose: true
        });
    });

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