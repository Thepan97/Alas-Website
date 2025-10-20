<!---------- Banner Section Start ---------------->
<!-- style="background: url(<?php echo base_url('uploads/system/shape-banner.jpg')?>);" -->

<div id="slider">  
  <div class="slide" >
    <section class="new_shap h-1-banner bannar-area " >
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12 order-md-1 order-sm-2 order-2">
                <div class="h-1-banner-text ">
                    <?php
                        $banner_title = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <!-- <h1>
                        <?php
                        foreach($banner_title_arr as $key => $value){

                            if ($value == 'childcare') {
                                echo '<span >'.$value.' </span>';
                            }else
                            if($value == 'affordable'){
                                echo '<span >'.$value.' </span>';
                            }else{
                                echo $value.' ';
                            }
                        }
                        ?>
                    </h1> -->
                    <h1>We offer high quality  <span>tutoring </span> and  <span>childcare services </span> at affordable rates</h1>
                    <span class="banner_title_top"><?php echo get_phrase('At Alas Tutors we welcome children from all educational levels') ?>
                     </span>

                    <ul class="icon_box_banner">
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon1.png')?>">
                            <p><?php echo get_phrase('Primary') ?></p>
                        </li>
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon2.png')?>">
                            <p><?php echo get_phrase('Secondary') ?></p>
                        </li>
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon3.png')?>">
                            <p><?php echo get_phrase('A-Levels') ?></p>
                        </li>
                    </ul>
                    <div class="certified">
                        <p>Our small-group tutoring sessions are fully supervised by certified, experienced teachers who are dedicated to meeting the individual needs of every student.</p>
                    </div>
                    <div class="nurturing">
                        <p>Our childminders offer warm and nurturing care for your children to help them grow into inspiring young people, through fun and creative activities.</p>
                    </div>
                    <div class="banner_bottom">
                        <a href="<?= site_url('sign_up'); ?>" class="btn_banner"><?php echo get_phrase('Get Started') ?></a>
                        <a href="#" class="btn_banner_play">
                            <img src="<?php echo base_url('assets/frontend/default-new/image/get_play.png')?>" >
                            <?php echo get_phrase('Watch Videos') ?>
                        </a>
                    </div>
                    <!-- <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p> -->
                </div>

                <!-- <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="students-rating">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                                    <span><?php echo nice_number($all_students->num_rows()); ?>+</span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <p><?php echo get_phrase('Happy') ?></p>
                                    <p><?php echo get_phrase('Students') ?></p>
                                </div> 
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-ban-st.png')?>" alt="">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
                                    <span class="style2"><?php echo nice_number($all_instructor->num_rows()); ?>+</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                    <p><?php echo get_phrase('Experienced') ?></p>
                                    <p><?php echo get_phrase('Instructors') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="search-option">
                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                        <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                    </form>
                </div> -->
                
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 order-md-2 order-sm-1 order-1 pt-0 pt-md-5  pl-0 pr-0 hide_mobile">
                <img loading="lazy" width="100%" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>">

                <!-- <div class="banner_bottom">
                    <a href="<?= site_url('page/teacher-form'); ?>" class="btn_banner"><?php echo get_phrase('Get Started') ?></a>
                    <a href="" class="btn_banner_play">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/get_play.png')?>" >
                        <?php echo get_phrase('Watch Videos') ?>
                    </a>
                </div> -->
            </div>
        </div> 
        
        <!-- <div class="bannar-card">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                                <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-1.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php
                                    $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                                    $number_of_courses = $status_wise_courses['active']->num_rows();
                                    echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h6>
                                <p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-2.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php echo site_phrase('expert_instruction'); ?></h6>
                                <p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-3.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php echo site_phrase('Smart solution'); ?></h6>
                                <p><?php echo site_phrase('learn_on_your_schedule'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div> -->
    </div>
</section>
  </div>
  
  <div class="slide">
     <section class="new_shap h-1-banner bannar-area " >
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12 order-md-1 order-sm-2 order-2">
                <div class="h-1-banner-text ">

                    

                    <?php
                        $banner_title = site_phrase(get_frontend_settings('banner_title'));
                        $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <!-- <h1>
                        <?php
                        foreach($banner_title_arr as $key => $value){

                            if ($value == 'childcare') {
                                echo '<span >'.$value.' </span>';
                            }else
                            if($value == 'affordable'){
                                echo '<span >'.$value.' </span>';
                            }else{
                                echo $value.' ';
                            }
                        }
                        ?>
                    </h1> -->
                    <h1>We offer high quality  <span>tutoring </span> and  <span>childcare services </span> at affordable rates</h1>
                    <span class="banner_title_top"><?php echo get_phrase('At Alas Tutors we welcome children from all educational levels') ?>
                     </span>

                    <ul class="icon_box_banner">
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon1.png')?>">
                            <p><?php echo get_phrase('Primary') ?></p>
                        </li>
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon2.png')?>">
                            <p><?php echo get_phrase('Secondary') ?></p>
                        </li>
                        <li>
                            <img src="<?php echo base_url('assets/frontend/default-new/image/icon3.png')?>">
                            <p><?php echo get_phrase('A-Levels') ?></p>
                        </li>
                    </ul>
                    <div class="certified">
                        <p>Our small-group tutoring sessions are fully supervised by certified, experienced teachers who are dedicated to meeting the individual needs of every student.</p>
                    </div>
                    <div class="nurturing">
                        <p>Our childminders offer warm and nurturing care for your children to help them grow into inspiring young people, through fun and creative activities.</p>
                    </div>
                    <div class="banner_bottom">
                        <a href="<?= site_url('page/teacher-form'); ?>" class="btn_banner"><?php echo get_phrase('Get Started') ?></a>
                        <a href="" class="btn_banner_play">
                            <img src="<?php echo base_url('assets/frontend/default-new/image/get_play.png')?>" >
                            <?php echo get_phrase('Watch Videos') ?>
                        </a>
                    </div>
                    <!-- <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p> -->
                </div>

                <!-- <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="students-rating">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <?php $all_students = $this->db->get_where('users', ['role_id !=' => 1]); ?>
                                    <span><?php echo nice_number($all_students->num_rows()); ?>+</span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <p><?php echo get_phrase('Happy') ?></p>
                                    <p><?php echo get_phrase('Students') ?></p>
                                </div> 
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-ban-st.png')?>" alt="">
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                                    <?php $all_instructor = $this->db->get_where('users', ['is_instructor' => 1]); ?>
                                    <span class="style2"><?php echo nice_number($all_instructor->num_rows()); ?>+</span>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                    <p><?php echo get_phrase('Experienced') ?></p>
                                    <p><?php echo get_phrase('Instructors') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="search-option">
                    <form action="<?php echo site_url('home/search'); ?>" method="get">
                        <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="query">
                        <button class="submit-cls" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                    </form>
                </div> -->
                
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12 order-md-2 order-sm-1 order-1 pt-0 pt-md-5  pl-0 pr-0 hide_mobile">
                <img loading="lazy" width="100%" src="<?php echo base_url("uploads/system/" . get_current_banner('banner_image')); ?>">

                <!-- <div class="banner_bottom">
                    <a href="<?= site_url('page/teacher-form'); ?>" class="btn_banner"><?php echo get_phrase('Get Started') ?></a>
                    <a href="" class="btn_banner_play">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/get_play.png')?>" >
                        <?php echo get_phrase('Watch Videos') ?>
                    </a>
                </div> -->
            </div>
        </div> 
        
        <!-- <div class="bannar-card">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                                <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-1.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php
                                    $status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                                    $number_of_courses = $status_wise_courses['active']->num_rows();
                                    echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h6>
                                <p><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-2.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php echo site_phrase('expert_instruction'); ?></h6>
                                <p><?php echo site_phrase('find_the_right_course_for_you'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="banner-card-1">
                        <div class="row">
                            <div class="col-lg-2">
                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/h-1-bnar-c-3.png')?>">
                            </div>
                            <div class="col-lg-10">
                                <h6><?php echo site_phrase('Smart solution'); ?></h6>
                                <p><?php echo site_phrase('learn_on_your_schedule'); ?></p>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div> -->
    </div>
</section>
  </div>
  
  <!--Controlling arrows-->
    <span class="controls" onclick="prevSlide(-1)" id="left-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
    <span class="controls" id="right-arrow" onclick="nextSlide(1)"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
</div>
    <div id="dots-con"><span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>


<!---------- Banner Section End ---------------->


<!-- Help your child  -->
<section class="works_wrapper" id="our_promise">
    <!-- <div class="curve_shapebg">
         <img src="<?php echo base_url('assets/frontend/default-new/img/shape_bluecurve.png') ?>" >
    </div> -->
    <div class="container">
        <!-- <div class="works_head"> -->
           <!--  <span><?php echo get_phrase('How can We') ?></span>
            <h2><?php echo get_phrase('Support Your Child’s Success') ?></h2> -->
            <!-- <b><?php echo get_phrase('We believe that our students should be nurtured in a safe environment free from abuse and bullying of any kind. All of our tutors have a responsibility to promote the welfare of our students, to keep them safe and operate in a way that protects them. ') ?></b> -->
            <!-- <p><?php echo get_phrase("Alastutors is a team of passionate and skilled educators committed to inspiring a love for learning and helping students reach — and exceed — their full potential. We take pride in teaching and view it as a privilege to work closely with each student. By providing instruction in small groups, we’re able to offer more personalized support and guidance than what’s typically possible in larger classroom settings.") ?></p> -->
        <!-- </div> -->
        <div class="nurturing_box support_box">
            <h2>Our promise to support your child’s <span>success</span> and <span>excellence</span></h2>
            <p>Alas tutors is a team of skilled, nurturing educators and childminders committed to inspiring a love for learning and helping students reach their full potential.</p>
            <p>Since 2015, our team has helped inspire and empower young learners in every core subject. Our classes are tailored to your child’s unique strengths as we pay great attention to each student’s needs.</p>
        </div>

        <div class="row justify-content-center how_can_we excellence_box mt-5">
            <div class="col-lg-3 col-md-6 col-sm-12 works_id">
                <a class="position-relative">
                  <div class="cate-icon" style="color: #702050">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/child1.png') ?>" >
                  </div>
                
                  <h5 class="pt-0"><?php echo get_phrase('Enhance Their Understanding') ?></h5> 
             </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 works_id">
                <a class="position-relative">
                  <div class="cate-icon" style="color: #702050">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/child2.png') ?>" >
                  </div>
                
                  <h5 class="pt-0"><?php echo get_phrase('Improve Academic Performance') ?></h5> 
             </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 works_id">
                <a class="position-relative">
                  <div class="cate-icon" style="color: #702050">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/child3.png') ?>" >
                  </div>
                
                  <h5 class="pt-0"><?php echo get_phrase('Strengthen Self-Confidence') ?></h5> 
             </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 works_id">
                <a class="position-relative">
                  <div class="cate-icon" style="color: #702050">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/child4.png') ?>" >
                  </div>
                
                  <h5 class="pt-0"><?php echo get_phrase('Inspire a Lifelong Love of Learning') ?></h5> 
             </a>
            </div>
        </div>
    </div>
</section>
<!-- Help your child  -->

<!-- DISCOUNT -->
<section class="discount py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto ">
                <div class="discount_box">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 position-relative">
                            <div class="discount_bage">
                                <span>* 10%</span> <?php echo get_phrase('DISCOUNT') ?>
                            </div>
                            <p><?php echo get_phrase('AVAILABLE FOR SIBLINGS') ?></p>
                        </div>
                        <div class="col-lg-8 col-md-8 discount_icon">
                            <ul class="d-flex">
                                <li>
                                    <img src="<?php echo base_url('assets/frontend/default-new/img/discount1.png') ?>">
                                    <span><?php echo get_phrase('Exciting Competitions') ?></span>
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/frontend/default-new/img/discount2.png') ?>">
                                    <span><?php echo get_phrase('Engaging Presentations') ?></span>
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/frontend/default-new/img/discount3.png') ?>">
                                    <span><?php echo get_phrase('Inspiring Debates') ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="discount_btn">
                        <a href="<?= site_url('home/courses?category=summer-school'); ?>" class="btn"><?php echo get_phrase('Book Now') ?></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DISCOUNT -->


<!-- Subject Categories -->
<section class="subject_categories py-5" style="display:none;">
    <div class="container">
        <div>
            <h4 class="text-center new_heading mt-0 pt-0"><?php echo get_phrase('Subject Categories') ?></h4>
        </div>
        <div class="sub_categories">
            <div class="row">
                <div class="col-lg-4 col-md-4 sub_img">
                  <img src="<?php echo base_url('assets/frontend/default-new/img/sub_img.png') ?>" class="w-100">  
                </div>
                <div class="col-lg-8 col-md-8 sub_cate">

                    <?php  $categories = $this->crud_model->get_categories()->result_array();?>

                    <ul>
                        <?php foreach ($categories as $category):?>
                        <li>
                            <a href="<?php echo site_url('home/courses?category='.slugify($category['slug'])) ?>">
                                <i class="top <?=$category['font_awesome_class']?>"></i>
                                <div class="d-flex">
                                    <span><?=$category['name']?></span>
                                    <i class="fas fa-angle-right"></i>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Subject Categories -->



<!-- Our Partners -->
<section class="partners_wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="our_partners">
                    <div class="title">
                        <h3><?php echo get_phrase('Our Trusted Partners') ?></h3>
                    </div>
                    <div class="logo">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_01.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_02.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_03.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_04.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_05.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_06.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_07.jpg')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Partners -->

<!-- Testimonials -->
<section class="testimonials testimonials_wrap ">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 video_img">
                <img src="<?php echo base_url('assets/frontend/default-new/image/videoimg.jpg')?>">
                <a href="#" class="btn_banner_play">
                    <img src="<?php echo base_url('assets/frontend/default-new/image/get_play.png')?>" >
                </a>
            </div>
            <div class="col-lg-8 testimonials_box">
                
        <div class="promo_heading">
            <!-- <span><?php echo get_phrase('Testimonials') ?></span> -->
            <h4><?php echo get_phrase('What Our Student Say') ?></h4>
        </div>
        <div class="regular test_main">
          <div class="card">
              <div class="top_box d-flex">
                  <div class="cover">
                      <img src="<?php echo base_url('assets/frontend/default-new/img/avatar.jpg') ?>">
                  </div>
                  <div class="text">
                      <b><?php echo get_phrase('Ayesha, Year 6 – London') ?></b>
                      <span>2022-09-03</span>
                  </div>
                 <div class="last_id">
                     <img class="brand" src="<?php echo base_url('assets/frontend/default-new/img/google.png') ?>">
                 </div>
              </div>

              <div class="details">
                  <img src="<?php echo base_url('assets/frontend/default-new/img/ratting.png') ?>">
                  <p><?php echo get_phrase('Presentations') ?>Alastutors really helped me get to grips with my Maths and English. The lessons are clear, fun, and the tutors are always supportive. I’ve seen a big improvement in my schoolwork.</p>
                  <a href=""><?php echo get_phrase('Read More') ?></a>
              </div>
              
          </div>
           

        <div class="card">
              <div class="top_box d-flex">
                  <div class="cover">
                      <img src="<?php echo base_url('assets/frontend/default-new/img/avatar.jpg') ?>">
                  </div>
                  <div class="text">
                      <b><?php echo get_phrase('Daniel, Year 11 – Birmingham') ?></b>
                      <span>2022-09-03</span>
                  </div>
                 <div class="last_id">
                     <img class="brand" src="<?php echo base_url('assets/frontend/default-new/img/google.png') ?>">
                 </div>
              </div>

              <div class="details">
                  <img src="<?php echo base_url('assets/frontend/default-new/img/ratting.png') ?>">
                  <p><?php echo get_phrase('Presentations') ?>I was struggling with my GCSEs until I joined Alastutors. The tutors explain everything so well and make sure you actually understand it. I’ve gone up two grades in Science!</p>
                  <a href=""><?php echo get_phrase('Read more') ?></a>
              </div>
              
          </div>

          <div class="card">
              <div class="top_box d-flex">
                  <div class="cover">
                      <img src="<?php echo base_url('assets/frontend/default-new/img/avatar.jpg') ?>">
                  </div>
                  <div class="text">
                      <b><?php echo get_phrase('Imran, Year 5 – Manchester') ?></b>
                      <span>2022-09-03</span>
                  </div>
                 <div class="last_id">
                     <img class="brand" src="<?php echo base_url('assets/frontend/default-new/img/google.png') ?>">
                 </div>
              </div>

              <div class="details">
                  <img src="<?php echo base_url('assets/frontend/default-new/img/ratting.png') ?>">
                  <p><?php echo get_phrase('The small group sessions at Alastutors are brilliant. The teachers are friendly and always make time to help you. I felt really prepared for my 11+ exam.') ?></p>
                  <a href=""><?php echo get_phrase('Read more') ?></a>
              </div>
              
          </div>

          <div class="card">
              <div class="top_box d-flex">
                  <div class="cover">
                      <img src="<?php echo base_url('assets/frontend/default-new/img/avatar.jpg') ?>">
                  </div>
                  <div class="text">
                      <b><?php echo get_phrase('Laila, Year 4 – Bradford') ?></b>
                      <span>2022-09-03</span>
                  </div>
                 <div class="last_id">
                     <img class="brand" src="<?php echo base_url('assets/frontend/default-new/img/google.png') ?>">
                 </div>
              </div>

              <div class="details">
                  <img src="<?php echo base_url('assets/frontend/default-new/img/ratting.png') ?>">
                  <p><?php echo get_phrase('The summer programme was a great mix of learning and fun. We covered key subjects but also had loads of activities and games. I really looked forward to going every day!') ?></p>
                  <a href=""><?php echo get_phrase('Read more') ?></a>
              </div>
              
          </div>
        </div>
    
            </div>
        </div>
    </div>
</section>



<!-- Our Partners -->

<section class="integrations_wrap" style="display:none;">
    <div class="container">
        <div class="Integrations_box">
            <h4>Our Patterns</h4>
        </div>
        <div class="integrations">
            <div class="integrations-image">
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_01.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded">
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_05.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_05.jpg')?>" alt="logo-img-5"></noscript>
            </div>
            <div class="integrations-image integrations-between">
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_02.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_02.jpg')?>" alt="logo-img-3"></noscript>
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_03.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_03.jpg')?>" alt="logo-img-4"></noscript>
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_06.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_06.jpg')?>" alt="logo-img-5"></noscript>
            </div>
            <div class="integrations-image">
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_04.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_04.jpg')?>" alt="logo-img-6"></noscript>
                <img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_07.jpg')?>" alt="" class="lazyloaded" data-ll-status="loaded"><noscript><img width="190" height="76" src="<?php echo base_url('assets/frontend/default-new/image/logos_07.jpg')?>" alt="logo-img-7"></noscript>
            </div>
        </div>
    </div>
</section>

<section class="partners_wrapper" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="our_partners">
                    <div class="logo">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_01.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_05.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_02.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_03.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_06.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_04.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_07.jpg')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Partners -->






<!-- Packages Offer -->
<section class="packages_all py-5" style="display:none;">
    <div class="container">
        <div class="border_packages">
            <div class="packages_m">
                <div class="col-lg-4 col-md-6 m-auto we_offer">
                    <div class="top_pack"><?php echo get_phrase('We Offer') ?><span> <?php echo get_phrase('Different Packages') ?></span></div>
                </div>
                <div class="col-lg-4 m-auto">
                    <h3 class="text-center"><?php echo get_phrase('Designed to meet each child’s needs throughout the half term:') ?></h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="packages_box">
                            <h4><?php echo get_phrase('Year-round tutoring services') ?></h4>
                            <ul>
                                <li><?php echo get_phrase('Weekdays from 9 AM to 5 PM') ?></li>
                                <li><?php echo get_phrase('Children engage in all core subjects, along with playtime and interactive activities for a balanced learning experience.') ?></li>
                            </ul>
                            <a href="<?= site_url('page/registration-form'); ?>" class="btn" ><?php echo get_phrase('From -£25 per day, or up to £300 a month') ?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="packages_box">
                            <h4><?php echo get_phrase('Half-Term Tutoring Program') ?></h4>
                            <ul>
                                <li><?php echo get_phrase('Weekdays from 9 AM to 6 PM') ?></li>
                                <li><?php echo get_phrase('In addition to covering all core subjects, we make learning fun with extended playtime, themed exploration days, and engaging creative activities.') ?></li>
                            </ul>
                            <a href="<?= site_url('page/registration-form'); ?>" class="btn"><?php echo get_phrase('-£45 per day/ £200 per week') ?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="packages_box">
                            <h4><?php echo get_phrase('Summer School Program') ?></h4>
                            <ul>
                                <li><?php echo get_phrase('Weekdays from 9 AM to 6 PM') ?></li>
                                <li><?php echo get_phrase('Children focus on English, Math, and Science, exploring the upcoming year’s curriculum to give them a strong head start for the academic year ahead.') ?></li>
                            </ul>
                            <a href="<?= site_url('page/registration-form'); ?>" class="btn"><?php echo get_phrase('-£250 for the Subject') ?></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="packages_box">
                            <h4><?php echo get_phrase('Weeklong Intensive Program') ?> </h4>
                            <ul>
                                <li><?php echo get_phrase('Weekdays from 9 AM to 6 PM') ?></li>
                                <li><?php echo get_phrase('We offer flexible 1-hour or 2-hour individual lessons—ideal for students needing targeted support with homework or exam preparation, or for families seeking a more adaptable schedule.') ?></li>
                            </ul>
                            <a href="<?= site_url('page/registration-form'); ?>" class="btn"><?php echo get_phrase('From £25 for an hour') ?> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Packages Offer -->





<!-- Adventures -->
<section class="adventures py-5" style="display:none;">
    <div class="container-fluid">
        <h3 class="header"><?php echo get_phrase('An Evening of Freedom for Parents — An Exciting Adventure for Kids!') ?></h3>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 kids">
                <div class="box_kids">
                    <h4><?php echo get_phrase('SATs') ?></h4>
                    <p><?php echo get_phrase("Nurture your child’s potential during SATs with our dedicated support. Our team of experienced educators is committed to guiding your child toward achieving their best possible results.") ?></p>
                    <a href="<?= site_url('page/sats-prep'); ?>"><?php echo get_phrase('More') ?></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 kids">
                <div class="box_kids">
                    <h4><?php echo get_phrase('11 +') ?></h4>
                    <p><?php echo get_phrase('Alastutors provides a specialized educational experience tailored to give your child a competitive edge. Our personalized teaching programs are thoughtfully designed to boost their chances of success in the 11 Plus exams.') ?></p>
                    <a href="<?= site_url('page/11-13-exam-prep'); ?>"><?php echo get_phrase('More') ?></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 kids">
                <div class="box_kids">
                    <h4><?php echo get_phrase('A-Levels') ?></h4>
                    <p><?php echo get_phrase("Set your child on the path to top-tier achievement with our expertly tailored A-Levels program. With the guidance of our experienced instructors, exceptional grades are well within reach. Choose Alastutors to support your child’s academic journey toward success.") ?></p>
                    <a href="<?= site_url('page/a-levels-prep'); ?>"><?php echo get_phrase('More') ?></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 kids">
                <div class="box_kids">
                    <h4><?php echo get_phrase('GCSEs') ?></h4>
                    <p><?php echo get_phrase("Elevate your child’s academic performance and unlock their full potential with our GCSE teaching program. Our comprehensive approach empowers students to strengthen their skills and achieve new levels of success.") ?></p>
                    <a href="<?= site_url('page/gcses-exam-prep'); ?>"><?php echo get_phrase('More') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Adventures -->







<script>
 $(document).ready(function(){

    $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
            {
              // tablet
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                arrows:false
              }
            } ,
            {
              // tablet
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                arrows:false
              }
            } 
          ]
      });

 });
