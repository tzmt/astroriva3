
	<!-- #/ Product's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2><small>Our Products</small>PRODUCT'S BRAND</h2>
					<p>Curabitur non nulla sit amet nisl tempus convallis quis lectus. Praesent sapien massa, convallis a pellen tesque nec, egestas non nisi. Mauris blandit aliquet elit, eget tincidunt ni dictum porta</p>
				</div>
			</div>	
			<div class="products">
				<ul id="product-list" class="row nav nav-tabs" role="tablist">
					<?php foreach($products as $prod){ ?>
					<?php $product_image = $this->db->limit(1)->get_where('product_images',array('product_id'=>$prod->id))->row()->image; ?>
					<li class="col-sm-3">
						<a class="product-image" href="<?php echo base_url(); ?>astrologer-details/<?php echo $this->uri->segment(2); ?>/<?php echo $this->uri->segment(3); ?>/products/<?php echo $prod->id; ?>/<?php echo strtolower(str_replace(" ","-",$prod->name)); ?>/">							
							<img src="<?php echo ASSETS; ?>products/<?php echo $product_image; ?>" width="231px" height="231px;" alt="<?php echo $prod->name; ?>" style="width:231px !important;height:231px !important;" />
						</a>
						<div class="product-name">
							<p><?php echo $prod->name ?> <span><i class="fa fa-rupee"></i> <?php echo $prod->price ?></span></p>
						</div>
					</li>
					<?php } ?>					
				</ul>
				<?php if(count($products)> 4){ ?>
				<div id="loadMore">
					<span>Load more</span>
				</div> 
				<?php } ?>
			</div>
		</div>
	</div><!-- #/ Product's Section -->

<script>
var i = 0;
function showAppointment()
{
	if(i == 0)
	{
		$('#showHide').css('display','block');
		i++
	}
	else
	{
		$('#showHide').css('display','none');
		i = 0;
	}
}
</script>