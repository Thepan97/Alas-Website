<style type="text/css">
   .error-msg, .group-error{
   color: red;
   font-size: 14px;
   margin-top: 5px;
   }
   .dropdown-menu-custom {
   display: none;
   position: absolute;
   top: 100%;
   left: 25px;
   background: #fff;
   border: 1px solid #ccc;
   padding: 8px 0;
   z-index: 1000;
   width: 150px;
   box-shadow: 0 2px 8px rgba(0,0,0,0.1);
   border-radius: 4px;
   }
   .dropdown-item {
   display: block;
   padding: 8px 16px;
   padding-top: 5px;
   color: #333;
   text-decoration: none;
   }
   .dropdown-item:hover {
   background-color: #f0f0f0;
   }
   .is-invalid {
   border-color: initial !important;
   background-image: none !important;
   padding-right: initial !important;
   background-position: initial !important;
   background-repeat: initial !important;
   background-size: initial !important;
   }
</style>
<?php include 'includes_top.php';?>
<!------- body section Start ------>
<?php
   //user wishlist items
      $my_wishlist_items = array();
      if($user_id = $this->session->userdata('user_id')){
          $wishlist = $this->user_model->get_all_user($user_id)->row('wishlist');
          if($wishlist != ''){
              $my_wishlist_items = json_decode($wishlist, true);
          }
      }
      
   if($this->session->userdata('app_url')):
      include "go_back_to_mobile_app.php";
   endif;
   
   if ($page_name == 'login' || $page_name == 'sign_up') { 
       
   }else{
      include 'header.php';
   }
   
   if(get_frontend_settings('cookie_status') == 'active'):
         include 'eu-cookie.php';
      endif;
   ?>
<!-- <section class="privacy-policy">
   <div class="container">
       <div class="row my-5">
           <div class="col-12">
               <?php //echo get_frontend_settings('about_us'); ?>
               This is about Us
           </div>
       </div>
   </div>
   </section> -->
