<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'site_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['admin_login'] = "common_controller/admin_login";
//$route['admin_user'] = 'common_controller/admin_load';
//$route['admin_logout'] = "common_controller/admin_logout";

$route['admin'] = 'common_controller/admin';
$route['admin_login'] = 'common_controller/admin_login';
$route['admin_logout'] = 'common_controller/admin_logout';

$route['change_pass'] = 'common_controller/change_pass';
$route['save_password_chang'] = 'common_controller/save_password_chang';
$route['save_forgot_pass'] = 'common_controller/save_forgot_pass';

$route['role']="common_controller/role";
$route['save_role']="common_controller/save_role";
$route['edit_role']="common_controller/edit_role";
$route['delete_role']="common_controller/delete_role";

$route['add_user']="common_controller/add_user";
$route['save_user']="common_controller/save_user";
$route['edit_user']="common_controller/edit_user";
$route['delete_user']="common_controller/delete_user";

$route["role_management"]="common_controller/role_management";
$route["fetch_role_config"]="common_controller/fetch_role_config";
$route['save_role_config'] = 'common_controller/save_role_config';
$route['dashboard'] = 'common_controller/dashboard';

$route["country"]="common_controller/country";
$route['save_country'] = 'common_controller/save_country'; 
$route['edit_country'] = 'common_controller/edit_country';
$route['delete_country'] = 'common_controller/delete_country'; 

$route['state'] = 'common_controller/state'; 
$route['save_state'] = 'common_controller/save_state'; 
$route['edit_state'] = 'common_controller/edit_state';
$route['delete_state'] = 'common_controller/delete_state'; 

$route['city'] = 'common_controller/city'; 
$route['save_city'] = 'common_controller/save_city'; 
$route['edit_city'] = 'common_controller/edit_city';
$route['delete_city'] = 'common_controller/delete_city';


$route['state_by_country']='common_controller/state_by_country';
$route['city_by_state']='common_controller/city_by_state';



/************** Admin ******************************/

$route['slider_master']="admin_controller/slider_master";
$route['save_slider_master']="admin_controller/save_slider_master";
$route['edit_slider_master']="admin_controller/edit_slider_master";
$route['delete_slider_master']="admin_controller/delete_slider_master";

$route['profile_master']="admin_controller/profile_master";
$route['save_profile_master']="admin_controller/save_profile_master";
$route['edit_profile_master']="admin_controller/edit_profile_master";
$route['delete_profile_master']="admin_controller/delete_profile_master";

$route['cast_master']="admin_controller/cast_master";
$route['save_cast_master']="admin_controller/save_cast_master";
$route['edit_cast_master']="admin_controller/edit_cast_master";
$route['delete_cast_master']="admin_controller/delete_cast_master";

$route['sub_cast_master']="admin_controller/sub_cast_master";
$route['save_sub_cast_master']="admin_controller/save_sub_cast_master";
$route['edit_sub_cast_master']="admin_controller/edit_sub_cast_master";
$route['delete_sub_cast_master']="admin_controller/delete_sub_cast_master";

$route['marital_master']="admin_controller/marital_master";
$route['save_marital_master']="admin_controller/save_marital_master";
$route['edit_marital_master']="admin_controller/edit_marital_master";
$route['delete_marital_master']="admin_controller/delete_marital_master";

$route['rashi_master']="admin_controller/rashi_master";
$route['save_rashi_master']="admin_controller/save_rashi_master";
$route['edit_rashi_master']="admin_controller/edit_rashi_master";
$route['delete_rashi_master']="admin_controller/delete_rashi_master";

$route['charan_master']="admin_controller/charan_master";
$route['save_charan_master']="admin_controller/save_charan_master";
$route['edit_charan_master']="admin_controller/edit_charan_master";
$route['delete_charan_master']="admin_controller/delete_charan_master";

$route['nakshtra_master']="admin_controller/nakshtra_master";
$route['save_nakshtra_master']="admin_controller/save_nakshtra_master";
$route['edit_nakshtra_master']="admin_controller/edit_nakshtra_master";
$route['delete_nakshtra_master']="admin_controller/delete_nakshtra_master";

$route['gan_master']="admin_controller/gan_master";
$route['save_gan_master']="admin_controller/save_gan_master";
$route['edit_gan_master']="admin_controller/edit_gan_master";
$route['delete_gan_master']="admin_controller/delete_gan_master";

