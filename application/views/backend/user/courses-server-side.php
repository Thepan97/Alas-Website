<div class="row ">
    <div class="col-xl-12 mb-3">
       <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('courses'); ?>
            <a href="<?php echo site_url('user/course_form/add_course'); ?>" class="btn badge-primary-lighten btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_course'); ?></a>
        </h4>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col">
        <a href="<?php echo site_url('user/courses?category_id=all&status=active&price=all&button='); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="rounded-circle badge-danger-lighten icon_box">
                        <i class="dripicons-link" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="text-dark"><?php echo get_phrase('active_courses'); ?></h6>
                    <p class="text-dark mb-0">
                        <?php
                            $active_courses = $this->crud_model->get_status_wise_courses_for_instructor('active');
                            echo $active_courses->num_rows();
                         ?>
                    </p>
                </div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="<?php echo site_url('user/courses?category_id=all&status=pending&price=all&button='); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="rounded-circle badge-success-lighten icon_box">
                        <i class="dripicons-link-broken" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="text-dark">
                        <?php echo get_phrase('pending_courses'); ?>
                    </h6>
                    <p class="text-dark mb-0"><?php
                            $pending_courses = $this->crud_model->get_status_wise_courses_for_instructor('pending');
                            echo $pending_courses->num_rows();
                         ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="<?php echo site_url('user/courses?category_id=all&status=draft&price=all&button='); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="rounded-circle badge-warning-lighten icon_box">
                        <i class="dripicons-bookmark" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="text-dark">
                        <?php echo get_phrase('draft_courses'); ?>
                    </h6>
                    <p class="text-dark mb-0"><?php
                            $draft_courses = $this->crud_model->get_status_wise_courses_for_instructor('draft');
                            echo $draft_courses->num_rows();
                         ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="<?php echo site_url('user/courses?category_id=all&status=all&price=free&button='); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="rounded-circle badge-primary-lighten icon_box">
                        <i class="dripicons-star" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="text-dark"><?php echo get_phrase('free_courses'); ?></h6>
                    <p class="text-dark mb-0"><?php echo $this->crud_model->get_free_and_paid_courses('free', $this->session->userdata('user_id'))->num_rows(); ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col">
        <a href="<?php echo site_url('user/courses?category_id=all&status=all&price=paid&button='); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="rounded-circle badge-dark-lighten icon_box">
                        <i class="dripicons-tags" style="font-size: 24px;"></i>
                    </div>
                    <h6 class="text-dark"><?php echo get_phrase('paid_courses'); ?></h6>
                    <p class="text-dark mb-0"><?php echo $this->crud_model->get_free_and_paid_courses('paid', $this->session->userdata('user_id'))->num_rows(); ?></p>
                </div>
            </div>
        </a>
    </div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom_table dash_card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('course_list'); ?></h4>
                <form class="row justify-content-center" action="<?php echo site_url('user/courses'); ?>" method="get">
                    <!-- Course Categories -->
                    <div class="col-xl-3">
                        <div class="form-group">
                            <label for="category_id"><?php echo get_phrase('categories'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id">
                                <option value="<?php echo 'all'; ?>" <?php if($selected_category_id == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                                <?php foreach ($categories->result_array() as $category): ?>
                                    <optgroup label="<?php echo $category['name']; ?>">
                                        <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                        foreach ($sub_categories as $sub_category): ?>
                                        <option value="<?php echo $sub_category['id']; ?>" <?php if($selected_category_id == $sub_category['id']) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <!-- Course Status -->
                <div class="col-xl-3">
                    <div class="form-group">
                        <label for="status"><?php echo get_phrase('status'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="status" id = 'status'>
                            <option value="all" <?php if($selected_status == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                            <option value="active" <?php if($selected_status == 'active') echo 'selected'; ?>><?php echo get_phrase('active'); ?></option>
                            <option value="pending" <?php if($selected_status == 'pending') echo 'selected'; ?>><?php echo get_phrase('pending'); ?></option>
                            <option value="draft" <?php if($selected_status == 'draft') echo 'selected'; ?>><?php echo get_phrase('draft'); ?></option>
                        </select>
                    </div>
                </div>

                <!-- Course Price -->
                <div class="col-xl-3">
                    <div class="form-group">
                        <label for="price"><?php echo get_phrase('price'); ?></label>
                        <select class="form-control select2" data-toggle="select2" name="price" id = 'price'>
                            <option value="all"  <?php if($selected_price == 'all' ) echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                            <option value="free" <?php if($selected_price == 'free') echo 'selected'; ?>><?php echo get_phrase('free'); ?></option>
                            <option value="paid" <?php if($selected_price == 'paid') echo 'selected'; ?>><?php echo get_phrase('paid'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-xl-3">
                    <label for=".." class="text-white">..</label>
                    <button type="submit" class="btn btn-primary btn-block" name="button"><?php echo get_phrase('filter'); ?></button>
                </div>
            </form>

            <div class="table-responsive-sm mt-4">
                <?php if (count($courses) > 0): ?>
                    <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='25'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('category'); ?></th>
                                <th><?php echo get_phrase('lesson_and_section'); ?></th>
                                <th><?php echo get_phrase('enrolled_student'); ?></th>
                                <th><?php echo get_phrase('status'); ?></th>
                                <th><?php echo get_phrase('price'); ?></th>
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                    </table>
                <?php endif; ?>
                <?php if (count($courses) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                      <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                      <?php echo get_phrase('no_data_found'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>
