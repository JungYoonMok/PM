<?
  defined('BASEPATH') OR exit('No direct script access allowed');
  date_default_timezone_set('Asia/Seoul');

  class My_Activity_M extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function get_all_boards() {
      $this->db->order_by('idx', 'desc');
      $query = $this->db->get_where('boards', ['user_id' => $this->session->userdata('user_id') ]);

      if($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

  }

?>