$route['nadi_master']="admin_controller/nadi_master";
$route['save_nadi_master']="admin_controller/save_nadi_master";
$route['edit_nadi_master']="admin_controller/edit_nadi_master";
$route['delete_nadi_master']="admin_controller/delete_nadi_master";

$route['mangal_master']="admin_controller/mangal_master";
$route['save_mangal_master']="admin_controller/save_mangal_master";
$route['edit_mangal_master']="admin_controller/edit_mangal_master";
$route['delete_mangal_master']="admin_controller/delete_mangal_master";

$route['education_master']="admin_controller/education_master";
$route['save_education_master']="admin_controller/save_education_master";
$route['edit_education_master']="admin_controller/edit_education_master";
$route['delete_education_master']="admin_controller/delete_education_master";

$route['complexion_master']="admin_controller/complexion_master";
$route['save_complexion_master']="admin_controller/save_complexion_master";
$route['edit_complexion_master']="admin_controller/edit_complexion_master";
$route['delete_complexion_master']="admin_controller/delete_complexion_master";

$route['community_master']="admin_controller/community_master";
$route['save_community_master']="admin_controller/save_community_master";
$route['edit_community_master']="admin_controller/edit_community_master";
$route['delete_community_master']="admin_controller/delete_community_master";

$route['success_story']="admin_controller/success_story";
$route['save_success_story']="admin_controller/save_success_story";
$route['edit_success_story']="admin_controller/edit_success_story";
$route['delete_success_story']="admin_controller/delete_success_story";

$route['inspiral_couple']="admin_controller/inspiral_couple";
$route['save_inspiral_couple']="admin_controller/save_inspiral_couple";
$route['edit_inspiral_couple']="admin_controller/edit_inspiral_couple";
$route['delete_inspiral_couple']="admin_controller/delete_inspiral_couple";

$route['contact']="admin_controller/contact";
$route['delete_contact']="admin_controller/delete_contact";
$route['subscribe']="admin_controller/subscribe";
$route['delete_subscribe']="admin_controller/delete_subscribe";

$route['user_details']="admin_controller/user_details";
$route['view_user_details/(:any)']="admin_controller/view_user_details/$1";
$route['update_user_details/(:any)']="admin_controller/update_user_details/$1";
$route['download_biodata/(:any)']= 'admin_controller/download_biodata/$1';
$route['download_invoice/(:any)']= 'admin_controller/download_invoice/$1';

$route['term_condition']="admin_controller/term_condition";
$route['save_term_condition']="admin_controller/save_term_condition";

$route['privacy']="admin_controller/privacy";
$route['save_privacy']="admin_controller/save_privacy";

$route['membership']="admin_controller/membership";
$route['save_membership']="admin_controller/save_membership";
$route['edit_membership']="admin_controller/edit_membership";
$route['delete_membership']="admin_controller/delete_membership";

$route['pramotion_details']="admin_controller/pramotion_details";
$route['calling_details']="admin_controller/calling_details";
$route['calling_send_sms']="admin_controller/calling_send_sms";
$route['calling_status_intrested']="admin_controller/calling_status_intrested";
$route['calling_status_not_intrested']="admin_controller/calling_status_not_intrested";

$route['sms']= 'admin_controller/sms';
$route['send_sms']= 'admin_controller/send_sms';
$route['delete_customer_details']= 'admin_controller/delete_customer_details';
$route['block_customer_details']= 'admin_controller/block_customer_details';
$route['unblock_customer_details']= 'admin_controller/unblock_customer_details';
$route['block_request']= 'admin_controller/block_request';
$route['decline_request']= 'admin_controller/decline_request';
$route['accepted_request']= 'admin_controller/accepted_request';
//$route['transcation_details']= 'admin_controller/transcation_details';
$route['save_profile_details1']="admin_controller/save_profile_details1";
$route['offline_payment']= 'admin_controller/offline_payment';
$route['fetch_customer']= 'admin_controller/fetch_customer';
$route['fetch_membership']= 'admin_controller/fetch_membership';
$route['save_offline_payment']= 'admin_controller/save_offline_payment';

$route['user_visibility']= 'admin_controller/user_visibility';
$route['user_invisible']= 'admin_controller/user_invisible';
$route['user_visible']= 'admin_controller/user_visible';

//send pramotion sms 
$route['pramotion_sms']= 'admin_controller/pramotion_sms';
$route['send_pramotion_sms']= 'admin_controller/send_pramotion_sms';

//send pramotion emails
$route['promotion_emails']= 'admin_controller/promotion_emails';
$route['send_promotion_emails']= 'admin_controller/send_promotion_emails';

