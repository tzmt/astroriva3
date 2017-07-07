<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<style>
table { 
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 70%; 
border-collapse: 
collapse; border-spacing: 0; 
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

/*tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */*/
</style>
							
				<div class="col-md-9 col-sm-7 blog-content" style="margin-top: -78px;">
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">
								<h3>Add Chamber</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-12">
										

										<div class="form-group">
											<label>Name</label>
											<input type="text" name="branch_name" class="form-control" required="required" placeholder="Branch name goes here..">                  
						                </div>

						                <div class="form-group">
											<label>Place</label>
											<input type="text" name="place" class="form-control" required="required" placeholder="Place goes here..">                  
						                </div>
										
						                <div class="form-inline">
											<div class="form-group">
												<label>Time From</label>												
												<select name="time_from" class="form-control" required="required">
													<?php for($i = 1; $i<=12; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php for($j = 5; $j<60; $j = $j+5){ ?>
													<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
													<?php } ?>
													<?php } ?>
												</select>
												<select name="time_from_day" class="form-control" required="required">
													<option value="am">AM</option>
													<option value="pm">PM</option>
												</select>
											</div>
											<div class="form-group">
												<label>To</label>
												<select name="time_to" class="form-control" required="required">
													<?php for($i = 1; $i<=12; $i++){ ?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
													<?php for($j = 5; $j<60; $j = $j+5){ ?>
													<option value="<?php echo $i.':'.$j; ?>"><?php echo $i.':'.$j; ?></option>
													<?php } ?>
													<?php } ?>
												</select>
												<select name="time_to_day" class="form-control" required="required">
													<option value="am">AM</option>
													<option value="pm">PM</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label>Which Day</label>
											<input type="text" name="day" class="form-control" required="required" placeholder="Day goes here.. Ex Monday, Tuesday,etc">
										</div>

										<div class="form-group">
											<label>Nearby Places</label>
											<input type="text" name="nearby_places" class="form-control" required="required" placeholder="Nearby places goes here..">
										</div>

										<div class="form-group">
											<label>Phone Number</label>
											<input type="number" name="phone1" class="form-control" maxlength="10" required="required" placeholder="Phone number goes here..">
										</div>

										<div class="form-group">
											<label>Phone Number</label>
											<input type="number" name="phone2" class="form-control" maxlength="10" placeholder="Phone number goes here.. (optional)">
										</div>

										<div class="form-group">
											<label>Phone Number</label>
											<input type="number" name="phone3" class="form-control" maxlength="10"  placeholder="Phone number goes here..  (optional)">
										</div>

										<div class="form-group">
											<label>Phone Number</label>
											<input type="number" name="phone4" class="form-control" maxlength="10" placeholder="Phone number goes here..  (optional)">
										</div>

									</div>
									
									<div class="col-md-12">									
										
										<div class="form-group">
											<button type="submit" class="btn btn-default pull-right">Submit</button>
										</div>
									</div>
									

								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->

					<div id="team" style="background:#fff !important"><!-- OUR ASTROLOGERS  -->

						<div class="container padding-bottom">

							<div class="row">

								<div class="section-title-two">

									<h2>YOUR CHAMBER LIST</h2>									

								</div>								
								<div class="col-md-12">
									<table>
										<tr>
										    <th style="text-align:center;">#</th>
										    <th style="text-align:center;">Branch Name</th>
										    <th style="text-align:center;">Place</th>
										    <th style="text-align:center;">Time</th>
										    <th style="text-align:center;">Nearby Place</th>
										    <th style="text-align:center;">Action</th>
										</tr>
										<?php foreach($all_data as $key=> $tip){ ?>
										<tr>
											<td><?php echo $key+1; ?></td>
											<td><?php echo $tip->branch_name; ?></td>
											<td><?php echo $tip->place; ?></td>
											<td><?php echo $tip->time; ?></td>
											<td><?php echo $tip->nearby_places; ?></td>
											<td><a href="<?php echo base_url(); ?>astrologer/delete_branch/<?php echo $tip->id; ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
										</tr>	
										<?php } ?>
									</table>
								</div>													

							</div>

						</div>

					</div><!-- #/ Team  -->
				</div>
				</div>
		</div>
	</section>
				