<!-- <?php //include "breadcrumb.php"; ?> -->

<?php if(get_frontend_settings('recaptcha_status')): ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php endif; ?>

<!------------ Contact section start ----->

<section class="face_banner" style="background: url(<?php echo base_url('assets/frontend/default-new/image/contact12.jpg')?>);"> </section>

<section class="contact_form">
    <div class="container">
        <div class="col-lg-12 form">
            <h3><?php echo get_phrase('Have A Question') ?></h3>
            <span><?php echo get_phrase('Get in touch with us') ?></span>

            <form action="<?php echo site_url('home/contact_us/submit'); ?>" method="post" class="form-section">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input name="first_name" type="text" class="form-control" id="first_name" placeholder="<?php echo get_phrase('First Name') ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input name="last_name" type="text" class="form-control" id="last_name" placeholder="<?php echo get_phrase('Last Name') ?>">
                            </div>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input name="email" type="text" class="form-control" id="email" placeholder="<?php echo get_phrase('Email address') ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="mb-3">
                                <input name="phone" type="text" class="form-control" id="phone" placeholder="<?php echo get_phrase('Phone') ?>">
                            </div>                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <input name="address" type="text" class="form-control" id="address" placeholder="Address">
                            </div> 
                            <div class="input-group comment">
                                <textarea name="message" class="form-control" aria-label="With textarea" id="message" placeholder="<?php echo get_phrase('Write your message'); ?>"></textarea>
                              </div>
                              <div class="form-btn">
                                <button type="submit" class="btn btn-primary"><?php echo get_phrase('Submit'); ?></button>
                              </div>
                              <div class="cheack-box">
                                <div class="form-check">
                                    <input name="i_agree" class="form-check-input" type="checkbox" value="1" id="i_agree">
                                    <label class="form-check-label" for="i_agree"> 
                                        <p><?php echo get_phrase('I agree that my submitted data is being collected and stored.'); ?></p>
                                    </label>
                                  </div>                                  
                              </div>
                              <?php if(get_frontend_settings('recaptcha_status')): ?>
                                  <div class="g-recaptcha mt-3" data-sitekey="<?php echo get_frontend_settings('recaptcha_sitekey'); ?>"></div>
                              <?php endif; ?>
                              
                        </div>
                    </div>
                </form>
        </div>
    </div>
</section>


<section class="info_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 img_side">
                <img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/contact_new.jpg')?>">
            </div>
            <div class="col-lg-7 info">
                <?php
                        $contact_info = json_decode(get_frontend_settings('contact_info'), true);
                    ?>

                    <!-- <div class="office-hour-text">
                                    <h4><?php //echo get_phrase('Office Hours'); ?></h4>
                                    <?php //echo nl2br($contact_info['office_hours']); ?>
                                </div> -->
                <div class="shape">
                    <p class="pb-1"><b><?php echo get_phrase('Office Hours'); ?> </b> <?php echo nl2br($contact_info['office_hours']); ?></p>
                    <h3><?php echo get_phrase('Contact info') ?></h3>
                    <ul class="list">
                        <li>
                            <a href="tel:<?php echo nl2br($contact_info['phone']); ?>">
                              <div class="icon">
                                <i class="fa fa-phone"></i>
                              </div>
                              <div class="text">
                                <h4><?php echo get_phrase('Phone') ?></h4>
                                <p><?php echo nl2br($contact_info['phone']); ?></p>
                              </div>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:<?php echo nl2br($contact_info['email']); ?>">
                              <div class="icon">
                                <i class="fa fa-envelope"></i>
                              </div>
                              <div class="text">
                                <h4><?php echo get_phrase('Email') ?></h4>
                                <p><?php echo nl2br($contact_info['email']); ?></p>
                              </div>
                            </a>
                        </li>
                        <li>
                            <a>
                              <div class="icon">
                                <i class="fa fa-location-dot"></i>
                              </div>
                              <div class="text">
                                <h4><?php echo get_phrase('Location') ?></h4>
                                <p><?php echo nl2br($contact_info['address']); ?></p>
                              </div>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>

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


<?php if(get_frontend_settings('faq_section') == 1): ?>
<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if(count($website_faqs) > 0): ?>
<!---------- Questions Section Start  -------------->
<section class="faq faq2 py-5">
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


 
<!------------ Contact secton end -------->