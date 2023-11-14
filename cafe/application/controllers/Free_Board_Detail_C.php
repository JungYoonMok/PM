<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Free_board_Detail_C extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Free_Board_Detail_M', 'FBM');
  }

  public function show($idx)
  {
    // 페이지네이션
    $config['base_url'] = "/freeboard/" . $idx . "/"; // 기본 URL 설정
    $config['total_rows'] = $this->db->count_all('boards_comment'); // 전체 행의 수
    $config['per_page'] = 10; // 페이지당 표시할 행의 수
    $config['uri_segment'] = 3; // URL의 몇 번째 세그먼트에 페이지 번호가 포함될지 설정
    $config['num_links'] = 1; // 현재 페이지 양쪽에 표시될 "숫자" 링크의 수

    // 전체 틀
    $config['full_tag_open'] = '<div class=
      "pagination bg-[#2f2f2f] rounded flex place-items-center justify-center gap-5 duration-200"
      >';
    $config['full_tag_close'] = '</div>';
    // 현제 페이지
    $config['cur_tag_open'] = "<div class='font-bold border py-2 px-5 rounded border-gray-500 bg-[#3f3f3f] shadow-xl'>";
    $config['cur_tag_close'] = "</div>";
    // 처음
    $config['first_link'] = '처음';
    $config['first_tag_open'] = '<div>';
    $config['first_tag_close'] = '</div>';
    // 마지막
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

    $data['post'] = $this->FBM->get($idx);
    $data['comment'] = $this->FBM->get_comments($idx, $config['per_page'], $page);
    $data['list'] = $this->db->get_where('boards', ['board_type' => '자유게시판'])->result();
    $this->layout->custom_view('board/free_board_detail_v', $data);
  }

  public function comment_create()
  {
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

      // board 라는 별칭 안에 store를 실행
      $this->FBM->comments_create();

      // 정상적이면 리다이렉트 실행
      redirect("/freeboard/" . $this->input->post('board_id'));

    } else {
      echo "Board Create Error..";
    }
  }

  public function reply_comment_create()
  {
    // $this->FBM->comments_create();
    $this->FBM->reply_create();
  }

  public function board_like()
  {
    $data = [
      'boards_idx' => $this->input->post('boards_idx'),
      'like_type' => $this->input->post('like_type'),
      'user_id' => $this->session->userdata('user_id'),
      'regdate' => date("Y-m-d H:i:s"),
    ];

    $this->FBM-->board_like($data);
  }

}

?>