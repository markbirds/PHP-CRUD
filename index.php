<?php require('config/define.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="padding:50px 250px;"> <!--container-->
<div class="shadow p-4 mb-4 bg-white"><!--shadow-->
<div>
	<h1 class="text-center">PHP CRUD</h1>
</div>
	<div class="row p-4"> <!--row-->
		<div class="col-sm-6 px-1"><!--column1-->
			<div class="float-right"> <!--create button-->
				<a href="<?php echo ROOT_URL . 'process/create.php'; ?>">
				<button type="button" class="btn btn-success" style="width: 200px;height: 150px;font-size: 30px;">Create</button>				
				</a>
			</div> <!--create button-->
			<div class="float-right mt-2"> <!--update button-->
				<a href="<?php echo ROOT_URL . 'process/update.php'; ?>">
				<button type="button" class="btn btn-warning" style="width: 200px;height: 150px;font-size: 30px;">Update</button>				
				</a>
			</div> <!--update button-->
		</div>
		<div class="col-sm-6 px-1"><!--column2-->
			<div> <!--read button-->
				<a href="<?php echo ROOT_URL . 'process/read.php'; ?>">
				<button type="button" class="btn btn-info" style="width: 200px;height: 150px;font-size: 30px;">Read</button>				
				</a>
			</div> <!--read button-->
			<div class="mt-2"> <!--delete button-->
				<a href="<?php echo ROOT_URL . 'process/delete.php'; ?>">
				<button type="button" class="btn btn-danger" style="width: 200px;height: 150px;font-size: 30px;">Delete</button>				
				</a>
			</div> <!--delete button-->
		</div>			
		</div>
	</div> <!--row-->
</div><!--shadow-->
</div> <!--container-->

</body>
</html>