

<div class="col-sm-3">
				<div class="left-sidebar">
					<h2></h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div>
                            <?php $image = $this->db->select('image')->get_where('astrologer',array('id'=>$this->session->userdata('astro_astrologer')->id))->row()->image; ?>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#profile" ><img src="<?php echo base_url(); ?>assets/astrologer/<?php echo $image; ?>" id="dpimage" width="100%" height="250px" style="width:100%;height:250px"/></a>

                            <p style="text-align:center;font-size:12px;"><a href="javascript:void(0)" data-toggle="modal" data-target="#profile" style="color:blue !important">Click the Image to Change</a></p>

                            <p><div style="width:100%;height:30px;background:
                            <?php
	                            if($this->session->userdata('astro_astrologer')->status == 1)
	                            {
	                            	echo '#1ecbf0';
	                        	}
	                        	else if($this->session->userdata('astro_astrologer')->status == 2)
	                    		{
	                    			echo "#fa68f5";
	                    		}
	                			else
	                			{
	                				echo "#eddf07";
	            				}
            				?>;border-radius:10px;-moz-border-radius:10px;-webkit-border-radius:10px;-ms-border-radius:10px;-o-border-radius:10px;color:#fff;text-align:center;font-weight:bold;padding-top: 4px;">Type:
            				<?php
	                            if($this->session->userdata('astro_astrologer')->status == 0)
	                            {
	                            	echo 'Normal';
	                        	}
	                        	else if($this->session->userdata('astro_astrologer')->status == 1)
	                    		{
	                    			echo "Premium";
	                    		}
	                			else
	                			{
	                				echo "Panneled";
	            				}
            				?>
            				</div></p>
                        </div>
						
						<div class="panel panel-default">	
							<ul class="nav navbar-stacked">
								<?php $page = $this->uri->segment(2); ?>
								<li <?php if($page == "" || $page == "dashboard") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/">Dashboard</a></li>

	                            <li <?php if($page == "profile") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/profile/">Update Profile</a></li>

	                            <li <?php if($page == "add_branch") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/add_branch/">Add Chamber</a></li>

	                            <li <?php if($page == "add_tips") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/add_tips/">Add Tips</a></li>

	                            <li <?php if($page == "add_prediction") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/add_prediction/">Add Prediction</a></li>

	                            <li <?php if($page == "add_market_prediction") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/add_market_prediction/">Add Market Prediction</a></li>

	                            <?php if($this->session->userdata('astro_astrologer')->status == 1 || $this->session->userdata('astro_astrologer')->status == 2){ ?>

	                            <li <?php if($page == "upload_products") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/upload_products/">Upload Products <img src="<?php echo base_url(); ?>assets/images/new.gif" /></a></li>

	                            <li <?php if($page == "list_products") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/list_products/">Product Listing <img src="<?php echo base_url(); ?>assets/images/new.gif" /></a></li>

	                            <li <?php if($page == "orders") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/orders/">Orders <img src="<?php echo base_url(); ?>assets/images/new.gif" /></a></li>
	                            <?php }else{ ?>

	                            <li <?php if($page == "upgrade") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/upgrade/">Upgrade Account</a></li>
	                            <?php } ?>

	                            <li <?php if($page == "change_password") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>astrologer/change_password/">Change Password</a></li>
							</ul>								
						</div>
											
					</div><!--/category-productsr-->
				</div>
				<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
				      </div>
				      <div class="modal-body">   
				      <?php
							$csrf = array(
							        'name' => $this->security->get_csrf_token_name(),
							        'hash' => $this->security->get_csrf_hash()
							);
						?>	     
				        <form name="contact-form" method="post" onsubmit="return cropImage()" enctype="multipart/form-data">
				            <div class="col-sm-12 form-group">
				                <input type="file" name="userfile" id="upload"  class="form-control" required="required" >
				                <p>Maximum Size Allowed: 200 Kb</p>

				                <!-- <input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="1" />
								<input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
								<input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
								<input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
								<input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
								<input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="250" />
								<input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="250" />
								<input type="hidden" name="action" value="" id="action" />
								<input type="hidden" name="image_name" value="" id="image_name" />
								<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

								<div id='preview-profile-pic'></div>
								<div id="thumbs" style="padding:5px; width:600px"></div> -->

								<div id="upload-demo" style="margin-bottom: 50px;"></div>								
								   

				            </div>                   
				      </div>
				      <div class="modal-footer" style="border-top: none;margin-top: 50px;">   
				      <br/><br/><br/>    
				        <button type="submit" class="btn btn-success upload-result">Crop &amp; Upload</button>        
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
				
			</div>

<script src="<?php echo URL; ?>assets/site_assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/site_assets/cropping/croppie.js"></script>

<script type="text/javascript">

function readFile(input)
{
	if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
			$('.upload-demo').addClass('ready');
        	$uploadCrop.croppie('bind', {
        		url: e.target.result
        	}).then(function(){
        		$('.cr-slider').show();
        		$('.croppie-container').css('width','100%').css('height','250px');
        	});
        	
        }
        
        reader.readAsDataURL(input.files[0]);
    }
    else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

$uploadCrop = $('#upload-demo').croppie({
	viewport: {
		width: 200,
		height: 200,
		type: 'square'
	},
	enableExif: true
});


$('#upload').on('change', function () { readFile(this); });

function cropImage(){
	$('.upload-result').on('click', function (ev) {

		$uploadCrop.croppie('result', {

			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {			
			$.post('<?php echo base_url(); ?>astrologer/changePhoto',{image:resp},function(data){
				$('#dpimage').attr('src',resp);
				$('#profile').modal('toggle');
			});
		});
	});
	return false;
}
</script>