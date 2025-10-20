<style type="text/css">
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
   // ini_set('display_errors', 1);
   // ini_set('display_startup_errors', 1);
   // error_reporting(E_ALL);
       $user_data = $this->db->get_where('users', array('id' => $user_id))->row_array();
       // echo"<pre>";
       // print_r($user_data);
       // die;
       $social_links = !empty($user_data['social_links']) ? json_decode($user_data['social_links'], true) : [];
   $payment_keys = !empty($user_data['payment_keys']) ? json_decode($user_data['payment_keys'], true) : [];
   
   // Avoid undefined index warnings:
   $paypal_keys = isset($payment_keys['paypal']) ? $payment_keys['paypal'] : [];
   $stripe_keys = isset($payment_keys['stripe']) ? $payment_keys['stripe'] : [];
   $razorpay_keys = isset($payment_keys['razorpay']) ? $payment_keys['razorpay'] : [];
   $document_types = isset($payment_keys['documents']) ? $payment_keys['documents'] : [];
   $availability_of_work = isset($payment_keys['availability_of_work']) ? $payment_keys['availability_of_work'] : [];
   $employment_details = isset($payment_keys['employment_details']) ? $payment_keys['employment_details'] : [];
   $educational_background = isset($payment_keys['educational_background']) ? $payment_keys['educational_background'] : [];
   
   ?>
<div class="row ">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-body">
            <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
         </div>
         <!-- end card body-->
      </div>
      <!-- end card -->
   </div>
   <!-- end col-->