<section class="teacher_form" style="background-image: url(<?php echo base_url('assets/frontend/default-new/img/fullwave.png') ?>);">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <h2><?php echo get_phrase('Alas Tutors Student Registration Form') ?></h2>
            <p class="text-center mb-5"><?php echo get_phrase('Application to be filled by the Parent / Legal Guardian') ?></p>
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
                  
                  <form action="<?=site_url('home/save_reg')?>" method="post" enctype="multipart/form-data">
                     <div id="step1" class="tab active">
                        <h3>Student Details</h3>
                        <div class="form-data">
                           <label class="label_a"> Name* </label>
                           <div class="row m-0">
                              <div class="col-lg-3">
                                 <input type="text" name="title" class="form-control required" placeholder="Title">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="first_name" class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text"  name="middle_name" class="form-control" placeholder="Middle">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="last_name" class="form-control required" placeholder="Last">
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
                                          <input class="form-check-input required" value="Male" type="radio" name="gender"> Male
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input required" value="Female" type="radio" name="gender" checked=""> Female
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
                                       <input type="date" name="dob" class="form-control required" placeholder="MM-DD-YY">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Year Group* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="year_group" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-data">
                                 <label class="label_a"> Password* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="password" name="password" class="form-control required" placeholder="">
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
                                    <input class="form-check-input required" name="is_siblings" type="radio" value="yes"> Yes
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input required" name="is_siblings" type="radio" value="no" checked> No
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
                                 <input type="text" name="m_title" class="form-control required" placeholder="Title">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_fname" class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_middle_name" class="form-control " placeholder="Middle">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="m_lname" class="form-control required" placeholder="Last">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Father* </label>
                           <div class="row m-0">
                              <div class="col-lg-3">
                                 <input type="text" name="f_title" class="form-control required" placeholder="Title">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_fname" class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_middle_name" class="form-control" placeholder="Middle">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="f_lname" class="form-control required" placeholder="Last">
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
                                 <input type="text" name="address" class="form-control required" placeholder="Address Line 1">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="address_2" class="form-control" placeholder="Address Line 2">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-3">
                                 <input type="text" name="city" class="form-control required" placeholder="City">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="state" class="form-control required" placeholder="State/Province/Region">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="zipcode" class="form-control required" placeholder="Postal/ Zip Code">
                              </div>
                              <div class="col-lg-3">
                                 <!-- <select class="form-select">
                                    <option value="1">Country</option>
                                    <option value="1">Country 1</option>
                                    <option value="1">Country 2</option>
                                    </select> -->
                                 <input type="text" name="country" class="form-control required" placeholder="Country">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Contact Number* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="number" name="phone" class="form-control required" placeholder="Contact Number">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Email* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="email" class="form-control required" placeholder="Email Verification">
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
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="Group class" name="tuition_type" type="radio" name="group_class" checked> Group class
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="1 on 1" name="tuition_type" type="radio" name="1on1"> 1 on 1
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="Summer school" name="tuition_type" type="radio" name="summer_school"> Summer school
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="Intensive weeklong Subject" name="tuition_type" type="radio" name="subject"> Intensive weeklong Subject
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Subject Choice </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <div class="d-flex flex-wrap gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="student_subjects[]" value="English" type="checkbox"> English
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="student_subjects[]" value="Maths" type="checkbox"> Maths
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="student_subjects[]" value="Science" type="checkbox"> Science
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="student_subjects[]" value="French" type="checkbox"> French
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="student_subjects[]" value="Spanish" type="checkbox"> Spanish
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> School term class days and times</label>
                           <div class="row m-0">
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Monday 4pm - 6pm" type="checkbox" > Monday 4pm - 6pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Monday 5pm - 7pm" type="checkbox" > Monday 5pm - 7pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Tuesday 4pm - 6pm" type="checkbox" > Tuesday 4pm - 6pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Tuesday 5pm - 7pm" type="checkbox" > Tuesday 5pm - 7pm
                                    </label>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Wednesday 4pm - 6pm" type="checkbox"> Wednesday 4pm - 6pm
                                    </label> 
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Wednesday 5pm - 7pm" type="checkbox"> Wednesday 5pm - 7pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Thursday 4pm - 6pm" type="checkbox"> Thursday 4pm - 6pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Thursday 5pm - 7pm" type="checkbox"> Thursday 5pm - 7pm
                                    </label>
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Friday 4pm - 6pm" type="checkbox"> Friday 4pm - 6pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Friday 5pm - 7pm" type="checkbox"> Friday 5pm - 7pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Saturday 11am - 1pm" type="checkbox"> Saturday 11am - 1pm
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" name="school_term_time[]" value="Saturday 1pm - 3pm" type="checkbox"> Saturday 1pm - 3pm
                                    </label>
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
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Monday" name="half_term_days[]"> Monday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Tuesday" name="half_term_days[]"> Tuesday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Wednesday" name="half_term_days[]"> Wednesday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Thursday" name="half_term_days[]"> Thursday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Friday" name="half_term_days[]"> Friday
                                          </label>
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
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Monday" name="summer_term_days[]"> Monday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Tuesday" name="summer_term_days[]"> Tuesday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Wednesday" name="summer_term_days[]"> Wednesday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Thursday" name="summer_term_days[]"> Thursday
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" type="checkbox" value="Friday" name="summer_term_days[]"> Friday
                                          </label>
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
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£25.00 - Pay as you Go (per session)" name="fee_subscription[]"> £25.00 - Pay as you Go (per session)
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£150.00 - Monthly - school term (2h per week per subject)" name="fee_subscription[]">  £150.00 - Monthly - school term (2h per week per subject)
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£225.00 - Monthly - school term (3h per week - English / Maths / Science)" name="fee_subscription[]"> £225.00 - Monthly - school term (3h per week - English / Maths / Science)
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£25.00 - Summer School Half Day PAYG" name="fee_subscription[]"> £25.00 - Summer School Half Day PAYG
                                    </label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£120.00 - Summer School Half Day (weekly)" name="fee_subscription[]">  £120.00 - Summer School Half Day (weekly)
                                    </label> 
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£45.00 - Summer School Full Day PAYG" name="fee_subscription[]"> £45.00 - Summer School Full Day PAYG
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" type="checkbox" value="£200.00 - Summer School Full Day PAYG" name="fee_subscription[]">  £200.00 - Summer School Full Day PAYG
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="£250.00 - Summer School Weeklong Intensive Subject (full day 9am - 6pm)" type="checkbox" name="fee_subscription[]"> £250.00 - Summer School Weeklong Intensive Subject (full day 9am - 6pm)
                                    </label>
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
                                 <input type="text" name="e_fname" class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="e_lname" class="form-control required" placeholder="Last">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Emergency contact phone number* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="e_contact" class="form-control required" placeholder="First">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> GP Name*</label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <textarea name="gp_name"  class="form-control required"></textarea>
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
                                 <input type="text" name="e_add1" class="form-control required" placeholder="Address Line 1">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="e_add2" class="form-control" placeholder="Address Line 2">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-3">
                                 <input type="text" name="e_city" class="form-control required" placeholder="City">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="e_state" class="form-control required" placeholder="State/Province/Region">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="e_zipcode" class="form-control required" placeholder="Postal/ Zip Code">
                              </div>
                              <div class="col-lg-3">
                                 <!-- <select class="form-select">
                                    <option value="1">Country</option>
                                    <option value="1">Country 1</option>
                                    <option value="1">Country 2</option>
                                    </select> -->
                                 <input type="text" name="e_country" class="form-control required" placeholder="country">
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Contact Number* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="number" name="e_contact" class="form-control required" placeholder="Contact Number">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Email* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="e_email" class="form-control required" placeholder="Email Verification">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6 medical-condition-wrapper"> <!-- Added for targeting -->
                              <div class="form-data">
                                 <label class="label_a">Does your child have any medical conditions?</label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                             <input class="form-check-input checkbox-group medical-condition-radio" value="1" type="radio" name="is_medical_condition"> Yes
                                          </label>
                                          <label class="form-check-label">
                                             <input class="form-check-input checkbox-group medical-condition-radio" value="0" type="radio" name="is_medical_condition" checked> No
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
                                          <input class="form-check-input checkbox-group" value="Yes" type="radio" name="is_special_education"> Yes
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input checkbox-group" value="No" type="radio" name="is_special_education" checked=""> No
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
                                 <input type="text" class="form-control required" name="medication_dosage" placeholder=""> 
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Do you consent to pictures being taken of your child/ children for marketing and promotion purposes (this will include printed materials and social media)? </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <div class="d-flex gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="Yes" type="radio" name="is_consent_of_pic"> Yes
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input checkbox-group" value="No" type="radio" name="is_consent_of_pic" checked=""> No
                                    </label> 
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Parent / Legal Guardian Name </label>
                           <div class="row m-0">
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_fname" class="form-control required" placeholder="First">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_middle_name" class="form-control" placeholder="Middle">
                              </div>
                              <div class="col-lg-4">
                                 <input type="text" name="guardian_lname" class="form-control required" placeholder="Last">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Date of registration* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="reg_date" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Signature </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="signature" class="form-control required" placeholder="">
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
   <!-- <p class="m-0">
      <?php echo get_phrase('Already you have an account?') ?>
      <a href="<?php echo site_url('login') ?>"><?php echo get_phrase('Log In') ?></a> </p> --> 
