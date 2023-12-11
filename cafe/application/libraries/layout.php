<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

  class Layout {

    public function __construct() {
      $this->obj = &get_instance(); // ci 코어 가져오기

      // $this->obj->load->model("user_model");
    }

    public function post_comment_total($type) { // 게시글 및 댓글 총 개수
      $total_count = $this->obj->db->get_where($type, ["user_id" => $this->obj->session->userdata("user_id")]);
      if($total_count->num_rows() > 0) {
        return $total_count->num_rows() ?? 0;
      } else {
        return 0;
      }
    }

    public function board_total($name) { // 게시글 총 개수
      $total_count = $this->obj->db->get_where("boards", ["board_type" => $name]);
      if($total_count->num_rows() > 0) {

        // $tow = date("Y-m-d", strtotime("-1 day"));
        $count = 0;
        foreach($total_count->result() as $row) {
          if(substr($row->regdate, 0, 10) == date("Y-m-d")) {
            $count++;
          }
        }
        return $count;
      } else {
        return 0;
      }
    }

    public function login_total() { // 로그인 총 횟수
      $total_count = $this->obj->db->get_where("members_login_logout", ["state" => 'login', 'user_id' => $this->obj->session->userdata("user_id")]);
      if($total_count->num_rows() > 0) {
        return $total_count->num_rows() ?? 0;
      } else {
        return 0;
      }
    }

    public function point_exp_total($type) { // 경험치, 포인트 합계
      $this->obj->db->select_sum($type);
      $this->obj->db->where('members_user_id', $this->obj->session->userdata('user_id'));

      $total_count = $this->obj->db->get('point_exp_log');
      if($total_count->num_rows() > 0) {
        return $total_count->row()->$type ?? 0;
      } else {
        return 0;
      }
    }

    public function level_converter($exp) { // 경험치 레벨 변환
      if ($exp < 5000) {
        $result = ["level" => 0, "start_exp" => 0, "end_exp" => 5000, "previous_level_end_exp" => 0, "exp" => $exp];
      } elseif ($exp < 10000) {
        $result = ["level" => 1, "start_exp" => 5000, "end_exp" => 10000, "previous_level_end_exp" => 5000, "exp" => $exp];
      } elseif ($exp < 20000) {
        $result = ["level" => 2, "start_exp" => 10000, "end_exp" => 20000, "previous_level_end_exp" => 10000, "exp" => $exp];
      } elseif ($exp < 30000) {
        $result = ["level" => 3, "start_exp" => 20000, "end_exp" => 30000, "previous_level_end_exp" => 20000, "exp" => $exp];
      } elseif ($exp < 40000) {
        $result = ["level" => 4, "start_exp" => 30000, "end_exp" => 40000, "previous_level_end_exp" => 30000, "exp" => $exp];
      } elseif ($exp < 50000) {
        $result = ["level" => 5, "start_exp" => 40000, "end_exp" => 50000, "previous_level_end_exp" => 40000, "exp" => $exp];
      } elseif ($exp < 60000) {
        $result = ["level" => 6, "start_exp" => 50000, "end_exp" => 60000, "previous_level_end_exp" => 50000, "exp" => $exp];
      } elseif ($exp < 70000) {
        $result = ["level" => 7, "start_exp" => 60000, "end_exp" => 70000, "previous_level_end_exp" => 60000, "exp" => $exp];
      } elseif ($exp < 80000) {
        $result = ["level" => 8, "start_exp" => 70000, "end_exp" => 80000, "previous_level_end_exp" => 70000, "exp" => $exp];
      } elseif ($exp < 90000) {
        $result = ["level" => 9, "start_exp" => 80000, "end_exp" => 90000, "previous_level_end_exp" => 80000, "exp" => $exp];
      } else {
        // 만렙 처리
        $result = ["level" => '만렙', "start_exp" => 90000, "end_exp" => 100000, "previous_level_end_exp" => 90000, "exp" => $exp];
      }
      return $result;
    }

    public function site_visit($type) { // 방문자
      $data = $this->obj->db->get_where("members_login_logout", ["state" => 'login']);

      if ($type == 'today') {
        $count = 0;
        foreach($data->result() as $row) {
          $q = substr($row->regdate, 0, 10);
          if($q == date("Y-m-d")) {
            $count++;
          }
        }
      } else {
        $count = 0;
        foreach($data->result() as $row) {
          $q = substr($row->regdate, 0, 10);
          $q_minus_one = date($q, strtotime("-1 day"));
          if($q_minus_one == date("Y-m-d", strtotime("-1 day"))) {
            $count++;
          }
        }
      }
      return $count ?? 0;
    }

    public function user_register($type) { // 회원가입
      $data = $this->obj->db->get("members");

      if ($type == 'today') {
        $count = 0;
        foreach($data->result() as $row) {
          $q = substr($row->regdate, 0, 10);
          if($q == date("Y-m-d")) {
            $count++;
          }
        }
      } else {
        $count = 0;
        foreach($data->result() as $row) {
          $q = substr($row->regdate, 0, 10);
          $q_minus_one = date($q, strtotime("-1 day"));
          if($q_minus_one == date("Y-m-d", strtotime("-1 day"))) {
            $count++;
          }
        }
      }
      return $count ?? 0;
    }

    public function visit_total() { // 방문 총 횟수
      $total_count = $this->obj->db->get_where("members_login_logout", ["state" => 'login']);
      return $total_count->num_rows() ?? 0;
    }

    public function member_total() { // 방문 회원수
      $total_count = $this->obj->db->get("members");
      return $total_count->num_rows() ?? 0;
    }

    function custom_view( $view = "", $page_view_data = [] ) {

      // 헤더에서 사용할 데이터 뽑기
      $side_view_data['login_total'] = $this->login_total();

      $side_view_data['post_total'] = $this->post_comment_total('boards');
      $side_view_data['comment_total'] = $this->post_comment_total('boards_comment');

      $side_view_data['point_total'] = $this->point_exp_total('point');
      $side_view_data['exp_total'] = $this->point_exp_total('exp');
      $side_view_data['level_converter'] = $this->level_converter($this->point_exp_total('exp'));
      
      $side_view_data['freeboard_total'] = $this->board_total('freeboard');
      $side_view_data['freeboard_total'] = $this->board_total('freeboard');
      $side_view_data['freeboard_total'] = $this->board_total('freeboard');
      
      $side_view_data['site_visit_today'] = $this->site_visit('today');
      $side_view_data['site_visit_yesterday'] = $this->site_visit('yesterday');

      $side_view_data['user_register_today'] = $this->user_register('today');
      $side_view_data['user_register_yesterday'] = $this->user_register('yesterday');

      $side_view_data['visit_total'] = $this->visit_total();
      $side_view_data['member_total'] = $this->member_total();

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