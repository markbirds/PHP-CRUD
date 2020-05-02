<?php

	require('../config/define.php');
	require('../config/db.php');

	$id = mysqli_real_escape_string($conn, $_GET['id']);

	$query = "SELECT * FROM crud WHERE id = " . $id;
	$result = mysqli_query($conn, $query);
	$person = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP PROFILE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="p-3 d-inline-block"> <!--back button-->
	<a href="<?php echo ROOT_URL . 'process/read.php'; ?>">
	<button type="button" class="btn btn-dark" style="font-size: 20px;">Back</button>				
	</a>
</div> <!--back button-->	


<div class="container w-50"> <!--container-->
	<div class="shadow p-4 mb-4 bg-white" style="height: 450px;overflow: auto;"><!--shadow-->
			<div class="card m-2">
			  <div class="card-body pb-2 px-5">
			  	<h3 class="text-center py-3"> I am <?php echo $person['name']; ?></h6>
			  	<p>Age: <?php echo $person['age']; ?></p>
			  	<p>Address: <?php echo $person['address']; ?></p>
			  	<p>Year: <?php echo $person['year']; ?></p>
			  	<p>Email: <?php echo $person['email']; ?></p>
			  	<p>Description: </p>
			  	<p><?php echo $person['description']; ?></p>
			  </div>
			</div>
	</div><!--shadow-->
</div> <!--container-->	
</body>
</html>