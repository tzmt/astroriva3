<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>astrologer/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Contact</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
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
	        <form name="contact-form" method="post" action="<?php echo base_url(); ?>contact/">   
	        <?php if($this->session->flashdata('error')){ ?>
				<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
				<?php } ?>

				<?php if($this->session->flashdata('success')){ ?>
				<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
				<?php } ?>

                <?php
                    $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                    );
                ?>  

	            <div class="col-md-4 contact_block">
	                <div>  

	                    <label for="contact_name" class="text-info label_align">Name:</label>
	                    <input type="text" name="name" class="contact_name form-control" required="required" placeholder="Your Name">
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

	                    <label for="contact_email" class="text-info label_align">Email:</label>
	                    <input type="email" name="email" class="contact_email form-control" required="required" placeholder="Your Email">

	                    <label for="contact_email" class="text-info label_align">Subject:</label>
	                    <input type="email" name="email" class="contact_email form-control" required="required" placeholder="Your Subject">
	                </div>
	            </div>
	            <div class="col-md-8 contact_block">
	                <div>
	                    <label for="contact_text" class="text-info content_margin">Message:</label>
	                    <textarea name="message" cols="30" rows="8" class="form-control"
	                              placeholder="Your message comes here.."></textarea>
	                </div>
	            </div>	        
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