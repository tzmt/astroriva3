<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li><a href="<?php echo base_url(); ?>astrology/<?php echo ucwords($this->uri->segment(2)); ?>/details" class="font13 text-info"><?php echo ucwords($this->uri->segment(2)); ?></a>
                    </li>
                    <li>
                        <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li><span class="active text-primary font13"><?php echo ucwords(str_replace("-"," ",$this->uri->segment(3))); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============== Header Section End ===============-->
<section id="blog-details">
		<div class="container">
			<div class="row blog-item">								
				<div class="col-md-8 col-sm-7 blog-content">
					<!-- <?php //foreach($all_data as $dat){ ?>
					<div class="entry-header">
						<h3><?php //echo $this->uri->segment(2);?> Prediction</h3>
						<img class="img-responsive" src="<?php //echo base_url(); ?>assets/rashi_prediction/<?php //echo $dat->image; ?>" alt="" />					
						<h3>Descrption</h3>						
					</div>
					<div class="entry-post">						
						<p><strong>Description:</strong> <?php //echo $dat->description; ?></p>
						
					</div>
					<hr/>
					<?php //} ?> -->

					<div class="comments-area">		
						<div class="section-title-two">
							<h2><?php echo ucwords(str_replace("-"," ",$this->uri->segment(3))); ?></h2>										
						</div>			
						
						<div class="clearfix visible-xs-block"></div>  
						<div class="row wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" style="margin-top: 30px;">
							<ul class="media-list" >
								<?php foreach($prediction as $pred){ ?>
								<?php $q = $this->db->get_where('astrologer',array('id'=>$pred->astrologers_id))->row(); ?>
								<li class="media">
									<div class="post-comment">
										<div class="col-md-2">
											<a class="pull-left" href="#">
												<img class="media-object img-circle" src="<?php echo ASSETS; ?>astrologer/<?php echo $q->image ?>" alt="<?php echo $q->name ?>" width="50px" height="50px">
											</a>
										</div>
										<div class="col-md-10">
											<div class="media-body">
												<h3 style="margin: 0;margin-bottom: 11px;"><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $q->id; ?>/<?php echo strtolower(str_replace(" ", "-",$q->name)); ?>"><?php echo $q->name ?></a></h3>
												<p><?php echo $pred->description ?></p>										
											</div>
										</div>
									</div>						
								</li>
								<hr/>
								<?php } ?>
							</ul>		
						</div>			
					</div><!--/comments-area-->

					<div id="team" style="background:#fff !important">

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>OUR PANNELLED ASTROLOGERS</h2>										
								</div>			
										

									<div class='row' style="text-align: center;">
										<?php $i = 1; foreach($pannelled_astrologers as $ast){ ?>				
										
											<div class="col-md-2" style="margin-bottom: 10px;">
												<div class="team-member">
													<div class="col-md-12" style="margin-bottom: 15px;">
														<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
													</div>
													<div class="member-text">			
														<h5><?php echo $ast->name; ?></h5>
														<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
													</div>						
												</div>
											</div>
										<?php if($i%6 == 0){ echo "</div><div class='row'>";} ?>

										<?php $i++; } ?>	
									</div>												

							</div>

						</div>

					</div><!-- #/ Team  -->
					<div id="team" style="background:#fff !important"><!-- OUR ASTROLOGERS  -->

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>OUR PREMIUM ASTROLOGERS</h2>										
									</div>		
									

									<div class='row' style="text-align: center;">
									<?php $i = 1; foreach($premium_astrologers as $ast){ ?>				
									
										<div class="col-md-2" style="margin-bottom: 10px;">
											<div class="team-member">
												<div class="col-md-12" style="margin-bottom: 15px;">
													<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
												</div>
												<div class="member-text">			
													<h5><?php echo $ast->name; ?></h5>
													<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
												</div>						
											</div>
										</div>
									<?php if($i%6 == 0){ echo "</div><div class='row'>";} ?>

									<?php $i++; } ?>	
								</div>															

							</div>

						</div>

					</div>
				</div>
</section>