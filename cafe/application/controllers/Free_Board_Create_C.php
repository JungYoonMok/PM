<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_Create_C extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Free_Board_Create_M', 'FBM');
    }
    
    public function index()
    {
      $this->layout->custom_view('board/free_board_create_v');
    }

    public function upload_image() {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 0;
      $this->load->library('upload', $config);
  
      if ($this->upload->do_upload('image')) {
        $data = $this->upload->data();
        $url = base_url('uploads/' . $data['file_name']);
        echo json_encode(['state' => TRUE, 'url' => $url]);
      } else {
        $error = $this->upload->display_errors();
        echo json_encode(['state' => FALSE, 'message' => strip_tags($error)]);
      }
    }
    
    public function create() {
      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        echo json_encode([ 'state' => FALSE, 'message' => '로그인이 필요합니다' ]);
        return;
      }

      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 0;
      $this->load->library('upload', $config);
  
      $filePath = '';
      // 파일 업로드 시도
      if (!empty($_FILES['userfile']['name'])) {
        if (!$this->upload->do_upload('userfile')) {
          $error = strip_tags($this->upload->display_errors());
          // 바로 에러 메시지를 반환하고 프로세스를 종료합니다.
          echo json_encode(['state' => FALSE, 'message' => '이미지 업로드 실패: ' . $error]);
          return; // 더 이상 진행하지 않고 종료합니다.
        } else {
          $uploadData = $this->upload->data();
          // $filePath = $uploadData['userfile']; // 업로드된 파일의 경로
          $filePath = $uploadData['full_path']; // 업로드된 파일의 경로
        }
      }
  
      // 폼 데이터 처리
      $post_data = [
        'board_type' => $this->input->post('post_type'),
        'title' => $this->input->post('post_title'),
        'content' => $this->input->post('post_value'),
        'user_id' => $this->session->userdata('user_id'),
        'board_state' => $this->input->post('post_open'),
        'board_comment' => $this->input->post('comment_open'),
        'file_path' => $filePath ?? '-', // 파일 경로 추가
        'depth' => 1,
        'regdate' => date("Y-m-d H:i:s")
      ];
  
      // 폼 벨리데이션
      // $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
      // $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
      // $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
      // $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
      // $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');
  
      // 데이터베이스에 데이터 저장
      // if ($this->form_validation->run()) {
        $result = $this->FBM->create($post_data);
        if ($result) {
          echo json_encode(['state' => TRUE, 'message' => '게시글 등록 성공', 'data' => $post_data ]);
        } else {
          // 실패했다면, 오류 로그를 기록하고 실패 메시지를 반환합니다.
          log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
          echo json_encode(['state' => FALSE, 'message' => '게시글 등록 실패']);
        }
      // } else {
        // $errors = $this->form_validation->error_array();
        // echo json_encode(['state' => FALSE, 'message' => '입력 데이터 검증 실패', 'errors' => $errors]);
      // }
    
    }

    public function create_reply_index($idx) {
      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        echo json_encode([ 'state' => FALSE, 'message' => '로그인이 필요합니다' ]);
        return;
      }
      $data['board'] = $this->FBM->board_get($idx);
      $this->layout->custom_view('board/free_board_create_v', $data);
    }

    public function create_reply() {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 0;
      $this->load->library('upload', $config);
  
      $filePath = '';
      // 파일 업로드 시도
      if (!empty($_FILES['userfile']['name'])) {
        if (!$this->upload->do_upload('userfile')) {
          $error = strip_tags($this->upload->display_errors());
          // 바로 에러 메시지를 반환하고 프로세스를 종료합니다.
          echo json_encode(['state' => FALSE, 'message' => '이미지 업로드 실패: ' . $error]);
          return; // 더 이상 진행하지 않고 종료합니다.
        } else {
          $uploadData = $this->upload->data();
          // $filePath = $uploadData['userfile']; // 업로드된 파일의 경로
          $filePath = $uploadData['full_path']; // 업로드된 파일의 경로
        }
      }
  
      // 폼 데이터 처리
      $post_data = [
        'board_id' => $this->input->post('board_id'),
        'group_idx' => $this->input->post('group_idx'),
        'group_order' => $this->input->post('group_order'),
        'depth' => $this->input->post('depth'),
        'board_type' => $this->input->post('post_type_reply'),
        'title' => $this->input->post('post_title'),
        'content' => $this->input->post('post_value'),
        'user_id' => $this->session->userdata('user_id'),
        'board_state' => $this->input->post('post_open'),
        'board_comment' => $this->input->post('comment_open'),
        'file_path' => $filePath ?? '-', // 파일 경로 추가
        'regdate' => date("Y-m-d H:i:s")
      ];
      // echo json_encode(['state' => TRUE, 'data' => $post_data ]);
      // return 
  
      // 폼 벨리데이션
      // $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
      // $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
      // $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
      // $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
      // $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');
  
      // 데이터베이스에 데이터 저장
      // if ($this->form_validation->run()) {
        $result = $this->FBM->create_reply($post_data);
        if($result) {
          $last_id = $this->db->insert_id();
          echo json_encode(['state' => TRUE, 'message' => '답글 등록 성공', 'last_id' => $last_id, 'data' => $result ]);
        } else {
          echo json_encode(['state' => FALSE, 'message' => '답글 등록 실패']);
        }
      // } else {
        // $errors = $this->form_validation->error_array();
        // echo json_encode(['state' => FALSE, 'message' => '입력 데이터 검증 실패', 'errors' => $errors]);
      // }
      
    }
    
  }
?>