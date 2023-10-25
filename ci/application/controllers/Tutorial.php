<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

  public function index()
	{
    $data = array(
      'title' => 'Tutorial::index',
      'contens' => 'Hellow Index'
    );

    $this->load->view('header', $data);
    // $this->load->view('contens', $data);
		$this->load->view('index', $data);
    $this->load->view('footer', $data);
	}

	public function second()
	{
    $data = array(
      'title' => 'Tutorial::second',
      'contens' => 'Hellow Second'
    );

    $this->load->view('header', $data);
    // $this->load->view('contens', $data);
		$this->load->view('second', $data);
    $this->load->view('footer', $data);
	}

  // php 정보 페이지
	public function phpinfo()
	{
		$this->load->view('phpinfo');
	}

  public function members()
  {
    $this->load->model('Member_model');
    
    $data['members'] = $this->Member_model->GetMembers();

    $this->load->view('members', $data);
  }

}
