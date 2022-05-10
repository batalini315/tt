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

$route['login'] = 'admin/login';
$route['login/verify'] = 'admin/login/verify';
$route['outlogin'] = 'admin/login/outlogin';
$route['admin/users'] = 'admin/users';
$route['admin/users/new'] = 'admin/users/new';
$route['admin/user/delete/(:any)'] = 'admin/users/delete/$1';
$route['admin/user/(:any)'] = 'admin/users/update/$1';
$route['admin/users/group/(:any)'] = 'admin/users/get_users_group/$1';
$route['admin/teachers'] = 'admin/teacher';
$route['admin/teacher/new'] = 'admin/teacher/new';
$route['admin/teacher/delete'] = 'admin/teacher/delete';
$route['admin/teacher/(:any)'] = 'admin/teacher/update/$1';
$route['admin/tests'] = 'admin/test';
$route['admin/test/new'] = 'admin/test/new';
$route['admin/test/delete'] = 'admin/test/delete';
$route['admin/test/(:any)'] = 'admin/test/update/$1';
$route['admin/tasks'] = 'admin/task';
$route['admin/tasks/(:any)'] = 'admin/task/index/$1';
$route['admin/task/new'] = 'admin/task/new';
$route['admin/task/delete'] = 'admin/task/delete';
$route['admin/task/(:any)'] = 'admin/task/update/$1';
$route['admin/types'] = 'admin/type';
$route['admin/type/new'] = 'admin/type/new';
$route['admin/type/delete'] = 'admin/type/delete';
$route['admin/type/(:any)'] = 'admin/type/update/$1';
$route['admin/answers'] = 'admin/answer';
$route['admin/answer/new'] = 'admin/answer/new';
$route['admin/answer/delete'] = 'admin/answer/delete'; 
$route['admin/answer/(:any)'] = 'admin/answer/update/$1';
$route['admin/answers/user/(:any)'] = 'admin/answer/user/$1';
$route['admin/answer/(:any)/(:any)'] = 'admin/answer/result/$1/$2';
$route['admin/group'] = 'admin/group/create';
$route['admin/group/(:any)'] = 'admin/group/update/$1';
$route['admin/group/delete/(:any)'] = 'admin/group/delete/$1';
$route['admin/groups'] = 'admin/groups';
$route['admin/grouptest'] = 'admin/groupstests/create';
$route['admin/grouptest/(:any)'] = 'admin/groupstests/create/$1';
$route['admin/grouptest/(:any)/(:any)'] = 'admin/groupstests/create/$1/$2';
$route['admin/groupstests/(:any)'] = 'admin/groupstests/update/$1';
$route['admin/grouptest/delete/(:any)'] = 'admin/groupstests/delete/$1';
$route['admin/groupstests'] = 'admin/groupstests';
$route['admin/grouptests/(:any)'] = 'admin/groupstests/tests/$1';
$route['admin/admin'] = 'admin/admin';
$route['test'] = 'test';
$route['tasks'] = 'tasks';
$route['cabinet'] = 'user/cabinet';
$route['rating'] = 'user/rating';
$route['asks/(:any)'] = 'user/cabinet/asks/$1';
$route['answer/(:any)'] = 'user/cabinet/answer/$1';
$route['home'] = 'home';

$route['users/authenticate'] = 'users/authenticate';
// $route['users/(:any)'] = 'users/view/$1';
$route['users'] = 'users';
$route['default_controller'] = 'home';
$route['(:any)'] = 'pages/view/$1';

// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;
