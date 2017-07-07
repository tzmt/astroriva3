<section class="home_bg">
	<div class="container">
    <form action="http://dev.lorvent.com/astrology/contact.php" method="post">
        <div class="row">
            <div class="col-md-12 m-t-26">
                <h1 class="text-primary">Send a Message</h1>
                <hr>
            </div>
        </div>
        <div class="row m-t-20">
            <div class="col-md-12">
                <img src="<?php echo base_url(); ?>assets/site_assets/images/Contact-Line-Stripe.jpg" alt="loading" class="img-responsive">
            </div>
        </div>
        <div class="row content_margin con_pad">
	        <form id="contact-form" name="contact-form" method="post" action="#">   
	        <?php if($this->session->flashdata('error')){ ?>

				<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>

				<?php } ?>

				<?php if($this->session->flashdata('success')){ ?>

				<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>

				<?php } ?>
	            <div class="col-md-4 contact_block">
	                <div>  

	                    <label for="contact_name" class="text-info label_align">Name:</label>
	                    <input type="text" name="name" id="contact_name" class="contact_name form-control" required="required" placeholder="Your Name">

	                    <label for="contact_email" class="text-info label_align">Email:</label>
	                    <input type="email" name="email" id="contact_email" class="contact_email form-control" required="required" placeholder="Your Email">

	                    <label for="contact_email" class="text-info label_align">Subject:</label>
	                    <input type="email" name="email" id="contact_email" class="contact_email form-control" required="required" placeholder="Your Subject">
	                </div>
	            </div>
	            <div class="col-md-8 contact_block">
	                <div>
	                    <label for="contact_text" class="text-info content_margin">Message:</label>
	                    <textarea name="message" id="contact_text" cols="30" rows="8" class="form-control"
	                              placeholder="Your message comes here.."></textarea>
	                </div>
	            </div>
	        </form>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="align_btn contact_block text-center">
                    <input type="submit" class="btn btn-sm btn-primary content_margin m-b-25" value="Send Now">
                </div>
            </div>
        </div>
    </form>
</div>
	<div id="contact_map" class="button_margin"></div>
</section>