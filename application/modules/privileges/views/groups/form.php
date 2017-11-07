<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Group
            <small>create new group</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Groups</a></li>
            <li class="active">New Group</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Group</h3>
                    </div>


                    <form role="form" action="<?php echo base_url('privileges/groups/save') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Group Name *</label>
                                <input type="hidden" name="id" value="<?php if(isset($object)) echo $object->id ?>">
                                <input type="text" class="form-control" name="name" id="groupName" placeholder="Group Name" value="<?php if(isset($object)) echo $object->name ?>" required="required">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Group Definition *</label>
                                <input type="text" class="form-control" name="definition" id="groupDefinition" placeholder="Group Definition" value="<?php if(isset($object)) echo $object->definition ?>" required="required">
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