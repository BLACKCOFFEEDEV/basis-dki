<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>BASIS-DKI</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Lost password? We can help remind you.</p>

        <?php
        $success_msg = $this->session->flashdata('success');
        $error_msg = $this->session->flashdata('error');

        if($success_msg){
            ?>
            <div class="alert alert-success">
                <?php echo $success_msg; ?>
            </div>
            <?php
        }
        if($error_msg){
            ?>
            <div class="alert alert-danger">
                <?php echo $error_msg; ?>
            </div>
            <?php
        }
        ?>

        <div id="login_form">
            <form action="<?php echo base_url('auth/remind-password'); ?>" method="post">
                <div class="form-group has-feedback">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        &nbsp;
                    </div>

                    <div class="col-xs-7">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Remind My Password</button>
                    </div>
                </div>

            </form>
        </div>

        <u>
            <a href="<?php echo base_url('auth/sign-in') ?>">Sign In</a>
        </u>

    </div>
</div>