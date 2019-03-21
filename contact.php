<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
	
<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>
		 
		  <div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-12">
							<?php
								if(isset($_SESSION['error']))
								{
									echo 
									"
										<div class='alert alert-danger'>
											".$_SESSION['error']."
										</div>
									";
									unset($_SESSION['error']);
								}
								else if(isset($_SESSION['success']))
								{
									echo 
									"
										<div class='alert alert-success'>
											".$_SESSION['success']."
										</div>
									";
									unset($_SESSION['success']);
								}
							?>
							<div id="top-section">
								
							</div>
							<!-- Welcome Text-->
							<section id="welcome">
								<div class="container">
									<div class="welcome text-center wow fadeInUp delay-1s">
										<h2>Write To Us</h2>
										
											<form action="send_enquiry.php" method="POST">
												<div class="form-row">
												
													<div class="form-group col-md-4 has-feedback">
														<label class="pull-left">Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" value="<?php echo (!empty($user['firstname'])) ? $user['firstname'] : ''  ?>" name="name" placeholder="Name" required />
														<span id="icon" class="glyphicon glyphicon-user form-control-feedback"></span>
													</div>
													
													<div class="form-group col-md-4 has-feedback">
														<label class="pull-left">Email Address <span class="text-danger">*</span></label>
														<input type="email" class="form-control" value="<?php echo (!empty($user['email'])) ? $user['email'] : ''  ?>" name="email" placeholder="Enter email address" required />
														<span id="icon" class="glyphicon glyphicon-envelope form-control-feedback"></span>
													</div>
													
													<div class="form-group col-md-4 has-feedback">
														<label class="pull-left">Contacts <span class="text-danger">*</span></label>
														<input type="text" class="form-control" value="<?php echo (!empty($user['contact_info'])) ? $user['contact_info'] : '' ?>" name="contact_info" placeholder="Telephone number" required />
														<span id="icon" class="glyphicon glyphicon-earphone form-control-feedback"></span>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col-md-12 has-feedback">
														<label class="pull-left">Message <span class="text-danger">*</span></label>
														<textarea class="form-control" placeholder="Enter your message here . . ." rows="1" name="msg" required ></textarea>
														<span id="icon" class="fa fa-comments form-control-feedback"></span>
													</div>
												</div>
																			
												<button class="btn home-btn" name="send-qry" type="submit">Send Message <i class="fa fa-angle-double-right"></i></button>
											</form>
										
									</div>
								</div>
							</section>
							<section id="social-media" style="margin-top: 30px;">
								<div class="row">
									<div id="icon" class="col-md-12" style="text-align: center; font-size: 16px; ">
										<a href="#" style ="color: #34465d; padding: 40px;"><i class="fa fa-map-marker"></i>| Moi University - Eldoret</a>
										<a href="#" style ="color: #3b5999; padding: 40px; "><i class="fa fa-phone"></i> | 090 (020) - 0788</a>
										<a href="#" style ="color: #55acee; padding: 40px;"><i class="fa fa-twitter"></i> | @myShop_Ke</a>
										<!-- <a href="#" style ="color: #34465d; padding: 40px;"><i class="fa fa-github"></i>| github.com/myShop</a> -->
									</div>
								</div>
							</section>
						</div>
						
						
					</div>
				</section>
			 
			</div>
		  </div>
	  
		<?php include 'includes/footer.php'; ?>
	</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>