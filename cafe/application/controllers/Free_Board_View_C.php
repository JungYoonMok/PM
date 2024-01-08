<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_C extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
    
    $this->load->model('Free_Board_View_M', 'FBM');
  }

  public $seg_value = 'freeboard';
  
  public function list_notice() {
    $seg = 'notice';
    $this->seg_value = 'notice';

    // 페이지네이션
    $config['base_url'] = "/$seg/list"; // 기본 URL 설정
    $config['total_rows'] = $this->FBM->pagination($seg);
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
    $config['per_page'] = $this->input->get('limit'); // 페이지당 표시할 행의 수
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
    $config['first_link'] = '<span class="material-symbols-outlined">first_page</span>';
    $config['first_tag_open'] = '<div>';
    $config['first_tag_close'] = '</div>';
    $config['last_link'] = '<span class="material-symbols-outlined">last_page</span>';
    $config['last_tag_open'] = '<div>';
    $config['last_tag_close'] = '</div>';
    // 페이지 이동시 화면이동
    // $config['suffix'] = '#comments';
    // 첫 번째 페이지는 베이스 URL과 겹치므로 따로 추가
    // $config['first_url'] = $config['base_url'].'1#comments';

    $this->pagination->initialize($config); // 설정을 라이브러리에 초기화
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
    
    $list_type = $this->input->get('type');
    $list = $this->FBM->GetBoardList($seg, $config['per_page'], $page, $list_type);
    $total = $this->FBM->GetBoardTotal($seg);

    // AJAX 요청에 대한 응답
    if($this->input->is_ajax_request()) {
      echo json_encode(['state' => TRUE, 'list' => $list, 'total' => $total, 'links' => $this->pagination->create_links() ]);
    } else {
      // 일반 페이지 로드 요청에 대한 처리
      $data['total'] = $total;
      $data['list'] = $list;
      $data['links'] = $this->pagination->create_links();

      $this->layout->custom_view('board/free_board_view_v', $data);
    }
    
  }

  public function list_freeboard() {
    $seg = 'freeboard';
    $this->seg_value = 'freeboard';
    // 페이지네이션
    $config['base_url'] = "/$seg/list"; // 기본 URL 설정
    $config['total_rows'] = $this->FBM->pagination($seg);
    
    // $config['per_page'] = 5; // 페이지당 표시할 행의 수
    $config['per_page'] =  $this->input->get('limit'); // 페이지당 표시할 행의 수
    
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
    $config['first_link'] = '<span class="material-symbols-outlined">first_page</span>';
    $config['first_tag_open'] = '<div>';
    $config['first_tag_close'] = '</div>';
    $config['last_link'] = '<span class="material-symbols-outlined">last_page</span>';
    $config['last_tag_open'] = '<div>';
    $config['last_tag_close'] = '</div>';
    // 페이지 이동시 화면이동
    // $config['suffix'] = '#comments';
    // 첫 번째 페이지는 베이스 URL과 겹치므로 따로 추가
    // $config['first_url'] = $config['base_url'].'1#comments';

    $this->pagination->initialize($config); // 설정을 라이브러리에 초기화
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
    
    $list_type = $this->input->get('type');
    $list = $this->FBM->GetBoardList($seg, $config['per_page'], $page, $list_type);
    $notice_list = $this->FBM->notice_list();
    $total = $this->FBM->GetBoardTotal($seg);

    $result = [
      'state' => TRUE,
      'list' => $list,
      'notice_list' => $notice_list,
      'total' => $total,
      'links' => $this->pagination->create_links(),
    ];

    // AJAX 요청에 대한 응답
    if($this->input->is_ajax_request()) {
      echo json_encode($result);
    } else {
      // 일반 페이지 로드 요청에 대한 처리
      $data['total'] = $total;
      $data['list'] = $list;
      $data['notice_list'] = $notice_list;
      $data['links'] = $this->pagination->create_links();

      $this->layout->custom_view('board/free_board_view_v', $data);
    }
    
  }

  public function list_hellow() {
    $seg = 'hellow';
    $this->seg_value = 'hellow';
    // 페이지네이션
    $config['base_url'] = "/$seg/list"; // 기본 URL 설정
    $config['total_rows'] = $this->FBM->pagination($seg);
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
    $config['per_page'] = $this->input->get('limit'); // 페이지당 표시할 행의 수
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
    $config['first_link'] = '<span class="material-symbols-outlined">first_page</span>';
    $config['first_tag_open'] = '<div>';
    $config['first_tag_close'] = '</div>';
    $config['last_link'] = '<span class="material-symbols-outlined">last_page</span>';
    $config['last_tag_open'] = '<div>';
    $config['last_tag_close'] = '</div>';
    // 페이지 이동시 화면이동
    // $config['suffix'] = '#comments';
    // 첫 번째 페이지는 베이스 URL과 겹치므로 따로 추가
    // $config['first_url'] = $config['base_url'].'1#comments';

    $this->pagination->initialize($config); // 설정을 라이브러리에 초기화
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
    
    $list_type = $this->input->get('type');
    $list = $this->FBM->GetBoardList($seg, $config['per_page'], $page, $list_type);
    $total = $this->FBM->GetBoardTotal($seg);
    $notice_list = $this->FBM->notice_list();

    // AJAX 요청에 대한 응답
    if($this->input->is_ajax_request()) {
      echo json_encode(['state' => TRUE, 'list' => $list, 'total' => $total, 'links' => $this->pagination->create_links() ]);
    } else {
      // 일반 페이지 로드 요청에 대한 처리
      $data['total'] = $total;
      $data['list'] = $list;
      $data['notice_list'] = $notice_list;
      $data['links'] = $this->pagination->create_links();

      $this->layout->custom_view('board/free_board_view_v', $data);
    }
    
  }
  
  public function search() {
    $seg = $this->input->get('segment');
    $type = $this->input->get('type');
    $search_text = $this->input->get('text');

    // 페이지네이션
    $config['base_url'] = "/$seg/list/search"; // 기본 URL 설정
    // $config['base_url'] = "/freeboard/list"; // 기본 URL 설정
    $config['total_rows'] = $this->FBM->pagination_seach($seg, $type, $search_text);
    // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
    $config['per_page'] = $this->input->get('limit'); // 페이지당 표시할 행의 수
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
    
    $list_type = $this->input->get('list_type');
    $data['list'] = $this->FBM->search($seg, $type, $search_text, $config['per_page'], $page, $list_type);
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