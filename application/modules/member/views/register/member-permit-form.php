<link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
<script src="<?php echo base_url('assets/face/back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Member Permit
            <small>create new member permit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Register Member</a></li>
            <li class="active">New Member Permit</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Member Permit</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('member/register/save_permit') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Building Type *</label>
                                <select name="type" class="form-control">
                                    <?php foreach ($list_building as $building) : ?>
                                        <option value="<?php echo $building->id ?>"><?php echo $building->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Permit *</label>
                                <select name="permit" class="form-control">
                                    <?php foreach ($list_permit as $permit) : ?>
                                        <option value="<?php echo $permit->id ?>"><?php echo $permit->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Permit for *</label>
                                <input type="text" class="form-control" value="<?php echo $object->first_name." ".$object->last_name ?>" disabled="disabled">
                                <input type="hidden" name="account" value="<?php echo $object->id ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description *</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Permit no *</label>
                                <input type="text" name="permit-no" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Valid until *</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="valid-until" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" onclick="freeze()"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>