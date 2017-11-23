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
        //
    });
</script>