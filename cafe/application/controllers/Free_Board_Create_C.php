<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Create_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Free_Board_Create_M', 'FBM');
  }
  
  public function index() {
    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
    
    $this->layout->custom_view('board/free_board_create_v');
  }

  public function upload_image() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 0;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      $data = $this->upload->data();
      $url = base_url('./uploads/' . $data['file_name']);
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

    // 폼 데이터 처리
    $post_data = [
      'board_type' => $this->input->post('post_type'),
      'title' => $this->input->post('post_title'),
      'content' => $this->input->post('post_value'),
      'user_id' => $this->session->userdata('user_id'),
      'board_state' => $this->input->post('post_open'),
      'board_comment' => $this->input->post('comment_open'),
      'depth' => 1,
      'regdate' => date("Y-m-d H:i:s")
    ];

    try {
      $result = $this->FBM->create($post_data);
      $last_id = $result['last_id'];
      
      $this->upload_file($last_id);

      echo json_encode(['state' => TRUE, 'message' => '게시글 등록 성공', 'data' => $result, 'last_id' => $last_id]);
    } catch(Exception $e) {
      echo json_encode(['state' => FALSE, 'message' => '게시글 등록 실패: ' . $e->getMessage()]);
    }
  }

  public function upload_file($last_id) {
    $max_files = 5; // 최대 파일 개수
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 0; // 1MB, 1024KB
    $this->load->library('upload', $config);
    
    $uploadData = [];
    $fileData = [];
    
    if(empty($_FILES['userfile']['name'])) {
      $fileData = [];
    } else {
      foreach ($_FILES['userfile']['name'] as $i => $value) {
        // 파일 배열 설정
        $_FILES['file']['name'] = $_FILES['userfile']['name'][$i];
        $_FILES['file']['type'] = $_FILES['userfile']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['userfile']['error'][$i];
        $_FILES['file']['size'] = $_FILES['userfile']['size'][$i];
        
        // 파일 업로드 시도
        if (!$this->upload->do_upload('file')) {
          // 오류 처리
          log_message('error', '파일 업로드 실패: ' . $this->upload->display_errors());
        } else {
          // 업로드 제한
          $filesCount = count($_FILES['userfile']['name']);
          if ($filesCount > $max_files) {
            echo json_encode(['state' => FALSE, 'message' => '파일은 최대 ' . $max_files . '개까지 업로드 가능합니다']);
            return;
          }
          // 파일 정보 저장
          $uploadData = $this->upload->data();
          
          $fileData[] = [
            'boards_idx' => $last_id, // 초기값
            'file_type' => $uploadData['image_type'],
            'file_name' => $uploadData['file_name'],
            'width' => $uploadData['image_width'],
            'height' => $uploadData['image_height'],
            'file_size' => $uploadData['file_size'],
            'full_path' => $uploadData['full_path'],
            'user_id' => $this->session->userdata('user_id'),
            'regdate' => date("Y-m-d H:i:s")
          ];

        }
      }
    }

    foreach ($fileData as $file) {
      // $file['boards_idx'] = $last_id;
      $this->FBM->insert_file($file);
    }
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
      // 'file_path' => $filePathsString ?? '', // 파일 경로 추가
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
      $result = $this->FBM->create_reply($post_data);
      if($result['state']) {
        $last_id = $result['last_id'];
        $this->upload_file($last_id);
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