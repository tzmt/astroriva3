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
                        <span class="font13">Astrologer</span>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="font13"><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$this->uri->segment(3))); ?>"><?php echo ucwords(str_replace("-", " ", $this->uri->segment(3))); ?></a></span>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Products</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
	<!-- #/ Product's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>PRODUCT'S BRAND</h2>					
				</div>
			</div>	
			<div class="features_items"><!--features_items-->
					<?php if(count($products) == 0){ ?>
					<h2 class="title text-center">No Products Available</h2>
					<?php } ?>
					<?php if(count($products) > 0){ ?>
					<?php foreach($products as $prod){ ?>
					<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
						<div class="col-sm-3" style="margin-bottom:25px;">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>"><img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" alt="<?php echo str_replace(" ","-",$prod->name); ?>" width="152px" height="152px"/></a>
										<h2><i class="fa fa-rupee"></i> <?php echo $prod->price ?></h2>
										<p><?php echo $prod->name; ?></p>
										<a href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>" class="btn btn-primary add-to-cart"><i class="fa fa-view"></i>View Details</a>
									</div>									
								</div>							
							</div>
						</div>
					<?php } ?>
					<!-- <div class="row col-md-12 text-center">
						<ul class="pagination">
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">&raquo;</a></li>
						</ul>
					</div> -->
					<?php }  ?>
						
				</div><!--features_items-->
		</div>
	</div><!-- #/ Product's Section -->