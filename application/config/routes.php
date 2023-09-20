<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['sign-up'] = 'User/signup';
$route['login'] = 'User/login';
$route['signup-submit'] = 'User/addUser';
$route['logout'] = 'User/logout';
$route['login-submit'] = 'User/verifyUser';
$route['terms-services'] = 'User/termsServices';

$route['add-device'] = 'Device/addDevice';
$route['import-device'] = 'Device/importDevice';
$route['manage-devices'] = 'Device/manageDevice';
$route['device-submit'] = 'Device/submitDevice';
$route['get-device-attachments'] = 'Device/getDeviceAttachments';
$route['edit-device/(:num)'] = 'Device/addDevice/$1';
$route['delete-device/(:num)'] = 'Device/delete_device/$1';
$route['other-attachments-submit'] = 'Device/submitAttachments';
$route['get-attachments'] = 'Device/getAttachments';
$route['get-order-device'] = 'Device/getOrderDevice';// attachments
$route['manage-device-orders'] = 'Device/manageDeviceOrders';
$route['get-device-orders'] = 'Device/getDeviceOrders';
$route['import-devices'] = 'Device/import_devices';
$route['device-submit-import'] = 'Device/import_devices_submit';
$route['get-device-detail'] = 'Device/getDeviceDetail';





$route['add-order'] = 'Order/addOrder';
$route['add-order/(:num)'] = 'Order/addOrder';
$route['manage-orders/(:num)'] = 'Order/manageOrder/$1';
$route['manage-orders'] = 'Order/manageOrder';
$route['order-submit'] = 'Order/submitOrder';
$route['edit-order/(:num)'] = 'Order/addOrder/$1';
$route['delete-order/(:num)'] = 'Order/delete_order/$1';
$route['order-summary/(:num)'] = 'Order/orderSummary/$1';
$route['shipping-detail/(:num)'] = 'Order/orderTracking/$1';
$route['get-carriers-services'] = 'Order/get_carriers_services';
$route['get-cost-estimation'] = 'Order/get_cost_estimation';
$route['get-order-detail'] = 'Order/get_order_detail';


$route['add-patient'] = 'Patient/addPatient';
$route['manage-patients'] = 'Patient/managePatient';
$route['manage-departments'] = 'Patient/manageDepartments';
$route['patient-submit'] = 'Patient/submitPatient';
$route['department-submit'] = 'Patient/submitDepartment';
$route['manage-patients/(:num)'] = 'Patient/managePatient/$1';
$route['edit-patient/(:num)'] = 'Patient/addPatient/$1';
$route['delete-patient/(:num)'] = 'Patient/delete_patient/$1';
$route['delete-department/(:num)'] = 'Patient/delete_department/$1';
$route['get-patient-detail'] = 'Patient/getPatientDetail';
$route['get-department-detail'] = 'Patient/getDepartmentDetail';
$route['get-patient'] = 'Patient/getPatient';

$route['validate-address'] = 'Patient/validateAddress';
$route['get-order-patient'] = 'Patient/getOrderPatient';


$route['admin'] = 'Admin';
$route['jobs'] = 'Jobs';
$route['jobs/(:num)'] = 'Jobs';
$route['job-detail/(:num)'] = 'Jobs/job_detail/$1';
$route['jobs/submit-resume'] = 'Jobs/upload_resume';
$route['apply-job-by-candidate'] = 'Jobs/upload_resume_candidate';
$route['mark-favourite-job'] = 'Jobs/mark_favourite_job';
$route['sorting-jobs'] = 'Jobs/sorting_jobs';
$route['about-us'] = 'Aboutus';
$route['contact-us'] = 'Contactus';
$route['do-contact'] = 'Contactus/contact_us';



$route['forget-password'] = 'User/forget_password';
$route['forget-password-submit'] = 'User/forget_password_submit';
$route['reset-password'] = 'User/reset_password';
$route['reset-password-submit'] = 'User/reset_password_submit';
$route['verify-facebook'] = 'User/verify_facebook_user';
$route['in_authback'] = 'User/in_authback';

$route['dashboard'] = 'Dashboard';
$route['address-by-zipcode'] = 'Dashboard/get_address';
$route['candidate-edit-profile'] = 'Candidate/candidate_edit_profile';
$route['update-resume-profile'] = 'Candidate/candidate_edit_resume_profile';
$route['update-resume-aboutus'] = 'Candidate/candidate_edit_resume_aboutus';
$route['update-resume-education'] = 'Candidate/candidate_edit_resume_education';
$route['update-resume-experience'] = 'Candidate/candidate_edit_resume_experience';
$route['update-resume-qualification'] = 'Candidate/candidate_edit_resume_qualification';
$route['update-resume-file'] = 'Candidate/candidate_edit_resume_file';
$route['candidate/update-profile'] = 'Candidate/update_profile';
$route['applied-jobs'] = 'Candidate/applied_jobs';
$route['favourite-jobs'] = 'Candidate/favourite_jobs';
$route['matching-jobs'] = 'Candidate/matching_jobs';
$route['candidate-resume'] = 'Candidate/candidate_resume';
$route['skills'] = 'Candidate/skills';
$route['get-skills'] = 'Candidate/get_skills'; 
$route['get-skills-json'] = 'Candidate/get_skills_json'; 
$route['save-skill'] = 'Candidate/store_skills_user'; 
$route['get-skills-candidate'] = 'Candidate/get_skills_candidate'; 
$route['messages'] = 'Messages';
$route['send-message'] = 'Messages/send_message';
$route['get-messages'] = 'Messages/get_messages';




$route['service/(:any)'] = 'Services/details';

$route['admin-login'] = 'Admin/verifyUser';
$route['admin-logout'] = 'Admin/logout';
$route['admin/jobs'] = 'Adminjobs';
$route['admin/add-job'] = 'Adminjobs/addjob';
$route['admin/job-submit'] = 'Adminjobs/submit_job';
$route['admin/edit-job/(:num)'] = 'Adminjobs/addjob/$1';
$route['admin/delete-job/(:num)'] = 'Adminjobs/delete_job/$1';

$route['admin/candidates'] = 'Admincandidates';
$route['admin/view-candidate-messages/(:num)'] = 'Admincandidates/view_messages';
$route['admin/get-messages/(:num)'] = 'Admincandidates/get_messages';
$route['admin/send-message'] = 'Admincandidates/send_message';


$route['admin/skills'] = 'Adminskills';
$route['admin/add-skill'] = 'Adminskills/addcategory';
$route['admin/skill-submit'] = 'Adminskills/submit_category';
$route['admin/edit-skill/(:num)'] = 'Adminskills/addcategory/$1';
$route['admin/delete-skill/(:num)'] = 'Adminskills/delete_category/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
