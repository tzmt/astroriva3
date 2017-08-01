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
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Shop Management</a></li>
					 <li class="active">Add Products</li>	 
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

				<div class="col-md-9">		
					<div class="col-md-12">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Products</div>
							<div class="panel-body">
								
									<div class="form-group">
										<label class="control-label col-lg-2">Dropzone</label>
										<div class="col-lg-10">
											<div class="alert">
												<i class="fa fa-success"></i><span class="m-left-xs">Upload Image for the product: <?php echo $this->uri->Segment(3); ?>.</span>
											</div>
											<form action="<?php echo base_url(); ?>shop/upload_pictures/<?php echo $this->uri->Segment(4); ?>" class="dropzone">
												  <div class="fallback">
													<input name="file" type="file" multiple />
													<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
												  </div>
											</form>
										</div><!-- /.col -->
									</div><!-- /form-group -->						

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<a href="<?php echo base_url(); ?>shop/my_products/"><button type="button" class="btn btn-success btn-sm">Back To Product Listing</button></a>
										</div><!-- /.col -->
									</div><!-- /form-group -->
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
	$('#showSub').hide();
		function getSubcategory(cat_id)
		{
			//alert(cat_id);
			$.ajax({
              type:"POST",
              url:"<?php echo base_url();?>shop/getSubcategory/",
              data:{ cat_id: cat_id},
              success: function (data){
               	//alert(data);
                $('#showSub').show();
                $('#subCat').html(data);
              }
            });
		}
	</script>
	