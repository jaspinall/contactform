<?php
		
		if ($_POST['submit']) {	
	
		
			if (!$_POST['firstName']) {
			
				$error="<br>Please enter your first name.";
				
				}
				
			if (!$_POST['lastName']) {
			
				$error.="<br>Please enter your last name.";
				
				}
				
			if (!$_POST['email']) {
			
				$error.="<br>Please enter your email address.";
				
				}
				
			if ($_POST['email']!="" AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    			
    			$error.="<br>Please enter a valid email address";
				
				}	
				
			if (!$_POST['phoneNumber']) {
			
				$error.="<br>Please enter your phone number.";
				
					}	
					
			if($error) {
			
				$result='<div class="alert alert-danger"><strong>There were error(s) in your form. Please correct the following:</strong><br>'.$error.'</div>';
				
				} else {
			
										
			if (mail("julia.stefanczyk@gmail.com", "Comment from website!", "Name: ".$_POST['firstName']." ".$_POST['lastName']."
			
			Email: ".$_POST['email']."
			
			Phone Number: ".$_POST['phoneNumber']."
			
			Comments: ".$_POST['comments'])) {
			
				$result='<div class="alert alert-success"><strong>Thank you for contacting us.</strong></div>';
			
				header('Location:thankyou.php');
				
			
				} else {
				
				$result='<div class="alert alert-danger"><strong>Sorry, there were errors with your form. Please try again.</strong></div>';
				
			}	
			
		}	
		
	}	
	
	?>


<!doctype html>
<html>
<head>
    <title>Example Domain</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<style>

#emailForm {
		margin:30px 30px 30px 30px;
		border: 1px solid grey;
		border-radius: 10px;
		}

</style>

</head>

<body>

	<div class="container" id="emailForm">
	
		<div class="row">
		
		<div class="col-md-6 col-md-offset-3 col-sm-offset-1 col-xs-offset-1">
		
		
	<h1>Contact Form</h1>
	
	<p>Enter your name, email, phone number, and a short description of your request.</p>

	<?php echo $result ?>
	
	
	<form method="post">
	
		<div class="form-group">
			<label for="firstName" class="control-label">First Name</label>	
				<input name="firstName" class="form-control" type="text" placeholder="First Name" value="<?php echo $_POST['firstName']?>"/>	
		</div>	
		<div class="form-group">
			<label for="lastName" class="control-label">Last Name</label>
				<input name="lastName" class="form-control" type="text" placeholder="Last Name" value="<?php echo $_POST['lastName']?>"/>
		</div>
		<div class="form-group">
			<label for="email" class="control-label">Email</label>
				<input name="email" class="form-control" type="text" placeholder="Email"/>
		</div>
		<div class="form-group">
			<label for="phoneNumber" class="control-label">Phone Number</label>
				<input name="phoneNumber" class="form-control" type="text" placeholder="(555) 555-5555" value="<?php echo $_POST['phoneNumber']?>"/>
		</div>
		<div class="form-group">
			<label for="comments" class="control-label">Comments</label>
				<textarea name="comments" class="form-control" rows="5" placeholder="Comments"><?php echo $_POST['comments']?></textarea>	
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-success"/>		
		</div>	
	</form>
	
		</div>
		</div>
	</div>


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


</body>
</html>