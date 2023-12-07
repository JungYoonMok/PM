<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Update_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Free_Board_Update_M', 'FBM');
    $this->load->model('Free_Board_Create_M');
  }

  public function index() {
    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
  }
  
  public function update($idx) {
    $data['post'] = $this->FBM->get($idx);
    $data['file'] = $this->FBM->get_file($idx);

    // 작성자가 맞는지
    if($data['post']->user_id != $this->session->userdata('user_id')) {
      return redirect('/freeboard');
    }

    $this->layout->custom_view('board/free_board_update_v', $data);
  }

  public function file_delete() {
    $idx = $this->input->post('id');
    // $file_name = $this->input->post('file_name');
    // $full_path = $this->input->post('full_path');

    $result = $this->FBM->file_delete($idx);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '파일 삭제 성공', 'data' => $result, 'idx' => $idx ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '파일 삭제 실패' ]);
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
            'boards_idx' => $this->input->post('idx'), // 초기값
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
      $this->Free_Board_Create_M->insert_file($file);
    }
  }

  public function post_update() {
    
    // $config['upload_path'] = './uploads/';
    // $config['allowed_types'] = 'gif|jpg|png';
    // $config['max_size'] = 0;
    // $this->load->library('upload', $config);

    // $filePath = '';
    // // 파일 업로드 시도
    // if (!empty($_FILES['userfile']['name'])) {
    //   if (!$this->upload->do_upload('userfile')) {
    //     $error = strip_tags($this->upload->display_errors());
    //     // 바로 에러 메시지를 반환하고 프로세스를 종료합니다.
    //     echo json_encode(['state' => FALSE, 'message' => '이미지 업로드 실패: ' . $error]);
    //     return; // 더 이상 진행하지 않고 종료합니다.
    //   } else {
    //     $uploadData = $this->upload->data();
    //     // $filePath = $uploadData['userfile']; // 업로드된 파일의 경로
    //     $filePath = $uploadData['full_path']; // 업로드된 파일의 경로
    //   }
    // }

    // 폼 벨리데이션으로 폼의 필수값을 지정
    // $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
    // $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
    // $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
    // $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
    // $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');

    $type = $this->input->post('post_type');
    $data = [
      'board_type' => ($type == '자유게시판' ? 'freeboard' : ($type == '공지사항' ? 'notice' : ($type == '가입인사' ? 'hellow' : 'anonymous') ) ),
      'title' => $this->input->post('post_title'),
      'content' => $this->input->post('post_value'),
      'board_state' => $this->input->post('post_open'),
      'board_comment' => $this->input->post('comment_open'),
      'update_date' => date("Y-m-d H:i:s")
    ];

    // if($this->form_validation->run()) {
      $idx = $this->input->post('idx');
      $result = $this->FBM->post_update($idx, $data);

      $this->upload_file($this->input->post('idx'));

      if($result) {
        echo json_encode([ 'state' => TRUE, 'message' => '게시글 수정을 성공했습니다', 'idx' => $idx, 'data' => $data ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '게시글 수정에 실패했습니다' ]);
      }
    // } else {
      // echo json_encode([ 'state' => FALSE, 'message' => '정보 검증에 실패했습니다' ]);
    // }
  }
  
}
?>