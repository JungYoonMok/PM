<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Free_Board_View_M', 'FBM');
  }

  public function index() {
    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
  }
  
  public function list() {
    // 페이지네이션
    $config['base_url'] = "/freeboard/list"; // 기본 URL 설정
    $config['total_rows'] = $this->db->count_all('boards'); // 전체 행의 수
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
    $config['per_page'] = 10; // 페이지당 표시할 행의 수
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
    
    $list = $this->FBM->GetBoardList($config['per_page'], $page);
    $total = $this->FBM->GetBoardTotal();

    // AJAX 요청에 대한 응답
    if($this->input->is_ajax_request()) {
      echo json_encode(['state' => TRUE, 'list' => $list, 'total' => $total, 'links' => $this->pagination->create_links() ]);
    } else {
      // 일반 페이지 로드 요청에 대한 처리
      $data['list'] = $list;
      $data['total'] = $total;
      $data['links'] = $this->pagination->create_links();

      $this->layout->custom_view('board/free_board_view_v', $data);
    }
  }
  
  public function search() {
    $config['base_url'] = "/freeboard/list"; // 기본 URL 설정
    $config['total_rows'] = $this->db->count_all('boards'); // 전체 행의 수
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
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

    $config['per_page'] = 15; // 페이지당 표시할 행의 수

    $this->pagination->initialize($config); // 설정을 라이브러리에 초기화

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호

    $type = $this->input->get('type');
    $search_text = $this->input->get('text');
    
    $data['list'] = $this->FBM->search($type, $search_text, $config['per_page'], $page);
    if(!empty($data['list'])) {
      echo json_encode(['state' => TRUE, 'data' => $data['list'], 'links' => $this->pagination->create_links() ]);
    } else {
      echo json_encode(['state' => FALSE, 'message' => '검색 결과가 없습니다.']);
    }
  }

  public function post_reply_show() {
    $idx = $this->input->post('idx');
    $replies = $this->FBM->get_replies($idx);
  
    if(!empty($replies)) {
      echo json_encode(['state' => TRUE, 'replies' => $replies]);
    } else {
      echo json_encode(['state' => FALSE, 'message' => '답글이 없습니다.']);
    }
  }

}
?>