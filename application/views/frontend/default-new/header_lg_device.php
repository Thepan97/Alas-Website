<?php $header_menu_counter = 0; ?>
<nav class="navbar navbar-expand-lg navbar-light" id="navwrap">
  <div class="container">
    <a class="navbar-brand logo pt-0" href="<?php echo site_url(); ?>">
      <img loading="lazy" src="<?php echo site_url('uploads/system/'.get_frontend_settings('dark_logo')) ?>" alt="Logo" />
    </a>
    
    <!-- Mobile Offcanves  Icon Show -->
    <ul class="menu-offcanves">
      <li id="mobile_cart" class="right-menubar">
        <div class="wisth_tgl_2div">
            <a class="menu_pro_cart_tgl mt-2"
              ><i class="fa-solid fa-cart-shopping"></i>

              <p class="menu_number" id="cartItemsCounter"><?php echo count($cart_items); ?></p>
            </a>
            <div class="menu_pro_wish">
              <div class="overflow-control" id="cartItems">

                <?php include "cart_items.php"; ?>

              </div>
              <div class="menu_pro_btn">
                <a href="<?php echo site_url('home/shopping_cart'); ?>" type="submit" class="btn btn-primary text-white"><?php echo get_phrase('Checkout'); ?></a>
              </div>
            </div>
          </div>
      </li>
      <li>
        <div class="search-item">
          <span class="m-cross-icon"><img src="<?php echo base_url('assets/frontend/default-new/image/menubtn.png')?>" alt></span>
          <div class="search-item">
            <img src="<?php echo base_url('assets/frontend/default-new/image/search_icon.png')?>" alt>
        </div>
        </div>
      </li>
      <li>
        <a href="#" class="btn-bar" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><img src="<?php echo base_url('assets/frontend/default-new/image/menubtn.png')?>" alt></a>
      </li>
    </ul>

    <div class="navbar-collapse" id="navbarSupportedContent">
      <!-- Small Device Hide -->
      <!-- <ul class=" navbar-nav main-nav-wrap mb-2 mb-lg-0 align-items-center">
        <li class="nav-item">
          <a class="nav-link main_cate header-dropdown px-3 text-nowrap" href="#" id="navbarDropdown1">
            <img loading="lazy" src="<?php echo site_url('assets/frontend/default-new/') ?>image/menu.png" alt="Menu" />
            <span class="ms-2"><?php echo get_phrase('Courses'); ?></span>
          </a>
          <ul class="navbarHover">
            <?php
            $categories = $this->crud_model->get_categories()->result_array();
            foreach ($categories as $key => $category):?>
              <li class="dropdown-submenu">
                <a href="<?php echo site_url('home/courses?category='.slugify($category['slug'])) ?>">
                  <span class="icons"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
                  <span class="text-cat"><?php echo $category['name']; ?></span>
                  <span class="has-sub-category ms-auto"><i class="fa-solid fa-angle-right"></i></span>
                </a>
                <ul class="sub-category-menu">
                  <?php
                  $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                  foreach ($sub_categories as $sub_category): ?>
                    <li><a href="<?php echo site_url('home/courses?category='.slugify($sub_category['slug'])) ?>"><?php echo $sub_category['name']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endforeach; ?>
            <li>
              <a href="<?php echo site_url('home/courses'); ?>">
                <i class="fas fa-list-ul px-2"></i>
                <?php echo get_phrase('All Courses'); ?>    
              </a>
            </li>
          </ul>
        </li>
      </ul> -->

      <?php if(addon_status('course_bundle')): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
          <li class="nav-item">
            <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="<?php echo site_url('course_bundles'); ?>" id="navbarDropdown3">
              <span class="ms-2"><?php echo get_phrase('Course Bundle'); ?></span>
            </a>
          </li>
        </ul>
      <?php endif; ?>

      <!-- <?php if (addon_status('bootcamp')) : ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
            <li class="nav-item">
                <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="<?php echo site_url('addons/bootcamp/bootcamp_list'); ?>" id="navbarDropdown4">
                    <span class="ms-2"><?php echo get_phrase('Tuition Center'); ?></span>
                </a>
            </li>
        </ul>
      <?php endif; ?> -->

      <?php if (addon_status('team_training')) : ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
            <li class="nav-item">
                <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="<?php echo site_url('addons/team_training/packages'); ?>" id="navbarDropdown4">
                    <span class="ms-2"><?php echo get_phrase('Team training'); ?></span>
                </a>
            </li>
        </ul>
      <?php endif; ?>

      <?php if(addon_status('ebook')): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
          <li class="nav-item">
            <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="#" id="navbarDropdown1">
              <span class="ms-2"><?php echo get_phrase('Ebook'); ?></span>
              <i class="fas fa-angle-down ms-1"></i>
            </a>
            <ul class="navbarHover">
              <?php
              $ebook_categories = $this->db->get('ebook_category')->result_array();
              foreach ($ebook_categories as $key => $ebook_category):?>
                <li class="dropdown-submenu">
                  <a href="<?php echo site_url('ebook?category='.$ebook_category['slug'].'&price=all&rating=all') ?>">
                    <span class="text-cat"><?php echo $ebook_category['title']; ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
      <?php endif; ?>

      <?php if(addon_status('tutor_booking')): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav main-nav-wrap mb-2 mb-lg-0 ms-2">
          <li class="nav-item">
          <a class="nav-link header-dropdown bg-white text-dark fw-600 text-nowrap" href="<?php echo site_url('tutors'); ?>" id="navbarDropdown2">
              <?php echo get_phrase('Find a Tutor'); ?>    
            </a>
          </li>
        </ul>
      <?php endif; ?>

      <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'header'); ?>
      <?php if($custom_page_menus->num_rows() == 1): ?>


        <?php $header_menu_counter += 1; ?>
        <?php $custom_page_menu = $custom_page_menus->row_array(); ?>
        <a class="text-dark fw-600 text-15px ms-3" href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>"><?php echo $custom_page_menu['button_title']; ?></a>
      <?php elseif($custom_page_menus->num_rows() > 1): ?>
        <?php $header_menu_counter += 1; ?>
        <ul class="navbar-nav custom_menu mb-2 mb-lg-0 ms-2">

          <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('home/home'); ?>">
                Home 
                <!-- <?php echo get_phrase('Home') ?>   -->
              </a>
            </li>


            <li class="nav-item custom_drop custom_all_new" style="display: none;">
          <a class="nav-link" href="#">
          
            <span class="ms-2"><?php echo get_phrase('Courses'); ?></span>


            <svg width="17" height="8" viewBox="0 0 17 8" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M15.6562 1.28711L8.65625 6.36013L1.65625 1.28711" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </svg>

          </a>
          <ul class="dropdown_menu">
            <?php
            $categories = $this->crud_model->get_categories()->result_array();
            foreach ($categories as $key => $category):?>
              <li class="dropdown-submenu">
                <a href="<?php echo site_url('home/courses?category='.slugify($category['slug'])) ?>">
                  <span class="icons"><i class="<?php echo $category['font_awesome_class']; ?>"></i></span>
                  <span class="text-cat"><?php echo $category['name']; ?></span>
                  <span class="has-sub-category ms-auto"><i class="fa-solid fa-angle-right"></i></span>
                </a>
                <ul class="sub-category-menu">
                  <?php
                  $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                  foreach ($sub_categories as $sub_category): ?>
                    <li><a href="<?php echo site_url('home/courses?category='.slugify($sub_category['slug'])) ?>"><?php echo $sub_category['name']; ?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            <?php endforeach; ?>
            <li>
              <a href="<?php echo site_url('home/courses'); ?>">
                <i class="fas fa-list-ul px-2"></i>
                <?php echo get_phrase('All Courses'); ?>    
              </a>
            </li>
          </ul>
        </li>

           <!--  <?php 
            echo "<pre>";
            print_r ($custom_page_menus->result_array());
            echo "</pre>";
             ?> -->
          <!-- <?php foreach ($custom_page_menus->result_array() as $custom_page_menu) : ?>

            <?php if ($custom_page_menu['page_url'] == 'tuition'): ?>
              <?php  ?>
            <?php endif ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>">
                <?php echo $custom_page_menu['button_title']; ?>   
              </a>
            </li>
          <?php endforeach; ?> -->

          <?php foreach ($custom_page_menus->result_array() as $custom_page_menu) : ?>

            <?php 

             if (
                $custom_page_menu['page_url'] == 'face-to-face'

               ) {
               break;
             }

             ?>

              <?php if ($custom_page_menu['page_url'] == 'tuition'): ?>
                  <li class="nav-item custom_drop" style="display: none;">
                      <a class="nav-link" href="#">
                          <?php echo $custom_page_menu['button_title']; ?>  

                          <svg width="17" height="8" viewBox="0 0 17 8" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M15.6562 1.28711L8.65625 6.36013L1.65625 1.28711" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                          </svg>

                      </a>
                      <div class="dropdown_menu">
                          <!-- Add custom dropdown items here -->
                          <a href="<?php echo site_url('page/face-to-face'); ?>"><?php echo get_phrase('Face to Face') ?></a>
                          <a href="<?php echo site_url('page/tutoring'); ?>"><?php echo get_phrase('Tutoring') ?></a>
                          <a href="<?php echo site_url('page/11-13-exam-prep'); ?>"><?php echo get_phrase('11+/13+ exam prep') ?></a>
                          <a href="<?php echo site_url('page/sats-prep'); ?>"><?php echo get_phrase('SATs prep') ?></a>
                          <a href="<?php echo site_url('page/pre-gcses-tutoring'); ?>"><?php echo get_phrase('Pre-GCSEs tutoring') ?></a>
                          <a href="<?php echo site_url('page/gcses-exam-prep'); ?>"><?php echo get_phrase('GCSEs exam prep') ?></a>
                          <a href="<?php echo site_url('page/a-levels-prep'); ?>"><?php echo get_phrase('A-levels prep') ?></a>
                          <a href="<?php echo site_url('page/holidays-summer-school'); ?>"><?php echo get_phrase('Holidays & Summer School') ?></a>
                          <a href="<?php echo site_url('page/intensive-subjects'); ?>"><?php echo get_phrase('Intensive Subjects') ?></a>
                          <a href="<?php echo site_url('page/price-list'); ?>"><?php echo get_phrase('Price List') ?></a>
                      </div>
                  </li>
              <?php else: ?>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo site_url('page/' . $custom_page_menu['page_url']); ?>">
                          <?php echo $custom_page_menu['button_title']; ?>   
                      </a>
                  </li>
              <?php endif; ?>

              

          <?php endforeach; ?>

          <!-- <li class="nav-item">
            <?php //foreach ($custom_page_menus->result_array() as $custom_page_menu) : ?>
                <li>
                  <a href="<?php //echo site_url('page/' . $custom_page_menu['page_url']); ?>">
                    <?php //echo $custom_page_menu['button_title']; ?>   
                  </a>
                </li>
              <?php //endforeach; ?>
            <ul class="navbarHover">
              <?php //foreach ($custom_page_menus->result_array() as $custom_page_menu) : ?>
                <li>
                  <a href="<?php //echo site_url('page/' . $custom_page_menu['page_url']); ?>">
                    <?php //echo $custom_page_menu['button_title']; ?>   
                  </a>
                </li>
              <?php //endforeach; ?>
            </ul>
          </li> -->

          <li class="nav-item custom_drop">
            <a class="nav-link" href="<?php echo site_url('page/in-person-classes'); ?>">In-person Classes</a>
            <div class="dropdown_menu in_person">
                <a href="<?php echo site_url('page/in-person-classes'); ?>#section_01">What we offer</a>
                <a href="<?php echo site_url('page/in-person-classes'); ?>#section_02">Pricing</a>
                <a href="<?php echo site_url('page/in-person-classes'); ?>#section_03">Special offers</a>
            </div>
          </li>
              <li class="nav-item custom_drop">
                <a class="nav-link" href="<?php echo site_url('page/online-classes'); ?>">Online Classes</a>
                <div class="dropdown_menu in_person">
                  <a href="<?php echo site_url('page/online-classes'); ?>#section_01">What we offer</a>
                <a href="<?php echo site_url('page/online-classes'); ?>#section_02">Pricing</a>
                <a href="<?php echo site_url('page/online-classes'); ?>#section_03">Special offers</a>
              </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="<?php echo site_url('page/home-schooling'); ?>">Homeschooling</a></li>
              <li class="nav-item custom_drop">
                <a class="nav-link" href="<?php echo site_url('page/child-care'); ?>">Childcare</a>
                <div class="dropdown_menu ">
                  <a href="<?php echo site_url('page/child-care'); ?>#section_04">School pick up/ drop off</a>
                  <a href="<?php echo site_url('page/child-care'); ?>#section_05">Parents night out</a>
                  <a href="<?php echo site_url('page/child-care'); ?>#section_06">Summer school</a>
              </div>
              </li>

              
        </ul>
      <?php endif; ?>


      <?php if($header_menu_counter > 3): ?>
        <!-- <form class="search-input-form" action="<?php echo site_url('home/courses'); ?>" method="get">
          <div class="dropdown">
            <button class="btn search-input-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-search search-menu-icon"></i>
              <i class="fas fa-times text-18px close-menu-icon"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end p-0 border-0">
              <li>
                <div class="header-search mt-2 w-100 flex-column" style="box-shadow: 0px 2px 8px -1px #bbb;">
                  <p class="text-muted text-14px text-start w-100 mb-2"><?php echo get_phrase('Discover which courses are the best for you'); ?></p>  
                  <div class="search-container w-100">
                    <input id="headerSearchBarLg" name="query" type="text" class="search-input-floating <?php echo isset($_GET['query']) ? 'focused':''; ?>" placeholder="<?php echo get_phrase('Search'); ?>" value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>">
                    <button type="submit" class="header-search-icon border-0 text-dark text-16px <?php echo isset($_GET['query']) ? '':'d-hidden'; ?>"><i class="fas fa-search"></i></button>
                    <label for="headerSearchBarLg" class="header-search-icon text-dark text-16px <?php echo isset($_GET['query']) ? 'd-hidden':''; ?>"><i class="fas fa-search"></i></label>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </form> -->
      <?php else: ?>
        <!-- <form class="search_form w-100 focused" action="<?php echo site_url('home/courses'); ?>" method="get">
          <div class="header-search py-0 px-2 w-100">
            <div class="search-container w-100 me-3">
              <input id="headerSearchBarLg" name="query" type="text" class="search-input <?php echo isset($_GET['query']) ? 'focused':''; ?>" placeholder="<?php echo get_phrase('Search'); ?>" value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>">
              <button type="submit" class="header-search-icon border-0 text-dark text-16px <?php echo isset($_GET['query']) ? '':'d-hidden'; ?>"><i class="fas fa-search"></i></button>
              <label for="headerSearchBarLg" class="header-search-icon text-dark text-16px <?php echo isset($_GET['query']) ? 'd-hidden':''; ?>"><i class="fas fa-search"></i></label>
            </div>
          </div>
        </form> -->
      <?php endif; ?>

      <div class="right-menubar ms-auto">
        
          <div class="search-item">
            <img src="<?php echo base_url('assets/frontend/default-new/image/search_icon.png')?>" alt>
        </div>

        <!-- <?php if($user_login): ?>
          <li><a class="dropdown-item" href="<?php echo site_url('home/my_courses') ?>"><?php echo site_phrase('My Course') ?></a></li>
        <?php elseif($admin_login): ?>
          <li><a class="dropdown-item" href="<?php echo site_url('admin'); ?>"><?php echo get_phrase('Administration') ?></a></li>           
        <?php endif; ?> -->


        <!-- Cart List Area -->
        <div class="wisth_tgl_div me-3">
              
          <div class="wisth_tgl_2div">
            <a class="menu_pro_cart_tgl mt-2"
              ><i class="fa-solid fa-cart-shopping"></i>

              <p class="menu_number" id="cartItemsCounter"><?php echo count($cart_items); ?></p>
            </a>
            <div class="menu_pro_wish">
              <div class="overflow-control" id="cartItems">

                <?php include "cart_items.php"; ?>

              </div>
              <div class="menu_pro_btn">
                <a href="<?php echo site_url('home/shopping_cart'); ?>" type="submit" class="btn btn-primary text-white"><?php echo get_phrase('Checkout'); ?></a>
              </div>
            </div>
          </div>
        </div>

        <a href="<?php echo site_url('page/contact_us') ?>" class="btn_header_btn"> <?php echo get_phrase('CONTACT US') ?></a>

        <?php if($user_login): ?>
          <!-- Wish List Area -->
          <!-- <div class="wisth_tgl_div">
            <div class="wisth_tgl_2div">
              <a class="menu_wisth_tgl mt-1">
                <i class="fa-regular fa-heart"></i>

                <?php if(count($my_wishlist_items) > 0): ?>
                  <p class="menu_number" id="wishlistItemsCounter">
                    <?php echo count($my_wishlist_items); ?>
                  </p>
                <?php endif; ?>
              </a>
              <div class="menu_pro_wish">
                <div class="overflow-control" id="wishlistItems">
                  <?php include "wishlist_items.php"; ?>
                </div>
                <div class="menu_pro_btn">
                  <a href="<?php echo site_url('home/my_wishlist'); ?>" class="btn btn-primary text-white"><?php echo get_phrase('Go to wishlist'); ?></a>
                </div>
              </div>
            </div>
          </div> -->

          <!-- Notification Area -->
          <!-- <div class="wisth_tgl_div">
            <div class="wisth_tgl_2div" id="headerNotification">
              <?php include "notifications.php"; ?>
            </div>
          </div> -->
        <?php endif; ?>


       <!--  <?php if(!$user_id): ?>
          <a href="<?php echo site_url('login'); ?>" class="mx-3"> <?php echo get_phrase('Login'); ?></a>
          <a href="<?php echo site_url('sign_up'); ?>" class="mx-3 text-capitalize" style="min-width: 70px"> <?php echo get_phrase('Join Now'); ?></a>
        <?php endif; ?>

          <?php if($user_login || $admin_login): ?>
            
            <div class="menu_pro_tgl_div">
              <div class="menu_pro_tgl-2div">
                <a class="menu_pro_tgl profile-dropdown"><img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($user_id); ?>" alt="User Image" /></a>
              </div>
              <div class="menu_pro_tgl_bg">
                <div class="path-pos">
                  <a href="#"><img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($user_id); ?>" alt="User Image"/></a>
                  <a href="#"><h4><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4></a>
                  <p><?php echo $user_details['email']; ?></p>
                  <ul>
                    <?php if($user_login): ?>
                      
                      <?php if($user_details['is_instructor'] == 1): ?>
                        <li class="user-dropdown-menu-item"><a href="<?php echo site_url('user/dashboard'); ?>"><i class="fas fa-columns"></i><?php echo site_phrase('Instructor Dashboard'); ?></a></li>
                      <?php else: ?>
                        <?php if (get_settings('allow_instructor') == 1) : ?>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/become_an_instructor'); ?>"><i class="fas fa-columns"></i><?php echo site_phrase('Become an instructor'); ?></a></li>
                        <?php endif; ?>
                      <?php endif; ?>

                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_courses'); ?>"><i class="far fa-gem"></i><?php echo site_phrase('my_courses'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_wishlist'); ?>"><i class="far fa-heart"></i><?php echo site_phrase('my_wishlist'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/my_messages'); ?>"><i class="far fa-envelope"></i><?php echo site_phrase('my_messages'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/purchase_history'); ?>"><i class="fas fa-shopping-cart"></i><?php echo site_phrase('purchase_history'); ?></a></li>
                      <li class="user-dropdown-menu-item"><a href="<?php echo site_url('home/profile/user_profile'); ?>"><i class="fas fa-user"></i><?php echo site_phrase('user_profile'); ?></a></li>
                      <?php if (addon_status('affiliate_course') ) :
                          $CI    = &get_instance();
                          $CI->load->model('addons/affiliate_course_model');
                          $x = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));
                          $is_affiliator = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));

                          if ($x == 0 && get_settings('affiliate_addon_active_status') == 1) : ?>


                              <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/become_an_affiliator'); ?>"><i class="fas fa-user-plus"></i><?php echo site_phrase('Become_an_Affiliator'); ?></a></li>
                          <?php else : ?>
                              <?php if ($is_affiliator == 1) : ?>


                                  <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/affiliate_course/affiliate_course_history '); ?>"><i class="fa fa-book"></i><?php echo site_phrase('Affiliation History'); ?></a></li>
                              <?php endif; ?>
                          <?php endif; ?>
                      <?php endif; ?>
                      <?php if (addon_status('customer_support')) : ?>
                          <li class="user-dropdown-menu-item"><a href="<?php echo site_url('addons/customer_support/user_tickets'); ?>"><i class="fas fa-life-ring"></i><?php echo site_phrase('support'); ?></a></li>
                      <?php endif; ?>
                    <?php endif; ?>

                    <?php if($admin_login): ?>
                      <li>
                        <a href="<?php echo site_url('admin'); ?>">
                          <i class="fas fa-location-arrow"></i>
                          <?php echo get_phrase('Administration'); ?>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo site_url('admin/manage_profile'); ?>">
                          <i class="fas fa-user"></i>
                          <?php echo get_phrase('Manage profile') ?>
                        </a>
                      </li>       
                      <li>
                        <a href="<?php echo site_url('admin/system_settings'); ?>">
                          <i class="fas fa-cog"></i>
                          <?php echo get_phrase('Settings') ?>
                        </a>
                      </li>  
                    <?php endif; ?>

                    <li>
                      <a href="<?php echo site_url('login/logout'); ?>">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <?php echo get_phrase('Log out'); ?>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif; ?> -->

      </div>
    </div>

    <!-- Mobile Device Form -->
    <form action="<?php echo site_url('home/courses'); ?>" method="get" class="inline-form" id="search_form">
      <div class="mobile-search test">
        <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
        <input value="<?php echo isset($_GET['query']) ? $_GET['query']:''; ?>" name="query" class="form-control" type="text" placeholder="<?php echo get_phrase('Search'); ?>" />
      </div>
    </form>

  </div>
</nav>