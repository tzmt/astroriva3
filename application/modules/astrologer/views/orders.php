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
                        <span class="active text-primary font13">Orders</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>	
	<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>				
				<div class="col-md-9 col-sm-7 blog-content" >
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3></h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<div class="col-md-12">	
									<table class="table table-bordered">																	
									<?php foreach($order_list as $key=> $list){ ?>
									<tr>
										<th style="text-align:center">Customer Name</th>
										<th style="text-align:center" colspan="3">Order Email</th>
									</tr>
									<tr>
										<td style="text-align:center"><?php echo $list->fname." ".$list->lname; ?></td>
										<td colspan="3" style="text-align:center"><?php echo $list->order_email; ?></td>
									</tr>
									<tr>
										<th style="text-align:center">Country</th>
										<th style="text-align:center">State</th>
										<th style="text-align:center">City</th>
										<th></th>
									</tr>
									<tr>
										<td style="text-align:center"><?php echo $this->db->get_where('countries',array('id'=>$list->country))->row()->name; ?></td>
										<td style="text-align:center"><?php echo $this->db->get_where('states',array('id'=>$list->state))->row()->name;  ?></td>
										<td style="text-align:center"><?php echo $this->db->get_where('cities',array('id'=>$list->city))->row()->name;  ?></td>
										<td></td>
									</tr>
									<tr>
										<th style="text-align:center">Address</th>
										<th style="text-align:center"  colspan="3">Phone</th>
									</tr>
									<tr>
										<td style="text-align:center"><?php echo $list->address; ?></td>
										<td  colspan="3" style="text-align:center"><?php echo $list->phone; ?></td>
									</tr>
									<tr>
										<th style="text-align:center">Product</th>
										<th style="text-align:center">Price</th>
										<th style="text-align:center">Quantity</th>	
										<th></th>									
									</tr>
									<?php $p =  explode(",",str_replace(")","",str_replace("(","",$list->products))); ?>
									<tr>
										<td style="text-align:center"><?php echo $this->db->get_where('shop_product',array('id'=>$p[0]))->row()->name; ?></td>
										<td style="text-align:center"><?php echo $list->price; ?></td>
										<td style="text-align:center"><?php echo $p[1]; ?></td>
										<td><a href="<?php echo base_url(); ?>astrologer/delete_order/<?php echo $list->id; ?>/<?php //echo $list->image; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
									</tr>	
									<tr>
										<td style="background:#000 !important"></td><td style="background:#000 !important"></td><td style="background:#000 !important"></td><td style="background:#000 !important"></td>
									</tr>								
										
									<?php } ?>
									</table>
									
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->					
				</div>
				</div>
		</div>
	</section>
				