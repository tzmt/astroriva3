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
                        <span class="font13">Yoga</span>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13"><?php echo $all_data->topic; ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">
		<div class="container padding-bottom">
			<div class="row">
				<div class="col-sm-8">
					<div class="col-sm-12 section-title-two">
						<h2><?php echo $all_data->topic; ?></h2>
					</div>										
					<div class="entry-header">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/yoga/<?php echo $all_data->image; ?>" width="100%" alt="<?php echo $all_data->topic; ?>" />
					</div>
					<div class="entry-post" style="padding-top: 20px;">															
						<p><?php echo $all_data->details;?></p>						
						
					</div>
				</div>
				<div class="col-sm-4">

					<div class="col-md-12">
		                <h1 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Tips</h1>
		                <hr class="hr_margin">
		                <div class="row common_margin">
		                    <div class="col-xs-12 font16">
		                    <?php foreach($tips as $tip){ ?>
	                        <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
	                            <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle"  width="50px" height="50px"></div>
	                            <div class="col-md-9">
	                            	<span style="color:#e36480"><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $tip->astrologers_id; ?>/details"><?php echo $tip->name; ?></a></span><br/>
	                            	<span><strong><?php echo $tip->topic; ?></strong></span><br/>
	                            	<span><?php echo substr($tip->description,0,50)." &nbsp;<a href='".base_url()."astrology/".$tip->rashi_name."/tips-and-remedy'><strong>Read More...</strong></a>"; ?></span>
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
				