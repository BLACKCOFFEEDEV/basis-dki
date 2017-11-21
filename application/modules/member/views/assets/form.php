<link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registrasi Assets
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Member</a></li>
            <li><a href="#">Form Registrasi</a></li>
            <li class="active">Form Assets</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Digitasi Luas Bangunan</h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <?php echo $this->template->widget("Mapsreg"); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success" style="position: absolute; left: 0; overflow-y: scroll; height: 468px; width: 98%;">
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                            <div>
                                <h5 class="box-title"><p><img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('account/profile/image/'.$account->id) ?>" alt="<?php echo $account->first_name." ".$account->last_name ?>"></p></h5>
                            </div>
                            <div>
                                <h5 class="box-title"><p>NAMA: <?php echo $account->first_name." ".$account->last_name ?></p></h5>
                            </div>
                            <div>
                                <h5 class="box-title"><p>EMAIL: <?php echo $account->email ?></p></h5>
                            </div>
                            <div>
                                <h5 class="box-title"><p>ALAMAT: <?php echo $account->address ?></p></h5>
                            </div>
                            <div>
                                <h5 class="box-title"><p>KONTAK: <?php echo $account->phone ?></p></h5>
                            </div>
                            <hr />
                            <div>
                                <label for="exampleInputEmail1">Legalitas *</label>
                                <br/>
                                <button  class="btn btn-warning btn-sm" onclick='add_document();'><i class="fa fa-plus"></i></button>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                        
                                    </tbody>
                                </table>
                                <p class="help-block">File Legalitas</p>
                            </div>
                        
                        <form role="form" method="post" action="">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Province *</label>
                                <select id="province" class="form-control" onchange="loadCity(this)">
                                    <option value="">Select Province</option>
                                    <?php foreach($list_province as $row): ?>
                                        <option value="<?php echo $row->id ?>">
                                            <?php echo $row->name ?>
                                        </option>
                                        <?php endforeach; ?>
                                </select>
                                <p class="help-block">Assets domicile</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City *</label>
                                <select id="city" class="form-control" onchange="loadState(this)">
                                    <option value="">Select City</option>
                                </select>
                                <p class="help-block">Assets domicile</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">State *</label>
                                <select id="state" class="form-control" onchange="loadDistrict(this)">
                                    <option value="">Select State</option>
                                </select>
                                <p class="help-block">Assets domicile</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">District *</label>
                                <select id="district" class="form-control" name="district">
                                    <option value="">Select District</option>
                                </select>
                                <p class="help-block">Assets domicile</p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="" placeholder="Nama Tempat" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="marker_address" placeholder="Alamat Lokasi"></textarea>
                                <span class="help-block with-errors"><?php echo form_error("marker_address"); ?></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="geoMet" placeholder="Polygon" readonly>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">m²</span>
                                <input class="form-control" placeholder="Luas  Polygon" id="sqmeters" type="text" readonly>
                            </div>
                            <br/>
                            <div class="input-group">
                                <span class="input-group-addon">ha</span>
                                <input class="form-control" placeholder="Hektar Polygon" id="acres" type="text" readonly>
                            </div>
                            <br/>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" id="" placeholder="Luas di Sertifikat" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_type" placeholder="Jenis Izin Lokasi" type="text">
                                <span class="help-block with-errors"><?php echo form_error("marker_type"); ?></span>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                <input class="form-control" placeholder="Harga" type="text">
                            </div>
                            <br/>
                            <div class="form-group">
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option>SURAT USAHA</option>
                                    <option>SIUP</option>
                                    <option>IUP</option>
                                </select>
                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="marker_polygon" value="2" placeholder="poly_prop" readonly type="hidden">
                            </div>
                            <div class="box-footer">
                                <div class="form-group">
                                    <input type="submit" name="insert" value="Submit" onclick='saveData()' class="btn btn-primary">
                                    <button type="reset" style="float:right;" id="clear_shapes" onclick='clrMapsForm()' class="btn btn-default">Clear Form</button>
                                    <button type="button" onclick="goBack()" class="btn btn-danger">Cencel</button>
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
        
        showAllDoc();
            
        function showAllDoc(){
                $.ajax({
                    type: 'ajax',
                    url: '<?php echo base_url('member/assets/showAllDoc/'.$account->user_id) ?>',
                    dataType: 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html +='<tr>'+
                                    '<td>'+data[i].id+'</td>'+
                                    '<td>'+data[i].name+'</td>'+
                                    '<td>'+data[i].legal_num+'</td>'+
                                    '<td>'+
                                    '<a href="javascript:;" style="color:#00c48c;"><i class="fa fa-fw fa-edit"></i></a>&nbsp;'+
                                    '<a href="javascript:void(0)" onclick="delete_legal('+data[i].id+')" style="color:#c40023;"><i class="fa fa-fw fa-trash"></i></a>'+
                                    '</td>'+
                                '</tr>';
                    }
                    $('#showdata').html(html);
                },
                error: function(){
                    alert('Gak bisa tarik list dari db!!!');
                }
                });
            }

        
        var save_method; //for save method string
        var base_url = '<?php echo base_url();?>';
        
        $(document).ready(function() {

            //set input/textarea/select event when change value, remove class error and remove text help block 
            $("input").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });
            $("select").change(function(){
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
            });

        });
    
        function add_document()
        {
            save_method = 'add';
            $('#docForm')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#docModal').modal('show'); // show bootstrap modal
            $('.modal-title').text('Tambah document'); // Set Title to Bootstrap modal title

            $('#filePreview').hide(); // hide photo preview modal

            $('#fileLett').text('Upload File'); // label photo upload
        }
        
        function save()
        {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable 
            var url;

            if(save_method == 'add') {
                url = "<?php echo site_url('member/assets/ajax_add')?>";
            } else {
                url = "<?php echo site_url('member/assets/ajax_update')?>";
            }

            // ajax adding data to database

            var formData = new FormData($('#docForm')[0]);
            $.ajax({
                url : url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data)
                {

                    if(data.status) //if success close modal and reload ajax table
                    {
                        $('#docModal').modal('hide');
                        showAllDoc();
                    }
                    else
                    {
                        for (var i = 0; i < data.inputerror.length; i++) 
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 
                    

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error adding / update data');
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled',false); //set button enable 
                    
                }
            });
        }
    
        function delete_legal(id)
        {
            if(confirm('Yakin nih mau di delete?'))
            {
                // ajax delete data to database
                $.ajax({
                    url : "<?php echo site_url('member/assets/ajax_delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success reload ajax table
                        $('#docModal').modal('hide');
                        showAllDoc();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Something wrong bro');
                        showAllDoc();
                    }
                });

            }
        }

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

<div id="docModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body form">
                <form id="docForm" action="#" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group" style="display:none;">
                            <input type="text" name="memIdDoc" value="<?php echo $this->uri->segment(4) ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4" >Pilih jenis dokumen</label>
                            <div class="col-lg-8">
                                <select class="form-control" name="typeIdDoc" id="typelett">
                                    <option value="">Select Legal</option>
                                    <?php foreach($list_legality as $row): ?>
                                    <option value="<?php echo $row->id ?>">
                                        <?php echo $row->name ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-4">No. Surat</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="numLettDoc" id="numlett" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group" id="filePreview">
                            <label class="control-label col-lg-4">Document</label>
                            <div class="col-lg-8">
                                &nbsp;(Belum ada file)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" id="fileLett">Upload</label>
                            <div class="col-lg-8">
                                <input type="file" name="fileLettDoc">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan Berkas</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>