<div class="col-sm-3">
				<div class="left-sidebar">
					<h2></h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div>
                            <?php $image = $this->db->select('image')->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row()->image; ?>
                            <?php //echo $this->db->last_query();;exit(); ?>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#profile" ><img src="<?php echo base_url(); ?>assets/student/<?php echo $image; ?>" width="100%" height="250px" style="width:100%;height:250px"/></a>
                            <p style="text-align:center;font-size:12px;"><a href="javascript:void(0)" data-toggle="modal" data-target="#profile" style="color:blue !important">Click the Image to Change</a></p>                            
                        </div>
						
						<div class="panel panel-default">	
							<ul class="nav navbar-stacked">
								<?php $page = $this->uri->segment(2); ?>
								<li <?php if($page == "") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>student/">Dashboard</a></li>
								<li <?php if($page == "profile") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>student/profile/">Update Profile</a></li>
                            	<li <?php if($page == "apply") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>student/apply/">Apply For Exam</a></li>                           
                            	<li <?php if($page == "change_password") echo "style='background:#eee'"; ?>><a href="<?php echo base_url(); ?>student/change_password/">Change Password</a></li>
							</ul>								
						</div>
											
					</div><!--/category-productsr-->
				</div>
				<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top:20%">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
				      </div>
				      <div class="modal-body">        
				        <form id="contact-form" name="contact-form" method="post" action="<?php echo base_url(); ?>student/changePhoto/" enctype="multipart/form-data">
				            <div class="col-sm-12 form-group">
				                <input type="file" name="userfile" class="form-control" required="required" >                
				                <p>Maximum Size Allowed: 200 Kb</p>
				            </div>                   
				      </div>
				      <div class="modal-footer" style="border-top: none">       
				        <button type="submit" class="btn btn-success">Upload</button>        
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>        
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
				
			</div>	