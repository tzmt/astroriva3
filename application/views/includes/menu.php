
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
                <a href="<?php echo base_url(); ?>about_us" class="header_border1 hidden-xs font12">About Us</a>
                <div class="header_border hidden-xs font12">Language:
                    <ul>
                        <li class="dropdown lang_dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">EN <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Hindi</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix visible-xs-block"></div>
                <span class="header_border header_text hidden-xs font12">Follow Us</span>
                <span class="head_icons"><a href="#"><i class="fa fa-facebook-square header_icons fa-lg"></i></a>
                      <a href="#"><i class="fa fa-twitter-square header_icons fa-lg"></i></a>
                      <a href="#"><i class="fa fa-google-plus-square header_icons fa-lg" aria-hidden="true"></i></a>
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
                    <a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled">
                        <div class="bg-info header_bg center-block">
                            <img src="<?php echo URL; ?>assets/site_assets/images/calendar.png" alt="Image missing">
                        </div>
                        <div class="text-center info1 font13 hidden-xs">Astrologers</div>
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
                <div class="navbar-header col-md-4 col-sm-5 col-xs-12 nav_head">
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
                            <a href="<?php echo base_url(); ?>Jyotish/" class="text-info">Jyotish</a>
                        </li>
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>shiksha/" class="text-info">Siksha</a>
                        </li>

                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>ayurved/" class="text-info">Ayurved</a>
                        </li>
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>yoga/" class="text-info">Yoga</a>
                        </li>
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>contact/" class="text-info">Contact Us</a>
                        </li>
                        <!-- <li class="dropdown dropdown_modified">
                            <a data-toggle="dropdown" href="#" class="text-info dropdown-toggle">Pages <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu dropdown_mod" data-dropdown-in="fadeInUp"
                                data-dropdown-out="fadeOut">
                                <li><a href="index2.html">Home Page2</a></li>
                                <li><a href="blog_single.html">Blog Single Post</a></li>
                                <li><a href="blog_category.html">Blog Category</a></li>
                                <li><a href="signs_single_post.html">Signs Single Page</a></li>
                                <li><a href="gemstones_single.html">Gemstones Single Page</a></li>
                                <li><a href="love_compatibility_result.html">Love Compatibility Result</a></li>
                                <li><a href="elements.html">Elements</a></li>
                            </ul>
                        </li> -->
                        <li class="header_li">
                            <a href="<?php echo base_url(); ?>login/" class="text-info">Login / Signup</a>
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