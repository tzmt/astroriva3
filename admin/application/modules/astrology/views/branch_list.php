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
					 <li class="active">Branch List</li>	 
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
						Branch List						
					</div>					
					<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>								
								<th>Branch Name</th>
								<th>Details</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>								
								<td><?php echo $prid->name; ?></td>	
								<td><?php echo $prid->details; ?></td>
												
								<td><a href="#simpleModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">View Image</span></a> <a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>

							<div class="modal fade" id="simpleModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>View Branch Images</h4>
						  				</div>
									    <div class="modal-body">									        
									        <?php $q = $this->db->get_where('branch_image',array('branch_id'=>$prid->id))->result(); ?>
									        <div class="row">
									        <?php $i = 1; foreach($q as $q1){ ?>
									        	<div class="col-md-2" id="img<?php echo $q1->id.$i; ?>" style="margin-bottom:10px;position:relative"><img src="<?php echo SITE_URL; ?>assets/branch/<?php echo $q1->image; ?>"/><a href="javascript:void(0)" class="delete_image" image="<?php echo $q1->image; ?>" for="img<?php echo $q1->id.$i; ?>" forid="<?php echo $q1->id; ?>">Delete</a></div>
									        <?php $i++;} ?>
									        <br/><br/><br/>
									    </div>
									    <div class="row"><br/><br/><br/>
									        <div class="form-group">
												<label class="control-label col-lg-2">Upload</label>
												<div class="col-lg-10">													
													<form action="<?php echo base_url(); ?>astrology/upload_pictures/<?php echo $prid->id; ?>" class="dropzone">
														  <!-- <div class="fallback">
															<input name="file" type="file" multiple />
														  </div> -->
													</form>
												</div><!-- /.col -->
											</div><!-- /form-group -->
									    	</div>
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
											<h4>Delete Products</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>astrology/delete_branch/<?php echo $prid->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
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
										<h4>Edit Branch</h4>
					  				</div>
								    <div class="modal-body">
							       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>astrology/branch_lists/" enctype="multipart/form-data">	
										
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" value="<?php echo $prid->name;?>" class="form-control input-sm" id="inputEmail1" placeholder="Enter your branch name" required>
											<input type="hidden" name="id" value="<?php echo $prid->id; ?>"/>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Details</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"><?php echo $prid->details;?></textarea>					
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
          url:"<?php echo base_url();?>astrology/ajaxDeleteImage/",
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
	