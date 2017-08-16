
<hr/>
        <div class="row text-center">

            <p>Delevoped By &nbsp;
                <a href="http://www.webscorb.com"

                   class="footer_color_variant" target="_blank">Webscorb.com</a></p>

        </div>

        <a href="#" class="back-to-top">

            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>

        </a>

    </div>

</section>

<!--=============== Footer Section End ===============-->

<script src="<?php echo URL; ?>assets/site_assets/js/jquery.min.js"></script>

<script src="<?php echo URL; ?>assets/site_assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo URL; ?>assets/site_assets/vendors/select2/js/select2.min.js"></script>

<script src="<?php echo URL; ?>assets/site_assets/vendors/swiper/js/swiper.min.js"></script>

<script src="<?php echo URL; ?>assets/site_assets/vendors/wow/js/wow.min.js"></script>

<script src="<?php echo URL; ?>assets/site_assets/vendors/sweetalert2/js/sweetalert2.min.js"></script>

<?php if($this->uri->segment(1) == 'contact'){ ?>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
	<script src="<?php echo base_url(); ?>assets/site_assets/vendors/gmap3/js/gmap3.min.js"></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'astrologer' || $this->uri->segment(1) == 'student'){ ?>
<script src="<?php echo base_url(); ?>assets/site_assets/cropping/croppie.js"></script>
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/site_assets/cropping/demo/prism.css" />        
<link rel="Stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/site_assets/cropping/croppie.css" />
<script src="<?php echo base_url(); ?>assets/site_assets/cropping/demo/prism.js"></script>
<script>
    $('.cr-slider').css('display','none');
    $('input[type="range"]').hide();
</script>
<?php } ?>

<?php if($this->uri->segment(1) == 'gallery'){ ?>
    <script src="<?php echo base_url(); ?>assets/site_assets/js/jquery.fancybox.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/site_assets/css/jquery.fancybox.min.css">
<?php } ?>

<?php if($this->uri->segment(2) == 'add_tips' || $this->uri->segment(2) == 'add_prediction' || $this->uri->segment(2) == 'add_market_prediction'){ ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
</script>
<?php } ?>

<?php if($this->uri->segment(1) == 'astrology-video-class'){ ?>
<script>
$('.close').click(function(){      
    $('iframe').attr('src', $('iframe').attr('src'));
});

$('.modal12534').on('hidden.bs.modal', function () {
  $('iframe').attr('src', $('iframe').attr('src'));
});
</script>
<?php } ?>

<!--=============== Custom Js Start ===============-->

<script src="<?php echo URL; ?>assets/site_assets/js/custom.js"></script>

<!--=============== Custom Js End ===============-->

</body>

</html>