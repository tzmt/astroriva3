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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Course Management</a></li>
					 <li class="active">Course List</li>	 
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
								<th>Details</th>
								<th>Duration</th>
								<th>Syllabus</th>
								<th>Fee</th>
								<th>Total Class</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $prid->name; ?></td>
								<td><?php echo substr($prid->details,0,100); ?></td>
								<td><?php echo $prid->duration; ?></td>
								<td><?php echo $prid->syllabus; ?></td>
								<td><?php echo $prid->fee ?></td>
								<td><?php echo $prid->total_class ?></td>								
								<td><a href="#simpleModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">View</span></a> <a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>

							<div class="modal fade" id="simpleModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>View Course</h4>
						  				</div>
									    <div class="modal-body">									        
									        <p><strong>Course Name: </strong><?php echo $prid->name; ?></p>
									        <p><strong>Details: </strong><?php echo $prid->details; ?></p>
									        <p><strong>Duration: </strong><?php echo $prid->duration; ?></p>
									        <p><strong>Syllabus: </strong><?php echo $prid->syllabus; ?></p>
									        <p><strong>Fee: </strong><?php echo $prid->fee; ?></p>
									        <p><strong>Total Class: </strong><?php echo $prid->total_class ?></p>									       
									        <p><strong>Syllabus: </strong><a href="<?php echo SITE_URL; ?>assets/syllabus/<?php echo $prid->syllabus; ?>">Download</a></p>
									        <?php $q = $this->db->get_where('course_books',array('course_id'=>$prid->id))->result(); ?>
									        <p><strong>Books: </strong><?php $i = 1; foreach($q as $q1){echo " <a href='".SITE_URL."assets/books/".$q1->books."'>Book $i</a>,";$i++;} ?></p>
									        <?php $q = $this->db->get_where('course_assignments',array('course_id'=>$prid->id))->result(); ?>
									        <p><strong>Books: </strong><?php $i = 1; foreach($q as $q1){echo " <a href='".SITE_URL."assets/assignments/".$q1->assignments."'>Assignments $i</a>,";$i++;} ?></p>
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
											<h4>Delete Course</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>course/delete_course/<?php echo $prid->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->




							<?php } ?>
						</tbody>
					</table>
					<?php
						$csrf = array(
						        'name' => $this->security->get_csrf_token_name(),
						        'hash' => $this->security->get_csrf_hash()
						);
					?>	
					<?php foreach($all_data as $key=> $prid){ ?>
					<div class="modal fade" id="simpleEditModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
								<div class="modal-content">
					  				<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Edit Course</h4>
					  				</div>
								    <div class="modal-body">
							       		<form class="form-horizontal" method="POST" action="<?php echo base_url(); ?>course/lists/" enctype="multipart/form-data">									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->name; ?>" required>
											<input type="hidden" name="course_id" value="<?php echo $prid->id; ?>">
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Duration</label>
										<div class="col-lg-10">									
											<select name="duration" class="form-control input-sm">
												<?php for($i = 1; $i<=36; $i++){ ?>
													<option value="<?php echo $i; ?>" <?php if($prid->duration == $i) echo "selected"; ?>><?php echo $i; ?> Months</option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Details</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"><?php echo $prid->details; ?></textarea>					
										</div><!-- /.col -->
									</div><!-- /form-group -->								

									<div class="form-group">
										<label class="control-label col-lg-2">Syllabus</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="syllabus" id="upload-demo" class="upload-demo">
												<label data-title="Select file" for="upload-demo">
													<span data-title="No file selected..."></span>
												</label>
											</div>
										</div><!-- /.col -->
										<a href="<?php echo SITE_URL ?>assets/syllabus/<?php echo $prid->syllabus; ?>"><span class="pull-right" style="margin-top: 11px;
    color: blue;margin-right:17px">Download Syllabus</span></a><a href="javascript:void(0)"><span class="pull-left" style="margin-top: 11px; margin-left: 17px;color: red;">Leave blank if you don't want to change it</span></a>
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Fee</label>
										<div class="col-lg-10">
											<input type="text" name="fee" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->fee; ?>" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->


									<div class="form-group">
										<label class="control-label col-lg-2">Book</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="books[]" id="upload-demo1" class="upload-demo" multiple>
												<label data-title="Select file" for="upload-demo1">
													<span data-title="No file selected..."></span>
												</label>												
											</div>
										</div>
										<a href="javascript:void(0)"><span class="pull-right" style="margin-top: 10px;margin-right: 18px;color: blue;" onclick="addBooks()">Add More</span></a>
										<a href="javascript:void(0)"><span class="pull-left" style="margin-top: 11px;margin-left: 17px;color: red;">Leave blank if you don't want to change it</span></a>
									</div><!-- /form-group -->

									<div id="add_books"></div>
									

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Total Class</label>
										<div class="col-lg-10">
											<input type="text" name="total_class" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->total_class; ?>" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->									

									<div class="form-group">
										<label class="control-label col-lg-2">Add Assignment</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="assignment[]" id="upload-demo2" class="upload-demo">
												<label data-title="Select file" for="upload-demo2">
													<span data-title="No file selected..."></span>
												</label>												
											</div>
										</div>
										<a href="javascript:void(0)"><span class="pull-right" style="margin-top: 10px;margin-right: 18px;color: blue;" onclick="addAssign()">Add More</span></a>
										<a href="javascript:void(0)"><span class="pull-left" style="margin-top: 11px;margin-left: 17px;color: red;">Leave blank if you don't want to change it</span></a>
									</div><!-- /form-group -->

									<div id="add_assign"></div>											
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


					<!-- <div class="panel-footer clearfix">
						<ul class="pagination pagination-xs m-top-none pull-right">
							<li class="disabled"><a href="#">Previous</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div> -->
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
	var i = j = 3;
		function addBooks()
		{
			i++;
			var html = '<div class="form-group"><label class="control-label col-lg-2">Book '+i+'</label><div class="col-lg-10"><div class="upload-file"><input type="file" name="books[]" id="upload-demo_book'+i+'" class="upload-demo"><label data-title="Select file" for="upload-demo_book'+i+'"><span data-title="No file selected..."></span></label></div></div></div>';			
			$('#add_books').append(html);
		}

		function addAssign()
		{
			j++;
			var html = '<div class="form-group"><label class="control-label col-lg-2">Assignment '+j+'</label><div class="col-lg-10"><div class="upload-file"><input type="file" name="assignment[]" id="upload-demo_assign'+j+'" class="upload-demo"><label data-title="Select file" for="upload-demo_assign'+j+'"><span data-title="No file selected..."></span></label></div></div></div>';			
			$('#add_assign').append(html);
		}
	</script>
	