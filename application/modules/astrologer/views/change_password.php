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
                        <span class="active text-primary font13">Change Password</span>
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
								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-12">	

										<div class="form-group">
											<label>Old Password</label>
											<input type="password" name="old_password" class="form-control" required="required" placeholder="Enter your old password..">
										</div>

										<div class="form-group">
											<label>New Password</label>
											<input type="password" name="new_password" class="form-control" required="required" placeholder="Enter new password..">
										</div>

										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="conf_password" class="form-control" required="required" placeholder="Re-enter new password..">
										</div>

									</div>
									
									<div class="col-md-12">									
										
										<div class="form-group">
											<button type="submit" class="btn btn-primary pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->
					
				</div>
				</div>
		</div>
	</section>
				