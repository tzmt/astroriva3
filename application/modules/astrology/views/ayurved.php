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
                        <span class="active text-primary font13">Ayurved</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">
			<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">
						<h2>AYURVED</h2>
					</div>	
					<?php foreach($all_data as $dat){ ?>
					<div class="col-md-4" style="border-radius: 5px;padding:5px;">
						<div class="entry-header" style="text-align: left;background: #fff;">
							<a href="<?php echo base_url(); ?>ayurved/details/<?php echo strtolower(str_replace(" ", "-", $dat->topic)); ?>"><img class="img-responsive" src="<?php echo base_url(); ?>assets/ayurved/<?php echo $dat->image; ?>" width="100%" alt="<?php echo $dat->topic; ?>" /></a>							
						</div>
						<div class="entry-body">
							<h4><?php echo $dat->topic; ?></h4>		
							<p><a href="<?php echo base_url(); ?>ayurved/details/<?php echo strtolower(str_replace(" ", "-", $dat->topic)); ?>"><button class="btn btn-primary text-center">Read More</button></a></p>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
	</div>
</section>
				