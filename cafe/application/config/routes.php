<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 라우터 커스텀
$route['freeboard'] = 'free_board_view_c';
$route['freeboard/(:num)'] = 'free_board_detail_c/show/$1';
$route['freeboard/(:num)/(:num)'] = 'free_board_detail_c/show/$1/$1';

$route['free_board_detail/comment_create'] = 'free_board_detail_c/comment_create';
$route['free_board_detail/reply_comment_create'] = 'free_board_detail_c/reply_comment_create';
// $route['free_board_detail/board_like'] = 'free_board_detail_c/board_like';

$route['login'] = '/login_C';
$route['register'] = '/register_C';
