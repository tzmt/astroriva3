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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Acharya Management</a></li>
					 <li class="active">Acharya Details</li>	 
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
					<div class="col-md-4">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Acharya Details</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" value="<?php if(isset($all_data->name)) echo $all_data->name; ?>" placeholder="Name" required>
											<input type="hidden" name="image" value="<?php  if(isset($all_data->name)) echo $all_data->image; ?>"/>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Phone Number</label>
										<div class="col-lg-10">
											<input type="number" name="phone" class="form-control input-sm" id="inputEmail1" value="<?php if(isset($all_data->phone)) echo $all_data->phone; ?>" placeholder="Phone Number" maxlength="10" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Details 1</label>
										<div class="col-lg-10">
											<textarea name="details1" class="form-control input-sm" rows="5" required><?php if(isset($all_data->name)) echo $all_data->details1; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Details 2</label>
										<div class="col-lg-10">
											<textarea name="details2" class="form-control input-sm" rows="5" required><?php if(isset($all_data->name)) echo $all_data->details2; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Details 3</label>
										<div class="col-lg-10">
											<textarea name="details3" class="form-control input-sm" rows="5" required><?php if(isset($all_data->name)) echo $all_data->details3; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Details 4</label>
										<div class="col-lg-10">
											<textarea name="details4" class="form-control input-sm" rows="5" required><?php if(isset($all_data->name)) echo $all_data->details4; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Details 5</label>
										<div class="col-lg-10">
											<textarea name="details5" class="form-control input-sm" rows="5" required><?php if(isset($all_data->name)) echo $all_data->details5; ?></textarea>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Upload Picture</label>
										<div class="col-lg-10">
											<img src="<?php echo SITE_URL; ?>assets/acharya/<?php echo $all_data->image; ?>" width="50px"/>
											<input type="file" name="file" class="form-control input-sm">	

										</div><!-- /.col -->

									</div><!-- /form-group -->



									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Update Details</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								Acharya Comments
 							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Message</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($comments_list)> 0){ ?>
									<?php foreach($comments_list as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $list->name; ?></td>		
										<td><?php echo $list->email; ?></td>		
										<td><?php echo $list->comments; ?></td>		

										<td><a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a></td>
									</tr>

									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Comments</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>acharya/delete_comments/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<?php } } else { ?>
									<tr>
										<td colspan="5" style="color:red;text-align:center">No records found</td>										
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
