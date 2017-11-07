<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Permission
            <small>create new permission</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Permission</a></li>
            <li class="active">New Permission</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Permission</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('privileges/permissions/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Navigation *</label>
                                <input type="hidden" name="group" value="<?php echo $group ?>">
                                <select name="navigation" class="form-control" required="required">
                                    <?php foreach ($navigations as $navigation) : ?>
                                    <option value="<?php echo $navigation->id ?>"><?php echo $navigation->label ?></option>
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