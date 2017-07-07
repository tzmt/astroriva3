<section class="home_bg">
	<div class="container">
		<div id="team" style="margin-top:50px;">

			<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">

						<h2>OUR <?php echo strtoupper($this->uri->segment(3)); ?> ASTROLOGERS</h2>

						<p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere.</p>

					</div>				
					<div class='row'>
					<?php $i = 1; foreach($astrologers as $ast){ ?>				
					
						<div class="col-md-2" style="margin-bottom: 10px;">
							<div class="team-member">
								<div class="col-md-12" style="margin-bottom: 15px;">
									<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
								</div>
								<div class="member-text">			
									<h5><?php echo $ast->name; ?></h5>
									<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
								</div>						
							</div>
						</div>
					<?php if($i%6 == 0){ echo "</div><div class='row'>";} ?>

					<?php $i++; } ?>	

					

				</div>

			</div>

		</div><!-- #/ Team  -->
	</div>
</section>