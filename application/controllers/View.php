<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
	public function index()
	{
		$data['title'] = "Index";
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
	}
}
