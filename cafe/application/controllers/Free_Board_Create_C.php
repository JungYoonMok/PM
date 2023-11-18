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
      $config['upload_path'] = './upload/'; // 이미지를 저장할 경로
      $config['allowed_types'] = 'gif|jpg|png'; // 허용되는 파일 타입
      $config['max_size'] = 40000; // 허용되는 파일 최대 크기
    
      $this->load->library('upload', $config);
    
      if ($this->upload->do_upload('userfile')) {
        $data = $this->upload->data();
        $url = base_url('upload/' . $data['file_name']); // 업로드된 이미지의 URL 생성
    
        echo json_encode(['url' => $url]); // JSON 형식으로 URL 반환
      } else {
        // 오류 처리
      }
    }
    
    public function create()
    {
      $config['upload_path'] = './upload/'; // 이미지를 저장할 경로
      $config['allowed_types'] = 'gif|jpg|png'; // 허용되는 파일 타입
      $config['max_size'] = 40000; // 허용되는 파일 최대 크기
  
      $this->load->library('upload', $config);
  
      if (isset($_FILES['userfile']) && $_FILES['userfile']['size'] > 0) {
        if (!$this->upload->do_upload('userfile')) {
          $error = array('error' => $this->upload->display_errors());
          echo json_encode(['state' => FALSE, 'message' => '이미지 업로드를 실패했습니다: ' . $error['error']]);
          return;
        } else {
          $uploadData = $this->upload->data();
          $filePath = $uploadData['full_path']; // 업로드된 파일의 전체 경로
        }
      } else {
        $filePath = null; // 파일이 없는 경우
      }
  
      // 폼 데이터 처리
      $data = [
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
        $result = $this->FBM->create($data);
        if ($result['state']) {
          $last_id = $this->db->insert_id();
          echo json_encode([ 'state' => TRUE, 'message' => '게시글 등록을 성공했습니다', 'last_id' => $last_id ]);
        } else {
          echo json_encode([ 'state' => FALSE, 'message' => '게시글 등록을 실패했습니다' ]);
        }
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '입력 데이터 검증 실패' ]);
      }
    }
    
    
  }
?>