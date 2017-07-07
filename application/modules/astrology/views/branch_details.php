	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<div class="col-sm-6">
								<?php $image = $this->db->get_where('branch_image',array('branch_id'=>$all_data->id))->row()->image; ?>
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/branch/<?php echo $image; ?>" alt="" />
							</div>
							<div class="col-sm-6">
								<div class="product-details">
									<h3 class="product-name" style="color:#a704a5"><?php echo $all_data->name; ?></h3>									
									<div class="product-info">										
										<?php echo $all_data->details; ?>									
										<br/>										
									</div>
								</div>
							</div>							
						</div>
					</div>					
			</div>
		</div>
	</div><!-- #/ Director's Section -->
</div>
</div>
</section>
		
	
	
	

	