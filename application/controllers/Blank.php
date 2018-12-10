<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blank extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
//        $this->load->library('session');
//        $this->load->library('form_validation');
//        $this->load->model('ordertran_model','ordertran');
    }

    public function index()
	{
        $data['page'] = 'blank';
		$this->load->view('hf/header');
		$this->load->view('pages/nav', $data);
		$this->load->view('pages/blank');
		$this->load->view('hf/footer',$data);
	}
}
