<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class User_information_C extends CI_Controller {
  public function __construct() {
    parent::__construct();

    // 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
    
    $this->load->model('User_Information_M', 'model');
  }

  public function index() {
    $user_id = $this->session->userdata('user_id');
    $data['user'] = $this->model->user_data($user_id);
    // $data['user_profile_show'] = $this->user_profile_show();

    $this->layout->custom_view('User_information_V', $data);
  }

  public function user_profile_show() {
    $user_id = $this->session->userdata('user_id');
    $result = $this->model->user_profile_show($user_id);

    if($result) {
      echo json_encode(['state' => TRUE, 'message' => '프로필 사진 조회 성공', 'data' => $result]);
      return TRUE;
    } else {
      echo json_encode(['state' => FALSE, 'message' => '프로필 사진 조회 실패']);
      return FALSE;
    }
  }

  public function profile_upload() {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 0;
    $config['max_width'] = 0;
    $config['max_height'] = 0;

    $data = [];

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {
        // 업로드 실패
        echo json_encode(['state' => FALSE, 'message' => '업로드 실패', 'data' => $this->upload->display_errors()]);
        return;
    } else {
      $data = $this->upload->data();
      // 업로드 성공
      echo json_encode(['state' => TRUE, 'message' => '업로드 성공', 'data' => $this->upload->data()]);
    }

    // 모델에 저장할 데이터 준비
    $file_data = [
      'boards_idx' => '0',
      'file_type' => $data['image_type'],
      'file_name' => $data['file_name'],
      'user_id' => $this->session->userdata('user_id'),
      'regdate' => date("Y-m-d H:i:s"),
      'width' => $data['image_width'],
      'height' => $data['image_height'],
      'file_size' => $data['file_size'],
      'full_path' => $data['full_path'],
    ];

    // 모델을 통해 데이터베이스에 저장
    $result = $this->model->profile_upload($file_data);
    if($result) {
      // 세션 정보 업데이트
      $user_data = [
        'user_profile' => $file_data['file_name'],
      ];
      $this->session->set_userdata($user_data);
      echo json_encode(['state' => FALSE, 'message' => '업로드 성공']);
    } else {
      echo json_encode(['state' => FALSE, 'message' => '업로드 실패']);
    }
  }

  public function delete_profile() {
    $profileId = $this->input->post('profileId');

    if ($this->model->delete_profile($profileId)) {
      echo json_encode(['state' => TRUE, 'message' => '프로필 사진이 삭제되었습니다']);
    } else {
      echo json_encode(['state' => FALSE, 'message' => '프로필 사진 삭제에 실패했습니다']);
    }
  }

  public function update_profile() {
    $profileId = $this->input->post('profileId');
    $userId = $this->session->userdata('user_id');

    if ($this->model->update_profile($userId, $profileId)) {
      // 세션 정보 업데이트
      $user_data = [
        'user_profile' => $profileId,
      ];
      $this->session->set_userdata($user_data);
      echo json_encode(['state' => TRUE, 'message' => '프로필 사진이 업데이트되었습니다']);
    } else {
      echo json_encode(['state' => FALSE, 'message' => '프로필 사진 업데이트에 실패했습니다']);
    }
  }

  public function update_nickname() {
    $form_config = [
      [
        'field' => 'nickname',
        'label' => '닉네임',
        'rules' => 'required|min_length[2]|max_length[8]',
        'errors' => [
          'required' => '닉네임을 입력해 주세요',
          'min_length' => '닉네임은 최소 2자 이상 입력해 주세요',
          'max_length' => '닉네임은 최대 8 이하 입력해 주세요',
        ]
      ],
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors(), 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_nickname' => $this->input->post('nickname'),
      ];
  
      $result = $this->model->update_nickname($data);
      if($result){
        // 세션 데이터 업데이트
        $this->session->set_userdata(['user_nickname' => $data['user_nickname']]);
        echo json_encode([ 'state' => TRUE, 'message' => '별명이 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '별명 변경에 실패했습니다' ]);
      }
    }
  }

  public function update_password() {
    $form_config = [
      [
        'field' => 'password',
        'label' => '비밀번호',
        'rules' => 'required|min_length[6]|max_length[20]',
        'errors' => [
          'required' => '비밀번호를 입력해 주세요',
          'min_length' => '비밀번호는 최소 6자 이상 입력해 주세요',
          'max_length' => '비밀번호는 최대 20자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'password_check',
        'label' => '비밀번호 확인',
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => '비밀번호 확인을 입력해 주세요',
          'matches' => '비밀번호가 일치하지 않습니다',
        ]
      ],
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors(), 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_password' => $this->input->post('password', TRUE),
      ];
  
      $result = $this->model->update_password($data);
      if($result){
        echo json_encode([ 'state' => TRUE, 'message' => '비밀번호가 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '비밀번호 변경에 실패했습니다' ]);
      }
    }
  }

  public function update_email() {
    $form_config = [
      [
        'field' => 'email',
        'label' => '이메일',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => '이메일을 입력해 주세요',
          'valid_email' => '이메일 형식이 올바르지 않습니다',
        ]
      ],
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors(), 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_email' => $this->input->post('email', TRUE),
      ];
  
      $result = $this->model->update_email($data);
      if($result){
        // 세션 데이터 업데이트
        $this->session->set_userdata(['user_email' => $data['user_email']]);
        echo json_encode([ 'state' => TRUE, 'message' => '이메일이 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '이메일 변경에 실패했습니다' ]);
      }
    }

  }

  public function update_phone() {
    $form_config = [
      [
        'field' => 'phone',
        'label' => '휴대폰',
        'rules' => 'required',
        'errors' => [
          'required' => '휴대폰 번호를 입력해 주세요',
        ]
      ],
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors(), 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_phone' => $this->input->post('phone', TRUE),
      ];
  
      $result = $this->model->update_phone($data);
      if($result){
        // 세션 데이터 업데이트
        $this->session->set_userdata(['user_phone' => $data['user_phone']]);
        echo json_encode([ 'state' => TRUE, 'message' => '연락처가 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '연락처 변경에 실패했습니다' ]);
      }
    }
  }

  public function update_memo() {
    $form_config = [
      [
        'field' => 'memo',
        'label' => '소개',
        'rules' => 'min_length[10]|max_length[100]',
        'errors' => [
          'min_length' => '소개는 최소 10자 이상 입력해 주세요',
          'max_length' => '소개는 최대 100자 이하 입력해 주세요',
        ]
      ]
    ];
    
    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors(), 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_memo' => $this->input->post('memo', TRUE),
      ];
  
      $result = $this->model->update_memo($data);
      if($result){
        // 세션 데이터 업데이트
        $this->session->set_userdata(['user_memo' => $data['user_memo']]);
        echo json_encode([ 'state' => TRUE, 'message' => '소개가 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '소개 변경에 실패했습니다' ]);
      }
    }
  }

}

?>