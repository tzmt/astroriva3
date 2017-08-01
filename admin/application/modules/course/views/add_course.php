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
					 <li class="active">Add Course</li>	 
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
							<div class="panel-heading">Add Tips</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>course/add/" enctype="multipart/form-data">									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your course name" required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Duration</label>
										<div class="col-lg-10">									
											<select name="duration" class="form-control input-sm">
												<?php for($i = 1; $i<=36; $i++){ ?>
												<option value="<?php echo $i; ?>" ><?php echo $i; ?> Months</option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Details</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"></textarea>					
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
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Fee</label>
										<div class="col-lg-10">
											<input type="text" name="fee" class="form-control input-sm" id="inputEmail1" placeholder="Enter your course name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->


									<div class="form-group">
										<label class="control-label col-lg-2">Book</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="book[]" id="upload-demo1" class="upload-demo">
												<label data-title="Select file" for="upload-demo1">
													<span data-title="No file selected..."></span>
												</label>												
											</div>
										</div>
										<a href="javascript:void(0)"><span class="pull-right" style="margin-top: 10px;margin-right: 18px;color: blue;" onclick="addBooks()">Add More</span></a>
									</div><!-- /form-group -->

									<div id="add_books"></div>
									

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Total Class</label>
										<div class="col-lg-10">
											<input type="text" name="total_class" class="form-control input-sm" id="inputEmail1" placeholder="Enter total class" required>
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
									</div><!-- /form-group -->

									<div id="add_assign"></div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Course</button>
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
	var i = j = 3;
		function addBooks()
		{
			i++;
			var html = '<div class="form-group"><label class="control-label col-lg-2">Book '+i+'</label><div class="col-lg-10"><div class="upload-file"><input type="file" name="book[]" id="upload-demo_book'+i+'" class="upload-demo"><label data-title="Select file" for="upload-demo_book'+i+'"><span data-title="No file selected..."></span></label></div></div></div>';			
			$('#add_books').append(html);
		}

		function addAssign()
		{
			j++;
			var html = '<div class="form-group"><label class="control-label col-lg-2">Assignment '+j+'</label><div class="col-lg-10"><div class="upload-file"><input type="file" name="assignment[]" id="upload-demo_assign'+j+'" class="upload-demo"><label data-title="Select file" for="upload-demo_assign'+j+'"><span data-title="No file selected..."></span></label></div></div></div>';			
			$('#add_assign').append(html);
		}
	</script>
	