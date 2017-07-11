

<section class="home_bg">
    <div class="container">
        <div class="row home_alignment">
            <div class="col-md-12 text-center">
                <div class="bg-white button_margin pic_margin">
                    <h1 class="text-primary font35 home_padding">Free Daily Horoscopes</h1>
                    <div class="home_head center-block"></div>
                    <p class="elements_desc" style="padding:20px;">Know about your Rashi Retails, General Characters, Positive and Negative aspects, The predictions made by our Premium Astrologers for you.</br/> And exclusive Remedies and Tips for your Rashi.</p>
                    <div class="row home_align">
                        <?php foreach($rashi as $ras){ ?>
                            <div class="col-md-2 col-sm-4 col-xs-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                                <div class="sign_circle bg-aries">
                                    <img src="<?php echo ASSETS; ?>rashi_image/<?php echo $ras->image; ?>" width="45px" alt="image-missing" class="rotate">
                                </div>
                                
                                    <div class="sign_card text-center signs_bg" rashi_id= "<?php echo $ras->id;?>">
                                        <div class="show123<?php echo $ras->id;?>">
                                            <span class="text-aries signs_clr font16"><?php echo $ras->name; ?></span><br>
                                            <span class="signtext_clr font12">Mar 21 - Apr 19</span><br/>
                                        </div>
                                        <div class="show1234<?php echo $ras->id;?>" style="display: none">
                                            <div class="sign_card text-center signs_bg">
                                                <span class="signtext_clr font12"><a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/details/" class="text-white">Details</a></span><br/>

                                                <span class="signtext_clr font12"><a href="<?php echo base_url(); ?>astrology/<?php echo $ras->name; ?>/prediction/">Prediction</a></span><br/>                                                
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
                <!-- <div class="row">
                    <div class="col-md-3 col-sm-3 elements_desc">
                        <label class="text-white font18" for="name">Name:</label>
                        <input type="text" id="name" class="bg-white form-control"
                               placeholder="Enter your name..">
                    </div>                    
                    <div class="col-md-3 home_dob col-sm-6 elements_desc">
                        <label class="text-white font18">Date of Birth:</label>
                        <select class="home_select form-control bg-white">
                            <option value="">Choose</option>
                            <option>January</option>
                            <option>February</option>
                            <option>March</option>
                            <option>April</option>
                            <option>May</option>
                            <option>June</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option>October</option>
                            <option>November</option>
                            <option>December</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2 home_dob elements_desc home_date">                        
                        <select class="home_select1 form-control bg-white">
                            <option value="">Choose</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-2 home_dob elements_desc home_date">
                        <select class="home_select2 form-control bg-white">
                            <option value="">Choose</option>
                            <option>1990</option>
                            <option>1991</option>
                            <option>1992</option>
                            <option>1993</option>
                            <option>1994</option>
                            <option>1995</option>
                            <option>1996</option>
                            <option>1997</option>
                            <option>1998</option>
                            <option>1999</option>
                            <option>2000</option>
                            <option>2001</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-6 elements_desc">
                        <label class="text-white font18" for="zip">Time of Birth:</label>
                        <input type="text" id="zip" class="bg-white form-control">
                    </div>

                    <div class="col-md-3 col-sm-6 elements_desc">
                        <label class="text-white font18" for="zip">Place of Birth:</label>
                        <input type="text" id="zip" class="bg-white form-control">
                    </div>
                    <div class="col-md-4 col-sm-6 elements_desc">
                        <label class="text-white font18" for="zip">Email Id:</label>
                        <input type="text" id="zip" class="bg-white form-control">
                    </div>

                    <div class="col-md-5 col-sm-6 elements_desc">
                        <label class="text-white font18" for="zip">City:</label>
                        <input type="text" id="zip" class="bg-white form-control">
                    </div>

                    <div class="col-md-5 col-sm-6 elements_desc">
                        <label class="text-white font18" for="zip">Phone Number:</label>
                        <input type="text" id="zip" class="bg-white form-control">
                    </div>
                </div> -->
                <div class="row">
                    <p class="text-white"><?php echo $acharya->details1; ?></p>
                    <p class="text-white"><?php echo $acharya->details2; ?></p>
                    <p class="text-white"><?php echo $acharya->details3; ?></p>
                    <!-- <p class="text-white"><?php echo $acharya->details4; ?></p> -->
                    <!-- <p class="text-white"><?php echo $acharya->details5; ?></p> -->
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
            <div class="col-md-4 m-t-40">
                <h1 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">Market Prediction</h1>
                <hr>
                <div class="row common_margin">
                    <marquee behavior="scroll" direction="down" onmouseover="this.stop();" onmouseout="this.start()">
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
            <div class="col-md-4 m-t-40">
                <div>
                    <h1 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">Popular Quizes</h1>
                </div>
                <div class="arrows_align">
                    <a href="#"><i class="fa fa-long-arrow-left previous-arrow text-info" aria-hidden="true"></i></a>
                    &nbsp;&nbsp;<a href="#"><i class="fa fa-long-arrow-right next-arrow text-info" aria-hidden="true"></i></a>
                </div>
                <hr class="hr_margin">
                <div class="row common_margin">
                    <div class="col-xs-12 first-set">
                        <div class="swiper-container love-swiper">
                            <div class="swiper-wrapper">
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
                                <div class="swiper-slide">
                                    <p class="font16">
                                        <a href="#" class="text-info color-info">What Sign Should You Date?</a><br>
                                        <small class="text-cancer font13">12 Questions</small>
                                    </p>
                                    <hr class="hr_margin">
                                    <p class="font16">
                                        <a href="#" class="text-info color-info">What intuitive power do You Have?</a><br>
                                        <small class="text-cancer font13">8 Questions</small>
                                    </p>

                                    <hr class="hr_margin">
                                    <p class="font16">
                                        <a href="#" class="text-info color-info">What element are you?</a><br>
                                        <small class="text-cancer font13">10 Questions</small>
                                    </p>
                                    <hr class="hr_margin">
                                    <p class="font16">
                                        <a href="#" class="text-info color-info">What's your real top priority in life?</a><br>
                                        <small class="text-cancer font13">15 Questions</small>
                                    </p>
                                    <hr class="hr_margin">
                                    <p class="font16">
                                        <a href="#" class="text-info color-info">What's In Your Immediate Future?</a><br>
                                        <small class="text-cancer font13">11 Questions</small>
                                    </p>
                                </div>
                            </div>
                        </div>
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
            		<img src="http://www.astroriva.com/assets/products/146961653962494.jpg"/>
            	</div>
                <div class="col-xs-9">
                    <h4 class="text-white">Today's Deal</h4>
                    <h1 class="font35 text-white games_content_align m-b-25">Six Mukhi Rudraksh</h1>
                    <p class="text-white btn_footer"> 6 Mukhi Rudraksha protects the wearer from all problematic situations. 6 Mukhi (Six Face) Rudraksha is ruled by Lord Kartikeya who is the second son of Maa Parvati (Shakti) and Lord Shiva and is also the chief of the celestial army.</p>
                    <a href="#" class="btn btn-primary btn-lg">Buy This Now !!</a>
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
                <h1 class="text-primary text-center">What 2016 Brings You</h1>
                <hr>
                <p class="text-info">Discover what 2016 holds for you & what should you start planning for:</p>
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="footer_text_height">
                            <li><a href="signs_single_post.html" class="text-info">Aries</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Taurus</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Gemini</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Cancer</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Leo</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Virgo</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="footer_text_height">
                            <li><a href="signs_single_post.html" class="text-info">Libra</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Scorpio</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Sagittarius</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Capricorn</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Aquarius</a></li>
                            <li><a href="signs_single_post.html" class="text-info">Pisces</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 m-t-40 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                <h1 class="text-primary text-center">Match Making?</h1>
                <hr>
                <p class="text-info">Are your Sun Signs a perfect match, or will it take effort to make it work?</p>
                <a href="love_compatibility.html">
                    <img src="https://i.ytimg.com/vi/xPNc4_dNIY4/maxresdefault.jpg" class="img-responsive home_pic1" alt="Image missing"/>
                    <div class="blog_text blog_text1"></div>
                    <span class="text_image text-white">Read more</span></a>
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
                    <li><a href="#">My Daily Horoscope </a></li>
                    <li><a href="#">My Weekly Horoscope</a></li>
                    <li><a href="#">My Monthly Horoscope</a></li>
                    <li><a href="#">My Love Horoscope</a></li>
                    <li><a href="#">My Career Horoscope</a></li>
                    <li><a href="#">My Wellness Horoscope</a></li>
                    <li><a href="#">My Money Horoscope</a></li>
                    <li><a href="#">My Food Horoscope</a></li>
                    <li><a href="#">My Pet Horoscope</a></li>
                    <li><a href="love_compatibility_result.html">My Love Compatibility</a></li>
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
                            <a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>"><img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/></a>
                        </div>                        
                    <?php if($i/2 == 0){ ?>
                    </div>
                    <?php } ?>
                <?php $i++; } ?>             
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
                            <a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>"><img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/></a>
                        </div>                        
                    <?php $i++; if($i/2 == 0){ ?>
                    </div>
                    <?php } ?>
                <?php  } ?>                
            </div>
        </div>
            