</div>
<div class="row">
   <div class="col-xl-12">
      <div class="card">
         <div class="card-body">
            <h4 class="header-title mb-3"><?php echo get_phrase('instructor_edit_form'); ?></h4>
            <!--------------------------OLD FORM---------------------->
            <!-- <form class="required-form" action="<?php echo site_url('admin/instructors/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
               <div id="progressbarwizard">
                                <div class="wizard-nav-wrapper position-relative">
                                   
                                   <button class="scroll-btn scroll-left" type="button">‹</button>
                                  
                                   <div class="wizard-nav-scroll">
                                      <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                         <li class="nav-item">
                                            <a href="#basic_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-face-profile mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('basic_info'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#login_credentials" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-lock mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('login_credentials'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#employment_application" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-file-document-outline  mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('employment_application'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#employment_details" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-briefcase-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('employment_details'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#educational_background" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-book-open-variant mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('educational_background'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#social_information" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-wifi mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('social_information'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#payment_info" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-currency-eur mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('payment_info'); ?></span>
                                            </a>
                                         </li>
                                         <li class="nav-item">
                                            <a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                            <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                            <span class="d-none d-sm-inline"><?php echo get_phrase('finish'); ?></span>
                                            </a>
                                         </li>
                                      </ul>
                                   </div>
                                   
                                   <button class="scroll-btn scroll-right" type="button">›</button>
                                </div>
                                <div class="tab-content b-0 mb-0">
                                   <div id="bar" class="progress mb-3" style="height: 7px;">
                                      <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                   </div>
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
                                               <label class="col-md-3 col-form-label"><?php echo get_phrase('Subject'); ?></label>
                                               <div class="col-md-9">
                                                  <textarea rows="5" id="teacher_subjects" class="form-control" name="teacher_subjects" placeholder="<?php echo get_phrase('Subject'); ?>"><?php echo $user_data['teacher_subjects']; ?></textarea>
                                               </div>
                                            </div>
                                           <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="skills"><?php echo get_phrase('skills'); ?></label>
                                               <div class="col-md-9">
                                                   <input type="text" class="form-control bootstrap-tag-input" id = "skills" name="skills" data-role="tagsinput" style="width: 100%;" value="<?php echo $user_data['skills'];  ?>"/>
                                                   <small class="text-muted"><?php echo get_phrase('write_your_skill_and_click_the_enter_button'); ?></small>
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
                                      
                                   </div>
                                   <div class="tab-pane" id="employment_application">
                                      <div class="row">
                                         <div class="col-12">
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="position_apply_for"> <?php echo get_phrase('poistion_apply_for'); ?> <span class="required">*</span> </label>
                                               <div class="col-md-9">
                                                  <input type="text" id="postion_apply_for" name="position_apply_for" class="form-control" value="<?php echo $user_data['position_apply_for']; ?>" required>
                                               </div>
                                            </div>
                                            <?php
                  $selected = $user_data['right_to_work'] ?? null; // Should be 1 or 0 from DB
                  ?>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="right_to_work">
                                               <?php echo get_phrase('right_to_work_in_UK?'); ?>
                                               </label>
                                               <div class="col-md-9 d-flex gap-3 align-items-center">
                                                  <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="right_to_work" id="right_to_work_yes" value="1"
                                                        <?= ($selected == 1) ? 'checked' : '' ?>>
                                                     <label class="form-check-label" for="right_to_work_yes">Yes</label>
                                                  </div>
                                                  <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="right_to_work" id="right_to_work_no" value="0"
                                                        <?= ($selected == 0) ? 'checked' : '' ?>>
                                                     <label class="form-check-label" for="right_to_work_no">No</label>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="proof_of_right"> <?php echo get_phrase('proof_of_right'); ?> <span class="required">*</span> </label>
                                               <div class="col-md-9">
                                                  <input type="email" id="proof_of_right" name="proof_of_right" class="form-control" value="<?php echo $user_data['proof_of_right']; ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">
                                               <?php echo get_phrase('is_qualified_teacher'); ?>
                                               </label>
                                               <div class="col-md-9">
                                                  <?php $selected = trim($user_data['is_qualified_teacher']); ?>
                                                  <div class="form-check mb-1">
                                                     <input class="form-check-input" type="radio" name="is_qualified_teacher" id="primary" value="Primary Only"
                                                        <?php echo ($selected === 'Primary Only') ? 'checked' : ''; ?>>
                                                     <label class="form-check-label" for="primary">Primary Only</label>
                                                  </div>
                                                  <div class="form-check mb-1">
                                                     <input class="form-check-input" type="radio" name="is_qualified_teacher" id="secondary" value="Secondary Only"
                                                        <?php echo ($selected === 'Secondary Only') ? 'checked' : ''; ?>>
                                                     <label class="form-check-label" for="secondary">Secondary Only</label>
                                                  </div>
                                                  <div class="form-check mb-1">
                                                     <input class="form-check-input" type="radio" name="is_qualified_teacher" id="gcse" value="GCSEs and A-levels"
                                                        <?php echo ($selected === 'GCSEs and A-levels') ? 'checked' : ''; ?>>
                                                     <label class="form-check-label" for="gcse">GCSEs and A-levels</label>
                                                  </div>
                                                  <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="is_qualified_teacher" id="all" value="All levels"
                                                        <?php echo ($selected === 'All levels') ? 'checked' : ''; ?>>
                                                     <label class="form-check-label" for="all">All levels</label>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="documents">
                                               <?php echo get_phrase('documents_types'); ?> <span class="required">*</span>
                                               </label>
                                               <div class="col-md-9">
                                                  <div class="d-flex flex-wrap gap-3 py-2">
                                                     <?php
                  $all_documents = [
                    'Passport',
                    'Any other photographic ID',
                    'Biometric residency permit',
                    'Proof of address (bank statement or utility bill)',
                    'DBS check',
                    'Teaching qualifications',
                    'Educational transcript(s) or Diplomas',
                    'Recent CV'
                  ];
                  
                  // Decode stored values
                  $document_types = !empty($user_data['documents']) ? json_decode($user_data['documents'], true) : [];
                  
                  foreach ($all_documents as $doc):
                  ?>
                                                     <label class="form-check-label me-3">
                                                     <input class="form-check-input checkbox-group"
                                                        name="documents[]"
                                                        value="<?= htmlspecialchars($doc) ?>"
                                                        type="checkbox"
                                                        <?= (in_array($doc, $document_types)) ? 'checked' : '' ?>>
                                                     <?= htmlspecialchars($doc) ?>
                                                     </label>
                                                     <?php endforeach; ?>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="documents_path">
                                               <?php echo get_phrase('document'); ?> <span class="required">*</span>
                                               </label>
                                               <div class="col-md-9">
                                                  <input type="file"
                                                     id="documents_path"
                                                     name="documents_path"
                                                     class="form-control"
                                                     accept=".pdf,.csv,.xls,.xlsx,.doc,.docx" />
                                                  <?php if (!empty($user_data['documents_path'])): ?>
                                                  <div class="mt-2">
                                                     <?php
                  $file = 'uploads/document/' . $user_data['documents_path'];
                  $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                  ?>
                                                     <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                                     <img src="<?= base_url($file) ?>" alt="Document Image" style="max-width: 200px;">
                                                     <?php else: ?>
                                                     <a href="<?= base_url($file) ?>" target="_blank"><?= $user_data['documents_path']; ?></a>
                                                     <?php endif; ?>
                                                  </div>
                                                  <?php endif; ?>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="documents">
                                               <?php echo get_phrase('available_days'); ?> <span class="required">*</span>
                                               </label>
                                               <div class="col-md-9">
                                                  <div class="d-flex flex-wrap gap-3 py-2">
                                                     <?php
                  $availability_options = [
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                  ];
                  
                  // Decode stored values from DB
                  $available_times = !empty($user_data['availability_of_work']) ? json_decode($user_data['availability_of_work'], true) : [];
                  
                  foreach ($availability_options as $option):
                  ?>
                                                     <label class="form-check-label me-3">
                                                     <input class="form-check-input checkbox-group"
                                                        name="availability_of_work[]"
                                                        value="<?= htmlspecialchars($option) ?>"
                                                        type="checkbox"
                                                        <?= (in_array($option, $available_times)) ? 'checked' : '' ?>>
                                                     <?= htmlspecialchars($option) ?>
                                                     </label>
                                                     <?php endforeach; ?>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label" for="documents2_path">
                                               <?php echo get_phrase('additional_document'); ?> <span class="required">*</span>
                                               </label>
                                               <div class="col-md-9">
                                                  <input type="file"
                                                     id="documents2_path"
                                                     name="documents2_path"
                                                     class="form-control"
                                                     accept=".pdf,.csv,.xls,.xlsx,.doc,.docx" />
                                                  <?php if (!empty($user_data['documents2_path'])): ?>
                                                  <div class="mt-2">
                                                     <?php
                  $file2 = 'uploads/document/' . $user_data['documents2_path'];
                  $ext2 = strtolower(pathinfo($file2, PATHINFO_EXTENSION));
                  ?>
                                                     <?php if (in_array($ext2, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                                                     <img src="<?= base_url($file2) ?>" alt="Document Image" style="max-width: 200px;">
                                                     <?php else: ?>
                                                     <a href="<?= base_url($file2) ?>" target="_blank"><?= $user_data['documents2_path']; ?></a>
                                                     <?php endif; ?>
                                                  </div>
                                                  <?php endif; ?>
                                               </div>
                                            </div>
                                         </div>
                                         
                                      </div>
                                   
                                   </div>
                                   <?php
                  $employment_details = json_decode($user_data['employment_details'], true);
                  ?>
                                   <div class="tab-pane" id="employment_details">
                                      <div class="row">
                                         <div class="col-12">
                                            
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Most recent employer name <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="employment_details[]" class="form-control" 
                                                     value="<?= $employment_details[0] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Most recent position held <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[1] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Another recent employer name <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[2] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Is this a current employer? <span class="required">*</span></label>
                                               <div class="col-md-9 d-flex align-items-center gap-3">
                                                  <div class="form-check me-3">
                                                     <input class="form-check-input" type="radio" name="employment_details[3]" value="1"
                                                        <?= ($employment_details[3] ?? '') === '1' ? 'checked' : '' ?>>
                                                     <label class="form-check-label">Yes</label>
                                                  </div>
                                                  <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="employment_details[3]" value="0"
                                                        <?= ($employment_details[3] ?? '') === '0' ? 'checked' : '' ?>>
                                                     <label class="form-check-label">No</label>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Most recent position held <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[4] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Phone <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="number" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[5] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Email <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="email" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[6] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Reference name(s) <span class="required">*</span></label>
                                               <div class="col-md-4">
                                                  <input type="text" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[7] ?? '' ?>" required>
                                               </div>
                                               <div class="col-md-4">
                                                  <input type="text" name="employment_details[]" class="form-control"
                                                     value="<?= $employment_details[8] ?? '' ?>">
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <?php
                  $educational_background = json_decode($user_data['educational_background'], true);
                  ?>
                                   <div class="tab-pane" id="educational_background">
                                      <div class="row">
                                         <div class="col-12">
                                           
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Did you complete your secondary education in the UK? <span class="required">*</span></label>
                                               <div class="col-md-9 d-flex align-items-center gap-3">
                                                  <div class="form-check me-3">
                                                     <input class="form-check-input" type="radio" name="educational_background[0]" value="1"
                                                        <?= ($educational_background[0] ?? '') === '1' ? 'checked' : '' ?>>
                                                     <label class="form-check-label">Yes</label>
                                                  </div>
                                                  <div class="form-check">
                                                     <input class="form-check-input" type="radio" name="educational_background[0]" value="0"
                                                        <?= ($educational_background[0] ?? '') === '0' ? 'checked' : '' ?>>
                                                     <label class="form-check-label">No</label>
                                                  </div>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Highest level of education held <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="educational_background[1]" class="form-control" placeholder="Highest level of education"
                                                     value="<?= $educational_background[1] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Name of most recent education provider <span class="required">*</span></label>
                                               <div class="col-md-9">
                                                  <input type="text" name="educational_background[2]" class="form-control" placeholder="Provider name"
                                                     value="<?= $educational_background[2] ?? '' ?>" required>
                                               </div>
                                            </div>
                                            
                                            <div class="form-group row mb-3">
                                               <label class="col-md-3 col-form-label">Additional details (e.g., department)</label>
                                               <div class="col-md-9">
                                                  <input type="text" name="educational_background[3]" class="form-control" placeholder="Department / Course"
                                                     value="<?= $educational_background[3] ?? '' ?>">
                                               </div>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                   <div class="tab-pane" id="social_information">
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
                                      
                                   </div>
                                   <div class="tab-pane" id="payment_info">
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
                                   <ul class="list-inline mb-0 wizard">
                                      <li class="previous list-inline-item">
                                         <a href="javascript:;" class="btn btn-info">Previous</a>
                                      </li>
                                      <li class="next list-inline-item float-right">
                                         <a href="javascript:;" class="btn btn-info">Next</a>
                                      </li>
                                   </ul>
                                </div>
                              
                             </div>
               </form> -->
            <!--------------------NEW FORM---------------->
            <form class="required-form" action="<?php echo site_url('admin/instructors/edit/'.$user_id); ?>" enctype="multipart/form-data" method="post">
               <h4><?php echo get_phrase('basic_info'); ?></h4>
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
                  <label class="col-md-3 col-form-label"><?php echo get_phrase('Subject'); ?></label>
                  <div class="col-md-9">
                     <textarea rows="5" id="teacher_subjects" class="form-control" name="teacher_subjects" placeholder="<?php echo get_phrase('Subject'); ?>"><?php echo $user_data['teacher_subjects']; ?></textarea>
                  </div>
               </div>
               <!--  <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="skills"><?php echo get_phrase('skills'); ?></label>
                  <div class="col-md-9">
                      <input type="text" class="form-control bootstrap-tag-input" id = "skills" name="skills" data-role="tagsinput" style="width: 100%;" value="<?php echo $user_data['skills'];  ?>"/>
                      <small class="text-muted"><?php echo get_phrase('write_your_skill_and_click_the_enter_button'); ?></small>
                  </div>
                  </div>
                  <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="linkedin_link"><?php echo get_phrase('biography'); ?></label>
                  <div class="col-md-9">
                      <textarea name="biography" id = "summernote-basic" class="form-control"><?php echo $user_data['biography']; ?></textarea>
                  </div>
                  </div>
                  -->
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
               <!-- <div class="form-group row mb-3">
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
                  </div> -->
               <h4><?php echo get_phrase('login_credentials'); ?></h4>
               <div class="col-12">
                  <div class="form-group row mb-3">
                     <label class="col-md-3 col-form-label" for="email"> <?php echo get_phrase('email'); ?> <span class="required">*</span> </label>
                     <div class="col-md-9">
                        <input type="email" id="email" name="email" class="form-control" value="<?php echo $user_data['email']; ?>" required>
                     </div>
                  </div>
               </div>
               <h4><?php echo get_phrase('employment_application'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="position_apply_for"> <?php echo get_phrase('poistion_apply_for'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="text" id="postion_apply_for" name="position_apply_for" class="form-control" value="<?php echo $user_data['position_apply_for']; ?>" required>
                  </div>
               </div>
               <?php
                  $selected = $user_data['right_to_work'] ?? null; // Should be 1 or 0 from DB
                  ?>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="right_to_work">
                  <?php echo get_phrase('right_to_work_in_UK?'); ?>
                  </label>
                  <div class="col-md-9 d-flex gap-3 align-items-center">
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="right_to_work" id="right_to_work_yes" value="1"
                           <?= ($selected == 1) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="right_to_work_yes">Yes</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="right_to_work" id="right_to_work_no" value="0"
                           <?= ($selected == 0) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="right_to_work_no">No</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="proof_of_right"> <?php echo get_phrase('proof_of_right'); ?> <span class="required">*</span> </label>
                  <div class="col-md-9">
                     <input type="email" id="proof_of_right" name="proof_of_right" class="form-control" value="<?php echo $user_data['proof_of_right']; ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">
                  <?php echo get_phrase('is_qualified_teacher'); ?>
                  </label>
                  <div class="col-md-9">
                     <?php $selected = trim($user_data['is_qualified_teacher']); ?>
                     <div class="form-check mb-1">
                        <input class="form-check-input" type="radio" name="is_qualified_teacher" id="primary" value="Primary Only"
                           <?php echo ($selected === 'Primary Only') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="primary">Primary Only</label>
                     </div>
                     <div class="form-check mb-1">
                        <input class="form-check-input" type="radio" name="is_qualified_teacher" id="secondary" value="Secondary Only"
                           <?php echo ($selected === 'Secondary Only') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="secondary">Secondary Only</label>
                     </div>
                     <div class="form-check mb-1">
                        <input class="form-check-input" type="radio" name="is_qualified_teacher" id="gcse" value="GCSEs and A-levels"
                           <?php echo ($selected === 'GCSEs and A-levels') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="gcse">GCSEs and A-levels</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_qualified_teacher" id="all" value="All levels"
                           <?php echo ($selected === 'All levels') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="all">All levels</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="documents">
                  <?php echo get_phrase('documents_types'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $all_documents = [
                             'Passport',
                             'Any other photographic ID',
                             'Biometric residency permit',
                             'Proof of address (bank statement or utility bill)',
                             'DBS check',
                             'Teaching qualifications',
                             'Educational transcript(s) or Diplomas',
                             'Recent CV'
                           ];
                           
                           // Decode stored values
                           $document_types = !empty($user_data['documents']) ? json_decode($user_data['documents'], true) : [];
                           
                           foreach ($all_documents as $doc):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           name="documents[]"
                           value="<?= htmlspecialchars($doc) ?>"
                           type="checkbox"
                           <?= (in_array($doc, $document_types)) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($doc) ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="documents_path">
                  <?php echo get_phrase('document'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <input type="file"
                        id="documents_path"
                        name="documents_path"
                        class="form-control"
                        accept=".pdf,.csv,.xls,.xlsx,.doc,.docx" />
                     <?php if (!empty($user_data['documents_path'])): ?>
                     <div class="mt-2">
                        <?php
                           $file = 'uploads/document/' . $user_data['documents_path'];
                           $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                           ?>
                        <?php if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                        <img src="<?= base_url($file) ?>" alt="Document Image" style="max-width: 200px;">
                        <?php else: ?>
                        <a href="<?= base_url($file) ?>" target="_blank"><?= $user_data['documents_path']; ?></a>
                        <?php endif; ?>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="documents">
                  <?php echo get_phrase('available_days'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <div class="d-flex flex-wrap gap-3 py-2">
                        <?php
                           $availability_options = [
                             'Monday',
                             'Tuesday',
                             'Wednesday',
                             'Thursday',
                             'Friday',
                             'Saturday'
                           ];
                           
                           // Decode stored values from DB
                           $available_times = !empty($user_data['availability_of_work']) ? json_decode($user_data['availability_of_work'], true) : [];
                           
                           foreach ($availability_options as $option):
                           ?>
                        <label class="form-check-label me-3">
                        <input class="form-check-input checkbox-group"
                           name="availability_of_work[]"
                           value="<?= htmlspecialchars($option) ?>"
                           type="checkbox"
                           <?= (in_array($option, $available_times)) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($option) ?>
                        </label>
                        <?php endforeach; ?>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label" for="documents2_path">
                  <?php echo get_phrase('additional_document'); ?> <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                     <input type="file"
                        id="documents2_path"
                        name="documents2_path"
                        class="form-control"
                        accept=".pdf,.csv,.xls,.xlsx,.doc,.docx" />
                     <?php if (!empty($user_data['documents2_path'])): ?>
                     <div class="mt-2">
                        <?php
                           $file2 = 'uploads/document/' . $user_data['documents2_path'];
                           $ext2 = strtolower(pathinfo($file2, PATHINFO_EXTENSION));
                           ?>
                        <?php if (in_array($ext2, ['jpg', 'jpeg', 'png', 'gif'])): ?>
                        <img src="<?= base_url($file2) ?>" alt="Document Image" style="max-width: 200px;">
                        <?php else: ?>
                        <a href="<?= base_url($file2) ?>" target="_blank"><?= $user_data['documents2_path']; ?></a>
                        <?php endif; ?>
                     </div>
                     <?php endif; ?>
                  </div>
               </div>
               <h4><?php echo get_phrase('employment_details'); ?></h4>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Most recent employer name <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="employment_details[]" class="form-control" 
                        value="<?= $employment_details[0] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Most recent position held <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[1] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Another recent employer name <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[2] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Is this a current employer? <span class="required">*</span></label>
                  <div class="col-md-9 d-flex align-items-center gap-3">
                     <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="employment_details[3]" value="1"
                           <?= ($employment_details[3] ?? '') === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label">Yes</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="employment_details[3]" value="0"
                           <?= ($employment_details[3] ?? '') === '0' ? 'checked' : '' ?>>
                        <label class="form-check-label">No</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Most recent position held <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[4] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Phone <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="number" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[5] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Email <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="email" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[6] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Reference name(s) <span class="required">*</span></label>
                  <div class="col-md-4">
                     <input type="text" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[7] ?? '' ?>" required>
                  </div>
                  <div class="col-md-4">
                     <input type="text" name="employment_details[]" class="form-control"
                        value="<?= $employment_details[8] ?? '' ?>">
                  </div>
               </div>
               <h4><?php echo get_phrase('educational_background'); ?></h4>
               <?php
                  $educational_background = json_decode($user_data['educational_background'], true);
                  ?>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Did you complete your secondary education in the UK? <span class="required">*</span></label>
                  <div class="col-md-9 d-flex align-items-center gap-3">
                     <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="educational_background[0]" value="1"
                           <?= ($educational_background[0] ?? '') === '1' ? 'checked' : '' ?>>
                        <label class="form-check-label">Yes</label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="educational_background[0]" value="0"
                           <?= ($educational_background[0] ?? '') === '0' ? 'checked' : '' ?>>
                        <label class="form-check-label">No</label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Highest level of education held <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="educational_background[1]" class="form-control" placeholder="Highest level of education"
                        value="<?= $educational_background[1] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Name of most recent education provider <span class="required">*</span></label>
                  <div class="col-md-9">
                     <input type="text" name="educational_background[2]" class="form-control" placeholder="Provider name"
                        value="<?= $educational_background[2] ?? '' ?>" required>
                  </div>
               </div>
               <div class="form-group row mb-3">
                  <label class="col-md-3 col-form-label">Additional details (e.g., department)</label>
                  <div class="col-md-9">
                     <input type="text" name="educational_background[3]" class="form-control" placeholder="Department / Course"
                        value="<?= $educational_background[3] ?? '' ?>">
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
               <h4><?php echo get_phrase('payment_info'); ?></h4>
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
</script>
