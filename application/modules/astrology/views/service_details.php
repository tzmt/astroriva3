<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>services" class="font13">Services</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13"><?php echo $service_name; ?></span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>

<section class="">
	<div class="container">
		<div class="container padding-bottom">
			<div class="row">
				<div class="col-sm-8">
					<div class="col-sm-12 section-title-two">
						<h2><?php echo $service_name; ?></h2>
					</div>										
					<div class="col-md-12 col-sm-12 blog-content">	
						<div class="row">
							<div class="col-md-8">									
								<div class="entry-header">							
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/services/image/<?php echo $all_data->image; ?>" width="100%" alt="<?php echo $service_name; ?>" />	
								</div>
							</div>

							<div class="col-md-4">									
								<div class="entry-header">							
									<img class="img-responsive" src="<?php echo base_url(); ?>assets/images/pay.png" width="100%" alt="<?php echo $service_name; ?>" />	
								</div>
							</div>
						</div>

						<div class="entry-post" style="margin-top: 25px;">															
							<p><?php echo $all_data->description;?></p>	
						</div>
						<div class="entry-post">															
							<h3>Rs: <i class="fa fa-rupee"></i><?php echo $all_data->amount;?></h3>	
						</div>
						<hr/>					
					</div>
				</div>
				<div class="col-sm-4">

					<div class="col-md-12">
		                <h1 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Tips</h1>
		                <hr class="hr_margin">
		                <div class="row common_margin">
		                    <div class="col-xs-12">
		                    <?php foreach($tips as $tip){ ?>
			                        <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
			                            <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle"></div>
			                            <div class="col-md-9">
			                            	<span style="color:#e36480"><?php echo $tip->name; ?></span><br/>
			                            	<span><strong><?php echo $tip->topic; ?></strong></span><br/>
			                            	<span><?php echo substr($tip->description,0,30); ?> &nbsp; <a href="<?php echo base_url(); ?>/astrology/<?php echo $tip->rashi_name; ?>/tips-and-remedy"><strong>Read More...</strong></a></span>
			                            </div>
			                        </div>

		                        <?php } ?>
		                    </div>
		                </div>
		            </div>

				</div>
			</div>
		</div>
	</div>
</section>
				