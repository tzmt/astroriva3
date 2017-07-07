<div id="home"><!-- Start Slider Area -->
		<div class="row">
			<div class="col-sm-12">
				<div id="main-carousel" class="carousel slide" data-ride="carousel" style="background-image:url('<?php echo base_url(); ?>assets/slider/<?php echo BANNER; ?>');">					
					<div class="carousel-inner">
						<?php $i=1; foreach($banner as $ban){ ?>
						<div class="item <?php if($i == 1){echo "active";} ?>">
							<div class="overlay">
								<div class="slider-caption text-center container">
									<h1><?php echo $ban->heading; ?></h1>
									<p><?php echo $ban->description; ?></p>
								</div>
							</div>
						</div>
						<?php $i++; } ?>
					</div>	
				</div> <!--/#main-carousel--> 
			</div>
		</div>
	</div><!--/# Slider Area-->
	
	<div id="our-services"><!-- Start Our Services -->
		<div class="container">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2><small></small>Know About Yourself</h2>
					<p>Know about your Rashi Retails, General Characters, Positive and Negative aspects, The predictions made by our Premium Astrologers for you, And exclusive Remedies and Tips for your Rashi.</p>
				</div>
			</div>
			<div class="row text-center">
				<div class="portfolio-item padding-bottom portfolio_contents">
			<div id="portfolio_filter">				
				<?php foreach($rashi as $ras){ ?>
				<?php $ras->name = strtolower($ras->name); ?>
				<div class="col-sm-3 col-md-2 portfolio-content mix all web illustration">
					<img class="img-responsive" src="<?php echo ASSETS; ?>rashi_image/<?php echo $ras->image; ?>" width="350px" style="width:350px !important;" alt="" />									
					<div class="overlay">
						<h5><?php echo $ras->name; ?></h5>						
						<a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/details/" onclick="window.location = '<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/details/'"><i class="fa fa-info"></i> Details</a><br/>
						<a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/prediction/" onclick="window.location = '<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/prediction/'"><i class="fa fa-info"></i> Prediction</a><br/>
						<a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/get-your-prediction/" onclick="window.location = '<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/get-your-prediction/'"><i class="fa fa-info"></i> Get Your Prediction</a><br/>
						<a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/tips-and-remedy/" onclick="window.location = '<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/tips-and-remedy/'"><i class="fa fa-info"></i> Tips &amp; Remedy</a><br/>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>	
			</div>
		</div>
	</div><!-- /# Our Services -->
	
	<!-- #/ Parallax Section -->
	<div id="parallax-one" class="parallax-section" style="background-image:url('<?php echo base_url(); ?>assets/parallax-bg/<?php echo PARALLAX1; ?>');"><!-- Start Parallax Section -->
		<div class="overlay">
			<div class="container padding-top padding-bottom">
				<div class="row">
					<div class="col-sm-6">
						<div class="video-section">
							<img class="img-responsive" src="<?php echo ASSETS; ?>parallax-bg/video-image.jpg" alt="" />
							<div class="video-caption">
								<a class="pull-left" href="https://www.youtube.com/watch?v=QMiEPmMj4Jg" data-gallery="prettyPhoto"><i class="fa fa-play"></i></a>
								<div class="pull-left video-text">
									<h5><a href="<?php echo base_url(); ?>astrology-video-class" style="font-size:22px;">View All Astrology Classes</a></h5>
									<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam id.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="parallax-text">
							<h2>ASTRO NEWS</h2>
							<p>Know about the events to be occurred in future and occurred already and discussions in aspect of Astrology. </p>
							<div style="height:300px;overflow-y:hidden">
								<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start()">
								<?php foreach($news as $new){ ?>
								<div class="parallax-icon">									
									<div class="p-text pull-left">
										<img src="<?php echo base_url().'assets/news/'.$new->image?>" class="img-responsive"/>
										<h4><?php echo $new->topic; ?></h4>
										<p><?php echo strip_tags($new->description); ?></p>
									</div>
								</div>
								<?php } ?>
								</marquee>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #/ Parallax Section -->
	

	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2><small></small>MEET THE ACHARYA</h2>
					<p>Santanu Shastri is the head of the institute and one of the most talented astrologers of the world.</p>
				</div>
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<div class="col-sm-6">
								<img class="img-responsive" src="<?php echo base_url(); ?>assets/acharya/<?php echo $acharya->image; ?>" width="600px" height="400px" alt="" />
							</div>
							<div class="col-sm-6">
								<div class="product-details">
									<h3 class="product-name"><?php echo $acharya->name; ?></h3>									
									<div class="product-info">
										<h4 class="product-price"><i class="fa fa-phone"></i> +91 <?php echo $acharya->phone; ?></h4>	
										<h5>Details</h5>
										<ul>
											<li><i class="fa fa-angle-double-right"></i> <?php echo $acharya->details1; ?></li>
											<li><i class="fa fa-angle-double-right"></i> <?php echo $acharya->details2; ?></li>
											<li><i class="fa fa-angle-double-right"></i> <?php echo $acharya->details3; ?></li>
											<li><i class="fa fa-angle-double-right"></i> <?php echo $acharya->details4; ?></li>
											<li><i class="fa fa-angle-double-right"></i> <?php echo $acharya->details5; ?></li>
										</ul><br/>
										<span class='st_facebook_large' displayText='Facebook'></span>
										<span class='st_twitter_large' displayText='Tweet'></span>
										<span class='st_linkedin_large' displayText='LinkedIn'></span>
										<span class='st_pinterest_large' displayText='Pinterest'></span>
										<span class='st_email_large' displayText='Email'></span>
										<span class='st_sharethis_large' displayText='ShareThis'></span>
										<br/>
										<a href="<?php echo base_url(); ?>astrologer-details/appointment/<?php echo strtolower(str_replace(" ","-",$acharya->name)); ?>/" class="btn btn-default">Book An Appoinment</a> <a href="#" class="btn btn-default">1 Like</a> <a href="#" class="btn btn-default"><?php echo $total_comments; ?> Comments</a>
										
									</div>
								</div>
							</div>
						</div>
					</div>					
			</div>
		</div>
	</div><!-- #/ Director's Section -->

	<!-- #/ Parallax Section -->
	<div id="parallax-two" class="parallax-section" style="background-image:url('<?php echo base_url(); ?>assets/parallax-bg/<?php echo PARALLAX2; ?>');"><!-- TIPS & MARKET PREDICTION -->
		<div class="overlay">
			<div class="container padding-top padding-bottom">
				<div class="row">
					<div class="col-sm-6">
						<div class="parallax-text">
							<h2>TIPS</h2>
							<p>This Tips are prescribed by the most popular astrologers which will help you to improve your life style and solve all problems of your daily life. </p>
							<div style="height:300px;overflow-y:hidden">
								<marquee behavior="scroll" direction="up" onmouseover="this.stop();" onmouseout="this.start()">
									<?php foreach($tips as $tip){ ?>
									<div class="parallax-icon">										
										<div class="p-text pull-left">
											<img src="<?php echo base_url().'assets/tips/'.$tip->image?>" class="img-responsive"/>
											<h4>For: <?php echo $this->db->get_where('rashi_list',array('id'=>$tip->rashi_id))->row()->name; ?></h4>
											<p><?php echo strip_tags($tip->description); ?></p>
										</div>
									</div>
									<?php } ?>
								</marquee>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="parallax-text">
							<h2>MARKET PREDICTION</h2>
							<p>These predictions will help you to think and plan about your investments.</p>
							<div style="height:300px;overflow-y:hidden">
								<marquee behavior="scroll" direction="up">
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-flask"></i>
										</div>
										<div class="p-text pull-left">
											<h4>Analyse</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
									<div class="parallax-icon">
										<div class="p-icon pull-left">
											<i class="fa fa-building-o"></i>
										</div>
										<div class="p-text pull-right">
											<h4>Preparing</h4>
											<p>Vivamus suscipit tortor eget felis porttitor volutpat. Cura bitur aliquet quam.</p>
										</div>
									</div>
								</marquee>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #/ Parallax Section -->

	
	<div id="features">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<h3>Today's Panchang</h3>
	    			<div class="featured-tab clearfix">						
						<div class="tab-content col-sm-12">
					        <div id="feature1" class="tab-pane active animated zoomIn">	
								<div class="tab-image pull-left">
									<img class="img-responsive" src="http://assets.ganeshaspeaks.com/GS-V4/images/panchang-images/moon/moon2.png" alt="">
								</div>					            
					            <h3>11<sup>th</sup> July, 2016</h3>
					            <h4>Mumbai India</h4>
					            <p><strong>Shukla Paksha Saptami</strong></p>
					            <p>
					            	<div class="row">
						            	<div class="col-sm-2"><strong>Nakshtra</strong><br/> Hast</div>
						            	<div class="col-sm-2"><strong>Yog</strong><br/> Paridh</div>
						            	<div class="col-sm-2"><strong>Karan</strong><br/> Vanij</div>
						            	<div class="col-sm-1"><strong>Sunrise</strong><br/> 06:08</div>
						            	<div class="col-sm-1"><strong>Sunset</strong><br/> 19:19</div>
					            	</div>
					            </p>								
					        </div>					        
						</div>
	    			</div>
    			</div>
    		</div>
    	</div>
    </div> <!-- Features end -->

    <div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PREMIUM ASTROLOGERS</h2>
					<p>The Group of Famous astrologers to solve Every problems in your Life and to overcome all the hurdles of Life.</p>
				</div>				
				<?php foreach($premium_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
							<h6><?php echo $ast->phone; ?></h6>
						</div>						
					</div>
				</div>
				<?php } ?>
				<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
					<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
				</div>	
				
			</div>
		</div>
	</div><!-- #/ Team  -->

	
	
	<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PANNELLED ASTROLOGERS</h2>
					<p>The Group of Famous astrologers to solve Every problems in your Life and to overcome all the hurdles of Life.</p>
				</div>				
				<?php foreach($pannelled_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
							<h6><?php echo $ast->phone; ?></h6>
						</div>						
					</div>
				</div>
				<?php } ?>
				<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
					<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
				</div>
				
			</div>
		</div>
	</div><!-- #/ Team  -->

	
	
	
	
	<div id="parallax-three" class="parallax-section" style="background-image:url('<?php echo base_url(); ?>assets/parallax-bg/<?php echo PARALLAX3; ?>');"><!-- Statistics Section -->
		<div class="overlay">
			<div class="container padding-top padding-bottom">
				<div class="row section-title text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h2 style="color:#fff !important"><small style="color:#fff !important">Some Of Our</small>Happy Clients</h2>
						<p>Meet some of our Clients who took help from Rrishibani to make life smooth and easy.</p>
						<br/>
						<div id="main-carousel1" class="carousel slide" data-ride="carousel" style="background-image: none">
							<div class="carousel-inner">
								<div class="item active">
									<div class="overlay">
										<div class="slider-caption text-center container">
											<h1><img src="<?php echo ASSETS; ?>images/blog/man4.jpg" class="img-circle" style="border:5px solid #fff"/></h1>
											<p>We are experienced, dedicated, team of designers, developers who work together to create beautiful, engaging digital experiences.</p>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="overlay">
										<div class="slider-caption text-center container">
											<h1><img src="<?php echo ASSETS; ?>images/blog/man4.jpg" class="img-circle" style="border:5px solid #fff"/></h1>
											<p>We are experienced, dedicated, team of designers, developers who work together to create beautiful, engaging digital experiences.</p>									
										</div>
									</div>
								</div>
								<div class="item">
									<div class="overlay">
										<div class="slider-caption text-center container" >
											<h1><img src="<?php echo ASSETS; ?>images/blog/man4.jpg" class="img-circle" style="border:5px solid #fff"/></h1>
											<p>We are experienced, dedicated, team of designers, developers who work together to create beautiful, engaging digital experiences.</p>
										</div>
									</div>
								</div>							
							</div>	
				</div>	
					</div>
				</div>					
				<div class="row funs text-center">
					<div class="col-sm-3">
						<div class="fun-box">
							<i class="fa fa-users"></i>
							<h2>Clients</h2>
							<span class="timer" ><?php echo $total_clients; ?></span>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="fun-box">
							<i class="fa fa-gift"></i>
							<h2>Astrologers</h2>
							<span class="timer" ><?php echo $total_astrologers; ?></span>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="fun-box">
							<i class="fa fa-trophy"></i>
							<h2>Students</h2>
							<span class="timer" ><?php echo $total_students; ?></span>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="fun-box">
							<i class="fa fa-user"></i>
							<h2>Visitors</h2>
							<span class="timer" >23</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #/ Statistics Section -->

	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2>REMEDIES FOR YOU</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis lectus. Praesent sapien massa, convallis a pellen tesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt ni dictum porta</p>
				</div>
			</div>	
			<div class="products">
				<ul id="product-list" class="row nav nav-tabs" role="tablist">
					<?php foreach($products as $prod){ ?>
					<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
					<li class="col-sm-3">
						<a class="product-image" href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>">							
							<img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" width="231px" height="231px;" alt="<?php echo $prod->name; ?>" style="width:231px !important;height:231px !important;" />
						</a>
						<div class="product-name">
							<p><?php echo $prod->name ?> <span><i class="fa fa-rupee"></i> <?php echo $prod->price ?></span></p>
						</div>
					</li>
					<?php } ?>					
				</ul>
				<?php if(count($products)> 4){ ?>
				<div id="loadMore">
					<span>Load more</span>
				</div> 
				<?php } ?>
			</div>
		</div>
	</div><!-- #/ Product's Section -->

	<?php if(isset($this->session->userdata('user')->id)){ ?>
<a href="<?php echo base_url();?>astrologer/dashboard/"><img src="<?php echo ASSETS; ?>images/dashboard.png" style="position:absolute;right:0;top:71px;position:fixed;"/></a>
<?php } ?>