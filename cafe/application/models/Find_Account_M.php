<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class Find_Account_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function find_id($data) {
    $this->db->select('user_id');
    $this->db->from('members');
    $this->db->where('user_name', $data['user_name']);
    $this->db->where('user_phone', $data['user_phone']);

    $query = $this->db->get()->row();

    return $query ? $query : FALSE;
  }

  public function find_password($data) {
    $this->db->select('user_id, user_name, user_phone');
    $this->db->from('members');
    $this->db->where( 'user_id', $data['user_id']);
    $this->db->where( 'user_name', $data['user_name']);
    $this->db->where( 'user_phone', $data['user_phone']);

    $query = $this->db->get()->row();

    return $query ? $query : FALSE;
  }

  public function update_password($data) {
    $user_password = password_hash($data['user_password'], PASSWORD_DEFAULT);
    
    $this->db->where('user_id', $this->db->escape_str($data['user_id']));
    $this->db->update('members', [ 'user_password' => $user_password ]);

    $query = $this->db->affected_rows() > 0 ? TRUE : FALSE;
    return $query;
  }
  
}

?>