</section>
<!-- Our Partners -->
<section class="partners_wrapper py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="our_partners">
                    <div class="title">
                        <h3><?php echo get_phrase('Our Trusted Partners') ?></h3>
                    </div>
                    <div class="logo">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_01.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_02.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_03.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_04.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_05.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_06.jpg')?>">
                        <img src="<?php echo base_url('assets/frontend/default-new/image/logos_07.jpg')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Our Partners -->
<!-- <script>
   function display_image(e) { 
       let file = e.currentTarget.files[0];
       document.getElementById('fileName').textContent = file.name;
   }
   
   function display_image1(e) { 
       let file = e.currentTarget.files[0];
       document.getElementById('fileName1').textContent = file.name;
   }
   
   $(document).ready(function() {
       // Next button
       $('.teacher_form .next').on('click', function() {
           var currentTab = $(this).closest('.tab');
           var nextTab = currentTab.next('.tab');
           // var inputField = currentTab.find('input');
   
           // if (inputField.val() === "") {
           //     alert("Please fill out the field before proceeding.");
           //     inputField.focus();
           //     return;
           // }
   
           if (nextTab.length) {
               currentTab.removeClass('active').hide();
               nextTab.addClass('active').show();
   
               var currentTabIndex = currentTab.index();
               $('.teacher_form .tab-links li').eq(currentTabIndex).removeClass('active').next().addClass('active');
           }
       });
   
       // Previous button
       $('.teacher_form .prev').on('click', function() {
           var currentTab = $(this).closest('.tab');
           var prevTab = currentTab.prev('.tab');
   
           if (prevTab.length) {
               currentTab.removeClass('active').hide();
               prevTab.addClass('active').show();
   
               var currentTabIndex = currentTab.index();
               $('.teacher_form .tab-links li').eq(currentTabIndex).removeClass('active').prev().addClass('active');
           }
       });
   });
   </script> -->
