<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }

    public function get_admin_details()
    {
        return $this->db->get_where('users', array('role_id' => 1));
    }

    public function get_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        $this->db->where('role_id', 2);
        return $this->db->get('users');
    }

    public function get_all_user($user_id = 0)
    {
        if ($user_id > 0) {
            $this->db->where('id', $user_id);
        }
        return $this->db->get('users');
    }

    public function add_user($is_instructor = false, $is_admin = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        } else {
          //  $data['unique_identifier'] = 0;
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
            $data['social_links'] = json_encode($social_link);
            $data['biography'] = $this->input->post('biography');
            $data['phone'] = $this->input->post('phone');
            $data['address'] = $this->input->post('address');

            if ($is_admin) {
                $data['role_id'] = 1;
                $data['is_instructor'] = 1;
            } else {
                $data['role_id'] = 2;
            }

            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            //All payment keys
            if(isset($_POST['gateways'])){
                $data['payment_keys'] = json_encode($_POST['gateways']);
            }

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }

            $this->db->insert('users', $data);
            $user_id = $this->db->insert_id();
         //   $this->user_model->update_unique_identifier($user_id);

            // IF THIS IS A USER THEN INSERT BLANK VALUE IN PERMISSION TABLE AS WELL
            if ($is_admin) {
                $permission_data['admin_id'] = $user_id;
                $permission_data['permissions'] = json_encode(array());
                $this->db->insert('permissions', $permission_data);
            }

            $this->upload_user_image($data['image']);
            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
        }
    }

    public function add_shortcut_user($is_instructor = false)
    {
        $validity = $this->check_duplication('on_create', $this->input->post('email'));
        if ($validity == false) {
            $response['status'] = 0;
            $response['message'] = get_phrase('this_email_already_exits') . '. ' . get_phrase('please_use_another_email');
            return json_encode($response);
        } else {
          //  $data['unique_identifier'] = 0;
            $data['first_name'] = html_escape($this->input->post('first_name'));
            $data['last_name'] = html_escape($this->input->post('last_name'));
            $data['email'] = html_escape($this->input->post('email'));
            $data['password'] = sha1(html_escape($this->input->post('password')));
            $social_link['facebook'] = '';
            $social_link['twitter'] = '';
            $social_link['linkedin'] = '';
            $data['social_links'] = json_encode($social_link);
            $data['role_id'] = 2;
            $data['date_added'] = strtotime(date("Y-m-d H:i:s"));
            $data['wishlist'] = json_encode(array());
            $data['status'] = 1;
            $data['image'] = md5(rand(10000, 10000000));

            // Add paypal keys
            $payment_keys = array();

            $paypal['production_client_id']  = '';
            $paypal['production_secret_key'] = '';
            $payment_keys['paypal'] = $paypal;

            // Add Stripe keys
            $stripe['public_live_key'] = '';
            $stripe['secret_live_key'] = '';
            $payment_keys['stripe'] = $stripe;

            // Add razorpay keys
            $razorpay['key_id'] = '';
            $razorpay['secret_key'] = '';
            $payment_keys['razorpay'] = $razorpay;

            //All payment keys
            $data['payment_keys'] = json_encode(array());

            if ($is_instructor) {
                $data['is_instructor'] = 1;
            }
            $this->db->insert('users', $data);

            $user_id = $this->db->insert_id();
           // $this->user_model->update_unique_identifier($user_id);

            $this->session->set_flashdata('flash_message', get_phrase('user_added_successfully'));
            $response['status'] = 1;
            return json_encode($response);
        }
    }

    public function check_duplication($action = "", $email = "", $user_id = "")
    {
        $duplicate_email_check = $this->db->get_where('users', array('email' => $email));

        if ($action == 'on_create') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->status == 1) {
                    return false;
                } else {
                    return 'unverified_user';
                }
            } else {
                return true;
            }
        } elseif ($action == 'on_update') {
            if ($duplicate_email_check->num_rows() > 0) {
                if ($duplicate_email_check->row()->id == $user_id) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        }
    }

   public function edit_user($user_id = "")
{
    // Admin does this editing
    $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
    if ($validity) {
        $data = [
        'title'                 => $this->input->post('title', true),
    'first_name'            => $this->input->post('first_name', true),
    'middle_name'           => $this->input->post('middle_name', true),
    'last_name'             => $this->input->post('last_name', true),
    'gender'                => $this->input->post('gender', true),
    'dob'                   => $this->input->post('dob', true),
    'year_group'            => $this->input->post('year_group', true),
    'is_siblings'           => $this->input->post('is_siblings', true),
     'm_title'               => $this->input->post('m_title', true),
    'm_fname'               => $this->input->post('m_fname', true),
    'm_middle_name'         => $this->input->post('m_middle_name', true),
    'm_lname'               => $this->input->post('m_lname', true),
    'f_title'               => $this->input->post('f_title', true),
    'f_fname'               => $this->input->post('f_fname', true),
    'f_middle_name'         => $this->input->post('f_middle_name', true),
    'f_lname'               => $this->input->post('f_lname', true),
    'address'               => $this->input->post('address', true),
    'address_2'             => $this->input->post('address_2', true),
    'city'                  => $this->input->post('city', true),
    'state'                 => $this->input->post('state', true),
    'zipcode'               => $this->input->post('zipcode', true),
    'country'               => $this->input->post('country', true),
    'phone'                 => $this->input->post('phone', true),
    'email'                 => $this->input->post('email', true),
    'e_fname'               => $this->input->post('e_fname', true),
    'e_lname'               => $this->input->post('e_lname', true),
    'e_contact'             => $this->input->post('e_contact', true),
    'e_email'               => $this->input->post('e_email', true),
    'gp_name'               => $this->input->post('gp_name', true),
    'e_add1'                => $this->input->post('e_add1', true),
    'e_add2'                => $this->input->post('e_add2', true),
    'e_city'                => $this->input->post('e_city', true),
    'e_state'               => $this->input->post('e_state', true),
    'e_zipcode'             => $this->input->post('e_zipcode', true),
    'e_country'             => $this->input->post('e_country', true),
    'is_medical_condition'  => $this->input->post('is_medical_condition', true),
    'is_special_education'  => $this->input->post('is_special_education', true),
    'type_of_condition'     => $this->input->post('type_of_condition', true),
    'medication_dosage'     => $this->input->post('medication_dosage', true),
    'is_consent_of_pic'     => $this->input->post('is_consent_of_pic', true),
    'guardian_fname'        => $this->input->post('guardian_fname', true),
    'guardian_middle_name'  => $this->input->post('guardian_middle_name', true),
    'guardian_lname'        => $this->input->post('guardian_lname', true),
    'reg_date'              => $this->input->post(date("Y-m-d H:i:s"), true),
    'signature'             => $this->input->post('signature', true),
    'preferred_name'        => $this->input->post('preferred_name', true),
    'teacher_subjects'      => $this->input->post('teacher_subjects', true),
    'position_apply_for'    => $this->input->post('position_apply_for', true),
    'right_to_work'         => $this->input->post('right_to_work', true),
    'proof_of_right'        => $this->input->post('proof_of_right', true),
    'skills'                => $this->input->post('skills', true),
    'biography'             => $this->input->post('biography', true),
    ];
        if (isset($_POST['email'])) {
            $data['email'] = html_escape($this->input->post('email'));
        }

        // Social links
        $social_link['facebook'] = html_escape($this->input->post('facebook_link'));
        $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
        $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
        $data['social_links'] = json_encode($social_link);
        $data['last_modified'] = strtotime(date("Y-m-d H:i:s"));

        // User image update
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            unlink('uploads/user_image/' . $this->db->get_where('users', array('id' => $user_id))->row('image') . '.jpg');
            $data['image'] = md5(rand(10000, 10000000));
            $this->upload_user_image($data['image']);
        }

        // Payment keys
        if (isset($_POST['gateways'])) {
            $data['payment_keys'] = json_encode($_POST['gateways']);
        }

        // Multi-value JSON fields
        $data['student_subjects']     = json_encode($this->input->post('student_subjects') ?? []);
        $data['school_term_time']     = json_encode($this->input->post('school_term_time') ?? []);
        $data['half_term_days']       = json_encode($this->input->post('half_term_days') ?? []);
        $data['summer_term_days']     = json_encode($this->input->post('summer_term_days') ?? []);
        $data['fee_subscription']     = json_encode($this->input->post('fee_subscription') ?? []);
        $data['sibling']              = json_encode($this->input->post('sibling') ?? []);
        $data['documents']            = json_encode($this->input->post('documents') ?? []);
        $data['availability_of_work']            = json_encode($this->input->post('availability_of_work') ?? []);
        $data['employment_details']            = json_encode($this->input->post('employment_details') ?? []);
        $data['educational_background']            = json_encode($this->input->post('educational_background') ?? []);
        $data['tuition_type']         = html_escape($this->input->post('tuition_type'));

        // ✅ File Upload: documents_path (PDF, DOC, CSV etc)
        if (!empty($_FILES['documents_path']['name'])) {
            $config['upload_path']   = 'uploads/document/';
            $config['allowed_types'] = 'pdf|csv|xls|xlsx|doc|docx';
            $config['max_size']      = 51200; // 50MB in KB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('documents_path')) {
                $upload_data = $this->upload->data();
                $document_filename = $upload_data['file_name'];

                // Delete old file if exists
                $existing_file = $this->db->get_where('users', array('id' => $user_id))->row('documents_path');
                if (!empty($existing_file) && file_exists('uploads/document/' . $existing_file)) {
                    unlink('uploads/document/' . $existing_file);
                }

                $data['documents_path'] = $document_filename;
            } else {
                $this->session->set_flashdata('error_message', $this->upload->display_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

        if (!empty($_FILES['documents2_path']['name'])) {
            $config['upload_path']   = 'uploads/document/';
            $config['allowed_types'] = 'pdf|csv|xls|xlsx|doc|docx';
            $config['max_size']      = 51200; // 50MB in KB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('documents2_path')) {
                $upload_data = $this->upload->data();
                $document_filename = $upload_data['file_name'];

                // Delete old file if exists
                $existing_file = $this->db->get_where('users', array('id' => $user_id))->row('documents2_path');
                if (!empty($existing_file) && file_exists('uploads/document/' . $existing_file)) {
                    unlink('uploads/document/' . $existing_file);
                }

                $data['documents2_path'] = $document_filename;
            } else {
                $this->session->set_flashdata('error_message', $this->upload->display_errors());
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        

        // Save data
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);

        $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
    }
}


    public function delete_user($user_id = "")
    {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
        $this->session->set_flashdata('flash_message', get_phrase('user_deleted_successfully'));
    }

    public function unlock_screen_by_password($password = "")
    {
        $password = sha1($password);
        return $this->db->get_where('users', array('id' => $this->session->userdata('user_id'), 'password' => $password))->num_rows();
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);
        $user_id = $this->db->insert_id();
       // $this->user_model->update_unique_identifier($user_id);
        return $user_id;
    }

    public function register_user_update_code($data, $status = "")
    {

        //If get back disabled user and again signup
        $update_code['status'] = $status;

        $update_code['verification_code'] = $data['verification_code'];
        $update_code['password'] = $data['password'];
        $this->db->where('email', $data['email']);
        $this->db->update('users', $update_code);
    }

    public function my_courses($user_id = "")
    {
        if ($user_id == "") {
            $user_id = $this->session->userdata('user_id');
        }
        return $this->db->get_where('enrol', array('user_id' => $user_id));
    }

    public function upload_user_image($image_code)
    {
        if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != "") {
            move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/user_image/' . $image_code . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('user_update_successfully'));
        }
    }

    public function update_account_settings($user_id)
    {
        $validity = $this->check_duplication('on_update', $this->input->post('email'), $user_id);
        if ($validity) {
            if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
                $user_details = $this->get_user($user_id)->row_array();
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');
                if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                    $data['password'] = sha1($new_password);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                    return;
                }
            }
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('email_duplication'));
        }
    }

    public function change_password($user_id)
    {
        $data = array();
        if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
            $user_details = $this->get_all_user($user_id)->row_array();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
                $data['password'] = sha1($new_password);
            } else {
                $this->session->set_flashdata('error_message', get_phrase('mismatch_password'));
                return;
            }
        }

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
    }


    public function get_instructor($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'is_instructor' => 1));
        } else {
            return $this->db->get_where('users', array('is_instructor' => 1));
        }
    }

    public function get_instructor_by_email($email = null)
    {
        return $this->db->get_where('users', array('email' => $email, 'is_instructor' => 1));
    }

    public function get_admins($id = 0)
    {
        if ($id > 0) {
            return $this->db->get_where('users', array('id' => $id, 'role_id' => 1));
        } else {
            return $this->db->get_where('users', array('role_id' => 1));
        }
    }

    public function get_number_of_active_courses_of_instructor($instructor_id)
    {
        $result = $this->crud_model->get_courses_by_instructor_id($instructor_id, 'active');
        return $result->num_rows();
    }

    public function get_user_image_url($user_id)
    {
        $user_profile_image = $this->db->get_where('users', array('id' => $user_id))->row('image');
        if (file_exists('uploads/user_image/optimized/' . $user_profile_image . '.jpg')){
            return base_url() . 'uploads/user_image/optimized/' . $user_profile_image . '.jpg';
        }elseif(file_exists('uploads/user_image/' . $user_profile_image . '.jpg')){
            //resizeImage
            resizeImage('uploads/user_image/' . $user_profile_image . '.jpg', 'uploads/user_image/optimized/', 220);
            return base_url() . 'uploads/user_image/' . $user_profile_image . '.jpg';
        }else{
            return base_url() . 'uploads/user_image/placeholder.png';
        }
    }

    public function get_instructor_list()
    {
        return $this->db->get_where('users', array('status' => '1', 'is_instructor' => '1'));
        // $query1 = $this->db->get_where('course', array('status' => 'active'))->result_array();
        // $instructor_ids = array();
        // $query_result = array();
        // foreach ($query1 as $row1) {
        //     if (!in_array($row1['user_id'], $instructor_ids) && $row1['user_id'] != "") {
        //         array_push($instructor_ids, $row1['user_id']);
        //     }
        // }
        // if (count($instructor_ids) > 0) {
        //     $this->db->where_in('id', $instructor_ids);
        //     $query_result = $this->db->get('users');
        // } else {
        //     $query_result = $this->get_admin_details();
        // }

        // return $query_result;
    }

    public function update_instructor_paypal_settings($user_id = '')
    {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update paypal keys
        $paypal['production_client_id'] = html_escape($this->input->post('paypal_client_id'));
        $paypal['production_secret_key'] = html_escape($this->input->post('paypal_secret_key'));
        $payment_keys['paypal'] = $paypal;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }
    public function update_instructor_stripe_settings($user_id = '')
    {
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update stripe keys
        $stripe['public_live_key'] = html_escape($this->input->post('stripe_public_key'));
        $stripe['secret_live_key'] = html_escape($this->input->post('stripe_secret_key'));
        $payment_keys['stripe'] = $stripe;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function update_instructor_razorpay_settings($user_id = ''){
        $user_details = $this->get_all_user($user_id)->row_array();
        $payment_keys = json_decode($user_details['payment_keys'], true);
        // Update razorpay keys
        $razorpay['key_id'] = html_escape($this->input->post('key_id'));
        $razorpay['secret_key'] = html_escape($this->input->post('secret_key'));
        $payment_keys['razorpay'] = $razorpay;

        //All payment keys
        $data['payment_keys'] = json_encode($payment_keys);

        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // POST INSTRUCTOR APPLICATION FORM AND INSERT INTO DATABASE IF EVERYTHING IS OKAY
    public function post_instructor_application($user_id = "")
    {
        if($user_id == ""){
            $user_id = $this->input->post('id');
        }
        $user_details = $this->get_all_user($user_id)->row_array();

        if($this->input->post('email')){
            $email = $this->input->post('email');
        }else{
            $email = $user_details['email'];
        }

        // CHECK IF THE PROVIDED ID AND EMAIL ARE COMING FROM VALID USER
        if ($user_details['email'] == $email) {

            // GET PREVIOUS DATA FROM APPLICATION TABLE
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            // CHECK IF THE USER HAS SUBMITTED FORM BEFORE
            if ($previous_data > 0) {
                $this->session->set_flashdata('error_message', get_phrase('already_submitted'));
                redirect(site_url('user/become_an_instructor'), 'refresh');
            }
            $data['user_id'] = $user_id;
            $data['address'] = $this->input->post('address');
            $data['phone'] = $this->input->post('phone');
            $data['message'] = $this->input->post('message');
            if (isset($_FILES['document']) && $_FILES['document']['name'] != "") {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $accepted_ext = array('doc', 'docs', 'pdf', 'txt', 'png', 'jpg', 'jpeg');
                $path = $_FILES['document']['name'];
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                if (in_array(strtolower($ext), $accepted_ext)) {
                    $document_custom_name = random(15) . '.' . $ext;
                    $data['document'] = $document_custom_name;
                    move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                } else {
                    $this->session->set_flashdata('error_message', get_phrase('invalide_file'));
                    redirect(site_url('user/become_an_instructor'), 'refresh');
                }
            }
            $this->db->insert('applications', $data);
            $this->session->set_flashdata('flash_message', site_phrase('You have successfully submitted your application.').' '.get_phrase('We will review it and notify you via email notification'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        } else {
            $this->session->set_flashdata('error_message', get_phrase('user_not_found'));
            redirect(site_url('user/become_an_instructor'), 'refresh');
        }
    }

    function instructor_application(){
        // FIRST GET THE USER DETAILS
        $user = $this->db->get_where('users', ['email' => $this->input->post('email')]);
        if($user->num_rows() > 0){
            $user_details = $user->row_array();
            $previous_data = $this->get_applications($user_details['id'], 'user')->num_rows();
            if ($previous_data == 0) {
                if (!file_exists('uploads/document')) {
                    mkdir('uploads/document', 0777, true);
                }
                $data['user_id'] = $user_details['id'];
                $data['address'] = $user_details['address'];
                $data['phone'] = $this->input->post('phone');
                $data['message'] = $this->input->post('message');

                $document_custom_name =random(15).'.'.pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION);
                $data['document'] = $document_custom_name;
                move_uploaded_file($_FILES['document']['tmp_name'], 'uploads/document/' . $document_custom_name);
                $this->db->insert('applications', $data);
            }
        }
    }


    // GET INSTRUCTOR APPLICATIONS
    public function get_applications($id = "", $type = "")
    {
        if ($id > 0 && !empty($type)) {
            if ($type == 'user') {
                $applications = $this->db->get_where('applications', array('user_id' => $id));
                return $applications;
            } else {
                $applications = $this->db->get_where('applications', array('id' => $id));
                return $applications;
            }
        } else {
            $this->db->order_by("id", "DESC");
            $applications = $this->db->get_where('applications');
            return $applications;
        }
    }

    // GET APPROVED APPLICATIONS
    public function get_approved_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 1));
        return $applications;
    }

    // GET PENDING APPLICATIONS
    public function get_pending_applications()
    {
        $applications = $this->db->get_where('applications', array('status' => 0));
        return $applications;
    }

    //UPDATE STATUS OF INSTRUCTOR APPLICATION
    public function update_status_of_application($status, $application_id)
    {
        $application_details = $this->get_applications($application_id, 'application');
        if ($application_details->num_rows() > 0) {
            $application_details = $application_details->row_array();
            if ($status == 'approve') {
                $application_data['status'] = 1;
                $this->db->where('id', $application_id);
                $this->db->update('applications', $application_data);

                $instructor_data['is_instructor'] = 1;
                $this->db->where('id', $application_details['user_id']);
                $this->db->update('users', $instructor_data);

                $this->session->set_flashdata('flash_message', get_phrase('application_approved_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            } else {
                $this->db->where('id', $application_id);
                $this->db->delete('applications');
                $this->session->set_flashdata('flash_message', get_phrase('application_deleted_successfully'));
                redirect(site_url('admin/instructor_application'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_application'));
            redirect(site_url('admin/instructor_application'), 'refresh');
        }
    }

    // ASSIGN PERMISSION
    public function assign_permission()
    {
        $argument = html_escape($this->input->post('arg'));
        $argument = explode('-', $argument);
        $admin_id = $argument[0];
        $module = $argument[1];

        // CHECK IF IT IS A ROOT ADMIN
        if (is_root_admin($admin_id)) {
            return false;
        }

        $permission_data['admin_id'] = $admin_id;
        $previous_permissions = json_decode($this->get_admins_permission_json($permission_data['admin_id']), TRUE);

        if (in_array($module, $previous_permissions)) {
            $new_permission = array();
            foreach ($previous_permissions as $permission) {
                if ($permission != $module) {
                    array_push($new_permission, $permission);
                }
            }
        } else {
            array_push($previous_permissions, $module);
            $new_permission = $previous_permissions;
        }

        $permission_data['permissions'] = json_encode($new_permission);

        $this->db->where('admin_id', $admin_id);
        $this->db->update('permissions', $permission_data);
        return true;
    }

    // GET ADMIN'S PERMISSION JSON
    public function get_admins_permission_json($admin_id)
    {
        $admins_permissions = $this->db->get_where('permissions', ['admin_id' => $admin_id])->row_array();
        return $admins_permissions['permissions'];
    }

    // GET MULTI INSTRUCTOR DETAILS WITH COURSE ID
    public function get_multi_instructor_details_with_csv($csv)
    {
        $instructor_ids = explode(',', $csv);
        $this->db->where_in('id', $instructor_ids);
        return $this->db->get('users')->result_array();
    }

    function quiz_submission_checker($quiz_id = ""){
        $quiz_details = $this->crud_model->get_lessons('lesson', $quiz_id)->row_array();
        $total_quiz_seconds = time_to_seconds($quiz_details['duration']);

        $this->db->where('quiz_id', $quiz_id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $query = $this->db->order_by('quiz_result_id', 'desc')->get('quiz_results');
        if($query->num_rows() > 0){
            $row = $query->row_array();
            if(($total_quiz_seconds + $row['date_added']) < time() && $total_quiz_seconds > 0 || $row['is_submitted'] == 1){

                if($row['is_submitted'] != 1){
                    $this->db->where('quiz_id', $quiz_id);
                    $this->db->where('user_id', $this->session->userdata('user_id'));
                    $this->db->update('quiz_results', array('is_submitted' => 1));
                }

                return 'submitted';
            }else{
                return 'on_progress';
            }
        }else{
            return 'no_data';
        }
    }



/*START LOGIN LOGOUT AND DEVICE ALLOW SECTION*/
    // For device login tracker
    public function new_device_login_tracker($user_id = "", $is_verified = '')
    {
        $pre_sessions = array();
        $updated_session_arr = array();
        $current_session_id = session_id();
        $this->db->where('id', $user_id);
        $sessions = $this->db->get('users');

        if($sessions->row('role_id') == 1){
            return;
        }

        $pre_sessions = json_decode($sessions->row('sessions'), true);

        if(is_array($pre_sessions) && count($pre_sessions) > 0){
            if($is_verified == true && !in_array($current_session_id, $pre_sessions)){
                $allowed_device = get_settings('allowed_device_number_of_loging');
                $previous_tatal_device = count($pre_sessions) + 1; //current device

                $removeable_device = $previous_tatal_device - $allowed_device;

                foreach($pre_sessions as $key => $pre_session){
                    if($removeable_device >= 1){
                        $this->db->where('id', $pre_session);
                        $this->db->delete('ci_sessions');
                    }else{

                        if($this->db->get_where('ci_sessions', ['id' => $pre_session])->num_rows() > 0){
                            array_push($updated_session_arr, $pre_session);                        
                        }
                    }
                    $removeable_device = $removeable_device - 1;
                }
                array_push($updated_session_arr, $current_session_id);
            }else{
                if(!in_array($current_session_id, $pre_sessions)){
                    if(count($pre_sessions) >= get_settings('allowed_device_number_of_loging')){
                        $this->email_model->new_device_login_alert($user_id);
                        redirect(site_url('login/new_login_confirmation'), 'refresh');
                    }else{
                        $updated_session_arr = $pre_sessions;
                        array_push($updated_session_arr, $current_session_id);
                    }
                }
            }
        }else{
            $updated_session_arr = [$current_session_id];
        }

        if(count($updated_session_arr) > 0){
            $data['sessions'] = json_encode($updated_session_arr);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    function set_login_userdata($user_id = ""){
        // Checking login credential for admin
        $query = $this->db->get_where('users', array('id' => $user_id));

        if ($query->num_rows() > 0) {
            $row = $query->row();
            //604800s == 7 days
            $this->session->set_userdata('custom_session_limit', (time()+864000));
            $this->session->set_userdata('user_id', $row->id);
            $this->session->set_userdata('role_id', $row->role_id);
            $this->session->set_userdata('role', get_user_role('user_role', $row->id));
            $this->session->set_userdata('name', $row->first_name . ' ' . $row->last_name);
            $this->session->set_userdata('is_instructor', $row->is_instructor);
            $this->session->set_flashdata('flash_message', get_phrase('welcome') . ' ' . $row->first_name . ' ' . $row->last_name);
            if ($row->role_id == 1) {
                $this->session->set_userdata('admin_login', '1');
                redirect(site_url('admin/dashboard'), 'refresh');
            } else if ($row->role_id == 2) {
                $this->session->set_userdata('user_login', '1');
                if($this->session->userdata('url_history')){
                    redirect($this->session->userdata('url_history'), 'refresh');
                }
                redirect(site_url('home/my_courses'), 'refresh');
            }
        } else {
            $this->session->set_flashdata('error_message', get_phrase('invalid_login_credentials'));
            redirect(site_url('login'), 'refresh');
        }
    }


    /// new set_login_userdata

    public function new_set_login_userdata($user_id = "")
{
    $query = $this->db->get_where('users', array('id' => $user_id));

    if ($query->num_rows() > 0) {
        $row = $query->row();

        $this->session->set_userdata('custom_session_limit', (time() + 864000)); // 10 days
        $this->session->set_userdata('user_id', $row->id);
        $this->session->set_userdata('role_id', $row->role_id);
        $this->session->set_userdata('role', get_user_role('user_role', $row->id));
        $this->session->set_userdata('name', $row->first_name . ' ' . $row->last_name);
        $this->session->set_userdata('is_instructor', $row->is_instructor);
        $this->session->set_flashdata('flash_message', get_phrase('welcome') . ' ' . $row->first_name . ' ' . $row->last_name);

        if ($row->role_id == 1) {
            $this->session->set_userdata('admin_login', '1');
            redirect(site_url('admin/dashboard'), 'refresh');
        } else if ($row->role_id == 2) {
            $this->session->set_userdata('user_login', '1');
            if ($this->session->userdata('url_history')) {
                redirect($this->session->userdata('url_history'), 'refresh');
            }
            redirect(site_url('home/my_courses'), 'refresh');
        }
    } else {
        $this->session->set_flashdata('error_message', get_phrase('invalid_login_credentials'));
        redirect(site_url('login'), 'refresh');
    }
}


    function check_session_data($user_type = ""){
        $this->remove_garbage_collection();

        if (!$this->session->userdata('cart_items')) {
            $this->session->set_userdata('cart_items', array());
        }

        if (!$this->session->userdata('language')) {
            $this->session->set_userdata('language', get_settings('language'));
        }

        if($user_type == 'admin'){
            if($this->session->userdata('custom_session_limit') >= time()){
                $this->session->set_userdata('custom_session_limit', (time()+864000));
            }else{
                $this->session_destroy();
                redirect(site_url('login'), 'refresh');
            }

            if ($this->session->userdata('admin_login') != true) {
                redirect(site_url('login'), 'refresh');
            }
        }elseif($user_type == 'user'){
            if($this->session->userdata('custom_session_limit') >= time()){
                $this->session->set_userdata('custom_session_limit', (time()+864000));
            }else{
                $this->session_destroy();
                redirect(site_url('login'), 'refresh');
            }

            if ($this->session->userdata('user_login') != true) {
                redirect(site_url('login'), 'refresh');
            }else{
                if($this->get_all_user($this->session->userdata('user_id'))->num_rows() == 0){
                    $this->session_destroy();
                    redirect(site_url('login'), 'refresh');
                }
            }
        }elseif($user_type == 'login'){
            if ($this->session->userdata('admin_login')) {
                redirect(site_url('admin'), 'refresh');
            } elseif ($this->session->userdata('user_login')) {
                redirect(site_url('home/my_courses'), 'refresh');
            }
        }
    }







    public function session_destroy()
    {
        $this->remove_garbage_collection();

        $logged_in_user_id = $this->session->userdata('user_id');
        if($logged_in_user_id > 0 && $this->session->userdata('user_login') == 1){
            $pre_sessions = array();
            $updated_session_arr = array();
            $current_session_id = session_id();

            $this->db->where('id', $logged_in_user_id);
            $sessions = $this->db->get('users')->row('sessions');
            $pre_sessions = json_decode($sessions, true);
            if(is_array($pre_sessions)){
                foreach($pre_sessions as $key => $pre_session){
                    if($pre_session != $current_session_id){
                        if($this->db->get_where('ci_sessions', ['id' => $pre_session])->num_rows() > 0){
                            array_push($updated_session_arr, $pre_session);                        
                        }
                    }else{
                        $this->db->where('id', $pre_session);
                        $this->db->delete('ci_sessions');
                    }
                }
                $data['sessions'] = json_encode($updated_session_arr);
                $this->db->where('id', $logged_in_user_id);
                $this->db->update('users', $data);
            }
        }

        $this->session->unset_userdata('admin_login');
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('custom_session_limit');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_instructor');
        $this->session->unset_userdata('url_history');
        $this->session->unset_userdata('app_url');
        $this->session->unset_userdata('total_price_of_checking_out');
        $this->session->unset_userdata('register_email');
        $this->session->unset_userdata('applied_coupon');
        $this->session->unset_userdata('new_device_code_expiration_time');
        $this->session->unset_userdata('new_device_user_email');
        $this->session->unset_userdata('new_device_user_id');
        $this->session->unset_userdata('new_device_verification_code');

    }

    function remove_garbage_collection(){
        $this->db->where('timestamp <', time()-864000);
        $this->db->delete('ci_sessions');
    }
    /*END LOGIN LOGOUT AND DEVICE ALLOW SECTION*/


   /* function update_unique_identifier($user_id = ""){
        $data['unique_identifier'] = $user_id.strtolower(random(10));
        $this->db->where('unique_identifier', 0);
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }*/



    //course-gift-ryan

    function get_user_by_email($email = ""){
        if($email){
            $this->db->where('email', $email);
        }
        return $this->db->get('users');
    }

    //course-gift-ryan
}
