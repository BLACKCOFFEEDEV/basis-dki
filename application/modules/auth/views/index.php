<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>BASIS-DKI</a>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Login to start your workspace</p>

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
            <form action="<?php echo base_url('auth/sign-in/validate'); ?>" method="post">
                <div class="form-group has-feedback">
                    <label for="email">Email / Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Email / Username">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>

            </form>
        </div>

        <u>
            <a href="<?php echo base_url('auth/forgot-my-password') ?>">I forgot my password</a><br />
            <a href="<?php echo base_url() ?>">back to home</a>
        </u>

    </div>
</div>