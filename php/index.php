<?php include 'config/config.php';
	  //Connecting to the Database
	  $db = new Database();
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
		table>thead>tr>th {text-align: center;font-size: 1.4em}
	</style>
</head>
<body>
	<div class="container">
		<div class="clearfix">
			<h1 class="pull-left">Tasks To Do</h1>
			<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#createTask">Create Task</button>
		</div>
		<hr>
		<?php
			if (isset($_GET['success'])) {
				echo "<div class='alert alert-success alert-dismissable' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<p>".$_GET['success']."</p></div>";
			}
		?>
		<?php
			if (isset($_GET['error'])) {
				echo "<div class='alert alert-danger alert-dismissable' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<p>".$_GET['error']."</p></div>";
			}
		?>

		<!-- Fetching all the tasks from `tasks` table order by Last updated item first in the list-->

	  	<?php $query = "SELECT * FROM tasks ORDER BY dateUpdated DESC";
		  $tasks = $db->select($query);

		  if($tasks) {
		?>
			<table class="table table-bordered table-striped text-center">
		  	<thead>
		  		<tr>
		  			<th>Name</th>
		  			<th>Description</th>
		  			<th>Action</th>
		  		</tr>
		  	</thead>
		  	<tbody>
		<?php   	
		  	while($task = $tasks->fetch_assoc())	{
		?>
	  		<tr>
	  			<td><?php echo $task['name'] ?></td>
	  			<td><?php echo $task['description'] ?></td>
	  			<td>
	  				<!-- Update the task -->
	  				<a class="btn btn-sm btn-info" href="editTask.php?id=<?php echo $task['id'] ?>">Edit</a>
	  				<!-- Delete the task -->
	  				<a class="btn btn-sm btn-danger" onclick="deleteTask('<?php echo $task['id'] ?>')" href="#">Delete</a>
	  			</td>
	  		</tr>
	  	<?php }  //End of While	?>
	  	</tbody>
	  </table>
	  <?php } //End of IF
	        else {
	        	echo "<h2 class='alert alert-danger'>No Task Found</h2>";
	        }
	  ?>	
	</div>  


	<!-- Create Task Modal -->
<div id="createTask" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add a Task</h4>
      </div>
      <div class="modal-body">
      	<!-- Add a task Form -->
        <form action="addTask.php" method="post">
		  <div class="form-group">
		    <label for="name">Name:</label>
		    <input type="text" class="form-control" name="name" required="required">
		  </div>
		  <div class="form-group">
		    <label for="description">Description:</label>
		    <textarea class="form-control" name="description" required="required"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" name="addTask">Submit</button>
		</form>
      </div>
    </div>

  </div>
</div>

	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function deleteTask (id) {
			
			event.preventDefault();

			//Taking the confirmation before deleting the task
			var confirmDelete = confirm("Are you sure to delete the task?");
			if(confirmDelete) {
				window.location.href = "deleteTask.php?id="+id+"";
			}
		}
	</script>
</body>
</html>