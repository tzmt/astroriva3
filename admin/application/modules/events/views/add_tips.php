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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Events Management</a></li>
					 <li class="active">Add Events</li>	 
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
					<div class="col-md-8">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Events</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>events/add/" enctype="multipart/form-data">
																
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Title</label>
										<div class="col-lg-10">
											<input type="text" name="title" class="form-control input-sm" id="inputEmail1" placeholder="Enter your topic" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="control-label col-lg-2">Image</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="userfile" id="upload-demo" class="upload-demo">
												<label data-title="Select file" for="upload-demo">
													<span data-title="No file selected..."></span>
												</label>
											</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Date From</label>
										<div class="col-lg-10">
											<div class="input-group">
												<input type="text" name="date_from" value="<?php echo date("Y-m-d"); ?>" class="datepicker form-control">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Date To</label>
										<div class="col-lg-10">
											<div class="input-group">
												<input type="text" name="date_to" value="<?php echo date("Y-m-d"); ?>" class="datepicker form-control">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->									

									<div class="form-group">
										<label class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="description" placeholder="Enter your text ..." class="form-control" rows="10"></textarea>					
										</div><!-- /.col -->
									</div><!-- /form-group -->								


									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Events</button>
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


	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Mask-input -->
	