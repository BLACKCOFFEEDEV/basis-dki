<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('section/public/pub_head');?>
</head>

<body>
    <!-- Page Content -->
    <?php echo $content_get;?>
        <!-- End Content -->
        <?php $this->load->view('section/public/pub_core');?>
</body>

</html>