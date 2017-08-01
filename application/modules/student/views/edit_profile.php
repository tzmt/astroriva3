<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>student/" class="font13">Home</a>
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
							<div class="col-md-9">
								<h3>Edit Profile</h3>
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
											<label>Email</label>
											<input type="email" name="email" class="form-control" required="required" value="<?php echo $all_data->email; ?>">
										</div>											

									</div>

									<div class="col-md-6">

										<div class="form-group">
											<label>Date of Birth</label>
											<input type="text" name="dob" class="form-control datepicker" required="required" value="<?php echo $all_data->dob; ?>">

										</div>							

										<div class="form-group">
											<label>Time of Birth</label>
											<input type="text" name="tob" class="form-control" required="required" value="<?php echo $all_data->tob; ?>">

										</div>

										<div class="form-group">
											<label>Place of Birth</label>
											<input type="text" name="pob" class="form-control" required="required" value="<?php echo $all_data->pob; ?>">

										</div>
									</div>
									<div class="col-md-12">	
										<div class="form-group">
											<button type="submit" class="btn btn-default pull-right">Submit</button>
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
				