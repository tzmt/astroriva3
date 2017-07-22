<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="index-2.html" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li><a href="signs.html" class="font13 text-info">Signs</a>
                    </li>
                    <li>
                        <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li><span class="active text-primary font13"><?php echo ucwords($this->uri->segment(2)); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============== Header Section End ===============-->
<!--=============== Body Section Start ===============-->
<style>
    .active12{background: #4b3065 !important;border: 1px solid #4b3065;color: #fff !important}
    

</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-12 m-t-40">
            <span class="text-primary font35"><?php echo ucwords($this->uri->segment(2)); ?> Horoscope </span>
            <div class="clearfix visible-xs-block"></div>  

            <div class="row wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="col-xs-12" style="margin-top: -60px;">
                    <div class="row">                       
                        <div class="col-sm-12 col-xs-12 single_slide text-right button_margin">
                            <a href="#">
                                <img src="<?php echo URL; ?>assets/site_assets/images/left-arrow.png" class="single_swiper_prev" alt="arrow missing"/>
                            </a>
                            <a href="#">
                                <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" class="single_swiper_next" alt="arrow missing"/>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="swiper-container single_swiper">
                        <div class="swiper-wrapper">
                            <?php
                                $q = $this->db->get("rashi_list")->result();
                                foreach($q as $q1){
                            ?>
                                <div class="swiper-slide <?php if($this->uri->segment(2) === $q1->name){echo "active12";}else{echo "inactive";} ?>" style="margin: 0px !important;padding: 10px;text-align: center;">                            
                                    <a href="<?php echo base_url(); ?>astrology/<?php echo $q1->name; ?>/details" ><span class="font14 blog_pre"><?php echo $q1->name; ?></span></a>                            
                                </div>
                            <?php } ?> 
                        </div>
                    </div>
                    <br/>
                    <hr>
                    <div class="tab-content tab_singlepost">
                        <div class="tab-pane active">                            
                            <?php foreach($all_data as $all): ?>
                                <div class="row" style="margin-top: -10px !important;">
                                    <h1 style="margin-left: 18px;"><?php echo $this->db->get_where("rashi_topic_list",array('id'=>$all->topic_id))->row()->name; ?></h1>
                                    <div class="col-xs-12" style="margin-top: -25px;">
                                        <p class="elements_desc" style="text-align: justify;"><?php echo $all->description; ?></p>
                                    </div>
                                </div>  
                            <?php endforeach; ?>
                        </div>
                    
                    </div>
                </div>
            </div>

            <?php
                $this->db->limit(10);
                $this->db->order_by('id','RANDOM');
                $books = $this->db->get('books')->result();

                if(count($books) > 0){
            ?>
            <section class="hr_bottom_align">
                <div class="row">
                    <div class="col-sm-8 col-xs-9 m-t-26">
                        <h1 class="text-primary">Astrology Books</h1>
                    </div>
                    <div class="col-sm-4 col-xs-3 single_slide text-right button_margin">
                        <a href="#">
                            <img src="<?php echo URL; ?>assets/site_assets/images/left-arrow.png" class="single_swiper_prev" alt="arrow missing"/>
                        </a>
                        <a href="#">
                            <img src="<?php echo URL; ?>assets/site_assets/images/right-arrow1.png" class="single_swiper_next" alt="arrow missing"/>
                        </a>
                    </div>
                </div>
                <hr>

                <div class="m-t-40 swiper-container single_swiper">
                    <div class="swiper-wrapper">

                        <?php foreach($books as $book){ ?>
                            <div class="swiper-slide">
                                <img src="<?php echo URL; ?>assets/books/images/<?php echo $book->image; ?>" class="img-responsive" alt="Image missing"/>
                                <div class="text-primary card1_text bg-white text-center font14">
                                    <?php echo $book->name; ?>
                                </div>

                                <div class="text-primary card1_text bg-white text-center font14">
                                    <?php echo $book->author; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </section>

            <?php } ?>

            <?php
                $this->db->order_by('id','RANDOM');
                $this->db->limit(1);
                $bastu = $this->db->get('bastu')->row();

                if(count($bastu) > 0){
             ?>

                <div class="row m-t-26">
                    <div class="col-xs-12 hr_bottom_align">
                        <h1>Bastu Ideas</h1>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2 col-xs-4 m-t-40">
                                <img src="<?php echo URL; ?>assets/bastu/<?php echo $bastu->image; ?>" class="img-responsive" alt="Image missing">
                            </div>
                            <div class="col-sm-10 col-xs-8 m-t-26">
                                <h4><?php echo $bastu->title; ?></h4>
                                <p><?php echo $bastu->description; ?></p>
                                <div class="row">
                                    <div class="col-md-6"><button type="submit" class="btn btn-success col-md-12">Book Appointment</button></div>
                                    <div class="col-md-6"><button type="submit" class="btn btn-warning col-md-12">View More</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php } ?>


            <div class="row m-t-40">
                <div class="col-xs-12">
                    <?php
                        $this->db->order_by('id','RANDOM');
                        $this->db->limit(1);
                        $q = $this->db->get_where('shop_product',array('type'=>1))->row();
                    ?>
                    <div class="games_content sign_single row">
                        <div class="col-md-3"><img src="<?php echo base_url(); ?>/assets/products/<?php echo $this->db->get_where("product_images",array('product_id'=>$q->id))->row()->image; ?>" width="100%" height="auto"/></div>
                        <div class="col-md-9">
                            <h4 class="text-white">Today's Deal</h4>
                            <h1 class="font35 text-white games_content_align m-b-25"><?php echo $q->name; ?></h1>
                            <p class="text-white btn_footer wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.4s">
                                <?php echo $q->details; ?>
                            </p>
                            <div class="row">
                               <div class="col-sm-6 col-xs-12"><a href="<?php echo base_url(); ?>shop/details/<?php echo strtolower(str_replace(" ","-",$q->name)); ?>" class="btn btn-primary btn-lg">Buy This Now</a></div>
                            </div>
                        </div>
                    </div>
                    <br/><br/><br/>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12 m-t-40">
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?php echo base_url(); ?>astrologer-details/appointment/santanu-sashtri/"><h5 class="text-center bg-info text-white right_sidebar_dimension font14">Book an Appointment</h5></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 font16 games_align">                    
                    <?php
                        $rashi = $this->uri->segment(2);
                        $rashi_id = $this->db->select("id")->get_where("rashi_list",array('name'=>$rashi))->row()->id;
                        $q = $this->db->get_where("rashi_topic_details",array('rashi_id'=>$rashi_id))->result();

                        foreach($q as $q1){
                    ?>
                    <p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                        <a href="#" class="insight-color">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;<?php echo $this->db->get_where("rashi_topic_list",array('id'=>$q1->topic_id))->row()->name; ?>
                        </a>
                    </p>
                    <hr class="hr_margin">
                    <?php } ?>
                </div>
            </div>
            <div>
                <h1 class="aries_color  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Popular Quizes</h1>
            </div>
            <div class="arrows_align">
                <a href="#">
                    <i class="fa fa-long-arrow-left previous-arrow text-info" aria-hidden="true"></i>
                </a> &nbsp;&nbsp;
                <a href="#">
                    <i class="fa fa-long-arrow-right next-arrow text-info" aria-hidden="true"></i>
                </a>
            </div>
            <hr class="hr_margin">
            <div class="row common_margin">
                <div class="col-xs-12 first-set">
                    <div class="swiper-container love-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <a href="#" class="text-info color-info">What Sign Should You Date?</a><br>
                                    <small class="text-cancer font13">10 Questions</small>
                                </p>
                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <a href="#" class="text-info color-info">What intuitive power do You Have?</a><br>
                                    <small class="text-cancer font13">12 Questions</small>
                                </p>

                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <a href="#" class="text-info color-info">What element are you?</a><br>
                                    <small class="text-cancer font13">8 Questions</small>
                                </p>
                                <hr class="hr_margin">

                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <a href="#" class="text-info color-info">What's your real top priority in life?</a><br>
                                    <small class="text-cancer font13">11 Questions</small>
                                </p>
                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.6s">
                                    <a href="#" class="text-info color-info">What's In Your Immediate Future?</a><br>
                                    <small class="text-cancer font13">15 Questions</small>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                                    <a href="#" class="text-info color-info">What Sign Should You Date?</a><br>
                                    <small class="text-cancer font13">10 Questions</small>
                                </p>
                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
                                    <a href="#" class="text-info color-info">What intuitive power do You Have?</a><br>
                                    <small class="text-cancer font13">12 Questions</small>
                                </p>

                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
                                    <a href="#" class="text-info color-info">What element are you?</a><br>
                                    <small class="text-cancer font13">8 Questions</small>
                                </p>
                                <hr class="hr_margin">

                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <a href="#" class="text-info color-info">What's your real top priority in life?</a><br>
                                    <small class="text-cancer font13">11 Questions</small>
                                </p>
                                <hr class="hr_margin">
                                <p class="font16 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.6s">
                                    <a href="#" class="text-info color-info">What's In Your Immediate Future?</a><br>
                                    <small class="text-cancer font13">15 Questions</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="aries_color  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                        Top Stories
                    </h1>
                    <hr class="hr_margin">
                </div>
            </div>
            <div class="row common_margin">
                <div class="col-xs-12 font16">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <i class="fa fa-circle text-libra font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-libra">Libra</span>:
                        <span class="text-info">Signs a Libra hates you</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="fa fa-circle text-taurus font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-taurus">Taurus</span>:
                        <span class="text-info">Ease Taurus's Financial Stress</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <i class="fa fa-circle text-gemini font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-gemini">Gemini</span>:
                        <span class="text-info">Summer Love for Gemini</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="fa fa-circle text-aries font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-aries">Aries</span>:
                        <span class="text-info">Aries Should Explore</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                        <i class="fa fa-circle text-cancer font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-cancer">Cancer</span>:
                        <span class="text-info">The Smartest Investments</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.2s">
                        <i class="fa fa-circle text-virgo font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-virgo">Virgo</span>:
                        <span class="text-info">Virgo's Own Mistakes</span>
                    </p>
                    <hr class="hr_margin">
                    <p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
                        <i class="fa fa-circle text-sagittarius font14" aria-hidden="true"></i> &nbsp;
                        <span class="text-sagittarius">Sagittarius</span>:
                        <span class="text-info">Always Aiming High</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>