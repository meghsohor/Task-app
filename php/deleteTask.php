<?php include 'config/config.php';
	//Connecting to the Database
	  $db = new Database();

	  if (isset($_GET['id'])) {
	  	 $query = 'DELETE FROM `tasks` WHERE `tasks`.`id` = '.$_GET["id"].''; 
      	 $task = $db->delete($query);
	  }
 ?>