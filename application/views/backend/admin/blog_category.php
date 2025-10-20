<div class="row ">
    <div class="col-xl-12 mb-3">
        <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('blog_categories'); ?>
            <button onclick="showAjaxModal('<?php echo site_url('admin/add_blog_category'); ?>', '<?php echo get_phrase('add_a_new_category'); ?>');" class="btn badge-primary-lighten btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_category'); ?></button>
        </h4>
    </div><!-- end col-->
</div>

<div class="row">
	<?php foreach($categories->result_array() as $category): ?>
	    <div class="col-md-4 mb-3">
			<ul class="list-group list-group-numbered">
				<li class="dash_card list-group-item d-flex justify-content-between align-items-start">
					<div class="ml-2 mr-auto">
						<div class="fw-bold" style="font-size: 20px; font-weight: 600;"><?php echo $category['title']; ?></div>
						<span class="mt-1 d-block"><?php echo $category['subtitle']; ?></span>
					</div>
					<div class="ml-auto text-center">
						<span class="badge badge-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width:20px;height:20px;font-size:10px;margin: 0;vertical-align: text-bottom;"><?php echo $this->crud_model->get_blogs_by_category_id($category['blog_category_id'])->num_rows(); ?></span>
						

						<div class="btn-group d-block mt-2">
							<button type="button" class="border-0 bg-white" data-toggle="dropdown" aria-expanded="false">
								<i class="mdi mdi-dots-vertical"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<button class="dropdown-item" onclick="showAjaxModal('<?php echo site_url('admin/edit_blog_category/'.$category['blog_category_id']); ?>', '<?php echo get_phrase('edit_category'); ?>');" type="button"><i class="mdi mdi-pencil"></i> <?php echo get_phrase('edit'); ?></button>
								<button class="dropdown-item" onclick="confirm_modal('<?php echo site_url('admin/blog_category/delete/'.$category['blog_category_id']); ?>');" type="button"><i class="mdi mdi-trash-can-outline"></i> <?php echo get_phrase('delete'); ?></button>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	<?php endforeach; ?>
</div>