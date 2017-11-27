    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Update Assets <?php if(isset($account)) echo $account->first_name." ".$account->last_name ?>
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
                    <div class="box box-success">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div style="height:460px;">
                                <div style="background-color:#fcfdff; position: absolute center; height: 100%; width: 100%; margin:0 auto; overflow-y: scroll; box-shadow:0.5px 0.5px 2.5px 0.5px #8494b2 inset; border-radius: 5px 0 0 5px;">
                                    <div style="margin:10px 10px 10px 10px;">
                                        <div>
                                            <h5 class="box-title"><p><img class="profile-user-img img-responsive img-circle" src="<?php if(isset($account)) echo base_url('account/profile/image/'.$account->id) ?>" alt="<?php if(isset($account)) echo $account->first_name." ".$account->last_name ?>"></p></h5>
                                        </div>
                                        <div>
                                            <h5 class="box-title"><p>NAMA: <?php if(isset($account)) echo $account->first_name." ".$account->last_name ?></p></h5>
                                        </div>
                                        <div>
                                            <h5 class="box-title"><p>EMAIL: <?php if(isset($account)) echo $account->email ?></p></h5>
                                        </div>
                                        <div>
                                            <h5 class="box-title"><p>ALAMAT: <?php if(isset($account)) echo $account->address ?></p></h5>
                                        </div>
                                        <div>
                                            <h5 class="box-title"><p>KONTAK: <?php if(isset($account)) echo $account->phone ?></p></h5>
                                        </div>
                                        <hr />
                                        <label>Legalitas *</label>
                                        <br/>
                                        <button  class="btn bg-teal btn-sm" onclick='add_document();'><i class="fa fa-plus"></i></button>
                                        <div>
                                        <!-- text input -->
                                            <table class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <td><b>No.</b></td>
                                                        <td><b>Dokumen</b></td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody id="showdata">

                                                </tbody>
                                            </table>
                                            <hr/>
                                        </div>    
                                        <form role="form" method="post" action="<?php echo base_url('member/assets/save')?>">
                                            <input name="assetsId" value="<?php if(isset($object)) echo $object->id ?>" type="hidden">
                                            <input name="accountId" value="<?php if(isset($object)) echo $this->uri->segment(4) ?>" type="hidden">
                                            <div class="form-group">
                                                <label class="control-label" >Pilih Tipe Bangunan </label>
                                                <select class="form-control" name="typeExist" required>
                                                        <option value="">Select Tipe</option>
                                                        <?php foreach($list_exist as $row): ?>
                                                        <option value="<?php if(isset($list_exist, $row->id)) echo $row->id ?>">
                                                            <?php echo $row->name ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                <span class="help-block"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="Provinsi">Provinsi *</label>
                                                <select id="province" class="form-control" onchange="loadCity(this)" required>
                                                    <option value="">Select Province</option>
                                                    <?php foreach($list_province as $row): ?>
                                                        <option value="<?php echo $row->id ?>">
                                                            <?php echo $row->name ?>
                                                        </option>
                                                        <?php endforeach; ?>
                                                </select>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="Kota">Kota *</label>
                                                <select id="city" class="form-control" onchange="loadState(this)" required>
                                                    <option value="">Select City</option>
                                                </select>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="Kecamatan">Kecamatan *</label>
                                                <select id="state" class="form-control" onchange="loadDistrict(this)" required>
                                                    <option value="">Select State</option>
                                                </select>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="Kelurahan">Kelurahan *</label>
                                                <select id="district" class="form-control" name="district" required>
                                                    <option value="">Select District</option>
                                                </select>
                                                <p class="help-block"></p>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="assetsName" placeholder="Nama Tempat" type="text" value="<?php if(isset($object)) echo $object->assets_name ?>" required>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" name="assetsAddress" placeholder="Alamat Lokasi"><?php if(isset($object)) echo $object->assets_address ?>
                                                </textarea>
                                                <span class="help-block with-errors"></span>
                                            </div>
                                            <div class="form-group" style="display:block;">
                                                <input class="form-control" name="assetsGeometry" id="geoMet" placeholder="Polygon" readonly>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">m²</span>
                                                <input class="form-control" placeholder="Luas Polygon" id="sqmeters" type="text" readonly>
                                            </div>
                                            <br/>
                                            <div class="input-group">
                                                <span class="input-group-addon">ha</span>
                                                <input class="form-control" placeholder="Hektar Polygon" id="acres" type="text" readonly>
                                            </div>
                                            <br/>
                                            <div class="input-group">
                                                <span class="input-group-addon">m²</span>
                                                <input class="form-control" name="assetsLuas" placeholder="Luas di Sertifikat" type="text" value="<?php if(isset($object)) echo $object->assets_luas ?>" required>
                                            </div>
                                            <br/>
                                            <div class="input-group">
                                                <span class="input-group-addon">Rp</span>
                                                <input class="form-control" name="assetsHarga" placeholder="Harga Penawaran" value="<?php if(isset($object)) echo $object->assets_harga ?>" type="text" required>
                                            </div>
                                            <br/>
                                            <div class="form-group">
                                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="assetsPermit">
                                                    <option>Surat Usaha</option>
                                                    <option>SIUP</option>
                                                    <option>IUP</option>
                                                </select>
                                                <span class="dropdown-wrapper" aria-hidden="true"></span>
                                            </div>
                                            <div class="box-footer">
                                                <div class="form-group">
                                                    <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                                    <button type="button" onclick="goBack()" class="btn btn-danger">Cencel</button>

                                                    <button type="reset" style="float:right;" id="clear_shapes" onclick='clrMapsForm()' class="btn btn-default">Clear Form</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

        showUpdateDoc();

        function showUpdateDoc(){
                    $.ajax({
                        type: 'ajax',
                        url: '<?php echo base_url('member/assets/showUpdateDoc/'.$this->uri->segment(5)) ?>',
                        dataType: 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        var num = 1;
                        for(i=0; i<data.length; i++){
                            html +='<input type="hidden" name="doc'+i+'" value="'+data[i].legal_id+'"/>'+
                                    '<tr>'+
                                        '<td>' + (num + i) + '</td>' +
                                        '<td>' + data[i].name + '_'+ data[i].legal_id +'_'+ data[i].account_id +'_'+ data[i].assets_id +'</td>' +
                                        '<td>'+
                                            '<div style="float:right;">' +
                                                '<a href="javascript:;" class="btn btn-info btn-xs" title="View"><i class="fa fa-fw fa-eye"></i></a>&nbsp;' +
                                                '<a href="javascript:;" class="btn btn-warning btn-xs" title="Edit"><i class="fa fa-fw fa-edit"></i></a>&nbsp;' +
                                                '<a href="javascript:void(0)" onclick="delete_legal(' + data[i].legal_id + ')" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-fw fa-trash"></i></a>' +
                                            '</div>' +
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

        function add_document(){
                save_method = 'add';
                $('#docForm')[0].reset(); // reset form on modals
                $('.form-group').removeClass('has-error'); // clear error class
                $('.help-block').empty(); // clear error string
                $('#docModal').modal('show'); // show bootstrap modal
                $('.modal-title').text('Tambah document'); // Set Title to Bootstrap modal title

                $('#filePreview').hide(); // hide photo preview modal

                $('#fileLett').text('Upload File'); // label photo upload
            }

        function save(legal_id){
                $('#btnSave').text('saving...'); //change button text
                $('#btnSave').attr('disabled',true); //set button disable 
                var url;

                if(save_method == 'add') {
                    url = "<?php echo site_url('member/assets/ajax_add')?>/"+legal_id;
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
                            showUpdateDoc();
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

        function delete_legal(legal_id){
                if(confirm('Yakin nih mau di delete?'))
                {
                    // ajax delete data to database
                    $.ajax({
                        url : "<?php echo site_url('member/assets/ajax_delete')?>/"+legal_id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data)
                        {
                            //if success reload ajax table
                            $('#docModal').modal('hide');
                            showUpdateDoc();
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Something wrong bro');
                            showUpdateDoc();
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
                    <form id="docForm" action="#" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" value="" name="id"/>
                        <div class="form-body">
                            <div class="form-group" style="display:none;">
                                <input type="text" name="memIdDoc" value="<?php echo $this->uri->segment(4) ?>">
                                <input type="text" name="assetsIdDoc" value="<?php echo $this->uri->segment(5) ?>">
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
                                    <input type="file" name="userfile">
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