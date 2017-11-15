<link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<script src="<?php echo base_url('assets/face/back/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/face/back/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/face/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Groups
            <small>list of groups</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Groups</a></li>
            <li class="active">List of groups</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active" onclick="$('#datamembers').DataTable().draw(false);"><a href="#members" data-toggle="tab">Members</a></li>
                        <li onclick="$('#dataemployee').DataTable().draw(false);"><a href="#employee" data-toggle="tab">Employee</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="members">
                            <a href="<?php echo base_url('member/register/member') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create new member</a><br/><br/>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Members</h3>
                                </div>

                                <div class="box-body">
                                    <table id="datamembers" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>KTP</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Subscribe until</th>
                                            <th width="75px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane" id="employee">
                            <a href="<?php echo base_url('member/register/employee') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Create new employee</a><br/><br/>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Employee</h3>
                                </div>

                                <div class="box-body">
                                    <table id="dataemployee" class="table table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>NIP</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Office</th>
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
                <p>Are you sure you want to ban this user?</p>
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
        DrawMemberTable();
        DrawEmployeeTable();
    });

    function DrawMemberTable() {
        $('#datamembers').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('member/register/get_list_member/')?>",
                "type": "POST"
            },

        });
    }

    function DrawEmployeeTable() {
        $('#dataemployee').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('member/register/get_list_employee/')?>",
                "type": "POST"
            },

        });
    }

    function set_value(value) {
        $("#key").val(value);
    }

    function confirmation() {
        $.ajax({
            url : "<?php echo base_url('privileges/groups/delete') ?>",
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