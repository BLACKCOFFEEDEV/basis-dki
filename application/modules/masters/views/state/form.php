<div class="content-wrapper">
    <section class="content-header">
        <h1>
            State
            <small>create new state</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">New State</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form State</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('masters/state/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">City *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <select name="city" class="form-control" required="required">
                                    <?php foreach ($list_kota as $kota) : ?>
                                    <option value="<?php echo $kota->id ?>" <?php if(isset($object)) { if($object->kota_id == $kota->id) echo 'selected = "selected"'; } ?>><?php echo $kota->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">State Name *</label>
                                <input type="text" class="form-control" name="name" id="stateName" placeholder="State Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
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