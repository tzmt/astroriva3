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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> News Management</a></li>
					 <li class="active">News List</li>	 
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
						News List						
					</div>					
					<table class="table table-striped" id="responsiveTable">
						<thead>
							<tr>								
								<th>#</th>
								<th>Category</th>
								<th>Astrologer</th>
								<th>Image</th>
								<th>Date From</th>
								<th>Date To</th>
								<th>Desctiption</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($all_data as $key=> $prid){ ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $this->news_model->getCategoryName($prid->category_id); ?></td>
								<td><?php if($prid->type == 1) echo "Admin"; else echo $this->news_model->getAstrologerNameFromId($prid->astrologers_id); ?></td>
								<td><img src="<?php echo SITE_URL; ?>assets/news/<?php echo $prid->image; ?>" width="100px" /></td>
								<td><?php echo $prid->date_from ?></td>
								<td><?php echo $prid->date_to ?></td>
								<td><strong>Topic:</strong> <?php echo $prid->topic; ?><br/><?php echo substr($prid->description,0,50); ?></td>
								<td><a href="#simpleModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-success">View</span></a> <a href="#simpleEditModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-warning">Edit</span></a>  <a href="#deleteModal<?php echo $prid->id; ?>" role="button" data-toggle="modal"><span class="label label-danger">Delete</span></a></td>
							</tr>

							<div class="modal fade" id="simpleModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>View News</h4>
						  				</div>
									    <div class="modal-body">
									        <p><img src="<?php echo SITE_URL; ?>assets/news/<?php echo $prid->image; ?>" width="100%" /></p>
									        <p><strong>Astrologer: </strong><?php if($prid->type == 1) echo "Admin"; else echo $this->news_model->getAstrologerNameFromId($prid->astrologer_id); ?></p>
									        <p><strong>Date From: </strong><?php echo $prid->date_from; ?></p>
									        <p><strong>Date To: </strong><?php echo $prid->date_to; ?></p>
									        <p><strong>Topic: </strong><?php echo $prid->topic ?></p>
									        <p><strong>Description: </strong><?php echo $prid->description ?></p>
									    </div>
									    <div class="modal-footer">
									        <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>	
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

						<div class="modal fade" id="simpleEditModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
								<div class="modal-content">
					  				<div class="modal-header">
					    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4>Edit News</h4>
					  				</div>
								    <div class="modal-body">
								       <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>news/active_news/" enctype="multipart/form-data">
											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Category</label>
												<div class="col-lg-10">									
													<select name="category_id" class="form-control input-sm" required>
													<?php foreach($category_list as $cat){ ?>
														<option value="<?php echo $cat->id; ?>" ><?php echo $cat->name; ?></option>
													<?php } ?>
													</select>
													<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label class="control-label col-lg-2">Image</label>
												<div class="col-lg-10">
													<div class="upload-file">
														<input type="file" name="userfile" id="upload-demo" class="upload-demo">
														<input type="hidden" name="pred_id" value="<?php echo $prid->id; ?>"/>
														<input type="hidden" name="old_image" value="<?php echo $prid->image; ?>"/>
														<input type="hidden" name="type" value="<?php echo $prid->type; ?>"/>
														<input type="hidden" name="astrologers_id" value="<?php echo $prid->astrologers_id; ?>"/>
														<label data-title="Select file" for="upload-demo">
															<span data-title="No file selected..."></span>
														</label>														
													</div>													
												</div><!-- /.col -->
												<img src="<?php echo SITE_URL; ?>assets/news/<?php echo $prid->image; ?>" width="100px" style="margin-top: 13px;margin-left: 17px;"/>
											</div><!-- /form-group -->

											<div class="form-group">
												<label class="col-lg-2 control-label">Date From</label>
												<div class="col-lg-10">
													<div class="input-group">
														<input type="text" name="date_from" value="<?php echo  $prid->date_from; ?>" class="datepicker form-control" required>
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													</div>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label class="col-lg-2 control-label">Date To</label>
												<div class="col-lg-10">
													<div class="input-group">
														<input type="text" name="date_to" value="<?php echo  $prid->date_to; ?>" class="datepicker form-control" required>
														<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													</div>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label for="inputEmail1" class="col-lg-2 control-label">Topic</label>
												<div class="col-lg-10">
													<input type="text" name="topic" class="form-control input-sm" id="inputEmail1" value="<?php echo $prid->topic; ?>" placeholder="Enter your topic" required>
												</div><!-- /.col -->
											</div><!-- /form-group -->

											<div class="form-group">
												<label class="col-lg-2 control-label">Description</label>
												<div class="col-lg-10">
													<textarea id="wysihtml5-textarea" name="description" placeholder="Enter your text ..." class="form-control" rows="10" required><?php echo  $prid->description; ?></textarea>					
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

						<div class="modal fade" id="deleteModal<?php echo $prid->id; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
						  				<div class="modal-header">
						    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4>Delete News</h4>
						  				</div>
									    <div class="modal-body">
									        <p>Are you sure you want to delete this item?</p>	        
									    </div>
									    <div class="modal-footer">
									        <a href="<?php echo base_url(); ?>news/delete_news/<?php echo $prid->id; ?>"><button class="btn btn-sm btn-success" aria-hidden="true">Yes</button></a>	
									        <button class="btn btn-sm btn-danger" data-dismiss="modal" aria-hidden="true">No</button>
									    </div>
								  	</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->




							<?php } ?>
						</tbody>
					</table>
					<?php echo $links; ?>	


					<!-- <div class="panel-footer clearfix">
						<ul class="pagination pagination-xs m-top-none pull-right">
							<li class="disabled"><a href="#">Previous</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div> -->
				</div><!-- /panel -->
					</div><!-- /.col -->					
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->


	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Mask-input -->
	