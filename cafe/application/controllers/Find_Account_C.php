<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class Find_Account_C extends CI_Controller {
  public function __construct() {
    parent::__construct();

    // 세션 체크
    if($this->session->userdata('user_id')) {
      redirect('/');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }

    $this->load->model('Find_Account_M');
  }

  public function index() {
    $this->layout->custom_view('Find_Account_V');
  }

  public function find_id() {
    $form_config =[
      [
        'field' => 'name',
        'label' => '이름',
        'rules' => 'required|min_length[2]|max_length[20]',
        'errors' => [
          'required' => '이름을 입력해 주세요',
          'min_length' => '이름은 최소 2자 이상 입력해 주세요',
          'max_length' => '이름은 최대 20자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone',
        'label' => '휴대폰 번호',
        'rules' => 'required|exact_length[13]',
        'errors' => [
          'required' => '휴대폰 번호를 입력해 주세요',
          'exact_length' => '휴대폰 번호는 11자리로 입력해 주세요',
        ]
      ]
    ];

    $this->form_validation->set_rules($form_config);

    if($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'message' => '폼 검증 실패', 
        'detail' => validation_errors() 
      ]);
      return;
    } else {
      $data = [
        'user_name' => $this->input->post('name', TRUE),
        'user_phone' => $this->input->post('phone', TRUE)
      ];
  
      $result = $this->Find_Account_M->find_id($data);
  
      if($result) {
        echo json_encode([ 
          'state' => TRUE,
          'detail' => '해당하는 계정을 찾았습니다',
          'data' => $result->user_id
        ]);
      } else {
        echo json_encode([ 'state' => FALSE,
        'detail' => '해당하는 계정이 없습니다',
      ]);
      }
    }

  }

  public function find_password() {
    $form_config = [
      [
        'field' => 'id',
        'label' => '아이디',
        'rules' => 'required|min_length[4]|max_length[10]|alpha_numeric',
        'errors' => [
          'required' => '아이디를 입력해 주세요',
          'min_length' => '아이디는 최소 4자 이상 입력해 주세요',
          'max_length' => '아이디는 최대 10자 이하 입력해 주세요',
          'alpha_numeric' => '아이디는 영문과 숫자만 입력해 주세요',
        ]
      ],
      [
        'field' => 'name',
        'label' => '이름',
        'rules' => 'required|min_length[2]|max_length[20]',
        'errors' => [
          'required' => '이름을 입력해 주세요',
          'min_length' => '이름은 최소 2자 이상 입력해 주세요',
          'max_length' => '이름은 최대 20자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone',
        'label' => '휴대폰 번호',
        'rules' => 'required|exact_length[13]',
        'errors' => [
          'required' => '휴대폰 번호를 입력해 주세요',
          'exact_length' => '휴대폰 번호는 11자리로 입력해 주세요',
        ]
      ]
    ];

    $this->form_validation->set_rules($form_config);

    if($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'detail' => validation_errors() 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->input->post('id', TRUE),
        'user_name' => $this->input->post('name', TRUE),
        'user_phone' => $this->input->post('phone', TRUE),
      ];
  
      $result = $this->Find_Account_M->find_password($data);
  
      if($result) {
        echo json_encode([ 
          'state' => TRUE, 
          'detail' => '해당하는 계정을 찾았습니다',
        ]);
      } else {
        echo json_encode([ 
          'state' => FALSE, 
          'detail' => '해당하는 계정이 없습니다',
        ]);
      }
    }
  }

  public function update_password() {
    $form_config = [
      [
        'field' => 'id',
        'label' => '아이디',
        'rules' => 'required|min_length[4]|max_length[10]',
        'errors' => [
          'required' => '아이디를 입력해 주세요',
          'min_length' => '아이디는 최소 4자 이상 입력해 주세요',
          'max_length' => '아이디는 최대 10자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'name',
        'label' => '이름',
        'rules' => 'required|min_length[2]|max_length[20]',
        'errors' => [
          'required' => '이름을 입력해 주세요',
          'min_length' => '이름은 최소 2자 이상 입력해 주세요',
          'max_length' => '이름은 최대 20자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone',
        'label' => '휴대폰 번호',
        'rules' => 'required|exact_length[13]',
        'errors' => [
          'required' => '휴대폰 번호를 입력해 주세요',
          'exact_length' => '휴대폰 번호는 11자리로 입력해 주세요',
        ]
      ],
      [
        'field' => 'password',
        'label' => '비밀번호',
        'rules' => 'required|min_length[6]|max_length[20]',
        'errors' => [
          'required' => '비밀번호를 입력해 주세요',
          'min_length' => '비밀번호는 최소 6자 이상 입력해 주세요',
          'max_length' => '비밀번호는 최대 20자 이하 입력해 주세요',
        ]
      ]
    ];

    $this->form_validation->set_rules($form_config);

    if($this->form_validation->run() == FALSE) {
      echo json_encode([ 
        'state' => FALSE, 
        'message' => '폼 검증 실패', 
        'detail' => validation_errors() 
      ]);
      return;
    } else {
      $data = [
        'user_id' => $this->input->post('id', TRUE),
        'user_name' => $this->input->post('name', TRUE),
        'user_phone' => $this->input->post('phone', TRUE),
        'user_password' => $this->input->post('password', TRUE)
      ];
  
      $result = $this->Find_Account_M->update_password($data);
  
      if($result) {
        echo json_encode([ 
          'state' => TRUE, 
          'detail' => '비밀번호가 변경되었습니다',
        ]);
      } else {
        echo json_encode([ 
          'state' => FALSE, 
          'detail' => '비밀번호 변경에 실패했습니다',
        ]);
      }
    }
  }

}

?>