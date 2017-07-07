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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Shop Management</a></li>
					 <li class="active">Add Category</li>	 
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
				<div class="col-md-7">		
					<div class="col-md-12">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Category</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>shop/category/" enctype="multipart/form-data">									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Category Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your category name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->										

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Category</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-12">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Sub Category</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>shop/category/sub/" enctype="multipart/form-data">									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Select Category</label>
										<div class="col-lg-10">									
											<select name="category_id" class="form-control input-sm" required>
												<option value="">[Select]</option>
												<?php foreach($category_list as $cat){ ?>
												<option value="<?php echo $cat->id; ?>" ><?php echo $cat->name; ?></option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Category Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your category name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->										

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Sub Category</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->	
				</div>	
				<div class="col-md-5">
					<div class="panel panel-default">
						<div class="panel-heading">Category List</div>
						<div class="panel-body">
							<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Name</th>
								<th>Sub Category</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($category_list as $key=> $cat){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $cat->name; ?></td>
								<td></td>
								<td>
								 <a href="#simpleEditModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
								<?php $q = $this->db->get_where('shop_category',array('category_id'=>$cat->id))->result(); ?>
								<?php foreach($q as $q1){ ?>
									<tr>
										<td></td>
										<td></td>
										<td><?php echo $q1->name; ?></td>
										<td>
								 <a href="#simpleEditModal<?php echo $q1->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $q1->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
									</tr>
									<div class="modal fade" id="deleteModal<?php echo $q1->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Category</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>shop/delete_category/<?php echo $q1->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div>
										</div>
									</div>

									<div class="modal fade" id="simpleEditModal<?php echo $q1->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Edit Class</h4>
								  				</div>
											    <div class="modal-body">
											       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>shop/edit/" enctype="multipart/form-data">	
														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
															<div class="col-lg-10">
																<input type="text" name="name" class="form-control input-sm" id="inputEmail1" value="<?php echo $q1->name; ?>" placeholder="Enter your course name" required>
																<input type="hidden" name="id" value="<?php echo $q1->id ?>"/>
															</div><!-- /.col -->
														</div><!-- /form-group -->																			
													    </div>
													    <div class="modal-footer">
													        <button class="btn btn-sm btn-success" type="submit" aria-hidden="true">Save Changess</button>
													        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>	
												    	</div>
										    		</form>
										  		</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
									</div>						
								<?php } ?>
								
							</tr>

							

						

						<div class="modal fade" id="deleteModal<?php echo $cat->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Category</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>shop/delete_category/<?php echo $cat->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div>
								</div>
							</div>

						<div class="modal fade" id="simpleEditModal<?php echo $cat->id; ?>">
							<div class="modal-dialog">
								<div class="modal-content">
					  				<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Edit Class</h4>
					  				</div>
								    <div class="modal-body">
								       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>shop/edit/" enctype="multipart/form-data">	
											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
												<div class="col-lg-10">
													<input type="text" name="name" class="form-control input-sm" id="inputEmail1" value="<?php echo $cat->name; ?>" placeholder="Enter your course name" required>
													<input type="hidden" name="id" value="<?php echo $cat->id ?>"/>
												</div><!-- /.col -->
											</div><!-- /form-group -->																			
										    </div>
										    <div class="modal-footer">
										        <button class="btn btn-sm btn-success" type="submit" aria-hidden="true">Save Changes</button>
										        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>	
									    	</div>
							    		</form>
							  		</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</div>




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


	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Mask-input -->

	<script>
		$('.dblclick').dblclick(function(){
			var name = $(this).attr('name');
			var id = $(this).attr('id');
			$(this).html(name);
			$(this).html('<input type="text" id="new_value" value="'+name+'"/><i');
			//alert(name + id);
			
		});
	</script>
	