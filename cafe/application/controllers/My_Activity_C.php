<?
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

  class My_Activity_C extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('My_Activity_M');
    }      

    public function index() {

    }

    public function post() {
      // 페이지네이션
      $config['base_url'] = "/my_activity/post"; // 기본 URL 설정
      $config['total_rows'] = $this->db->count_all('boards'); // 전체 행의 수
      // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
      $config['per_page'] = 20; // 페이지당 표시할 행의 수
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
      
      $data['post'] = $this->My_Activity_M->get_post($config['per_page'], $page);
      $this->layout->custom_view('/My_Activity/Post_V', $data);
    }

    public function comment() {
      // 페이지네이션
      $config['base_url'] = "/my_activity/comment"; // 기본 URL 설정
      $config['total_rows'] = $this->db->count_all('boards_comment'); // 전체 행의 수
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
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      // 페이지네이션

      $data['comment'] = $this->My_Activity_M->get_comment($config['per_page'], $page);
      $data['comment_total'] = $this->My_Activity_M->get_comment_total();
      $this->layout->custom_view('/My_Activity/Comment_V', $data);
    }

    public function post_like() {
      // 페이지네이션
      $config['base_url'] = "/my_activity/post_like"; // 기본 URL 설정
      $config['total_rows'] = $this->db->count_all('board_like'); // 전체 행의 수
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
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      // 페이지네이션
      
      $data['post_like'] = $this->My_Activity_M->get_post_like($config['per_page'], $page);
      $this->layout->custom_view('/My_Activity/Post_Like_V', $data);
    }

    public function post_notlike() {
      // 페이지네이션
      $config['base_url'] = "/my_activity/post_notlike"; // 기본 URL 설정
      $config['total_rows'] = $this->db->count_all('board_like'); // 전체 행의 수
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
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      // 페이지네이션
      
      $data['post_notlike'] = $this->My_Activity_M->get_post_notlike($config['per_page'], $page);
      $this->layout->custom_view('/My_Activity/Post_NotLike_V', $data);
    }

    public function delete_post() {
      // 페이지네이션
      $config['base_url'] = "/my_activity/delete_post"; // 기본 URL 설정
      $config['total_rows'] = $this->db->count_all('boards'); // 전체 행의 수
      // $config['total_rows'] = $this->FBM->board_comment_count_pagination($idx); // 전체 행의 수
      $config['per_page'] = 20; // 페이지당 표시할 행의 수
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
      
      $data['delete_post'] = $this->My_Activity_M->get_delete_post($config['per_page'], $page);
      $this->layout->custom_view('/My_Activity/Delete_Post_V', $data);
    }

  }

?>