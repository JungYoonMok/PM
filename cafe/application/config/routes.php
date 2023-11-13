<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 라우터 커스텀
$route['freeboard'] = 'free_board_view';
$route['freeboard/(:num)'] = 'free_board_detail/show/$1';
$route['freeboard/(:num)/(:num)'] = 'free_board_detail/show/$1/$1';

$route['login'] = '/login_C';
$route['register'] = '/register_C';
