<section class="what_weoffer" id="section_01">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 we_offer_info">
                <p>At Alas tutors we offer  online  tuition for students seeking to improve their skills in English, Maths, Science subjects, Computer science, Geography and Economics.</p>
                <p>Our experienced Alas Tutors provide personalized support tailored to individual learning needs, helping students build confidence and achieve their academic goals.</p>
                <p>We specialize in exam preparation for Y2 and Y6 SATs, GCSEs, and A-Levels, equipping students with the strategies and knowledge needed to excel in their exams. Whether you're looking to catch up, get ahead, or refine your exam technique, our focused lessons create a positive and supportive learning environment for every student.</p>
            </div>
            <div class="col-sm-6 listing_boxes">
                <div class="inner_listing">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/trialclass.png') ?>">
                    <span>1</span>
                    <b>Book a Trial class</b>
                    <p>Complete the registration to book a tester session</p>
                </div>
                <div class="inner_listing">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/goals.png') ?>">
                    <span>2</span>
                    <b>Assessment & Goals setting</b>
                    <p>We identify strengths, challenges and target grades</p>
                </div>
                <div class="inner_listing">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/lessonplan.png') ?>">
                    <span>3</span>
                    <b>Custom lesson plan</b>
                    <p>We identify strengths, challenges and target grades</p>
                </div>
                <div class="inner_listing">
                    <img src="<?php echo base_url('assets/frontend/default-new/img/linechart.png') ?>">
                    <span>4</span>
                    <b>Results & Review</b>
                    <p>Progress reports to celebrate achievements</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="we_offer_warp">
    <div class="container">
        <div class="offer_head">
            <h2>What We Offer?</h2>
        </div>
        <div class="row">
            <div class="col-sm-3 sidegap_box">
                <div class="offer_box_grid">
                    <img src="<?php echo base_url('assets/frontend/default-new/image/Flexible-Scheduling.webp') ?>">
                    <h3>Flexible Scheduling</h3>
                    <p>At Alas Tutors, we understand that every family’s routine is different. That’s why we offer flexible scheduling options that fit around your lifestyle. Whether you prefer early morning sessions, after-school support, or weekend learning, we make it easy to book sessions at times that work best for you.</p>
                </div>
            </div>
            <div class="col-sm-3 sidegap_box">
                <div class="offer_box_grid">
                    <img src="<?php echo base_url('assets/frontend/default-new/image/smallgroup.jpg') ?>">
                    <h3> Small Group Size</h3>
                    <p>We keep our group sessions intentionally small to ensure every student receives the attention they deserve. With fewer students per class, Alas Tutors can focus on individual learning styles, encourage participation, and provide targeted support.</p>
                </div>
            </div>
            <div class="col-sm-3 sidegap_box">
                <div class="offer_box_grid">
                    <img src="<?php echo base_url('assets/frontend/default-new/image/DedicatedTutor.jpg') ?>">
                    <h3>Dedicated Tutor</h3>
                    <p>Every student at Alas Tutors is paired with a dedicated tutor who understands their unique learning needs and academic goals. This consistent one-on-one relationship builds trust, improves performance, and ensures steady progress throughout the learning journey.</p>
                </div>
            </div>
            <div class="col-sm-3 sidegap_box">
                <div class="offer_box_grid">
                    <img src="<?php echo base_url('assets/frontend/default-new/image/ProgressReports.jpg') ?>">
                    <h3>Progress Reports</h3>
                    <p>At Alas Tutors, we believe in transparency and measurable growth. That’s why we provide regular progress reports to keep parents and students informed about academic improvement, strengths, and areas that need extra focus.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="pricing_wrapbox" id="section_02">
    <div class="container">
       <div class="flexible_ph">
    <h1>FLEXIBLE PRICING TO SUIT EVERY BUDGET</h1>
    <ul class="tabs">
        <?php 
        $tabIndex = 1;
        foreach ($category_wise_courses as $cat_id => $category) : ?>
            <li class="tab-link <?= ($tabIndex == 1 ? 'current' : '') ?>" data-tab="tab-<?= $tabIndex ?>">
                <?= htmlspecialchars($category['title']) ?>
            </li>
        <?php 
        $tabIndex++;
        endforeach; ?>
    </ul>

    <?php 
    $tabIndex = 1;
    foreach ($category_wise_courses as $cat_id => $category) : ?>
        <div id="tab-<?= $tabIndex ?>" class="tab-content <?= ($tabIndex == 1 ? 'current' : '') ?>">
            <div class="pricing-container">
                <?php 
                $courseIndex = 1;
                foreach ($category['courses'] as $course) : ?>
                    <label class="option">
                        <input type="radio" 
                               name="session" 
                               value="<?= $course['id'] ?>"
                               <?= ($tabIndex == 1 && $courseIndex == 1) ? 'checked' : '' ?>>
                        <label>
                            <span><?= htmlspecialchars($course['title']) ?></span>
                            <span class="price">£<?= htmlspecialchars($course['price']) ?></span>
                        </label>
                    </label>
                <?php 
                $courseIndex++;
                endforeach; ?>
            </div>
        </div>
    <?php 
    $tabIndex++;
    endforeach; ?>

    <!-- Get Started button (dynamic action) -->
    <a href="javascript:void(0);" class="btn_banner mt-4" 
       onclick="
            var checkedCourse = document.querySelector('input[name=session]:checked');
            if (checkedCourse) {
                actionTo('<?= site_url('home/handle_buy_now/'); ?>' + checkedCourse.value);
            } else {
                alert('Please select a course first.');
            }
       ">
       Get Started
    </a>
</div>


    </div>
</div>

<!-- Promotion -->
<section class="promotion py-5 mb-5 mt-2" id="section_03">
    <div class="container">
        <div class="promo_heading">
            <span><?php echo get_phrase('Special Promotion') ?></span>
            <!-- <h4><?php echo get_phrase('A Night Off for Parents — A Fun-Filled Adventure for Kids!') ?></h4> -->
        </div>
        <div class="promo_box">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 left_promo">
                    <h3><?php echo get_phrase('Refer a Friend and Earn Rewards!') ?></h3>
                    <p><?php echo get_phrase('Introduce a friend to Alas Tutors and receive a 10% discount on your next payment as a thank you for sharing the learning experience!') ?></p>
                    <a href="#" class="btn"><?php echo get_phrase('Get Your Referral Link') ?></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="overlay">
                        <img src="<?php echo base_url('assets/frontend/default-new/img/referring3.png') ?>"  class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Promotion -->