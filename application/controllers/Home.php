<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		//$db = $this->load->database();
		//$this->db->query('CREATE DATABASE IF NOT EXISTS getyourstage');
		$data['title'] = 'Home';
		$this->load->view('home', $data);
	}
	public function test()
	{
		$data['title'] = 'Test Controller';
		$this->load->view('home', $data);
	}
}
