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
      $level_experience = [
        1 => ['min' => 0, 'max' => 1000, 'name' => '초보'],
        2 => ['min' => 1001, 'max' => 2000, 'name' => '중수'],
        3 => ['min' => 2001, 'max' => 3000, 'name' => '고수'],
        4 => ['min' => 3001, 'max' => 4000, 'name' => '마스터'],
        5 => ['min' => 4001, 'max' => 5000, 'name' => '그랜드마스터'],
      ];
    }

    function custom_view( $view = "", $page_view_data = [] ) {

      // 헤더에서 사용할 데이터 뽑기
      $side_view_data['login_total'] = $this->login_total();

      $side_view_data['post_total'] = $this->post_comment_total('boards');
      $side_view_data['comment_total'] = $this->post_comment_total('boards_comment');

      $side_view_data['point_total'] = $this->point_exp_total('point');
      $side_view_data['exp_total'] = $this->point_exp_total('exp');
      $side_view_data['level_converter'] = $this->level_converter($this->point_exp_total('exp'));
      
      $side_view_data['freeboard_total'] = $this->board_total('자유게시판');
      $side_view_data['freeboard_total'] = $this->board_total('자유게시판');
      $side_view_data['freeboard_total'] = $this->board_total('자유게시판');

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