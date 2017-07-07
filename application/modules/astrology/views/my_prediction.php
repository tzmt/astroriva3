<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();    
  } );
  </script>
<section id="blog-details">

		<div class="container">

			<div class="row blog-item">								

				<div class="col-md-9 col-sm-7 blog-content">

					<div class="entry-header">

						<h3>PREDICTION FOR YOU</h3>

						<img class="img-responsive" width="100%" src="<?php echo base_url(); ?>assets/images/prediction.jpg" alt="prediction-for-you" />					

						<h3>GET MORE DETAILS ABOUT YOU</h3>						

					</div>				

					

					<div class="replay-box">
						<?php if($this->session->flashdata('error')){ ?>
						<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
						<?php } ?>
						<?php if($this->session->flashdata('success')){ ?>
						<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
						<?php } ?>

						<div class="row">

							<div class="col-md-12">

								<form id="comment-form" class="row" name="comment-form" method="post" action="<?php echo base_url(); ?>astrology/getDetailsAboutYou/">

									<div class="col-md-6">

										<div class="form-group">
											<div class="col-md-12">
												<label>Name</label>											
											</div>
											<div class="col-md-12">
												<input type="text" name="name1" class="form-control" required="required" placeholder="Enter Name">
												<input type="hidden" name="current_url" value="<?php echo current_url(); ?>" />
											</div>

										</div>

										<div class="form-group">
											<div class="col-md-12">
												<label>Date of Birth</label>											
											</div>
											<div class="col-md-4">
												<select name="day" class="form-control" required="required">
													<option value="">Day</option>
													<?php for($i=1;$i<=31; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-4">
												<select name="month" class="form-control" required="required">
													<option value="">Month</option>
													<?php for($i=1;$i<=12; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-4">
												<select name="year" class="form-control" required="required">
													<option value="">Year</option>
													<?php for($i=date("Y");$i>=1965; $i--){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>

										</div>

										<div class="form-group">
											<div class="col-md-12">
												<label>Place of Birth</label>											
											</div>
											<div class="col-md-12">
												<input type="text" name="pob1" class="form-control" required="required" placeholder="Enter Place Of Birth">											
											</div>
										</div>

									</div>

									<div class="col-md-6">

										<div class="form-group">
											<div class="col-md-12">
												<label>Time of Birth</label>											
											</div>
											<div class="col-md-4">
												<select name="hour" class="form-control" required="required">
													<option value="">Hour</option>
													<?php for($i=1;$i<=12; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-4">
												<select name="minute" class="form-control" required="required">
													<option value="">Minute</option>
													<?php for($i=1;$i<=60; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-4">
												<select name="format" class="form-control" required="required">
													<option value="">AM/PM</option>													
													<option value="AM">AM</option>
													<option value="PM">PM</option>
												</select>
											</div>

										</div>

										<div class="form-group">
											<div class="col-md-12">
												<label>City</label>											
											</div>
											<div class="col-md-12">
												<input type="text" name="city1" class="form-control" required="required" placeholder="Enter City">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-12">
												<label>Phone Number</label>											
											</div>
											<div class="col-md-12">
												<input type="number" name="phone1" class="form-control" required="required" placeholder="Enter Phone Number" maxlength="10">
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<div class="col-md-12">
												<label>Email</label>											
											</div>
											<div class="col-md-12">
												<input type="email" name="email" class="form-control" required="required" placeholder="Enter Email id">
											</div>
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

									<h2>OUR PANNELLED ASTROLOGERS</h2>										
									</div>				
									<?php foreach($pannelled_astrologers as $ast){ ?>				
									<div class="col-sm-3">
										<div class="team-member text-center">
											<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
											<div class="member-text">							
												<h5><?php echo $ast->name; ?></h5>
												<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
												<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
												<h6><?php echo $ast->phone; ?></h6>
											</div>						
										</div>
									</div>
									<?php } ?>	
									<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
										<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
									</div>														

							</div>

						</div>

					</div><!-- #/ Team  -->
					<div id="team" style="background:#fff !important"><!-- OUR ASTROLOGERS  -->

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>OUR PREMIUM ASTROLOGERS</h2>										
									</div>				
									<?php foreach($premium_astrologers as $ast){ ?>				
										<div class="col-sm-3">
											<div class="team-member text-center">
												<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
												<div class="member-text">							
													<h5><?php echo $ast->name; ?></h5>
													<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
													<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
													<h6><?php echo $ast->phone; ?></h6>
												</div>						
											</div>
										</div>
										<?php } ?>	
										<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
											<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
										</div>												

							</div>

						</div>

					</div><!-- #/ Team  -->

				</div>