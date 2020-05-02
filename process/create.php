<?php 
	require('../config/define.php');
	require('../config/db.php');


	if(isset($_POST['submit'])){

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

		$query = "INSERT INTO crud (name,age,address,year,email,description) 
					VALUES ('$name', '$age','$address','$year','$email','$description')";

		if(mysqli_query($conn, $query)){
		}else{
			echo 'ERROR';
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP CREATE</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="pt-3 pl-3 d-inline-block"> <!--back button-->
	<a href="<?php echo ROOT_URL; ?>">
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
		      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
		    </div>
		    <div class="form-group">
		      <label for="address">Address:</label>
		      <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
		    </div>    
		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
		    </div>			
    		</div> <!--column1-->
    		<div class="col-sm-4"> <!--column2-->
    		<div class="form-group">
		      <label for="age">Age:</label>
		      <input type="number" class="form-control" id="age" min="1" max="150" placeholder="Enter age" name="age" required>
		    </div>
		    <div class="form-group">
		      <label for="year">Year Level:</label>
		      <input type="text" class="form-control" id="year" placeholder="Enter year level" name="year" required>
		    </div>    		
    		</div> <!--column1-->
    	</div> <!--row-->
    	<div class="form-group">
		  <label for="description">Describe yourself:</label>
		  <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
		</div>
		<div class="text-right">
			<input type="submit" name="submit" class="btn btn-success mt-2" value="Create">		
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