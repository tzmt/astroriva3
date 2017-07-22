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
                        <span class="active text-primary font13">Siksha</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
	<div class="container">
		<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">
						<h2>SHIKSHA</h2>
					</div>		
            		<table class="table table-bordered">					
						<tr class="bg-info" style="color: #fff">
						    <th style="text-align:center;">#</th>
						    <th style="text-align:center;">Name</th>
						    <th style="text-align:center;">Duration</th>
						    <th style="text-align:center;">Syllabus</th>
						    <th style="text-align:center;">Fee</th>
						    <th style="text-align:center;">Total Class</th>
						</tr>
						<?php foreach($course_list as $key=> $course){ ?>
						<tr>
							<td style="padding:10px"><?php echo $key+1; ?></td>
							<td style="padding:10px"><?php echo $course->name; ?></td>
							<td style="padding:10px"><?php echo $course->duration; ?> months</td>							
							<td style="padding:10px"><a href="<?php echo base_url().'assets/syllabus/'.$course->syllabus; ?>" style="color:#000" target="_blank">Download</a></td>
							<td style="padding:10px">Rs. <?php echo $course->fee; ?></td>
							<td style="padding:10px"><?php echo $course->total_class; ?></td>
						</tr>
						<tr>
							<td colspan="6" style="text-align:left;padding:10px"><strong>Details: </strong><?php echo $course->details; ?></td>
						</tr>

						<?php } ?>
					</table>

			</div>
		</div>
	</div>
<br/></br/></br>
</section>
				