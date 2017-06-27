<?php include 'config/config.php';
	//Connecting to the Database
	  $db = new Database();
	  // IF Edit Task Form is submitted 
	  if (isset($_POST['editTask'])) {
	  	 $id = $_POST['id'];
	  	 $name = $_POST['name'];
	  	 $description = $_POST['description'];
	  	 $updateTime = date("Y-m-d H:i:s");

	  	 $query = "UPDATE `tasks` SET `name` = '$name', `description` = '$description', `dateUpdated` = '$updateTime' WHERE `id` = $id"; 

      	 $db->update($query);
	  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style type="text/css">
		body {
			padding: 50px 0;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Edit Task</h1>
		<hr>

		<!-- Fetching existing data of the selected Task based on ID -->
	  	<?php $query = "SELECT * FROM tasks WHERE id= ".$_GET['id']."";
		  $result = $db->select($query);

		  if($result) {
		  	$task= $result->fetch_assoc();
		?>
			<!-- Edit Task Form -->
			<form action="editTask.php" method="post">
			  <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
			  <div class="form-group">
			    <label for="name">Name:</label>
			    <input type="text" class="form-control" name="name" required="required" value="<?php echo $task['name'] ?>">
			  </div>
			  <div class="form-group">
			    <label for="description">Description:</label>
			    <textarea class="form-control" name="description" required="required" ><?php echo $task['description'] ?></textarea>
			  </div>
			  <button type="submit" class="btn btn-primary" name="editTask">Update</button>
			</form>
	  <?php } //End of IF
	        else {
	        	echo "<h2 class='alert alert-danger'>No Task Found</h2>";
	        }
	  ?>	
	</div>  

	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>