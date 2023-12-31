<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Update_C extends CI_Controller {

  public function __construct() {
    parent::__construct();

    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }

    $this->load->model('Free_Board_Update_M', 'FBM');
    $this->load->model('Free_Board_Create_M');
  }

  public function update($idx) {
    $data['post'] = $this->FBM->get($idx);
    $data['file'] = $this->FBM->get_file($idx);

    // 작성자가 맞는지
    if($data['post']->user_id != $this->session->userdata('user_id')) {
      return redirect('/');
    }

    $this->layout->custom_view('board/free_board_update_v', $data);
  }

  public function file_delete() {
    $idx = $this->input->post('name');
    // $file_name = $this->input->post('file_name');
    // $full_path = $this->input->post('full_path');

    $result = $this->FBM->file_delete($idx);
    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '파일 삭제 성공', 'data' => $result, 'idx' => $idx ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '파일 삭제 실패' ]);
    }
  }

  public function post_update() {

    $form_config = [
      [
        'field' => 'post_type',
        'label' => '게시판 분류',
        'rules' => 'required',
        'errors' => [
          'required' => '게시판의 분류를 선택해 주세요',
        ]
      ],
      [
        'field' => 'post_title',
        'label' => '제목',
        'rules' => 'required|min_length[2]|max_length[50]',
        'errors' => [
          'required' => '제목을 입력해 주세요',
          'min_length' => '제목은 최소 2자 이상 입력해 주세요',
          'max_length' => '제목은 최대 50자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'post_value',
        'label' => '내용',
        'rules' => 'required|min_length[2]|max_length[10000]',
        'errors' => [
          'required' => '내용을 입력해 주세요',
          'min_length' => '내용은 최소 2자 이상 입력해 주세요',
          'max_length' => '내용은 최대 10000자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'post_open',
        'label' => '게시글 공개 여부',
        'rules' => 'required',
        'errors' => [
          'required' => '게시글 공개 여부를 선택해 주세요',
        ]
      ],
      [
        'field' => 'comment_open',
        'label' => '댓글 공개 여부',
        'rules' => 'required',
        'errors' => [
          'required' => '댓글 공개 여부를 선택해 주세요',
        ]
      ],
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      $errors = $this->form_validation->error_array();
      echo json_encode([
        'state' => FALSE, 
        'message' => validation_errors(), 
        'errors' => $errors]);
      return;
    }

    // 공지사항 사용자 체크
    if($this->input->post('post_type') == 'notice' && $this->session->userdata('user_id') != 'admin') {
      echo json_encode([ 'state' => FALSE, 'message' => '관리자만 공지사항을 작성할 수 있습니다' ]);
      return;
    }

    $max_files = 5; // 최대 파일 개수
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png|gif|txt|zip';
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
          $filesCount = count($_FILES['userfile']['name']);
          $oldFile = $this->input->post('old_file');
          // 업로드 제한
          if ($filesCount + $oldFile > $max_files) {
            echo json_encode(['state' => FALSE, 'message' => '파일은 최대 ' . $max_files . '개까지 업로드 가능합니다']);
            return;
          } else {

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
    }
    foreach ($fileData as $file) {
      $this->Free_Board_Create_M->insert_file($file);
    }

    // 폼 벨리데이션으로 폼의 필수값을 지정
    // $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
    // $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
    // $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
    // $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
    // $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');
    $type = $this->input->post('post_type');
    $data = [
      'board_type' => ($type === '공지사항' ? 'notice' : ($type === '자유게시판' ? 'freeboard' : ($type === '가입인사' ? 'hellow' : $type ) ) ),
      'title' => $this->input->post('post_title'),
      'content' => $this->input->post('post_value'),
      'board_state' => $this->input->post('post_open'),
      'board_comment' => $this->input->post('comment_open'),
      'update_date' => date("Y-m-d H:i:s")
    ];

    // if($this->form_validation->run()) {
      $idx = $this->input->post('idx');
      // $this->upload_file();
      $result = $this->FBM->post_update($idx, $data);

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