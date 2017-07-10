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
                        <span class="active text-primary font13">Cart</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="cart_items">
		<div class="container">			
			<div class="elements_desc font14 gemstone_align">
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
								<p class="cart_total_price" id="price<?php echo $cart['id']; ?>"><i class="fa fa-rupee"></i> <?php echo $cart['qty']* $cart['price']; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url(); ?>shop/remove/<?php echo $cart['rowid']; ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>
						
					</tbody>
				</table>
				<div class="pull-right"><a class="btn btn-primary check_out" href="<?php echo base_url(); ?>shop/checkout/">Check Out</a></div>
			</div>
		</div>
	</section> <br/><br/><br/>

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
	</script>