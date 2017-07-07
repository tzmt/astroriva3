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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Class Management</a></li>
					 <li class="active">Add Class Schedule</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<div class="padding-md">
				<div class="row">	
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success">
						<strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php } ?>
					<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger">
						<strong>Oh snap!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php } ?>				
					<div class="col-md-8">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Class Schedule</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>classes/add/" enctype="multipart/form-data">									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your course name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Course</label>
										<div class="col-lg-10">									
											<select name="course_id" class="form-control input-sm" required>
												<option value="">[Select]</option>
												<?php foreach($course_list as $course){ ?>
												<option value="<?php echo $course->id; ?>" ><?php echo $course->name; ?></option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Duration</label>
										<div class="col-lg-10">									
											<select name="duration" class="form-control input-sm" required>
												<?php for($i = 1; $i<=36; $i++){ ?>
												<option value="<?php echo $i; ?>" ><?php echo $i; ?> Hour</option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->	
																		
									<div class="form-group">
										<label class="col-lg-2 control-label">Type</label>
										<div class="col-lg-10">
											<label class="label-radio inline">
												<input type="radio" name="type" value="1" onclick="hidePlace()">
												<span class="custom-radio"></span>
												Online
											</label>
											<label class="label-radio inline">
												<input type="radio" name="type" value="0" onclick="showPlace()">
												<span class="custom-radio"></span>
												Offline
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group" id="place">
										<label for="inputEmail1" class="col-lg-2 control-label">Place</label>
										<div class="col-lg-10">
											<input type="text" name="place" class="form-control input-sm" value="" id="inputEmail1" placeholder="Enter your place of visit">
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Date</label>
										<div class="col-lg-10">
											<div class="input-group">
												<input type="text" value="06/10/2013" name="date" class="datepicker form-control">
												<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
											</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Time</label>
										<div class="col-lg-10">
											<div class="input-group bootstrap-timepicker">
												<input class="timepicker form-control" type="text" name="time" required/>
												<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
											</div>
										</div><!-- /.col -->
									</div>			

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Class Schedule</button>
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

	<script>
	$('#place').hide();
	var i = j = 3;
		function showPlace()
		{
			$('#place').show();
		}

		function hidePlace()
		{
			$('#place').hide();
		}
	</script>
	