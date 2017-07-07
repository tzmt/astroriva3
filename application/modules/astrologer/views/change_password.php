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
								<h3>Change Password</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>
								<form id="comment-form" class="row" name="comment-form" method="post" action="">

									<div class="col-md-12">	

										<div class="form-group">
											<label>Old Password</label>
											<input type="password" name="old_password" class="form-control" required="required" placeholder="Enter your old password..">
										</div>

										<div class="form-group">
											<label>New Password</label>
											<input type="password" name="new_password" class="form-control" required="required" placeholder="Enter new password..">
										</div>

										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="conf_password" class="form-control" required="required" placeholder="Re-enter new password..">
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
					
				</div>
				</div>
		</div>
	</section>
				