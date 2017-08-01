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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Student Management</a></li>
					 <li class="active">Student List</li>	 
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

					<div class="col-md-12">						
						<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						Student List						
					</div>					
					<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Image</th>								
								<th>Name</th>
								<th>Email</th>
								<th>D.O.B</th>
								<th>T.O.B</th>
								<th>P.O.B</th>
								<th>Phone</th>
								<th>Passed/Fail</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>								
								<td><img src="<?php echo SITE_URL."assets/images/".$prid->image; ?>" width="50px"/></td>								
								<td><?php echo $prid->name; ?></td>	
								<td><?php echo $prid->email; ?></td>
								<td><?php echo $prid->dob; ?></td>
								<td><?php echo $prid->tob; ?></td>
								<td><?php echo $prid->pob; ?></td>
								<td><?php echo $prid->phone; ?></td>
								<td><?php if($prid->passed == 0) echo "Not Yet";if($prid->passed == 1) echo "Pass"; if($prid->passed == 2) echo "Fail"; ?></td>
								<td>
									<a href="#EmailModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">Email</span></a>
									<a href="#SMSModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-primary">SMS</span></a>

									<a href="#PassFailModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Pass/Fail</span></a>
								 
								   <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>

							

						

						<div class="modal fade" id="deleteModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Student</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>student/delete_student/<?php echo $prid->id; ?>/<?php echo $prid->image; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->




							<?php } ?>
						</tbody>
					</table>
					<?php foreach($all_data as $key=> $prid){ ?>
					<div class="modal fade" id="EmailModal<?php echo $prid->id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
				  				<div class="modal-header">
				    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4>Send Email</h4>
				  				</div>
							    <div class="modal-body">
							    	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>student/email" enctype='multipart/form-data'>
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
											<div class="col-lg-10">
												<input type="email" name="email" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->email; ?>" required>

												<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
												
											</div><!-- /.col -->
										</div><!-- /form-group -->	
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Subject</label>
											<div class="col-lg-10">
												<input type="text" name="subject" class="form-control input-sm" id="inputEmail1" required>
												
											</div><!-- /.col -->
										</div><!-- /form-group -->	

										<div class="form-group">
											<label class="col-lg-2 control-label">Description</label>
											<div class="col-lg-10">
												<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"></textarea>					
											</div><!-- /.col -->
										</div><!-- /form-group -->

							    </div>
							    <div class="modal-footer">
							    	<button type="submit" class="btn btn-sm btn-success">Send Mail</button>	
							        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>	
							    </div>
								</form>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<div class="modal fade" id="SMSModal<?php echo $prid->id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
				  				<div class="modal-header">
				    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4>Send SMS</h4>
				  				</div>
							    <div class="modal-body">
							    	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>student/sms" enctype='multipart/form-data'>
										<div class="form-group">
											<label for="inputEmail1" class="col-lg-2 control-label">Phone Number</label>
											<div class="col-lg-10">
												<input type="phone" readonly name="email" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->phone; ?>" required>												
											</div><!-- /.col -->
										</div><!-- /form-group -->
										

										<div class="form-group">
											<label class="col-lg-2 control-label">Description</label>
											<div class="col-lg-10">
												<textarea name="details" placeholder="Enter your text ..." class="form-control" rows="10"></textarea>					
											</div><!-- /.col -->
										</div><!-- /form-group -->

							    </div>
							    <div class="modal-footer">
							    	<button type="submit" class="btn btn-sm btn-success">Send Mail</button>	
							        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>	
							    </div>
								</form>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<div class="modal fade" id="PassFailModal<?php echo $prid->id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
				  				<div class="modal-header">
				    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4>Pass / Fail Student</h4>
				  				</div>
							    <div class="modal-body">
							    	<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>student/passFail" enctype='multipart/form-data'>
										<div class="form-group">
										<label class="col-lg-2 control-label">Status</label>
										<div class="col-lg-10">
											<label class="label-radio inline">
												<input type="radio" name="type" value="1">
												<span class="custom-radio"></span>
												<input type="hidden" name="id" value="<?php echo $prid->id ?>"/>
												Pass
											</label>
											<label class="label-radio inline">
												<input type="radio" name="type" value="2">
												<span class="custom-radio"></span>
												Fail
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

							    </div>
							    <div class="modal-footer">
							    	<button type="submit" class="btn btn-sm btn-success">Send Mail</button>	
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
	