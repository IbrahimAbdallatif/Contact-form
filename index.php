<?php 
	// Check if user is comming from a Request
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		// Assign variables

		$user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$cell = filter_var($_POST['cellphone'],FILTER_SANITIZE_NUMBER_INT);
		$msg = filter_var($_POST['message'],FILTER_SANITIZE_STRING);

		// Creating Array of Errors
		
		$formErrors = array();

		if (strlen($user) <= 3) {
			$formErrors[] = "User Name must be longer than <strong>3</strong> characters";
		} 

		if (strlen($msg) <= 10) {
			$formErrors[] = "Message can't be less than <strong>10</strong> characters";
		}
		
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Form</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/contact.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,700,900,900i">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
	<h1 class="text-center">Contact Us</h1>

		<!-- Start Form -->
		
		<form class="contact-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">


		<?php if(!empty($formErrors)) {?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			<?php
				foreach ($formErrors as $error) {
					echo $error . '<br/>';
				}
			?>
			</div>
			<?php } ?>
			<div class="form-group">
			
				<input 
						class="username form-control" 
						type="text" 
						name="username" 
						placeholder="Your Name"
						value="<?php if (isset($user)) { echo $user; } ?>">
				<i class="fa fa-user fa-fw"></i>
				<span class="asterisx">*</span>
				<div class="alert alert-danger custom-alert">
				User Name must be lonnger than <strong>3</strong> characters !
				</div>
			</div>
			<div class="form-group">
				<input 
						class="form-control" 
						type="email" 
						name="email" 
						placeholder="Your Email"
						value="<?php if (isset($email)) { echo $email; } ?>">
				<i class="fa fa-envelope fa-fw"></i>
				<span class="asterisx">*</span>
				<div class="alert alert-danger custom-alert">
					Email can't be <strong>empty !</strong>
				</div>
			</div>
			<input 
					class="form-control" 
					type="text" 
					name="cellphone" 
					placeholder="Phone Number"
					value="<?php if (isset($cell)) { echo $cell; } ?>">
			<i class="fa fa-phone fa-fw"></i>
			<div class="form-group">
				<textarea 
						class="form-control" 
						name="message"
						placeholder="Your Message!"
						><?php if (isset($msg)) { echo $msg; } ?></textarea>
				<span class="asterisx">*</span>
				<div class="alert alert-danger custom-alert">
					Message can't be less than <strong>10</strong> characters !
				</div>
			</div>	
			<input 
					class="btn btn-success" 
					type="submit" 
					value="Send Message">
			<i class="fa fa-send fa-fw send-icon"></i>

		</form>
		<!-- End Form -->
	</div>
	

	<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>