<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>astrologer/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>                    
                    <li>
                        <span class="font13"><?php echo $this->uri->segment(2); ?></span>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Prediction</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="blog-details">
		<div class="container">
			<div class="row blog-item">								
				<!-- <div class="col-md-12 col-sm-12 blog-content">				
					<?php //foreach($all_data as $dat){ ?>
					<div class="entry-header">
						<h3><?php //echo $this->uri->segment(2);?> Prediction</h3>
						<img class="img-responsive" src="<?php //echo base_url(); ?>assets/rashi_prediction/<?php //echo $dat->image; ?>" alt="" />					
						<h3>Descrption</h3>						
					</div>
					<div class="entry-post">						
						<p><strong>Description:</strong> <?php //echo $dat->description; ?></p>
						
					</div>
					<hr/>
					<?php //} ?>
				</div> -->
				<div class="col-md-12"> 					
					<div class="comments-area">
						<h3>ASTROLOGERS PREDICTION</h3>
							<?php foreach($prediction as $tip){ ?>
		                        <div class="wow fadeInLeft col-md-6" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
		                            <div class="col-xs-2"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle"></div>
		                            <div class="col-md-6">
		                            	<span style="color:#e36480"><?php echo $tip->name; ?></span><br/>
		                            	<span><?php echo $tip->description; ?></span>
		                            </div>
		                        </div>
	                        <?php } ?>	
					</div><!--/comments-area-->
				</div>
				</div>
				<div class="col-md-12">
					<div class="replay-box" style="padding:10px;">
						<div class="row">
							<div class="col-md-12">
								<h3>GET MORE DETAILS ABOUT YOU</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>

								<?php
									$csrf = array(
									        'name' => $this->security->get_csrf_token_name(),
									        'hash' => $this->security->get_csrf_hash()
									);
								?>	
								<form id="comment-form" class="row" name="comment-form" method="post" action="<?php echo base_url(); ?>astrology/getDetailsAboutYou/">

									<div class="col-md-6">

										<div class="form-group">
											<div class="col-md-12">
												<label>Name</label>											
											</div>
											<div class="col-md-12">
												<input type="text" name="name1" class="form-control" required="required" placeholder="Enter Name">
												<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
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
											<button type="submit" class="btn btn-primary pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->

					<div id="team">
					<div class="container padding-bottom">
						<div class="row text-center">
							<div class="col-sm-12 section-title-two">
								<h2>OUR RANDOM ASTROLOGERS</h2>					
							</div>								
							<div style="margin-top: 35px;">
								<?php foreach($pannelled_astrologers as $ast){ ?>				
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

				<div id="team">
					<div class="container padding-bottom">
						<div class="row text-center">
							<div class="col-sm-12 section-title-two">
								<h2>OUR RANDOM ASTROLOGERS</h2>					
							</div>								
							<div style="margin-top: 35px;">
								<?php foreach($premium_astrologers as $ast){ ?>				
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
			</div>
		</div>
</section>
				