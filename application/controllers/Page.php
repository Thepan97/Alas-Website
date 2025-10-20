<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set(get_settings('timezone'));

        // Your own constructor code
        $this->load->database();
        // $this->load->Model('Page_model');
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        $this->user_model->check_session_data();       
    }

    function index($page_suffix = ""){
            $this->load->Model('Page_model');
        if($page_suffix == 'home-1' || $page_suffix == 'home-2' || $page_suffix == 'home-3' || $page_suffix == 'home-4' || $page_suffix == 'home-5' || $page_suffix == 'home-6'){

            $page_suffix = str_replace('-', '_', $page_suffix);

            $this->db->where('key', 'home_page');
            $this->db->update('frontend_settings', ['value' => $page_suffix]);
            redirect(site_url('home'), 'refresh');
        }

        $this->db->where('page_url', $page_suffix);
        $custom_page = $this->db->get('custom_page')->row_array();


        $page_data['page_url'] = $custom_page['page_url'];
        $page_data['page_content'] = $custom_page['page_content'];
        $page_data['page_title'] = $custom_page['page_title'];
        $page_data['page_name'] = 'custom_page_viewer';

        if(1<0)
        {

        }
        // if($page_suffix=='about-us'){
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/about_us', $page_data);
        // }
        // elseif($page_suffix=='promotions'){
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/promotions', $page_data);
        // }
        // elseif($page_suffix=='testimonials')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/testimonials', $page_data);
        // }
        // elseif($page_suffix=='face-to-face')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/face_to_face', $page_data);
        // }
        // elseif($page_suffix=='tutoring')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/tutoring', $page_data);
        // }
        // elseif($page_suffix=='11-13-exam-prep')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/11_13_exam_prep', $page_data);
        // }
        // elseif($page_suffix=='sats-prep')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/sats_prep', $page_data);
        // }
        // elseif($page_suffix=='pre-gcses-tutoring')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/pre_gcses_tutoring', $page_data);
        // }
        // elseif($page_suffix=='gcses-exam-prep')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/gcses_exam_prep', $page_data);
        // }
        // elseif($page_suffix=='a-levels-prep')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/a_levels_prep', $page_data);
        // }
        // elseif($page_suffix=='holidays-summer-school')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/holidays_summer_school', $page_data);
        // }
        // elseif($page_suffix=='intensive-subjects')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/intensive_subjects', $page_data);
        // }
        // elseif($page_suffix=='price-list')
        // {
        //     $this->load->view('frontend/' . get_frontend_settings('theme') . '/price_list', $page_data);
        // }
        elseif($page_suffix=='teacher-form')
        {
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/teacher_form', $page_data);
        }
        elseif($page_suffix=='registration-form')
        {
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/registration_form', $page_data);
        }
        elseif($page_suffix=='thank-you')
        {
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/thank_you', $page_data);
        }
        elseif($page_suffix=='contact_us')
        {
            $page_data['page_url'] = 'contact-us';
            $page_data['page_title'] = "Contact Us";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='privacy_policy')
        {
            $page_data['page_url'] = 'privacy_policy';
            $page_data['page_title'] = "Privacy Policy";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }elseif($page_suffix=='in-person-classes')
        {
            $page_data['page_url'] = 'in-person-classes';
            $page_data['page_title'] = "In-Person classes";
            $parent_id = 12;
            $page_data['category_wise_courses'] = $this->Page_model->getCoursesByParent($parent_id); 
            // echo "<pre>"; print_r($page_data['category_wise_courses']); exit();
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='home-schooling')
        {
            $page_data['page_url'] = 'home-schooling';
            $page_data['page_title'] = "Home Schooling";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='child-care')
        {
            $page_data['page_url'] = 'child-care';
            $page_data['page_title'] = "Child Care";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='online-classes')
        {
            $page_data['page_url'] = 'online-classes';
            $page_data['page_title'] = "Online Classes";
             $parent_id = 15;
            $page_data['category_wise_courses'] = $this->Page_model->getCoursesByParent($parent_id); 
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='what-we-offer')
        {
            $page_data['page_url'] = 'what-we-offer';
            $page_data['page_title'] = "What we Offer";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='pricing')
        {
            $page_data['page_url'] = 'pricing';
            $page_data['page_title'] = "Pricing";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='special-offers')
        {
            $page_data['page_url'] = 'special-offers';
            $page_data['page_title'] = "Special Offers";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='school-pickup-dropoff')
        {
            $page_data['page_url'] = 'school-pickup-dropoff';
            $page_data['page_title'] = "School Pickup/Drop off";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='parents-night-out')
        {
            $page_data['page_url'] = 'parents-night-out';
            $page_data['page_title'] = "Parents night out";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='summer-school')
        {
            $page_data['page_url'] = 'summer-school';
            $page_data['page_title'] = "Summer School";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='terms_and_condition')
        {
            $page_data['page_url'] = 'terms_and_condition';
            $page_data['page_title'] = "Terms and Conditions";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        elseif($page_suffix=='refund_policy')
        {
            $page_data['page_url'] = 'refund_policy';
            $page_data['page_title'] = "Refund Policy";
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
        else{
  
            $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
        }
    }


   
}