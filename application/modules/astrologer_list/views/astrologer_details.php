	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<div class="col-sm-3">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/astrologer/<?php echo $all_data->image; ?>" width="600px" height="400px" alt="" />
							</div>
							<div class="col-sm-6">
								<div class="product-details">
									<h3 class="product-name"><?php echo $all_data->name; ?></h3>									
									<div class="product-info">
										<h4 class="product-price"><i class="fa fa-phone"></i> <?php echo $all_data->phone; ?></h4>	
										<ul>
											<li><i class="fa fa-angle-double-right"></i> <strong>Description:</strong> <?php echo $all_data->details; ?></li>
											<hr>
											<li><i class="fa fa-angle-double-right"></i><strong>Education:</strong> <?php echo $all_data->education; ?> </li>
											<hr>
											<li><i class="fa fa-angle-double-right"></i><strong>Email:</strong> <?php echo $all_data->email; ?></li>
											<hr>
											<li><i class="fa fa-angle-double-right"></i><strong>Specialisation:</strong> <?php echo $all_data->specialization; ?></li>
											<hr>
											<li><i class="fa fa-angle-double-right"></i><strong>Experience:</strong> <?php echo $all_data->experience; ?></li>
											<hr>
										</ul><br/>
										<span class='st_facebook_large' displayText='Facebook'></span>
										<span class='st_twitter_large' displayText='Tweet'></span>
										<span class='st_linkedin_large' displayText='LinkedIn'></span>
										<span class='st_pinterest_large' displayText='Pinterest'></span>
										<span class='st_email_large' displayText='Email'></span>
										<span class='st_sharethis_large' displayText='ShareThis'></span>
										<br/>
										<a href="#" class="btn btn-default">Book An Appoinment</a> <a href="#" class="btn btn-default">1 Like</a> <a href="#" class="btn btn-default">10 Comments</a>
									</div>
								</div>
							</div>
						</div>
					</div>					
			</div>
		</div>
	</div><!-- #/ Director's Section -->
		
	<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR RANDOM ASTROLOGERS</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere.</p>
				</div>								
				
				<?php foreach($astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img class="img-responsive" src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="394px;" style="height:394px !important" alt="<?php echo $ast->name; ?>" />						
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="">TIPS</a></h6>
							<h6><a href="">PREDICTION</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="">PRODUTCS</a></h6>
							<ul class="social-icons">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>						
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div><!-- #/ Team  -->
	
	

	<!-- #/ Product's Section -->
	<div id="shop" class="bg-info">
		<div class="container padding-top padding-bottom bg-info">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2><small>Our Products</small>PRODUCT'S BRAND</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis lectus. Praesent sapien massa, convallis a pellen tesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt ni dictum porta</p>
				</div>
			</div>	
			<div class="products">
				<ul id="product-list" class="row nav nav-tabs" role="tablist">
					<?php foreach($products as $prod){ ?>
					<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
					<li class="col-sm-3">
						<a class="product-image" href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>">							
							<img class="img-responsive" src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" alt="" />
						</a>
						<div class="product-name">
							<p><?php echo $prod->name ?> <span><i class="fa fa-rupee"></i> <?php echo $prod->price ?></span></p>
						</div>
					</li>
					<?php } ?>					
				</ul>
				<?php if(count($products)> 4){ ?>
				<div id="loadMore">
					<span>Load more</span>
				</div> 
				<?php } ?>
			</div>
		</div>
	</div><!-- #/ Product's Section -->