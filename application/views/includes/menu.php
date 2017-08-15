<body>
<!--=============== Preloader Section Start ===============-->
<div class="preloader" style="position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader-image" style="position: absolute;
  left: 50%;
  top: 50%;
  margin: -150px 0 0 -300px;">
        <img src="<?php echo URL; ?>assets/site_assets/images/preloader.gif" alt="loader-missing">
    </div>
</div>
<!--=============== Preloader Section End ===============-->
<!--=============== Header Section Start ===============-->
<section class="backgroundclr">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 tpbanner_align">                              
                <div class="clearfix visible-xs-block"></div>
                <!-- <a href="#" class="header_border1 hidden-xs font12">About Us</a> -->
                <div class="header_border hidden-xs font12">
                    <span id="google_translate_element"></span><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div> 
                
        
        

                <span class="header_border header_text hidden-xs font12">Follow Us</span>
                <span class="head_icons">
                <?php
                    $q = $this->db->select('youtube_url,twitter_url,facebook_url')->get_where("settings",array('id'=>1))->row();
                ?>
                    <a href="<?php echo $q->facebook_url; ?>" target="_blank"><i class="fa fa-facebook-square header_icons fa-lg"></i></a>
                    <a href="<?php echo $q->twitter_url; ?>" target="_blank"><i class="fa fa-twitter-square header_icons fa-lg"></i></a>
                    <a href="<?php echo $q->youtube_url; ?>" target="_blank"><i class="fa fa-youtube-square header_icons fa-lg" aria-hidden="true"></i></a>

                </span>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row text-right">
        <div class="col-md-5 col-sm-2"></div>
        <div class="col-md-7 col-sm-10 col-xs-12">
            <div class="clearfix visible-sm-block"></div>
            <div class="row">
                <div class="col-sm-2 col-xs-2 head_signs">
                    <a href="<?php echo base_url(); ?>shop/">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/dislike.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Shop</div>
                    </a>
                </div>
                <div class="col-sm-2 col-xs-2 text-center head_signs">
                    <a href="<?php echo base_url(); ?>services/">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/head.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Services</div>
                    </a>
                </div>
                <div class="col-sm-2 col-xs-2 text-center head_signs">
                    <a href="<?php echo base_url(); ?>gallery/">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/heart.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Gallery</div>
                    </a>
                </div>

                <div class="col-sm-2 col-xs-2 text-center head_signs">
                    <a href="<?php echo base_url(); ?>horoscope-bank/">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/man-with-tie.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Horoscope Bank</div>
                    </a>
                </div>
                <div class="col-sm-2 col-xs-2 text-center head_signs">
                    <a href="<?php echo base_url(); ?>astrology-video-class">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/yin-and-yang.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Video Class</div>
                    </a>
                </div>
                <div class="col-sm-2 col-xs-2 text-center head_signs">
                    <a href="<?php echo base_url(); ?>contact/">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/calendar.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Contact Us</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<header>
    <nav class="navbar">
        <div class="container">
            <div class="row">
                <div class="navbar-header col-md-3 col-sm-3 col-xs-12 nav_head">
                    <button type="button" class="navbar-toggle m-t-20 font18" data-toggle="collapse"
                            data-target="#myNavbar">
                        <span>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </span>
                    </button>                    
                    <a href="<?php echo URL; ?>">
                        <img src="<?php echo URL; ?>assets/logo/<?php echo LOGO; ?>" alt="Astroriva Logo" class="brand_name" width="200px;">
                    </a>                    

                </div>
                <div class="navbar-collapse collapse col-md-8 col-sm-7 col-xs-12 nav navbar-right nav_menubar"
                     id="myNavbar" style="margin-top: 4px">
                    <ul class="nav navbar-nav header_nav">
                        <li class="header_li active">
                            <a href="<?php echo base_url(); ?>" class="text-info">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>astrology/branches/" class="text-info">Jyotish</a>
                        </li>                       

                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>ayurved/" class="text-info">Ayurved</a>
                        </li>
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>yoga/" class="text-info">Yoga</a>
                        </li>
                        <li class="dropdown dropdown_modified">
                            <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle">Siksha <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu dropdown_mod" data-dropdown-in="fadeInUp"
                                data-dropdown-out="fadeOut">
                                <li><a href="<?php echo base_url(); ?>shiksha">Courses</a></li>
                                <li><a href="<?php echo base_url(); ?>branches">Branches</a></li>                                
                            </ul>
                        </li>     
                        <li class="dropdown dropdown_modified">
                            <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle">Astrologers <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu dropdown_mod" data-dropdown-in="fadeInUp"
                                data-dropdown-out="fadeOut">
                                <li><a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium">Premium Astrologers</a></li>
                                <li><a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled">Panneled Astrologers</a></li>                                
                            </ul>
                        </li>                       
                        
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>shop/cart/" class="text-info" style="color:#e36480;font-weight: bold;">Cart [ <?php echo count($this->cart->contents()); ?> ]</a>
                        </li>

                        <li class="header_li">
                            <?php
                                if($this->session->userdata('astro_student') != "" || $this->session->userdata('user') != "" || $this->session->userdata('astro_astrologer') != ""){?>                                
                                <li class="dropdown dropdown_modified">
                                <?php
                                    if(isset($this->session->userdata('astro_astrologer')->name))
                                    {
                                ?>
                                    <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle"><?php echo $this->session->userdata('astro_astrologer')->name; ?> 
                                    
                                <?php } elseif(isset($this->session->userdata('astro_student')->name)){?>
                                <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle"><?php echo $this->session->userdata('astro_student')->name; ?> 

                                <?php } elseif(isset($this->session->userdata('astro_client')->name)){?>
                                <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle"><?php echo $this->session->userdata('astro_client')->name; ?> 

                                <?php } ?>
                                    <span
                                            class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown_mod" data-dropdown-in="fadeInUp"
                                        data-dropdown-out="fadeOut">
                                        <li><a href="<?php echo base_url(); ?>astrologer/dashboard/" class="text-info" >Dashboard</a></li>
                                        <li><a href="<?php echo base_url(); ?>login/logout/" class="text-info" style="color:red;font-weight: bold;">Logout</a></li>                               
                                    </ul>
                                </li> 

                            <?php } else {?>
                                <a href="<?php echo base_url(); ?>login/" class="text-info">Login / Signup</a>
                            <?php } ?>
                        </li>
                        
                        <!-- <li class="header_li">
                            <a href="<?php //echo base_url(); ?>contact/" class="text-info">Contact Us</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>