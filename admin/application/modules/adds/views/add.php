<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a> Ads Management</a></li>
					 <li class="active">Add Adds</li>	 
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
					<div class="col-md-5">						
						<div class="panel panel-default">
							<div class="panel-heading">Create Ads</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>adds/" enctype="multipart/form-data">

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Title</label>
										<div class="col-lg-10">
											<input type="text" name="title" class="form-control input-sm" placeholder="Title goes here..." required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Url</label>
										<div class="col-lg-10">
											<input type="text" name="url" class="form-control input-sm"  placeholder="Url goes here..." required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Image</label>
										<div class="col-lg-10">											
											<input type="file" name="userfile" class="form-control input-sm"  required>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Image</label>
										<div class="col-lg-10">	
											<select name="point" class="form-control input-sm" required>
												<option value="">[Select Postion]</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->									

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Ads</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->	
					<div class="col-md-7">
					<div class="panel panel-default">
						<div class="panel-heading">Ads List</div>
						<div class="panel-body">
							<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Image</th>
								<th>Title</th>								
								<th>Url</th>
								<th>Position</th>								
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $cat){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><img src="<?php echo SITE_URL; ?>assets/ads/<?php echo $cat->image; ?>" width="50" height="50" /></td>
								<td><?php echo $cat->title; ?></td>								
								<td><?php echo $cat->url; ?></td>
								<td><?php echo $cat->point; ?></td>
								<td><a href="#deleteModal<?php echo $cat->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
								
								<div class="modal fade" id="deleteModal<?php echo $cat->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete Ads Text</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>adds/delete_banner/<?php echo $cat->id; ?>/<?php echo $cat->image; ?>/"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div>
								</div>
							</div>
								
							</tr>
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
