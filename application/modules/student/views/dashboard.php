<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>student/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Dashboard</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>	

	<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>

			<div class="col-sm-9 padding-right">					
					<div class="entry-header">										
						<h3>DETAILS</h3>						
					</div>
					

					<table class="table table-bordered">
	                    <tr>
	                        <td><strong>Name</strong></td>
	                        <td><?php echo $all_data->name; ?></td>
	                    </tr>
	                    <tr>
	                        <td><strong>Email</strong></td>
	                        <td><?php echo $all_data->email; ?></td>
	                    </tr>	                    
	                    <tr>
	                        <td><strong>Phone</strong></td>
	                        <td><?php echo $all_data->phone; ?></td>
	                    </tr>	                    
	                    <tr>
	                        <td><strong>Date Of Birth</strong></td>
	                        <td><?php echo $all_data->dob; ?></td>
	                    </tr>	                    
	                    <tr>
	                        <td><strong>Time Of Birth</strong></td>
	                        <td><?php echo $all_data->tob; ?></td>
	                    </tr>
	                    <tr>
	                        <td><strong>Place Of Birth</strong></td>
	                        <td><?php echo $all_data->pob; ?></td>
	                    </tr>
                	</table>
					
								
			</div>
		</div>
	</div>		
	</section>

