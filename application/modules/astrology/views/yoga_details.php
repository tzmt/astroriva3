<section class="home_bg">
	<div class="container">
		<div class="container padding-bottom">
			<div class="row">
				<div class="col-sm-9">
					<div class="col-sm-12 section-title-two">
						<h2><?php echo $all_data->topic; ?></h2>
					</div>										
					<div class="entry-header">
						<img class="img-responsive" src="http://www.astroriva.com/assets/yoga/<?php echo $all_data->image; ?>" width="100%" alt="<?php echo $all_data->topic; ?>" />
					</div>
					<div class="entry-post" style="padding-top: 20px;">															
						<p><?php echo $all_data->details;?></p>						
						
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
				