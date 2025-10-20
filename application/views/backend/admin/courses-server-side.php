<div class="row ">
    <div class="col-xl-12"> 
        <h4 class="page-title"> 
            <!-- <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('courses'); ?> -->
            <a href="<?php echo site_url('admin/course_form/add_course'); ?>" class="btn badge-primary-lighten btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_course'); ?></a>
        </h4>
    </div><!-- end col-->
</div>
<div class="row mt-4 new_small_icon top_dashboard_2">
        <div class="col">
            <a href="<?php echo site_url('admin/courses?category_id=all&status=active&instructor_id=all&price=all&button='); ?>" class="text-secondary"> 
                <div class="card dash_card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="icon_box">
                               <i class="dripicons-link" style="font-size: 24px;"></i>
                            </div>
                       <h6 ><?php echo get_phrase('active_courses'); ?></h6>
                       <p class="mb-0"><?php echo $status_wise_courses['active']->num_rows(); ?></p> 
                    </div>
                </div>
                 
            </a>
        </div>

        <div class="col">
            <a href="<?php echo site_url('admin/courses?category_id=all&status=upcoming&instructor_id=all&price=all&button='); ?>" class="text-secondary">

                <div class="card dash_card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="icon_box">
                               <i class="dripicons-link-broken" style="font-size: 24px;"></i>
                            </div>
                       <h6 ><?php echo get_phrase('upcoming_courses'); ?></h6>
                       <p class="mb-0"><?php echo $status_wise_courses['upcoming']->num_rows(); ?></p> 
                    </div>
                </div>

                  
                 
            </a>
        </div>

        <div class="col">
            <a href="<?php echo site_url('admin/courses?category_id=all&status=pending&instructor_id=all&price=all&button='); ?>" class="text-secondary">

                <div class="card dash_card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="icon_box">
                           <i class="dripicons-link-broken" style="font-size: 24px;"></i>
                        </div>
                       <h6 ><?php echo get_phrase('pending_courses'); ?></h6>
                       <p class="mb-0"><?php echo $status_wise_courses['pending']->num_rows(); ?></p> 
                    </div>
                </div>
 
            </a>
        </div>

        <div class="col">
            <a href="<?php echo site_url('admin/courses?category_id=all&status=all&instructor_id=all&price=free&button='); ?>" class="text-secondary">

                <div class="card dash_card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="icon_box">
                           <i class="dripicons-star" style="font-size: 24px;"></i>
                        </div>
                       <h6 ><?php echo get_phrase('free_courses'); ?></h6>
                       <p class="mb-0"><?php echo $this->crud_model->get_free_and_paid_courses('free')->num_rows(); ?></p> 
                    </div>
                </div>

                 

                 
            </a>
        </div>

        <div class="col">
            <a href="<?php echo site_url('admin/courses?category_id=all&status=all&instructor_id=all&price=paid&button='); ?>" class="text-secondary">

                <div class="card dash_card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class=" icon_box">
                           <i class="dripicons-tags" style="font-size: 24px;"></i>
                        </div>
                       <h6 ><?php echo get_phrase('paid_courses'); ?></h6>
                       <p class="mb-0"><?php echo $this->crud_model->get_free_and_paid_courses('paid')->num_rows(); ?></p> 
                    </div>
                </div>

                  
                 
            </a>
        </div>

    </div>
<div class="row">
    <div class="col-xl-12  filter_cus">
         <h4 class="mb-3 header-title"><?php echo get_phrase('course_list'); ?></h4>
        <form class="row justify-content-center dash_card m-0 p-3" action="<?php echo site_url('admin/courses'); ?>" method="get">
            <!-- Course Categories -->
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="category_id"><?php echo get_phrase('categories'); ?></label>
                    <select class="form-control select2" data-toggle="select2" name="category_id" id="category_id">
                        <option value="<?php echo 'all'; ?>" <?php if ($selected_category_id == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                        <?php foreach ($categories->result_array() as $category) : ?>
                            <optgroup label="<?php echo $category['name']; ?>">
                                <?php $sub_categories = $this->crud_model->get_sub_categories($category['id']);
                                foreach ($sub_categories as $sub_category) : ?>
                                    <option value="<?php echo $sub_category['id']; ?>" <?php if ($selected_category_id == $sub_category['id']) echo 'selected'; ?>><?php echo $sub_category['name']; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Course Status -->
            <div class="col-xl-2">
                <div class="form-group">
                    <label for="status"><?php echo get_phrase('status'); ?></label>
                    <select class="form-control select2" data-toggle="select2" name="status" id='status'>
                        <option value="all" <?php if ($selected_status == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                        <option value="active" <?php if ($selected_status == 'active') echo 'selected'; ?>><?php echo get_phrase('active'); ?></option>
                        <option value="pending" <?php if ($selected_status == 'pending') echo 'selected'; ?>><?php echo get_phrase('pending'); ?></option>
                        <option value="private" <?php if ($selected_status == 'private') echo 'selected'; ?>><?php echo get_phrase('private'); ?></option>
                        <option value="upcoming" <?php if ($selected_status == 'upcoming') echo 'selected'; ?>><?php echo get_phrase('upcoming'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Course Instructors -->
            <div class="col-xl-3">
                <div class="form-group">
                    <label for="instructor_id"><?php echo get_phrase('instructor'); ?></label>
                    <select class="form-control server-side-select2" name="instructor_id" id='instructor_id' action="<?php echo site_url('admin/get_select2_instructor_data/all'); ?>">
                        <option value="all" <?php if ($selected_instructor_id == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>

                        <?php if(isset($_GET['instructor_id']) && $_GET['instructor_id'] != 'all'): ?>
                            <?php $instructor_details = $this->user_model->get_all_user($_GET['instructor_id'])->row_array(); ?>
                            <option value="<?php echo $_GET['instructor_id']; ?>" selected><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <!-- Course Price -->
            <div class="col-xl-2">
                <div class="form-group">
                    <label for="price"><?php echo get_phrase('price'); ?></label>
                    <select class="form-control select2" data-toggle="select2" name="price" id='price'>
                        <option value="all" <?php if ($selected_price == 'all') echo 'selected'; ?>><?php echo get_phrase('all'); ?></option>
                        <option value="free" <?php if ($selected_price == 'free') echo 'selected'; ?>><?php echo get_phrase('free'); ?></option>
                        <option value="paid" <?php if ($selected_price == 'paid') echo 'selected'; ?>><?php echo get_phrase('paid'); ?></option>
                    </select>
                </div>
            </div>

            <div class="col-xl-2">
                <label for=".." class="text-white">..</label>
                <button type="submit" class="btn btn-primary btn-block" name="button"><?php echo get_phrase('filter'); ?></button>
            </div>
        </form>


        <div class="custom_table dash_card table-responsive-sm mt-3">
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
        </div>


    </div>
</div>