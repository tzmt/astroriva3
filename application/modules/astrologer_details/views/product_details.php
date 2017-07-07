
	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active">
						<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$all_data->id))->row()->image; ?>					
						<div class="row">
							<div class="col-sm-6">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/products/<?php echo $product_image; ?>" width="600px" height="400px" alt="" />
							</div>
							<div class="col-sm-6">
							<?php if($this->session->flashdata('error')){ ?>
							<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
							<?php } ?>
							<?php if($this->session->flashdata('success')){ ?>
							<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
							<?php } ?>	
								<div class="product-details">
									<h3 class="product-name"><?php echo $all_data->name; ?></h3>									
									<div class="product-info">										
										<ul>
											<?php if($all_data->dimension !=""){ ?>
											<li><i class="fa fa-angle-double-right"></i> <strong>Dimension:</strong> <?php echo $all_data->dimension; ?></li>
											<hr>
											<?php } ?>
											<?php if($all_data->weight !=""){ ?>
											<li><i class="fa fa-angle-double-right"></i> <strong>Weight:</strong> <?php echo $all_data->weight; ?></li>
											<hr>
											<?php } ?>
											<?php if($all_data->specific_gravity !=""){ ?>
											<li><i class="fa fa-angle-double-right"></i> <strong>Specific Gravity:</strong> <?php echo $all_data->specific_gravity; ?></li>
											<hr>
											<?php } ?>
											<?php if($all_data->refractive_index !=""){ ?>
											<li><i class="fa fa-angle-double-right"></i> <strong>Refractive Index:</strong> <?php echo $all_data->refractive_index; ?></li>
											<hr>
											<?php } ?>
											<?php if($all_data->price !=""){ ?>
											<li style="font-size:25px;"><i class="fa fa-angle-double-right"></i> <strong>Price:</strong> <i class="fa fa-rupee" style="color:#000"></i><?php echo $all_data->price; ?></li>
											<hr>
											<?php } ?>
											<?php if($all_data->details !=""){ ?>
											<li><i class="fa fa-angle-double-right"></i> <strong>Details:</strong> <?php echo $all_data->details; ?></li>
											<hr>
											<?php } ?>
										</ul><br/>
										<span class='st_facebook_large' displayText='Facebook'></span>
										<span class='st_twitter_large' displayText='Tweet'></span>
										<span class='st_linkedin_large' displayText='LinkedIn'></span>
										<span class='st_pinterest_large' displayText='Pinterest'></span>
										<span class='st_email_large' displayText='Email'></span>
										<span class='st_sharethis_large' displayText='ShareThis'></span>
										<br/>
										<a href="javascript:void(0)" class="btn btn-default" data-toggle="modal" data-target="#buy" data-dismiss="modal">Buy Product</a>
										<br/>										
									</div>
								</div>
							</div>							
						</div>
					</div>					
			</div>
		</div>
	</div><!-- #/ Director's Section -->

<div class="modal fade" id="buy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Order Form</h4>
      </div>
      <div class="modal-body">        
        <form id="contact-form" name="contact-form" method="post" action="">
            <div class="col-sm-12 form-group">
                <input type="text" name="fname" class="form-control" required="required" placeholder="Enter First Name...">
                <input type="hidden" name="id" value="<?php echo $all_data->id; ?>" />
                <input type="hidden" name="price" value="<?php echo $all_data->price; ?>" />
            </div>
            <div class="col-sm-12 form-group">
                <input type="text" name="lname" class="form-control" required="required" placeholder="Enter Last Name...">
            </div>
            <div class="col-sm-12 form-group">
                <input type="email" name="order_email" class="form-control" required="required" placeholder="Enter email...">
            </div>
            <div class="col-sm-12 form-group">               
                <select name="country" class="form-control" required="required" onchange="getStates(this.value)">
                	<option>-- Country --</option>
					<?php foreach($countries as $coun){ ?>
						<option value="<?php echo $coun->id; ?>"><?php echo $coun->name; ?></option>
					<?php } ?>
                </select>
            </div>
            <div class="col-sm-12 form-group">                
                <select name="state" class="form-control" required="required" id="state" onchange="getCities(this.value)">
                	<option>-- State --</option>					
                </select>
            </div>
            <div class="col-sm-12 form-group">                
                <select name="city" class="form-control" required="required" id="city">
                	<option>-- City --</option>					
                </select>
            </div>

            <div class="col-sm-12 form-group">
                <input type="text" name="address" class="form-control" required="required" placeholder="Enter Address...">
            </div>    
            <div class="col-sm-12 form-group">
                <input type="number" name="pincode" class="form-control"  required="required" placeholder="Enter pincode...">
            </div> 

            <div class="col-sm-12 form-group">
                <input type="number" name="phone" class="form-control"  required="required" placeholder="Enter Phone Number...">
            </div>                      
      </div>
      <div class="modal-footer" style="border-top: none">
        <button type="submit" class="btn btn-primary">Place Order</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
      </div>
      </form>
    </div>
  </div>
</div>
<script>	

	function getStates(id)
	{
		$.ajax({
          type:"POST",
          url:"<?php echo base_url();?>astrologer_details/getStates/",
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
          url:"<?php echo base_url();?>astrologer_details/getCities/",
          data:{ id: id},
          success: function (data){
           	//alert(data);
            $('#city').html(data)
          }
        });
	}
	</script>
		
	