<section class="home_bg">
	<div class="container">	
		<div id="message">
			<div class="container padding-top padding-bottom" style="margin-top:50px">
				<div class="text-center">
					<div class="section-title-two">
						<h2>Gallery</h2>
						<p>Some of our sweet memories to share...</p>
					</div>	
				</div>
				<div class="row">
					<?php foreach($gallery as $gal){ ?>
					<div class="col-md-3" style="margin-bottom: 20px;">
						<a href="<?php echo base_url(); ?>assets/gallery/<?php echo $gal->image; ?>" data-gallery="prettyPhoto"><img src="http://www.astroriva.com/assets/gallery/<?php echo $gal->image; ?>" width="100%" style="border:5px solid #ddd"/></a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div><!--#/ Message-->
	</div>
</section>