<style type="text/css">
   /* Remove red border */
   input.is-invalid {
   border-color: #dee2e6 !important;
   box-shadow: none !important;
   background-image: none !important;
   }
   /* Keep error text only */
   .error-msg {
   color: red;
   font-size: 13px;
   margin-top: 5px;
   }
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
            <h2 class="mb-5"><?php echo get_phrase('Teacher Application Form') ?></h2>
            <div class="tabs">
               <ul class="tab-links">
                  <li class="active">
                     <div>1</div>
                     <span><?php echo get_phrase('Personal Information') ?></span>
                  </li>
                  <li>
                     <div>2</div>
                     <span><?php echo get_phrase('Employment application') ?></span>
                  </li>
                  <li>
                     <div>3</div>
                     <span><?php echo get_phrase('Employment details') ?></span>
                  </li>
                  <li>
                     <div>4</div>
                     <span><?php echo get_phrase('Educational background') ?></span>
                  </li>
               </ul>
               <div class="tab-content">
                  
                  <form method="POST" action="<?=site_url('home/save_teacher')?>" enctype="multipart/form-data">
                     <input type="hidden" name="is_instructor" value="1">
                     <div id="step1" class="tab active">
                        <h3><?php echo get_phrase('Personal Information') ?></h3>
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
                                 <input type="text" name="middle_name" class="form-control" placeholder="Middle">
                              </div>
                              <div class="col-lg-3">
                                 <input type="text" name="last_name" class="form-control required" placeholder="Last">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Preferred Name </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="preferred_name" class="form-control required" placeholder="First">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Date of Birth* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="date" name="dob" class="form-control required" placeholder="MM-DD-YY">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Password* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="password" name="password" class="form-control required" placeholder="Password">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Subjects </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <!-- <select name="teacher_subjects" class="form-select">
                                    <option value="1">Subjects</option>
                                    <option value="1">Subjects 2</option>
                                    <option value="1">Subjects 3</option>
                                    </select>  -->
                                 <input type="text" name="teacher_subjects" class="form-control required" placeholder="Subject">
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Full Address* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" class="form-control" placeholder="Post Code Search">
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
                                 <!-- <select name="country" class="form-select">
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
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step2" class="tab">
                        <h3>Employment Application</h3>
                        <div class="form-data">
                           <label class="label_a"> Position you are applying for </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="position_apply_for" class="form-control required" placeholder="English Teacher"> 
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Right to work in the UK* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                          <input class="form-check-input" value="1" name="right_to_work" type="radio"> Yes
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" value="0" name="right_to_work" type="radio" checked> No
                                          </label> 
                                       </div>
                                       <span>*Please note we do not currently sponsor visa applications</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Proof of right to work* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="proof_of_right" class="form-control required" placeholder="Your Email">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Are you a fully qualified teacher* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                          <input class="form-check-input qualified" name value="1" type="radio" checked> Yes
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input qualified" value="0" type="radio"> No
                                          </label> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6" id="qualified-options">
                              <div class="form-data">
                                 <label class="label_a"> Are you a fully qualified teacher* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex flex-wrap gap-3 py-2">
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" value="Primary Only" name="is_qualified_teacher"> Primary Only
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" value="Secondary Only" name="is_qualified_teacher" > Secondary Only
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" value="GCSEs and A-levels" name="is_qualified_teacher" > GCSEs and A-levels
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" value="All levels" name="is_qualified_teacher" > All levels
                                          </label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Documents needed to support your application* </label>
                           <div class="row m-0">
                              <div class="col-lg-5">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="documents[]" > Passport
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="documents[]" > Any other photographic ID
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="documents[]" > Biometric residency permit
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="documents[]" > Proof of address (bank statement or utility bill)
                                    </label>
                                 </div>
                                 <span class="pt-3 d-block">* Tick those you can provide and upload them</span>
                              </div>
                              <div class="col-lg-5">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="DBS check" name="documents[]" > DBS check
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Teaching qualifications" name="documents[]" > Teaching qualifications
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Educational transcript(s) or Diplomas" name="documents[]" > Educational transcript(s) or Diplomas
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Recent CV" name="documents[]" > Recent CV
                                    </label>
                                 </div>
                              </div>
                              <div class="col-lg-2">
                                 <label>
                                    <input type="file" onchange="display_image(event)" name="documents_path" style="display: none;">
                                    <div class="file_upload">
                                       <img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/upload.png')?>">
                                       <h4>Drag & Drop</h4>
                                       <p id="fileName">or select files from device</p>
                                       <p>max. 50MB</p>
                                    </div>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Availability for work* </label>
                           <div class="row m-0">
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Monday" name="availability_of_work[]" > Monday
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Tuesday" name="availability_of_work[]" > Tuesday
                                    </label> 
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Wednesday" name="availability_of_work[]" > Wednesday
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Thursday" name="availability_of_work[]" > Thursday
                                    </label> 
                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="d-flex flex-column gap-3 py-2">
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Friday" name="availability_of_work[]" > Friday
                                    </label>
                                    <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="Saturday" name="availability_of_work[]" > Saturday
                                    </label> 
                                 </div>
                              </div>
                              <span class="mt-3 d-block">
                              * Please note our tuition center is open at the following times: <br>
                              During school term: Monday to Friday from 4pm-7pm and Saturday from 11am-3pm <br>
                              School holiday: Monday to Friday from 10am - 4pm
                              </span>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Documents needed to support your application* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <label class="d-block">
                                    <input type="file" onchange="display_image1(event)" name="documents2_path"  style="display: none;">
                                    <div class="full_upload_size d-flex">
                                       <img class="w-100" src="<?php echo base_url('assets/frontend/default-new/image/upload.png')?>">
                                       <div>
                                          <h4>Drag & Drop</h4>
                                          <p id="fileName1">or select files from device</p>
                                       </div>
                                       <p class="size">max. 50MB</p>
                                    </div>
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step3" class="tab">
                        <h3>Employment Details</h3>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Most recent employer name* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="employment_details[]" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Most recent position held* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="employment_details[]" class="form-control required" placeholder="Email Verification">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Most recent employer name* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="employment_details[]" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Is this a current employer?* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="employment_details[]"> Yes
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="employment_details[]" checked=""> No
                                          </label> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="form-data">
                                 <label class="label_a"> Most recent position held* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="text" name="employment_details[]" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Phone* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="number" name="employment_details[]" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Email* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <input type="email" name="employment_details[]" class="form-control required" placeholder="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Referece Name at your most recent employer* </label>
                           <div class="row m-0">
                              <div class="col-lg-6">
                                 <input type="text" name="employment_details[]" class="form-control required" placeholder="">
                              </div>
                              <div class="col-lg-6">
                                 <input type="text" name="employment_details[]" class="form-control" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="button" class="next">Next</button>
                        </div>
                     </div>
                     <div id="step4" class="tab">
                        <h3>Educational Background</h3>
                        <div class="row mb-3">
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Did you complete you secondary education in the UK?* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <div class="d-flex gap-3 py-2">
                                          <label class="form-check-label">
                                          <input class="form-check-input " name="educational_background[]" type="radio"> Yes
                                          </label>
                                          <label class="form-check-label">
                                          <input class="form-check-input" name="educational_background[]" type="radio" checked=""> No
                                          </label> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-data">
                                 <label class="label_a"> Highest level of education held* </label>
                                 <div class="row m-0">
                                    <div class="col-lg-12">
                                       <!-- <select class="form-select">
                                          <option value="1">Secondary education</option>
                                          <option value="1">Secondary education 1</option>
                                          <option value="1">Secondary education 2</option>
                                          </select> -->
                                       <input type="text" name="educational_background[]" class="form-control required" placeholder="Highest level of education">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-data">
                           <label class="label_a"> Name of most recent Education provider* </label>
                           <div class="row m-0">
                              <div class="col-lg-12">
                                 <input type="text" name="educational_background[]" class="form-control required" placeholder="">
                              </div>
                           </div>
                           <div class="row m-0 pt-3">
                              <div class="col-lg-12">
                                 <input type="text" name="educational_background[]" class="form-control required" placeholder="">
                              </div>
                           </div>
                        </div>
                        <div class="button_box">
                           <button type="button" class="prev">Previous</button>
                           <button type="submit" class="submit" style="background-color:#f4a223;">Submit</button>
                           <!-- <a href="<?= site_url('page/thank-you'); ?>" class="submit">Submit</a> -->
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
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
           var inputField = currentTab.find('input');
   
           if (inputField.val() === "") {
               alert("Please fill out the field before proceeding.");
               inputField.focus();
               return;
           }
   
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    // Show only the first tab initially
    $(".tab").hide().first().show();
    updateTabIndicator(0); // set first tab active on load

    // Next button logic
    $(".next").click(function (e) {
      const currentTab = $(this).closest(".tab");
      let currentIndex = $(".tab").index(currentTab);
      let isValid = validateTab(currentTab);

      if (isValid) {
        currentTab.hide().next(".tab").show();
        updateTabIndicator(currentIndex + 1); // move to next step
      } else {
        e.preventDefault();
      }
    });

    // Previous button logic
    $(".prev").click(function () {
      const currentTab = $(this).closest(".tab");
      let currentIndex = $(".tab").index(currentTab);
      currentTab.hide().prev(".tab").show();
      updateTabIndicator(currentIndex - 1); // move to previous step
    });

    // Submit button validation (for last tab)
    $(".submit").click(function (e) {
      const currentTab = $(this).closest(".tab");
      if (!validateTab(currentTab)) {
        e.preventDefault(); // stop form submission if validation fails
      }
    });

    // Validation function
    function validateTab(tab) {
      let isValid = true;
      tab.find(".error-msg, .group-error").remove(); // Clear previous messages

      // Validate required fields except radio buttons
      tab.find(".required").each(function () {
        const type = $(this).attr("type");
        if (type === "radio") return; // skip radio inputs

        if ($(this).val().trim() === "") {
          isValid = false;
          $(this).after('<div class="error-msg text-danger small">This field is required.</div>');
        }
      });

      // Validate checkbox groups
      tab.find(".form-data").each(function () {
        const checkboxes = $(this).find('input[type="checkbox"]');
        if (checkboxes.length > 0) {
          const name = checkboxes.first().attr("name");
          if (!$(`input[name='${name}']:checked`).length) {
            isValid = false;
            if (!$(this).find(".group-error").length) {
              $(this).append('<div class="group-error text-danger small">Please select at least one option.</div>');
            }
          }
        }
      });

      return isValid;
    }

    // Tab indicator update
    function updateTabIndicator(index) {
      $(".tab-links li").removeClass("active");
      $(".tab-links li").eq(index).addClass("active");
    }
  });
</script>


<script>
   $(document).ready(function () {
     $('.qualified').on('change', function () {
       // Uncheck all other radios manually
       $('.qualified').not(this).prop('checked', false);
   
       // Show/hide the qualified-options div
       if ($(this).val() === "1") {
         $('#qualified-options').show();
       } else {
         $('#qualified-options').hide();
       }
     });
   
     // Initial check on page load
     if ($('.qualified:checked').val() === "1") {
       $('#qualified-options').show();
     } else {
       $('#qualified-options').hide();
     }
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
