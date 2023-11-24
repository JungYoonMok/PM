<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_Update_C extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Free_Board_Update_M', 'FBM');
    }
    
    public function update($idx)
    {
      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        redirect('/login');
        return [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
      }

      $data['post'] = $this->FBM->get($idx);

      // 작성자가 맞는지
      if($data['post']->user_id != $this->session->userdata('user_id')) {
        return redirect('/freeboard');
      }

      $this->layout->custom_view('board/free_board_update_v', $data);
    }

    public function post_update()
    {
      // $config['upload_path'] = './uploads/'; // 이미지를 저장할 경로
      // $config['allowed_types'] = 'gif|jpg|png'; // 허용되는 파일 타입
      // $config['max_size'] = 2048; // 허용되는 파일 최대 크기

      // $this->load->library('upload', $config);

      // if (!$this->upload->do_upload('upload')) {
      //   $error = array('error' => $this->upload->display_errors());
      //   // 에러 응답 처리
      // } else {
      //   $data = $this->upload->data();
      //   // 성공적으로 업로드된 이미지 URL을 반환
      // }

      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
      $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
      $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
      $this->form_validation->set_rules('post_open', 'Post_Open', 'required');
      $this->form_validation->set_rules('comment_open', 'Comment_Open', 'required');

      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        return [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
      }

      $data = [
        'board_type' => $this->input->post('post_type'),
        'title' => $this->input->post('post_title'),
        'content' => $this->input->post('post_value'),
        'board_state' => $this->input->post('post_open'),
        'board_comment' => $this->input->post('comment_open'),
        'update_date' => date("Y-m-d H:i:s")
      ];

      if($this->form_validation->run())
      {
        $idx = $this->input->post('idx');
        $result = $this->FBM->post_update($idx, $data);
        if($result) {
          echo json_encode([ 'state' => TRUE, 'message' => '게시글 수정을 성공했습니다', 'idx' => $idx, 'data' => $data ]);
        } else {
          echo json_encode([ 'state' => FALSE, 'message' => '게시글 수정에 실패했습니다' ]);
        }
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '정보 검증에 실패했습니다' ]);
      }
    }
    
  }
?>