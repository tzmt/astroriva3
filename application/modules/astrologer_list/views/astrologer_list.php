<?php
	$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
	);
?>
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
                        <span class="font13">Astrologers</span>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13"><?php echo ucwords($this->uri->segment(3)); ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">
		<div id="team" style="margin-top:50px;">

			<div class="container padding-bottom">
				<div class="row text-center">

					<div class="col-md-3">
						<form method="GET" action="<?php echo base_url(); ?>astrologer/search" autocomplete="off">
							<label>Search By Name</label>
							<input type="text" name="search" class="form-control" onkeyup="astro_search(this.value)" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search Astrologer" style="text-align: center;font-size: 20px" />
							<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						</form>
					</div>

					<div class="col-md-3">
						<?php
							$q = $this->db->query('SELECT distinct place FROM astro_astrologer_branch')->result();
							$arr = array();
							foreach($q as $q1)
							{
								$exp = explode(",",$q1->place);
								foreach($exp as $ex)
								{
									$arr[] = trim($ex);
								}
							}
							array_unique($arr);
						?>
						<form autocomplete="off">
							<label>Search By Place</label>
							<select class="form-control" onchange="astro_search1(this.value)" style="text-align: center;font-size: 20px">
								<option value="">--Select--</option>
								<?php foreach($arr as $ar){ ?>
									<option value="<?php echo $ar; ?>"><?php echo $ar; ?></option>
									
								<?php } ?>
							</select>
						</form>
					</div>

					<div class="col-sm-12 section-title-two">

						<h2>OUR <?php echo strtoupper($this->uri->segment(3)); ?> ASTROLOGERS</h2>					

					</div>		
					<div  id="results">		
						<div class='row'>
							<?php $i = 1; foreach($astrologers as $ast){ ?>				
							
								<div class="col-md-2" style="margin-bottom: 10px;">
									<div class="team-member">
										<div class="col-md-12" style="margin-bottom: 15px;">
											<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" alt="<?php echo $ast->name; ?>" width="100%" style="padding: 5px;background: #eee; height: 100%"/>	
										</div>
										<div class="member-text">			
											<h5><?php echo $ast->name; ?></h5>
											<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">View</a> | <a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">Products</a></h6>																
										</div>						
									</div>
								</div>
							<?php if($i%6 == 0){ echo "</div><div class='row'>";} ?>

							<?php $i++; } ?>	
						</div>

					

				</div>

			</div>

		</div><!-- #/ Team  -->
	</div>
</section>
<script>
	function astro_search(val)
	{
		if(val.length > 2)
		{
			$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url(); ?>astrologer_list/getajaxastrologer/",
	            data: {slug:val},
	            beforeSend: function() {
	                // setting a timeout
	                $('#rashiajaxdetails').html('<img src="<?php echo URL; ?>assets/site_assets/images/preloader.gif" alt="loader-missing">');
	            },
	            success: function(data) {
	                $('#results').html(data);
	            },
	            error: function(xhr) { // if error occured
	                
	            },
	            complete: function() {
	                //$('#rashiajaxdetails').html("");
	            },
	            dataType: 'html'
	        });
		}
	}

	function astro_search1(val)
	{
		if(val.length > 2)
		{
			$.ajax({
	            type: 'POST',
	            url: "<?php echo base_url(); ?>astrologer_list/getajaxastrologer1/",
	            data: {slug:val},
	            beforeSend: function() {
	                // setting a timeout
	                $('#rashiajaxdetails').html('<img src="<?php echo URL; ?>assets/site_assets/images/preloader.gif" alt="loader-missing">');
	            },
	            success: function(data) {
	                $('#results').html(data);
	            },
	            error: function(xhr) { // if error occured
	                
	            },
	            complete: function() {
	                //$('#rashiajaxdetails').html("");
	            },
	            dataType: 'html'
	        });
		}
	}
</script>