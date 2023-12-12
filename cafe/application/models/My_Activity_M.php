<?
  defined('BASEPATH') OR exit('No direct script access allowed');
  date_default_timezone_set('Asia/Seoul');

  class My_Activity_M extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function pagination_post() {
      $this->db->where('user_id', $this->session->userdata('user_id'));
      $result = $this->db->count_all_results('boards');
      return $result;
    }

    public function pagination_post_like($type) {
      $user_id = $this->session->userdata('user_id');
      $like_num = $this->db->get_where('board_like', ['user_id' => $user_id, 'like_type' => $type ]);

      $board_ids = [];
      foreach ($like_num->result() as $row) {
        $board_ids[] = $row->boards_idx;
      }
      
      if (!empty($board_ids)) {
        $this->db->where_in('idx', $board_ids);
        $query = $this->db->get('boards');
        if ($query->num_rows() > 0) {
          return $query->num_rows();
        }
      }
      return false;
    }

    public function pagination_delete_post() {
      $this->db->where('user_id', $this->session->userdata('user_id'));
      $this->db->where('board_delete', '1');
      $result = $this->db->count_all_results('boards');
      return $result;
    }

    public function get_post($limit, $start) {
      $user_id = $this->session->userdata('user_id');
      $this->db->select('boards.*,
        (SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count,
        (SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count,
        (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
        (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file,
        (SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile,
        (SELECT user_nickname FROM members WHERE user_id = boards.user_id) as nickname,
        (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
      );
      $this->db->from('boards');
      $this->db->join('board_like', 'boards.idx = board_like.boards_idx', 'left');
      $this->db->where('boards.user_id', $user_id);
      $this->db->where('boards.board_type', 'freeboard');
      $this->db->order_by('boards.idx', 'desc');
      $this->db->limit($limit, $start);
      
      $query = $this->db->get();
      
      return $query->result();
    }

    public function get_comment($limit, $start) {
      $user_id = $this->session->userdata('user_id');
      
      // 'boards'와 'boards_comment' 테이블을 JOIN하여 연결
      $this->db->select(
        'boards.*, boards_comment.*, 
        (SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count,
        (SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count,
        (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
        (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file,
        (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
      );
      $this->db->from('boards');
      $this->db->join('boards_comment', 'boards.idx = boards_comment.boards_idx', 'left');
      $this->db->where('boards_comment.user_id', $user_id); // 사용자가 작성한 댓글이 있는 게시물
      $this->db->where('boards.board_delete', '0');
      // $this->db->where('boards.board_type', 'freeboard'); // 필요에 따라 주석 해제
      $this->db->order_by('boards_comment.idx', 'desc');
      $this->db->limit($limit, $start);
    
      $query = $this->db->get();
      
      return $query->result();
    }

    // 게시글 ID를 기준으로 게시글 정보 가져오기
    // public function get_post_by_id($id) {
    //   $query = $this->db->get_where('boards', ['idx' => $id]);
    //   return $query->row(); // 단일 게시글 반환
    // }

    public function get_comment_total() {
      $this->db->where('delete_state', '0'); // 삭제한 댓글 제외
      $query = $this->db->get_where('boards_comment', ['user_id' => $this->session->userdata('user_id') ]);
      if($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return false;
      }
    }
        
    public function get_post_like($type, $limit, $start) {
      $user_id = $this->session->userdata('user_id');
    
      // JOIN을 사용하여 '좋아요' 누른 게시물과 boards 테이블을 연결
      $this->db->select('boards.*, 
        (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
        (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file, 
        (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
      );
      $this->db->from('boards');
      $this->db->join('board_like', 'boards.idx = board_like.boards_idx AND board_like.like_type = '.$type.'', 'inner');
      $this->db->where('board_like.user_id', $user_id);
      // $this->db->where('boards.board_type', 'freeboard');
      $this->db->order_by('boards.idx', 'desc');
      $this->db->limit($limit, $start);
    
      $query = $this->db->get();
      
      if ($query->num_rows() > 0) {
        return $query->result();
      }
      return false;
    }

    public function get_delete_post($limit, $start) {
      $user_id = $this->session->userdata('user_id');
      $this->db->select('boards.*,
        (SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count,
        (SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count,
        (SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count,
        (SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file,
        (SELECT COUNT(*) FROM boards_comment WHERE boards_idx = boards.idx) as comment_count'
      );
      $this->db->from('boards');
      $this->db->join('board_like', 'boards.idx = board_like.boards_idx', 'left');
      $this->db->where('boards.user_id', $user_id);
      $this->db->where('boards.board_type', 'freeboard');
      $this->db->where('boards.board_delete', '1');
      $this->db->order_by('boards.idx', 'desc');
      $this->db->limit($limit, $start);
      
      $query = $this->db->get();
      
      return $query->result();
    }

  }

?>