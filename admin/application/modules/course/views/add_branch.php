
<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Course Management</a></li>
					 <li class="active">Add Branches</li>	 
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
							<div class="panel-heading">Add Branch</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" placeholder="Center Name" required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Owner Name</label>
										<div class="col-lg-10">
											<input type="text" name="owner_name" class="form-control input-sm" placeholder="Owner Name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Phone</label>
										<div class="col-lg-10">
											<input type="text" name="phone" class="form-control input-sm" placeholder="Phone Number" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Address</label>
										<div class="col-lg-10">
											<input type="text" name="address" class="form-control input-sm" placeholder="Address" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Branch</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Branch List
							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Owner</th>
										<th>Phone</th>
										<th>Address</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($all_data)> 0){ ?>
									<?php foreach($all_data as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $list->name; ?></td>	
										<td><?php echo $list->owner_name; ?></td>	
										<td><?php echo $list->phone; ?></td>
										<td><?php echo $list->address; ?></td>											
										<td><a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a></td>
									</tr>

									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Astrology Branch</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>course/delete_astrology_branch/<?php echo $list->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
											        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
											    </div>
										  	</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									<?php } } else { ?>
									<tr>
										<td colspan="6" style="color:red;text-align:center">No records found</td>										
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
