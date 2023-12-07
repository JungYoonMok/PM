<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Free_board_Detail_C extends CI_Controller {

  public function __construct() {
    parent::__construct();

    $this->load->model('Free_Board_Detail_M', 'FBM');
  }

  public function index() {
    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
  }

  public function post_delete() {
    $result =  $this->FBM->post_delete();
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '게시글 삭제 성공' ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '게시글 삭제 실패' ]);
    }
  }

  public function show($idx) {
    // 페이지네이션
    $config['base_url'] = "/freeboard/" . $idx . "/"; // 기본 URL 설정
    $config['total_rows'] = $this->FBM->pagination($idx); // 전체 행의 수
    $data['prev'] = $this->FBM->prev_post($idx);
    $data['next'] = $this->FBM->next_post($idx);
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
    $config['per_page'] = 5; // 페이지당 표시할 행의 수
    $config['uri_segment'] = 3; // URL의 몇 번째 세그먼트에 페이지 번호가 포함될지 설정
    $config['num_links'] = 3; // 현재 페이지 양쪽에 표시될 "숫자" 링크의 수
    // 페이지 숫자 표시
    // $config['display_pages'] = TRUE;
    // rel 속성 제거
    // $config['attributes']['rel'] = FALSE;
    // 좌우 화살표 표시
    $config["next_tag_open"] = "<div class='hidden'>";
    $config["next_tag_close"] = "</div>";
    $config["prev_tag_open"] = "<div class='hidden'>";
    $config["prev_tag_close"] = "</div>";
    // 숫자링크 커스텀
    $config["num_tag_open"] = "<div class='font-bold border py-2 px-5 rounded border-gray-500 bg-[#3f3f3f] shadow-xl'>";
    $config["num_tag_close"] = "</div>";
    // 전체 틀
    $config['full_tag_open'] = '<div class=
      "pagination bg-[#2f2f2f] rounded flex place-items-center justify-center gap-5 duration-200"
      >';
    $config['full_tag_close'] = '</div>';
    // 현제 페이지
    $config['cur_tag_open'] = "<div class='font-bold border py-2 px-5 rounded border-gray-500 bg-[#1f1f1f] shadow-xl'>";
    $config['cur_tag_close'] = "</div>";
    // 처음으로, 마지막으로
    $config['first_link'] = '처음';
    $config['first_tag_open'] = '<div>';
    $config['first_tag_close'] = '</div>';
    $config['last_link'] = '마지막';
    $config['last_tag_open'] = '<div>';
    $config['last_tag_close'] = '</div>';
    // 페이지 이동시 화면이동
    // $config['suffix'] = '#comments';
    // 첫 번째 페이지는 베이스 URL과 겹치므로 따로 추가
    // $config['first_url'] = $config['base_url'].'1#comments';

    $this->pagination->initialize($config); // 설정을 라이브러리에 초기화

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
    $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
    // 페이지네이션

    $data['post'] = $this->FBM->get_post($idx);
    $data['user'] = $this->FBM->get_user($data['post']->user_id);
    $data['get_post'] = $this->FBM->get_post_comment('boards', $data['post']->user_id);
    $data['get_comment'] = $this->FBM->get_post_comment('boards_comment', $data['post']->user_id);

    $data['file'] = $this->FBM->get_file($idx);

    $data['user_point'] = $this->FBM->point_exp_total('point', $data['post']->user_id);
    $data['user_exp'] = $this->FBM->point_exp_total('exp', $data['post']->user_id);
    
    $data['comment'] = $this->FBM->get_comments($idx, $config['per_page'], $page);
    $data['list'] = $this->db->get_where('boards', ['board_type' => 'freeboard'])->result();

    $data['level_converter'] = $this->level_converter($this->point_exp_total('exp'));

    // 게시글 정보 등
    $this->FBM->board_hit_plus($idx); // 조회수 증가
    $data['hit'] = $this->FBM->board_hit_get($idx); // 조회수 가져오기
    $data['comment_count'] = $this->FBM->board_comment_count($idx); // 댓글 수 가져오기
    $data['like_count1'] = $this->FBM->board_like_get1($idx); // 좋아요 및 싫어요 가져오기
    $data['like_count2'] = $this->FBM->board_like_get2($idx); // 좋아요 및 싫어요 가져오기

    $like_value = $this->FBM->board_like_data($idx); // 투표 정보
    if(!empty($like_value)) {
      $data['like_value'] = $like_value->like_type;
    } else {
      $data['like_value'] = 'none';
    }
    // if($like_value->like_type == true) {
    //   $data['like_value'] = '좋아요';
    // } else {
    //   $data['like_value'] = '싫어요';
    // }
    
    $this->layout->custom_view('board/free_board_detail_v', $data);
  }

  public function point_exp_total($type) { // 경험치, 포인트 합계
    $this->db->select_sum($type);
    $this->db->where('members_user_id', $this->session->userdata('user_id'));

    $total_count = $this->db->get('point_exp_log');
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

  public function comment_create() {
    // if (!$this->input->is_ajax_request()) {
    //   show_error('AJAX 요청만 가능합니다.', 403);
    // }

    // 폼 벨리데이션으로 폼의 필수값을 지정
    $this->form_validation->set_rules('board_id', 'Board_id', 'required');
    $this->form_validation->set_rules('board_type', 'Board_type', 'required');
    $this->form_validation->set_rules('contents', 'Contents', 'required');
    $this->form_validation->set_rules('user_id', 'User_id', 'required');

    if ($this->form_validation->run()) {

      // if ($result) {
      //   echo json_encode(['status' => 'success', 'message' => '댓글이 추가되었습니다.']);
      // } else {
      //   echo json_encode(['status' => 'error', 'message' => '댓글 추가에 실패했습니다.']);
      // }
      $board_id = $this->input->post('board_id');

      // board 라는 별칭 안에 store를 실행
      $this->FBM->comments_create();

      // 정상적이면 리다이렉트 실행
      redirect("/freeboard/" . $board_id);

    } else {
      echo "Board Create Error..";
    }
  }

  public function reply_comment_create() {
    $this->FBM->reply_create();
  }

  public function reply_update() {
    $data = [
      'idx' => $this->input->post('idx'),
      'content' => $this->input->post('content'),
      'update_date' => date("Y-m-d H:i:s")
    ];

    $result = $this->FBM->reply_update($data);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '댓글 수정 성공' ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '댓글 수정 실패']);
    }
  }

  public function reply_delete() {
    $idx = $this->input->post('idx');
    $result = $this->FBM->reply_delete($idx);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '댓글 삭제 성공' ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '댓글 삭제 실패' ]);
    }
  }

  public function reply_problem() {
    $data = [
      'idx' => $this->input->post('idx'),
      'content' => $this->input->post('content'),
      'update_date' => date("Y-m-d H:i:s")
    ];

    $result = $this->FBM->reply_problem($data);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '댓글 수정 성공' ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '댓글 수정 실패']);
    }
  }

  // 좋아요, 싫어요 클릭
  public function board_like() {
    $data = [
      'boards_idx' => $this->input->post('boards_idx'),
      'like_type' => $this->input->post('like_type'),
      'user_id' => $this->session->userdata('user_id'),
      'regdate' => date("Y-m-d H:i:s"),
    ];

    $check = $this->FBM->board_like_check($data);
    if($check['state'] == false) {
        echo json_encode([ 'state' => FALSE, 'message' => '계정당 한 번만 투표할 수 있습니다' ]);
      return;
    }

    $result = $this->FBM->board_like($data);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '성공적으로 반영했습니다' ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '반영에 실패했습니다' ]);
    }
  }

}

?>