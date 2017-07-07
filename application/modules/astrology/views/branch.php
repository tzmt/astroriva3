<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();    
  } );
  </script>
<section id="blog-details">
		<div class="container">
			<div class="row blog-item">								
				<div class="col-md-9 col-sm-7 blog-content">					
					<div class="entry-header">
						<h3>ASTROLOGY BRANCHES</h3>
					</div>
					<div>	
						<?php foreach($branch_list as $bran){ ?>
						<?php $image = $this->db->get_where('branch_image',array('branch_id'=>$bran->id))->row()->image;?>	
						<div class="col-md-4">
							<a href="<?php echo base_url(); ?>astrology/branches/<?php echo strtolower($bran->name); ?>/details/"><img src="<?php echo base_url(); ?>assets/branch/<?php echo $image; ?>" width="100%"/></a>
							<p style="text-align:center;margin-top:10px;margin-bottom:10px"><strong>Name:</strong> <?php echo $bran->name; ?></p>
						</div>	
						<?php } ?>		
					</div>
					
					
				</div>
				