<script>
  $(document).ready(function () {
    // ---------------- Tab Navigation ----------------
    $(".tab").hide().first().show();
    updateTabIndicator(0); // Initially set the first tab as active

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

    // ---------------- Active Tab UI ----------------
    function updateTabIndicator(index) {
      $(".tab-links li").removeClass("active");
      $(".tab-links li").eq(index).addClass("active");
    }

    // ---------------- Validation Logic ----------------
    function validateTab(tab) {
      let isValid = true;
      tab.find(".error-msg, .group-error").remove();

      // Validate required inputs
      tab.find(".required").each(function () {
        if ($(this).val().trim() === "") {
          isValid = false;
          $(this).after('<div class="error-msg text-danger small">This field is required.</div>');
        }
      });

      // Validate checkbox groups
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

      // Validate sibling rows
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

    $('input[name="is_siblings"]').on("change", function () {
      const value = $(this).val();
      const addBtn = $("#addSiblingSection");
      const container = $("#siblingsContainer");

      if (value === "yes") {
        addBtn.show();
      } else {
        addBtn.hide();
        container.empty();
        siblingIndex = 0;
      }
    });

    $("#siblingBtn").on("click", function (e) {
      e.preventDefault();
      $("#siblingDropdown").toggle();
    });

    $(document).on("click", function (event) {
      if (!$("#siblingBtn").is(event.target) && $("#siblingDropdown").has(event.target).length === 0) {
        $("#siblingDropdown").hide();
      }
    });

    $(".dropdown-item").on("click", function (e) {
      e.preventDefault();
      const relation = $(this).text().trim();
      const genderVal = relation === "Brother" ? "Male" : "Female";

      const row = $(`
        <div class="row sibling-row mb-3 align-items-end border p-2 rounded">
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][name]" class="form-control" placeholder="${relation} Name" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][middle_name]" class="form-control" placeholder="${relation} Middle Name" required>
          </div>
          <div class="col-md-2">
            <input type="text" name="sibling[${siblingIndex}][lastname]" class="form-control" placeholder="${relation} Last Name" required>
          </div>
          <div class="col-md-2">
            <input type="date" name="sibling[${siblingIndex}][dob]" class="form-control" required>
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
      $("#siblingDropdown").hide();
    });

    $(document).on("click", ".remove-sibling", function () {
      $(this).closest(".sibling-row").remove();
    });
  });
$(document).ready(function () {
    // Initially hide or show based on selected value
    const selectedVal = $('input.medical-condition-radio:checked').val();
    if (selectedVal === "1") {
      $('.medical-condition-details').show();
    } else {
      $('.medical-condition-details').hide();
    }

    // On change of medical condition radio buttons
    $('input.medical-condition-radio').on('change', function () {
      if ($(this).val() === "1") {
        $('.medical-condition-details').slideDown();
      } else {
        $('.medical-condition-details').slideUp();
      }
    });
  });
</script>

<?php
   if ($page_name == 'login' || $page_name == 'sign_up') { 
      
   }else{
      include 'footer.php';
   }
   
   include 'includes_bottom.php';
   include 'modal.php';
   include 'common_scripts.php';
   // include 'init.php';
   ?>
<!------- body section end ------>
