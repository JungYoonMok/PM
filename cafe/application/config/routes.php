<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// 라우트
$route['notice/list'] = 'free_board_view_c/list';
$route['notice/(:num)'] = 'free_board_detail_c/show/$1';

$route['hellow/list'] = 'free_board_view_c/list';
$route['hellow/(:num)'] = 'free_board_detail_c/show/$1';

$route['freeboard/list'] = 'free_board_view_c/list';
$route['freeboard/list/(:num)'] = 'free_board_view_c/list/$1';
$route['freeboard/(:num)'] = 'free_board_detail_c/show/$1';
$route['freeboard/(:num)/(:num)'] = 'free_board_detail_c/show/$1/$1';

// 글쓰기
$route['post_create'] = 'free_board_create_c';
$route['post_create_reply/(:num)'] = 'free_board_create_c/create_reply_index/$1';

// 업데이트
$route['freeboard/update/(:num)'] = 'free_board_update_c/update/$1';

$route['free_board_detail/comment_create'] = 'free_board_detail_c/comment_create';
$route['free_board_detail/reply_comment_create'] = 'free_board_detail_c/reply_comment_create';
// $route['free_board_detail/board_like'] = 'free_board_detail_c/board_like';

// 내 활동 정보 라우트
$route['my_activity/post'] = 'my_activity_c/post';
$route['my_activity/post/(:num)'] = 'my_activity_c/post/$1';

$route['my_activity/comment'] = 'my_activity_c/comment';
$route['my_activity/comment/(:num)'] = 'my_activity_c/comment/$1';

// $route['my_activity/post_in_comment'] = 'my_activity_c';
// $route['my_activity/post_in_comment/(:num)'] = 'my_activity_c/post_in_comment/$1';

$route['my_activity/post_like'] = 'my_activity_c/post_like';
$route['my_activity/post_like/(:num)'] = 'my_activity_c/post_like/$1';

$route['my_activity/post_notlike'] = 'my_activity_c/post_notlike';
$route['my_activity/post_notlike/(:num)'] = 'my_activity_c/post_notlike/$1';

$route['my_activity/delete_post'] = 'my_activity_c/delete_post';
$route['my_activity/delete_post/(:num)'] = 'my_activity_c/delete_post/$1';

$route['login'] = '/login_C';
$route['register'] = '/register_C';