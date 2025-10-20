<?php $user_details = $this->user_model->get_all_user($this->session->userdata('user_id'))->row_array(); ?>
<?php
 $social_links = !empty($user_details['social_links']) ? json_decode($user_details['social_links'], true) : [];
 $sibling = !empty($user_details['sibling']) ? json_decode($user_details['sibling'], true) : [];
 $student_subjects = !empty($user_details['student_subjects']) ? json_decode($user_details['student_subjects'], true) : [];
   $school_term_times = !empty($user_details['school_term_time']) ? json_decode($user_details['school_term_time'], true) : [];
   $half_term_days = !empty($user_details['half_term_days']) ? json_decode($user_details['half_term_days'], true) : [];
   $summer_term_days = !empty($user_details['summer_term_days']) ? json_decode($user_details['summer_term_days'], true) : [];
   $fee_subscription = !empty($user_details['fee_subscription']) ? json_decode($user_details['fee_subscription'], true) : [];
    $tuition_type = !empty($user_details['tuition_type']) ? $user_details['tuition_type'] : '';
 ?>



<?php include "breadcrumb.php"; ?>

<!--------  Wish List body section start------>
<section class="wish-list-body message">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <?php include "profile_menus.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="profile">
                    <div class="profile-bg">
                        <!-- <img loading="lazy" src="<?php echo base_url('assets/frontend/default-new/img/profile-bg-2.jpg') ?>"> -->
                    </div>
                    <div class="profile-ful-body common-card">
                    

                        <div class="profile-input-section">
                            <div class="teacher_form">
                                <div class="tabs">
               <ul class="tab-links">
                  <li class="active">
                     <div>1</div>
                     <span><?php echo get_phrase('Student Details') ?></span>
                  </li>
                  <li>
                     <div>2</div>
                     <span><?php echo get_phrase('Parent(s) / Guardian(s) details') ?></span>
                  </li>
                  <li>
                     <div>3</div>
                     <span><?php echo get_phrase('Tuition details & fees') ?></span>
                  </li>
                  <li>
                     <div>4</div>
                     <span><?php echo get_phrase('Medical History') ?></span>
                  </li>
               </ul>
               <div class="tab-content">
                  
                  <form class="" action="<?php echo site_url('home/update_profile/update_basics'); ?>" method="post">
                     <div id="step1" class="tab active">
                        <h3>Student Details</h3>
                        <div class="form-data">
                           <label class="label_a"> Name* </label>
                           <div class="row m-0">
                              <div class="col-lg-3">
                                 <input type="text" name="title" class="form-control required" placeholder="Title" value="<?php echo $user_details['title']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" class="form-control"  name="first_name" value="<?php echo $user_details['first_name']; ?>" required>
                              </div>
                              <div class="col-lg-3">
                                 <input type="text"  name="middle_name" class="form-control" placeholder="Middle" value="<?php echo $user_details['title']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="last_name" class="form-control required" placeholder="Last" value="<?php echo $user_details['title']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Gender* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                           <label class="form-check-label">
                                              <input class="form-check-input required" value="Male" type="radio" name="gender" <?php echo ($user_details['gender'] == 'Male') ? 'checked' : ''; ?>> Male
                                           </label>
                                           <label class="form-check-label">
                                              <input class="form-check-input required" value="Female" type="radio" name="gender" <?php echo ($user_details['gender'] == 'Female') ? 'checked' : ''; ?>> Female
                                           </label> 
                                      </div>

                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Date of Birth* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="date" name="dob" class="form-control required" placeholder="MM-DD-YY"  value="<?php echo $user_details['dob']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Year Group* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="year_group" class="form-control required" placeholder=""  value="<?php echo $user_details['year_group']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Password </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="password" name="password" class="form-control" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Sibling(s) Enrolled? </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <div class="d-flex gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input required" name="is_siblings" type="radio" value="1"> Yes
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input required" name="is_siblings" type="radio" value="0" checked> No
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="row btn_box_add position-relative" id="addSiblingSection" style="display: none;">
                              <div class="col-lg-12">
                                 <button class="btn" id="siblingBtn">
                                    Add Siblings
                                    <svg width="20" height="11" viewBox="0 0 20 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M9.23317 10.2819C9.62452 10.6773 10.2633 10.6773 10.6547 10.2819L19.0888 1.76034C19.7138 1.1289 19.2665 0.0568848 18.3781 0.0568848H1.50976C0.621343 0.0568848 0.17406 1.1289 0.799023 1.76034L9.23317 10.2819Z" fill="white"/>
                                    </svg>
                                 </button>
                                 <div id="siblingDropdown" class="dropdown-menu-custom">
                                    <a href="#" class="dropdown-item">Brother</a>
                                    <a href="#" class="dropdown-item">Sister</a>
                                 </div>
                              </div>
                           </div>
                           <div id="siblingsContainer" class="mt-3"></div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step2" class="tab">
                        <h3>Parent(s) / Guardian(s) details</h3>
                        <div class="form-data">
                           <label class="label_a"> Mother* </label>
                           <div class="row m-0">
                              <div class="col-lg-3">
                                 <input type="text" name="m_title" class="form-control required" placeholder="Title" value="<?php echo $user_details['m_title']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_fname" class="form-control required" placeholder="First" value="<?php echo $user_details['m_fname']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_middle_name" class="form-control " placeholder="Middle" value="<?php echo $user_details['m_middle_name']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_lname" class="form-control required" placeholder="Last" value="<?php echo $user_details['m_lname']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Father* </label>
                           <div class="row m-0">
                              <div class="col-lg-3">
                                 <input type="text" name="f_title" class="form-control required" placeholder="Title" value="<?php echo $user_details['f_title']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_fname" class="form-control required" placeholder="First" value="<?php echo $user_details['f_fname']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_middle_name" class="form-control" placeholder="Middle" value="<?php echo $user_details['f_middle_name']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_lname" class="form-control required" placeholder="Last" value="<?php echo $user_details['f_lname']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Full Address* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="" class="form-control" placeholder="Post Code Search">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-6">
                                 <input type="text" name="address" class="form-control required" placeholder="Address Line 1" value="<?php echo $user_details['address']; ?>">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="address_2" class="form-control" placeholder="Address Line 2" value="<?php echo $user_details['address_2']; ?>">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-3">
                                 <input type="text" name="city" class="form-control required" placeholder="City" value="<?php echo $user_details['city']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="state" class="form-control required" placeholder="State/Province/Region" value="<?php echo $user_details['state']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="zipcode" class="form-control required" placeholder="Postal/ Zip Code" value="<?php echo $user_details['zipcode']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <!-- <select class="form-select">
                                    <option value="1">Country</option>
                                    <option value="1">Country 1</option>
                                    <option value="1">Country 2</option>
                                    </select> -->
                                 <input type="text" name="country" class="form-control required" placeholder="Country" value="<?php echo $user_details['country']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Contact Number* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="number" name="phone" class="form-control required" placeholder="Contact Number" value="<?php echo $user_details['phone']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Email* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="email" class="form-control required" placeholder="Email Verification" value="<?php echo $user_details['email']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step3" class="tab">
                        <h3>Tuition details and fees</h3>
                        <div class="form-data">
                           <label class="label_a"> Tuition Type* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
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
                        <?php endforeach; ?>>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Subject Choice </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
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
                        <div class="form-data">
                           <label class="label_a"> School term class days and times</label>
                           <div class="row m-0">
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
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
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Half Term (9am - 7pm) </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex flex-column gap-3 py-2">
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
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Summer School Days (9am - 6pm) </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex flex-column gap-3 py-2">
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
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Fees subscription*</label>
                           <div class="row m-0">
                              <div class="col-lg-6">
                                 <div class="d-flex flex-column gap-3 py-2">
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
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step4" class="tab">
                        <h3>Medical History</h3>
                        <div class="form-data">
                           <label class="label_a"> Emergency contact* </label>
                           <div class="row m-0">
                              <div class="col-lg-6">
                                 <input type="text" name="e_fname" class="form-control required" placeholder="First" value="<?php echo $user_details['e_fname']; ?>">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="e_lname" class="form-control required" placeholder="Last" value="<?php echo $user_details['e_lname']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Emergency contact phone number* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="e_contact" class="form-control required" placeholder="First" value="<?php echo $user_details['e_contact']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> GP Name*</label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <textarea name="gp_name" class="form-control required"><?php echo htmlspecialchars($user_details['gp_name']); ?></textarea>

                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Full Address* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="" class="form-control" placeholder="Post Code Search">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-6">
                                 <input type="text" name="e_add1" class="form-control required" placeholder="Address Line 1"value="<?php echo $user_details['e_add1']; ?>">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="e_add2" class="form-control" placeholder="Address Line 2" value="<?php echo $user_details['e_add2']; ?>">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-3">
                                 <input type="text" name="e_city" class="form-control required" placeholder="City" value="<?php echo $user_details['e_city']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="e_state" class="form-control required" placeholder="State/Province/Region" value="<?php echo $user_details['e_state']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="e_zipcode" class="form-control required" placeholder="Postal/ Zip Code" value="<?php echo $user_details['e_zipcode']; ?>">
                              </div>
                              <div class="col-lg-3">
                                 <!-- <select class="form-select">
                                    <option value="1">Country</option>
                                    <option value="1">Country 1</option>
                                    <option value="1">Country 2</option>
                                    </select> -->
                                 <input type="text" name="e_country" class="form-control required" placeholder="country" value="<?php echo $user_details['e_country']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Contact Number* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="number" name="e_contact" class="form-control required" placeholder="Contact Number" value="<?php echo $user_details['e_contact']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Email* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="e_email" class="form-control required" placeholder="Email Verification"value="<?php echo $user_details['e_email']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6 medical-condition-wrapper">
                              <div class="form-data">
                                 <label class="label_a">Does your child have any medical conditions?</label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                              <input class="form-check-input checkbox-group medical-condition-radio" value="1" type="radio" name="is_medical_condition" <?= $user_details['is_medical_condition'] == 1 ? 'checked' : '' ?>> Yes
                                            </label>

                                            <label class="form-check-label">
                                              <input class="form-check-input checkbox-group medical-condition-radio" value="0" type="radio" name="is_medical_condition" <?= $user_details['is_medical_condition'] == 0 ? 'checked' : '' ?>> No
                                            </label>
 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Does your child have Special Education Needs (SEND)? </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                              <input class="form-check-input checkbox-group" value="1" type="radio" name="is_special_education" <?= $user_details['is_special_education'] == '1' ? 'checked' : '' ?>> Yes
                                            </label>

                                            <label class="form-check-label">
                                              <input class="form-check-input checkbox-group" value="0" type="radio" name="is_special_education" <?= $user_details['is_special_education'] == '0' ? 'checked' : '' ?>> No
                                          </label>

                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data medical-condition-details">
                           <label class="label_a">Type of condition:</label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" class="form-control" name="type_of_condition" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Medication given and dosage: </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" class="form-control required" name="medication_dosage" placeholder="" value="<?php echo $user_details['medication_dosage']; ?>"> 
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Do you consent to pictures being taken of your child/ children for marketing and promotion purposes (this will include printed materials and social media)? </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <div class="d-flex gap-3 py-2">
                                    <label class="form-check-label">
  <input class="form-check-input checkbox-group" value="1" type="radio" name="is_consent_of_pic" <?= $user_details['is_consent_of_pic'] == '1' ? 'checked' : '' ?>> Yes
