<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Navigation
            <small>create new navigation</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Navigation</a></li>
            <li class="active">New Navigation</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Navigation</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('privileges/menu/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Navigation Label *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <input type="text" class="form-control" name="label" id="groupName" placeholder="Navigation Label" value="<?php if(isset($object)) echo $object->label ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Navigation Link *</label>
                                <div class="input-group">
                                    <span class="input-group-addon">http://yourdomain.com/</span>
                                    <input type="text" class="form-control" name="link" id="groupDefinition" placeholder="Navigation Link" value="<?php if(isset($object)) echo $object->link ?>" required="required">
                                </div>
                                <p class="help-block">e.g. foo, foo/bar</p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Navigation Icon (Font Awesome 4.7.0)</label>
                                <div class="input-group">
                                    <span class="input-group-addon">fa </span>
                                    <input type="text" class="form-control" onkeyup="preview(this)" onblur="preview(this)" name="icon" id="groupDefinition" placeholder="Navigation Icon" value="<?php if(isset($object)) echo $object->icon ?>">
                                    <span class="input-group-addon"><i id="fontawesome" class="fa <?php if(isset($object)) echo $object->icon; else "fa-refresh fa-spin"; ?>"></i></span>
                                </div>
                                <p class="help-block">e.g. fa-pencil, fa-plus, fa-edit. Look at <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a> </p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Navigation Parent</label>
                                <select id="navParent" name="parent" class="form-control">
                                    <option value="">As Parent</option>
                                    <?php foreach ($parents as $parent) : ?>
                                    <option value="<?php echo $parent->id ?>" <?php if(isset($object)) { if($parent->id == $object->parent) echo 'selected = "selected"'; } ?>><?php echo $parent->label ?></option>
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

    function preview(object) {
        var icon = document.getElementById("fontawesome");
        icon.className = "fa " + $(object).val();

        if($(object).val() == '')
            icon.className = "fa fa-refresh fa-spin";
    }
</script>