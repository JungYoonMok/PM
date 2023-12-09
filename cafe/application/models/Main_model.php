<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function GetBoardList() {
    $result = $this->db->query('SELECT * FROM boards')->result();
    return $result;
  }
  
  public function GetBoardTotal($type) {
    $this->db->where('board_type', $type);
    $this->db->from('boards');
    return $this->db->count_all_results();
  }

  public function GetCommentTotal() {
    $this->db->from('boards_comment');
    return $this->db->count_all_results();
  }

  public function BoardList() {
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file', FALSE);
    $this->db->select('(SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile', FALSE);
    // $this->db->where('board_type', 'freeboard');
    $this->db->order_by('idx', 'desc');
    $this->db->limit(10);
    $query = $this->db->get('boards');
    
    return $query->result();
  }
}

?>