</script>
<!-- Testimonials -->


<?php if(get_frontend_settings('upcoming_course_section') == 1): ?>
<!-- Start Upcoming Courses -->
<?php $upcoming_courses = $this->db->order_by('id', 'desc')->limit(6)->get_where('course', ['status' => 'upcoming']); ?>
<?php if($upcoming_courses->num_rows() > 0): ?>
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="title-one pb-20">
              <p class="subtitle text-uppercase"><?php echo get_phrase('Upcoming'); ?></p>
              <h4 class="title"><?php echo get_phrase('Upcoming courses'); ?></h4>
              <div class="bar"></div>
            </div>
            <p class="fz_15_m_24"><?php echo get_phrase('Discover a world of learning opportunities through our upcoming courses, where industry experts and thought leaders will guide you in acquiring new expertise, expanding your horizons, and reaching your full potential.') ?></p>
          </div>
          <div class="col-lg-8">
            <!-- Items -->
            <div class="row g-3">
              <?php
                foreach($upcoming_courses->result_array() as $upcoming_course):
                ?>
                <div class="col-lg-4">
                  <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($upcoming_course['title'])) . '/' . $upcoming_course['id']); ?>" id="top_course_<?php echo $upcoming_course['id']; ?>" class="course-item-one">
                    <div class="img-rating">
                      <div class="img"><img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($upcoming_course['id']); ?>" alt="" /></div>
                    </div>
                    <div class="content">
                      <h4 class="title"><?php echo $upcoming_course['title']; ?></h4>
                      <p class="info ellipsis-line-2 fw-400"><?php echo $upcoming_course['short_description']; ?></p>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php endif; ?>
