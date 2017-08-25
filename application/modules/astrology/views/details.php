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
                    <li><a href="" class="font13 text-info">Signs</a>
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
                        <div class="tab-pane active" id="rashiajaxdetails">                            
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
                        <h1>Vastu Ideas</h1>
                        <hr>
                        <div class="row">
                            <div class="col-sm-2 col-xs-4 m-t-40">
                                <img src="<?php echo URL; ?>assets/bastu/<?php echo $bastu->image; ?>" class="img-responsive" alt="Image missing">
                            </div>
                            <div class="col-sm-10 col-xs-8 m-t-26">
                                <h4><?php echo $bastu->title; ?></h4>
                                <p><?php echo $bastu->description; ?></p>
                                <div class="row">
                                    <div class="col-md-6"><a href="<?php echo base_url(); ?>astrologer-details/appointment/santanu-sashtri/"><button type="button" class="btn btn-success col-md-12">Book Appointment</button></a></div>                                    
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
                    <?php $name =  $this->db->get_where("rashi_topic_list",array('id'=>$q1->topic_id))->row()->name; ?>
                        <a href="javascript:void(0)" class="insight-color" onclick="getAjaxRashiDetails(<?php echo $rashi_id; ?>,'<?php echo $name; ?>')">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i> &nbsp;<?php echo $name; ?>
                        </a>
                    </p>
                    <hr class="hr_margin">
                    <?php } ?>
                </div>
            </div>
            <div>
                <h1 class="aries_color  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">News &amp; Events</h1>
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
                                    <span><?php echo substr($q1->description,0,120)." &nbsp;<a href=''>Read More...</a>"; ?></span>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="aries_color  wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.1s">
                        Services
                    </h1>
                    <hr class="hr_margin">
                </div>
            </div>
            <div class="row common_margin">
                <div class="col-xs-12 font16">
                    
                    <?php $service = $this->db->get('astrology_service')->result(); ?>
                    <?php foreach($service as $ser){ ?>
                        <a href="<?php echo base_url(); ?>services/<?php echo $ser->id ?>/<?php echo strtolower(str_replace(" ", "-", $ser->name)); ?>"><p class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.1s">
                            <i class="fa fa-circle text-libra font14" aria-hidden="true"></i> &nbsp;                            
                            <span class="text-info"><?php echo $ser->name; ?></span>
                        </p></a>
                        <hr class="hr_margin">
                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getAjaxRashiDetails(rashi_id,slug)
    {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>astrologyajax/getajaxrashi/",
            data: {rashi:rashi_id,slug:slug},
            beforeSend: function() {
                // setting a timeout
                $('#rashiajaxdetails').html('<img src="<?php echo URL; ?>assets/site_assets/images/preloader.gif" alt="loader-missing">');
            },
            success: function(data) {
                $('#rashiajaxdetails').html(data);
            },
            error: function(xhr) { // if error occured
                
            },
            complete: function() {
                //$('#rashiajaxdetails').html("");
            },
            dataType: 'html'
        });
        
    }
</script>