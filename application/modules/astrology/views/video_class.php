<style>
	.filter{list-style: none;float: left;text-align: center;margin: 0px 20px 0px 20px;}
</style>
<section class="home_bg">
	<div class="container">
		<div id="our-work">
			<div class="container padding-top">
				<div class="row section-title text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h2>ASTROLOGY VIDEO CLASS</h2>						
					</div>
				</div>			
			</div>
			<div class="portfolio-menu text-center" style="margin-bottom: 20px;">
				<ul>				
					<li class="active filter"  data-filter="all">All</li>				
					<?php foreach($video_category as $cat){ ?>
					<li class="filter"  data-filter="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></li>
					<?php } ?>
				</ul>
			</div>
			<div class="portfolio-item padding-bottom portfolio_contents" >
				<div id="portfolio_filter" style="margin-top: 20px;">	
					<?php foreach($video_list as $list){ ?>
						<div class="col-md-4" style="border-radius: 5px;padding:5px;">
							<div class="entry-header" style="text-align: left;background: #fff;">
								<a href="<?php echo $list->link; ?>"><img class="img-responsive" src="http://www.astroriva.com/assets/video/<?php echo $list->image; ?>" width="100%" alt="<?php echo $list->title; ?>" /></a>	
							</div>
							<div class="entry-body text-center">
								<h4><?php echo $list->title; ?></h4>
							</div>
						</div>

					<?php } ?>	
				</div>
			</div>	
		</div>
	</div>
</section>
