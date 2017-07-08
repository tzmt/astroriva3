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
				<div class="col-md-9 col-sm-7 blog-content">					
					<div class="entry-header">										
						<h3></h3>						
					</div>
					<div class="entry-post">
						<table class="table table-bordered">							
							<tr>
								<td style="">Name</td>
								<td><?php echo $all_data->name; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $all_data->email; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?php echo $all_data->phone; ?></td>
							</tr>
							<tr>
								<td>Education</td>
								<td><?php echo $all_data->education; ?></td>
							</tr>
							<tr>
								<td>Specialization</td>
								<td><?php echo $all_data->specialization; ?></td>
							</tr>
							<tr>
								<td>Experience</td>
								<td><?php echo $all_data->experience; ?></td>
							</tr>
							<tr>
								<td>Details</td>
								<td><?php echo $all_data->details; ?></td>
							</tr>
						</table>
						
					</div>
					
									
							
				</div>
				</div>
		</div>
	</section>
				