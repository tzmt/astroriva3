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
				<div class="col-sm-9">
					<div class="col-sm-12 section-title-two">
						<h2><?php echo $service_name; ?></h2>
					</div>										
					<div class="col-md-12 col-sm-12 blog-content">										
						<div class="entry-header">							
							<img class="img-responsive" src="<?php echo base_url(); ?>assets/services/image/<?php echo $all_data->image; ?>" width="100%" alt="<?php echo $service_name; ?>" />					
										
						</div>
						<div class="entry-post">															
							<h3>Rs: <i class="fa fa-rupee"></i><?php echo $all_data->amount;?></h3>	
						</div>
						<hr/>					
					</div>
				</div>
				<div class="col-sm-3">

					<div class="col-md-12">
		                <h1 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Tips</h1>
		                <hr class="hr_margin">
		                <div class="row common_margin">
		                    <div class="col-xs-12 font16">
		                    <marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start()">
		                        <?php foreach($tips as $tip){ ?>
		                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
		                            <div><img src="<?php echo base_url().'assets/tips/'.$tip->image?>" width="100%"/> &nbsp;</div>
		                            <span class="text-libra"><?php echo $this->db->get_where('rashi_list',array('id'=>$tip->rashi_id))->row()->name; ?></span>:
		                            <span class="text-info"><?php echo strip_tags($tip->description); ?></span>
		                        </p>
		                        <hr class="hr_margin">
		                        <?php } ?>
		                    </marquee>
		                    </div>
		                </div>
		            </div>

				</div>
			</div>
		</div>
	</div>
</section>
				