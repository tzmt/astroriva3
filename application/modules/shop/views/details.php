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
                        <span class="active text-primary font13"><?php echo str_replace("-", " ", $this->uri->segment(4)); ?></span>
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
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<?php if($this->session->flashdata('success')){ ?>
						<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
						<?php } ?>

						<h1><?php echo str_replace("-", " ", $this->uri->segment(4)); ?></h1>
            <hr>
            <div class="swiper-container m-t-40 gemstone_swiper">
                <div class="swiper-wrapper">
                	<?php $q = $this->db->get_where('product_images',array('product_id'=>$product_details->id)); ?>
                	<?php if($q->num_rows() > 0){ ?>            		
			    	<?php foreach($q->result() as $q1){ ?>
	                    <div class="swiper-slide">
	                        <img src="<?php echo ASSETS; ?>products/<?php echo $q1->image; ?>" class="img-responsive" alt="<?php echo $product_details->name; ?>"/>
	                    </div>
                    <?php } } ?>
                </div>
                <div class="swiper-button-prev swiper-button-white"></div>
                <div class="swiper-button-next swiper-button-white"></div>
            </div>
            <?php
                $csrf = array(
                        'name' => $this->security->get_csrf_token_name(),
                        'hash' => $this->security->get_csrf_hash()
                );
            ?>  
                
                <span>
                    <form method="POST" action="<?php echo base_url(); ?>shop/add/">
                        <h2><span><i class="fa fa-rupee"></i> <?php echo $product_details->price; ?></span></h2>
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
                        <button type="submit" class="btn btn-primary cart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </form>
                </span>

            <div class="elements_desc font14 gemstone_align">
            	<h3>Product Details:</h3>           	

            	<table class="table table-bordered">
                    <tr>
                        <td><strong>Availability</strong></td>
                        <td><?php if($product_details->quantity > 0) {?>In Stock<?php } else { echo "Out Of Stock"; }?></td>
                    </tr>
                    <tr>
                        <td><strong>Dimension</strong></td>
                        <td><?php echo $product_details->dimension; ?></td>
                    </tr>
                    <?php if($product_details->weight != ""){?>
                    <tr>
                        <td><strong>Weight</strong></td>
                        <td><?php echo $product_details->weight; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if($product_details->specific_gravity != ""){ ?>
                    <tr>
                        <td><strong>Specific Gravity</strong></td>
                        <td><?php echo $product_details->specific_gravity; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if($product_details->refractive_index != ""){ ?>
                    <tr>
                        <td><strong>Refractive Index</strong></td>
                        <td><?php echo $product_details->refractive_index; ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="row">
                    <div class="col-md-12 m-t-26">
                        <a href="javascript:void(0)" id="showComment"><h1 class="text-primary">Product Reviews (<?php echo $total = $this->shop_model->getProductReviewsCount($product_details->id); ?>) <?php if($total > 0){ ?><span style="font-size: 11px;">Click to expand</span><?php } ?></h1></a>
                        <hr>
                        <?php $qq = $this->shop_model->getProductReviews($product_details->id);                           
                        ?>
                    </div>
                </div>
                <div id="shcomment" style="display:none;"> 
                    <?php if(count($qq) > 0){
                        foreach ($qq as $value) {                         
                    ?>
                        <div class="row" style="border:1px solid #eee;padding:15px;">
                            <div class="col-md-2"><img src="<?php echo base_url(); ?>assets/images/user.png" width="100px"/></div>
                            <div class="col-md-9">
                                <strong>Name:</strong> <?php echo $value->name; ?><br/>
                                <strong>Date:</strong> <?php echo date("d F, y",$value->datetime); ?><br/>
                                <?php echo $value->comments; ?>
                            </div>
                        </div>                        
                    <?php }  }?>
                </div>

                <form action="<?php echo base_url() ?>shop/addReview/<?php echo $product_details->id; ?>/<?php echo $this->uri->segment(3); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 m-t-26">
                            <h1 class="text-primary">Share Your Feedback</h1>
                            <hr>
                        </div>
                    </div>
                        <?php if($this->session->flashdata('success1')){ ?>
                            <div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success1'); ?></div>
                        <?php } ?>
                    <div class="row m-t-20">
                        <div class="col-md-12">
                            <img src="<?php echo base_url(); ?>assets/site_assets/images/Contact-Line-Stripe.jpg" alt="loading" class="img-responsive">
                        </div>
                    </div>
                    <div class="row content_margin con_pad">

                        <div class="col-md-4 contact_block">
                            <div>
                                <label for="contact_name" class="text-info label_align">Name:</label>
                                <input type="text" name="name1" id="contact_name" class="contact_name form-control" required>

                                <label for="contact_email" class="text-info label_align">Email:</label>
                                <input type="email" name="email1" id="contact_email" class="contact_email form-control" required>

                                <label for="contact_name" class="text-info label_align">Subject:</label>
                                <input type="text" name="subject1" id="contact_name" class="contact_name form-control" required>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            </div>
                        </div>
                        <div class="col-md-8 contact_block">
                            <div>
                                <label for="contact_text" class="text-info content_margin">Message:</label>
                                <textarea name="comments1" id="contact_text" cols="30" rows="8" class="form-control"
                                          placeholder="Your message comes here.." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="align_btn contact_block text-center">
                                <input type="submit" class="btn btn-sm btn-primary content_margin m-b-25" value="Send Now">
                            </div>
                        </div>
                    </div>
                </form>
            	
            </div>
		</div>	
	</div>
</section>
<br/><br/>
