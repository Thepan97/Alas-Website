

<section class="new_style_ban blog_banner" style="background-image: url('<?php echo site_url('uploads/blog/page-banner/'.get_frontend_settings('blog_page_banner')); ?>'); background-size: cover; background-position: center; position: relative;">
   
    <div class="container-lg new_inner position-relative py-5">
        <div class="row my-0 my-md-4 justify-content-center">
            <div class="col-lg-7 latest_update">
                <h1 class="display-4 fw-600 text-center text-white"><?php echo get_frontend_settings('blog_page_title'); ?></h1>
                <div class="text-17px text-center text-white"><?php echo get_frontend_settings('blog_page_subtitle'); ?></div>
            </div>
        </div>
    </div>
</section>

<?php include $included_page; ?>