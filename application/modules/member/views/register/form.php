<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registrasi Member
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
                        <input type="button" style="float:right;" id="clear_shapes" value="reset"/>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $this->template->widget("Mapsreg"); ?>

                        <script
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApHNWWzhT1JLH4rmcYR9SCjl1LO_yoMm0&libraries=places,drawing,geometry&.js&callback=initAutocomplete"
                            async defer></script>

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
                                <h5 class="box-title"><p>NAMA: $string</p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>EMAIL: $string</p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>FOTO: $url</p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>ALAMAT: $string</p></h5>
                            </div>
                            <div class="form-group">
                                <h5 class="box-title"><p>KONTAK: $string</p></h5>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="IMB" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="SERTIFIKAT" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="KLB/KNB" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="NJOP" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" disabled=""
                                        style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option selected="selected">JAKARTA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option>PILIH KOTA/KABUPATEN</option>
                                    <option>JAKARTA PUSAT</option>
                                    <option>JAKARTA UTARA</option>
                                    <option>JAKARTA TIMUR</option>
                                    <option>JAKARTA SELATAN</option>
                                    <option>JAKARTA BARAT</option>
                                </select>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option>PILIH KECAMATAN</option>
                                    <option>DUREN SAWIT</option>
                                    <option>PASAR REBO</option>
                                </select>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option>PILIH KELURAHAN</option>
                                    <option>PONDOK KOPI</option>
                                    <option>CIJANTUNG</option>
                                </select>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
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
                                <input class="form-control" name="marker_polygon" id="data" placeholder="Polygon"
                                       readonly type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="luas" placeholder="Luas" readonly
                                       type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="luas" placeholder="Luas di Sertifikat"
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
