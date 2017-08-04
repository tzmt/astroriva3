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
                        <a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled" class="font13">Astrologer</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13"><?php echo $all_data->name; ?></span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>
	
	<div class="container">
		<div class="row">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div style="padding-top: 20px;">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<div class="col-sm-2">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/astrologer/<?php echo $all_data->image; ?>" width="100%" alt="" />
							</div>
							<div class="col-sm-6">
								<div class="product-details">
									<h3 class="product-name" style="margin-left: 20px;"><?php echo $all_data->name; ?></h3>									
									<div class="product-info">
										<h4 class="product-price" style="margin-left: 20px;"><i class="fa fa-phone"></i> <?php echo $all_data->phone; ?></h4>	
										<ul>
											<li style="color:#000"><i class="fa fa-angle-double-right"></i> <strong>Description:</strong> <?php echo $all_data->details; ?></li>
											<hr>
											<li style="color:#000"><i class="fa fa-angle-double-right"></i><strong>Education:</strong> <?php echo $all_data->education; ?> </li>
											<hr>
											<li style="color:#000"><i class="fa fa-angle-double-right"></i><strong>Email:</strong> <?php echo $all_data->email; ?></li>
											<hr>
											<li style="color:#000"><i class="fa fa-angle-double-right"></i><strong>Specialisation:</strong> <?php echo $all_data->specialization; ?></li>
											<hr>
											<li style="color:#000"><i class="fa fa-angle-double-right"></i><strong>Experience:</strong> <?php echo $all_data->experience; ?></li>
											<hr>
										</ul><br/>
										<span class='st_facebook_large' displayText='Facebook'></span>
										<span class='st_twitter_large' displayText='Tweet'></span>
										<span class='st_linkedin_large' displayText='LinkedIn'></span>
										<span class='st_pinterest_large' displayText='Pinterest'></span>
										<span class='st_email_large' displayText='Email'></span>
										<span class='st_sharethis_large' displayText='ShareThis'></span>
										<br/>
										<a href="javascript:void(0)" class="btn btn-primary" onclick="showAppointment()">Book An Appoinment</a> <a href="#" class="btn btn-primary">1 Like</a> <a href="#" class="btn btn-primary">10 Comments</a>
										<br/>										
									</div>
								</div>
							</div>

							<div class="col-md-4">
								<h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Tips &amp; Market Prediction</h1>
					                <hr>
					                <div class="row common_margin">   
					                	<?php
					                		$this->db->limit(5);
					                		$this->db->order_by('tips.id','DESC');
											$tips = $this->db->select('tips.astrologers_id,tips.topic,tips.description,astrologer.name,astrologer.image')->from('tips')->join('astrologer','tips.astrologers_id = astrologer.id','left')->where('astrologer.id',$this->uri->segment(2))->get()->result();
					                	?>                 
					                        <?php foreach($tips as $tip){ ?>
						                        <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
						                            <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle"></div>
						                            <div class="col-md-9">						                            	
						                            	<span><strong><?php echo $tip->topic; ?></strong></span><br/>
						                            	<span><?php echo $tip->description; ?></span>
						                            </div>
						                        </div>

					                        <?php } ?>
					                </div>
							</div>
							<div class="col-md-12" style="margin-top:15px;display: none;" id="showHide">
								<table class="table table-bordered">
									<tr>
									    <th style="text-align:center;">#</th>
									    <th style="text-align:center;">Chamber Name</th>
									    <th style="text-align:center;">Place</th>
									    <th style="text-align:center;">Day</th>
									    <th style="text-align:center;">Time</th>
									    <th style="text-align:center;">Phone Number</th>
									    <th style="text-align:center;">Nearby Place</th>
									</tr>
									<?php $query = $this->db->get_where('astrologer_branch',array('astrologers_id'=>$all_data->id))->result(); ?>
									<?php if(count($query) > 0){ ?>
									<?php foreach($query as $key=> $q){ ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $q->branch_name; ?></td>
										<td><?php echo $q->place; ?></td>
										<td><?php echo $q->day; ?></td>
										<td><?php echo $q->time; ?></td>
										<td><?php echo $q->phone1."<br/>".$q->phone2."<br/>".$q->phone3."<br/>".$q->phone4; ?></td>
										<td><?php echo $q->nearby_places; ?></td>										
									</tr>	
									<?php } ?>
									<?php } else{?>
									<tr>
										<td colspan="7" style="color:red;text-align: center;">No Appointment Available</td>
									</tr>
									<?php } ?>
								</table>
							</div>
						</div>
					</div>					
			</div>
		</div>
	</div>
		
	<div id="team">
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-12 section-title-two">
					<h2>OUR RANDOM ASTROLOGERS</h2>					
				</div>								
				<div style="margin-top: 35px;">
					<?php foreach($astrologers as $ast){ ?>				
					<div class="col-md-2" style="margin-bottom: 10px;">
								<div class="team-member">
									<div class="col-md-12" style="margin-bottom: 15px;">
										<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
									</div>
									<div class="member-text">			
										<h5><?php echo $ast->name; ?></h5>
										<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
									</div>						
								</div>
							</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
</div>
	

	
	<div id="shop" class="bg-info">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">
				<div class="col-sm-12">
					<h2>Our Products</h2>					
				</div>
			</div>	
			<div class="products" style="margin-top: 35px;">
				
					<?php foreach($products as $prod){ ?>
					<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
					<div class="col-sm-3" style="margin-bottom:25px;">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="<?php echo base_url(); ?>shop/details/<?php echo $prod->id; ?>/<?php echo str_replace(" ","-",$prod->name); ?>"><img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" alt="<?php echo str_replace(" ","-",$prod->name); ?>" width="152px" height="152px"/></a>
										<h2><i class="fa fa-rupee"></i> <?php echo $prod->price ?></h2>
										<p style="color:white"><?php echo $prod->name; ?></p>
										<a href="<?php echo base_url(); ?>shop/details/<?php echo $prod->id; ?>/<?php echo str_replace(" ","-",$prod->name); ?>" class="btn btn-primary add-to-cart"><i class="fa fa-view"></i>View Details</a>
									</div>									
								</div>							
							</div>
						</div>
					<?php } ?>					
				
				<?php if(count($products)> 4){ ?>
				<div id="loadMore">
					<span>Load more</span>
				</div> 
				<?php } ?>
			</div>
		</div>
	</div>

<script>
var i = 0;
function showAppointment()
{
	if(i == 0)
	{
		$('#showHide').slideDown();
		i++
	}
	else
	{
		$('#showHide').slideUp();
		i = 0;
	}
}
</script>