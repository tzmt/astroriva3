<style>
	.filter{list-style: none;float: left;text-align: center;margin: 0px 15px 0px 15px;}
</style>

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
                        <span class="active text-primary font13">Video Class</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section>
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
					<li class="active filter vidfilter" onclick="showHideVideo('all')"><a><strong>All</strong></a></li>				
					<?php foreach($video_category as $cat){ ?>
					<li class="filter vidfilter<?php echo $cat->id; ?>" onclick="showHideVideo(<?php echo $cat->id; ?>)"  ><a><strong><?php echo $cat->name; ?></strong></a></li>
					<?php } ?>
				</ul> 
			</div>
			<div class="row">
				<div class="portfolio-item padding-bottom portfolio_contents" style="margin-top: 50px;">
					<div id="portfolio_filter">	
						<?php foreach($video_list as $list){ ?>							
							<div class="col-md-3 vid<?php echo $list->cat_id; ?> showhide123" style="border-radius: 5px;padding:5px;">
								<div class="entry-header" style="text-align: left;background: #fff;">


									<?php if(isset($this->session->userdata('astro_student')->id) || isset($this->session->userdata('astro_client')->id) || isset($this->session->userdata('astro_astrologer')->id)){ ?>
										<a href="javascript:void(0)" data-toggle="modal" data-target="#myModal<?php echo $list->id ?>">
									<?php } else {?>
										 <a href="#popupmodal" role="button" data-toggle="modal"> 
	 								<?php } ?>


									<img class="img-responsive" src="<?php echo base_url(); ?>assets/video/<?php echo $list->image; ?>" width="100%" alt="<?php echo $list->title; ?>" /></a>	
								</div>
								<div class="entry-body text-center">
									<h4><?php echo $list->title; ?></h4>
								</div>
							</div>

							<div id="myModal<?php echo $list->id ?>" class="modal fade modal12534" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <?php
							    	$link = $list->link;
							    	$exp = end(explode("/", $link));
							    	$video = str_replace('watch?v=', "", $exp);

							    ?>

							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title"><?php echo $list->title; ?></h4>
							      </div>
							      <div class="modal-body">
							        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-primary close" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>


						<?php } ?>	
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
<div class="modal fade" id="popupmodal">
	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>You need to login before watching this video.</h4>
				</div>
		    <div class="modal-body">
		    </div>
	       
	  	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
	.activevid{background: #e36480;
    padding: 5px 10px 5px 10px;
    color: #fff !important;
    border-radius: 10px;
    color: #fff;
}
.activevid > a:hover{color: #fff !important}
.activevid > a{color: #fff !important}
</style>
<script type="text/javascript">
	function showHideVideo(id)
	{
		$('.filter').removeClass('activevid');
		$('.vidfilter'+id).addClass('activevid');
		if(id == 'all')
		{
			$('.showhide123').show();
		}
		else
		{
			$('.showhide123').hide();
			$('.vid'+id).animate().show();;
		}
		
	}
</script>
