<?php
    $instructor_id = $this->session->userdata('user_id');
    $number_of_courses = $this->crud_model->get_instructor_wise_courses($instructor_id)->num_rows();
    $number_of_enrolment_result = $this->crud_model->instructor_wise_enrolment($instructor_id);
    if ($number_of_enrolment_result) {
        $number_of_enrolment = $number_of_enrolment_result->num_rows();
    }else{
        $number_of_enrolment = 0;
    }
    $total_pending_amount = $this->crud_model->get_total_pending_amount($instructor_id);
    $requested_withdrawal_amount = $this->crud_model->get_requested_withdrawal_amount($instructor_id);
 ?>

<div class="row">
    <div class="col-xl-12 mb-2">
        <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('dashboard'); ?></h4>
    </div><!-- end col-->
</div>


<div class="row">
<div class="col-sm-6 col-xl-3">
    <a href="<?php echo site_url('user/courses'); ?>" class="text-secondary">
        <div class="card dash_card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="rounded-circle badge-danger-lighten icon_box">
                    <i class="dripicons-archive" style="font-size: 24px;"></i>
                </div>
                <h6 class="text-dark"><?php echo get_phrase('number_of_courses'); ?></h6>
                <p class="text-dark mb-0"><?php echo $number_of_courses; ?></p>
            </div>
        </div>
    </a>
</div>

<div class="col-sm-6 col-xl-3">
    <div class="card dash_card">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="rounded-circle badge-success-lighten icon_box">
                <i class="dripicons-user-group" style="font-size: 24px;"></i>
            </div>
            
            <h6 class="text-dark"><?php echo get_phrase('number_of_enrolment'); ?></h6>
            <p class="text-dark mb-0"><?php echo $number_of_enrolment; ?></p>
        </div>
    </div>
</div>

<div class="col-sm-6 col-xl-3">
    <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
        <div class="card dash_card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="rounded-circle badge-warning-lighten icon_box">
                    <i class="dripicons-inbox" style="font-size: 24px;"></i>
                </div>
                
                <h6 class="text-dark"><?php echo get_phrase('pending_balance'); ?></h6>
                <p class="text-dark mb-0"><?php echo $total_pending_amount > 0 ? currency($total_pending_amount) : currency_code_and_symbol().''.$total_pending_amount; ?></p>
            </div>
        </div>
    </a>
</div>

<div class="col-sm-6 col-xl-3">
    <a href="<?php echo site_url('user/payout_report'); ?>" class="text-secondary">
        <div class="card dash_card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="rounded-circle badge-primary-lighten icon_box">
                    <i class="dripicons-pin" style="font-size: 24px;"></i>
                </div>
                
                <h6 class="text-dark"><?php echo get_phrase('requested_withdrawal_amount'); ?></h6>
                <p class="text-dark mb-0"><?php echo $requested_withdrawal_amount > 0 ? currency($requested_withdrawal_amount) : currency_code_and_symbol().''.$requested_withdrawal_amount; ?></p>
            </div>
        </div>
    </a>
</div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card dash_card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('instructor_revenue'); ?></h4>
                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-xl-12">
        <div class="card dash_card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('course_overview'); ?></h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $this->crud_model->get_status_wise_courses_for_instructor('active')->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"><?php echo get_phrase('active_courses'); ?></p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $this->crud_model->get_status_wise_courses_for_instructor('pending')->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"> <?php echo get_phrase('pending_courses'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
