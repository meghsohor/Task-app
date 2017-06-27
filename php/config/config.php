<?php

Class Database {
	public $host   = "localhost";
	public $user   = "root";
	public $pass   = "";
	public $dbname ="php_task";

	public $link;
	public $success;
	public $error;

	public function __construct(){
		$this->connectDB();
	}

	private function connectDB(){
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
		if(!$this->link){
			$this->error ="Database Connection fail".$this->link->connect_error;
			return false;
		}
	}	

	// Select or Read data
	
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		} else {
			return false;
		}
	}
	
	// Insert data
	public function insert($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($insert_row){
		//$success="New Task added!"
		header("Location: index.php?success=".urlencode('New Task added!'));
		exit();
	} else {
		header("Location: index.php?error=".urlencode($this->link->error));
	}
  }
  
    // Update data
  	public function update($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($update_row){
		header("Location: index.php?success=".urlencode('Task Updated!'));
		exit();
	} else {
		header("Location: index.php?error=".urlencode($this->link->error));
	}
  }
  
  // Delete data
   public function delete($query){
	$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
	if($delete_row){
		header("Location: index.php?success=".urlencode('Task Deleted!'));
		exit();
	} else {
		header("Location: index.php?error=".urlencode($this->link->error));
	}
  }
}