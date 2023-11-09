<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_M extends CI_Model
  {

    public function __construct()
    {
      parent::__construct();

      $this->load->database();
      $this->load->helper('url');
    }

    public function get_comments($idx)
    {
      // $this->db->order_by('idx', 'asc');
      $this->db->order_by('group_idx', 'asc');
      $this->db->order_by('group_order', 'desc');
      // $this->db->order_by('regdate', 'desc');

      $comment = $this->db->get_where('boards_comment', [ 'boards_idx' => $idx ] )->result();
      return $comment;
    }

    public function comments_create()
    {
      $idx = $this->input->post('comment_id');
      $board_id = $this->input->post('board_id');
      $board_ceontent = $this->input->post('contents');
      $group_idx = $this->input->post('group_idx');
      $group_order = $this->input->post('group_order');
      $depth = $this->input->post('depth');
      $user_id = $this->input->post('user_id');

      $data = [
        'boards_idx' => $board_id,
        'group_idx' => $idx." +1",
        'group_order' => '0',
        'depth' => '1',
        'content' => $board_ceontent,
        'user_id' => $user_id,
        'regdate' => date("Y-m-d H:i:s")
      ];
      
      $this->db->insert('boards_comment', $data);
      // $result = $this->db->insert('boards_comment', $data);
      // return $result;

      // 수정
      // $data2 = [
      //   'group_order' => ".$group_order. +1",
      //   'depth' => ".$depth. +1",
      // ];

      // $this->db->where('idx', $group_idx)->update('boards_comment', $data2);
      
      // "UPDATE board SET grpord = grpord + 1 where grpord >1 and groupno = 2;"
      $sql1 = 
      "UPDATE boards_comment SET group_order = ".$group_order." +1 WHERE group_order >1 AND group_idx = 1;";
      $this->db->query($sql1);

      // $sql2 = 
      // "UPDATE boards_comment SET group_order = ".$group_order." +1, depth = ".$depth." +1 WHERE idx = ".$idx.";";
      // $this->db->query($sql2);

      redirect("/freeboard//".$this->input->post('board_id'));
    // UPDATE board SET grpord = grpord +1  WHERE grpno = 2 AND grpord > 4번의 grpord;
    // WHERE group_idx = ".$group_idx.";";

    }
    
    // public function reply_create()
    // {
    //   $idx = $this->input->post('comment_id');
    //   $board_id = $this->input->post('board_id');
    //   $board_ceontent = $this->input->post('contents');
    //   $group_idx = $this->input->post('group_idx');
    //   $group_order = $this->input->post('group_order');
    //   $depth = $this->input->post('depth');
    //   $user_id = $this->input->post('user_id');

    //   $data = [
    //     'boards_idx' => $board_id,
    //     'content' => $board_ceontent,
    //     'group_idx' => $idx,
    //     'group_order' => $group_order,
    //     'depth' => $depth,
    //     'user_id' => $user_id,
    //     'regdate' => date("Y-m-d H:i:s")
    //   ];


    //   // 등록
    //   $this->db->insert('boards_comment', $data);
      
    //   // 수정

    //   $sql1 = 
    //   "UPDATE boards_comment SET group_order = ".$group_order." +1, depth = ".$depth." +1 WHERE idx = ".$idx.";";
    // // UPDATE board SET grpord = grpord +1  WHERE grpno = 2 AND grpord > 4번의 grpord;
    // // WHERE group_idx = ".$group_idx.";";
    //   $this->db->query($sql1);
    //   redirect("/freeboard//".$this->input->post('board_id'));
    // }
    // public function comments_create()
    // {
    //   // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
    //   $data = [
    //     'boards_idx' => $this->input->post('board_id'),
    //     // 'group_idx' => empty($this->input->post('comment_id')) == null && '0',
    //     'depth' => '1',
    //     'content' => $this->input->post('contents'),
    //     'user_id' => $this->input->post('user_id'),
    //     'regdate' => date("Y-m-d H:i:s")
    //   ];

    //   $result = $this->db->insert('boards_comment', $data);
    //   return $result;
    // }
    
    // public function reply_create()
    // {
    //   $data = [
    //     'boards_idx' => $this->input->post('board_id'),
    //     'content' => $this->input->post('contents'),
    //     'group_idx' => $this->input->post('comment_id'),
    //     // 'group_idx' => $this->input->post('group_idx'),
    //     'group_order' => $this->input->post('group_order'),
    //     'depth' => $this->input->post('depth'),
    //     'user_id' => $this->input->post('user_id'),
    //     'regdate' => date("Y-m-d H:i:s")
    //   ];

    //   $idx = $this->input->post('comment_id');
    //   $board_id = $this->input->post('board_id');
    //   $group_idx = $this->input->post('group_idx');
    //   $group_order = $this->input->post('group_order');
    //   $depth = $this->input->post('depth');

    //   // 등록
    //   $this->db->insert('boards_comment', $data);
      
    //   // 수정

    //   $sql1 = 
    //   "UPDATE boards_comment SET 
    //   group_order = ".$group_order." +1,
    //   depth = ".$depth." +1 
    //   WHERE idx = ".$idx.";";
    //   // WHERE group_idx = ".$group_idx.";";
    //   $this->db->query($sql1);
    //   redirect("/freeboard//".$this->input->post('board_id'));

    //   // WHERE group_idx = ".$this->input->post('group_idx').";");


    //   // $this->db->query("UPDATE boards_comment SET group_order = ".$this->input->post('group_order')." +1, depth = ".$this->input->post('depth')." +1, group_idx = ".$this->input->post('group_idx')." WHERE group_idx = ".$this->input->post('group_idx'));
    //   // $this->db->query("UPDATE boards_comment SET group_order = group_order +1 WHERE group_idx = ".$this->input->post('comment_id')." AND group_order  > 0");

    //   // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
    //   // $data = [
    //   //   'boards_idx' => $this->input->post('board_id'),
    //   //   // 'board_type' => $this->input->post('board_type'),
    //   //   'content' => $this->input->post('contents'),
    //   //   'user_id' => $this->input->post('user_id'),
    //   //   'regdate' => date("Y-m-d H:i:s")
    //   // ];
      
    //   // 'UPDATE posts SET ori_id = (select last_insert_id()) WHERE id = (select last_insert_id());'
    //   // $this->db->where('group_order', $idx)->update('boards_comment', $data2);
      
    //   // $data2 = [ 'group_idx' => '2' ];
    //   // $this->db->where('group_idx', '2')->update('boards_comment', $data2);

    //   // $qry = "SELECT SEQ, TITLE, CONTENTS, USER_ID, VIEW_CNT FROM BOARD_TB WHERE SEQ='".$h_seq."' AND USER_ID='".$h_user_id."'";
    //   // return $this->db->query($qry)->result();

    //   ///
    //   // $qry = "'UPDATE boards_comment SET group_idx = (select last_insert_idx()) WHERE group_idx = (select last_insert_idx());";
    //   // $this->db->query($qry)->result();
      
    //   // 업데이트
    //   // $sql2 = "insert into boards_comment( boards_idx, content, group_idx, group_order, depth ) values(".$this->input->post('board_id').", ".$this->input->post('contents').", (select last_insert_id()+1), 1, 0)";

    //   // $qry = $this->db->query($sql2);
      
    //   // return $qry;

    //   // $sql1 = "
    //   // insert into boards_comment( boards_idx, content, group_idx, group_order, depth ) 
    //   // values
    //   // (".$this->input->post('board_id').", ".$this->input->post('contents').", 
    //   // (select last_insert_id()+1), 1, 0)
    //   // ";
    //   // $this->db->query($sql1);

      
      
      
    //   // $result = $this->db->insert('boards_comment', $data);
    //   // return $result;
      

    //   ///

    //   // 코드이그나이터 update 쿼리문
    //   //   $data = array('pdt_tot' => $pdt_tot);
    //   //   $this->db->where('planid', $planid);
    //   //   $this->db->where('pdt_seq', $pdt_seq);
    //   //   $this->db->update('tb_inferior_log', $data);
    //   // update tb_inferior_log set pd_tot=$pdt_tot where planid=$planid and pdt_seq=$pdt_seq

    //   // $result = $this->db->insert('boards_comment', $data);
    //   // return $result;
    // }

    public function comment_board_type()
    {
      return $this->input->post('board_type');
    }

    public function create()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'board_type' => $this->input->post('board_type'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('contents'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards', $data);
      return $result;
    }

    public function get($idx)
    {
      $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
      return $board;
    }

    public function update()
    {

    }
    
  
    public function GetBoardList()
    {
      $this->load->database();
      $result = $this->db->query('SELECT * FROM boards')->result();
      $this->db->close();
      
      return $result;
    }
    
    public function GetBoardTotal()
    {
      $this->load->database();
      $result = $this->db->query('SELECT idx FROM boards')->num_rows();
      $this->db->close();
      
      return $result;
    }

  }

?>