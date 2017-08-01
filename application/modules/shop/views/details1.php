<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<?php foreach($category as $cat){ ?>
						<?php $q = $this->db->get_where('shop_category',array('category_id'=>$cat->id)); ?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<?php if($q->num_rows() > 0){ ?>
									<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo strtolower($cat->name); ?>">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										<?php echo $cat->name; ?>
									</a>
									<?php } else { ?>
									<h4 class="panel-title"><a href="<?php echo base_url(); ?>shop/category/<?php echo strtolower($cat->name); ?>"><?php echo $cat->name; ?></a></h4>
									<?php } ?>
								</h4>
							</div>
							<?php if($q->num_rows() > 0){ ?>
							<div id="<?php echo strtolower($cat->name); ?>" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<?php $q1 = $q->result(); ?>
										<?php foreach($q1 as $q2){ ?>
										<li><a href="<?php echo base_url(); ?>shop/category/<?php echo strtolower($cat->name); ?>/<?php echo strtolower($q2->name); ?>"><?php echo $q2->name; ?> </a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php } ?>						
					</div><!--/category-productsr-->
					
					<div class="shipping text-center"><!--shipping-->
						<img src="<?php echo ASSETS; ?>shop/images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->
					
				</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<?php if($this->session->flashdata('success')){ ?>
						<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
						<?php } ?>
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo ASSETS; ?>products/<?php echo $product_details->image; ?>" alt="" />									
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
								    	<?php $q = $this->db->get_where('product_images',array('product_id'=>$product_details->id)); ?>
								    	<?php if($q->num_rows() > 0){ ?>
									    	<?php $q1 = $q->result(); ?>
								    		<?php //echo "<pre>";print_r($q1); ?>	
								    		<?php $total = $q->num_rows(); ?>							    	
									    	<?php for($i = 0; $i < $total; $i++){ ?>
									    	<?php if($i%3 == 0){ ?>
											<div class="item <?php if($i<=2) echo 'active'; ?>">
												<?php } ?>
											  <a href="#"><img src="<?php echo ASSETS; ?>products/<?php echo $q1[$i]->image; ?>" width="50px;" alt=""></a>
											<?php if($i%3 == 0){ ?>
											</div>
											<?php } ?>
											<?php } ?>
										<?php } ?>
										
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="<?php echo ASSETS; ?>shop/images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $product_details->name; ?></h2>
								<p>Product Type: <?php if($product_details->product_type==1) echo "Certified"; else echo "Not Certified";  ?></p>								
								<span>
								<?php
									$csrf = array(
									        'name' => $this->security->get_csrf_token_name(),
									        'hash' => $this->security->get_csrf_hash()
									);
								?>
									<form method="POST" action="<?php echo base_url(); ?>shop/add/">
									<span><i class="fa fa-rupee"></i><?php echo $product_details->price; ?></span>
									<label>Quantity:</label>
									<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
									<input type="number" value="1" name="quantity" min="0" max="<?php echo $product_details->quantity; ?>"/>
									<input type="hidden" name="name" value="<?php echo $product_details->name; ?>"/>
									<input type="hidden" name="dimension" value="<?php echo $product_details->dimension; ?>"/>
									<input type="hidden" name="specific_gravity" value="<?php echo $product_details->specific_gravity; ?>"/>
									<input type="hidden" name="refractive_index" value="<?php echo $product_details->refractive_index; ?>"/>
									<input type="hidden" name="image" value="<?php echo $product_details->image; ?>"/>
									<input type="hidden" name="id" value="<?php echo $product_details->id; ?>"/>
									<input type="hidden" name="price" value="<?php echo $product_details->price; ?>"/>
									<input type="hidden" name="weight" value="<?php echo $product_details->weight; ?>"/>
									<input type="hidden" name="quantity1" value="<?php echo $product_details->quantity; ?>"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</form>
								</span>
								<p><b>Availability:</b> <?php if($product_details->quantity > 0) {?>In Stock<?php } else { echo "Out Of Stock"; }?></p>
								<p><b>Dimension:</b> </i><?php echo $product_details->dimension; ?></p>
								<p><b>Weight:</b> <?php echo $product_details->weight; ?></p>
								<p><b>Specific Gravity:</b> <?php echo $product_details->specific_gravity; ?></p>
								<p><b>Refractive Index:</b> <?php echo $product_details->refractive_index; ?></p>
								<a href="#"><img src="<?php echo ASSETS; ?>shop/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">								
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (<?php echo count($product_reviews); ?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<?php foreach($product_reviews as $rev){ ?>
									<ul>
										<li><a href="#"><i class="fa fa-user"></i><?php echo $rev->name; ?></a></li>
										<li><a href="#"><i class="fa fa-clock-o"></i><?php echo date("g:i:s a",$rev->datetime); ?></a></li>
										<li><a href="#"><i class="fa fa-calendar-o"></i><?php echo date("d M Y ",$rev->datetime); ?></a></li>
									</ul>
									<p><?php echo $rev->comments; ?></p>									
									<hr/>
									<?php } ?>
									<p><b>Write Your Review</b></p>
									<?php if($this->session->flashdata('success1')){ ?>
										<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success1'); ?></div>
									<?php } ?>
									<form action="<?php echo base_url() ?>shop/addReview/<?php echo $product_details->id; ?>/<?php echo str_replace(" ","-",$product_details->name); ?>" method="post">
										<span>
											<input type="text" name="name1" placeholder="Your Name" required/>
											<input type="email" name="email1" placeholder="Email Address" required/>
										</span>
										<textarea name="comments1" required></textarea>										
										<button type="submit" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<?php foreach($related_products as $rel){ ?>
								<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$rel->id))->row()->image; ?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<a href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$rel->name); ?>"><img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" alt="<?php echo str_replace(" ","-",$rel->name); ?>" /></a>
													<h2><i class="fa fa-rupee"></i> <?php echo $rel->price ?></h2>
													<p><?php echo $rel->name; ?></p>
													<a href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$rel->name); ?>" class="btn btn-default add-to-cart"><i class="fa fa-view"></i>View Details</a>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
								</div>								
							</div><!--/recommended_items-->					
						</div>
					</div>
				</div>
			</section>