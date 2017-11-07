<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Province
            <small>create new province</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">New Province</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Province</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('masters/province/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Country *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <select name="country" class="form-control" required="required">
                                    <?php foreach ($list_negara as $negara) : ?>
                                    <option value="<?php echo $negara->id ?>" <?php if(isset($object)) { if($object->negara_id == $negara->id) echo 'selected="selected"'; } ?>><?php echo $negara->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Province Name *</label>
                                <input type="text" class="form-control" name="name" id="provinceName" placeholder="Province Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
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