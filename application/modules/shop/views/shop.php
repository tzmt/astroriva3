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
                        <span class="active text-primary font13">Shop</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

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
			
			<div class="col-sm-9 padding-right" style="margin-top: 20px;">
				<div class="col-md-12 pull-right" style="margin-bottom: 30px;">
					<form method="GET" action="<?php echo base_url(); ?>shop/search/">
						<input type="text" name="search" class="contact_name form-control" placeholder="Enter your search item..">
					</form>
				</div>

				<div class="col-md-12">
					<div class="features_items"><!--features_items-->
						<?php if(count($products) == 0){ ?>
						<h2 class="title text-center">No Products Available</h2>
						<?php } ?>
						<?php if(count($products) > 0){ ?>
						<?php foreach($products as $prod){ ?>
						<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
							<div class="col-sm-4" style="margin-bottom:25px;">
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
						<div class="row col-md-12 text-center">							
							<?php echo $links; ?>
						</div>
						<?php }  ?>							
					</div>
				</div>
			</div>
		</div>
	</div>
</section>