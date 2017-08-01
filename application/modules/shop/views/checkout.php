<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>shop/" class="font13">Shop</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Checkout</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<style>
	.nav>li{float: left;margin-right: 50px;}
</style>
<section id="cart_items">
		<div class="container">
			<div class="elements_desc font14 gemstone_align">

			<div class="step-one">
				<h2 class="heading">Checkout options</h2>
			</div>
			<?php //echo "<pre>";print_r($this->cart->contents()); ?>
			<?php
					$csrf = array(
					        'name' => $this->security->get_csrf_token_name(),
					        'hash' => $this->security->get_csrf_hash()
					);
				?>	

			<?php if(!isset($this->session->userdata('user')->id)){ ?>
			<div class="checkout-options" style="background: #eee;padding:5px;">	
				<form method="post" action="<?php echo base_url(); ?>shop/checkout/">
				<ul class="nav">
					<li>
						<label><input type="radio" name="checkout" id="register" value="1" onclick="showOrHideForms(1)" checked = "checked"> Register Account</label>
					</li>
					<li>
						<label><input type="radio" name="checkout" id="guest" value="2" onclick="showOrHideForms(0)"> Guest Checkout</label>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
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

					<?php
						$csrf = array(
						        'name' => $this->security->get_csrf_token_name(),
						        'hash' => $this->security->get_csrf_hash()
						);
					?>

				
					<?php if(!isset($this->session->userdata('user')->id)){ ?>
					<div class="col-sm-5">
						<div class="shopper-info">
							<h3>Shopper Information</h3>	
								<label class="text-info label_align">Display Name</label>						
								<input type="text" name="name" class="contact_name form-control"  placeholder="Display Name">

								<label class="text-info label_align">Username</label>
								<input type="email" name="email" class="contact_name form-control" placeholder="User Name">

								<label class="text-info label_align">Password</label>
								<input type="password" name="password" class="contact_name form-control" placeholder="Password">

								<label class="text-info label_align">Confirm Password</label>
								<input type="password" name="cpassword" class="contact_name form-control" placeholder="Confirm password">	
						</div>
					</div>
					<?php } ?>
					<div class="col-sm-7 clearfix">
						<div class="bill-to">
							<h3>Bill To</h3>
							<div class="form-one">		
									<label class="text-info label_align">First Name</label>	
									<input type="text" name="fname" class="contact_name form-control" placeholder="First Name *" required>

									<label class="text-info label_align">Last Name</label>									
									<input type="text" name="lname" class="contact_name form-control"  placeholder="Last Name *" required>

									<label class="text-info label_align">Email Id</label>	
									<input type="text" name="order_email" class="contact_name form-control"  placeholder="Email*" required>

									<label class="text-info label_align">Address</label>	
									<input type="text" name="address" class="contact_name form-control"  placeholder="Address 1 *" required>

									<label class="text-info label_align">Zip</label>	
									<input type="number" name="pincode" class="contact_name form-control"  placeholder="Zip / Postal Code *" required>

									<label class="text-info label_align">Country</label>	
									<select name="country" class="contact_name form-control"  onchange="getStates(this.value)" required>
										<option>-- Country --</option>
										<?php foreach($countries as $coun){ ?>
											<option value="<?php echo $coun->id; ?>"><?php echo $coun->name; ?></option>
										<?php } ?>
									</select>
							</div>
							<div class="form-two">	
								<label class="text-info label_align">State</label>	
									<select name="state" id="state" class="contact_name form-control"  onchange="getCities(this.value)" required>
										<option>-- State / Province / Region --</option>										
									</select>

									<label class="text-info label_align">City</label>	
									<select name="city" id="city" class="contact_name form-control"  required>
										<option>-- City --</option>										
									</select>

									<label class="text-info label_align">Phone</label>	
									<input type="number" class="contact_name form-control"  name="phone" placeholder="Phone *" required><br/>
									<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

									<label class="text-info label_align"></label>	
									<button class="btn btn-primary pull-right" type="submit">Proceed To Pay</button>	
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
				<table class="table table-bordered">
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
								<a href="#"><img src="<?php echo ASSETS; ?>products/<?php echo $cart['options']['image'] ?>" width="100px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="#"><?php echo $cart['name']; ?></a></h4>		
								<span>Dimension: <?php echo $cart['options']['dimension']; ?></span>	<br/>
								<span>Specifiv Gravity: <?php echo $cart['options']['specific_gravity']; ?></span>	<br/>
								<span>Refractive Index: <?php echo $cart['options']['refractive_index']; ?></span><br/>	
								<span>Weight: <?php echo $cart['options']['weight']; ?></span>	
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
								<span class="cart_total_price" id="price<?php echo $cart['id']; ?>"><i class="fa fa-rupee"></i><?php echo $cart['qty']* $cart['price']; ?></span>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url(); ?>shop/remove/<?php echo $cart['rowid']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>					
					
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table>
									<tr>
										<td><strong>Total</strong></td>
										<td><span><strong>&nbsp;&nbsp;<i class="fa fa-rupee"></i> <?php echo $this->cart->total(); ?></strong></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>			
		</div>
	</section> <!--/#cart_items-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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