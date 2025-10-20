<style>
   .form-check-label {
   margin-right: 15px;
   margin-bottom: 8px;
   white-space: nowrap;
   }
   .form-check-input {
   margin-right: 6px;
   transform: scale(1.1);
   }
   .d-flex.flex-wrap.gap-3.py-2 {
   gap: 10px;
   }
   @media (max-width: 768px) {
   .form-check-label {
   display: block;
   width: 100%;
   }
   }
   .wizard-nav-wrapper {
   display: flex;
   align-items: center;
   position: relative;
   }
   .wizard-nav-scroll {
   overflow-x: hidden;
   flex-grow: 1;
   }
   .wizard-nav-scroll ul.nav {
   display: flex;
   flex-wrap: nowrap;
   overflow-x: auto;
   scrollbar-width: none;
   }
   .wizard-nav-scroll ul.nav::-webkit-scrollbar {
   display: none;
   }
   .nav-item {
   flex: 0 0 auto;
   white-space: nowrap;
   margin-right: 10px;
   }
   .nav-link {
   display: flex;
   align-items: center;
   padding: 8px 14px;
   font-size: 14px;
   }
   .scroll-btn {
   background-color: #ffffff;
   border: 1px solid #ddd;
   color: #333;
   font-size: 20px;
   width: 42px;
   height: 42px;
   border-radius: 50%;
   box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
   cursor: pointer;
   display: flex;
   align-items: center;
   justify-content: center;
   transition: all 0.3s ease;
   z-index: 2;
   padding: 0;
   user-select: none;
   }
   .scroll-btn:hover {
   background-color: #f5f5f5;
   color: #000;
   border-color: #aaa;
   box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
   }
   .scroll-left,
   .scroll-right {
   position: absolute;
   top: 34%;
   transform: translateY(-50%);
   }
   .scroll-left {
   left: -15px;
   margin-right: 10px;
   }
   .scroll-right {
   right: -15px;
   margin-left: 10px;
   }
</style>
<?php
   //     ini_set('display_errors', 1);
   // ini_set('display_startup_errors', 1);
   // error_reporting(E_ALL);
       $user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
       $social_links = !empty($user_data['social_links']) ? json_decode($user_data['social_links'], true) : [];
   $payment_keys = !empty($user_data['payment_keys']) ? json_decode($user_data['payment_keys'], true) : [];
   
   // Avoid undefined index warnings:
   $paypal_keys = isset($payment_keys['paypal']) ? $payment_keys['paypal'] : [];
   $stripe_keys = isset($payment_keys['stripe']) ? $payment_keys['stripe'] : [];
   $razorpay_keys = isset($payment_keys['razorpay']) ? $payment_keys['razorpay'] : [];
   $student_subjects = !empty($user_data['student_subjects']) ? json_decode($user_data['student_subjects'], true) : [];
   $school_term_times = !empty($user_data['school_term_time']) ? json_decode($user_data['school_term_time'], true) : [];
   $half_term_days = !empty($user_data['half_term_days']) ? json_decode($user_data['half_term_days'], true) : [];
   $summer_term_days = !empty($user_data['summer_term_days']) ? json_decode($user_data['summer_term_days'], true) : [];
   $fee_subscription = !empty($user_data['fee_subscription']) ? json_decode($user_data['fee_subscription'], true) : [];
   $tuition_type = !empty($user_data['tuition_type']) ? $user_data['tuition_type'] : '';
   $siblings = !empty($user_data['sibling']) ? json_decode($user_data['sibling'], true) : [];
   
   ?>
<?php
   function is_checked($value, $selected_array) {
       return (is_array($selected_array) && in_array($value, $selected_array)) ? 'checked' : '';
   }
   ?>
<div class="row ">
   <div class="col-xl-12">
      <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
   </div>
   <!-- end col-->
