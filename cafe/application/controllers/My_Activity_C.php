<?
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

  class My_Activity_C extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('My_Activity_M');
    }

    public function index() {
      // 세그먼트 기준
      switch($this->uri->segment(2)) {
        case 'post' : 
          $data['post'] = $this->My_Activity_M->get_post();
          $idx = $this->input->post('bd_id');
          $data['post_comment'] = $this->My_Activity_M->get_post_comment($idx);
          // $data['get_comment'] = $this->My_Activity_M->get_comment();
          $this->layout->custom_view('/My_Activity/Post_V', $data);
          break;
        case 'comment' : 
          $data['comment'] = $this->My_Activity_M->get_comment();
          $data['comment_total'] = $this->My_Activity_M->get_comment_total();
          $this->layout->custom_view('/My_Activity/Comment_V', $data);
          break;
        // case 'post_in_comment' : 
        //   $data['post_in_comment'] = $this->My_Activity_M->get_post_in_comment();
        //   $this->layout->custom_view('/My_Activity/Post_in_Comment_V', $data);
        //   break;
        case 'post_like' : 
          $data['post_like'] = $this->My_Activity_M->get_post_like();
          $this->layout->custom_view('/My_Activity/Post_Like_V', $data);
          break;
        case 'post_notlike' : 
          $data['post_notlike'] = $this->My_Activity_M->get_post_notlike();
          $this->layout->custom_view('/My_Activity/Post_NotLike_V', $data);
          break;
        case 'delete_post' : 
          $data['delete_post'] = $this->My_Activity_M->get_delete_post();
          $this->layout->custom_view('/My_Activity/Delete_Post_V', $data);
          break;
        default :
          break;
      }

    }

  }

?>