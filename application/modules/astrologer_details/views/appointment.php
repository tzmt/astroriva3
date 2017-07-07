<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
<style>
  #datepicker > .ui-datepicker {    
    padding: 0.2em 0.2em 0;
    width: 100%;
}
#horoscope, #matchmaking, #showPurpose{display: none;}
</style>
	<!-- #/ Director's Section -->
	<div id="shop">
		<div class="container padding-top padding-bottom">
			<div class="row section-title text-center">				
			</div>	
			<div class="products">				
				<div class="tab-content">
					<div class="tab-pane fade in active" id="product1">						
						<div class="row">
							<h2>Book Appointment</h2>	
							<?php if($this->session->flashdata('error')){ ?>
							<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
							<?php } ?>
							<?php if($this->session->flashdata('success')){ ?>
							<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
							<?php } ?>						
							<div class="col-sm-6">
									<div class="col-sm-12 form-group">  
										<label>Select Branch/Place</label>   
										<?php
						                		$today = date("Y-m-d");    
					                	 		$q = $this->db->query("SELECT DISTINCT place FROM acharya_branch")->result(); 					                	 		
						                	?>           
						                <select name="type" id="purpose" required="required" class="form-control" onchange="getDates(this.value)">						                	
						                    <option value="">[Select]</option>
						                    <?php foreach($q as $q1){ ?>
							                    <option value="<?php echo $q1->place; ?>"><?php echo $q1->place; ?></option>
						                    <?php } ?>
						                </select>
						            </div>

									<div class="col-sm-12 form-group" id="showPurpose">  
										<label>Purpose of Appointment</label>              
						                <select name="type" id="purpose" required="required" class="form-control" onchange="showForm(this.value)">
						                    <option value="">[Select]</option>
						                    <option value="1">General Horoscope</option>
						                    <option value="2">MatchMaking</option>
						                </select>
						            </div>
									<div id="horoscope">
										<form id="comment-form" class="row" name="comment-form" method="post" action="">
											<div class="col-md-6">
												<div class="form-group">
													<label>Name</label>  
													<input type="text" name="name1" class="form-control" required="required" placeholder="Enter Name">
													<input type="hidden" name="purpose" id="purposeof" required/>
													<input type="hidden" name="date" id="datevalue" />
												</div>
												<div class="form-group">
													<label>Date of Birth</label>  
													<input type="text" name="dob1" class="form-control datepicker" required="required" placeholder="Enter Date Of Birth">
												</div>
												<div class="form-group">
													<label>Place of Birth</label>  
													<input type="text" name="pob1" class="form-control" required="required" placeholder="Enter Place Of Birth">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Time of Birth</label>  
													<input type="text" name="tob1" class="form-control" required="required" placeholder="Enter Time of Birth including am or pm">
												</div>
												<div class="form-group">
													<label>City</label>  
													<input type="text" name="city1" class="form-control" required="required" placeholder="Enter City">
												</div>

												<div class="form-group">
													<label>Phone Number</label>  
													<input type="number" name="phone1" class="form-control" required="required" placeholder="Enter Phone Number" maxlength="10">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Email Id</label>  
													<input type="email" name="email" class="form-control" required="required" placeholder="Enter Email id">
												</div>
												<div class="form-group">
													<label>Comments</label>  
													<textarea name="comments" class="form-control" required="required" placeholder="Enter any kind of details..."></textarea>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-default pull-right">Submit</button>
												</div>
											</div>
										</form>
									</div>
									<div id="matchmaking">
										<form id="comment-form" class="row" name="comment-form" method="post" action="<?php echo base_url(); ?>astrologer-details/appointment1/santanu-sashtri">
											<div class="col-md-6">
												<label style="color:blue">Partner 1 Details</label>
												<div class="form-group">
													<label>Name</label>  
													<input type="text" name="name1" class="form-control" required="required" placeholder="Enter Name">
													<input type="hidden" name="purpose" id="purposeof" required/>
													<input type="hidden" name="place" id="branch_place" required/>													
												</div>
												<div class="form-group">
													<label>Date of Birth</label>  
													<input type="text" name="dob1" class="form-control datepicker" required="required" placeholder="Enter Date Of Birth">
												</div>
												<div class="form-group">
													<label>Place of Birth</label>  
													<input type="text" name="pob1" class="form-control" required="required" placeholder="Enter Place Of Birth">
												</div>
												<div class="form-group">
													<label>Time of Birth</label>  
													<input type="text" name="tob1" class="form-control" required="required" placeholder="Enter Time of Birth including am or pm">
												</div>
												<div class="form-group">
													<label>City</label>  
													<input type="text" name="city1" class="form-control" required="required" placeholder="Enter City">
												</div>
											</div>
											<div class="col-md-6">
												<label style="color:blue">Partner 2 Details</label>
												<div class="form-group">
													<label>Name</label>  
													<input type="text" name="name2" class="form-control" required="required" placeholder="Enter Name">
													<input type="hidden" name="date" id="datevalue1" required/>
												</div>
												<div class="form-group">
													<label>Date of Birth</label>  
													<input type="text" name="dob2" class="form-control datepicker" required="required" placeholder="Enter Date Of Birth">
												</div>
												<div class="form-group">
													<label>Place of Birth</label>  
													<input type="text" name="pob2" class="form-control" required="required" placeholder="Enter Place Of Birth">
												</div>
												<div class="form-group">
													<label>Time of Birth</label>  
													<input type="text" name="tob2" class="form-control" required="required" placeholder="Enter Time of Birth including am or pm">
												</div>
												<div class="form-group">
													<label>City</label>  
													<input type="text" name="city2" class="form-control" required="required" placeholder="Enter City">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label>Email Id</label>  
													<input type="email" name="email" class="form-control" required="required" placeholder="Enter Email id">
												</div>
												<div class="form-group">
													<label>Phone Number</label>  
													<input type="number" name="phone1" class="form-control" required="required" placeholder="Enter Phone Number" maxlength="10">
												</div>
												<div class="form-group">
													<label>Comments</label>  
													<textarea name="comments" class="form-control" required="required" placeholder="Enter any kind of details..."></textarea>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-default pull-right">Submit</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							<div class="col-sm-6" id="datepicker"></div>							
						</div>
					</div>					
			</div>
		</div>
	</div><!-- #/ Director's Section -->
		
	<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PREMIUM ASTROLOGERS</h2>
					<p>The Group of Famous astrologers to solve Every problems in your Life and to overcome all the hurdles of Life.</p>
				</div>				
				<?php foreach($premium_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
							<h6><?php echo $ast->phone; ?></h6>
						</div>						
					</div>
				</div>
				<?php } ?>
				<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
					<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/premium"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
				</div>	
				
			</div>
		</div>
	</div><!-- #/ Team  -->

	
	
	<div id="team"><!-- OUR ASTROLOGERS  -->
		<div class="container padding-bottom">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2 section-title-two">
					<h2>OUR PANNELLED ASTROLOGERS</h2>
					<p>The Group of Famous astrologers to solve Every problems in your Life and to overcome all the hurdles of Life.</p>
				</div>				
				<?php foreach($pannelled_astrologers as $ast){ ?>				
				<div class="col-sm-3">
					<div class="team-member">
						<img src="<?php echo ASSETS; ?>astrologer/<?php echo $ast->image; ?>" width="263px" height="263px;" alt="<?php echo $ast->name; ?>" style="width:263px !important;height:263px !important;" />						
						<div class="member-text">							
							<h5><?php echo $ast->name; ?></h5>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>">VIEW DETAILS</a></h6>
							<h6><a href="<?php echo base_url(); ?>astrologer-details/<?php echo $ast->id; ?>/<?php echo strtolower(str_replace(" ","-",$ast->name)); ?>/products/">PRODUTCS</a></h6>
							<h6><?php echo $ast->phone; ?></h6>
						</div>						
					</div>
				</div>
				<?php } ?>
				<div class="col-sm-8 col-sm-offset-2 section-title-two text-center">					
					<p><br/><a href="<?php echo base_url(); ?>astrologer/list-astrologer/pannelled"><img src="<?php echo base_url(); ?>assets/images/view_more.jpg"/></a></p>
				</div>
				
			</div>
		</div>
	</div><!-- #/ Team  -->
	
	

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
						<a class="product-image" href="<?php echo base_url(); ?>shop/details/<?php echo str_replace(" ","-",$prod->name); ?>">							
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
function showForm(value)
{
	if(value == 1)
	{
		$('#horoscope').css('display','block');
		$('#matchmaking').css('display','none');
		$('#purposeof').val('1');
	}
	else
	{
		$('#matchmaking').css('display','block');	
		$('#horoscope').css('display','none');
		$('#purposeof').val('2');
	}
}

function getDates(place)
{
	if(place !="")
	{
		$('#branch_place').val(place);
		$.ajax({
	      type:"POST",
	      url:"<?php echo base_url();?>astrologer_details/getDates/",
	      data:{ place: place},
	      success: function (data1){
	        //alert(data1);
	        var array = data1;
	        $('#showPurpose').css('display','block');	
		    $( "#datepicker" ).datepicker({
			    beforeShowDay: function(date){
			        var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
			        return [ array.indexOf(string) != -1  ]
			    },
			    minDate: 0,
			    onSelect: function(dateText, inst) { 
			        $('#datevalue,#datevalue1').val(dateText);
			    },
			    dateFormat:"yy-mm-dd"
			});
	      }
	    });
	}
	else
	{
		$('#branch_place').val('');
		$('#showPurpose').css('display','none');	
	}
	
	

}
</script>