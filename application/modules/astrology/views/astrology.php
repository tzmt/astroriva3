<section id="blog-details">
		<div class="container">
			<div class="row blog-item">								
				<div class="col-md-9 col-sm-7 blog-content">
					<?php foreach($all_data as $dat){ ?>
					<div class="entry-header">
						<h3><?php echo $this->uri->segment(2);?> Details</h3>
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/rashi_details/<?php echo $dat->image; ?>" alt="" />					
						<h3>Descrption</h3>						
					</div>
					<div class="entry-post">
						<p><strong>Topic:</strong> <?php echo $this->db->get_where('rashi_topic_list',array('id'=>$dat->topic_id))->row()->name; ?></p>
						<p><strong>Description:</strong> <?php echo $dat->description; ?></p>
						
					</div>
					<hr/>
					<?php } ?>
					
					
					<div class="replay-box" style="border:2px solid yellow;padding:10px;">
						<div class="row">
							<div class="col-md-12">
								<h3>GET MORE DETAILS ABOUT YOU</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-6">

										<div class="form-group">

											<input type="text" name="name1" class="form-control" required="required" placeholder="Enter Name">

										</div>

										<div class="form-group">

											<input type="text" name="dob1" class="form-control" required="required" placeholder="Enter Date Of Birth">

										</div>

										<div class="form-group">

											<input type="text" name="pob1" class="form-control" required="required" placeholder="Enter Place Of Birth">

										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">

											<input type="text" name="tob1" class="form-control" required="required" placeholder="Enter Time of Birth">

										</div>

										<div class="form-group">

											<input type="text" name="city1" class="form-control" required="required" placeholder="Enter City">

										</div>

										<div class="form-group">

											<input type="number" name="phone1" class="form-control" required="required" placeholder="Enter Phone Number" maxlength="10">

										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">

											<input type="email" name="email" class="form-control" required="required" placeholder="Enter Email id">

										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-default pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->

					<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PANNELLED ASTROLOGERS</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere.</p>
				</div>				
				<?php foreach($pannelled_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
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

	<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PREMIUM ASTROLOGERS</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere.</p>
				</div>				
				<?php foreach($premium_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
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
				</div>
				