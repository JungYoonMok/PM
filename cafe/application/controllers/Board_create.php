<?
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Board_create extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');

      // 불러옴과 동시에 별칭 지정 Board_create_model -> board
      $this->load->model('Board_create_model', 'board');
    }
    
    public function index()
    {
      $this->load->view('header');
      $this->load->view('board/free_board_create');
      $this->load->view('footer');
    }

    public function store_file()
    {
      $config['upload_path'] = './uploads';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0';
      $config['max_width'] = '0';
      $config['max_height'] = '0';
      // $config['file_name'] = date("ymd") . '_' . date("His"); // 이미지 파일명 변환
      $this->load->library('upload', $config);
      
      if( ! $this->upload->do_upload("upload") ) {
        echo "<script>alert('업로드에 실패 했습니다. ".$this->upload->display_errors('','')."')</script>";
      } else {
        $data = array('upload_data' => $this->upload->data());
        echo "성공";
        var_dump($data);
        
        // return new JsonResponse([
        //   'uploaded' => true,
        //   'fileName' => $image,
        //   // 'url' => $url
        //   'url' => './uploads/test.png'
        // ], 200);

      }
    }

    public function store()
    {
      // $config['upload_path'] = './uploads';
      // $config['allowed_types'] = 'gif|jpg|png';
      // $config['max_size'] = '0';
      // $config['max_width'] = '0';
      // $config['max_height'] = '0';
      // // $config['file_name'] = date("ymd") . '_' . date("His"); // 이미지 파일명 변환
      // $this->load->library('upload', $config);
      
      // if( ! $this->upload->do_upload("upload") ) {
      //   echo "<script>alert('업로드에 실패 했습니다. ".$this->upload->display_errors('','')."')</script>";
      // } else {
      //   $data = array('upload_data' => $this->upload->data());
      //   echo "성공";
      //   var_dump($data);
      // }
    


      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('contents', 'Contents', 'required');

      if($this->form_validation->run())
      {
        // board 라는 별칭 안에 store를 실행
        $this->board->store();
        // 정상적이면 리다이렉트 실행
        redirect('/board');
      } else {
        echo "Board Create Error..";
      }
    }

  }
?>