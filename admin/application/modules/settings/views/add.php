<!-- Chosen -->
<link href="<?php echo ASSETS; ?>css/chosen/chosen.min.css" rel="stylesheet"/>

<!-- Datepicker -->
<link href="<?php echo ASSETS; ?>css/datepicker.css" rel="stylesheet"/>

<!-- Timepicker -->
<link href="<?php echo ASSETS; ?>css/bootstrap-timepicker.css" rel="stylesheet"/>

<!-- Slider -->
<link href="<?php echo ASSETS; ?>css/slider.css" rel="stylesheet"/>

<!-- Tag input -->
<link href="<?php echo ASSETS; ?>css/jquery.tagsinput.css" rel="stylesheet"/>

<!-- WYSIHTML5 -->
<link href="<?php echo ASSETS; ?>css/bootstrap-wysihtml5.css" rel="stylesheet"/>

<!-- Dropzone -->
<link href='<?php echo ASSETS; ?>css/dropzone/dropzone.css' rel="stylesheet"/>

<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Settings Management</a></li>
					 <li class="active">Change Settings</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<div class="padding-md">
				<div class="row">	
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success">
						<strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>.
					</div>
					<?php } ?>
					<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger">
						<strong>Oh snap!</strong> <?php echo $this->session->flashdata('error'); ?>.
					</div>
				<?php } ?>	
				<?php
					$csrf = array(
					        'name' => $this->security->get_csrf_token_name(),
					        'hash' => $this->security->get_csrf_hash()
					);
				?>				
					<div class="col-md-8">						
						<div class="panel panel-default">
							<div class="panel-heading">Change Settings</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>settings/" enctype='multipart/form-data'>

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Site Name</label>
										<div class="col-lg-10">
											<input type="text" name="site_name" value="<?php echo $all_data->site_name; ?>" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">											
											<textarea name="description" class="form-control input-sm" placeholder="Site Description goes here..." required><?php echo $all_data->description; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Meta Keywords</label>
										<div class="col-lg-10">											
											<textarea name="meta_keywords" class="form-control input-sm" placeholder="Site Description goes here..." required><?php echo $all_data->meta_keywords; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Favicon</label>
										<div class="col-lg-10">		
											<p><img src="<?php echo SITE_URL; ?>assets/ico/<?php echo $all_data->favicon; ?>"></p>									
											<input type="file" name="favicon" class="form-control input-sm"/>
											<input type="hidden" name="favicon_image" value="<?php echo $all_data->favicon; ?>"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Logo</label>
										<div class="col-lg-10">	
										<p><img src="<?php echo SITE_URL; ?>assets/logo/<?php echo $all_data->logo; ?>" width="100px"></p>		
											<input type="file" name="logo" class="form-control input-sm"/>
											<input type="hidden" name="logo_image" value="<?php echo $all_data->logo; ?>"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									

									

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Form</label>
										<div class="col-lg-10">											
											<input type="file" name="form" class="form-control input-sm"/>
											<input type="hidden" name="form_old" value="<?php echo $all_data->form; ?>"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Add Brochure</label>
										<div class="col-lg-10">	
										
											<input type="file" name="brochure" class="form-control input-sm"/>
											<input type="hidden" name="brochure_old" value="<?php echo $all_data->brochure; ?>"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Facebook</label>
										<div class="col-lg-10">
											<input type="text" name="facebook_url" class="form-control input-sm" value="<?php echo $all_data->facebook_url; ?>" id="inputEmail1" placeholder="facebook url goes here..">
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Twitter</label>
										<div class="col-lg-10">
											<input type="text" name="twitter_url" class="form-control input-sm" value="<?php echo $all_data->twitter_url; ?>" id="inputEmail1" placeholder="twitter url goes here..">
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Youtube</label>
										<div class="col-lg-10">
											<input type="text" name="youtube_url" value="<?php echo $all_data->youtube_url; ?>" class="form-control input-sm" id="inputEmail1" placeholder="youtube url goes here..">
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Maintenace</label>
										<div class="col-lg-10">
											<label class="label-radio inline">
												<input type="radio" name="maintenance" value="1" <?php if($all_data->maintenance == 1) echo "checked = 'checked'"; ?>>
												<span class="custom-radio"></span>
												Online
											</label>
											<label class="label-radio inline">
												<input type="radio" name="maintenance" value="0" <?php if($all_data->maintenance == 0) echo "checked = 'checked'"; ?>>
												<span class="custom-radio"></span>
												Offline
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Save Settings</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->					
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->
