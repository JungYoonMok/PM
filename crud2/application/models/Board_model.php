<?
  class Board_model extends CI_Model
  {
    public function __construct()
    {
      $this->load->database();
      $this->load->helper('url');
    }

    public function store()
    {
      $data = [
        'title' => $this->input->post('title'),
        'contens' => $this->input->post('contens'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards', $data);
      return $result;
    }

    public function get($idx)
    {
      $board = $this->db->get_where('boards', [ 'idx' => $idx ])->row();
      return $board;
    }
    
    public function getAll($type="all", $limit=3, $page=1)
    {
      // 전체 게시물 카운트 하는거
      // 전체 게시물 가져오는거

      if($type=="count")
      {
        // 내림순 올림순 - asc or desc
        $board = $this->db->get('boards')->num_rows();
      } else {
        $this->db->limit($limit, $page);
        $this->db->order_by('idx', 'asc');
        $board = $this->db->get('boards')->result();
      }
      
      return $board;
    }

    public function update($idx)
    {
      $data = [
        'title' => $this->input->post('title'),
        'contens' => $this->input->post('contens')
      ];

      $result = $this->db->where('idx', $idx)->update('boards', $data);
      return $result;
    }

    public function delete($idx)
    {
      $result = $this->db->delete("boards", array('idx' => $idx));

      return $result;
    }

  }
?>