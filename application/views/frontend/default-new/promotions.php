<?php include 'includes_top.php';?>

<!------- body section Start ------>

<?php
	//user wishlist items
    $my_wishlist_items = array();
    if($user_id = $this->session->userdata('user_id')){
        $wishlist = $this->user_model->get_all_user($user_id)->row('wishlist');
        if($wishlist != ''){
            $my_wishlist_items = json_decode($wishlist, true);
        }
    }
    
	if($this->session->userdata('app_url')):
		include "go_back_to_mobile_app.php";
	endif;

	if ($page_name == 'login' || $page_name == 'sign_up') { 
		 
	}

	if(get_frontend_settings('cookie_status') == 'active'):
    	include 'eu-cookie.php';
  	endif;
?>
<!-- <section class="privacy-policy">
    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <?php //echo get_frontend_settings('about_us'); ?>
                This is Promotions
            </div>
        </div>
    </div>
</section> -->

<section class="promotions" style="background: url(<?php echo base_url('assets/frontend/default-new/image/fullwave.png')?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 text_box">
				<span><?php echo get_phrase('An Evening Off for Parents, an Exciting Adventure for Kids!') ?></span>
				<h2><?php echo get_phrase('A Night Off for Parents — An Exciting Adventure for Kids!') ?></h2>
				<p>Looking for a well-deserved break? Discover our exclusive Parents’ Night Out — a special evening where you can confidently leave your children in our care. Every Saturday from 6 PM to 10 PM, kids will enjoy movies, pizza, popcorn, and fun-filled games, giving you the chance to relax and enjoy uninterrupted time with friends or a romantic evening.</p>
                <p>Book their place now for just £35 per child. Invite your friends and make lasting memories together!</p>
				<a href="<?= site_url('page/registration-form'); ?>" class="btn_banner"><?php echo get_phrase('Book Now') ?></a>
			</div>
			<div class="col-lg-6 img_right">
				<img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/pro.png')?>">
			</div>
			<div class="overlay" style="background: url(<?php echo base_url('assets/frontend/default-new/image/shape12.png')?>);"></div>
		</div>
	</div>
</section>

<!-- Promotion -->
<section class="promotion py-5 promotion2">
    <div class="container">
        <div class="promo_heading">
            <span><?php echo get_phrase('Special Promotion') ?></span>
            <h4><?php echo get_phrase('A Night Off for Parents — A Fun-Filled Adventure for Kids!') ?></h4>
        </div>
        <div class="promo_box">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 left_promo">
                    <h3><?php echo get_phrase('Refer a Friend and Earn Rewards!') ?></h3>
                    <p><?php echo get_phrase('Introduce a friend to Alastutors and receive a 10% discount on your next payment as a thank you for sharing the learning experience!') ?></p>
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


<?php
	if ($page_name == 'login' || $page_name == 'sign_up') { 
		
	}
	
	include 'includes_bottom.php';
	include 'modal.php';
	include 'common_scripts.php';
	// include 'init.php';
	?>
 <!------- body section end ------>