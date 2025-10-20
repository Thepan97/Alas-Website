<!-- <?php //include "breadcrumb.php"; ?> -->

<section class="face_banner" style="background: url(<?php echo base_url('assets/frontend/default-new/image/terms_and_condition1.jpg')?>);"> </section>

<!------- body section Start ------>
<section class="privacy-policy">
    <div class="container">
        <div class="row my-5">
            <div class="col-12 privacy_policy_data">
                <?php echo get_frontend_settings('terms_and_condition'); ?>
            </div>
        </div>
    </div>
</section>
 <!------- body section end ------>


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