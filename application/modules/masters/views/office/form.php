<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Office
            <small>create new office</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active">New Office</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Office</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('masters/office/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Office Name *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <input type="text" class="form-control" name="name" id="officeName" placeholder="Office Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parent</label>
                                <select name="parent" class="form-control">
                                    <option value="">As Parent</option>
                                    <?php foreach ($list_kantor as $kantor) : ?>
                                        <option value="<?php echo $kantor->id ?>" <?php if(isset($object)) { if($object->parent == $kantor->id) echo 'selected = "selected"'; } ?>><?php echo $kantor->name ?></option>
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