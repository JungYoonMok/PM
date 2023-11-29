<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

  class Layout {

    public function __construct() {
      $this->obj = &get_instance(); // ci 코어 가져오기
      // $this->obj->load->model("user_model");
    }

    public function post_total() { // 게시글 총 개수
      $total_count = $this->obj->db->get_where("boards", ["user_id" => $this->obj->session->userdata("user_id")]);
      if($total_count->num_rows() > 0) {
        return $total_count->num_rows();
      } else {
        return 0;
      }
    }

    public function commnet_total() { // 댓글 총 개수
      $total_count = $this->obj->db->get_where('boards_comment', ['user_id' => $this->obj->session->userdata('user_id') ]);
      if($total_count->num_rows() > 0) {
        return $total_count->num_rows();
      } else {
        return 0;
      }
    }

    public function freeboard_total() { // 게시글 총 개수
      $total_count = $this->obj->db->get_where("boards", ["board_type" => '자유게시판']);
      if($total_count->num_rows() > 0) {

        $count = 0;
        foreach($total_count->result() as $row) {
          $one = $row->regdate;
          $one2 = substr($one, 0, 10);
          $tow = date("Y-m-d");
          if($one2 == $tow) {
            $count++;
          }
        }
        // $tow = date("Y-m-d", strtotime("-1 day"));
        return $count;
      } else {
        return 0;
      }
    }

    public function login_total() { // 로그인 총 횟수
      $total_count = $this->obj->db->get_where("members_login_logout", ["state" => 'login', 'user_id' => $this->obj->session->userdata("user_id")]);
      if($total_count->num_rows() > 0) {
        return $total_count->num_rows();
      } else {
        return 0;
      }
    }

    function custom_view( $view = "", $page_view_data = [] ) {

      // 헤더에서 사용할 데이터 뽑기
      $side_view_data['login_total'] = $this->login_total();
      $side_view_data['post_total'] = $this->post_total();
      $side_view_data['comment_total'] = $this->commnet_total();
      
      $side_view_data['freeboard_total'] = $this->freeboard_total();
      $side_view_data['freeboard_total'] = $this->freeboard_total();
      $side_view_data['freeboard_total'] = $this->freeboard_total();

      //사이드에서 사용할 데이터 뽑기
      $layout_view_data = [
        "contents" => $this->obj->load->view($view, $page_view_data, TRUE),
        "header" => $this->obj->load->view('header', NULL, TRUE),
        "side" => $this->obj->load->view('side_bar', $side_view_data, TRUE),
      ];

      $this->obj->load->view("/layouts/main_layout_view", $layout_view_data);
    }

  }
?>