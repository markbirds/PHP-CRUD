<?php

	require('../config/define.php');
	require('../config/db.php');

	if(isset($_POST['submit'])){
		$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

		$query = "DELETE FROM crud WHERE id = " . $delete_id;

		if(mysqli_query($conn, $query)){
		}else{
			echo 'ERROR';
		}
	}	

	$query = "SELECT * FROM crud ORDER BY date DESC";
	$result = mysqli_query($conn, $query);
	$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP READ</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="p-3 d-inline-block"> <!--back button-->
	<a href="<?php echo ROOT_URL; ?>">
	<button type="button" class="btn btn-dark" style="font-size: 20px;">Back</button>				
	</a>
</div> <!--back button-->	


<div class="container w-50"> <!--container-->
	<div class="shadow p-4 mb-4 bg-white" style="height: 450px;overflow: auto;"><!--shadow-->
		<?php foreach($persons as $person): ?>
			<div class="card m-2">
			<div class="card-body pb-2">
			<div class="row"><!--row-->
			 <div class="col-sm-9"><!--col-sm-9-->
				<h6><?php echo $person['name']; ?></h6>
				<p>Created at <?php echo $person['date']; ?></p>
			</div><!--col-sm-9-->
			<div class="col-sm-3"><!--col-sm-3-->
		  		<div class="float-right pt-2"> <!--float-right pt-2-->
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
				    Delete
				</button>	
				<!-- The Modal -->
			  <div class="modal fade" id="myModal">
			    <div class="modal-dialog modal-dialog-centered modal-sm">
			      <div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body text-center">
			          <h5>Delete Profile?</h5>
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
					<input type="hidden" name="delete_id" value="<?php echo $person['id'];?>">
					<input type="submit" name="submit" class="btn btn-danger" value="Delete">	
			        </form>
			          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
			        </div>
			        
			      </div>
			    </div>
			  </div>	  			
		  		</div> <!--float-right pt-2-->			
			</div> <!--col-sm-3-->
			</div><!--row-->
			</div><!--card body-->
			</div>
		<?php endforeach; ?>
	</div><!--shadow-->
</div> <!--container-->	
</body>
</html>


			  		