$route['news_master']="admin_controller/news_master";
$route['save_news_master']="admin_controller/save_news_master";
$route['edit_news_master']="admin_controller/edit_news_master";
$route['delete_news_master']="admin_controller/delete_news_master";
/************** Report  ******************************/
$route['transcation_details']= 'report_controller/transcation_details';
$route['get_transcation_history']= 'report_controller/get_transcation_history';
$route['print_transcation_report/(:any)/(:any)']= 'report_controller/print_transcation_report/$1/$2';

$route['franchise_details']="report_controller/franchise_details";
$route['get_franchise_history']= 'report_controller/get_franchise_history';



/************** Sub Admin ******************************/

$route['franchiser_registration']="franchiser/franchiser_registration";
$route['save_franchiser_registration']="franchiser/save_franchiser_registration";
$route['edit_franchiser_registration']="franchiser/edit_franchiser_registration";
$route['delete_franchiser_registration']="franchiser/delete_franchiser_registration";

$route['member_registration']="franchiser/member_registration";
$route['save_member_register']="franchiser/save_member_register";

$route['payment_details']="franchiser/payment_details";
$route['save_payment_details']= 'admin_controller/save_payment_details';

$route['do_payment/(:any)/(:any)/(:any)']="site_controller/do_payment/$1/$2/$3";
$route['do_order_success'] = 'site_controller/do_order_success';
$route['do_order_failure'] = 'site_controller/do_order_failure';
$route['do_confirm'] = 'site_controller/do_confirm';

//Franchise Request
$route['franchise_request']="franchiser/franchise_request";
$route['save_franchise_request']="franchiser/save_franchise_request";
$route['franchise_request_status']="franchiser/franchise_request_status";
$route['franchise_accepted_request']="franchiser/franchise_accepted_request";
$route['franchise_rejected_request']="franchiser/franchise_rejected_request";
$route['delete_franchise_req']="franchiser/delete_franchise_req";
//$route['franchise_profile_send_mail/(:any)/(:any)']="franchiser/franchise_profile_send_mail/$1/$2";
$route['franchise_profile_send_mail']="franchiser/franchise_profile_send_mail/";


/************** Site ******************************/
$route['home']="site_controller/index";
$route['register']="site_controller/register";
$route['site_login']="site_controller/site_login";
$route['matches'] = 'site_controller/matches';
$route['profile']="site_controller/profile";
$route['save_profile_details']="site_controller/save_profile_details";
$route['verify_mobile']="site_controller/verify_mobile";
$route['send_otp']="site_controller/send_otp";
$route['site_logout']="site_controller/site_logout";
$route['contact_us']="site_controller/contact_us";
$route['send_contct_otp']="site_controller/send_contct_otp";
$route['save_contact']="site_controller/save_contact";
$route['save_subscribe']="site_controller/save_subscribe";
$route['privacy_policy']="site_controller/privacy_policy";
$route['term_condition_details']="site_controller/term_condition_details";
$route['site_forgot_pass'] = 'site_controller/site_forgot_pass';
$route['save_site_forgot_pass'] = 'site_controller/save_site_forgot_pass';
$route['membership_plan'] = 'site_controller/membership_plan';
$route['search_matches'] = 'site_controller/search_matches';
$route['search_matches_by_id']="site_controller/search_matches_by_id";
$route['quick_result'] = 'site_controller/quick_result';
$route['quick_result_by_profile'] = 'site_controller/quick_result_by_profile';
$route['advance_search'] = 'site_controller/advance_search';
$route['advance_result'] = 'site_controller/advance_result';
$route['profile_details/(:any)'] = 'site_controller/profile_details/$1';

$route['send_request'] = 'site_controller/send_request';
$route['accept_request'] = 'site_controller/accept_request';
$route['reject_request'] = 'site_controller/reject_request';
$route['cancel_request']="site_controller/cancel_request";

$route['add_favourite'] = 'site_controller/add_favourite';
$route['delete_favourite'] = 'site_controller/delete_favourite';

$route['change_site_pass'] = 'site_controller/change_site_pass';

$route['block_user_details'] = 'site_controller/block_user_details';

$route['book_online/(:num)'] = 'site_controller/book_online/$1';
$route['order_success'] = 'site_controller/order_success';
$route['order_failure'] = 'site_controller/order_failure';
$route['confirm'] = 'site_controller/confirm';

