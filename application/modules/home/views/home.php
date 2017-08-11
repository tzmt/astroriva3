

<section class="home_bg">
    <div class="container">
        <div class="row home_alignment">
            <div class="col-md-12 text-center">
                <div class="bg-white button_margin pic_margin">
                    <h1 class="text-primary font35 home_padding">Signs of Zodiac</h1>
                    <div class="home_head center-block"></div>
                    <p class="elements_desc" style="padding:20px;">Know about your Rashi Retails, General Characters, Positive and Negative aspects, The predictions made by our Premium Astrologers for you.</br/> And exclusive Remedies and Tips for your Rashi.</p>
                    <div class="row home_align">
                        <?php foreach($rashi as $ras){ ?>
                            <div class="col-md-2 col-sm-4 col-xs-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                                
                                <div class="sign_circle bg-<?php echo strtolower($ras->name); ?>">
                                    <img src="<?php echo ASSETS; ?>rashi_image/<?php echo $ras->image; ?>" width="45px" alt="image-missing" class="rotate">
                                </div>
                                
                                    <div class="sign_card text-center signs_bg" rashi_id= "<?php echo $ras->id;?>">
                                            <a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/details/"><span class="text-<?php echo strtolower($ras->name); ?> signs_clr font16 "><?php echo $ras->name; ?></span></a><br>

                                            <a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/prediction/"><span class="signtext_clr font16">Prediction</span></a><br/>
                                    </div>
                               
                            </div>
                        <?php } ?>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="bg-info">
    <div class="container">
        <div class="row">
        	<div class="col-sm-3">
        		<img class="img-responsive" src="<?php echo base_url(); ?>assets/acharya/<?php echo $acharya->image; ?>" width="100%" height="auto" alt="" style="margin-top: 30px"/><br/>
        		<h2 class="text-white font35" style="font-size: 25px;text-align: center;margin-top: -10px;"><?php echo $acharya->name; ?></h2><br/>
        		<h4 style="font-size: 25px;text-align: center;margin-top: -10px;"><i class="fa fa-phone"></i> <?php echo $acharya->phone; ?></h4>

        	</div>
            <div class="col-sm-9 home_margin">
                <h2 class="text-white font35" style="margin-top: -22px">Meet The Acharya</h2>                
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-white" style="text-align: justify;"><?php echo $acharya->details1; ?></p>
                        <p class="text-white" style="text-align: justify;"><?php echo $acharya->details2; ?></p>
                        <p class="text-white" style="text-align: justify;"><?php echo $acharya->details3; ?></p>
                        <!-- <p class="text-white"><?php echo $acharya->details4; ?></p> -->
                        <!-- <p class="text-white"><?php echo $acharya->details5; ?></p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="btn_adjust">
                            <a href="<?php echo base_url(); ?>astrologer-details/appointment/santanu-sashtri/" class="btn btn-info btn-md btn_align">Book Appointment
                                <i class="fa fa-long-arrow-right btn_icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-t-40">
                <h1 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">Tips &amp; Remedy</h1>
                <hr class="hr_margin">
                <div class="row common_margin">
                    <div class="col-xs-12 font16">
                    <?php foreach($tips1 as $tip){ ?>
	                        <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
	                            <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle"  width="53px" height="53px"></div>
	                            <div class="col-md-9">
	                            	<span style="color:#e36480"><?php echo $tip->name; ?></span><br/>
	                            	<span><strong><?php echo $tip->topic; ?></strong></span><br/>
	                            	<span><?php echo substr($tip->description,0,50)." &nbsp;<a href='".base_url()."astrology/".$tip->rashi_name."/tips-and-remedy'><strong>Read More...</strong></a>"; ?></span>
	                            </div>
	                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-t-40">
                <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Market Prediction</h1>
                <hr>
                <div class="row common_margin">                    
                        <?php foreach($tips as $tip){ ?>
	                        <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
	                            <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $tip->image; ?>" width="100%" class="img-circle" width="53px" height="53px"></div>
	                            <div class="col-md-9">
	                            	<span style="color:#e36480"><?php echo $tip->name; ?></span><br/>
	                            	<span><strong><?php echo $tip->topic; ?></strong></span><br/>
	                            	<span><?php echo substr($tip->description,0,50)." &nbsp;<a href='".base_url()."astrology/".$tip->rashi_name."/market-prediction'><strong>Read More...</strong></a>"; ?></span>
	                            </div>
	                        </div>

                        <?php } ?>
                </div>
            </div>
            <div class="col-md-4 m-t-40">
                <div>
                    <h1 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">News &amp; Events</h1>
                </div>               
                <hr class="hr_margin">
                <div class="row common_margin">
                    <div class="col-xs-12 first-set">
                       <?php
                       $this->db->limit(5);
                        $q = $this->db->get_where('events',array('date_from <= '=>date("Y-m-d"),'date_to >=' => date("Y-m-d")))->result();                        
                        foreach($q as $q1){ ?>
                            <div class="wow fadeInLeft col-md-12" data-wow-duration="1s" data-wow-delay="0.1s" style="margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;">
                                <div class="col-xs-3"><img src="<?php echo base_url(); ?>assets/events/<?php echo $q1->image; ?>" width="100%" class="img-circle"  width="53px" height="53px"></div>
                                <div class="col-md-9">
                                    <span style="color:#e36480"><?php echo $q1->title; ?></span><br/>
                                    <span><?php echo substr($q1->description,0,120)." &nbsp;<a href=''><strong>Read More...</strong></a>"; ?></span>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sign_single button_margin">
    <div class="container">
        <div class="row btn_footer">
            <div class="home_margin">
            	<div class="col-xs-3">
            		<?php $img = $this->db->get_where('product_images',array('product_id'=>$shop->id))->row()->image; ?>
            		<img src="<?php echo base_url(); ?>assets/products/<?php echo $img; ?>" width="100%"/>
            	</div>
                <div class="col-xs-9">
                    <h4 class="text-white">Today's Deal</h4>
                    <h1 class="font35 text-white games_content_align m-b-25"><?php echo $shop->name;?></h1>
                    <p class="text-white btn_footer"><?php echo $shop->details;?></p>
                    <a href="<?php echo base_url(); ?>shop/details/<?php echo $shop->id;?>/<?php echo str_replace(" ","-",$shop->name); ?>" class="btn btn-primary btn-lg">Buy This Now !!</a>
                </div>                
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-t-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                <h1 class="text-primary text-center">Our Astrology Classes</h1>
                <hr>
                <p class="text-info">Need quick, fun answers and advice about your love life? Ask the Magic Love
                    Ball...
                </p>
                <iframe width="100%" height="215" src="https://www.youtube.com/embed/-F6ML4zTVaA?autoplay=0" frameborder="0" allowfullscreen=""></iframe>
            </div>
            <div class="col-md-4 m-t-40 button_margin wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                <h1 class="text-primary text-center">What <?php echo date("Y"); ?> Brings You</h1>
                <hr>
                <p class="text-info">Discover what <?php echo date("Y"); ?> holds for you &amp; what should you start planning for:</p>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="footer_text_height">
                            <li><a href="<?php echo base_url()."astrology/".$rashi[0]->name."/details"; ?>" class="text-info"><?php echo $rashi[0]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[1]->name."/details"; ?>" class="text-info"><?php echo $rashi[1]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[2]->name."/details"; ?>" class="text-info"><?php echo $rashi[2]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[3]->name."/details"; ?>" class="text-info"><?php echo $rashi[3]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[4]->name."/details"; ?>" class="text-info"><?php echo $rashi[4]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[5]->name."/details"; ?>" class="text-info"><?php echo $rashi[5]->name; ?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="footer_text_height">
                            <li><a href="<?php echo base_url()."astrology/".$rashi[6]->name."/details"; ?>" class="text-info"><?php echo $rashi[6]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[7]->name."/details"; ?>" class="text-info"><?php echo $rashi[7]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[8]->name."/details"; ?>" class="text-info"><?php echo $rashi[8]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[9]->name."/details"; ?>" class="text-info"><?php echo $rashi[9]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[10]->name."/details"; ?>" class="text-info"><?php echo $rashi[10]->name; ?></a></li>

                            <li><a href="<?php echo base_url()."astrology/".$rashi[11]->name."/details"; ?>" class="text-info"><?php echo $rashi[11]->name; ?></a></li>                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-4 m-t-40 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                <?php                 
                    $this->db->order_by('id','RANDOM');   
                    $this->db->limit(1);
                    $q = $this->db->get('astrology_service')->row();                   
                ?>
                <h1 class="text-primary text-center"><?php echo $q->name; ?></h1>
                <hr>   
                <p class="text-info"><?php echo substr($q->description, 0,100)."..."; ?></p>           
                <a href="<?php echo base_url(); ?>services/<?php echo $q->id; ?>/<?php echo strtolower(str_replace(" ", "-", $q->name)); ?>">
                    <img src="<?php echo base_url(); ?>assets/services/image/<?php echo $q->image; ?>" alt="<?php echo $q->name; ?>" width="100%" height="220"/>
                    <div class="blog_text blog_text1">asdasdasdsad</div>
                    <span class="text_image text-white btn btn-primary">Read more</span></a>
            </div>
                
        </div>
    </div>
</section>
<!--=============== Body Section End ===============-->
<!--=============== Footer Section Start ===============-->
<section class="footer_texture m-t-65">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 footer_section_align">
                <span class="text-white font18">Get Your </span><span class="text-primary font24"> Daily Horoscope<span
                    class="text-white font18">,</span> Daily Lovescope</span><span
                    class="text-white font18"> and</span><span class="text-primary font24"> Daily Tarot </span> <span
                    class="text-white font18">Directly In Your Inbox</span>
            </div>
            <div class="col-md-6 col-xs-12 footer_section_align">

                <form method="post" action="http://dev.lorvent.com/astrology/subscribe.php" id="subscribe">
                    <div class="form-group">

                        <div class="input-group label_align">

                            <input type="email" class="form-control input-lg input_email sub_input" placeholder="Email Address" name="email" id="email">

                            <span class="input-group-addon subscribe_align">
        <button type="submit" class="subscribe btn btn-sm ">
                        <span>
                            <img src="<?php echo URL; ?>assets/site_assets/images/mail-sent.png" alt="mailicon">
                        </span>
                            </button>
                        </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="footer_bg">
    <div class="container footer_align">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 m-t-40">
                <h5>OUR SERVICES</h5>
                <hr>
                <ul>
                	<?php foreach($service as $ser){ ?>
                    	<li><a href="<?php echo base_url(); ?>services/<?php echo $ser->id ?>/<?php echo strtolower(str_replace(" ", "-", $ser->name)); ?>"><?php echo $ser->name; ?></a></li>
                	<?php } ?>
                    
                </ul>
                
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 m-t-40">
                <h5>PREMIUM ASTROLOGERS</h5> 

                <hr>
                <?php $i = 1; foreach($premium_astrologers as $ast){ ?>  
                    <?php if($i/2 == 0){ ?>
                    <div class="row m-t-20">
                    <?php } ?>
                        <div class="col-xs-6" style="margin-bottom: 10px">
                            <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>"><img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/></a>
                        </div>                        
                    <?php if($i/2 == 0){ ?>
                    </div>
                    <?php } ?>
                <?php $i++; } ?>  
                <a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium" class="btn btn-primary btn-lg pull-right">View All</a>           
            </div>
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12 m-t-40">
                <h5>PANNELLED ASTROLOGERS</h5>
                <hr>
                <?php $i = 0; foreach($pannelled_astrologers as $ast){ ?>  
                    <?php if($i/2 == 0){ ?>
                    <div class="row m-t-20">
                    <?php } ?>
                        <div class="col-xs-6" style="margin-bottom: 10px">
                            <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>"><img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/></a>
                        </div>                        
                    <?php $i++; if($i/2 == 0){ ?>
                    </div>
                    <?php } ?>
                <?php  } ?>
                <a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled" class="btn btn-primary btn-lg pull-right">View All</a>                
            </div>
        </div>
            