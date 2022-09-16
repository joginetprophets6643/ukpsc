<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-06-24 08:11:26 --> 404 Page Not Found: Assets/dist
ERROR - 2021-06-24 08:11:51 --> 404 Page Not Found: admin/Master/index
ERROR - 2021-06-24 08:11:56 --> 404 Page Not Found: admin/Master/index
ERROR - 2021-06-24 08:15:46 --> 404 Page Not Found: admin/Master/provisional_list
ERROR - 2021-06-24 08:15:59 --> 404 Page Not Found: admin/Certificate/provisional
ERROR - 2021-06-24 08:16:27 --> 404 Page Not Found: admin/Certificate/provisional
ERROR - 2021-06-24 11:55:09 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:55:09 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:55:18 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:55:18 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:57:08 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:57:08 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:57:08 --> Severity: Notice --> Undefined property: Certificate::$admin D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 123
ERROR - 2021-06-24 11:57:08 --> Severity: error --> Exception: Call to a member function get_all_provisional() on null D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 123
ERROR - 2021-06-24 11:58:17 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:58:17 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:58:18 --> Severity: error --> Exception: Call to undefined method Certificate_model::get_all_provisional() D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 123
ERROR - 2021-06-24 11:59:28 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 11:59:28 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:01:29 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:01:29 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:01:29 --> Query error: Unknown column 'ci_admin.is_supper' in 'where clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
JOIN `ci_admin_roles` ON `ci_admin_roles`.`admin_role_id`=`ci_admin`.`admin_role_id`
WHERE `ci_admin`.`is_supper` != 1
ORDER BY `ci_admin`.`admin_role_id` DESC
ERROR - 2021-06-24 12:03:02 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:03:02 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:03:02 --> Query error: Unknown column 'ci_admin.is_supper' in 'where clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
JOIN `ci_admin_roles` ON `ci_admin_roles`.`admin_role_id`=`ci_admin`.`admin_role_id`
WHERE `ci_admin`.`is_supper` != 1
ORDER BY `ci_admin`.`admin_role_id` DESC
ERROR - 2021-06-24 12:04:23 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:04:23 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:04:24 --> Query error: Unknown column 'ci_admin.admin_role_id' in 'on clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
JOIN `ci_admin_roles` ON `ci_admin_roles`.`admin_role_id`=`ci_admin`.`admin_role_id`
ORDER BY `ci_certificate_provisional`.`id` DESC
ERROR - 2021-06-24 12:04:37 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:04:37 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 18
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: firstname D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 21
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: lastname D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 21
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 22
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: username D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 25
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 31
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 34
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 35
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: is_active D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 36
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 37
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 40
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 43
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 18
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: firstname D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 21
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: lastname D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 21
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 22
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: username D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 25
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 31
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 34
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 35
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: is_active D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 36
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 37
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 40
ERROR - 2021-06-24 12:04:38 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\admin\list.php 43
ERROR - 2021-06-24 12:06:43 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:06:43 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 18
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: firstname D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 21
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: lastname D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 21
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 22
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: username D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 25
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 31
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 34
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 35
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: is_active D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 36
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 37
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 40
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 43
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 18
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: firstname D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 21
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: lastname D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 21
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 22
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: username D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 25
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_role_title D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 31
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 34
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 35
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: is_active D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 36
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 37
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 40
ERROR - 2021-06-24 12:06:44 --> Severity: Notice --> Undefined index: admin_id D:\xampp\htdocs\cerrs\application\views\admin\certificate\list.php 43
ERROR - 2021-06-24 12:07:43 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:07:43 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:08:06 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:08:06 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:08:07 --> Query error: Unknown column 'ci_admin.is_active' in 'where clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
WHERE `ci_admin`.`is_active` = '1'
ORDER BY `ci_certificate_provisional`.`id` DESC
ERROR - 2021-06-24 12:11:10 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:11:10 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:11:11 --> Query error: Unknown column 'ci_admin.is_active' in 'where clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
WHERE `ci_admin`.`is_active` = '1'
ORDER BY `ci_certificate_provisional`.`id` DESC
ERROR - 2021-06-24 12:11:21 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:11:21 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:11:21 --> Query error: Unknown column 'ci_certificate_provisional.is_active' in 'where clause' - Invalid query: SELECT *
FROM `ci_certificate_provisional`
WHERE `ci_certificate_provisional`.`is_active` = '1'
ORDER BY `ci_certificate_provisional`.`id` DESC
ERROR - 2021-06-24 12:12:31 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:12:31 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 27
ERROR - 2021-06-24 12:14:07 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:14:07 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:14:31 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:14:31 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:16:58 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:16:58 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:11 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:11 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:30 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:30 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:17:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:20:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:20:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:21:15 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:21:15 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:22:12 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:22:12 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:24:10 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:24:10 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:24:46 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:24:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:28:05 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:28:05 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:43:34 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:43:34 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:45:09 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:45:09 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:45:46 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:45:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:47:06 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:47:06 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:47:13 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:47:13 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:51:26 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:51:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 09:21:28 --> 404 Page Not Found: admin/Certificate/change_status
ERROR - 2021-06-24 12:51:32 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:51:32 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 09:21:39 --> 404 Page Not Found: admin/Certificate/change_status
ERROR - 2021-06-24 12:51:56 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:51:56 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:14 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:14 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:28 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:28 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:35 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:35 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:38 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:38 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:42 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:42 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:52 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:52:52 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:53:57 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 12:53:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:13:54 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:13:54 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:16:18 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:16:18 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:16:21 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:16:21 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:17:40 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:17:40 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:17:51 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:17:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:18:45 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:18:45 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:20:01 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:20:01 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:20:51 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:20:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 09:50:55 --> 404 Page Not Found: admin/Certificate/edit
ERROR - 2021-06-24 13:20:57 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 13:20:57 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 14:36:34 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 14:36:34 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 14:36:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 14:36:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 15:59:56 --> Severity: Notice --> Array to string conversion D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 133
ERROR - 2021-06-24 12:31:01 --> 404 Page Not Found: Assets/dist
ERROR - 2021-06-24 16:02:06 --> Severity: Warning --> print_r() expects at least 1 parameter, 0 given D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 133
ERROR - 2021-06-24 13:06:41 --> Severity: error --> Exception: syntax error, unexpected ''created_at'' (T_CONSTANT_ENCAPSED_STRING), expecting ')' D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 189
ERROR - 2021-06-24 16:51:58 --> Severity: Warning --> implode(): Invalid arguments passed D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 137
ERROR - 2021-06-24 16:58:06 --> Severity: Warning --> implode(): Invalid arguments passed D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 137
ERROR - 2021-06-24 13:29:08 --> Severity: Compile Error --> Cannot use isset() on the result of an expression (you can use "null !== expression" instead) D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 137
ERROR - 2021-06-24 13:29:20 --> Severity: Compile Error --> Cannot use isset() on the result of an expression (you can use "null !== expression" instead) D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 137
ERROR - 2021-06-24 16:59:49 --> Severity: Warning --> count(): Parameter must be an array or an object that implements Countable D:\xampp\htdocs\cerrs\application\controllers\admin\Certificate.php 137
ERROR - 2021-06-24 17:07:29 --> Query error: Unknown column 'clinical_services' in 'field list' - Invalid query: INSERT INTO `ci_certificate_provisional` (`establishment`, `address1`, `address2`, `city`, `state`, `district`, `pin`, `std`, `telephone`, `mobile`, `fax`, `email`, `website`, `fname_owner`, `mname_owner`, `lname_owner`, `add1_owner`, `add2_owner`, `city_owner`, `state_owner`, `district_owner`, `pin_owner`, `std__owner`, `telephone_owner`, `mobile_owner`, `fax_owner`, `email_owner`, `website_owner`, `fname_person`, `mname_person`, `lname_person`, `address1_person`, `address2_person`, `city_person`, `state_person`, `district_person`, `pin_person`, `std_person`, `telephone_person`, `mobile_person`, `fax_person`, `email_person`, `website_person`, `ownership`, `ownership2`, `systems_of_medicine`, `clinical_services`, `clinical_establishment`, `created_at`, `created_by`) VALUES ('Metro Hospital', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '3', '1,6', '1', '1,2,18,19,20,22,24', '2021-06-24 : 05:06:29', '31')
ERROR - 2021-06-24 17:10:36 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:10:36 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:11:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:11:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:12:16 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:12:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:15:35 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:15:35 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:15:36 --> Severity: error --> Exception: Call to undefined function expolde() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 57
ERROR - 2021-06-24 17:16:38 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:16:38 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:16:38 --> Severity: Notice --> Undefined index:  D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 58
ERROR - 2021-06-24 17:17:14 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:17:14 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:17:15 --> Severity: Notice --> Undefined index:  D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 59
ERROR - 2021-06-24 17:17:46 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:17:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:17:47 --> Severity: Notice --> Undefined index:  D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 60
ERROR - 2021-06-24 17:18:52 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:18:52 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:20:04 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:20:04 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:20:18 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:20:18 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:08 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:08 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:21 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:21 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:42 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:25:42 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:27:10 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:27:10 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:28:50 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:28:50 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:30:14 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:30:14 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:30:26 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:30:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:14 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:14 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:51 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:51 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:58 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:32:58 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:33:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:33:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:33:41 --> Severity: Notice --> Undefined index:  D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 72
ERROR - 2021-06-24 17:34:26 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:34:26 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:35:45 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:35:45 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:40:13 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:40:13 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:40:29 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:40:29 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:41:10 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:41:10 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:41:28 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:41:28 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:43:48 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:43:48 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:44:16 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:44:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:46:01 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:46:01 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:46:53 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:46:53 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:46:53 --> Severity: Notice --> Undefined index: establishment_name D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 77
ERROR - 2021-06-24 17:46:53 --> Severity: Notice --> Undefined index: establishment_name D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_list.php 77
ERROR - 2021-06-24 17:47:08 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:47:08 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:47:30 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:47:30 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:47:52 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 17:47:52 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:29 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:29 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:31 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:31 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:38 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:38 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:41 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:41 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:46 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:12:46 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:14:03 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:14:03 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:16:03 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:16:03 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:16:16 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:16:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 27
ERROR - 2021-06-24 18:17:58 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 32
ERROR - 2021-06-24 18:17:58 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 32
ERROR - 2021-06-24 18:18:16 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:18:16 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:05 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:05 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:28 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:28 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:30 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:19:30 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:21:06 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:21:06 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:25:19 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:25:19 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 14:55:43 --> 404 Page Not Found: admin/Certificate/edit
ERROR - 2021-06-24 18:25:45 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:25:45 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:26:02 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:26:02 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:26:06 --> Severity: Notice --> Undefined variable: admin_roles D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
ERROR - 2021-06-24 18:26:06 --> Severity: Warning --> Invalid argument supplied for foreach() D:\xampp\htdocs\cerrs\application\views\admin\certificate\provisional_index.php 33
