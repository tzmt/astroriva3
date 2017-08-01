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
                        <span class="active text-primary font13">Edit Profile</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>								
		<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>			
			<div class="col-md-9 col-sm-7 blog-content">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3></h3>
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

								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-6">

										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" required="required"  value="<?php echo $all_data->name; ?>">
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

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
											<button type="submit" class="btn btn-primary pull-right">Submit</button>
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
									<div class="col-md-2" style="margin-bottom: 10px;text-align: center;">
										<div class="team-member">
											<div class="col-md-12" style="margin-bottom: 15px;">
												<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
											</div>
											<div class="member-text">			
												<h5><?php echo $ast->name; ?></h5>
												<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
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
				