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
                        <span class="active text-primary font13">Add Tips</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
	<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>						
				<div class="col-md-9 col-sm-7 blog-content" >
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

									<div class="col-md-12">

										<div class="form-group">
											<label>Select Rashi</label>
											<select class="form-control" required="required" name="rashi_id">
												<option value="">[select]</option>
												<?php foreach($rashi_list as $rashi){ ?>
													<option value="<?php echo $rashi->id ?>"><?php echo $rashi->name; ?></option>
												<?php } ?>
											</select>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />	
										</div>

										<div class="form-group">
											<label>Date From</label>
											<input type="text" name="date_from" class="form-control datepicker" required="required">                  
						                </div>

						                <div class="form-group">
											<label>Date To</label>
											<input type="text" name="date_to" class="form-control datepicker" required="required">                  
						                </div>
										

										<div class="form-group">
											<label>Topic</label>
											<input type="text" name="topic" class="form-control" required="required" placeholder="Topic goes here..">
										</div>

										<div class="form-group">
											<label>Description</label>
											<textarea name="description" class="form-control" required="required" placeholder="Details goes here.."></textarea>
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

					<div id="team" style="background:#fff !important"><!-- OUR ASTROLOGERS  -->

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>YOUR TIP'S LIST</h2>									

								</div>								
								<div class="col-md-9">
									<table class="table table-bordered">
										<tr>
										    <th style="text-align:center;">#</th>
										    <th style="text-align:center;">Date</th>
										    <th style="text-align:center;">Topic</th>
										    <th style="text-align:center;">Description</th>
										    <th style="text-align:center;">Action</th>
										</tr>
										<?php foreach($tips as $key=> $tip){ ?>
										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo $tip->date_from." to ". $tip->date_to; ?></td>
											<td><?php echo $tip->topic; ?></td>
											<td><?php echo $tip->description; ?></td>
											<td><a href="<?php echo base_url(); ?>astrologer/delete_tips/<?php echo $tip->id; ?>/<?php echo $tip->image; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
										</tr>	
										<?php } ?>
									</table>
								</div>													

							</div>

						</div>

					</div><!-- #/ Team  -->
				</div>
				</div>
		</div>
	</section>
				