<style>
table { 
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 70%; 
border-collapse: 
collapse; border-spacing: 0; 
}

td, th { 
border: 1px solid transparent; /* No more visible border */
height: 30px; 
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */ 
tr:nth-child(even) td { background: #F1F1F1;}   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
#showHide{display: none;}
</style>

	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<div class="col-sm-6">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/astrologer/<?php echo $all_data->image; ?>" width="600px" height="400px" alt="" />
							</div>
							<div class="col-sm-6">
								<div class="product-details">
									<h3 class="product-name" style="color:#a704a5"><?php echo $all_data->name; ?></h3>									
									<div class="product-info">
										<h4 class="product-price"><i class="fa fa-phone"></i> <?php echo $all_data->phone; ?></h4>	
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
										<a href="javascript:void(0)" class="btn btn-default" onclick="showAppointment()">Book An Appoinment</a> <a href="#" class="btn btn-default">1 Like</a> <a href="#" class="btn btn-default">10 Comments</a>
										<br/>										
									</div>
								</div>
							</div>
							<div class="col-md-12" style="margin-top:15px" id="showHide">
								<table style="width:100%">
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
										<td colspan="7" style="color:red;">No Appointment Available</td>
									</tr>
									<?php } ?>
								</table>
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
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="">TIPS</a></h6>
							<h6><a href="">PREDICTION</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
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
	<div id="shop">
		<div class="container padding-top padding-bottom">
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
							<img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" width="231px" height="231px;" alt="<?php echo $prod->name; ?>" style="width:231px !important;height:231px !important;" />
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

<script>
var i = 0;
function showAppointment()
{
	if(i == 0)
	{
		$('#showHide').css('display','block');
		i++
	}
	else
	{
		$('#showHide').css('display','none');
		i = 0;
	}
}
</script>