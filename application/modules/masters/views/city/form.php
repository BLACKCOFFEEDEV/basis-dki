<div class="content-wrapper">
    <section class="content-header">
        <h1>
            City
            <small>create new city</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">New City</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form City</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('masters/city/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Province *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <select name="province" class="form-control" required="required">
                                    <?php foreach ($list_provinsi as $provinsi) : ?>
                                    <option value="<?php echo $provinsi->id ?>" <?php if(isset($object)) { if($object->provinsi_id == $provinsi->id) echo 'selected = "selected"'; } ?>><?php echo $provinsi->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City Name *</label>
                                <input type="text" class="form-control" name="name" id="cityName" placeholder="City Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
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