<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>astrologer/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Upload Products</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>	
	<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>									
				<div class="col-md-9 col-sm-7 blog-content">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3></h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<form id="comment-form" class="row" name="comment-form" method="post" action="" enctype="multipart/form-data">

									<div class="col-md-12">

										<div class="form-group">
											<label>Name</label>
											<input type="text" name="name" class="form-control" required="required" placeholder="Product name goes here..">
										</div>

										<div class="form-group">
											<label>Select Category</label>
											<select class="form-control" required="required" name="category_id" onchange="getSubcat(this.value)">
												<option value="">[select]</option>
												<?php foreach($category as $cat){ ?>
													<option value="<?php echo $cat->id ?>"><?php echo $cat->name; ?></option>
												<?php } ?>
											</select>	
										</div>

										<div class="form-group" id="showsub">
											<label>Select SubCategory</label>
											<select class="form-control" required="required" name="sub_category_id" id="showSubcat">
												<option value="">[select]</option>
											</select>	
										</div>

										

						                <div class="form-group">
											<label>Dimension</label>
											<div class="row">
												<div class="col-md-4"><input type="text" name="dimension1" class="form-control" placeholder="Length.."></div>
												<div class="col-md-4"><input type="text" name="dimension2" class="form-control" placeholder="Width"></div>
												<div class="col-md-4"><input type="text" name="dimension3" class="form-control"  placeholder="Height"></div>
											</div>
											
										</div>
										

										<div class="form-group">
											<label>Weight</label>
											<input type="text" name="weight" class="form-control" placeholder="Weight goes here..">
										</div>

										<div class="form-group">
											<label>Specific Gravity</label>
											<input type="text" name="specific_gravity" class="form-control" placeholder="Specific category goes here..">
										</div>

										<div class="form-group">
											<label>Refractive Index</label>
											<input type="text" name="refractive_index" class="form-control" placeholder="Refractive Index goes here..">
										</div>

										<div class="form-group">
											<label>Price</label>
											<input type="text" name="price" class="form-control" required="required" placeholder="Price goes here..">
										</div>

										<div class="form-group">
											<label>Quantity</label>
											<input type="number" name="quantity" class="form-control" required="required" placeholder="Quantity goes here.." min="1">
										</div>

										<div class="form-group">
											<label>Details</label>
											<textarea name="details" class="form-control" required="required" placeholder="Product details goes here.."></textarea>
										</div>

										<div class="form-group">
											<label>Upload Image</label>
											<input type="file" name="file[]" class="form-control" multiple="multiple">
										</div>
									</div>
									
									<div class="col-md-12">									
										
										<div class="form-group">
											<button type="submit" class="btn btn-primary pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->					
				</div>
			</div>
		</div>
	</section>
<script>

function getSubcat(id)
{
	$.ajax({
      type:"POST",
      url:"<?php echo base_url();?>astrologer/getSubCategory/",
      data:{ id: id},
      success: function (data){
        //alert(data);
        $('#showSubcat').html(data);
      }
    });
}


</script>