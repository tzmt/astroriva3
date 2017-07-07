<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<?php //echo "<pre>";print_r($this->cart->contents()); ?>
			<?php if(!isset($this->session->userdata('user')->id)){ ?>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<form method="post" action="<?php echo base_url(); ?>shop/checkout/">
				<ul class="nav">
					<li>
						<label><input type="radio" name="checkout" id="register" value="1" onclick="showOrHideForms(1)" checked = "checked"> Register Account</label>
					</li>
					<li>
						<label><input type="radio" name="checkout" id="guest" value="2" onclick="showOrHideForms(0)"> Guest Checkout</label>
					</li>					
				</ul>
			</div><!--/checkout-options-->
			<?php } ?>

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<?php if($this->session->flashdata('error')){ ?>
						<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
					<?php } ?>
					<?php if($this->session->flashdata('success')){ ?>
					<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
					<?php } ?>
					<?php if(!isset($this->session->userdata('user')->id)){ ?>
					<div class="col-sm-5">
						<div class="shopper-info">
							<p>Shopper Information</p>							
								<input type="text" name="name"  placeholder="Display Name">
								<input type="email" name="email" placeholder="User Name">
								<input type="password" name="password" placeholder="Password">
								<input type="password" name="cpassword" placeholder="Confirm password">	
						</div>
					</div>
					<?php } ?>
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">																	
									<input type="text" name="fname" placeholder="First Name *" required>									
									<input type="text" name="lname" placeholder="Last Name *" required>
									<input type="text" name="order_email" placeholder="Email*" required>
									<input type="text" name="address" placeholder="Address 1 *" required>
									<input type="number" name="pincode" placeholder="Zip / Postal Code *" required>
									<select name="country" onchange="getStates(this.value)" required>
										<option>-- Country --</option>
										<?php foreach($countries as $coun){ ?>
											<option value="<?php echo $coun->id; ?>"><?php echo $coun->name; ?></option>
										<?php } ?>
									</select>
							</div>
							<div class="form-two">	
									<select name="state" id="state" onchange="getCities(this.value)" required>
										<option>-- State / Province / Region --</option>										
									</select>
									<select name="city" id="city" required>
										<option>-- City --</option>										
									</select>

									<input type="number" name="phone" placeholder="Phone *" required>
									<button class="btn btn-primary" type="submit">Proceed To Pay</button>	
								</form>
							</div>
						</div>
					</div>									
				</div>
			</div>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php //echo "<pre>";print_r($this->cart->contents());echo "</pre>"; ?>
						<?php foreach($this->cart->contents() as $cart){ ?>
						<tr>
							<td class="cart_product">
								<a href="#"><img src="<?php echo ASSETS; ?>products/<?php echo $cart['options']['image'] ?>" width="50px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $cart['name']; ?></a></h4>		
								<p>Dimension: <?php echo $cart['options']['dimension']; ?></p>															
								<p>Specifiv Gravity: <?php echo $cart['options']['specific_gravity']; ?></p>	
								<p>Refractive Index: <?php echo $cart['options']['refractive_index']; ?></p>	
								<p>Weight: <?php echo $cart['options']['weight']; ?></p>	
							</td>
							<td class="cart_price">
								<p><i class="fa fa-rupee"></i><?php echo $cart['price']; ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">									
									<input class="cart_quantity_input" type="number" name="quantity" max="<?php echo $cart['options']['quantity'] ?>" min="1" value="<?php echo $cart['qty'] ?>" autocomplete="off" size="2" onchange="UpdateOrders(this.value,'<?php echo $cart['rowid']; ?>','<?php echo $cart['price']; ?>','<?php echo $cart['id']; ?>')">
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price" id="price<?php echo $cart['id']; ?>"><i class="fa fa-rupee"></i><?php echo $cart['qty']* $cart['price']; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url(); ?>shop/remove/<?php echo $cart['rowid']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>					
					
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Total</td>
										<td><span><i class="fa fa-rupee"></i><?php echo $this->cart->total(); ?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</section> <!--/#cart_items-->

<script>
	function UpdateOrders(qty,rowid,price,id)
	{
		$.ajax({
          type:"POST",
          url:"<?php echo base_url();?>shop/updateProducts/",
          data:{ qty: qty,rowid:rowid},
          success: function (data){
           	//alert(data);
            $('#price'+id).html('<i class="fa fa-rupee"></i>'+(price*qty));
          }
        });
	}

	function getStates(id)
	{
		$.ajax({
          type:"POST",
          url:"<?php echo base_url();?>shop/getStates/",
          data:{ id: id},
          success: function (data){
           	//alert(data);
            $('#state').html(data)
          }
        });
	}
	function getCities(id)
	{
		$.ajax({
          type:"POST",
          url:"<?php echo base_url();?>shop/getCities/",
          data:{ id: id},
          success: function (data){
           	//alert(data);
            $('#city').html(data)
          }
        });
	}
	</script>