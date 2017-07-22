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
                        <span class="active text-primary font13">Gallery</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">	
		<div id="message">
			<div class="container padding-top padding-bottom">
				<div class="text-center">
					<div class="section-title-two">
						<h2>Gallery</h2>
						<p>Some of our sweet memories to share...</p>
					</div>	
				</div>
				<div class="row">
					<?php foreach($gallery as $gal){ ?>
					<div class="col-md-3" style="margin-bottom: 20px;overflow-y: hidden;">
						<a href="<?php echo base_url(); ?>assets/gallery/<?php echo $gal->image; ?>" data-fancybox="gallery"><img src="<?php echo base_url(); ?>assets/gallery/<?php echo $gal->image; ?>" width="100%" height="273px" style="border:5px solid #ddd"/></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div><!--#/ Message-->
	</div>
</section>