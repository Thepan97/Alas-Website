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
		 
	}else{
		include 'header.php';
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
                This is about Us
            </div>
        </div>
    </div>
</section> -->

<section class="thank_you" style="background-image: url(<?php echo base_url('assets/frontend/default-new/image/thank_overlay.png') ?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 m-auto">
				<div class="box_thank">
					<img width="w-100" src="<?php echo base_url('assets/frontend/default-new/image/thams.png') ?>">
					<h2><?php echo get_phrase('Thank You') ?></h2>
					<p><?php echo get_phrase('For Submitting') ?></p>
					<a href="<?php echo site_url('home/') ?>" class="home_btn"><?php echo get_phrase('Back to Homepage') ?></a>
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


<?php
	if ($page_name == 'login' || $page_name == 'sign_up') { 
		
	}else{
		include 'footer.php';
	}
	
	include 'includes_bottom.php';
	include 'modal.php';
	include 'common_scripts.php';
	// include 'init.php';
	?>
 <!------- body section end ------>