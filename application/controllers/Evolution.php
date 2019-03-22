<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evolution extends CI_Controller {
	public function index()
	{
		$this->load->database();
		

		//$this->db->query('CREATE DATABASE IF NOT EXISTS getyourstage');
		// $myObj = new stdClass();
		// $myObj->name = "John";
		// $myObj->age = 30;
		// $myObj->city = "New York";
		// $myObj->smp[0] = new stdClass();
		// $myObj->smp[0]->city = "Test";
		// $myJSON = json_encode($myObj);
		$this->load->model("ec");
		//return $this->ok($myJSON); //Not a global function so need to add $this
		$query = $this->db->query('SELECT * FROM ec FETCH NEXT 10 ROWS ONLY');
		$ec = New Ec();
		foreach ($query->result() as $row)
		{
		        $ec->setData($row);
		        echo $ec->idEc."<br>";
		}
	}
	public function ok($content)
	{
		$this->output->set_status_header(200);
		echo $content;
	}
	public function noContent($content)
	{
		$this->output->set_status_header(204);
		echo $content;
	}
	public function badRequest($content)
	{
		$this->output->set_status_header(400);
		echo $content;
	}
}
