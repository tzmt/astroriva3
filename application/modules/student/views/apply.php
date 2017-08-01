<section class="index_center card_text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="m-t-20 bg-white breadcrumb text-center">
                    <li>
                        <a href="<?php echo base_url(); ?>student/" class="font13">Home</a>
                    </li>
                    <li>
                        <img src="<?php echo base_url(); ?>assets/site_assets/images/right-arrow1.png" alt="arrow" class="blog_right_arrow">
                    </li>
                    <li>
                        <span class="active text-primary font13">Apply For Exam</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
	<div class="container">
		<div class="row">
			<?php require "sidebar.php"; ?>					
				<div class="col-md-9 col-sm-7 blog-content">
					<h3></h3>
					<div class="replay-box">
						<div class="row">
							<div class="col-md-12">								
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>	
								<?php
									$csrf = array(
									        'name' => $this->security->get_csrf_token_name(),
									        'hash' => $this->security->get_csrf_hash()
									);
								?>								
									<div class="col-md-12">	
										<?php $user = $this->db->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row(); ?>
										<?php if($user->course_id == 0){ ?>
										<form id="comment-form" class="row" name="comment-form" method="POST" action="">
						                <table class="table table-bordered">
											<tr>
											    <th style="text-align:center;">#</th>
											    <th style="text-align:center;">Name</th>
											    <th style="text-align:center;">Duration</th>
											    <th style="text-align:center;">Details</th>
											    <th style="text-align:center;">Syllabus</th>
											    <th style="text-align:center;">Fee</th>
											    <th style="text-align:center;">Total Class</th>
											</tr>
											<?php foreach($course_list as $key=> $course){ ?>
											<tr>
												<td><input type="radio" value="<?php echo $course->id ?>" name="course_id"/></td>
												<td><?php echo $course->name; ?></td>
												<td><?php echo $course->duration; ?> months</td>
												<td><?php echo $course->details; ?></td>
												<td><a href="<?php echo base_url().'assets/syllabus/'.$course->syllabus; ?>" style="color:#000" target="_blank">Download</a></td>
												<td><?php echo $course->fee; ?></td>
												<td><?php echo $course->total_class; ?></td>
											</tr>	
											<?php } ?>
										</table>

									

									</div>
									
									<div class="col-md-12">								
										
										<div class="form-group">
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
											<button type="submit" class="btn btn-default pull-right">Apply</button>
										</div>
									</div>
								</form>
								<?php }else { ?>
								<div class="col-md-12">
									<?php $course = $this->db->get_where('course_books',array('course_id'=>$user->course_id))->result(); ?>
									<p>You have already selected <strong><?php echo $this->db->get_where('course',array('id'=>$user->course_id))->row()->name; ?></strong> as your course.</p>

									<h3>Books</h3>
									<table class="table table-bordered">
											
										<?php $i = 1; foreach($course as $cor){ ?>
										<tr>
											<td><?php echo $this->db->get_where('course',array('id'=>$cor->course_id))->row()->name;  ?></td>
											<td><a href="<?php echo base_url().'assets/books/'.$cor->books; ?>" target="_blank" style="color:orange">Download <?php echo $i; ?></a></td>
										</tr>	
										<?php } ?>
									</table>
									
								</div>
								<?php } ?>
							</div>
						</div>
					</div><!--/Repaly Box-->
					
				</div>
				</div>
		</div>
	</section>
				