<?php

	require('../config/define.php');
	require('../config/db.php');

	$query = "SELECT * FROM crud ORDER BY date DESC";
	$result = mysqli_query($conn, $query);
	$persons = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP UPDATE</title>
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
			  	<div class="row">
			  		<div class="col-sm-9">
					  	<h6><?php echo $person['name']; ?></h6>
					  	<p>Created at <?php echo $person['date']; ?></p>
			  		</div>
			  		<div class="col-sm-3">
		  			<div class="float-right pt-2">
	  				<a href="<?php echo ROOT_URL . 'process/updatePerson.php?id=' . $person['id']; ?>">
					<button type="button" class="btn btn-warning">Update</button>
					</a>			  			
		  			</div>  			
			  		</div>
			  	</div>

			  </div>
			</div>
		<?php endforeach; ?>
	</div><!--shadow-->
</div> <!--container-->	
</body>
</html>


			  		
