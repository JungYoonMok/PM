<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class User_information_C extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();

      $this->load->model('User_Information_M', 'model');
    }

    public function index()
    {
      // 세션 체크
      if (!$this->session->userdata('user_id')) {
        redirect('/login');
      }

      $user_id = $this->session->userdata('user_id');
      $data['user'] = $this->model->user_data($user_id);

      $this->layout->custom_view('User_information_V', $data);
    }

    public function update_nickname()
    {
      $data = [
        'user_id' => $this->session->userdata('user_id'),
        'user_nickname' => $this->input->post('nickname', TRUE),
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

    public function update_password()
    {
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

    public function update_email()
    {
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

    public function update_phone()
    {
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

    public function update_memo()
    {
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

    // 방치된 코드
    public function update_user_data()
    {
      $user_id = $this->session->userdata('user_id');

      $nickname = $this->input->post('nickname', TRUE) == $this->session->userdata('user_nickname') ? NULL : $this->input->post('nickname', TRUE);
      $password_1 = $this->input->post('password_1', TRUE);
      $password_2 = $this->input->post('password_2', TRUE);
      $password = password_verify($password_1, $this->session->userdata('user_password')) ? NULL : password_hash($password_1, PASSWORD_DEFAULT);
      $email = $this->input->post('email', TRUE) == $this->session->userdata('user_email') ? NULL : $this->input->post('email', TRUE);
      $phone_1 = $this->input->post('phone_1', TRUE);
      $phone_2 = $this->input->post('phone_2', TRUE);
      $phone_3 = $this->input->post('phone_3', TRUE);
      $phone = $phone_1.'-'.$phone_2.'-'.$phone_3 == $this->session->userdata('user_phone') ? NULL : $phone_1.'-'.$phone_2.'-'.$phone_3;
      $memo = $this->input->post('memo', TRUE) == $this->session->userdata('user_memo') ? NULL : $this->input->post('memo', TRUE);

      $data = [
        $nickname ? 'user_nickname' : NULL => $nickname,
        $password ? 'user_password' : NULL => $password,
        $email ? 'user_email' : NULL => $email,
        $phone ? 'user_phone' : NULL => $phone,
        $memo ? 'user_memo' : NULL => $memo,
      ];

      // $data = [
      //   'nickname' => $this->input->post('nickname', TRUE),
      //   'password_1' => $this->input->post('password', TRUE),
      //   'password_2' => $this->input->post('password', TRUE),
      //   'email' => $this->input->post('email', TRUE),
      //   'phone_1' => $this->input->post('email', TRUE),
      //   'phone_2' => $this->input->post('email', TRUE),
      //   'phone_3' => $this->input->post('email', TRUE),
      //   'memo' => $this->input->post('email', TRUE),
      // ];

      $result = $this->model->update_user_data($user_id, $data);
      if($result){
        echo json_encode([ 'state' => TRUE, 'message' => '회원정보가 변경되었습니다' ]);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '회원정보 변경에 실패했습니다' ]);
      }
    }

}

?>