</div>
<div class="row">
   <div class="col-xl-12">
      <div class="card dash_card">
         <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('student_edit_form'); ?></h4>
            <!-----------------OLD FORM--------------------->
            <!-- <form class="required-form" action="<?php echo site_url('admin/users/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
               <div id="progressbarwizard">
                  <div class="wizard-nav-wrapper position-relative">
                     <button class="scroll-btn scroll-left" type="button">‹</button>
                     <div class="wizard-nav-scroll">
                        <ul class="nav nav-pills form-wizard-header mb-3 flex-nowrap">
                           <li class="nav-item">
                              <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-face-profile mr-1"></i>
                              <span><?php echo get_phrase('basic_info'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#parent_details" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-account-group-outline mr-1"></i>
                              <span><?php echo get_phrase('parent_details'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#sibling_detail" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-account-group-outline mr-1"></i>
                              <span><?php echo get_phrase('sibling_details'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-lock mr-1"></i>
                              <span><?php echo get_phrase('login_credentials'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#tuition_details" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-book mr-1"></i>
                              <span><?php echo get_phrase('tuition_details'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#medical_history" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-clipboard-pulse-outline mr-1"></i>
                              <span><?php echo get_phrase('medical_history'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-wifi mr-1"></i>
                              <span><?php echo get_phrase('social_information'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#payment_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-currency-eur mr-1"></i>
                              <span><?php echo get_phrase('payment_info'); ?></span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                              <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                              <span><?php echo get_phrase('finish'); ?></span>
                              </a>
                           </li>
                        </ul>
                     </div>
                     <button class="scroll-btn scroll-right" type="button">›</button>
                  </div>
                  <div class="tab-content b-0 mb-0">
                     <div class="tab-pane" id="basic_info">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data['first_name']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="middle_name"><?php echo get_phrase('middle_name'); ?> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $user_data['middle_name']; ?>">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('last_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_data['last_name']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="title"><?php echo get_phrase('a_short_title_about_yourself'); ?> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $user_data['title']; ?>">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                                 <div class="col-md-9">
                                    <textarea name="biography" id = "summernote-basic" class="form-control"><?php echo $user_data['biography']; ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('Phone'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['phone']; ?>" id="phone" name="phone">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="address"><?php echo get_phrase('address'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['address']; ?>" id="address" name="address">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="address_line_2"><?php echo get_phrase('address_line_2'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['address_2']; ?>" id="address_2" name="address_2">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="city"><?php echo get_phrase('city'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['city']; ?>" id="city" name="city">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="state"><?php echo get_phrase('state'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['state']; ?>" id="state" name="state">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="zipcode"><?php echo get_phrase('zipcode'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['zipcode']; ?>" id="zipcode" name="zipcode">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="country"><?php echo get_phrase('country'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo $user_data['country']; ?>" id="country" name="country">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                                 <div class="col-md-9">
                                    <div class="d-flex">
                                       <div class="">
                                          <img class = "rounded-circle img-thumbnail" src="<?php echo $this->user_model->get_user_image_url($user_data['id']);?>" alt="" style="height: 50px; width: 50px;">
                                       </div>
                                       <div class="flex-grow-1 mt-1 pl-3">
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" class="custom-file-input" name = "user_image" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                <label class="custom-file-label ellipsis" for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="parent_details">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="mother_first_name"><?php echo get_phrase('mother_first_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="mother_first_name" name="m_fname" value="<?php echo $user_data['m_fname']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="mother_middle_name"><?php echo get_phrase('mother_middle_name'); ?> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="mother_middle_name" name="m_middle_name" value="<?php echo $user_data['m_middle_name']; ?>">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="mother_last_name"><?php echo get_phrase('mother_last_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="mother_last_name" name="m_lname" value="<?php echo $user_data['m_lname']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="mother_title"><?php echo get_phrase('a_short_title_about_your_mother'); ?></label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="mother_title" name="m_title" value="<?php echo $user_data['m_title']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="father_first_name"><?php echo get_phrase('father_first_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="father_first_name" name="f_fname" value="<?php echo $user_data['f_fname']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="father_middle_name"><?php echo get_phrase('father_middle_name'); ?> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="father_middle_name" name="f_middle_name" value="<?php echo $user_data['f_middle_name']; ?>">
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="father_last_name"><?php echo get_phrase('father_last_name'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="father_last_name" name="f_lname" value="<?php echo $user_data['f_lname']; ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row mb-3">
                                 <label class="col-md-3 col-form-label" for="father_title"><?php echo get_phrase('a_short_title_about_your_father'); ?> <span class="required">*</span> </label>
                                 <div class="col-md-9">
                                    <input type="text" class="form-control" id="father_title" name="f_title" value="<?php echo $user_data['f_title']; ?>" required>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
                       
                     </div> -->
            <!-- <div class="tab-pane" id="sibling_detail">
               <div id="sibling-container">
                  <?php
                  $siblingIndex = 0;
                  if (!empty($siblings)) {
                      foreach ($siblings as $index => $sibling): ?>
                  <div class="mb-3 border p-3 rounded sibling-row">
                     <div class="form-group mb-2">
                        <label>First Name</label>
                        <input type="text" name="sibling[<?= $index ?>][name]" class="form-control" value="<?= $sibling['name'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Middle Name</label>
                        <input type="text" name="sibling[<?= $index ?>][middle_name]" class="form-control" value="<?= $sibling['middle_name'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input type="text" name="sibling[<?= $index ?>][lastname]" class="form-control" value="<?= $sibling['lastname'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Date of Birth</label>
                        <input type="date" name="sibling[<?= $index ?>][dob]" class="form-control" value="<?= $sibling['dob'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[<?= $index ?>][gender]" value="Male" <?= ($sibling['gender'] == 'Male') ? 'checked' : '' ?>>
                           <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[<?= $index ?>][gender]" value="Female" <?= ($sibling['gender'] == 'Female') ? 'checked' : '' ?>>
                           <label class="form-check-label">Female</label>
                        </div>
                     </div>
                     <button type="button" class="btn btn-danger btn-sm remove-sibling">Remove</button>
                  </div>
                  <?php
                  endforeach;
                  } else {
                  // Show one empty row if no sibling data exists
                  ?>
                  <div class="mb-3 border p-3 rounded sibling-row">
                     <div class="form-group mb-2">
                        <label>First Name</label>
                        <input type="text" name="sibling[0][name]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Middle Name</label>
                        <input type="text" name="sibling[0][middle_name]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input type="text" name="sibling[0][lastname]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Date of Birth</label>
                        <input type="date" name="sibling[0][dob]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[0][gender]" value="Male">
                           <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[0][gender]" value="Female">
                           <label class="form-check-label">Female</label>
                        </div>
                     </div>
                     <button type="button" class="btn btn-danger btn-sm remove-sibling">Remove</button>
                  </div>
                  <?php } ?>
               </div>
               <button type="button" class="btn btn-primary mt-3" id="add-sibling">Add More</button>
               </div>
               <div class="tab-pane" id="login_credentials">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="email"> <?php echo get_phrase('email'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                        </div>
                     </div>
                  </div>
               </div>
               </div> -->
            <!-- <div class="tab-pane" id="tuition_details">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="tuition_type">
                        <?php echo get_phrase('tuition_type'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="d-flex flex-wrap gap-3 py-2">
                              <?php
                  $tuition_options = [
                      "Group class",
                      "1 on 1",
                      "Summer school",
                      "Intensive weeklong Subject"
                  ];
                  
                  foreach ($tuition_options as $option):
                  ?>
                              <label class="form-check-label me-4">
                              <input class="form-check-input checkbox-group"
                                 type="radio"
                                 name="tuition_type"
                                 value="<?= $option ?>"
                                 <?= ($tuition_type == $option) ? 'checked' : '' ?>>
                              <?= $option ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="student_subjects">
                        <?php echo get_phrase('subject_choice'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="d-flex flex-wrap gap-3 py-2">
                              <?php
                  $all_subjects = ['English', 'Maths', 'Science', 'French', 'Spanish'];
                  foreach ($all_subjects as $subject):
                  ?>
                              <label class="form-check-label me-3">
                              <input class="form-check-input checkbox-group"
                                 name="student_subjects[]"
                                 value="<?= $subject ?>"
                                 type="checkbox"
                                 <?= (in_array($subject, $student_subjects)) ? 'checked' : '' ?>>
                              <?= $subject ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="school_term_time">
                        <?php echo get_phrase('school_term_days_and_times'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="d-flex flex-wrap gap-3 py-2">
                              <?php
                  $all_school_term_times = [
                      'Monday 4pm - 6pm', 'Monday 5pm - 7pm',
                      'Tuesday 4pm - 6pm', 'Tuesday 5pm - 7pm',
                      'Wednesday 4pm - 6pm', 'Wednesday 5pm - 7pm',
                      'Thursday 4pm - 6pm', 'Thursday 5pm - 7pm',
                      'Friday 4pm - 6pm', 'Friday 5pm - 7pm',
                      'Saturday 11am - 1pm', 'Saturday 1pm - 3pm'
                  ];
                  foreach ($all_school_term_times as $time):
                  ?>
                              <label class="form-check-label me-3">
                              <input class="form-check-input checkbox-group"
                                 name="school_term_time[]"
                                 value="<?= $time ?>"
                                 type="checkbox"
                                 <?= (in_array($time, $school_term_times)) ? 'checked' : '' ?>>
                              <?= $time ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="half_term_days">
                        <?php echo get_phrase('half_term_days'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="d-flex flex-wrap gap-3 py-2">
                              <?php
                  $week_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                  foreach ($week_days as $day):
                  ?>
                              <label class="form-check-label me-3">
                              <input class="form-check-input checkbox-group"
                                 type="checkbox"
                                 value="<?= $day ?>"
                                 name="half_term_days[]"
                                 <?= (in_array($day, $half_term_days)) ? 'checked' : '' ?>>
                              <?= $day ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="summer_term_days">
                        <?php echo get_phrase('summer_school_days'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="d-flex flex-wrap gap-3 py-2">
                              <?php
                  $summer_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                  foreach ($summer_days as $day):
                  ?>
                              <label class="form-check-label me-3">
                              <input class="form-check-input checkbox-group"
                                 type="checkbox"
                                 name="summer_term_days[]"
                                 value="<?= $day ?>"
                                 <?= (in_array($day, $summer_term_days)) ? 'checked' : '' ?>>
                              <?= $day ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="fee_subscription">
                        <?php echo get_phrase('fees_subscription'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <div class="row flex-column flex-lg-row">
                              <?php
                  $fee_options = [
                      "£25.00 - Pay as you Go (per session)",
                      "£150.00 - Monthly - school term (2h per week per subject)",
                      "£225.00 - Monthly - school term (3h per week - English / Maths / Science)",
                      "£25.00 - Summer School Half Day PAYG",
                      "£120.00 - Summer School Half Day (weekly)",
                      "£45.00 - Summer School Full Day PAYG",
                      "£200.00 - Summer School Full Day PAYG",
                      "£250.00 - Summer School Weeklong Intensive Subject (full day 9am - 6pm)"
                  ];
                  
                  $chunks = array_chunk($fee_options, ceil(count($fee_options) / 2));
                  foreach ($chunks as $chunk):
                  ?>
                              <div class="col-lg-12 mb-2">
                                 <div class="d-flex flex-column gap-2 py-1">
                                    <?php foreach ($chunk as $option): ?>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group"
                                       type="checkbox"
                                       name="fee_subscription[]"
                                       value="<?= $option ?>"
                                       <?= (in_array($option, $fee_subscription)) ? 'checked' : '' ?>>
                                    <?= $option ?>
                                    </label>
                                    <?php endforeach; ?>
                                 </div>
                              </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>
                  </div>
               
               </div>
               
               </div> -->
            <!-- <div class="tab-pane" id="medical_history">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="emergency_first_name"><?php echo get_phrase('emergency_first_name'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="emergency_first_name" name="e_fname" value="<?php echo $user_data['e_fname']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="emergency_last_name"><?php echo get_phrase('emergency_last_name'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="emergency_last_name" name="e_lname" value="<?php echo $user_data['e_lname']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="emergency_contact_number"><?php echo get_phrase('emergency_contact_number'); ?></label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="emergency_contact_number" name="e_contact" value="<?php echo $user_data['e_contact']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="GP_name"><?php echo get_phrase('GP_name'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="GP_name" name="gp_name" value="<?php echo $user_data['gp_name']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="emergency_address"><?php echo get_phrase('emergency_address'); ?> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="emergency_address" name="e_add1" value="<?php echo $user_data['e_add1']; ?>">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="emergency_address_line_2"><?php echo get_phrase('emergency_address_line_2'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="emergency_address_line_2" name="e_add2" value="<?php echo $user_data['e_add2']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="City"><?php echo get_phrase('City'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="City" name="e_city" value="<?php echo $user_data['e_city']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="State"><?php echo get_phrase('State'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="State" name="e_state" value="<?php echo $user_data['e_state']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="Zipcode"><?php echo get_phrase('Zipcode'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="Zipcode" name="e_zipcode" value="<?php echo $user_data['e_zipcode']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="Country"><?php echo get_phrase('Country'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="Country" name="e_country" value="<?php echo $user_data['e_country']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="Phone"><?php echo get_phrase('Phone'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="Phone" name="e_contact" value="<?php echo $user_data['e_contact']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="Email"><?php echo get_phrase('Email'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="Email" name="e_email" value="<?php echo $user_data['e_email']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="have_any_medical_condition"><?php echo get_phrase('have_any_medical_condition?'); ?></label>
                        <div class="col-md-9">
                           <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input medical-condition-radio" id="condition_yes" name="is_medical_condition" value="1"
                                 <?php if ($user_data['is_medical_condition'] == 1) echo 'checked'; ?> required>
                              <label class="form-check-label" for="condition_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input medical-condition-radio" id="condition_no" name="is_medical_condition" value="0"
                                 <?php if ($user_data['is_medical_condition'] == 0) echo 'checked'; ?> required>
                              <label class="form-check-label" for="condition_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row mb-3 medical-condition-details">
                        <label class="col-md-3 col-form-label" for="type_of_medical_condition">
                        <?php echo get_phrase('type_of_medical_condition'); ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="type_of_medical_condition" name="type_of_condition" value="<?php echo $user_data['type_of_condition']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="have_special_education"><?php echo get_phrase('have_special_education?'); ?></label>
                        <div class="col-md-9">
                           <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input special-education-radio" id="education_yes" name="is_special_education" value="1"
                                 <?php if ($user_data['is_special_education'] == 1) echo 'checked'; ?> required>
                              <label class="form-check-label" for="education_yes">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input type="radio" class="form-check-input special-education-radio" id="education_no" name="is_special_education" value="0"
                                 <?php if ($user_data['is_special_education'] == 0) echo 'checked'; ?> required>
                              <label class="form-check-label" for="education_no">No</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="legal_guardian_name"><?php echo get_phrase('legal_guardian_name'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <div class="row ">
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_fname"  value="<?php echo $user_data['guardian_fname']; ?>"  class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_middle_name"  value="<?php echo $user_data['guardian_middle_name']; ?>" class="form-control" placeholder="Middle">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_lname"  value="<?php echo $user_data['guardian_lname']; ?>" class="form-control required" placeholder="Last">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="date_of_registration"><?php echo get_phrase('date_of_registration'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="date_of_registration" name="reg_date" value="<?php echo $user_data['reg_date']; ?>" required>
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="signature"><?php echo get_phrase('signature'); ?> <span class="required">*</span> </label>
                        <div class="col-md-9">
                           <input type="text" class="form-control" id="signature" name="signature" value="<?php echo $user_data['signature']; ?>" required>
                        </div>
                     </div>
                  </div>
                  
               </div>
               
               </div> -->
            <!-- <div class="tab-pane" id="social_information">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('facebook'); ?></label>
                        <div class="col-md-9">
                           <input type="text" id="facebook_link" name="facebook_link" class="form-control" value="<?php echo $social_links['facebook']; ?>">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="twitter_link"><?php echo get_phrase('twitter'); ?></label>
                        <div class="col-md-9">
                           <input type="text" id="twitter_link" name="twitter_link" class="form-control" value="<?php echo $social_links['twitter']; ?>">
                        </div>
                     </div>
                     <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('linkedin'); ?></label>
                        <div class="col-md-9">
                           <input type="text" id="linkedin_link" name="linkedin_link" class="form-control" value="<?php echo $social_links['linkedin']; ?>">
                        </div>
                     </div>
                  </div>
               
               </div>
               </div> -->
            <!--   <div class="tab-pane" id="payment_info">
               <div class="row">
                  <div class="col-12">
                     <?php $payment_gateways = $this->db->get('payment_gateways')->result_array();
                  foreach($payment_gateways as $key => $payment_gateway):
                  $keys = json_decode($payment_gateway['keys'], true);
                  $user_keys = !empty($user_data['payment_keys']) ? json_decode($user_data['payment_keys'], true) : [];
                  ?>
                     <div class="<?php if($payment_gateway['status'] != 1 || !addon_status($payment_gateway['identifier']) && $payment_gateway['is_addon'] == 1) echo 'd-none'; ?>">
                        <h4><?php echo get_phrase($payment_gateway['title']); ?></h4>
                        <?php foreach($keys as $index => $value):
                  if(array_key_exists($payment_gateway['identifier'], $user_keys)){
                      if(array_key_exists($index, $user_keys[$payment_gateway['identifier']])){
                          $value = $user_keys[$payment_gateway['identifier']][$index];
                      }else{
                          $value = '';
                      }
                  }else{
                      $value = '';
                  }
                  ?>
                        <div class="form-group row mb-3">
                           <label class="col-md-3 col-form-label" for="<?php echo $payment_gateway['identifier'].$index; ?>"> <?php echo get_phrase($index); ?></label>
                           <div class="col-md-9">
                              <input type="text" id="<?php echo $payment_gateway['identifier'].$index; ?>" name="gateways[<?php echo $payment_gateway['identifier']; ?>][<?php echo $index; ?>]" value="<?php echo $value; ?>" class="form-control">
                              <small><?php echo get_phrase("required_for_instructor"); ?></small>
                           </div>
                        </div>
                        <?php endforeach; ?>
                        <hr>
                     </div>
                     <?php endforeach; ?>
                  </div>
               </div>
               
               </div>
               <div class="tab-pane" id="finish">
               <div class="row">
                  <div class="col-12">
                     <div class="text-center">
                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                        <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>
                        <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_just_one_click_away'); ?></p>
                        <div class="mb-3">
                           <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
                        </div>
                     </div>
                  </div>
                  
               </div>
               </div>
               <ul class="list-inline mb-0 wizard text-center">
               <li class="previous list-inline-item">
                  <a href="javascript:;" class="btn badge-primary-lighten"> <i class="dripicons-chevron-left"></i> </a>
               </li>
               <li class="next list-inline-item">
                  <a href="javascript:;" class="btn badge-primary-lighten"> <i class="dripicons-chevron-right"></i> </a>
               </li>
               </ul>
               </div>
               </div>
               
               </form> -->
            <!-----------NEW FORM----------->
            <form class="required-form" action="<?php echo site_url('admin/users/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
               <!-- 1. Basic Information -->
               <h4><?php echo get_phrase('basic_information'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="first_name"><?php echo get_phrase('first_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $user_data['first_name']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="middle_name"><?php echo get_phrase('middle_name'); ?> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="middle_name" name="middle_name" value="<?php echo $user_data['middle_name']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="last_name"><?php echo get_phrase('last_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $user_data['last_name']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="title"><?php echo get_phrase('a_short_title_about_yourself'); ?> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="title" name="title" value="<?php echo $user_data['title']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                  <div class="col-md-9">
                     <textarea name="biography" id = "summernote-basic" class="form-control"><?php echo $user_data['biography']; ?></textarea>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('Phone'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['phone']; ?>" id="phone" name="phone">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="address"><?php echo get_phrase('address'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['address']; ?>" id="address" name="address">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="address_line_2"><?php echo get_phrase('address_line_2'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['address_2']; ?>" id="address_2" name="address_2">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="city"><?php echo get_phrase('city'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['city']; ?>" id="city" name="city">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="state"><?php echo get_phrase('state'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['state']; ?>" id="state" name="state">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="zipcode"><?php echo get_phrase('zipcode'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['zipcode']; ?>" id="zipcode" name="zipcode">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="country"><?php echo get_phrase('country'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" value="<?php echo $user_data['country']; ?>" id="country" name="country">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="user_image"><?php echo get_phrase('user_image'); ?></label>
                  <div class="col-md-9">
                     <div class="d-flex">
                        <div class="">
                           <img class = "rounded-circle img-thumbnail" src="<?php echo $this->user_model->get_user_image_url($user_data['id']);?>" alt="" style="height: 50px; width: 50px;">
                        </div>
                        <div class="flex-grow-1 mt-1 pl-3">
                           <div class="input-group">
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" name = "user_image" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                 <label class="custom-file-label ellipsis" for="user_image"><?php echo get_phrase('choose_user_image'); ?></label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <h4><?php echo get_phrase('parent_information'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="mother_first_name"><?php echo get_phrase('mother_first_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="mother_first_name" name="m_fname" value="<?php echo $user_data['m_fname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="mother_middle_name"><?php echo get_phrase('mother_middle_name'); ?> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="mother_middle_name" name="m_middle_name" value="<?php echo $user_data['m_middle_name']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="mother_last_name"><?php echo get_phrase('mother_last_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="mother_last_name" name="m_lname" value="<?php echo $user_data['m_lname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="mother_title"><?php echo get_phrase('a_short_title_about_your_mother'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="mother_title" name="m_title" value="<?php echo $user_data['m_title']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="father_first_name"><?php echo get_phrase('father_first_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="father_first_name" name="f_fname" value="<?php echo $user_data['f_fname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="father_middle_name"><?php echo get_phrase('father_middle_name'); ?> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="father_middle_name" name="f_middle_name" value="<?php echo $user_data['f_middle_name']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="father_last_name"><?php echo get_phrase('father_last_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="father_last_name" name="f_lname" value="<?php echo $user_data['f_lname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="father_title"><?php echo get_phrase('a_short_title_about_your_father'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="father_title" name="f_title" value="<?php echo $user_data['f_title']; ?>" required>
                  </div>
               </div>
               <h4><?php echo get_phrase('sibling_details'); ?></h4>
               <div id="sibling-container">
                  <?php
                     $siblingIndex = 0;
                     if (!empty($siblings)) {
                         foreach ($siblings as $index => $sibling): ?>
                  <div class="mb-3 border p-3 rounded sibling-row">
                     <div class="form-group mb-2">
                        <label>First Name</label>
                        <input type="text" name="sibling[<?= $index ?>][name]" class="form-control" value="<?= $sibling['name'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Middle Name</label>
                        <input type="text" name="sibling[<?= $index ?>][middle_name]" class="form-control" value="<?= $sibling['middle_name'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input type="text" name="sibling[<?= $index ?>][lastname]" class="form-control" value="<?= $sibling['lastname'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Date of Birth</label>
                        <input type="date" name="sibling[<?= $index ?>][dob]" class="form-control" value="<?= $sibling['dob'] ?>" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[<?= $index ?>][gender]" value="Male" <?= ($sibling['gender'] == 'Male') ? 'checked' : '' ?>>
                           <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[<?= $index ?>][gender]" value="Female" <?= ($sibling['gender'] == 'Female') ? 'checked' : '' ?>>
                           <label class="form-check-label">Female</label>
                        </div>
                     </div>
                     <button type="button" class="btn btn-danger btn-sm remove-sibling">Remove</button>
                  </div>
                  <?php
                     endforeach;
                     } else {
                     // Show one empty row if no sibling data exists
                     ?>
                  <div class="mb-3 border p-3 rounded sibling-row">
                     <div class="form-group mb-2">
                        <label>First Name</label>
                        <input type="text" name="sibling[0][name]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Middle Name</label>
                        <input type="text" name="sibling[0][middle_name]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Last Name</label>
                        <input type="text" name="sibling[0][lastname]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Date of Birth</label>
                        <input type="date" name="sibling[0][dob]" class="form-control" required>
                     </div>
                     <div class="form-group mb-2">
                        <label>Gender</label><br>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[0][gender]" value="Male">
                           <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="sibling[0][gender]" value="Female">
                           <label class="form-check-label">Female</label>
                        </div>
                     </div>
                     <button type="button" class="btn btn-danger btn-sm remove-sibling">Remove</button>
                  </div>
                  <?php } ?>
               </div>
               <button type="button" class="btn btn-primary mt-3" id="add-sibling">Add More</button>
               <h4><?php echo get_phrase('login_credentials'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="email"> <?php echo get_phrase('email'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                  </div>
               </div>
               <h4><?php echo get_phrase('tuition_details'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="tuition_type">
                  <?php echo get_phrase('tuition_type'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $tuition_options = [
                               "Group class",
                               "1 on 1",
                               "Summer school",
                               "Intensive weeklong Subject"
                           ];
                           
                           foreach ($tuition_options as $option):
                           ?>
                        <label class="form-check-label me-4">
                        <input class="form-check-input checkbox-group"
                           type="radio"
                           name="tuition_type"
                           value="<?= $option ?>"
                           <?= ($tuition_type == $option) ? 'checked' : '' ?>>
                        <?= $option ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="student_subjects">
                  <?php echo get_phrase('subject_choice'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $all_subjects = ['English', 'Maths', 'Science', 'French', 'Spanish'];
                           foreach ($all_subjects as $subject):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           name="student_subjects[]"
                           value="<?= $subject ?>"
                           type="checkbox"
                           <?= (in_array($subject, $student_subjects)) ? 'checked' : '' ?>>
                        <?= $subject ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="school_term_time">
                  <?php echo get_phrase('school_term_days_and_times'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $all_school_term_times = [
                               'Monday 4pm - 6pm', 'Monday 5pm - 7pm',
                               'Tuesday 4pm - 6pm', 'Tuesday 5pm - 7pm',
                               'Wednesday 4pm - 6pm', 'Wednesday 5pm - 7pm',
                               'Thursday 4pm - 6pm', 'Thursday 5pm - 7pm',
                               'Friday 4pm - 6pm', 'Friday 5pm - 7pm',
                               'Saturday 11am - 1pm', 'Saturday 1pm - 3pm'
                           ];
                           foreach ($all_school_term_times as $time):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           name="school_term_time[]"
                           value="<?= $time ?>"
                           type="checkbox"
                           <?= (in_array($time, $school_term_times)) ? 'checked' : '' ?>>
                        <?= $time ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="half_term_days">
                  <?php echo get_phrase('half_term_days'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $week_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                           foreach ($week_days as $day):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           type="checkbox"
                           value="<?= $day ?>"
                           name="half_term_days[]"
                           <?= (in_array($day, $half_term_days)) ? 'checked' : '' ?>>
                        <?= $day ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="summer_term_days">
                  <?php echo get_phrase('summer_school_days'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $summer_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                           foreach ($summer_days as $day):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           type="checkbox"
                           name="summer_term_days[]"
                           value="<?= $day ?>"
                           <?= (in_array($day, $summer_term_days)) ? 'checked' : '' ?>>
                        <?= $day ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="fee_subscription">
                  <?php echo get_phrase('fees_subscription'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="row flex-column flex-lg-row">
                        <?php
                           $fee_options = [
                               "£25.00 - Pay as you Go (per session)",
                               "£150.00 - Monthly - school term (2h per week per subject)",
                               "£225.00 - Monthly - school term (3h per week - English / Maths / Science)",
                               "£25.00 - Summer School Half Day PAYG",
                               "£120.00 - Summer School Half Day (weekly)",
                               "£45.00 - Summer School Full Day PAYG",
                               "£200.00 - Summer School Full Day PAYG",
                               "£250.00 - Summer School Weeklong Intensive Subject (full day 9am - 6pm)"
                           ];
                           
                           $chunks = array_chunk($fee_options, ceil(count($fee_options) / 2));
                           foreach ($chunks as $chunk):
                           ?>
                        <div class="col-lg-12 mb-2">
                           <div class="d-flex flex-column gap-2 py-1">
                              <?php foreach ($chunk as $option): ?>
                              <label class="form-check-label">
                              <input class="form-check-input checkbox-group"
                                 type="checkbox"
                                 name="fee_subscription[]"
                                 value="<?= $option ?>"
                                 <?= (in_array($option, $fee_subscription)) ? 'checked' : '' ?>>
                              <?= $option ?>
                              </label>
                              <?php endforeach; ?>
                           </div>
                        </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <h4><?php echo get_phrase('medical_history'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="emergency_first_name"><?php echo get_phrase('emergency_first_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="emergency_first_name" name="e_fname" value="<?php echo $user_data['e_fname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="emergency_last_name"><?php echo get_phrase('emergency_last_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="emergency_last_name" name="e_lname" value="<?php echo $user_data['e_lname']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="emergency_contact_number"><?php echo get_phrase('emergency_contact_number'); ?></label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="emergency_contact_number" name="e_contact" value="<?php echo $user_data['e_contact']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="GP_name"><?php echo get_phrase('GP_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="GP_name" name="gp_name" value="<?php echo $user_data['gp_name']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="emergency_address"><?php echo get_phrase('emergency_address'); ?> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="emergency_address" name="e_add1" value="<?php echo $user_data['e_add1']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="emergency_address_line_2"><?php echo get_phrase('emergency_address_line_2'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="emergency_address_line_2" name="e_add2" value="<?php echo $user_data['e_add2']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="City"><?php echo get_phrase('City'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="City" name="e_city" value="<?php echo $user_data['e_city']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="State"><?php echo get_phrase('State'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="State" name="e_state" value="<?php echo $user_data['e_state']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="Zipcode"><?php echo get_phrase('Zipcode'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="Zipcode" name="e_zipcode" value="<?php echo $user_data['e_zipcode']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="Country"><?php echo get_phrase('Country'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="Country" name="e_country" value="<?php echo $user_data['e_country']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="Phone"><?php echo get_phrase('Phone'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="Phone" name="e_contact" value="<?php echo $user_data['e_contact']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="Email"><?php echo get_phrase('Email'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="Email" name="e_email" value="<?php echo $user_data['e_email']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="have_any_medical_condition"><?php echo get_phrase('have_any_medical_condition?'); ?></label>
                  <div class="col-md-9">
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input medical-condition-radio" id="condition_yes" name="is_medical_condition" value="1"
                           <?php if ($user_data['is_medical_condition'] == 1) echo 'checked'; ?> required>
                        <label class="form-check-label" for="condition_yes">Yes</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input medical-condition-radio" id="condition_no" name="is_medical_condition" value="0"
                           <?php if ($user_data['is_medical_condition'] == 0) echo 'checked'; ?> required>
                        <label class="form-check-label" for="condition_no">No</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3 medical-condition-details">
                  <label class="col-md-3 col-form-label" for="type_of_medical_condition">
                  <?php echo get_phrase('type_of_medical_condition'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="type_of_medical_condition" name="type_of_condition" value="<?php echo $user_data['type_of_condition']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="have_special_education"><?php echo get_phrase('have_special_education?'); ?></label>
                  <div class="col-md-9">
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input special-education-radio" id="education_yes" name="is_special_education" value="1"
                           <?php if ($user_data['is_special_education'] == 1) echo 'checked'; ?> required>
                        <label class="form-check-label" for="education_yes">Yes</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input special-education-radio" id="education_no" name="is_special_education" value="0"
                           <?php if ($user_data['is_special_education'] == 0) echo 'checked'; ?> required>
                        <label class="form-check-label" for="education_no">No</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="legal_guardian_name"><?php echo get_phrase('legal_guardian_name'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <div class="row ">
                        <div class="col-lg-4">
                           <input type="text" name="guardian_fname"  value="<?php echo $user_data['guardian_fname']; ?>"  class="form-control required text-secondary" placeholder="First">
                        </div>
                        <div class="col-lg-4">
                           <input type="text" name="guardian_middle_name"  value="<?php echo $user_data['guardian_middle_name']; ?>" class="form-control" placeholder="Middle">
                        </div>
                        <div class="col-lg-4">
                           <input type="text" name="guardian_lname"  value="<?php echo $user_data['guardian_lname']; ?>" class="form-control required text-secondary" placeholder="Last">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="date_of_registration"><?php echo get_phrase('date_of_registration'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="date_of_registration" name="reg_date" value="<?php echo $user_data['reg_date']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="signature"><?php echo get_phrase('signature'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" class="form-control" id="signature" name="signature" value="<?php echo $user_data['signature']; ?>" required>
                  </div>
               </div>
               <h4><?php echo get_phrase('social_information'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="facebook_link"> <?php echo get_phrase('facebook'); ?></label>
                  <div class="col-md-9">
                     <input type="text" id="facebook_link" name="facebook_link" class="form-control" value="<?php echo $social_links['facebook']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="twitter_link"><?php echo get_phrase('twitter'); ?></label>
                  <div class="col-md-9">
                     <input type="text" id="twitter_link" name="twitter_link" class="form-control" value="<?php echo $social_links['twitter']; ?>">
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('linkedin'); ?></label>
                  <div class="col-md-9">
                     <input type="text" id="linkedin_link" name="linkedin_link" class="form-control" value="<?php echo $social_links['linkedin']; ?>">
                  </div>
               </div>
               <h4><?php echo get_phrase('payment_information'); ?></h4>
               <?php $payment_gateways = $this->db->get('payment_gateways')->result_array();
                  foreach($payment_gateways as $key => $payment_gateway):
                  $keys = json_decode($payment_gateway['keys'], true);
                  $user_keys = !empty($user_data['payment_keys']) ? json_decode($user_data['payment_keys'], true) : [];
                  ?>
               <div class="<?php if($payment_gateway['status'] != 1 || !addon_status($payment_gateway['identifier']) && $payment_gateway['is_addon'] == 1) echo 'd-none'; ?>">
                  <h4><?php echo get_phrase($payment_gateway['title']); ?></h4>
                  <?php foreach($keys as $index => $value):
                     if(array_key_exists($payment_gateway['identifier'], $user_keys)){
                         if(array_key_exists($index, $user_keys[$payment_gateway['identifier']])){
                             $value = $user_keys[$payment_gateway['identifier']][$index];
                         }else{
                             $value = '';
                         }
                     }else{
                         $value = '';
                     }
                     ?>
                  <div class="form-group row mb-3">
                     <label class="col-md-3 col-form-label" for="<?php echo $payment_gateway['identifier'].$index; ?>"> <?php echo get_phrase($index); ?></label>
                     <div class="col-md-9">
                        <input type="text" id="<?php echo $payment_gateway['identifier'].$index; ?>" name="gateways[<?php echo $payment_gateway['identifier']; ?>][<?php echo $index; ?>]" value="<?php echo $value; ?>" class="form-control">
                        <!-- <small><?php echo get_phrase("required_for_instructor"); ?></small> -->
                     </div>
                  </div>
                  <?php endforeach; ?>
                  <hr>
               </div>
               <?php endforeach; ?>
               <div class="text-center">
                  <div class="mb-3">
                     <button type="button" class="btn btn-primary" onclick="checkRequiredFields()" name="button"><?php echo get_phrase('submit'); ?></button>
                  </div>
               </div>
            </form>
         </div>
         <!-- end card-body -->
      </div>
      <!-- end card-->
   </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
       const scrollContainer = document.querySelector('.wizard-nav-scroll ul.nav');
       const scrollLeftBtn = document.querySelector('.scroll-left');
       const scrollRightBtn = document.querySelector('.scroll-right');
   
       const scrollAmount = 150;
   
       scrollLeftBtn.addEventListener('click', function () {
           scrollContainer.scrollBy({
               left: -scrollAmount,
               behavior: 'smooth'
           });
       });
   
       scrollRightBtn.addEventListener('click', function () {
           scrollContainer.scrollBy({
               left: scrollAmount,
               behavior: 'smooth'
           });
       });
   });
   $(document).ready(function () {
    function toggleMedicalConditionDetails() {
      const isCondition = $('input[name="is_medical_condition"]:checked').val();
      if (isCondition === "1") {
        $('.medical-condition-details').slideDown();
      } else {
        $('.medical-condition-details').slideUp();
      }
    }
   
    // Run on page load
    toggleMedicalConditionDetails();
   
    // Bind change event to radio buttons
    $('input[name="is_medical_condition"]').on('change', toggleMedicalConditionDetails);
   });
   
   let siblingIndex = <?= count($siblings) ?: 1 ?>;
   
   $('#add-sibling').on('click', function () {
   const row = `
   <div class="mb-3 border p-3 rounded sibling-row">
      <div class="form-group mb-2">
         <label>First Name</label>
         <input type="text" name="sibling[${siblingIndex}][name]" class="form-control" required>
      </div>
      <div class="form-group mb-2">
         <label>Middle Name</label>
         <input type="text" name="sibling[${siblingIndex}][middle_name]" class="form-control" required>
      </div>
      <div class="form-group mb-2">
         <label>Last Name</label>
         <input type="text" name="sibling[${siblingIndex}][lastname]" class="form-control" required>
      </div>
      <div class="form-group mb-2">
         <label>Date of Birth</label>
         <input type="date" name="sibling[${siblingIndex}][dob]" class="form-control" required>
      </div>
      <div class="form-group mb-2">
         <label>Gender</label><br>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sibling[${siblingIndex}][gender]" value="Male">
            <label class="form-check-label">Male</label>
         </div>
         <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sibling[${siblingIndex}][gender]" value="Female">
            <label class="form-check-label">Female</label>
         </div>
      </div>
      <button type="button" class="btn btn-danger btn-sm remove-sibling">Remove</button>
   </div>`;
   $('#sibling-container').append(row);
   siblingIndex++;
   });
   
   $(document).on('click', '.remove-sibling', function () {
   $(this).closest('.sibling-row').remove();
   });
</script>
