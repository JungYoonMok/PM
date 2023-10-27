<?
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Board extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');

    $this->load->model('Board_model', 'board');
  }

  public function index()
  {
    // 페이지네이션
    $this->load->library('pagination');

    $config['base_url'] = '/crud/board/';
    $config['total_rows'] = $this->board->getAll('count', 0, 0);
    $config['per_page'] = '10';
    $config['uri_segment'] = '2';

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

    $data['pages'] = $this->pagination->create_links();

    //
    $data['list'] = $this->board->getAll('all', $config['per_page'], $page);

    // $this->load->view('board/list');
    $this->load->view('board/list', $data);
  }

  public function create()
  {
    $this->load->view('board/create');
  }

  public function store()
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('contens', 'Contens', 'required');

    if($this->form_validation->run()) {

      $file1 = ""; // 초기화

      $config['upload_path'] = './uploads/'; // 코드이그나이터 index.php 기준
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0';
      $config['max_width'] = '0';
      $config['max_height'] = '0';

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if( ! $this->upload->do_upload("file_1") )
      {

        $error = array('error' => $this->upload->display_errors());
        echo "file upload error :".print_r($error);

      } else {

        // $data = array('upload_data' => $this->upload->data());
        $file1 = $this->upload->data('file_name');
        echo "file upload success :";//. print_r($data);

      }

      $this->board->store($file1);
      redirect('/board');
    } else {
      echo "Error";
    }
  }

  public function show($idx)
  {
    $data['view'] = $this->board->get($idx);

    $this->load->view("board/show", $data);
  }
  
  public function edit($idx)
  {
    $data['edit'] = $this->board->get($idx);

    $this->load->view("board/edit", $data);
  }

  public function update($idx)
  {
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('contens', 'Contens', 'required');

    if($this->form_validation->run()) {

      $file1 = ""; // 초기화

      $config['upload_path'] = './uploads/'; // 코드이그나이터 index.php 기준
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size'] = '0';
      $config['max_width'] = '0';
      $config['max_height'] = '0';

      $this->load->library('upload', $config);
      $this->upload->initialize($config);

      if ( ! $this->upload->do_upload("file_1") )
      {
        $error = array('error' => $this->upload->display_errors());
        echo "file upload error :".print_r($error);
      } else {
        // 이전 파일 제거
        $old_file = $this->board->get($idx);
        if(file_exists('./uploads/'.$old_file->file)) {
          unlink(FCPATH . './uploads/'.$old_file->file);
          echo "Delete";
        } else {
          echo "Found some error";
        }

        // 수정된 파일 저장
        $file1 = $this->upload->data('file_name');

        // $data = array('upload_data' => $this->upload->data());
        // echo "file upload success : ".print_r($data);
      }

      //
      $this->board->update($idx, $file1);
      redirect('/board');
    } else {
      echo "Error";
    }
  }

  public function delete($idx)
  {

    // 이전 파일 제거
    $old_file = $this->board->get($idx);

    $item = $this->board->delete($idx);
    
    if($item) {
      if(file_exists('./uploads/'.$old_file->file)) {
        unlink(FCPATH . './uploads/'.$old_file->file);
        echo "Delete";
      } else {
        echo "Found some error";
      }
    }

    redirect("/board");
  }

  }
?>