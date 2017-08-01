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
					 <li class="active">Add Branch</li>	 
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
							<div class="panel-heading">Add Branch</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

									<div class="form-group">
										<div class="col-md-2">
											<label>Name</label>
										</div>
										<div class="col-md-10">
											<input type="text" name="branch_name" class="form-control" required="required" placeholder="Branch name goes here..">  
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />                
										</div>
					                </div>

					                <div class="form-group">
					                	<div class="col-md-2">
											<label>Place</label>
										</div>
										<div class="col-md-10">
											<input type="text" name="place" class="form-control" required="required" placeholder="Place goes here..">                  
						                </div>
						            </div>
										
						                <div class="form-inline">
											<div class="form-group">
												<div class="col-md-3">
													<label>From</label>												
												</div>
												<div class="col-md-4">
												<select name="time_from" class="form-control" required="required">
													<?php for($i = 1; $i<=12; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php for($j = 5; $j<60; $j = $j+5){ ?>
													<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
													<?php } ?>
													<?php } ?>
												</select>
											</div>
											<div class="col-md-4">
												<select name="time_from_day" class="form-control" required="required">
													<option value="am">AM</option>
													<option value="pm">PM</option>
												</select>
											</div>
											</div>
											<div class="form-group">
												<div class="col-md-3">
													<label>To</label>
												</div>
												<div class="col-md-4">
													<select name="time_to" class="form-control" required="required">
														<?php for($i = 1; $i<=12; $i++){ ?>
														<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
														<?php for($j = 5; $j<60; $j = $j+5){ ?>
														<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
														<?php } ?>
														<?php } ?>
													</select>
												</div>
												<div class="col-md-4">
													<select name="time_to_day" class="form-control" required="required">
														<option value="am">AM</option>
														<option value="pm">PM</option>
													</select>
												</div>
											</div>
										</div>
										<br/>
										<div class="form-group">
											<div class="col-md-2">
												<label>Which Day</label>
											</div>
											<div class="col-md-10">												
												<input type="text" name="day" class="form-control datepicker" required="required" placeholder="Place goes here..">   
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-2">
												<label>Nearby Places</label>
											</div>
											<div class="col-md-10">
												<input type="text" name="nearby_places" class="form-control" required="required" placeholder="Nearby places goes here..">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-2">
												<label>Phone Number</label>
											</div>
											<div class="col-md-10">
												<input type="number" name="phone1" class="form-control" maxlength="10" required="required" placeholder="Phone number goes here..">
											</div>
										</div>
											
										<div class="form-group">
											<div class="col-md-2">
												<label>Phone Number</label>
											</div>
											<div class="col-md-10">
												<input type="number" name="phone2" class="form-control" maxlength="10" placeholder="Phone number goes here.. (optional)">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-2">
												<label>Phone Number</label>
											</div>	
											<div class="col-md-10">
												<input type="number" name="phone3" class="form-control" maxlength="10"  placeholder="Phone number goes here..  (optional)">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-2">
												<label>Phone Number</label>
											</div>
											<div class="col-md-10">
												<input type="number" name="phone4" class="form-control" maxlength="10" placeholder="Phone number goes here..  (optional)">
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-2">
												<label>Person</label>
											</div>
											<div class="col-md-10">
												<input type="number" name="person" class="form-control" maxlength="10" placeholder="No og person goes here..  (optional)">
											</div>
										</div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Branch</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								Acharya Branch List
 							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Day</th>
										<th>Place</th>
										<th>Time</th>
										<th>Phone</th>
										<th>Person</th>
										<th>Nearby Places</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($branch_list)> 0){ ?>
									<?php foreach($branch_list as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $list->branch_name; ?></td>	
										<td><?php echo $list->day; ?></td>		
										<td><?php echo $list->place; ?></td>		
										<td><?php echo $list->time; ?></td>	
										<td><?php echo $list->phone1."<br/>".$list->phone2."<br/>".$list->phone3."<br/>".$list->phone4."<br/>"; ?></td>		
										<td><?php echo $list->person; ?></td>
										<td><?php echo $list->nearby_places; ?></td>	
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
