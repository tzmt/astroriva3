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
					 <li class="active">Add Remedy</li>	 
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
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/remedy/" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Rashi</label>
										<div class="col-lg-10">									
											<select name="rashi_id" class="form-control input-sm">
											<?php foreach($rashi_list as $rashi){ ?>
												<option value="<?php echo $rashi->id; ?>" ><?php echo $rashi->name; ?></option>
											<?php } ?>
											</select>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Remedy Type</label>
										<div class="col-lg-10">									
											<select name="remedy_type" class="form-control input-sm">
												<option value="Stone" >STONE</option>
												<option value="Gem" >GEM</option>
												<option value="Mantra" >MANTRA</option>
												<option value="Yantra" >YANTRA</option>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Specification</label>
										<div class="col-lg-10">
											<input type="text" name="specification" class="form-control input-sm"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Price</label>
										<div class="col-lg-10">
											<input type="text" name="price" class="form-control input-sm"/>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Remedy</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Remedy List
							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Rashi</th>
										<th>Remedy Type</th>
										<th>Specification</th>
										<th>Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($remedy_list)> 0){ ?>
									<?php foreach($remedy_list as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $this->rashi_model->getRashiNameFromId($list->rashi_id); ?></td>
										<td><?php echo $list->remedy_type; ?></td>										
										<td><?php echo $list->specification; ?></td>										
										<td><?php echo $list->price; ?></td>										
										<td>
											<a href="#simpleModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-warning">Edit</span></a>
											<a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a>
										</td>
									</tr>

									


									<?php } } else { ?>
									<tr>
										<td colspan="6" style="color:red;text-align:center">No records found</td>										
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div><!-- /panel -->
					</div><!-- /.col -->
					<?php foreach($remedy_list as $key => $list) { ?>
					<div class="modal fade" id="simpleModal<?php echo $list->id; ?>">
						<div class="modal-dialog">
							<div class="modal-content">
				  				<div class="modal-header">
				    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4>Edit Rashi Remedy</h4>
				  				</div>
							    <div class="modal-body">
							        <div class="panel-body">
										<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/edit_remedy/" enctype="multipart/form-data">
											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Rashi</label>
												<div class="col-lg-10">									
													<select name="rashi_id" class="form-control input-sm">
													<?php foreach($rashi_list as $rashi){ ?>
														<option value="<?php echo $rashi->id; ?>" ><?php echo $rashi->name; ?></option>
													<?php } ?>
													</select>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Remedy Type</label>
												<div class="col-lg-10">									
													<select name="remedy_type" class="form-control input-sm">
														<option value="Stone" >STONE</option>
														<option value="Gem" >GEM</option>
														<option value="Mantra" >MANTRA</option>
														<option value="Yantra" >YANTRA</option>
													</select>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Specification</label>
												<div class="col-lg-10">
													<input type="text" name="specification" class="form-control input-sm" value="<?php echo $list->specification; ?>"/>
													<input type="hidden" name="id" class="form-control input-sm" value="<?php echo $list->id; ?>"/>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Price</label>
												<div class="col-lg-10">
													<input type="text" name="price" class="form-control input-sm"  value="<?php echo $list->price; ?>"/>
												</div><!-- /.col -->
											</div><!-- /form-group -->
										
									</div>
							    </div>
							    <div class="modal-footer">
							    	<button class="btn btn-sm btn-success" aria-hidden="true">Save Changes</button>	
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
									<h4>Delete Rashi Remedy</h4>
				  				</div>
							    <div class="modal-body">
							        <p>Are you sure you want to delete this item?</p>	        
							    </div>
							    <div class="modal-footer">
							        <a href="<?php echo base_url(); ?>rashi/delete_remedy/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
							        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
							    </div>
						  	</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->


					<?php } ?>
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->
