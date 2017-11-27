<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Maps Assets
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Member </a></li>
            <li><a href="#">Maps</a></li>
            <li class="active">Search Engine</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pencarian</h3>
                        <input type="button" style="float:right;" id="clear_it" onclick="resetMap()" value="Reset"/>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id=maps_box>
                            <div id="mapid" style=" box-shadow: 8px 8px 8px #888888;"></div>
                            <div id="findboxes" style="display:none;">
                                <div class="row">
                                    <form role="form" method="post" action="">
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">Max</span>
                                                <input class="form-control" type="text" placeholder="Rp">
                                            </div>
                                            <br/>
                                            <div class="input-group">
                                                <span class="input-group-addon">Min</span>
                                                <input class="form-control" type="text" placeholder="Rp">
                                            </div>
                                            <select id="selectplan" class="form-control" name="">
                                                <option value="">Pilih Izin Tempat</option>
                                            </select>
                                            <select class="form-control" name="typeExist" required>
                                                    <option value="">Select Tipe</option>
                                                    <?php foreach($list_exist as $row): ?>
                                                    <option value="<?php echo $row->id ?>">
                                                        <?php echo $row->name ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <select id="province" class="form-control" onchange="loadCity(this)" required>
                                                <option value="">Select Province</option>
                                                <?php foreach($list_province as $row): ?>
                                                    <option value="<?php echo $row->id ?>">
                                                        <?php echo $row->name ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>                                            
                                            </div>
                                            <div class="form-group">
                                                <select id="city" class="form-control" onchange="loadState(this)" required>
                                                    <option value="">Select City</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="state" class="form-control" onchange="loadDistrict(this)" required>
                                                    <option value="">Select State</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="district" class="form-control" name="district" required>
                                                    <option value="">Select District</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-12">
                                                <input id="runsubmit" type="submit" name="insert" value="Cari" onclick='saveData()' class="btn btn-primary">
                                                <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div style="display:none;">
                                <div id="findcheckes">
                                        <input type="checkbox" id="findform" onclick="showhideFindForm()"> Cari Member
                                        <br />
                                </div>
                                <div id="checkboxes">
                                    <form>
                                        Zona Kawasan
                                        <input type="checkbox" value="1nglRHF_nexiAjSYOqjvSBD6iNQdMAq6i207HsKpR" id="layer" onclick="changeLayer(this.value);" checked="checked">
                                        <br />
                                    </form>
                                </div>
                                <button type="button" id="printboxes" class="btn btn-default"><i class="fa fa-print"></i></button>
                                <button type="button" id="rulerboxes" class="btn btn-default"><i class="fa fa-arrows-h"></i></button>
                                <input id="pac-in" class="controls" type="text-float" placeholder="Lokasi Google">
                            </div>
                        </div>
                        <?php echo $this->template->widget("Mapstrans"); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    function loadCity(object) {
        $.ajax({
            url: "<?php echo base_url('member/register/city') ?>",
            method: "post",
            data: {
                id: $(object).val()
            },
            beforeSend: function() {
                freeze();
            },
            success: function(data) {
                $("#city").empty();
                $("#city").append("<option value=''>Select City</option>");
                $.each(data, function(i, data) {
                    $("#city").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error: function() {
                //
            }
        });
    }

    function loadState(object) {
        $.ajax({
            url: "<?php echo base_url('member/register/state') ?>",
            method: "post",
            data: {
                id: $(object).val()
            },
            beforeSend: function() {
                freeze();
            },
            success: function(data) {
                $("#state").empty();
                $("#state").append("<option value=''>Select State</option>");
                $.each(data, function(i, data) {
                    $("#state").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error: function() {
                //
            }
        });
    }

    function loadDistrict(object) {
        $.ajax({
            url: "<?php echo base_url('member/register/district') ?>",
            method: "post",
            data: {
                id: $(object).val()
            },
            beforeSend: function() {
                freeze();
            },
            success: function(data) {
                $("#district").empty();
                $("#district").append("<option value=''>Select District</option>");
                $.each(data, function(i, data) {
                    $("#district").append("<option value='" + data.id + "'>" + data.name + "</option>");
                });
                unfreeze();
            },
            error: function() {
                //
            }
        });
    }
</script>