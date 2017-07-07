<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<style>
table { 
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 100%; 
border-collapse: collapse;
 border-spacing: 0; 
}

td, th { 
border: 1px solid transparent; /* No more visible border */
height: 30px; 
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */ 
tr:nth-child(even) td { background: #F1F1F1;}   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
tr:nth-child(odd) td { background: #FEFEFE; }  

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
</style>
							
				<div class="col-md-9 col-sm-7 blog-content" style="margin-top: -78px;">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3>Order List</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<div class="col-md-12">	
									<table border="1px">																	
									<?php foreach($order_list as $key=> $list){ ?>
									<tr>
										<th style="text-align:center">Customer Name</th>
										<th style="text-align:center" colspan="3">Order Email</th>
									</tr>
									<tr>
										<td><?php echo $list->fname." ".$list->lname; ?></td>
										<td colspan="3"><?php echo $list->order_email; ?></td>
									</tr>
									<tr>
										<th style="text-align:center">Country</th>
										<th style="text-align:center">State</th>
										<th style="text-align:center">City</th>
										<th></th>
									</tr>
									<tr>
										<td><?php echo $this->db->get_where('countries',array('id'=>$list->country))->row()->name; ?></td>
										<td><?php echo $this->db->get_where('states',array('id'=>$list->state))->row()->name;  ?></td>
										<td><?php echo $this->db->get_where('cities',array('id'=>$list->city))->row()->name;  ?></td>
										<td></td>
									</tr>
									<tr>
										<th style="text-align:center">Address</th>
										<th style="text-align:center"  colspan="3">Phone</th>
									</tr>
									<tr>
										<td><?php echo $list->address; ?></td>
										<td  colspan="3"><?php echo $list->phone; ?></td>
									</tr>
									<tr>
										<th style="text-align:center">Product</th>
										<th style="text-align:center">Price</th>
										<th style="text-align:center">Quantity</th>	
										<th></th>									
									</tr>
									<?php $p =  explode(",",str_replace(")","",str_replace("(","",$list->products))); ?>
									<tr>
										<td><?php echo $this->db->get_where('shop_product',array('id'=>$p[0]))->row()->name; ?></td>
										<td><?php echo $list->price; ?></td>
										<td><?php echo $p[1]; ?></td>
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
				