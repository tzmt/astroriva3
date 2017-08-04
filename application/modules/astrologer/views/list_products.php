<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>astrologer/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Product Listing</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>	
<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>	
				<div class="col-md-9 col-sm-7 blog-content">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3></h3>
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
								
								<div class="row">
									<?php foreach($products as $prod){ ?>
									<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
									<div class="col-sm-3" style="margin:10px;border:2px solid #eee;padding:5px">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a class="product-image" href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>">							
														<img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" alt="<?php echo str_replace(" ","-",$prod->name); ?>" width="152px" height="152px"/>
													</a>
													<h2><i class="fa fa-rupee"></i> <?php echo $prod->price ?></h2>
													<p><?php echo $prod->name; ?></p>
													
													
													<p><a href="javascript:void(0)" data-toggle="modal" data-target="#edit<?php echo $prod->id; ?>" style="color:blue"><span class="pull-left"><strong>Edit</strong></span></a></p>

													<p><span class="pull-right"><strong><a href="<?php echo base_url(); ?>astrologer/delete_products/<?php echo $prod->id;?>" style="color:red;">Delete</a></strong></span></p>
												</div>									
											</div>							
										</div>
										
									</div>


									<div class="modal fade" id="edit<?php echo $prod->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
									      </div>
									      <div class="modal-body">        
									        <form id="contact-form" name="contact-form" method="post" action="" enctype="multipart/form-data">
									            <div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" value="<?php echo $prod->name; ?>" required="required" placeholder="Product name goes here..">
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
											<input type="hidden" name="id" value="<?php echo $prod->id ?>"/>
										</div>

										<div class="form-group">
											<label>Select Category</label>
											<select class="form-control" required="required" name="category_id" onchange="getSubcat(this.value,<?php echo $prod->id ?>)">
												<option value="">[select]</option>
												<?php foreach($category as $cat){ ?>
													<option value="<?php echo $cat->id ?>" <?php if($cat->id == $prod->category_id) echo "selected"; ?>><?php echo $cat->name; ?></option>
												<?php } ?>
											</select>	
										</div>

										<div class="form-group" id="showsub">
											<label>Select SubCategory</label>
											<select class="form-control" required="required" name="sub_category_id" id="showSubcat<?php echo $prod->id ?>">
												<?php $sub_cat = $this->db->get_where('shop_category',array('id'=>$prod->sub_category_id))->row();?>
												<option value="<?php echo $sub_cat->id; ?>"><?php echo $sub_cat->name; ?></option>
											</select>	
										</div>										
										

						                <div class="form-group">
											<label>Dimension</label>
											<div class="row">
												<?php $exp = explode('x',$prod->dimension); ?>
												<div class="col-md-4"><input type="text" name="dimension1" value="<?php echo $exp[0] ?>" class="form-control" placeholder="Length.."></div>
												<div class="col-md-4"><input type="text" name="dimension2" value="<?php echo $exp[1] ?>" class="form-control" placeholder="Width"></div>
												<div class="col-md-4"><input type="text" name="dimension3" value="<?php echo $exp[2] ?>" class="form-control"  placeholder="Height"></div>
											</div>
											
										</div>
										

										<div class="form-group">
											<label>Weight</label>
											<input type="text" name="weight" class="form-control" value="<?php echo $prod->weight; ?>" placeholder="Weight goes here..">
										</div>

										<div class="form-group">
											<label>Specific Gravity</label>
											<input type="text" name="specific_gravity" class="form-control" value="<?php echo $prod->specific_gravity; ?>" placeholder="Specific category goes here..">
										</div>

										<div class="form-group">
											<label>Refractive Index</label>
											<input type="text" name="refractive_index" class="form-control" value="<?php echo $prod->refractive_index; ?>" placeholder="Refractive Index goes here..">
										</div>

										<div class="form-group">
											<label>Price</label>
											<input type="text" name="price" class="form-control" value="<?php echo $prod->price; ?>" required="required" placeholder="Price goes here..">
										</div>

										<div class="form-group">
											<label>Quantity</label>
											<input type="number" name="quantity" class="form-control" value="<?php echo $prod->quantity; ?>" required="required" placeholder="Quantity goes here.." min="1">
										</div>

										<div class="form-group">
											<label>Upload Image</label>
											<input type="file" name="file[]" class="form-control" multiple="multiple">
											<p>If you don't want to change product pictures, then keep it blank</p>
										</div>            
									      </div>
									      <div class="modal-footer" style="border-top: none">
									        <button type="submit" class="btn btn-primary">Save Changes</button>
									        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
									      </div>
									      </form>
									    </div>
									  </div>
									</div>
									<?php } ?>	
									
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->					
				</div>
				</div>
		</div>
	</section>
				
<script>

function getSubcat(id,prod)
{
	$.ajax({
      type:"POST",
      url:"<?php echo base_url();?>astrologer/getSubCategory/",
      data:{ id: id},
      success: function (data){
        //alert(data);
        $('#showSubcat'+prod).html(data);
      }
    });
}


</script>