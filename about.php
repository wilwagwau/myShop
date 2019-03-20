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
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div class="container" id="top-section">
		                
		            </div>
                     <!-- Welcome Text-->
                    <section id="welcome" class="about">
                        <div class="container">
                            <div class="welcome text-center wow fadeInUp delay-1s">
                                <h2>Welcome to <span style="color:wheat">my<span style="color:orange">Shop</span></span></h2>
                                <p><a href="#"><b><span style="color: wheat;">my<span style="color: orange;">Shop <span style="color: #036a81">Ltd</span></span></span></a></b>  is an online marketplace for electronics among other commodities. It has partnered with more than 50,000 local African companies and individuals. It was established in <b style="color: #036a81">2006</b> by <a style="color: #036a81" href="#"><b>myShop User Group</b></a></p>
                                <button class="btn home-btn" type="submit">Read more <i style="color:#fff" class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </section>
		            <!-- <center><h3>Our Partners</h3></center> -->
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