							
				<div class="col-md-9 col-sm-7 blog-content" style="margin-top: -78px;">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3>Edit Profile</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-6">

										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" required="required"  value="<?php echo $all_data->name; ?>">

										</div>										

										<div class="form-group">
											<label>Phone</label>
											<input type="number" name="phone" class="form-control" required="required" maxlength="10" value="<?php echo $all_data->phone; ?>">
										</div>

										<div class="form-group">
											<label>Education</label>
											<input type="text" name="education" class="form-control" required="required" value="<?php echo $all_data->education; ?>">

										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" required="required" value="<?php echo $all_data->email; ?>">

										</div>										

										<div class="form-group">
											<label>Specialization</label>
											<input type="text" name="specialization" class="form-control" required="required" value="<?php echo $all_data->specialization; ?>">

										</div>

										<div class="form-group">
											<label>Experience</label>
											<input type="text" name="experience" class="form-control" required="required" value="<?php echo $all_data->experience; ?>">

										</div>
									</div>
									<div class="col-md-12">										
										<div class="form-group">
											<label>Details</label>
											<textarea name="details" class="form-control" required="required"><?php echo $all_data->details; ?></textarea>

										</div>
										<div class="form-group">
											<button type="submit" class="btn btn-default pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->

					<div id="team" style="background:#fff !important"><!-- OUR ASTROLOGERS  -->

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>OUR RANDOM ASTROLOGERS</h2>									

								</div>								
								<?php foreach($astrologers as $ast){ ?>		
								<div class="col-sm-3 text-center">

									<div class="team-member">

										<img class="img-responsive" src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" />						

										<div class="member-text">							

											<h5><?php echo $ast->name; ?></h5>
											<h6><a href="">TIPS</a></h6>
											<h6><a href="">PREDICTION</a></h6>
											<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo str_replace(" ","-",$ast->name); ?>">VIEW DETAILS</a></h6>
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
				</div>
		</div>
	</section>
				