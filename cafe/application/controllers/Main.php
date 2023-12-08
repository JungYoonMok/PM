<?php
	date_default_timezone_set('Asia/Seoul');
	defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// 세션 체크
    if(!$this->session->userdata('user_id')) {
      redirect('/login');
      [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
    }
		
		$this->load->model('main_model');
		$this->load->library('layout');
	}
	
	public function index()	{
		
		$data['list'] = $this->main_model->GetBoardList();
		$data['total_notice'] = $this->main_model->GetBoardTotal('notice');
		$data['total_freeboard'] = $this->main_model->GetBoardTotal('freeboard');
		$data['total_hellow'] = $this->main_model->GetBoardTotal('hellow');
		$data['board_list'] = $this->main_model->BoardList();

		$this->layout->custom_view('main', $data);
	}
}
