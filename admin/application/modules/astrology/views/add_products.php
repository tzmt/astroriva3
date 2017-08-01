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
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>shop/add_products/" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Product Name</label>
										<div class="col-lg-10">
											<input type="text" name="name" class="form-control input-sm" id="inputEmail1" placeholder="Enter your product name" required>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->										

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Select Category</label>
										<div class="col-lg-10">									
											<select name="category_id" class="form-control input-sm" onchange="getSubcategory(this.value)" required>
												<option value="">[Select]</option>
												<?php foreach($category_list as $cat){ ?>
												<option value="<?php echo $cat->id; ?>" ><?php echo $cat->name; ?></option>
												<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group" id="showSub">
										<label for="inputEmail1" class="col-lg-2 control-label">Select Sub Category</label>
										<div class="col-lg-10">									
											<select name="sub_category_id" class="form-control input-sm" id="subCat" required>												
												
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Dimension</label>
										<div class="row">
										<div class="col-lg-3">
											<input type="text" name="dimension1" class="form-control input-sm" id="inputEmail1" placeholder="Dimension 1" required>
										</div>
										<div class="col-lg-3">
											<input type="text" name="dimension2" class="form-control input-sm" id="inputEmail1" placeholder="Dimension 2" required>
										</div>
										<div class="col-lg-3">
											<input type="text" name="dimension3" class="form-control input-sm" id="inputEmail1" placeholder="Dimension 3">
										</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Weight</label>
										<div class="col-lg-10">
											<input type="text" name="weight" class="form-control input-sm" id="inputEmail1" placeholder="Enter weight">
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Specific Gravity</label>
										<div class="col-lg-10">
											<input type="text" name="specific_gravity" class="form-control input-sm" id="inputEmail1" placeholder="Enter specific gravity">
										</div><!-- /.col -->
									</div><!-- /form-group -->	

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Refractive index</label>
										<div class="col-lg-10">
											<input type="text" name="refractive_index" class="form-control input-sm" id="inputEmail1" placeholder="Enter Refractive index">
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">price</label>
										<div class="col-lg-10">
											<input type="text" name="price" class="form-control input-sm" id="inputEmail1" placeholder="Enter price" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Quantity</label>
										<div class="col-lg-10">
											<input type="text" name="quantity" class="form-control input-sm" id="inputEmail1" placeholder="Enter price" required>
										</div><!-- /.col -->
									</div><!-- /form-group -->			

									<div class="form-group">
										<label class="col-lg-2 control-label">Product Type</label>
										<div class="col-lg-10">
											<label class="label-radio inline">
												<input type="radio" name="product_type" value="1">
												<span class="custom-radio"></span>
												Certified
											</label>
											<label class="label-radio inline">
												<input type="radio" name="product_type" value="0">
												<span class="custom-radio"></span>
												Not Certified
											</label>
										</div><!-- /.col -->
									</div><!-- /form-group -->							

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Proceed To Add Image</button>
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
	