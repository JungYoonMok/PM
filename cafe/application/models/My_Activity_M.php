<?
  defined('BASEPATH') OR exit('No direct script access allowed');
  date_default_timezone_set('Asia/Seoul');

  class My_Activity_M extends CI_Model {

    public function __construct() {
      parent::__construct();
    }

    public function get_post($limit, $start) {
      $this->db->order_by('idx', 'desc');
      $this->db->limit($limit, $start);
      $query = $this->db->get_where('boards', ['user_id' => $this->session->userdata('user_id') ]);

      if($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function get_post_comment($idx) {
      $query = $this->db->get_where('boards_comment', ['boards_idx' => $idx ]);
      if($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return false;
      }
    }

    public function get_comment($limit, $start) {
      $this->db->order_by('idx', 'desc');
      $this->db->limit($limit, $start);
      $query = $this->db->get_where('boards_comment', ['user_id' => $this->session->userdata('user_id') ]);
      if($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function get_comment_total() {
      $query = $this->db->get_where('boards_comment', ['user_id' => $this->session->userdata('user_id') ]);
      if($query->num_rows() > 0) {
        return $query->num_rows();
      } else {
        return false;
      }
    }
    
    public function get_post_in_comment()
    {
      $this->db->order_by('idx', 'desc');
      $query = $this->db->get_where('boards', ['user_id' => $this->session->userdata('user_id') ]);

      if($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }
    
    public function get_post_like($limit, $start) {
      $this->db->limit($limit, $start);

      $user_id = $this->session->userdata('user_id');
      $like_num = $this->db->get_where('board_like', ['user_id' => $user_id, 'like_type' => TRUE ]);

      $board_ids = [];
      foreach ($like_num->result() as $row) {
        $board_ids[] = $row->boards_idx;
      }

      if (!empty($board_ids)) {
        $this->db->where_in('idx', $board_ids);
        $query = $this->db->get('boards');
        if ($query->num_rows() > 0) {
          return $query->result();
        }
      }

      return false;
    }

    public function get_post_notlike($limit, $start) {
      $this->db->limit($limit, $start);

      $user_id = $this->session->userdata('user_id');
      $like_num = $this->db->get_where('board_like', ['user_id' => $user_id, 'like_type' => FALSE ]);

      $board_ids = [];
      foreach ($like_num->result() as $row) {
        $board_ids[] = $row->boards_idx;
      }

      if (!empty($board_ids)) {
        $this->db->where_in('idx', $board_ids);
        $query = $this->db->get('boards');
        if ($query->num_rows() > 0) {
          return $query->result();
        }
      }

      return false;
    }

    public function get_delete_post($limit, $start) {
      $this->db->limit($limit, $start);
      
      $this->db->order_by('idx', 'desc');
      $user_id = $this->session->userdata('user_id');
      $query = $this->db->get_where('boards', ['user_id' => $user_id, 'board_delete' => TRUE ]);

      if($query->num_rows() > 0) {
        return $query->result();
      } else {
        return false;
      }
    }

  }

?>