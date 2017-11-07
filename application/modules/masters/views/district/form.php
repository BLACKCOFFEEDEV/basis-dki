<div class="content-wrapper">
    <section class="content-header">
        <h1>
            District
            <small>create new district</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">New District</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form District</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('masters/district/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">State *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <select name="city" class="form-control" required="required">
                                    <?php foreach ($list_kecamatan as $kecamatan) : ?>
                                    <option value="<?php echo $kecamatan->id ?>" <?php if(isset($object)) { if($object->kecamatan_id == $kecamatan->id) echo 'selected = "selected"'; } ?>><?php echo $kecamatan->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">District Name *</label>
                                <input type="text" class="form-control" name="name" id="districtName" placeholder="District Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
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