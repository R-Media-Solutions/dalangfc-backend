<div class="card login-card kd-content" data-name="<?php echo $this->security->get_csrf_token_name(); ?>" data-code="<?php echo $this->security->get_csrf_hash(); ?>">
    <div class="row no-gutters">
        <div class="col-md-7" style="background-color: #f5f5f5;">
            <img src="<?php echo ASSET_PATH; ?>auth/images/pages/logon.jpg" alt="login" class="login-card-img">
        </div>
        <div class="col-md-5">
            <div class="card-body pt-4 pb-3">
                <div class="py-4 text-center mb-3">
                    <img src="<?php echo BE_IMG_PATH; ?>logo.png" alt="logo" class="logo" height="100px">
                </div>
                <div class="card-title">
                    <p class="mb-0 mt-3">
                        <i class="fa fa-lock"></i> 
                        Halaman Masuk Akun
                    </p>
                </div>
                <p class="login-card-description mb-4">Silahkan ketik nama pengguna dan kata sandi anda.</p>
                <form class="validate-form login-form" method="post" action="<?php echo base_url('auth/validate'); ?>">
                    <div class="alert alert-danger error-validate" role="alert" style="line-height: 20px; text-align: center; display: none;">
                        <i class="mdi mdi-information-outline"></i>
                        <span style="font-size:12px;"> Ada beberapa kesalahan, silahkan cek formulir di bawah !</span>
                    </div>

                    <div class="form-group has-icon-left">
                        <label for="username" class="sr-only">Nama Pengguna</label>
                        <div class="input-group">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nama Pengguna">
                            <div class="form-control-icon">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group has-icon-left mb-4">
                        <label for="password" class="sr-only">Kata Sandi</label>
                        <div class="input-group show-hide-password">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Kata Sandi">
                            <div class="input-group-append" id="button-eye">
                                <button class="btn btn-default" type="button">
                                    <i class="icon-eye fa fa-eye-slash" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="form-control-icon">
                                <i class="fa fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Masuk">
                </form>
                <!--
                <a href="<?php echo base_url('forgetpassword'); ?>" class="text-reset login-card-footer-text d-block mb-0">Lupa Password? Klik disni</a>
                <a href="<?php echo base_url('forgetusername'); ?>" class="forgot-password-link">Lupa Username? Klik disni</a>
                -->
                <nav class="login-card-footer-nav mt-4">
                <?php echo COMPANY_NAME; ?><br />Powered By <a href="https://rmediasolutionsid.com/" target="_blank"><img src="<?php echo ASSET_PATH; ?>auth/images/rmedia.png" width="80">&copy; 2023. </a><br />All Right Reserved.
                </nav>
            </div>
        </div>
    </div>
</div>