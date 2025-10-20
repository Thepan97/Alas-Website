<style>
  .custom-dropdown {
  position: relative;
  display: inline-block;
  min-width: 120px;
}

/* 🔘 SIMPLE BUTTON STYLE */
.dropdown-btn {
  background: none;
  color: #fff;
  font-size: 14px;
  border: none;
  cursor: pointer;
  text-transform: capitalize;
  display: flex;
  align-items: center;
  gap: 6px;
}

/* 🔽 DROPDOWN CONTENT (same as before) */
.dropdown-content {
  display: none;
  position: absolute;
  top:40px;
  margin-left: 20px;
  min-width: 160px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  z-index: 1;
  border-radius: 4px;
  overflow: hidden;
  background-color: #fff;
}

.dropdown-content a {
  color: #333;
  padding: 10px 16px;
  text-decoration: none;
  display: block;
  font-size: 14px;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}
.dropdown-content a i {
  color: #055493 !important;
}

/* 🔄 Show on click */
.custom-dropdown.active .dropdown-content {
  display: block;
}


</style>

<!---------- Header Section start  ---------->
<?php $cart_items = $this->session->userdata('cart_items'); ?>
<?php $user_id = $this->session->userdata('user_id'); ?>
<?php $user_login = $this->session->userdata('user_login'); ?>
<?php $admin_login = $this->session->userdata('admin_login'); ?>
<?php if($user_id > 0){$user_details = $this->user_model->get_all_user($user_id)->row_array();} ?>
<header>
  <!-- Sub Header Start -->
  <div class="sub-header py-0">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-4 col-sm-12">
          <!-- <div class="icon icon-left">
            <ul class="nav">
              <li class="nav-item px-2">
                <a href="tel:<?php //echo get_settings('phone'); ?>"><i class="fa-solid fa-phone"></i> <?php //echo get_settings('phone'); ?></a>
              </li>
              <div class="vartical"></div>
              <li class="nav-item px-2">
                <a href="mailto:<?php //echo get_settings('system_email'); ?>"><i class="fas fa-envelope"></i> <?php //echo get_settings('system_email'); ?></a>
              </li>
            </ul>
          </div> -->
        </div>

        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 register_box">
          <div class="icon right-icon">
            <?php $facebook = get_frontend_settings('facebook'); ?>
            <?php $twitter = get_frontend_settings('twitter'); ?>
            <?php $linkedin = get_frontend_settings('linkedin'); ?>
            <ul class="nav justify-content-end top_gap_set">
             

              <!-- <a href="#" class="invisible" onclick="actionTo('<?php //echo site_url('home/dark_and_light_mode') ?>')"><i class="fas fa-moon"></i></a> -->

              <!-- <li class="nav-item align-items-center d-flex">
                <form action="#" method="POST" class="language-control select-box">
                  <select onchange="actionTo(`<?php echo site_url('home/switch_language/') ?>${$(this).val()}`)" class="select-control form-select nice-select">
                    <?php
                    $languages = $this->crud_model->get_all_languages();
                    $selected_language = $this->session->userdata('language');
                    foreach ($languages as $language): ?>
                      <?php if (trim($language) != ""): ?>
                        <option value="<?php echo strtolower($language); ?>" <?php if ($selected_language == $language): ?>selected<?php endif; ?>><?php echo ucwords($language);?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </select>
                </form>
              </li> -->

              <li class="last_line register_btn">
              <?php if(!$user_id): ?>
              <div class="custom-dropdown mx-1">
                  <button class="dropdown-btn" onclick="toggleDropdown()">
                    <i class="fas fa-user"></i> <?php echo get_phrase('Register'); ?>
                  </button>
                  <div class="dropdown-content">
                    <a href="<?php echo site_url('page/teacher-form'); ?>">
                      <i class="fas fa-chalkboard-teacher mr-2"></i> <?php echo get_phrase('As a Teacher'); ?>
                    </a>
                    <a href="<?php echo site_url('sign_up'); ?>">
                      <i class="fas fa-user-graduate mr-2"></i> <?php echo get_phrase('As a Student'); ?>
                    </a>
                  </div>

              </div>
              <a href="<?php echo site_url('login'); ?>" class="mx-1 text_cust"> <?php echo get_phrase('Sign in'); ?></a>
            <?php endif; ?>

              <?php if($user_login || $admin_login): ?>
                <!-- Profile Area -->
                <div class="menu_pro_tgl_div">
                  <div class="menu_pro_tgl-2div">
                    <a class="text_cust"> 
                      <?php echo $user_details['first_name'].' '.$user_details['last_name']; ?>
                    </a>
                  </div>
                  <div class="menu_pro_tgl_bg">
                    <div class="path-pos">
                       
                      <ul>
                        <?php if($user_login): ?>
                          
                          <?php if($user_details['is_instructor'] == 1): ?>
                            <li class="user-dropdown-menu-item"><a href="<?php echo site_url('user/dashboard'); ?>">
                              <?php echo site_phrase('Instructor Dashboard'); ?></a></li>
                          <?php else: ?>
                            <?php if (get_settings('allow_instructor') == 1) : ?>
                              <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/become_an_instructor'); ?>">
                                <?php echo site_phrase('Become an instructor'); ?></a></li>
                            <?php endif; ?>
                          <?php endif; ?>

                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>">
                            <?php echo site_phrase('my_courses'); ?></a></li>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>">
                            <?php echo site_phrase('my_wishlist'); ?></a></li>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>">
                            <?php echo site_phrase('my_messages'); ?></a></li>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>">
                            <?php echo site_phrase('purchase_history'); ?></a></li>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>">
                            <?php echo site_phrase('user_profile'); ?></a></li>
                          <?php if (addon_status('affiliate_course') ) :
                              $CI    = &get_instance();
                              $CI->load->model('addons/affiliate_course_model');
                              $x = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));
                              $is_affiliator = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));

                              if ($x == 0 && get_settings('affiliate_addon_active_status') == 1) : ?>


                                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/become_an_affiliator'); ?>">
                                    <?php echo site_phrase('Become_an_Affiliator'); ?></a></li>
                              <?php else : ?>
                                  <?php if ($is_affiliator == 1) : ?>


                                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/affiliate_course_history '); ?>">
                                        <?php echo site_phrase('Affiliation History'); ?></a></li>
                                  <?php endif; ?>
                              <?php endif; ?>
                          <?php endif; ?>
                          <?php if (addon_status('customer_support')) : ?>
                              <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>">
                                <?php echo site_phrase('support'); ?></a></li>
                          <?php endif; ?>
                        <?php endif; ?>

                        <?php if($admin_login): ?>
                          <li>
                            <a href="<?php echo site_url('admin'); ?>">
                              
                              <?php echo get_phrase('Administration'); ?>
                            </a>
                          </li>
                          <li>
                            <a href="<?php echo site_url('admin/manage_profile'); ?>">
                              
                              <?php echo get_phrase('Manage profile') ?>
                            </a>
                          </li>       
                          <li>
                            <a href="<?php echo site_url('admin/system_settings'); ?>">
                             
                              <?php echo get_phrase('Settings') ?>
                            </a>
                          </li>  
                        <?php endif; ?>

                        <li>
                          <a href="<?php echo site_url('login/logout'); ?>">
                            
                            <?php echo get_phrase('Log out'); ?>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
              </li>

               <li class="mobile_flow" style="color: #fff; ">
                 Follow Us :
               </li>

               <li class="nav-item">
                  <a target="_blank" href="https://www.linkedin.com/company/alastutorsltd"><i class="fa-brands fa-linkedin"></i></a>
                </li>
                <li class="nav-item">
                  <a target="_blank" href="https://www.facebook.com/alastutorsltd"><i class="fa-brands fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                  <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                </li>

                 <li class="nav-item">
                  <a target="_blank" href="https://www.tiktok.com/@alastutors"><i class="fa-brands fa-tiktok"></i></a>
                </li>
                <li class="nav-item">
                  <a target="_blank" href="https://x.com/alastutorsltd"><i class="fa fa-times"></i></a>
                </li>
                <li class="nav-item">
                  <a target="_blank" href="mailto:info@alastutors.com"><i class=" fa fa-envelope"></i></a>
                </li>
<!-- 
               <?php if($facebook): ?>
                
              <?php endif; ?>
              <?php if($twitter): ?>
                
              <?php endif; ?>
              <?php if($linkedin): ?>
               
              <?php endif; ?> -->

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
  function toggleDropdown() {
    var dropdown = document.querySelector('.custom-dropdown');
    dropdown.classList.toggle('active');
  }

  // Close dropdown if clicked outside
  document.addEventListener('click', function(event) {
    var dropdown = document.querySelector('.custom-dropdown');
    if (!dropdown.contains(event.target)) {
      dropdown.classList.remove('active');
    }
  });
</script>
  <!---- Sub Header End ------>
  
  <section class="menubar">
    <?php include "header_lg_device.php"; ?>
    <!-- Offcanves Menu  -->
    <?php include "header_sm_device.php"; ?>
  </section>
</header>
<!---------- Header Section End  ---------->