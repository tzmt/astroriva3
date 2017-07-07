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
<section class="home_bg">
	<div class="container">
		<div class="container padding-bottom">
				<div class="row text-center">
					<div class="col-sm-12 section-title-two">
						<h2>SHIKSHA</h2>
					</div>		
					<table>
						<tr>
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
				