<?php 
if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<!---------- Header Section End  ---------->
<section class="sign-up my-5 pt-5 pb-5">
    <div class="container ">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 m-auto">
                <div class="sing-up-right">
                    <div class="logo">
                        <span>
                            <img src="<?php echo site_url('uploads/system/'.get_frontend_settings('dark_logo')) ?>" alt="Logo" />
                        </span>
                    </div>
                    <h3><?php echo get_phrase('Sign Up'); ?><span>!</span></h3>
                     

                    <form action="<?php echo site_url('login/student_register') ?>" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Parent First Name</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-user"></i>
                                    <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Parent First Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Parent Last Name</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-user"></i>
                                    <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Parent Last Name" required>
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Child First Name</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-user"></i>
                                    <input class="form-control" id="child_first_name" type="text" name="child_first_name" placeholder="Child First Name" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Child Last Name</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-user"></i>
                                    <input class="form-control" id="child_last_name" type="text" name="child_last_name" placeholder="Child Last Name" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Parent Email</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Parent Email" required>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-12 mb-3">
                                <h5>Phone</h5>
                                <div class="position-relative">
                                    <i class="fa-solid fa-phone"></i>
                                    <input class="form-control" id="phone" type="phone" name="phone" placeholder="Phone" required>
                                </div>
                            </div>


                        </div>

                        <div class="mb-3">
                            <h5>Password</h5>
                            <div class="position-relative">
                                <i class="fa-solid fa-key"></i>
                                <i class="fa-solid fas fa-eye cursor-pointer" onclick="if($('#password').attr('type') == 'text'){$('#password').attr('type', 'password');}else{$('#password').attr('type', 'text');} $(this).toggleClass('fa-eye'); $(this).toggleClass('fa-eye-slash') " style="right: 20px; left: unset;"></i>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your valid password" required>
                            </div>
                        </div>
                         
                       
                        
                         <div class="mb-3">
                            <h5>Address</h5>
                            <div class="position-relative">
                                <i class="fa-solid fa-map-marker"></i>
                                <input class="form-control" id="address" type="address" name="address" placeholder="Enter your address" required>
                            </div>
                        </div>
                        
            <!--     <?php if(get_settings('allow_instructor')): ?>
                            <div class="mb-3 checkbox_id">
                                <input id="instructor" type="checkbox" onchange="$('#become-instructor-fields').toggle()" name="instructor" value="yes" <?php echo isset($_GET['instructor']) ? 'checked':''; ?>>
                                <label for="instructor" style="color: #fff"><?php echo get_phrase('Apply to Become an instructor'); ?></label>
                            </div>

                            <div id="become-instructor-fields" class="<?php echo isset($_GET['instructor']) ?  '':'d-hidden'; ?>">
                                <div class="mb-3">
                                    <h5><?php echo get_phrase('Phone'); ?></h5>
                                    <div class="position-relative">
                                        <i class="fas fa-phone"></i>
                                        <input class="form-control" id="phone" type="phone" name="phone" placeholder="<?php echo get_phrase('Enter your phone number'); ?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5><?php echo get_phrase('Document'); ?> <small>(doc, docs, pdf, txt, png, jpg, jpeg)</small></h5>
                                    <div class="position-relative">
                                        <input class="form-control" id="document" type="file" name="document">
                                        <small><?php echo get_phrase('Provide some documents about your qualifications'); ?></small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h5><?php echo get_phrase('message'); ?></h5>
                                    <div class="position-relative">
                                        <textarea class="form-control" name="message" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?> -->

                        <?php if(get_frontend_settings('recaptcha_status')): ?>
                            <div class="g-recaptcha" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                        <?php endif; ?>
                        
                        <div class="log-in">
                            <button type="submit" class="btn btn-primary">
                                <?php echo get_phrase('Sign Up') ?>
                            </button>
                            <p class="m-0">
                            <?php echo get_phrase('Already you have an account?') ?>
                            <a href="<?php echo site_url('login') ?>"><?php echo get_phrase('Log In') ?></a> </p> 
                        </div>
                    </form>

                     
                    <div class="social-media">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <!-- <button type="button" class="btn btn-primary"><a href="#"><img loading="lazy" src="image/facebook.png"> Facebook</a></button> -->
                                <?php if(get_settings('fb_social_login')) include "facebook_login.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</section>