<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Maps Assets
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Member </a></li>
            <li><a href="#">Maps</a></li>
            <li class="active">Search Engine</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Pencarian</h3>
                        <input type="button" style="float:right;" id="clear_it" onclick="resetMap()" value="Reset"/>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <?php echo $this->template->widget("Mapstrans"); ?>

                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->