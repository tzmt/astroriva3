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
                            <img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/>
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
                            <img src="<?php echo URL; ?>assets/astrologer/<?php echo $ast->image; ?>" width="100%" height="130px"/>
                        </div>                        
                    <?php $i++; if($i/2 == 0){ ?>
                    </div>
                    <?php } ?>
                <?php  } ?>                
            </div>
        </div>
            