<!-- End Upcoming Courses -->
<?php endif; ?>


<?php if(get_frontend_settings('top_course_section') == 1): ?>
<!---------- Top courses Section start --------------->
<!-- <section class="courses grid-view-body py-5">
    <div class="container">
        <h1 class="pt-0"><span><?php echo site_phrase('top_courses'); ?></span></h1>
        <p><?php echo site_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide')?></p>
        <div class="courses-card">
            <div class="course-group-slider">
                <?php
                $top_courses = $this->crud_model->get_top_courses()->result_array();
                foreach ($top_courses as $top_course) :
                    $lessons = $this->crud_model->get_lessons('course', $top_course['id']);
                    $instructor_details = $this->user_model->get_all_user($top_course['creator'])->row_array();
                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($top_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $top_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $top_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                    ?>
                    <div class="single-popup-course">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>" id="top_course_<?php echo $top_course['id']; ?>" class="checkPropagation courses-card-body">
                            <div class="courses-card-image">
                                <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($top_course['id']); ?>">
                                <div class="courses-icon <?php if(in_array($top_course['id'], $my_wishlist_items)) echo 'red-heart'; ?>" id="coursesWishlistIconTopCourse<?php echo $top_course['id']; ?>">
                                    <i class="fa-solid fa-heart checkPropagation" onclick="actionTo('<?php echo site_url('home/toggleWishlistItems/'.$top_course['id'].'/TopCourse'); ?>')"></i>
                                </div>
                                <div class="courses-card-image-text">
                                    <h3><?php echo get_phrase($top_course['level']); ?></h3>
                                </div> 
                            </div>
                            <div class="courses-text">
                                <h5 class="mb-2"><?php echo $top_course['title']; ?></h5>
                                <div class="review-icon">
                                    <div class="review-icon-star align-items-center">
                                        <p><?php echo $average_ceil_rating; ?></p>
                                        <p><i class="fa-solid fa-star <?php if($number_of_ratings > 0) echo 'filled'; ?>"></i></p>
                                        <p>(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews') ?>)</p>
                                    </div>
                                    <div class="review-btn d-flex align-items-center">
                                       <span class="compare-img checkPropagation" onclick="redirectTo('<?php echo base_url('home/compare?course-1='.slugify($top_course['title']).'&course-id-1='.$top_course['id']); ?>');">
                                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/compare.png') ?>">
                                            <?php echo get_phrase('Compare'); ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="ellipsis-line-2"><?php echo $top_course['short_description'] ?></p>
                                <div class="courses-price-border">
                                    <div class="courses-price">
                                        <div class="courses-price-left">
                                            <?php if($top_course['is_free_course']): ?>
                                                <h5><?php echo get_phrase('Free'); ?></h5>
                                            <?php elseif($top_course['discount_flag']): ?>
                                                <h5><?php echo currency($top_course['discounted_price']); ?></h5>
                                                <p class="mt-1"><del><?php echo currency($top_course['price']); ?></del></p>
                                            <?php else: ?>
                                                <h5><?php echo currency($top_course['price']); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="courses-price-right ">
                                            <?php if($course_duration): ?>
                                                <p class="m-0"> <i class="fa-regular fa-clock p-0 text-15px"></i> <?php echo $course_duration; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </a>




                        <div id="top_course_feature_<?php echo $top_course['id']; ?>" class="course-popover-content">
                            <?php if ($top_course['last_modified'] == "") : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['date_added']); ?></p>
                            <?php else : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $top_course['last_modified']); ?></p>
                            <?php endif; ?>
                            <div class="course-title">
                                 <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($top_course['title'])) . '/' . $top_course['id']); ?>"><?php echo $top_course['title']; ?></a>
                            </div>
                            <div class="course-meta">
                                <?php if ($top_course['course_type'] == 'general') : ?>
                                    <span class=""><i class="fas fa-play-circle"></i>
                                        <?php echo $this->crud_model->get_lessons('course', $top_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                    </span>
                                    <?php if($course_duration): ?>
                                        <span class=""><i class="far fa-clock"></i>
                                            <?php echo $course_duration; ?>
                                        </span>
                                    <?php endif; ?>
                                <?php elseif ($top_course['course_type'] == 'h5p') : ?>
                                    <span class="badge bg-light"><?= site_phrase('h5p_course'); ?></span>
                                <?php elseif ($top_course['course_type'] == 'scorm') : ?>
                                    <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                <?php endif; ?>
                                <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($top_course['language']); ?></span>
                             </div>
                            <div class="course-subtitle">
                                 <?php echo $top_course['short_description']; ?>
                            </div>
                            <h6 class="text-black text-14px mb-1"><?php echo get_phrase('Outcomes') ?>:</h6>
                            <ul class="will-learn">
                                <?php $outcomes = json_decode($top_course['outcomes']);
                                foreach ($outcomes as $outcome) : ?>
                                    <li><?php echo $outcome; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="popover-btns">
                                <?php $cart_items = $this->session->userdata('cart_items'); ?>
                                <?php if(is_purchased($top_course['id'])): ?>
                                    <a href="<?php echo site_url('home/lesson/'.slugify($top_course['title']).'/'.$top_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i class="far fa-play-circle me-2"></i> <?php echo get_phrase('Start Now'); ?></a>
                                    <?php if ($top_course['is_free_course'] != 1) : ?>
                                        <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip" onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $top_course['id'].'?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($top_course['is_free_course'] == 1) : ?>
                                        <a class="purchase-btn green_purchase ms-auto" href="<?php echo site_url('home/get_enrolled_to_free_course/' . $top_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                                    <?php else : ?>

                                        
                                        <a id="added_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(!in_array($top_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'].'/top_course'); ?>');">
                                            <i class="fas fa-minus me-2"></i> <?php echo get_phrase('Remove from cart'); ?>
                                        </a>
                                        <a id="add_to_cart_btn_top_course<?php echo $top_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(in_array($top_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $top_course['id'].'/top_course'); ?>'); ">
                                            <i class="fas fa-plus me-2"></i> <?php echo get_phrase('Add to cart'); ?>
                                        </a>
                                         
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#top_course_<?php echo $top_course['id']; ?>').webuiPopover({
                                        url:'#top_course_feature_<?php echo $top_course['id']; ?>',
                                        trigger:'hover',
                                        animation:'pop',
                                        cache:false,
                                        multi:true,
                                        direction:'rtl', 
                                        placement:'horizontal',
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section> -->
<!---------- Top courses Section End --------------->
<?php endif; ?>

<?php if(get_frontend_settings('top_category_section') == 1): ?>
<!---------- Top Categories Start ------------->
<!-- <section class="top-categories py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center"><?php echo site_phrase('top_categories'); ?></h1>
                <p class="text-center mt-4"><?php echo site_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide')?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="category-product mt-5">
            <div class="row justify-content-center">
                <?php $top_10_categories = $this->crud_model->get_top_categories(12, 'sub_category_id'); ?>
                <?php foreach($top_10_categories as $top_10_category): ?>
                <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 cate_mbox">
                        <a href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>" class="category-product-body position-relative">
                           <div class="cate-icon"  style="color: #<?php echo rand(100000, 999999); ?>">
                                <i class="<?php echo $category_details['font_awesome_class']; ?>"></i>
                            </div>
                            
                            <h5 class="pt-0"> <?php echo $category_details['name']; ?></h5>
                            <p class="hide-cat-text"><?php echo $top_10_category['course_number'].' '.site_phrase('courses'); ?></p>
                         </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section> -->
<!---------- Top Categories end ------------->
<?php endif; ?>

<?php if(get_frontend_settings('latest_course_section') == 1): ?>
<!---------- Latest courses Section start --------------->
<!-- <section class="courses grid-view-body py-5">
    <div class="container">
        <h1 class="text-center pt-0"><span><?php echo site_phrase('top') . ' 10 ' . site_phrase('latest_courses'); ?></span></h1>
        <p class="text-center"><?php echo site_phrase('These_are_the_most_latest_courses_among_Listen_Courses_learners_worldwide')?></p>
        <div class="courses-card">
            <div class="course-group-slider ">
                <?php
                $latest_courses = $this->crud_model->get_latest_10_course();
                foreach ($latest_courses as $latest_course) :
                    $lessons = $this->crud_model->get_lessons('course', $latest_course['id']);
                    $instructor_details = $this->user_model->get_all_user($latest_course['creator'])->row_array();
                    $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($latest_course['id']);
                    $total_rating =  $this->crud_model->get_ratings('course', $latest_course['id'], true)->row()->rating;
                    $number_of_ratings = $this->crud_model->get_ratings('course', $latest_course['id'])->num_rows();
                    if ($number_of_ratings > 0) {
                        $average_ceil_rating = ceil($total_rating / $number_of_ratings);
                    } else {
                        $average_ceil_rating = 0;
                    }
                    ?>
                    <div class="single-popup-course">
                        <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>" id="latest_course_<?php echo $latest_course['id']; ?>" class="checkPropagation courses-card-body">
                            <div class="courses-card-image">
                                <img loading="lazy" src="<?php echo $this->crud_model->get_course_thumbnail_url($latest_course['id']); ?>">
                                <div class="courses-icon <?php if(in_array($latest_course['id'], $my_wishlist_items)) echo 'red-heart'; ?>" id="coursesWishlistIconLatestCourse<?php echo $latest_course['id']; ?>">
                                    <i class="fa-solid fa-heart checkPropagation" onclick="actionTo('<?php echo site_url('home/toggleWishlistItems/'.$latest_course['id'].'/LatestCourse'); ?>')"></i>
                                </div>
                                <div class="courses-card-image-text">
                                    <h3><?php echo get_phrase($latest_course['level']); ?></h3>
                                </div> 
                            </div>
                            <div class="courses-text">
                                <h5 class="mb-2"><?php echo $latest_course['title']; ?></h5>
                                <div class="review-icon">
                                    <div class="review-icon-star align-items-center">
                                        <p><?php echo $average_ceil_rating; ?></p>
                                        <p><i class="fa-solid fa-star <?php if($number_of_ratings > 0) echo 'filled'; ?>"></i></p>
                                        <p>(<?php echo $number_of_ratings; ?> <?php echo get_phrase('Reviews') ?>)</p>
                                    </div>
                                    <div class="review-btn d-flex align-items-center">
                                       <span class="compare-img checkPropagation" onclick="redirectTo('<?php echo base_url('home/compare?course-1='.slugify($latest_course['title']).'&course-id-1='.$latest_course['id']); ?>');">
                                            <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/compare.png') ?>">
                                            <?php echo get_phrase('Compare'); ?>
                                        </span>
                                    </div>
                                </div>
                                <p class="ellipsis-line-2"><?php echo $latest_course['short_description'] ?></p>
                                <div class="courses-price-border">
                                    <div class="courses-price">
                                        <div class="courses-price-left">
                                            <?php if($latest_course['is_free_course']): ?>
                                                <h5><?php echo get_phrase('Free'); ?></h5>
                                            <?php elseif($latest_course['discount_flag']): ?>
                                                <h5><?php echo currency($latest_course['discounted_price']); ?></h5>
                                                <p class="mt-1"><del><?php echo currency($latest_course['price']); ?></del></p>
                                            <?php else: ?>
                                                <h5><?php echo currency($latest_course['price']); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="courses-price-right ">
                                            <?php if($course_duration): ?>
                                                <p class="m-0"><i class="fa-regular fa-clock p-0 text-15px"></i> <?php echo $course_duration; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </a>




                        <div id="latest_course_feature_<?php echo $latest_course['id']; ?>" class="course-popover-content">
                            <?php if ($latest_course['last_modified'] == "") : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['date_added']); ?></p>
                            <?php else : ?>
                                <p class="last-update"><?php echo site_phrase('last_updated') . ' ' . date('D, d-M-Y', $latest_course['last_modified']); ?></p>
                            <?php endif; ?>
                            <div class="course-title">
                                 <a href="<?php echo site_url('home/course/' . rawurlencode(slugify($latest_course['title'])) . '/' . $latest_course['id']); ?>"><?php echo $latest_course['title']; ?></a>
                            </div>
                            <div class="course-meta">
                                <?php if ($latest_course['course_type'] == 'general') : ?>
                                    <span class=""><i class="fas fa-play-circle"></i>
                                        <?php echo $this->crud_model->get_lessons('course', $latest_course['id'])->num_rows() . ' ' . site_phrase('lessons'); ?>
                                    </span>
                                    <?php if($course_duration): ?>
                                        <span class=""><i class="far fa-clock"></i>
                                            <?php echo $course_duration; ?>
                                        </span>
                                    <?php endif; ?>
                                <?php elseif ($latest_course['course_type'] == 'h5p') : ?>
                                    <span class="badge bg-light"><?= site_phrase('h5p_course'); ?></span>
                                <?php elseif ($latest_course['course_type'] == 'scorm') : ?>
                                    <span class="badge bg-light"><?= site_phrase('scorm_course'); ?></span>
                                <?php endif; ?>
                                <span class=""><i class="fas fa-closed-captioning"></i><?php echo ucfirst($latest_course['language']); ?></span>
                             </div>
                            <div class="course-subtitle">
                                 <?php echo $latest_course['short_description']; ?>
                            </div>
                            <h6 class="text-black text-14px mb-1"><?php echo get_phrase('Outcomes') ?>:</h6>
                            <ul class="will-learn">
                                <?php $outcomes = json_decode($latest_course['outcomes']);
                                foreach ($outcomes as $outcome) : ?>
                                    <li><?php echo $outcome; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="popover-btns">
                                <?php $cart_items = $this->session->userdata('cart_items'); ?>
                                <?php if(is_purchased($latest_course['id'])): ?>
                                    <a href="<?php echo site_url('home/lesson/'.slugify($latest_course['title']).'/'.$latest_course['id']) ?>" class="purchase-btn d-flex align-items-center  me-auto"><i class="far fa-play-circle me-2"></i> <?php echo get_phrase('Start Now'); ?></a>
                                    <?php if ($latest_course['is_free_course'] != 1) : ?>
                                        <button type="button" class="gift-btn ms-auto" title="<?php echo get_phrase('Gift someone else'); ?>" data-bs-toggle="tooltip" onclick="actionTo('<?php echo site_url('home/handle_buy_now/' . $latest_course['id'].'?gift=1'); ?>')"><i class="fas fa-gift"></i></button>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if ($latest_course['is_free_course'] == 1) : ?>
                                        <a class="purchase-btn green_purchase ms-auto" href="<?php echo site_url('home/get_enrolled_to_free_course/' . $latest_course['id']); ?>"><?php echo get_phrase('Enroll Now'); ?></a>
                                    <?php else : ?>

                                        
                                        <a id="added_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(!in_array($latest_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'].'/latest_course'); ?>');">
                                            <i class="fas fa-minus me-2"></i> <?php echo get_phrase('Remove from cart'); ?>
                                        </a>
                                        <a id="add_to_cart_btn_latest_course<?php echo $latest_course['id']; ?>" class="purchase-btn align-items-center me-auto <?php if(in_array($latest_course['id'], $cart_items)) echo 'd-hidden'; ?>" href="javascript:void(0)" onclick="actionTo('<?php echo site_url('home/handle_cart_items/' . $latest_course['id'].'/latest_course'); ?>'); ">
                                            <i class="fas fa-plus me-2"></i> <?php echo get_phrase('Add to cart'); ?>
                                        </a>
                                         
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <script>
                                $(document).ready(function(){
                                    $('#latest_course_<?php echo $latest_course['id']; ?>').webuiPopover({
                                        url:'#latest_course_feature_<?php echo $latest_course['id']; ?>',
                                        trigger:'hover',
                                        animation:'pop',
                                        cache:false,
                                        multi:true,
                                        direction:'rtl', 
                                        placement:'horizontal',
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section> -->
<!---------- Latest courses Section End --------------->
<?php endif; ?>


<?php if(get_frontend_settings('top_instructor_section') == 1): ?>
<!---------  Expert Instructor Start ---------------->
<?php $top_instructor_ids = $this->crud_model->get_top_instructor(10); ?>
<?php if(count($top_instructor_ids) > 0): ?>
<!-- <section class="expert-instructor top-categories py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center mt-0 pt-0"><?php echo get_phrase('Top Instructors') ?></h1>
                <p class="text-center mt-4 mb-4"><?php echo get_phrase('They efficiently serve large number of students on our platform') ?></p>
            </div>
            <div class="col-lg-3 "></div>
        </div>
        <div class="instructor-card">
            <div class="row justify-content-center">
                <?php foreach($top_instructor_ids as $top_instructor_id):
                    $top_instructor = $this->user_model->get_all_user($top_instructor_id['creator'])->row_array();
                    $social_links  = json_decode($instructor_details['social_links'], true); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 ">
                        <div class="instructor-card-body">
                            <div class="instructor-card-img">
                                <img loading="lazy" src="<?php echo $this->user_model->get_user_image_url($top_instructor['id']); ?>">
                            </div>
                            <div class="instructor-card-text">
                                <div class="icon">
                                    <div class="icon-div-2">
                                        <?php if($social_links['facebook']): ?>
                                            <a class="" href="<?php echo $social_links['facebook']; ?>" target="_blank">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($social_links['twitter']): ?>
                                            <a class="" href="<?php echo $social_links['twitter']; ?>" target="_blank">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($social_links['linkedin']): ?>
                                            <a class="" href="<?php echo $social_links['linkedin']; ?>" target="_blank">
                                                <i class="fa-brands fa-linkedin"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <a class="text-muted w-100" href="<?php echo site_url('home/instructor_page/'.$top_instructor['id']); ?>">
                                    <h3 class="text-center"><?php echo $top_instructor['first_name'].' '.$top_instructor['last_name']; ?></h3>
                                    <p class="ellipsis-line-2"><?php echo $top_instructor['title']; ?></p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section> -->
<?php endif; ?>
<?php endif; ?>

<?php if(get_frontend_settings('motivational_speech_section') == 1): ?>
<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true); ?>
<?php if(count($motivational_speechs) > 0): ?>
<!---------  Motivetional Speech Start ---------------->
<section class="expert-instructor top-categories py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6">
        <h1 class="text-center mt-0 pt-0"><?php echo get_phrase('Think more clearly'); ?></h1>
        <p class="text-center mt-4 mb-4"><?php echo get_phrase('Gather your thoughts, and make your decisions clearly') ?></p>
      </div>
      <div class="col-lg-3"></div>
    </div>
    <ul class="speech-items">
        <?php $counter = 0; ?>
        <?php foreach($motivational_speechs as $key => $motivational_speech): ?>
        <?php $counter = $counter+1; ?>
        <li>
            <div class="speech-item">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-5">
                        <div class="speech-item-img">
                            <img loading="lazy" src="<?php echo site_url('uploads/system/motivations/'.$motivational_speech['image']) ?>" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="speech-item-content">
                            <p class="no"><?php echo $counter; ?></p>
                            <div class="inner">
                                <h4 class="title">
                                    <?php echo $motivational_speech['title']; ?>
                                </h4>
                                <p class="info">
                                    <?php echo nl2br($motivational_speech['description']); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>
</section>
<!---------  Motivetional Speech end ---------------->
<?php endif; ?>
<?php endif; ?>




<?php if(get_frontend_settings('faq_section') == 1): ?>
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if(count($website_faqs) > 0): ?>
<!---------- Questions Section Start  -------------->
<section class="faq_wrap" style="display:none;">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h4 class="text-center new_heading mt-0 pt-0" style="text-transform: uppercase;"><?php echo get_phrase('FAQs') ?></h4>
                <!-- <p class="text-center mt-4 mb-5"><?php //echo get_phrase('Have something to know?') ?> <?php //echo get_phrase('Check here if you have any questions about us.') ?></p> -->
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12  m-auto">
                <div class="faq-accrodion mb-0">
                    <div class="accordion" id="accordionFaq">
                        <?php foreach($website_faqs as $key => $faq): ?>
                            <?php if($key > 4) break; ?>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="<?php echo 'faqItemHeading'.$key; ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel'.$key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel'.$key; ?>">
                                    <?php echo $faq['question']; ?>
                                </button>
                              </h2>
                              <div id="<?php echo 'faqItempanel'.$key; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'faqItemHeading'.$key; ?>"  data-bs-parent="#accordionFaq">
                                <div class="accordion-body">
                                    <p><?php echo nl2br($faq['answer']); ?></p>
                                </div>
                              </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if(count($website_faqs) > 5): ?>
                        <a href="<?php echo site_url('home/faq') ?>" class="btn btn-primary mt-5"><?php echo get_phrase('See More'); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------- Questions Section End  -------------->
<?php endif; ?>
<?php endif; ?>


<?php if(get_frontend_settings('blog_visibility_on_the_home_page') == 1): ?>
<!------------- Blog Section Start ------------>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if($latest_blogs->num_rows() > 0): ?>
<!-- <section class="courses blog py-5">
    <div class="container">
        <h1 class="text-center pt-0"><span><?php echo site_phrase('Visit our latest blogs')?></span></h1>
        <p class="text-center"><?php echo site_phrase('Visit our valuable articles to get more information.')?>
        <div class="courses-card">
            <div class="row">
               <?php foreach($latest_blogs->result_array() as $latest_blog):
                $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>  
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="<?php echo site_url('blog/details/'.slugify($latest_blog['title']).'/'.$latest_blog['blog_id']); ?>" class="courses-card-body">
                        <div class="courses-card-image">
                            <?php $blog_thumbnail = 'uploads/blog/thumbnail/'.$latest_blog['thumbnail'];
                               if(!file_exists($blog_thumbnail) || !is_file($blog_thumbnail)):
                                   $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                              endif; ?>
                            <div class="courses-card-image">
                             <img loading="lazy" src="<?php echo $blog_thumbnail; ?>">
                            </div>
                            <div class="courses-card-image-text">
                                <h3><?php echo $blog_category['title']; ?></h3>
                            </div> 
                        </div>
                        <div class="courses-text">
                            <h5><?php echo $latest_blog['title']; ?></h5>
                            <p class="ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 100); ?></p>
                            <div class="courses-price-border">
                                <div class="courses-price">
                                    <div class="courses-price-left">
                                        <img loading="lazy" class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>">
                                        <h5><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h5>
                                    </div>
                                    <div class="courses-price-right ">
                                        <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
                                    </div>
                                </div>
                            </div>
                           </div>
                     </a>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section> -->
<?php endif; ?>
<?php endif; ?>



<div class="overlay_popupbpx"></div>
<div class="popupbox_video">
    <div class="closebtn">
        <i class="fa fa-close"></i>
    </div>
    <video autoplay loop muted>
        <source src="https://alastutor.wesecurehost.com/uploads/video_alastototors.mp4" type="video/mp4">
    </video>
</div>


<?php if(get_frontend_settings('promotional_section') == 1): ?>
<!------------- Become Students Section start --------->
<!-- <section class="student py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  <?php if (get_settings('allow_instructor') != 1) echo 'w-100'; ?>">
                <div class="student-body-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                            <div class="student-body-text">
                                <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/2.png')?>">
                                <h1><?php echo site_phrase('join_now_to_start_learning'); ?></h1>
                                <p><?php echo site_phrase('Learn from our quality instructors!')?> </p>
                                <a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <img loading="lazy" class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-1.png')?>">
                        </div>
                     </div>
                </div>      
            </div>
            <?php if (get_settings('allow_instructor') == 1) : ?>
                <div class="col-lg-6 ">
                    <div class="student-body-2">
                    <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 ">
                                <div class="student-body-text">
                                  <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/image/2.png')?>">
                                    <h1><?php echo site_phrase('become_a_new_instructor'); ?></h1>
                                    <p><?php echo site_phrase('Teach_thousands_of_students_and_earn_money!')?> </p>
                                    <?php if($this->session->userdata('user_id')): ?>
                                       <a  href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                      <?php else: ?>
                                        <a  href="<?php echo site_url('sign_up?instructor=yes'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <img loading="lazy" class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-2.png')?>">
                            </div>
                        </div>  
                    </div> 
                </div>
            <?php endif; ?>
        </div>
    </div>
</section> -->
<?php endif; ?>
<!------------- Become Students Section End --------->
