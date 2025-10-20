
<!-- <section class="privacy-policy">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <?php //echo get_frontend_settings('about_us'); ?>
                This is about Us
            </div>
        </div>
    </div>
</section> -->

<section class="about_page py-5" style="background: url(<?php echo base_url('assets/frontend/default-new/image/fullwave2.png')?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 text">
	<h3><?php echo get_phrase('About Alas Tutors') ?></h3>
	<p><?php echo get_phrase('Alas Tutors delivers focused, high-quality tuition designed to build strong foundations and academic confidence. We specialize in core subjects like Maths, English, and Science—tailoring support to each learner’s unique needs. Whether your child needs a boost or is aiming for top results, our expert tutors ensure measurable progress through structured and engaging sessions.') ?></p>
	<p><?php echo get_phrase('Our flexible and affordable pricing ensures that every student can access top-tier tutoring without compromise. With progress tracking, regular feedback, and targeted learning plans, we help students thrive both inside and outside the classroom.') ?></p>
	<p><?php echo get_phrase('We don’t just tutor — we mentor. Our tutors build strong relationships with students, creating a supportive and motivating environment. This holistic approach helps students develop not just academically, but also in confidence, discipline, and independent learning skills.') ?></p>


</div>

			<div class="col-lg-6 img">
				 <img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/about-us-1.jpg')?>" >
			</div>
		</div>
	</div>
</section>

<section class="top_bage">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="main_box_list">
					<div class="col-lg-4 col-md-6 m-auto top_pack new_pack">
						<?php echo get_phrase('How We Are Different:') ?>
					</div>

					<div class="list_all">
	<ul>
		<li><?php echo get_phrase('Experienced and subject-specialist tutors') ?></li>
		<li><?php echo get_phrase('Interactive, face-to-face sessions in small groups') ?></li>
		<li><?php echo get_phrase('One-to-one support available for targeted learning') ?></li>
		<li><?php echo get_phrase('Flexible monthly rolling enrolment') ?></li>
	</ul>
	<ul>
		<li><?php echo get_phrase('Students consistently surpass their predicted grades') ?></li>
		<li><?php echo get_phrase('High-quality tutoring at affordable rates') ?></li>
		<li><?php echo get_phrase('Holiday programs including Summer School and Grade Booster Revision') ?></li>
		<li><?php echo get_phrase('All tutors are fully DBS-checked for your peace of mind') ?></li>
	</ul>
</div>


				</div>

			</div>
		</div>
	</div>
</section>

<section class="top_help_box">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 img">
				<img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/help.jpg')?>">
			</div>
			<div class="col-lg-6 text">
	<h3 style="    font-size: 28px;"><?php echo get_phrase('How We Support Your Child’s Success') ?></h3>
	<ul>
		<li>
			<div class="icon">
				<img src="<?php echo base_url('assets/frontend/default-new/image/icona1.png')?>" alt="">
			</div>
			<span><?php echo get_phrase('Strengthen Subject Understanding') ?></span>
		</li>
		<li>
			<div class="icon">
				<img src="<?php echo base_url('assets/frontend/default-new/image/icona2.png')?>" alt="">
			</div>
			<span><?php echo get_phrase('Build Lasting Academic Confidence') ?></span>
		</li>
		<li>
			<div class="icon">
				<img src="<?php echo base_url('assets/frontend/default-new/image/icona3.png')?>" alt="">
			</div>
			<span><?php echo get_phrase('Improve Performance and Achieve Higher Grades') ?></span>
		</li>
		<li>
			<div class="icon">
				<img src="<?php echo base_url('assets/frontend/default-new/image/icona4.png')?>" alt="">
			</div>
			<span><?php echo get_phrase('Encourage a Lifelong Love for Learning') ?></span>
		</li>
	</ul>
</div>

		</div>
	</div>
</section>

<section class="box_text_col">
	<div class="container">
		<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-12">
		<div class="box">
			<p><?php echo get_phrase("At Alas Tutors, we recognise that every student has unique potential. Our goal is to unlock that potential through tailored teaching methods, creating a supportive and enjoyable learning experience that encourages academic growth.") ?></p>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12">
		<div class="box">
			<p><?php echo get_phrase('We are committed to creating a safe, respectful environment where students are protected from bullying and harm. Our tutors are trained to prioritise student welfare and uphold a culture of care and support.') ?></p>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12">
		<div class="box">
			<p><?php echo get_phrase('Our tutors are carefully selected through a rigorous process. Each tutor is DBS-checked, fully qualified, and driven by a passion for education, ensuring your child receives high-quality, inspiring academic guidance.') ?></p>
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


