<section class="home_bg">
	<div class="container">
			<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">
						<h2>SERVICES</h2>
					</div>	
					<?php foreach($all_data as $dat){ ?>
					<div class="col-md-4" style="border-radius: 5px;padding:5px;">
						<div class="entry-header" style="text-align: left;background: #fff;">
							<a href="<?php echo base_url(); ?>services/<?php echo $dat->id; ?>/<?php echo strtolower(str_replace(" ","-",$dat->name)); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/services/image/<?php echo $dat->image; ?>" width="100%" alt="<?php echo $dat->name; ?>" /></a>							
						</div>
						<div class="entry-body">
							<h4><?php echo $dat->name; ?></h4>		
							<p><a href="<?php echo base_url(); ?>ayurved/details/<?php echo strtolower(str_replace(" ", "-", $dat->name)); ?>"><button class="btn btn-primary text-center">Read More</button></a></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
	</div>
</section>
				