<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<style>
table { 
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 100%; 
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
								<h3>Apply For Exam</h3>
								<?php if($this->session->flashdata('error')){ ?>
								<div style="padding:10px;background:#f8dcdc;color:red;margin-bottom:10px;text-align:center;border:1px solid red"><?php echo $this->session->flashdata('error'); ?></div>
								<?php } ?>
								<?php if($this->session->flashdata('success')){ ?>
								<div style="padding:10px;background:#c1f8c6;color:green;margin-bottom:10px;text-align:center;border:1px solid green"><?php echo $this->session->flashdata('success'); ?></div>
								<?php } ?>								
									<div class="col-md-12">	
										<?php $user = $this->db->get_where('student',array('id'=>$this->session->userdata('astro_student')->id))->row(); ?>
										<?php if($user->course_id == 0){ ?>
										<form id="comment-form" class="row" name="comment-form" method="POST" action="">
						                <table>
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
											<button type="submit" class="btn btn-default pull-right">Apply</button>
										</div>
									</div>
								</form>
								<?php } ?>
								<div class="col-md-12">
									<?php $course = $this->db->get_where('course_books',array('course_id'=>$user->course_id))->result(); ?>
									<p>You have already selected <strong><?php echo $this->db->get_where('course',array('id'=>$user->course_id))->row()->name; ?></strong> as your course.</p>
									<h3>Books</h3>
									<?php $i = 1; foreach($course as $cor){ ?>
									<h5><a href="<?php echo base_url().'assets/books/'.$cor->books; ?>" target="_blank" style="color:orange">Download <?php echo $i; ?></a></h5>
									<?php $i++;} ?>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->
					
				</div>
				</div>
		</div>
	</section>
				