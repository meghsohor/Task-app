<?php include 'config/config.php';
	//Connecting to the Database
	  $db = new Database();
	  //If the Create Task Modal form in the index.php page is submitted
	  if (isset($_POST['addTask'])) {
	  	 $name = $_POST['name'];
	  	 $description = $_POST['description'];
	  	 $time = date("Y-m-d H:i:s");

	  	 $query = "INSERT INTO `tasks` (`name`, `description`, `dateCreated`, `dateUpdated`) VALUES ('$name', '$description', '$time', '$time')"; 
      	 $task = $db->insert($query);
	  }
 ?>