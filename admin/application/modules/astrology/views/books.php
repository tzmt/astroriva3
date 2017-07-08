
<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Astrology Management</a></li>
					 <li class="active">Add Astrology Books</li>	 
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
					<div class="col-md-4">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Books</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Author</label>
										<div class="col-lg-10">
											<input type="text" name="author" class="form-control input-sm" id="inputEmail1" placeholder="Author Name" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Rashi</label>
										<div class="col-lg-10">											
											<select name="rashi" class="form-control input-sm" required>
												<option value="">[--Select Rashi--]</option>
												<?php
													$q = $this->db->get('rashi_list')->result();
													foreach($q as $q1){?>
													<option value="<?php echo $q1->id ?>"><?php echo $q1->name; ?></option>
													<?php } ?>
												?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Image</label>
										<div class="col-lg-10">
											<input type="file" name="file" class="form-control input-sm" id="inputEmail1" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Pdf</label>
										<div class="col-lg-10">
											<input type="file" name="book" class="form-control input-sm" id="inputEmail1" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Add Books</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								Books List
							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Image</th>
										<th>Rashi</th>
										<th>Name</th>
										<th>Author</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>									
									<?php if(count($all_data)> 0){ ?>
									<?php foreach($all_data as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><img src="<?php echo SITE_URL."assets/books/image/".$list->image; ?>" width="50px"/></td>
										<td><?php echo $this->astrology_model->getRashiName($list->rashi); ?></td>
										<td><?php echo $list->name; ?></td>
										<td><?php echo $list->author; ?></td>										
										<td>
										<a href="<?php echo SITE_URL."assets/books/pdf/".$list->file; ?>" role="button" data-toggle="modal"><span class="badge badge-primary">Download</span></a>

											<a href="#deleteModal<?php echo $list->id; ?>" role="button" data-toggle="modal"><span class="badge badge-danger">Delete</span></a>
										</td>
									</tr>

									<div class="modal fade" id="deleteModal<?php echo $list->id; ?>">
										<div class="modal-dialog">
											<div class="modal-content">
								  				<div class="modal-header">
								    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4>Delete Books</h4>
								  				</div>
											    <div class="modal-body">
											        <p>Are you sure you want to delete this item?</p>	        
											    </div>
											    <div class="modal-footer">
											        <a href="<?php echo base_url(); ?>astrology/delete_books/<?php echo $list->id; ?>/<?php echo $list->image; ?>/<?php echo $list->file; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
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
