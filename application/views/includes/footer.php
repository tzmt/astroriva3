
<hr/>
        <div class="row text-center">

            <p>made with &nbsp;<img src="<?php echo base_url(); ?>assets/site_assets/images/heartf.png" alt="heart loading"/>&nbsp; by

                <a href="http://www.webscorb.com"

                   class="footer_color_variant">Webscorb.com</a></p>

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

<script src="<?php echo URL; ?>assets/site_assets/vendors/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<script src="<?php echo URL; ?>assets/site_assets/vendors/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<?php if($this->uri->segment(1) == 'contact'){ ?>
	<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>
	<script src="<?php echo base_url(); ?>assets/site_assets/vendors/gmap3/js/gmap3.min.js"></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'astrologer'){ ?>
<script src="<?php echo base_url(); ?>assets/site_assets/js/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/site_assets/js/jquery.form.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/site_assets/css/imgareaselect.css">
<script src="<?php echo base_url(); ?>assets/site_assets/js/image_crop.js"></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'gallery'){ ?>
<script src="<?php echo base_url(); ?>assets/site_assets/js/jquery.fancybox.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/site_assets/css/jquery.fancybox.min.css">
<?php } ?>
<!--=============== Custom Js Start ===============-->

<script src="<?php echo URL; ?>assets/site_assets/js/custom.js"></script>

<!--=============== Custom Js End ===============-->

</body>

</html>