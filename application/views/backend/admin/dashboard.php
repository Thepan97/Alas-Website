<?php
    $status_wise_courses = $this->crud_model->get_status_wise_courses();
    $number_of_courses = $status_wise_courses['pending']->num_rows() + $status_wise_courses['active']->num_rows();
    $number_of_lessons = $this->crud_model->get_lessons()->num_rows();
    $number_of_enrolment = $this->crud_model->enrol_history()->num_rows();
    $number_of_students = $this->user_model->get_user()->num_rows();
?>
<!-- <div class="row">
    <div class="col-xl-12 top_h4_heading">
        <h4 class="page-title">  
            <?php echo get_phrase('dashboard'); ?>
        </h4>
    </div>
</div> -->


<div class="row top_dashboard">
    <div class="col-sm-6 col-xl-3 main_das">
        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">
            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between">
                    <div class="main_side">
                       <b class="mb-0"><?php echo get_phrase('number_courses'); ?></b>
                       <div class="left_box d-flex justify-content-between">
                            <span ><?php echo $number_of_courses; ?></span>
                            <span><b>+ 3 New</b></span>
                        </div>
                    </div>
                    <div class="icon_box">
                       <img src="<?=site_url('uploads/dashboard/courses.png');?>" height="50">
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-sm-6 col-xl-3 main_das">
        <a href="<?php echo site_url('admin/courses'); ?>" class="text-secondary">

            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between">
                    <div class="main_side">
                       <b class="mb-0"><?php echo get_phrase('number_of_lessons'); ?></b>
                       <div class="left_box d-flex justify-content-between">
                            <span ><?php echo $number_of_lessons; ?></span>
                            <span><b>+ 3 New</b></span>
                        </div>
                    </div>
                    <div class="icon_box">
                       <img src="<?=site_url('uploads/dashboard/lessons.png');?>" height="50">
                    </div>
                </div>
            </div>

             
        </a>
    </div>

    <div class="col-sm-6 col-xl-3 main_das">
        <a href="<?php echo site_url('admin/enrol_history'); ?>" class="text-secondary">


            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between">
                    <div class="main_side">
                       <b class="mb-0"><?php echo get_phrase('number_of_enrolment'); ?></b>
                       <div class="left_box d-flex justify-content-between">
                            <span ><?php echo $number_of_enrolment; ?></span>
                            <span><b>+ 3 New</b></span>
                        </div>
                    </div>
                    <div class="icon_box">
                       <img src="<?=site_url('uploads/dashboard/enrolment.png');?>" height="50">
                    </div>
                </div>
            </div>

             
        </a>
    </div>

    <div class="col-sm-6 col-xl-3 main_das">
        <a href="<?php echo site_url('admin/users'); ?>" class="text-secondary">

            <div class="card dash_card">
                <div class="card-body d-flex justify-content-between">
                    <div class="main_side">
                       <b class="mb-0"><?php echo get_phrase('number_of_student'); ?></b>
                       <div class="left_box d-flex justify-content-between">
                            <span ><?php echo $number_of_students; ?></span>
                            <span><b>+ 3 New</b></span>
                        </div>
                    </div>
                    <div class="icon_box">
                       <img src="<?=site_url('uploads/dashboard/student.png');?>" height="50">
                    </div>
                </div>
            </div>

             
        </a>
    </div>

</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card custom_card">
            <div class="card-body ">

                <h4 class="header-title mb-4"><?php echo get_phrase('admin_revenue_this_year'); ?></h4>

                <div class="mt-3 chartjs-chart" style="height: 320px;">
                    <canvas id="task-area-chart"></canvas>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-xl-4">
        <div class="card custom_card">
            <div class="card-body">
                <h4 class="header-title mb-4"><?php echo get_phrase('course_overview'); ?></h4>
                <div class="my-4 chartjs-chart" style="height: 202px;">
                    <canvas id="project-status-chart"></canvas>
                </div>
                <div class="row text-center mt-2 py-2">
                    <div class="col-6">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $status_wise_courses['active']->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"><?php echo get_phrase('active_courses'); ?></p>
                    </div>
                    <div class="col-6">
                        <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                            <span><?php echo $status_wise_courses['pending']->num_rows(); ?></span>
                        </h3>
                        <p class="text-muted mb-0"> <?php echo get_phrase('pending_courses'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card custom_card" id='unpaid-instructor-revenue'>
            <div class="card-body">
                <h4 class="header-title mb-3"><?php echo get_phrase('requested_withdrawal'); ?>
                    <a href="<?php echo site_url('admin/instructor_payout'); ?>" class="alignToTitle" id ="go-to-instructor-revenue"> <i class="mdi mdi-logout"></i> </a>
                </h4>
                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <tbody>

                            <?php
                                $pending_payouts = $this->crud_model->get_pending_payouts()->result_array();
                                foreach ($pending_payouts as $key => $pending_payout):
                                $instructor_details = $this->user_model->get_all_user($pending_payout['user_id'])->row_array();
                            ?>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $instructor_details['first_name'].' '.$instructor_details['last_name']; ?></a></h5>
                                    <small><?php echo get_phrase('email'); ?>: <span class="text-muted font-13"><?php echo $instructor_details['email']; ?></span></small>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo currency($pending_payout['amount']); ?></a></h5>
                                    <small><span class="text-muted font-13"><?php echo get_phrase('requested_withdrawal_amount'); ?></span></small>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#unpaid-instructor-revenue').mouseenter(function() {
        $('#go-to-instructor-revenue').show();
    });
    $('#unpaid-instructor-revenue').mouseleave(function() {
        $('#go-to-instructor-revenue').hide();
    });
</script>
