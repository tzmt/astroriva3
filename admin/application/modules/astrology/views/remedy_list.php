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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Astrology Management</a></li>
					 <li class="active">List Remedy</li>	 
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
						Other Products						
					</div>					
					<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Image</th>
								<th>Name of Problem</th>
								<th>Name of Remedy</th>
								<th>Details</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>								
								<td><img src="<?php echo SITE_URL; ?>assets/public_remedy/<?php echo $prid->image; ?>" width="100px"/></td>								
								<td><?php echo $prid->problem_name; ?></td>
								<td><?php echo $prid->remedy_name; ?></td>
								<td><?php echo $prid->details; ?></td>	
								<td><?php echo $prid->price; ?></td>								
								<td><a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>
						

						<div class="modal fade" id="deleteModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Products</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>astrology/delete_remedy/<?php echo $prid->id; ?>/<?php echo $prid->image; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
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
										<h4>Edit Remedy</h4>
					  				</div>
								    <div class="modal-body">
							       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>astrology/list_remedy/" enctype="multipart/form-data">	
										<div class="form-group">
										<label for="inputEmail1" class="col-lg-3 control-label">Name of Problem</label>
										<div class="col-lg-9">
											<input type="text" name="problem_name" value="<?php echo $prid->problem_name; ?>" class="form-control input-sm" id="inputEmail1" placeholder="Enter problem name" required>
											<input type="hidden" name="id" value="<?php echo $prid->id; ?>" />
											<input type="hidden" name="image" value="<?php echo $prid->image; ?>" />
										</div><!-- /.col -->
									</div><!-- /form-group --> 

									<div class="form-group">
										<label class="col-lg-3 control-label">Details</label>
										<div class="col-lg-9">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"><?php echo $prid->details; ?></textarea>					
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-3 control-label">Name of Remedy</label>
										<div class="col-lg-9">
											<input type="text" name="remedy_name" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->remedy_name; ?>" placeholder="Enter name of remedy" max="10" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-3 control-label">Price</label>
										<div class="col-lg-9">
											<input type="text" name="price" class="form-control input-sm" value="<?php echo $prid->price; ?>" id="inputEmail1" placeholder="Enter experience" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="control-label col-lg-3">Upload</label>
										<div class="col-lg-9">								
												<input name="file" type="file" class="form-control input-sm" />
										  </div>													
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									    
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


	<!-- Dropzone -->
	<script src='<?php echo ASSETS; ?>js/dropzone.min.js'></script>	


	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Mask-input -->

	<script>
	$('.delete_image').click(function(){
		var image = $(this).attr('image');
		var forimage = $(this).attr('for');
		var forid= $(this).attr('forid');
		//alert(image);
		//alert(cat_id);
		$.ajax({
          type:"POST",
          url:"<?php echo base_url();?>shop/ajaxDeleteImage/",
          data:{ image: image,forid:forid},
          success: function (data){
           	//alert(data);
            $('#'+forimage).hide()
          }
        });		
	});

	function getSubcategory(cat_id)
		{
			//alert(cat_id);
			$.ajax({
              type:"POST",
              url:"<?php echo base_url();?>shop/getSubcategory/",
              data:{ cat_id: cat_id},
              success: function (data){
               	//alert(data);
                $('#showSub').show();
                $('#subCat').html(data);
              }
            });
		}
	</script>
	