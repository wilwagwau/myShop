<!-- The buyer must log into his account to have his payment processing via the pay now button -->

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
	        	<div class="col-sm-9">
	        		<h1 class="page-header">Your Cart</h1>
	        		<div class="box box-solid">
	        			<div class="box-body">
							<table class="table table-bordered">
								<thead>
									<th></th>
									<th>Photo</th>
									<th>Name</th>
									<th>Price</th>
									<th width="20%">Quantity</th>
									<th>Subtotal</th>
								</thead>
								<tbody id="tbody"></tbody>
							</table>
	        			</div>
	        		</div>
	        		<?php
						if(isset($_SESSION['user'])){
	        				echo "<div id='paypal-button'></div> ";
	        			}
						else{
	        				echo "<h4>You need to <a href='login.php'>Login</a> to checkout.</h4>";
	        			}
	        		?>
	        	</div>
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<script>
var total = 0;
$(function(){
	//Delete an item from a cart_details.
	$(document).on('click', '.cart_delete', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: 'cart_delete.php',
			data: {id:id},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	//Decreament the quantity of the product on the cart_details
	$(document).on('click', '.minus', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		if(qty>1){
			qty--;
		}
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});
	//Increament the quantity of the product on the cart_details
	$(document).on('click', '.add', function(e){
		e.preventDefault();
		var id = $(this).data('id');
		var qty = $('#qty_'+id).val();
		qty++;
		$('#qty_'+id).val(qty);
		$.ajax({
			type: 'POST',
			url: 'cart_update.php',
			data: {
				id: id,
				qty: qty,
			},
			dataType: 'json',
			success: function(response){
				if(!response.error){
					getDetails();
					getCart();
					getTotal();
				}
			}
		});
	});

	getDetails();
	getTotal();

});
//get the details displayed in the table in the cart view file
function getDetails(){
	$.ajax({
		type: 'POST',
		url: 'cart_details.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
			getCart();
		}
	});
}
//Computs the total in the cart
function getTotal(){
	$.ajax({
		type: 'POST',
		url: 'cart_total.php',
		dataType: 'json',
		success:function(response){
			total = response;
		}
	});
}
</script>


<!-- Paypal Express -->
<script>
paypal.Button.render({
    env: 'sandbox',

	client: {
        sandbox: 'AXUj2BFri6yZYmeLNeeG7fW0b89YOQL597ILy0hCOL8Gv0q_QZoFLtv6jhx2ho9UvvJKHw4lhL-pmg3B'
    },

    commit: true, // Show a 'Pay Now' button

    style: {
    	color: 'gold',
    	size: 'small',
		shape: 'pill'
    },

    //checks the payment processing when the buyer hit the pay button.
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                    	//total purchase
                        amount: { 
                        	total: total, 
                        	currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },

    //Redirects the buyer to his account with the payment_id.
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php?pay='+payment.id;
        });
    },

}, '#paypal-button');
</script>
</body>
</html>