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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Video Management</a></li>
					 <li class="active">Add Video</li>	 
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


					<div class="col-md-5">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Video</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>video/" enctype='multipart/form-data'>

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Category</label>
										<div class="col-lg-10">											
											<select class="form-control input-sm" name="cat_id" >
												<?php foreach($cat_list as $cat){ ?>
												<option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
												<?php } ?>
											</select>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Title</label>
										<div class="col-lg-10">
											<input type="text" name="title" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Image</label>
										<div class="col-lg-10">											
											<input type="file" name="file" class="form-control input-sm"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Link</label>
										<div class="col-lg-10">
											<input type="text" name="link" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." required>
										</div><!-- /.col -->
									</div><!-- /form-group -->																	

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Link</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->	
					<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-heading">Video Link List</div>
						<div class="panel-body">
							<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Image</th>
								<th>Category</th>
								<th>Title</th>
								<th>Link</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $cat){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><img src="<?php echo SITE_URL; ?>assets/video/<?php echo $cat->image; ?>" width="50px" /></td>
								<td><?php echo $this->db->get_where('video_category',array('id'=>$cat->cat_id))->row()->name; ?></td>	
								<td><?php echo $cat->title; ?></td>
								<td><?php echo $cat->link; ?></td>
								<td><a href="#editModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a> <a href="#deleteModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
								
								<div class="modal fade" id="deleteModal<?php echo $cat->id; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
							  				<div class="modal-header">
							    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4>Delete Video Link</h4>
							  				</div>
										    <div class="modal-body">
										        <p>Are you sure you want to delete this item?</p>	        
										    </div>
										    <div class="modal-footer">
										        <a href="<?php echo base_url(); ?>video/delete_video/<?php echo $cat->id; ?>/<?php echo $cat->image ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
										        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
										    </div>
									  	</div>
									</div>
								</div>

								<div class="modal fade" id="editModal<?php echo $cat->id; ?>">
									<div class="modal-dialog">
										<div class="modal-content">
							  				<div class="modal-header">
							    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4>Edit Video Link</h4>
							  				</div>
										    <div class="modal-body">
										        <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>video/update" enctype='multipart/form-data'>
										        	<div class="form-group">
														<label for="inputEmail1" class="col-lg-2 control-label">Category</label>
														<div class="col-lg-10">											
															<select class="form-control input-sm" name="cat_id" >
																<?php foreach($cat_list as $cate){ ?>
																<option value="<?php echo $cate->id; ?>" <?php if($cate->id == $cat->cat_id ){echo "selected";} ?>><?php echo $cate->name; ?></option>
																<?php } ?>
															</select>
															<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
														</div><!-- /.col -->
													</div><!-- /form-group --><br/>

													<div class="form-group">
														<label for="inputEmail1" class="col-lg-2 control-label">Title</label>
														<div class="col-lg-10">
															<input type="text" name="title" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." value="<?php echo $cat->title; ?>" required>
															<input type="hidden" name="id" value="<?php echo $cat->id; ?>" />
														</div><!-- /.col -->
													</div><!-- /form-group --><br/>

													<div class="form-group">
														<label for="inputEmail1" class="col-lg-2 control-label">Image</label>
														<div class="col-lg-10">											
															<input type="file" name="file" class="form-control input-sm"/>
														</div><!-- /.col -->
													</div><!-- /form-group --><br/>

													<div class="form-group">
														<label for="inputEmail1" class="col-lg-2 control-label">Link</label>
														<div class="col-lg-10">
															<input type="text" name="link" value="<?php echo $cat->link; ?>" class="form-control input-sm" id="inputEmail1" placeholder="Site Name goes here..." required>
														</div><!-- /.col -->
														<img src="<?php echo SITE_URL; ?>assets/video/<?php echo $cat->image; ?>" width="50px" />
														<input type="hidden" name="image" value="<?php echo $cat->image; ?>"/>
													</div><!-- /form-group -->	<br/>		        
										    </div>
										    <div class="modal-footer">
										        <button type="submit" class="btn btn-sm btn-success">Update Link</button>
										        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
										    </div>
										    </form>
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
