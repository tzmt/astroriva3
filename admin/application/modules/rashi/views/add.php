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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Rashi Management</a></li>
					 <li class="active">Add</li>	 
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
					<div class="col-md-6">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Rashi</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="control-label col-lg-2">Upload</label>
										<div class="col-lg-10">								
												<input name="file" type="file" class="form-control input-sm" />
												<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										  </div>													
									</div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Rashi</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Rashi List
							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($rashi_list)> 0){ ?>
									<?php foreach($rashi_list as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><img src="<?php echo SITE_URL.'assets/rashi_image/'.$list->image; ?>" width="50px" /></td>										
										<td><?php echo $list->name; ?></td>										
										<td><a href="#simpleEditModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-warning">Edit</span></a> <a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a></td>
									</tr>

							<div class="modal fade" id="simpleEditModal<?php echo $list->id; ?>">
								<div class="modal-dialog">
								<div class="modal-content">
					  				<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Edit Rashi</h4>
					  				</div>
								    <div class="modal-body">
								       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/edit_rashi/" enctype="multipart/form-data">
											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
												<div class="col-lg-10">
													<input type="text" name="name" value="<?php echo $list->name; ?>" class="form-control input-sm" id="inputEmail1" placeholder="Name" required>
												</div><!-- /.col -->
											</div><!-- /form-group --><br/>

											<div class="form-group">
												<label class="control-label col-lg-2">Upload</label>
												<div class="col-lg-10">								
														<input name="userfile" type="file" class="form-control input-sm" />
														<input type="hidden" name="image" value="<?php echo $list->image ?>"/>
														<input type="hidden" name="id" value="<?php echo $list->id ?>"/>
												  </div>													
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


									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Rashi</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php base_url(); ?>rashi/delete_rashi/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<?php } } else { ?>
									<tr>
										<td colspan="3" style="color:red;text-align:center">No records found</td>										
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div><!-- /panel -->
					</div><!-- /.col -->
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->
