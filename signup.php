<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box"><br><br><br>
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg " style="color: #324c5f; font-size: 25px"><b>Register here</b></p>

    	<form action="register.php" method="POST">

          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>

      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Confirm password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>


          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
	  
	  <div class="row">
		<div class="col-sm-7">Already a member ? <a href="login.php">Login</a><br> </div>
		<div class="col-sm-5"><a href="index.php">Go Back to Home</a></div>
	  </div>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>