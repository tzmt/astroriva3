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
					 <li class="active">Service Request</li>	 
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
							<div class="panel-heading">
								Horoscope Branch List
 							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>D.O.B</th>
										<th>T.O.B</th>
										<th>P.O.B</th>
										<th>City</th>
										<th>Comments</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($horoscopre)> 0){ ?>
									<?php foreach($horoscopre as $key => $list) { ?>
									<tr <?php if($list->status == 0){echo 'style="color:red !important;"';} ?>>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $list->name1; ?></td>	
										<td><?php echo $list->dob1; ?></td>		
										<td><?php echo $list->tob1; ?></td>
										<td><?php echo $list->pob1; ?></td>		
										<td><?php echo $list->city1; ?></td>													
										<td><?php echo $list->comments; ?></td>
										<td><a href="#replyModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-success">Reply</span></a>
											<a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a></td>
									</tr>

									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Service Request</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>acharya/delete_request/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->

									<div class="modal fade" id="replyModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Predict Service Request</h4>
								  				</div>
											    <div class="modal-body">
											        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
															<div class="col-lg-10">
																<input type="text" name="email" class="form-control input-sm" id="inputEmail1" value="<?php echo $list->email; ?>" required>
																<input type="hidden" name="id" value="<?php echo $list->id; ?>"/>
																<input type="hidden" name="purpose" value="<?php echo $list->purpose; ?>"/>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Prediction</label>
															<div class="col-lg-10">
																<textarea name="answers" placeholder="Enter your text ..." class="form-control" rows="10" required><?php echo $list->answers; ?></textarea>					
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>      
											    </div>
											    <div class="modal-footer">
											        <button type="submit" class="btn btn-sm btn-success" aria-hidden="true">Submit</button></button>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
											    </div>
											</form>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->

									<?php } } else { ?>
									<tr>
										<td colspan="8" style="color:red;text-align:center">No records found</td>										
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-7">
						<div class="panel panel-default">
							<div class="panel-heading">
								Match Making List
 							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>D.O.B</th>
										<th>T.O.B</th>
										<th>P.O.B</th>
										<th>City</th>
										<th>Comments</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($matchmaking)> 0){ ?>
									<?php foreach($matchmaking as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td>Partner 1: <?php echo $list->name1; ?><br/>Partner 2: <?php echo $list->name2; ?></td>	
										<td>D.O.B 1: <?php echo $list->dob1; ?><br/>D.O.B 2: <?php echo $list->dob2; ?></td>		
										<td>T.O.B 1: <?php echo $list->tob1; ?><br/>T.O.B 2: <?php echo $list->tob2; ?></td>
										<td>P.O.B 1: <?php echo $list->pob1; ?><br/>P.O.B 2: <?php echo $list->pob2; ?></td>		
										<td>City: <?php echo $list->city1; ?><br/>City 2: <?php echo $list->city2; ?></td>													
										<td><?php echo $list->comments; ?></td>
										<td><a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a></td>
									</tr>

									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Branch</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>acharya/delete_branch/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->

									<div class="modal fade" id="replyModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Predict Service Request</h4>
								  				</div>
											    <div class="modal-body">
											        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Email</label>
															<div class="col-lg-10">
																<input type="text" name="email" class="form-control input-sm" id="inputEmail1" value="<?php echo $list->email; ?>" required>
																<input type="hidden" name="id" value="<?php echo $list->id; ?>"/>
																<input type="hidden" name="purpose" value="<?php echo $list->purpose; ?>"/>
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>

														<div class="form-group">
															<label for="inputEmail1" class="col-lg-2 control-label">Prediction</label>
															<div class="col-lg-10">
																<textarea name="answers" placeholder="Enter your text ..." class="form-control" rows="10" required><?php echo $list->answers; ?></textarea>					
															</div><!-- /.col -->
														</div><!-- /form-group --><br/>      
											    </div>
											    <div class="modal-footer">
											        <button type="submit" class="btn btn-sm btn-success" aria-hidden="true">Submit</button></button>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">Cancel</button>
											    </div>
											</form>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<?php } } else { ?>
									<tr>
										<td colspan="8" style="color:red;text-align:center">No records found</td>										
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