</label>

<label class="form-check-label">
  <input class="form-check-input checkbox-group" value="0" type="radio" name="is_consent_of_pic" <?= $user_details['is_consent_of_pic'] == '0' ? 'checked' : '' ?>> No
</label>

 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Parent / Legal Guardian Name </label>
                           <div class="row m-0">
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_fname" class="form-control required" placeholder="First" value="<?php echo $user_details['guardian_fname']; ?>">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_middle_name" class="form-control" placeholder="Middle" value="<?php echo $user_details['guardian_middle_name']; ?>">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_lname" class="form-control required" placeholder="Last" value="<?php echo $user_details['guardian_lname']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Date of registration* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="reg_date" class="form-control required" placeholder="" value="<?php echo $user_details['reg_date']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Signature </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="signature" class="form-control required" placeholder="" value="<?php echo $user_details['signature']; ?>">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="submit" class="submit" style="background-color:#f4a223;">Submit</button>
                           <!-- <a href="<?= site_url('page/thank-you'); ?>" class="submit">Submit</a> -->
                           <!-- <a href="<?= site_url('page/thank-you'); ?>" class="submit">Submit</a> -->
                        </div>
                     </div>
                  </form>
               </div>
            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-------- wish list bosy section end ------->



<script>
  // 🧠 STEP 0: PHP se JS me data bhejna
  const existingSiblings = <?= json_encode(json_decode($user_details['sibling'], true)); ?>;

  $(document).ready(function () {
    // ---------------- Tab Navigation ----------------
    $(".tab").hide().first().show();
    updateTabIndicator(0);

    $(".next").click(function (e) {
      const currentTab = $(this).closest(".tab");
      let isValid = validateTab(currentTab);
      if (isValid) {
        currentTab.hide().next(".tab").show();
        const nextIndex = $(".tab").index(currentTab.next(".tab"));
        updateTabIndicator(nextIndex);
      } else {
        e.preventDefault();
      }
    });

    $(".prev").click(function () {
      const currentTab = $(this).closest(".tab");
      currentTab.hide().prev(".tab").show();
      const prevIndex = $(".tab").index(currentTab.prev(".tab"));
      updateTabIndicator(prevIndex);
    });

    $(".submit").click(function (e) {
      const currentTab = $(this).closest(".tab");
      const currentIndex = $(".tab").index(currentTab);
      if (!validateTab(currentTab)) {
        e.preventDefault();
      }
      updateTabIndicator(currentIndex);
    });

    function updateTabIndicator(index) {
      $(".tab-links li").removeClass("active");
      $(".tab-links li").eq(index).addClass("active");
    }

    function validateTab(tab) {
      let isValid = true;
      tab.find(".error-msg, .group-error").remove();

      tab.find(".required").each(function () {
        if ($(this).val().trim() === "") {
          isValid = false;
          $(this).after('<div class="error-msg text-danger small">This field is required.</div>');
        }
      });

      tab.find(".form-data").each(function () {
        const checkboxes = $(this).find('input[type="checkbox"]');
        if (checkboxes.length > 0 && !checkboxes.is(':checked')) {
          isValid = false;
          const label = $(this).find("label.label_a").first();
          if (label.length) {
            label.after('<div class="group-error text-danger small">Please select at least one option</div>');
          }
        }
      });

      tab.find(".sibling-row").each(function () {
        const $row = $(this);
        $row.find(".error-msg").remove();

        $row.find('input[type="text"], input[type="date"]').each(function () {
          if ($(this).val().trim() === "") {
            isValid = false;
            $(this).after('<div class="error-msg text-danger small">This field is required.</div>');
          }
        });

        const radios = $row.find('input[type="radio"]');
        const group = radios.attr('name');
        if (group && !$(`input[name="${group}"]:checked`).length) {
          radios.last().after('<div class="error-msg text-danger small">This field is required.</div>');
          isValid = false;
        }
      });

      return isValid;
    }

    // ---------------- Sibling Logic ----------------
    let siblingIndex = 0;

    // STEP 1: Show/hide add section based on Yes/No
    $('input[name="is_siblings"]').on("change", function () {
      const value = $(this).val();
      const addBtn = $("#addSiblingSection");
      const container = $("#siblingsContainer");

      if (value === "1") {
        addBtn.show();
      } else {
        addBtn.hide();
        container.empty();
        siblingIndex = 0;
      }
    });

    // STEP 2: Dropdown toggle
    $("#siblingBtn").on("click", function (e) {
      e.preventDefault();
      $("#siblingDropdown").toggle();
    });

    $(document).on("click", function (event) {
      if (!$("#siblingBtn").is(event.target) && $("#siblingDropdown").has(event.target).length === 0) {
        $("#siblingDropdown").hide();
      }
    });

    // STEP 3: Dropdown item clicked (Brother/Sister)
    $(".dropdown-item").on("click", function (e) {
      e.preventDefault();
      const relation = $(this).text().trim();
      const genderVal = relation === "Brother" ? "Male" : "Female";

      addSiblingRow({
        name: '',
        middle_name: '',
        lastname: '',
        dob: '',
        gender: genderVal
      });

      $("#siblingDropdown").hide();
    });

    // STEP 4: Remove sibling row
    $(document).on("click", ".remove-sibling", function () {
      $(this).closest(".sibling-row").remove();
    });

    // STEP 5: Add sibling row function (used for both: DB & user input)
    function addSiblingRow(data) {
      const genderVal = data.gender === "Male" ? "Male" : "Female";

      const row = $(`
        <div class="row sibling-row mb-3 align-items-end border p-2 rounded">
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][name]" class="form-control" placeholder="First Name" value="${data.name ?? ''}" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][middle_name]" class="form-control" placeholder="Middle Name" value="${data.middle_name ?? ''}" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][lastname]" class="form-control" placeholder="Last Name" value="${data.lastname ?? ''}" required>
          </div>
          <div class="col-md-2">
            <input type="date" name="sibling[${siblingIndex}][dob]" class="form-control" value="${data.dob ?? ''}" required>
          </div>
          <div class="col-md-3">
            <label class="me-2">Gender:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sibling[${siblingIndex}][gender]" value="Male" ${genderVal === "Male" ? "checked" : ""}>
              <label class="form-check-label">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sibling[${siblingIndex}][gender]" value="Female" ${genderVal === "Female" ? "checked" : ""}>
              <label class="form-check-label">Female</label>
            </div>
          </div>
          <div class="col-md-1 text-end">
            <button type="button" class="btn btn-danger btn-sm remove-sibling">X</button>
          </div>
        </div>
      `);

      $("#siblingsContainer").append(row);
      siblingIndex++;
    }

    // STEP 6: Load existing siblings from DB if available
    if (Array.isArray(existingSiblings)) {
      existingSiblings.forEach(s => addSiblingRow(s));
      $("#addSiblingSection").show();
      $('input[name="is_siblings"][value="yes"]').prop("checked", true);
    }

    // ---------------- Medical Condition Show/Hide ----------------
    const selectedVal = $('input.medical-condition-radio:checked').val();
    if (selectedVal === "1") {
      $('.medical-condition-details').show();
    } else {
      $('.medical-condition-details').hide();
    }

    $('input.medical-condition-radio').on('change', function () {
      if ($(this).val() === "1") {
        $('.medical-condition-details').slideDown();
      } else {
        $('.medical-condition-details').slideUp();
      }
    });
  });
</script>

