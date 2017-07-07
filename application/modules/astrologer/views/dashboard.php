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
text-align: left;
padding-left: 10px;
}

/* Cells in even rows (2,4,6...) are one color */ 
tr:nth-child(even) td { background: #F1F1F1;}   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */ 
tr:nth-child(odd) td { background: #FEFEFE; }  

/*tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */*/
</style>							
				<div class="col-md-9 col-sm-7 blog-content">
					<?php //foreach($all_data as $dat){ ?>
					<div class="entry-header">										
						<h3>DETAILS</h3>						
					</div>
					<div class="entry-post">
						<table>
							<tr>
							    <th >Specification</th>
							    <th style=>Details</th>							    
							</tr>
							<tr>
								<td style="">Name</td>
								<td><?php echo $all_data->name; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $all_data->email; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?php echo $all_data->phone; ?></td>
							</tr>
							<tr>
								<td>Education</td>
								<td><?php echo $all_data->education; ?></td>
							</tr>
							<tr>
								<td>Specialization</td>
								<td><?php echo $all_data->specialization; ?></td>
							</tr>
							<tr>
								<td>Experience</td>
								<td><?php echo $all_data->experience; ?></td>
							</tr>
							<tr>
								<td>Details</td>
								<td><?php echo $all_data->details; ?></td>
							</tr>
						</table>
						
					</div>
					<hr/>
					<?php //} ?>
									
							
				</div>
				</div>
		</div>
	</section>
				