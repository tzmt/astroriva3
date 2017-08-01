<!-- Chosen -->
<link href="<?php echo ASSETS; ?>css/chosen/chosen.min.css" rel="stylesheet"/>

<!-- Datepicker -->
<link href="<?php echo ASSETS; ?>css/datepicker.css" rel="stylesheet"/>

<!-- Timepicker -->
<link href="<?php echo ASSETS; ?>css/bootstrap-timepicker.css" rel="stylesheet"/>

<!-- Slider -->
<link href="<?php echo ASSETS; ?>css/slider.css" rel="stylesheet"/>

<!-- Tag input -->
<link href="<?php echo ASSETS; ?>css/jquery.tagsinput.css" rel="stylesheet"/>

<!-- WYSIHTML5 -->
<link href="<?php echo ASSETS; ?>css/bootstrap-wysihtml5.css" rel="stylesheet"/>

<!-- Dropzone -->
<link href='<?php echo ASSETS; ?>css/dropzone/dropzone.css' rel="stylesheet"/>

<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Rashi Management</a></li>
					 <li class="active">Add Topic</li>	 
				</ul>
			</div><!-- breadcrumb -->
			<div class="padding-md">
				<div class="row">	
				<?php if($this->session->flashdata('success')){ ?>
					<div class="alert alert-success">
						<strong>Well done!</strong> <?php echo $this->session->flashdata('success'); ?>.
					</div>
					<?php } ?>
					<?php if($this->session->flashdata('error')){ ?>
					<div class="alert alert-danger">
						<strong>Oh snap!</strong> <?php echo $this->session->flashdata('error'); ?>.
					</div>
				<?php } ?>	
				<?php
					$csrf = array(
					        'name' => $this->security->get_csrf_token_name(),
					        'hash' => $this->security->get_csrf_hash()
					);
				?>			
					<div class="col-md-5">						
						<div class="panel panel-default">
							<div class="panel-heading">Add Rashi Details</div>
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>rashi/edit_details/<?php echo $this->uri->segment(3); ?>" enctype="multipart/form-data">
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Rashi</label>
										<div class="col-lg-10">									
											<select name="rashi_id" class="form-control input-sm">
											<?php foreach($rashi_list as $rashi){ ?>
												<option value="<?php echo $rashi->id; ?>" <?php if($rashi->id == $edit->rashi_id) echo "selected"; ?>><?php echo $rashi->name; ?></option>
											<?php } ?>
											</select>
											<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label">Topic</label>
										<div class="col-lg-10">																				
											<select name="topic_id" class="form-control input-sm">
											<?php foreach($topic_list as $topic){ ?>
												<option value="<?php echo $topic->id; ?>" <?php if($topic->id == $edit->topic_id) echo "selected"; ?>><?php echo $topic->name; ?></option>
											<?php } ?>
											</select>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="control-label col-lg-2">Image</label>
										<div class="col-lg-10">
											<div class="upload-file">
												<input type="file" name="userfile" id="upload-demo" class="upload-demo">
												<label data-title="Select file" for="upload-demo">
													<span data-title="No file selected..."></span>
													<input type="hidden" name="image" value="<?php echo $edit->image; ?>" />
												</label>
											</div>
										</div><!-- /.col -->
									</div><!-- /form-group -->

									<div class="form-group">
										<label class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">
											<textarea id="wysihtml5-textarea" name="description" placeholder="Enter your text ..." class="form-control" rows="10"><?php echo $edit->description; ?></textarea>					
										</div><!-- /.col -->
									</div><!-- /form-group -->


									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="submit" class="btn btn-success btn-sm">Update Details</button>
										</div><!-- /.col -->
									</div><!-- /form-group -->
								</form>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->

					<div class="col-md-7">
						<div class="panel panel-default">
							<div class="panel-heading">
								Rashi Details
							</div>
							<div class="panel-body no-padding">
								<div class="tab-right">
									<ul class="tab-bar">										
										<?php $q = $this->db->get_where('rashi_topic_details',array('id'=>$this->uri->segment(3)))->result(); ?>
										<?php $i=0; foreach($q as $rashi){ ?>
										<li <?php if($i == 0) {?> class="active" <?php } ?>><a href="#<?php echo $rashi->rashi_id; ?>" data-toggle="tab"> <?php echo $this->rashi_model->getRashiNameFromId($rashi->rashi_id); ?></a></li>
										<?php $i++; } ?>										
									</ul>
									<div class="tab-content">
										
										<?php $j = 0; foreach($q as $q1){ ?>										
										<div class="tab-pane fade in <?php if($j==0){ ?>active <?php } ?>" id="<?php echo $q1->rashi_id ?>">
											<p><img src="<?php echo SITE_URL; ?>assets/rashi_details/<?php echo $q1->image; ?>" class="img-thumbnail" ></p>
											<p><strong>Rashi Name: </strong><?php echo $this->rashi_model->getRashiNameFromId($rashi->rashi_id); ?></p>
											<p><strong>Topic Name: </strong><?php echo $this->rashi_model->getRashiTopicNameFromId($rashi->topic_id); ?></p>
											<p><strong>Description: </strong><?php echo $q1->description; ?></p>
											<a href="<?php echo base_url(); ?>rashi/edit_details/<?php echo $q1->id;; ?>"><span class="badge badge-warning">Edit</span></a>
											<a href="<?php echo base_url(); ?>rashi/delete_rashi_details/<?php echo $q1->id; ?>"><span class="badge badge-danger">Delete</span></a>
										</div>	
										<?php $j++; } ?>									
									</div>
								</div>
							</div>
						</div><!-- panel -->
					</div><!-- /.col -->
				</div>
			</div>
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

