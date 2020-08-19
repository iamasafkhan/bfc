<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//admin
$route['dashboard'] = 'admins/dashboard';
$route['setting'] = 'setting/setting';
$route['admin'] = 'auth/admin_login';
$route['user'] = 'auth/user_login';
$route['login'] = 'registration/login';

$route['add_admin'] = 'admins/add_admin';
$route['view_admin'] = 'admins/view_admin';
$route['view_users'] = 'users/view_users';

$route['view_admin_role'] = 'admin_role/view_admin_role';
$route['view_district'] = 'district/view_district';
$route['view_department'] = 'department/view_department';
$route['view_grants'] = 'grants/view_grants';
$route['view_banks'] = 'banks/view_banks';
$route['view_case_status'] = 'case_status/view_case_status';
$route['view_pay_scale'] = 'pay_scale/view_pay_scale';
$route['view_grantee_type'] = 'grantee_type/view_grantee_type';
$route['view_payment_mode'] = 'payment_mode/view_payment_mode';
$route['view_post'] = 'post/view_post';
$route['view_bfc_bank_branch'] = 'bfc_bank_branch/view_bfc_bank_branch';
$route['view_grantee_bank_branch'] = 'grantee_bank_branch/view_grantee_bank_branch';
$route['view_grant_payments'] = 'grant_payments/view_grant_payments';
$route['view_emp_info'] = 'emp_info/view_emp_info';
$route['add_emp_info'] = 'emp_info/add_emp_info';
// $route['edit_emp_info'] = 'emp_info/edit_emp_info';
$route['scholarship_grant_manag'] = 'grants/scholarship_grants/';


$route['setting'] = 'common/setting';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
