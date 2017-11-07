<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Business Analyst Spatial Information Systems DKI">
    <meta name="author" content="DKI Jakarta">

    <title><?php echo $this->template->title->default("Business Analyst Spatial Information Systems DKI"); ?></title>

    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/face/back/dist/css/skins/skin-blue.min.css'); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel='stylesheet' href="<?php echo base_url(); ?>assets/maps/css/style_adm.css" />

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/face/back/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/face/back/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/face/back/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/face/back/bower_components/notify.js/notify.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <a href="dashboard" class="logo">
            <span class="logo-mini"><b>A</b>BD</span>
            <span class="logo-lg"><b>Admin</b>BASIS-DKI</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="<?php echo base_url('assets/face/back/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url('account/profile/image'); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $this->aauth->get_user()->email ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo base_url('account/profile/image'); ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->aauth->get_user()->email ?>

                                    <?php if(is_member()): ?>
                                        <small>Member since <?php echo get_member()->member_since ?></small>
                                    <?php endif; ?>

                                    <?php if(is_employee()): ?>
                                        <small>Employee no <?php echo get_employee()->nip ?></small>
                                    <?php endif; ?>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url('account/profile');?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('auth/sign-out');?>" class="btn btn-danger btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php echo $this->template->widget("navigation"); ?>

    <?php echo $this->template->content; ?>

    <div class="modal fade" id="loading">
        <div class="modal-dialog" style="max-width: 300px;">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Please wait...</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            QC By DONNY PTSP - DKI
        </div>
        <strong>Customized &copy; 2017 <a href="#">TEAM-BLACKCOFFEEDEV™</a>.</strong> All rights reserved.
    </footer>
</div>

<!-- REQUIRED JS SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/face/back/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/face/back/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //
    });

    function notice() {
        <?php
        $type = "";
        $messages = "";
        $notice = false;

        if($this->session->flashdata('success')) {
            $type = "success";
            $messages = $this->session->flashdata('success');
            $notice = true;
        }

        if($this->session->flashdata('error')) {
            $type = "error";
            $messages = $this->session->flashdata('error');
            $notice = true;
        }

        if ($notice) : ?>
        $.notify("<?php echo $messages ?>", "<?php echo $type ?>");
        <?php endif; ?>
    }

    function freeze() {
        $("#loading").modal();
    }

    function unfreeze() {
        $("#loading").modal("hide");
    }
</script>
</body>