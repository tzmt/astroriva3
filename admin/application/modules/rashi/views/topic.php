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
					 <li class="active">Add Topic</li>	 
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
							<div class="panel-heading">Add Topic</div>
							<div class="panel-body">
							<?php
								$id = $this->uri->segment(3);
								if(isset($id)){
							?>
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/edit_topic/<?php echo $id; ?>">
							<?php } else { ?>
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/topic/<?php echo $id; ?>">
							<?php } ?>
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Topic Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" value="<?php if(isset($topic->name)) echo $topic->name; ?>" class="form-control input-sm" id="inputEmail1" placeholder="Name" required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->
									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<?php											
											if(isset($id)) { ?>
												<button type="submit" class="btn btn-success btn-sm">Update Topic</button>
											<?php } else { ?>
												<button type="submit" class="btn btn-success btn-sm">Add Topic</button>
											<?php } ?>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Topic List
							</div>							
							<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>	
								<?php //print_r($topic_list); ?>								
									<?php if(count($topic_list)> 0){ ?>
									<?php foreach($topic_list as $key => $list) { ?>
									<tr>
										<td><?php echo $key+1; ?></td>
										<td><?php echo $list->name; ?></td>										
										<td><a href="<?php echo base_url(); ?>rashi/edit_topic/<?php echo $list->id; ?>"><span class="badge badge-primary">Edit</span></a> | <a href="<?php echo base_url(); ?>rashi/delete_topic/<?php echo $list->id; ?>"><span class="badge badge-danger">Delete</span></a></td>
									</tr>
									<?php } } else { ?>
									<tr>
										<td colspan="3" style="color:red;text-align:center">No records found</td>										
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


	<script src="<?php echo ASSETS; ?>js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo ASSETS; ?>bootstrap/js/bootstrap.min.js"></script>
	<!-- Mask-input -->
	<script src='<?php echo ASSETS; ?>js/jquery.maskedinput.min.js'></script>	

	<!-- Datepicker -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-timepicker.min.js'></script>	
	
	<!-- Slider -->
	<script src='<?php echo ASSETS; ?>js/bootstrap-slider.min.js'></script>	
	
	<!-- Tag input -->
	<script src='<?php echo ASSETS; ?>js/jquery.tagsinput.min.js'></script>	

	<!-- WYSIHTML5 -->
	<script src='<?php echo ASSETS; ?>js/wysihtml5-0.3.0.min.js'></script>	
	<script src='<?php echo ASSETS; ?>js/uncompressed/bootstrap-wysihtml5.js'></script>	

	<!-- Dropzone -->
	<script src='<?php echo ASSETS; ?>js/dropzone.min.js'></script>	