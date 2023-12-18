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
    $this->db->where('delete_state', '0'); // 삭제제되지 않은 댓글
    // $this->db->where('board_state', '1'); // 비공개되지 않은 댓글
    return $this->db->count_all_results();
  }

  public function BoardList($board_type) {
    $this->db->select(
      'boards.*,
      (SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count,
      (SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count,
      (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
      (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file,
      (SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile,
      (SELECT user_nickname FROM members WHERE user_id = boards.user_id) as nickname,
      (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
    );
    
    // $this->db->select('boards.*,');
    // $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    // $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    // $this->db->select('(SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count', FALSE);
    // $this->db->select('(SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file', FALSE);
    // $this->db->select('(SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile', FALSE);
    // $this->db->select('(SELECT user_nickname FROM members WHERE user_id = boards.user_id) as nickname', FALSE);
    // $this->db->select('(SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count', FALSE);
    
    $this->db->where('board_delete', '0'); // 삭제제되지 않은 댓글
    $this->db->where('board_state', '1'); // 비공개되지 않은 댓글

    if($board_type != 'all') {
      $this->db->where('board_type', $board_type);
    }

    $this->db->order_by('idx', 'desc');
    $this->db->limit(8);
    $query = $this->db->get('boards');
    
    return $query->result();
  }

  public function get_comment() {
    // $user_id = $this->session->userdata('user_id');
    
    // 'boards'와 'boards_comment' 테이블을 JOIN하여 연결
    $this->db->select(
      'boards.*, boards_comment.*, 
      (SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count,
      (SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count,
      (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
      (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file,
      (SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile,
      (SELECT user_nickname FROM members WHERE user_id = boards.user_id) as nickname,
      (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
    );
    $this->db->limit(8);
    $this->db->from('boards');
    $this->db->join('boards_comment', 'boards.idx = boards_comment.boards_idx', 'left');
    // $this->db->where('boards_comment.user_id', $user_id); // 사용자가 작성한 댓글이 있는 게시물
    $this->db->where('boards_comment.delete_state', '0'); // 삭제제되지 않은 댓글
    $this->db->where('boards.board_state', '1'); // 비공개되지 않은 댓글
    // $this->db->where('boards.board_delete', '0');
    // $this->db->where('boards.board_type', 'freeboard'); // 필요에 따라 주석 해제
    $this->db->order_by('boards_comment.idx', 'desc');
    // $this->db->limit($limit, $start);
  
    $query = $this->db->get();
    
    return $query->result();
  }

}

?>