<style>
  .flash-message {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    width: auto;
    max-width: 400px;
  }
</style>


<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<!---------- Header Section End  ---------->
    <section class="sign-up">
        <div class="sing-up-right">

            <div class="logo">
                <span>
                    <img src="<?php echo site_url('uploads/system/'.get_frontend_settings('dark_logo')) ?>" alt="Logo" />
                </span>
            </div>

            <h3><?php echo get_phrase('Log In'); ?><span>!</span></h3>
             

            <form action="<?php echo site_url('login/new_validate_login') ?>" method="post">
                <div class="mb-4">
                    <h5><?php echo get_phrase('Your email'); ?></h5>
                    <div class="position-relative">
                        <i class="fa-solid fa-user"></i>
                        <input class="form-control" id="email" type="email" name="email" placeholder="<?php echo get_phrase('Enter your email'); ?>">
                    </div>
                </div>
                <div class="">
                    <h5><?php echo get_phrase('Password') ?></h5>
                    <div class="position-relative">
                        <i class="fa-solid fa-key"></i>
                        <i class="fa-solid fas fa-eye cursor-pointer" onclick="if($('#password').attr('type') == 'text'){$('#password').attr('type', 'password');}else{$('#password').attr('type', 'text');} $(this).toggleClass('fa-eye'); $(this).toggleClass('fa-eye-slash') " style="right: 20px; left: unset;"></i>
                        <input class="form-control" id="password" type="password" name="password" placeholder="<?php echo get_phrase('Enter your valid password'); ?>">
                    </div>
                     
                </div>
                <?php if(get_frontend_settings('recaptcha_status')): ?>
                    <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                <?php endif; ?>
                <div class="log-in">
                    <button type="submit" class="btn btn-primary">
                        <?php echo get_phrase('Log in') ?>
                    </button>

                    <a class="text-end w-100 text-muted" style="color: #fff !important" href="<?php echo site_url('login/forgot_password_request'); ?>"><?php echo get_phrase('Forgot password?'); ?></a>
                </div>
            </form>

            <div class="another text-center">
                <p>
                    <?php echo get_phrase('Don`t have an account?') ?>
                    <a href="<?php echo site_url('sign_up') ?>"><?php echo get_phrase('Become a Student') ?></a>
                </p>
                <!-- <h5><?php echo get_phrase('Or') ?></h5> -->
            </div>
            <div class="social-media">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <button type="button" class="btn btn-primary"><a href="#"><img loading="lazy" src="image/facebook.png"> Facebook</a></button> -->
                        <?php if(get_settings('fb_social_login')) include "facebook_login.php"; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_login_side">
            <div class="flash-message">
    <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
       <?= $this->session->flashdata('error'); ?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       <?= $this->session->flashdata('success'); ?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
</div>

            <!-- <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/img/login_pic.png') ?>" style="width:90%;"> -->
        </div>
    </section>