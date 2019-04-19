<?php include 'includes/session.php'; ?>
<?php
	if(isset($_SESSION['user']))
	{
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page">
	<div class="login-box">
		<?php
			if(isset($_SESSION['error']))
			{
				echo 
				"
					<div class='callout callout-danger text-center'>
						<p>".$_SESSION['error']."</p> 
					</div>
				";
				unset($_SESSION['error']);
		  }
			if(isset($_SESSION['success']))
			{
				echo 
				"
				  <div class='callout callout-success text-center'>
						<p>".$_SESSION['success']."</p> 
			  	</div>
				";
				unset($_SESSION['success']);
		  }
		?>

		<div class="login-box-body">
			<p class="login-box-msg" style="color: #324c5f; font-size: 25px"> <b>Sign in here</b></p>

			<form action="verify.php" method="POST">

				<div class="form-group has-feedback">
					<input type="email" class="form-control" name="email" placeholder="Email Address" required>
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>

			  <div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			  </div>

			  <hr>
				<div class="row">
					<div class="col-xs-4">
						<button type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
					</div>
				</div>

			</form>
		  <br>
		  
		  <div class="row">
				<div class="col-sm-5"><a href="password_forgot.php">Forgot password?</a> </div>
				<div class="col-sm-4"><a href="signup.php" class="text-center">Register now</a></div>
				<div class="col-sm-3"><a href="index.php">Homepage</a></div>
		  </div>
		  
		</div>
	</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>