<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ec extends CI_Controller {

	public function save() {
		$this->loadUploadConfig();
        $this->config->set_item('language', 'french');
        if (!$this->upload->do_upload('csvFile')) {
        	echo $this->upload->display_errors();
        } else {
        	$upload_data = $this->upload->data(); 
        	$file_name = $upload_data['file_name'];
       		if (($handle = fopen("./uploads/".$file_name, "r")) !== FALSE) {
       			$index = 0;
			    while (($line = fgetcsv($handle, 0, ';')) !== FALSE) {
			    	try{
			    		$err = false;
			    		$this->lineIsValid($line);
			    	}catch(Exception $e){
			    		$err = true;
						$this->badRequest($e->getMessage()." ligne ".$index."<br>"); // GET OU OF THE WHILE CAUSE PHP RETURN DONT SEND DIRECT RESPONSE
					}
					if(!$err){
						try{
				    		$this->saveLine($line);
				    	}catch(Exception $e){
							$this->badRequest($e->getMessage()." ligne ".$index."<br>");
						}
					}
			    	$index++;
				}
				fclose($handle);  
			}
        }

	}

	public function lineIsValid($line) {
		$this->load->model("ectable");
		$this->load->helper('data_validation_helper');
		$ec = New EcTable();
		if(count($line) != $ec->numberOfAtt()) { //verif number of data per line is correct
			throw new Exception("Nombre de données non correctes");
		}
		try{
			dataIsValid($line); //verif if the type of data is correct
		}catch(Exception $e){
			throw new Exception($e->getMessage());
		}
	}

	public function saveLine($line) {
		$this->load->model("ectable");
		$ec = New EcTable();
		try{
			$ec->setData($line);
			$ec->saveDB();
		} catch (Exception $e) {
			throw new Exception("Database error: ".$e->getMessage());
		}
	}

	public function loadUploadConfig() {
		$config['upload_path']          = './uploads';
        $config['allowed_types']        = 'csv|xml';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);
	}

	public function badRequest($content) // CANT PU IT IN HELPER CAUSE OF $THIS CONTEXT  
	{
		$this->output->set_status_header(400);
		echo $content;
	}

	// public function index()
	// {
	// 	$this->load->database();
	// 	$this->load->model("ec");
	// 	//return $this->ok($myJSON); //Not a global function so need to add $this
	// 	$query = $this->db->query('SELECT * FROM ec FETCH NEXT 10 ROWS ONLY');
	// 	$ec = New Ec();
	// 	foreach ($query->result() as $row)
	// 	{
	// 	        $ec->setData($row);
	// 	        echo $ec->idEc."<br>";
	// 	}
	// }

}