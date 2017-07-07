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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Banner Management</a></li>
					 <li class="active">Add Banner</li>	 
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
					<div class="col-md-5">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Banners</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>banner/" enctype='multipart/form-data'>

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Heading</label>
										<div class="col-lg-10">
											<input type="text" name="heading" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">											
											<textarea name="description" class="form-control input-sm" placeholder="Site Description goes here..." required></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->									

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Banners</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->	
					<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-heading">Banner Text List</div>
						<div class="panel-body">
							<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Name</th>
								<th>Description</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $cat){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $cat->heading; ?></td>
								<td><?php echo $cat->description; ?></td>
								<td><a href="#deleteModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
								
								<div class="modal fade" id="deleteModal<?php echo $cat->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Banner Text</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>banner/delete_banner/<?php echo $cat->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div>
								</div>
							</div>
								
							</tr>
							<?php } ?>
						</tbody>
					</table>
						</div>
					</div><!-- /panel -->
				</div>					
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->
