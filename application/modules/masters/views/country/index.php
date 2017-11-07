<link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<script src="<?php echo base_url('assets/face/back/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/face/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/face/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Country
            <small>list of country</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">List of country</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <a href="<?php echo base_url('masters/country/form') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create new country</a><br/><br/>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Country</h3>
                    </div>

                    <div class="box-body">
                        <table id="datatables" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th width="150px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>

</div>

<div class="modal fade" id="confirmation">
    <div class="modal-dialog" style="max-width: 350px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete these item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="confirmation()" data-dismiss="modal" class="btn btn-danger pull-left">Yes, Delete it</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="key" name="id" value="">

<script type="text/javascript">
    $(document).ready(function() {
        notice();
        DrawTable();
    });

    function DrawTable() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('masters/country/get_list/')?>",
                "type": "POST"
            },

        });
    }

    function set_value(value) {
        $("#key").val(value);
    }

    function confirmation() {
        $.ajax({
            url : "<?php echo base_url('masters/country/delete') ?>",
            method : "post",
            data : {
                id : $("#key").val()
            },
            beforeSend : function() {
                freeze();
            },
            success : function(response) {
                var table = $('#datatables').DataTable();
                table.draw(false);
                unfreeze();
                $.notify("Item has been deleted.", "success");
            },
            error : function() {
                $.notify("Deleted item failed..", "error");
            }
        });
    }
</script>