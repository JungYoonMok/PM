<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class Find_Account_M extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }

  public function find_id($data)
  {
    $this->db->select('user_id');
    $this->db->from('members');
    $this->db->where('user_name', $data['user_name']);
    $this->db->where('user_phone', $data['user_phone']);

    $query = $this->db->get()->row();

    if($query) {
      return $query;
    } else {
      return FALSE;
    }
  }

  public function find_password($data)
  {
    $this->db->select('user_password');
    $this->db->from('members');
    $this->db->where('user_id', $data['user_id']);
    $this->db->where('user_name', $data['user_name']);
    $this->db->where('user_phone', $data['user_phone']);

    $query = $this->db->get()->row();

    if($query) {
      return $query;
    } else {
      return FALSE;
    }
  }

  
}

?>