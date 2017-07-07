<section class="home_bg">
	<div class="container">
			<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">
						<h2>YOGA</h2>
					</div>				
					<?php foreach($all_data as $dat){ ?>
					<div class="col-md-4" style="border-radius: 5px;padding:5px;">
						<div class="entry-header" style="text-align: left;background: #fff;">
							<a href="<?php echo base_url(); ?>yoga/details/<?php echo strtolower(str_replace(" ", "-", $dat->topic)); ?>"><img class="img-responsive" src="http://www.astroriva.com/assets/yoga/<?php echo $dat->image; ?>" width="100%" alt="<?php echo $dat->topic; ?>" /></a>							
						</div>
						<div class="entry-body">
							<h4><?php echo $dat->topic; ?></h4>		
							<p><a href="<?php echo base_url(); ?>yoga/details/<?php echo strtolower(str_replace(" ", "-", $dat->topic)); ?>"><button class="btn btn-primary text-center">Read More</button></a></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
	</div>
</section>
				