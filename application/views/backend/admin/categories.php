<div class="row ">
    <div class="col-xl-12 mb-3">
         <h4 class="page-title">
          <!-- <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('categories'); ?> -->
            <a href="<?php echo site_url('admin/category_form/add_category'); ?>" class="btn badge-primary-lighten btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_category'); ?></a>
        </h4>
    </div><!-- end col-->
</div>
<div class="row custom_cate">
    <?php foreach ($categories->result_array() as $category) :
        if ($category['parent'] > 0)
            continue;
        $sub_categories = $this->crud_model->get_sub_categories($category['id']); ?>
        <div class="col-md-6 col-lg-6 col-xl-4 on-hover-action" id="<?php echo $category['id']; ?>">
            <div class="card d-block">
                <div class="card-header border-0 position-relative p-0">
                    <img class="card-img-top" src="<?php echo base_url('uploads/thumbnails/category_thumbnails/' . $category['thumbnail']); ?>" alt="Card image cap">

                    <div class="position-absolute custom_btn_hover">
                          <a href="<?php echo site_url('admin/category_form/edit_category/' . $category['id']); ?>" class="btn btn-icon btn-primary btn-sm" id="category-edit-btn-<?php echo $category['id']; ?>" style="display: none;" style="margin-right:5px;">
                                <i class="dripicons-pencil"></i> 
                                <!-- <?php //echo get_phrase('edit'); ?> -->
                            </a>
                            <a href="#" class="btn btn-icon btn-danger btn-sm" id="category-delete-btn-<?php echo $category['id']; ?>" style="float: right; display: none;" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/' . $category['id']); ?>');" style="margin-right:5px;">
                                <i class="dripicons-trash"></i> 
                                <!-- <?php //echo get_phrase('delete'); ?> -->
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex top_card align-items-center" style="gap: 10px;">
                        <i class="<?php echo $category['font_awesome_class']; ?>"></i>
                        <div class="right_box">
                            <h5 class="m-0"> <?php echo $category['name']; ?></h5>
                            <small style="font-style: italic;">
                                <?php echo count($sub_categories) . ' ' . get_phrase('sub_categories'); ?>
                            </small>
                        </div>
                    </div> 

                    <?php if (!empty($sub_categories)): ?>
                    <ul class="nav custom_hover_set mt-2">
                        <?php foreach ($sub_categories as $sub_category) : ?>
                            <li class="nav-item d-flex justify-content-between mb-2" id="<?php echo $sub_category['id']; ?>">
                                <span><i class="<?php echo $sub_category['font_awesome_class']; ?>"></i> <?php echo $sub_category['name']; ?></span>
                                <div>
                                    <span class="category-action" id='category-delete-btn-<?php echo $sub_category['id']; ?>' >
                                    <a href="javascript:;" class="action-icon" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/' . $sub_category['id']); ?>');"> <i class="dripicons-trash text-danger" style="font-size: 14px;"></i> </a>
                                    </span>
                                    <span class="category-action" id='category-edit-btn-<?php echo $sub_category['id']; ?>' >
                                        <a href="<?php echo site_url('admin/category_form/edit_category/' . $sub_category['id']); ?>" class="action-icon"> <i class="dripicons-pencil text-primary" style="font-size: 14px;"></i></a>
                                    </span>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>          
                    <?php endif ?>

                </div>
 
            </div> <!-- end card-->
        </div>
    <?php endforeach; ?>
</div>

<script type="text/javascript">
    $('.on-hover-action').mouseenter(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).show();
        $('#category-edit-btn-' + id).show();
    });
    $('.on-hover-action').mouseleave(function() {
        var id = this.id;
        $('#category-delete-btn-' + id).hide();
        $('#category-edit-btn-' + id).hide();
    });
</script>