$route['chat_details/(:any)'] = 'site_controller/chat_details/$1';
$route['save_chat'] = 'site_controller/save_chat';
$route['user_img_details'] = 'site_controller/user_img_details';



/*atom Payment Gateway*/
$route['response'] = 'site_controller/response';



/************** Web ******************************/

$route['get_slider']="web_controller/get_slider";
$route['app_sign_in']="web_controller/app_sign_in";
$route['app_sign_up']="web_controller/app_sign_up";

$route['app_sign_up_new']="web_controller/app_sign_up_new";

$route['resend_otp']="web_controller/resend_otp";
$route['get_user_details']="web_controller/get_user_details";
$route['get_all_details']="web_controller/get_all_details";
$route['get_profile_details']="web_controller/get_profile_details";
$route['get_rashi_details']="web_controller/get_rashi_details";
$route['get_cast_details']="web_controller/get_cast_details";
$route['get_sub_cast_details']="web_controller/get_sub_cast_details";
$route['get_charan_details']="web_controller/get_charan_details";
$route['get_mangal_details']="web_controller/get_mangal_details";
$route['get_city_details']="web_controller/get_city_details";
$route['get_community_details']="web_controller/get_community_details";
$route['get_complexion_details']="web_controller/get_complexion_details";
$route['get_education_details']="web_controller/get_education_details";
$route['get_gan_details']="web_controller/get_gan_details";
$route['get_marital_details']="web_controller/get_marital_details";
$route['get_nadi_details']="web_controller/get_nadi_details";
$route['get_nakshtra_details']="web_controller/get_nakshtra_details";
$route['update_user']="web_controller/update_user";
$route['upload_image_profile']="web_controller/upload_image_profile";
$route['upload_image_profile1']="web_controller/upload_image_profile1";
$route['get_privacy']="web_controller/get_privacy";
$route['get_term_condition']="web_controller/get_term_condition";
$route['save_contact_us']="web_controller/save_contact_us";
$route['app_forgot_pass']="web_controller/app_forgot_pass";
$route['app_save_pramotion']="web_controller/app_save_pramotion";
$route['app_save_calling']="web_controller/app_save_calling";
$route['app_get_membership']="web_controller/app_get_membership";
$route['app_verify_otp']="web_controller/app_verify_otp";
$route['app_block_user']="web_controller/app_block_user";
$route['app_profile_matches']="web_controller/app_profile_matches";
$route['remove_profile_pic']="web_controller/remove_profile_pic";
$route['app_block_single_user']="web_controller/app_block_single_user";
$route['app_send_request']="web_controller/app_send_request";
$route['app_sent_request']="web_controller/app_sent_request";
$route['app_pending_request']="web_controller/app_pending_request";
$route['app_accepted_request']="web_controller/app_accepted_request";
$route['app_rejected_request']="web_controller/app_rejected_request";
$route['app_accept_request']="web_controller/app_accept_request";
$route['app_my_order_history']="web_controller/app_my_order_history";
$route['app_add_favourite']="web_controller/app_add_favourite";
$route['app_my_favourite']="web_controller/app_my_favourite";
$route['app_change_pass']="web_controller/app_change_pass";
$route['app_quick_search']="web_controller/app_quick_search";
$route['app_search_by_profile_code']="web_controller/app_search_by_profile_code";
$route['app_advance_search']="web_controller/app_advance_search";
$route['app_remove_fav']="web_controller/app_remove_fav";
$route['app_reject_request']="web_controller/app_reject_request";
$route['app_success_payment']="web_controller/app_success_payment";
$route['app_cancel_request']="web_controller/app_cancel_request";
$route['app_blocked_request']="web_controller/app_blocked_request";
$route['app_block_request']="web_controller/app_block_request";
$route['app_unblock_request']="web_controller/app_unblock_request";
$route['app_chat_details']="web_controller/app_chat_details";
$route['app_save_chat_details']="web_controller/app_save_chat_details";
$route['app_inbox_details']="web_controller/app_inbox_details";
$route['app_confirm']="web_controller/app_confirm";
$route['app_failure']="web_controller/app_failure";
$route['app_accepted_by_other']="web_controller/app_accepted_by_other";
$route['app_fetch_notice']="web_controller/app_fetch_notice";
$route['view_user_details_new']="web_controller/view_user_details_new";



$route['demo'] = 'site_controller/demo';

//atom payment getway integration using Mobile API

$route['app_payment'] = 'web_controller/app_payment';
$route['app_response'] = 'web_controller/app_response';