<?

  class Board_create_model extends CI_Model {

    public function __construct()
    {
      $this->load->database();
      $this->load->helper('url');
    }

    public function store()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'title' => $this->input->post('title'),
        'contents' => $this->input->post('contents'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards', $data);
      return $result;
    }
    
  }

?>