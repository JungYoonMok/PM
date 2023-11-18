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

    public function upload() {
      // 업로드 설정은 동일하므로 별도의 메소드로 분리하여 재사용하는 것이 좋습니다.
      $this->_upload_config();
    
      if ($this->upload->do_upload('userfile')) {
        $data = $this->upload->data();
        $url = base_url('uploads/' . $data['file_name']); // 'upload'를 'uploads'로 변경
        echo json_encode(['state' => TRUE, 'url' => $url]); // 상태값도 추가하여 성공 여부를 명시
      } else {
        $error = $this->upload->display_errors();
        echo json_encode(['state' => FALSE, 'message' => '이미지 업로드 실패: ' . strip_tags($error)]); // strip_tags()를 사용하여 HTML 태그 제거
      }
    }
    
    public function create()
    {
      // 업로드 설정은 동일하므로 별도의 메소드로 분리하여 재사용하는 것이 좋습니다.
      $this->_upload_config();
  
      // 파일 업로드 시도
      $filePath = null;
      if (isset($_FILES['userfile']) && $_FILES['userfile']['size'] > 0) {
        if (!$this->upload->do_upload('userfile')) {
          $error = strip_tags($this->upload->display_errors());
          echo json_encode(['state' => FALSE, 'message' => '이미지 업로드 실패: ' . $error]);
          return;
        } else {
          $uploadData = $this->upload->data();
          $filePath = $uploadData['full_path']; // 업로드된 파일의 전체 경로
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
        'file_path' => $filePath, // 파일 경로 추가
        'regdate' => date("Y-m-d H:i:s")
      ];
  
      // 폼 벨리데이션
      $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
      $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
      $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
      $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
      $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');
  
      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        echo json_encode([ 'state' => FALSE, 'message' => '로그인이 필요합니다' ]);
        return;
      }
  
      // 데이터베이스에 데이터 저장
      if($this->form_validation->run()) {
        $result = $this->FBM->create($post_data);
        if ($result) {
          $last_id = $this->db->insert_id(); // 등록한 게시글의 ID를 반환
          echo json_encode([ 'state' => TRUE, 'message' => '게시글 등록을 성공했습니다', 'last_id' => $last_id ]);
        } else {
          echo json_encode([ 'state' => FALSE, 'message' => '게시글 등록을 실패했습니다' ]);
        }
      } else {
        // 벨리데이션 오류 메시지 반환
        $errors = $this->form_validation->error_array();
        echo json_encode(['state' => FALSE, 'message' => '입력 데이터 검증 실패', 'errors' => $errors]);
      }
    }
    
    // 파일 업로드 설정 코드를 별도의 메소드로 분리
    private function _upload_config() {
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = 40000;
      $this->load->library('upload', $config);
    }
    
  }
?>