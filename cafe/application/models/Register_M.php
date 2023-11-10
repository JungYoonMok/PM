<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

include('./password.php');

  class Register_M extends CI_Model{

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function register()
    {
      $nickName = $this->input->post('nickname');
      $ID = $this->input->post('user_id');
      $Name = $this->input->post('user_name');
      $Frofile = "없음"; // 나중에 구현

      $Password_1 = $this->input->post('user_password_1');
      $Password_2 = $this->input->post('user_password_2');

      $Phone_1 = $this->input->post('user_phone_1');
      $Phone_2 = $this->input->post('user_phone_2');
      $Phone_3 = $this->input->post('user_phone_3');

      $Email = $this->input->post('user_email');
      $Memo = $this->input->post('user_memo');

      $data = [
        'user_name' => $Name,
        'user_nickname' => $nickName,
        'user_frofile' => $Frofile,
        'user_email' => $Email,
        'user_phone' => $Phone_1."-".$Phone_2."-".$Phone_3,
        'user_memo' => $Memo,
        'user_id' => $ID,
        'user_password' => $Password_1 === $Password_2 ? password_hash($Password_1, PASSWORD_DEFAULT) : "Erorr: Pssword Fake",
        'regdate' => date("Y-m-d H:i:s")
      ];
      
      $this->db->insert('members', $data);
    }

    public function username_check($id)
    {
      if ($id) {
        $result = array();
        $sql = "SELECT * FROM members WHERE user_id = '".$id."';";
        $query = $this->db->query($sql);
        $result = @$query->row();
        if ($result) {
          $this->form_validation->set_message('userid_check',  $id.'은(는) 중복된 아이디 입니다.');
          return FALSE;
        } else  {
          return TRUE;
        }
      } else {
        return  FALSE;
      }
    }
    
  }

?>