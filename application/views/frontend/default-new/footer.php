<!--------- footer Section Start--------------->
<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12  " style="text-align: center;">
                <img loading="lazy" src="<?php echo base_url('uploads/system/'.get_frontend_settings('light_logo')); ?>">
                <!-- <p><?php //echo get_settings('website_description'); ?></p> -->
                <p>© 2021 Alas Tutors. Consulted and Developed by Equal Square Ltd 2023</p>
            </div>
            <!-- <div class="col-lg-3 col-md-4 footer_we col-sm-12 ">
                <h1><?php echo site_phrase('top_categories'); ?></h3>
                <ul>
                <?php $top_10_categories = $this->crud_model->get_top_categories(6, 'sub_category_id'); ?>
                <?php foreach($top_10_categories as $top_10_category): ?>
                  <?php $category_details = $this->crud_model->get_category_details_by_id($top_10_category['sub_category_id'])->row_array(); ?>
                    <li><a href="<?php echo site_url('home/courses?category='.$category_details['slug']); ?>"> <?php echo $category_details['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div> -->
            <div class="col-lg-2 col-md-3 footer_we col-sm-12 quick_links">
                <h3><?php echo site_phrase('Quick Links'); ?></h3>
                <ul>
                    <?php if (get_settings('allow_instructor') == 1) : ?>
                        <!-- <li> <a href="<?php echo site_url('home/become_an_instructor'); ?>"><?php echo site_phrase('Become an instructor'); ?></a></li> -->
                    <?php endif; ?>
                    <li> <a href="<?php echo site_url('blog'); ?>"><?php echo site_phrase('blog'); ?></a></li>
                    <li><a href="<?php echo site_url('home/courses'); ?>"><?php echo site_phrase('all_courses'); ?></a></li>
                    <li><a href="<?php echo site_url('sign_up'); ?>">Sing Up</a></li>
                    <li><a href="#">Careers</a></li>
                    <!-- <li><a href="<?php echo site_url('page/registration-form'); ?>"><?php echo site_phrase('Become a Student'); ?></a></li> -->
                    <?php $custom_page_menus = $this->crud_model->get_custom_pages('', 'footer'); ?>
                    <?php foreach($custom_page_menus->result_array() as $custom_page_menu): ?>
                      <!-- <li><a href="<?php echo site_url('page/'.$custom_page_menu['page_url']); ?>"><?php echo $custom_page_menu['button_title']; ?></a></li> -->
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 footer_we col-sm-12 useful_info">
                <h3>Support</h3>
                <!-- <h3><?php echo site_phrase('Useful Information'); ?></h3> -->
                <ul>
                    <li><a href="<?php echo site_url('home/faq'); ?>"><?php echo site_phrase('FAQ'); ?></a></li>
                    <li><a href="#">Help Centre</a></li>
                    <!-- <li><a href="<?php echo site_url('page/contact_us'); ?>"><?php echo site_phrase('contact_us'); ?></a></li> -->
                    <!-- <li><a href="<?php echo site_url('page/about-us'); ?>"><?php echo site_phrase('about us'); ?></a></li> -->
                    <li><a href="<?php echo site_url('page/privacy_policy'); ?>"><?php echo site_phrase('privacy_policy'); ?></a></li>
                    <li><a href="<?php echo site_url('page/terms_and_condition'); ?>"><?php echo site_phrase('terms_and_condition'); ?></a></li>
                    <!-- <li><a href="<?php echo site_url('page/refund_policy'); ?>"><?php echo site_phrase('refund_policy'); ?></a></li> -->
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer_we col-sm-12 last_footer">
                <h3><?php echo site_phrase('Contact Information'); ?></h3>
                <ul>
                    <li>
                        <a  href="https://www.google.com/maps?q=215A+Devons+Road,+London,+E3+3AN" target="_blank" ><span>Location:</span> <?php echo get_settings('address'); ?></a>
                    </li> 
                    <li>
                        <a href="tel:<?php echo get_settings('phone'); ?>"><span>Phone:</span> <?php echo get_settings('phone'); ?></a>
                    </li> 
                    <li>
                        <a href="mailto:<?php echo get_settings('system_email'); ?>"><span>Email:</span> <?php echo get_settings('system_email'); ?></a>
                    </li> 
                    
                </ul>

                <div class="main_footer_icon">
                    <ul>
                         <li style="color: #fff; ">
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

                          <!--  <?php if($facebook): ?>
                            <li class="nav-item">
                              <a target="_blank" href="<?php echo $facebook; ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            </li>
                          <?php endif; ?>
                          <?php if($twitter): ?>
                            <li class="nav-item">
                              <a target="_blank" href="<?php echo $twitter; ?>"><i class="fa-brands fa-twitter"></i></a>
                            </li>
                          <?php endif; ?>
                          <?php if($linkedin): ?>
                            <li class="nav-item">
                              <a target="_blank" href="<?php echo $linkedin; ?>"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                          <?php endif; ?> -->
                    </ul>
                </div>
            </div>
        </div>

        
        <!-- <div class="lattest-news">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <h3><?php echo get_phrase('Subscribe to our Newsletter'); ?></h3>
                    <form class="ajaxForm resetable" action="<?php echo site_url('home/subscribe_to_our_newsletter'); ?>" method="post">
                        <input type="email" class="form-control" id="subscribe_email" placeholder="<?php echo get_phrase('Enter your email address'); ?>" name="email">
                        <button class="form-arrow" type="submit"><i class="fa-solid fa-arrow-right-long"></i></button>
                    </form>
                </div>
                
                <div class="col-lg-8 col-md-6  col-sm-12 col-12">
                    <div class="icon right-icon">
                        <ul class="nav justify-content-end">
                          <li class="nav-item">
                            <a target="_blank" href="<?php echo get_settings('footer_link'); ?>">
                              <?php echo site_phrase(get_settings('footer_text')); ?>
                            </a>
                          </li>
                        </ul>
                    </div>  
                              
                </div>
            </div>
        </div> -->
    </div>
</section>
<!--------- footer Section End--------------->

<!-- PAYMENT MODAL -->
<!-- Modal -->
<?php
$paypal_info = json_decode(get_settings('paypal'), true);
$stripe_info = json_decode(get_settings('stripe_keys'), true);
if ($paypal_info[0]['active'] == 0) {
  $paypal_status = 'disabled';
}else {
  $paypal_status = '';
}
if ($stripe_info[0]['active'] == 0) {
  $stripe_status = 'disabled';
}else {
  $stripe_status = '';
}
?>


<script>
    $(document).ready(function(){
    
    $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    })

})
</script>