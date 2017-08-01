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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Astrology Management</a></li>
					 <li class="active">Add Branch</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<div class="padding-md">
				<div class="row">	
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success">
						<strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>
					</div>
					<?php } ?>
					<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger">
						<strong>Oh snap!</strong> <?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php } ?>	
				<?php
					$csrf = array(
					        'name' => $this->security->get_csrf_token_name(),
					        'hash' => $this->security->get_csrf_hash()
					);
				?>		
				<div class="col-md-7">		
					<div class="col-md-12">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Branch</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>astrology/add_branch/" enctype="multipart/form-data">			<div class="form-group">
									
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your branch name" required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label class="col-lg-2 control-label">Details</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="details" placeholder="Enter your text ..." class="form-control" rows="10"></textarea>					
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
				</div>							
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
		$('.dblclick').dblclick(function(){
			var name = $(this).attr('name');
			var id = $(this).attr('id');
			$(this).html(name);
			$(this).html('<input type="text" id="new_value" value="'+name+'"/><i');
			//alert(name + id);
			
		});
	</script>
	