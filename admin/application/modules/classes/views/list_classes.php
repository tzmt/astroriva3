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
					 <li class="active">List Class</li>	 
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
					<div class="col-md-12">						
						<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						Tips List						
					</div>					
					<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Name</th>
								<th>Course</th>
								<th>Duration</th>
								<th>Date</th>
								<th>Type</th>
								<th>Place</th>
								<th>Time</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $prid->name; ?></td>
								<td><?php echo $this->classes_model->getCourseNameById($prid->course_id); ?></td>
								<td><?php echo $prid->duration; ?> hour</td>
								<td><?php echo $prid->date; ?></td>
								<td><?php if($prid->type == 0) echo "Offline"; else "Online";  ?></td>
								<td><?php echo $prid->place; ?></td>		
								<td><?php echo date("g:i:s a",$prid->time); ?></td>								
								<td><a href="#simpleModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">View Student</span></a> <a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit Class</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>

							<div class="modal fade" id="simpleModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>View Student</h4>
						  				</div>
									    <div class="modal-body">									        
									        <?php $student_list = explode(",",$prid->student); ?>
									        <?php foreach($student_list as $stud){ ?>
									        	<div class="col-md-3"><?php echo $this->db->get_where('student',array('id'=>$stud))->row()->name; ?></div>
									        <?php } ?>
									    </div>
									    <div class="modal-footer">
									        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>	
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

						

						<div class="modal fade" id="deleteModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Class Schedule</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>classes/delete_class/<?php echo $prid->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->




							<?php } ?>
						</tbody>
					</table>
					<?php foreach($all_data as $key=> $prid){ ?>
					<div class="modal fade" id="simpleEditModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
								<div class="modal-content">
					  				<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Edit Class</h4>
					  				</div>
								    <div class="modal-body">
							       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>classes/lists/" enctype="multipart/form-data">	
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
											<div class="col-lg-10">
												<input type="text" name="name" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->name; ?>" placeholder="Enter your course name" required>
												<input type="hidden" name="id" value="<?php echo $prid->id ?>"/>
											</div><!-- /.col -->
										</div><!-- /form-group -->

										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Course</label>
											<div class="col-lg-10">									
												<select name="course_id" class="form-control input-sm" required>
													<option value="">[Select]</option>
													<?php foreach($course_list as $course){ ?>
													<option value="<?php echo $course->id; ?>" <?php if($prid->course_id == $course->id) echo "selected"; ?>><?php echo $course->name; ?></option>
													<?php } ?>
												</select>
											</div><!-- /.col -->
										</div><!-- /form-group -->	

										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Duration</label>
											<div class="col-lg-10">									
												<select name="duration" class="form-control input-sm" required>
													<?php for($i = 1; $i<=36; $i++){ ?>
													<option value="<?php echo $i; ?>" <?php if($prid->duration == $i) echo "selected"; ?>><?php echo $i; ?> Hour</option>
													<?php } ?>
												</select>
											</div><!-- /.col -->
										</div><!-- /form-group -->											

										<div class="form-group">
											<label class="col-lg-2 control-label">Type</label>
											<div class="col-lg-10">
												<label class="label-radio inline">
													<input type="radio" name="type" value="1" onclick="hidePlace()" <?php if($prid->type == 1) echo "checked = 'checked'"; ?>>
													<span class="custom-radio"></span>
													Online
												</label>
												<label class="label-radio inline">
													<input type="radio" name="type" value="0" onclick="showPlace()" <?php if($prid->type == 0) echo "checked = 'checked'"; ?>>
													<span class="custom-radio"></span>
													Offline
												</label>
											</div><!-- /.col -->
										</div><!-- /form-group -->	

										<div class="form-group" id="place">
											<label for="inputEmail1" class="col-lg-2 control-label">Place</label>
											<div class="col-lg-10">
												<input type="text" name="place" class="form-control input-sm" value="<?php echo $prid->place; ?>" id="inputEmail1" placeholder="Enter your place of visit">
											</div><!-- /.col -->
										</div><!-- /form-group -->	

										<div class="form-group">
											<label class="col-lg-2 control-label">Date</label>
											<div class="col-lg-10">
												<div class="input-group">
													<input type="text" value="<?php echo date("Y-m-d",strtotime($prid->date)); ?>" name="date" class="datepicker form-control">
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
									    </div>
									    <div class="modal-footer">
									        <button class="btn btn-sm btn-success" type="submit" aria-hidden="true">Save Changes</button>
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>	
								    	</div>
						    		</form>
							  	</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->

						<?php } ?>
					<?php echo $links; ?>	


					
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
	