<?php

	require('../config/define.php');
	require('../config/db.php');

	if(isset($_POST['submit'])){

	$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);		
	$address = mysqli_real_escape_string($conn, $_POST['address']);	
	$year = mysqli_real_escape_string($conn, $_POST['year']);	
	$email = mysqli_real_escape_string($conn, $_POST['email']);	
	$description = mysqli_real_escape_string($conn, $_POST['description']);

	$name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
	$age = filter_var($age, FILTER_SANITIZE_SPECIAL_CHARS);
	$address = filter_var($address, FILTER_SANITIZE_SPECIAL_CHARS);
	$year = filter_var($year, FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS);
	$description = filter_var($description, FILTER_SANITIZE_SPECIAL_CHARS);

	$query = "UPDATE crud SET 
				name = '$name',
				age = '$age',
				address = '$address',
				year = '$year',
				email = '$email',
				description = '$description'
				WHERE id = {$update_id}";

	if(mysqli_query($conn, $query)){
		header('Location: '. ROOT_URL . 'process/update.php ');
	}else{
		echo 'ERROR';
	}
	}

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
	<title>PHP UPDATE PROFILE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="pt-3 pl-3 d-inline-block"> <!--back button-->
	<a href="<?php echo ROOT_URL . 'process/update.php'; ?>">
	<button type="button" class="btn btn-dark" style="font-size: 20px;">Back</button>				
	</a>
</div> <!--back button-->	
<div class="container w-50"> <!--container-->
<div class="shadow p-4 mb-4 bg-white"><!--shadow-->	
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="needs-validation" novalidate>
    	<div class="row"> <!--row-->
    		<div class="col-sm-8"> <!--column1-->
    		<div class="form-group">
		      <label for="name">Name:</label>
		      <input type="text" class="form-control" id="name" value="<?php echo $person['name'];?>" name="name" required>
		    </div>
		    <div class="form-group">
		      <label for="address">Address:</label>
		      <input type="text" class="form-control" id="address" value="<?php echo $person['address'];?>" name="address" required>
		    </div>    
		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="email" class="form-control" id="email" value="<?php echo $person['email'];?>" name="email" required>
		    </div>			
    		</div> <!--column1-->
    		<div class="col-sm-4"> <!--column2-->
    		<div class="form-group">
		      <label for="age">Age:</label>
		      <input type="number" class="form-control" id="age" min="1" max="150" value="<?php echo $person['age'];?>" name="age" required>
		    </div>
		    <div class="form-group">
		      <label for="year">Year Level:</label>
		      <input type="text" class="form-control" id="year" value="<?php echo $person['year'];?>" name="year" required>
		    </div>    		
    		</div> <!--column1-->
    	</div> <!--row-->
    	<div class="form-group">
		  <label for="description">Describe yourself:</label>
		  <textarea class="form-control" rows="3" id="description" name="description" required><?php echo $person['description'];?></textarea>
		</div>
		<div class="text-right">
			<input type="hidden" name="update_id" value="<?php echo $person['id'];?>">
			<input type="submit" name="submit" class="btn btn-warning mt-2" value="Update">		
		</div>
  </form>
</div><!--shadow-->
</div> <!--container-->

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

</body>
</html>