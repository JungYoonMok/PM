<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Register_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('register_M', 'register_model');
  }

  public function index() {
    // 세션에 로그인 상태일 때
    if($this->session->userdata('user_id') && $this->session->userdata('login') == TRUE){
      redirect('/');
    } else {
      $this->layout->custom_view('register_V');
    }
  }

  // 회원가입
  public function register() {
    // 한글 정규식 확인
    $name = $this->input->post('name');
    $pattern = '/^[가-힣]{3,}$/';
    if (!preg_match($pattern, $name, $macheResult)) {
      echo json_encode([
        'state' => FALSE,
        'message' => '성함은 한글만 입력해 주세요',
        'detail' => '성함은 한글만 입력해 주세요'
      ]);
      return;
    }

    $nName = $this->input->post('nName');
    $pattern = '/^[가-힣]{3,}$/';
    if (!preg_match($pattern, $nName, $macheResult)) {
      echo json_encode([
        'state' => FALSE,
        'message' => '닉네임은 한글만 입력해 주세요',
        'detail' => '닉네임은 한글만 입력해 주세요'
      ]);
      return;
    }

    // 폼 벨리데이션으로 폼의 필수값을 지정
    $form_config = [
      [
        'field' => 'nName',
        'label' => '닉네임',
        'rules' => 'required|min_length[2]|max_length[8]',
        'errors' => [
          'required' => '닉네임을 입력해 주세요',
          'min_length' => '닉네임은 최소 2자 이상 입력해 주세요',
          'max_length' => '닉네임은 최대 8 이하 입력해 주세요',
        ]
      ],
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
        'field' => 'password_1',
        'label' => '비밀번호',
        'rules' => 'required|min_length[6]|max_length[20]|matches[password_2]',
        'errors' => [
          'required' => '비밀번호를 입력해 주세요',
          'min_length' => '비밀번호는 최소 6자 이상 입력해 주세요',
          'max_length' => '비밀번호는 최대 20자 이하 입력해 주세요',
          'matches' => '비밀번호가 일치하지 않습니다',
        ]
      ],
      [
        'field' => 'password_2',
        'label' => '비밀번호 확인',
        'rules' => 'required|min_length[6]|max_length[20]',
        'errors' => [
          'required' => '비밀번호 확인을 입력해 주세요',
          'min_length' => '비밀번호 확인은 최소 6자 이상 입력해 주세요',
          'max_length' => '비밀번호 확인은 최대 20자 이하 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone_1',
        'label' => '휴대폰_1',
        'rules' => 'required|min_length[3]|max_length[4]|numeric',
        'errors' => [
          'required' => '휴대폰_1을 입력해 주세요',
          'min_length' => '휴대폰_1은 최소 3자 이상 입력해 주세요',
          'max_length' => '휴대폰_1은 최대 3자 이하 입력해 주세요',
          'numeric' => '휴대폰_1은 숫자만 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone_2',
        'label' => '휴대폰_2',
        'rules' => 'required|min_length[3]|max_length[4]|numeric',
        'errors' => [
          'required' => '휴대폰_2을 입력해 주세요',
          'min_length' => '휴대폰_2은 최소 3자 이상 입력해 주세요',
          'max_length' => '휴대폰_2은 최대 4자 이하 입력해 주세요',
          'numeric' => '휴대폰_2은 숫자만 입력해 주세요',
        ]
      ],
      [
        'field' => 'phone_3',
        'label' => '휴대폰_3',
        'rules' => 'required|min_length[3]|max_length[4]|numeric',
        'errors' => [
          'required' => '휴대폰_3을 입력해 주세요',
          'min_length' => '휴대폰_3은 최소 3자 이상 입력해 주세요',
          'max_length' => '휴대폰_3은 최대 4자 이하 입력해 주세요',
          'numeric' => '휴대폰_3은 숫자만 입력해 주세요',
        ]
      ],
      [
        'field' => 'email',
        'label' => '이메일',
        'rules' => 'required|valid_email',
        'errors' => [
          'required' => '이메일을 입력해 주세요',
          'valid_email' => '이메일 형식이 올바르지 않습니다',
        ]
      ],
      [
        'field' => 'memo',
        'label' => '소개',
        'rules' => 'min_length[2]|max_length[100]',
        'errors' => [
          'min_length' => '소개는 최소 2자 이상 입력해 주세요',
          'max_length' => '소개는 최대 100자 이하 입력해 주세요',
        ]
      ]
    ];

    $this->form_validation->set_rules($form_config);

    if ($this->form_validation->run()) {

      // 유저 아이디 중복 체크
      $user_id = $this->input->post('id');
      $phone = $this->input->post('phone_1') . "-" . $this->input->post('phone_2') . "-" . $this->input->post('phone_3');
      $email = $this->input->post('email');

      $user_check = $this->register_model->userid_check($user_id, $phone, $email);

      if ($user_check['status']) {
        // 모델의 register 함수 호출
        $response = $this->register_model->register();
        echo json_encode($response);
      } else {
        echo json_encode([ 
          'state' => FALSE,
          'detail' => $user_check['message']
        ]);
      }

      // if ($user_check) {
      //   // 모델의 register 함수 호출
      //   $response = $this->register_model->register();
      //   echo json_encode($response);
      // } else {
      //   echo json_encode([ 
      //     'state' => FALSE,
      //     'message' => '아이디가 이미 존재합니다',
      //     'detail' => '이미 존재하는 아이디입니다'
      //   ]);
      // }

    } else {
      // 폼 벨리데이션 실패 시 오류 메시지 반환
      echo json_encode([ 
        'state' => FALSE,
        'message' => '정보 검증에 실패했습니다',
        'detail' => validation_errors()
      ]);
    }
    exit; // 추가 출력 방지
  }

}

?>