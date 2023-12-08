<?
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

  class My_Activity_C extends CI_Controller {
    public function __construct() {
      parent::__construct();

      // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
    
      $this->load->model('My_Activity_M');
    }

    public function index() {
      $this->layout->custom_view('My_Activity_V');
    }

    private function initialize_pagination($base_url, $total_rows, $per_page, $uri_segment, $num_links) {
      $config['base_url'] = $base_url;
      $config['total_rows'] = $total_rows;
      $config['per_page'] = $per_page;
      $config['uri_segment'] = $uri_segment;
      $config['num_links'] = $num_links; // 현재 페이지 양쪽에 표시될 "숫자" 링크의 수
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

      $this->pagination->initialize($config);
    }

    public function post() {
      // 페이지네이션 설정을 공통 메소드를 호출하여 초기화
      $this->initialize_pagination("/my_activity/post", $this->db->count_all('boards'), 20, 3 ?? 0, 3);
      
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $data['links'] = $this->pagination->create_links();
      
      $data['post'] = $this->My_Activity_M->get_post(20, $page);
      $this->layout->custom_view('/My_Activity/Post_V', $data);
    }
  
    public function comment() {
      $this->initialize_pagination("/my_activity/comment", $this->db->count_all('boards_comment'), 10, 3 ?? 0, 3);
      
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      
      $data['comment'] = $this->My_Activity_M->get_comment(10, $page);
      $data['comment_total'] = $this->My_Activity_M->get_comment_total();
      
      $this->layout->custom_view('/My_Activity/Comment_V', $data);
    }
    
    public function post_like() {
      $this->initialize_pagination("/my_activity/post_like", $this->db->count_all('boards_comment'), 10, 3 ?? 0, 3);
      
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      
      $data['post_like'] = $this->My_Activity_M->get_post_like(10, $page);
      $this->layout->custom_view('/My_Activity/Post_Like_V', $data);
    }
    
    public function post_notlike() {
      $this->initialize_pagination("/my_activity/post_notlike", $this->db->count_all('boards_comment'), 10, 3 ?? 0, 3);
      
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      
      $data['post_notlike'] = $this->My_Activity_M->get_post_notlike(10, $page);
      $this->layout->custom_view('/My_Activity/Post_NotLike_V', $data);
    }
    
    public function delete_post() {
      $this->initialize_pagination("/my_activity/delete_post", $this->db->count_all('boards_comment'), 10, 3 ?? 0, 3);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // 현재 페이지 번호
      $data['links'] = $this->pagination->create_links(); // 페이지네이션 링크 생성
      
      $data['delete_post'] = $this->My_Activity_M->get_delete_post(10, $page);
      $this->layout->custom_view('/My_Activity/Delete_Post_V', $data);
    }

  }

?>