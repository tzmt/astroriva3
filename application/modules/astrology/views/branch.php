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
                        <span class="active text-primary font13">Branches</span>
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
						<h2>Branches</h2>
					</div>	
					<?php foreach($branch_list as $bran){ ?>
					<?php $image = $this->db->get_where('branch_image',array('branch_id'=>$bran->id))->row()->image;?>	
					<div class="col-md-4" style="border-radius: 5px;padding:5px;">
						<div class="entry-header" style="text-align: left;background: #fff;">
							<a href="<?php echo base_url(); ?>astrology/branches/<?php echo $bran->id; ?>/<?php echo strtolower($bran->name); ?>/details/"><img class="img-responsive" src="<?php echo base_url(); ?>assets/branch/<?php echo $image; ?>" width="100%" alt="<?php echo $bran->name; ?>" /></a>
							<h4><?php echo $bran->name; ?></h4>		
							<p><a href="<?php echo base_url(); ?>astrology/branches/<?php echo $bran->id; ?>/<?php echo strtolower(str_replace(" ", "-", $bran->name)); ?>/details"><button class="btn btn-primary text-center">Read More</button></a></p>						
						</div>						
					</div>
					<?php } ?>
				</div>
			</div>
	</div>
</section>
				
				