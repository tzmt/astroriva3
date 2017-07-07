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
					 <li class="active">List Astrologers</li>	 
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
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Education</th>
								<th>Specialization</th>
								<th>Experience</th>
								<th>Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>	
								<td><img src="<?php echo SITE_URL.'assets/astrologer/'.$prid->image; ?>" width="50px;"/></td>								
								<td><?php echo $prid->name; ?></td>								
								<td><?php echo $prid->email; ?></td>
								<td><?php echo $prid->phone; ?></td>
								<td><?php echo $prid->education; ?></td>		
								<td><?php echo $prid->specialization; ?></td>	
								<td><?php echo $prid->experience; ?></td>
								<td><?php if($prid->status == 0) echo "Normal"; else if($prid->status == 1) echo "Premium"; else echo "panneled"; ?></td>							
								<td><a href="#addBranch<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">Add Branch</span></a> <a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
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
									        <a href="<?php echo base_url(); ?>astrology/delete_astrologer/<?php echo $prid->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<div class="modal fade" id="addBranch<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Add Chamber</h4>
						  				</div>
									    <div class="modal-body">
									        <div class="row">
									        	<div class="col-md-6">
									        		<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>astrology/addBranch/" enctype="multipart/form-data">	
														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
															<div class="col-lg-10">
																<input type="text" name="name" class="form-control input-sm"  id="inputEmail1" required>
																<input type="hidden" name="id" value="<?php echo $prid->id; ?>"/>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Place</label>
															<div class="col-lg-10">
																<input type="text" name="place" class="form-control input-sm" required>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Nearby</label>
															<div class="col-lg-10">
																<input type="text" name="nearby_places" class="form-control input-sm" required>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Day</label>
															<div class="col-lg-10">
																<input type="text" name="day" class="form-control input-sm" required>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Ph 1</label>
															<div class="col-lg-10">
																<input type="number" name="phone1" maxlength="10" class="form-control input-sm" required>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Ph 2</label>
															<div class="col-lg-10">
																<input type="number" name="phone2" maxlength="10" class="form-control input-sm">
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Ph 3</label>
															<div class="col-lg-10">
																<input type="number" name="phone3" maxlength="10" class="form-control input-sm">
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Ph 4</label>
															<div class="col-lg-10">
																<input type="number" name="phone4" maxlength="10" class="form-control input-sm">
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">From</label>
															<div class="col-lg-5">
																<select name="time_from" class="form-control" required="required">
																	<?php for($i = 1; $i<=12; $i++){ ?>
																	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php for($j = 5; $j<60; $j = $j+5){ ?>
																	<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
																	<?php } ?>
																	<?php } ?>
																</select>
															</div><!-- /.col -->
															<div class="col-lg-5">
																<select name="time_from_day" class="form-control" required="required">
																	<option value="am">AM</option>
																	<option value="pm">PM</option>
																</select>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">To</label>
															<div class="col-lg-5">
																<select name="time_to" class="form-control" required="required">
																	<?php for($i = 1; $i<=12; $i++){ ?>
																	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
																	<?php for($j = 5; $j<60; $j = $j+5){ ?>
																	<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
																	<?php } ?>
																	<?php } ?>
																</select>
															</div><!-- /.col -->
															<div class="col-lg-5">
																<select name="time_to_day" class="form-control" required="required">
																	<option value="am">AM</option>
																	<option value="pm">PM</option>
																</select>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/><br/>

														

														


														

														

														<div class="form-group">
															<div class="col-lg-offset-2 col-lg-10">
																<button type="submit" class="btn btn-success btn-sm">Add Branch</button>
															</div><!-- /.col -->
														</div><!-- /form-group -->
													</form>
									        	</div>
									        	<div class="col-md-6">
									        		<?php $query = $this->db->get_where('astrologer_branch',array('astrologers_id'=>$prid->id))->result(); ?>
									        		<?php foreach($query as $qu){ ?>
									        			<div class="col-md-12" style="background:#eee;border:2px solid #ddd;margin-bottom:5px">
								        					<p><strong>Name: </strong><?php echo $qu->branch_name; ?></p>
								        					<p><strong>Place: </strong><?php echo $qu->place; ?></p>
								        					<p><strong>Time: </strong><?php echo $qu->time; ?></p>
								        					<p><strong>Phone 1: </strong><?php echo $qu->phone1; ?></p>
								        					<p><strong>Phone 2: </strong><?php echo $qu->phone2; ?></p>
								        					<p><strong>Phone 3: </strong><?php echo $qu->phone3; ?></p>
								        					<p><strong>Phone 4: </strong><?php echo $qu->phone4; ?></p>
								        					<p><strong>Nearby Places: </strong><?php echo $qu->nearby_places; ?> <span class="pull-right"><a href="<?php echo base_url(); ?>astrology/delete_branch/<?php echo $qu->id; ?>" style="color:red">DELETE</a></span></p>
									        			</div>
									        		<?php } ?>
									        	</div>
									        </div>	        
									    </div>
									    <div class="modal-footer">									        
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
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
							       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>astrology/list_astrologers/" enctype="multipart/form-data">	
										<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" value="<?php echo $prid->name; ?>" id="inputEmail1" placeholder="Enter astrologer name" required>
											<input type="hidden" name="id" value="<?php echo $prid->id; ?>"/>
											<input type="hidden" name="image" value="<?php echo $prid->image; ?>"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
										<div class="col-lg-10">
											<input type="email" name="email" class="form-control input-sm" value="<?php echo $prid->email; ?>" id="inputEmail1" placeholder="Enter emailname" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->
									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Phone</label>
										<div class="col-lg-10">
											<input type="text" name="phone" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->phone; ?>" placeholder="Enter phone number" max="10" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Education</label>
										<div class="col-lg-10">
											<input type="text" name="education" class="form-control input-sm" value="<?php echo $prid->education; ?>" id="inputEmail1" placeholder="Enter education" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Specialization</label>
										<div class="col-lg-10">
											<input type="text" name="specialization" class="form-control input-sm" value="<?php echo $prid->specialization; ?>" id="inputEmail1" placeholder="Enter specialization" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Experience</label>
										<div class="col-lg-10">
											<input type="text" name="experience" class="form-control input-sm" value="<?php echo $prid->experience; ?>" id="inputEmail1" placeholder="Enter experience" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Details</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"><?php echo $prid->details; ?></textarea>					
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Type</label>
										<div class="col-lg-10">
											<label class="label-radio inline">
												<input type="radio" name="status" value="0" <?php if($prid->status == 0) echo "checked"; ?>>
												<span class="custom-radio"></span>
												Normal
											</label>
											<label class="label-radio inline">
												<input type="radio" name="status" value="1" <?php if($prid->status == 1) echo "checked"; ?>>
												<span class="custom-radio"></span>
												Premium
											</label>
											<label class="label-radio inline">
												<input type="radio" name="status" value="2" <?php if($prid->status == 2) echo "checked"; ?>>
												<span class="custom-radio"></span>
												Panneled
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="control-label col-lg-2">Upload</label>
										<div class="col-lg-10">								
												<input name="file" type="file" class="form-control input-sm" />
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
	