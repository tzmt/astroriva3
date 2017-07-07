<div id="main-container">
			<div id="breadcrumb">
				<ul class="breadcrumb">
					 <li><i class="fa fa-home"></i><a href="index-2.html"> Home</a></li>
					 <li class="active">Dashboard</li>	 
				</ul>
			</div><!-- /breadcrumb-->
			<div class="main-header clearfix">
				<div class="page-title">
					<h3 class="no-margin">Dashboard</h3>
					<span>Welcome back Mr.John Doe</span>
				</div><!-- /page-title -->
				
				<ul class="page-stats">			    	
			    	<li>
			    		<div class="value">
			    			<span>My balance</span>
			    			<h4><i class="fa fa-rupee"></i><strong><?php echo $total_sales; ?></strong></h4>
			    		</div>			    		
			    	</li>
			    </ul><!-- /page-stats -->
			</div><!-- /main-header -->				
			
			<div class="padding-md">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-danger">
							<h2 class="m-top-none"><?php echo $total_astrologers; ?></h2>
							<h5>Registered Astrologers</h5>							
							<div class="stat-icon">
								<i class="fa fa-user fa-3x"></i>
							</div>
							
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-info">
							<h2 class="m-top-none"><?php echo $total_student; ?></h2>
							<h5>Registered Student</h5>							
							<div class="stat-icon">
								<i class="fa fa-user fa-3x"></i>
							</div>
							
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-warning">
							<h2 class="m-top-none" id="orderCount"><?php echo $total_orders; ?></h2>
							<h5>New Orders</h5>							
							<div class="stat-icon">
								<i class="fa fa-shopping-cart fa-3x"></i>
							</div>							
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6 col-md-3">
						<div class="panel-stat3 bg-success">
							<h2 class="m-top-none"><?php echo $total_buyers; ?></h2>
							<h5>Total Buyers</h5>							
							<div class="stat-icon">
								<i class="fa fa-user fa-3x"></i>
							</div>							
						</div>
					</div><!-- /.col -->
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading clearfix">
								<span class="pull-left"><i class="fa fa-bar-chart-o fa-lg"></i> Website Traffic</span>
								<ul class="tool-bar">
									<li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"></a></li>
								</ul>
							</div>
							<div class="panel-body" id="trafficWidget">
								<div id="placeholder" class="graph" style="height:250px"></div>
							</div>	
						</div><!-- /panel -->
								
						<div class="row">
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-default panel-stat2 bg-success">
									<div class="panel-body">
										<span class="stat-icon">
											<i class="fa fa-bar-chart-o"></i>
										</span>
										<div class="pull-right text-right">
											<div class="value"><?php echo $my_products ?></div>
											<div class="title">My Products</div>
										</div>									
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-default panel-stat2 bg-warning">
									<div class="panel-body">
										<span class="stat-icon">
											<i class="fa fa-bar-chart-o"></i>
										</span>
										<div class="pull-right text-right">
											<div class="value"><?php echo $other_products ?></div>
											<div class="title">Other Products</div>
										</div>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
							<div class="col-md-4 col-sm-4">
								<div class="panel panel-default panel-stat2 bg-info">
									<div class="panel-body">
										<span class="stat-icon">
											<i class="fa fa-envelope"></i>
										</span>
										<div class="pull-right text-right">
											<div class="value"><?php echo $total_contacts; ?></div>
											<div class="title">Contacts</div>
										</div>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
						</div><!-- /.row -->						
						<div class="row">
							<div class="col-lg-6">
								<div class="panel panel-default">
									<div class="panel-heading clearfix">
										<span class="pull-left">
											To Do List <span class="text-success m-left-xs"><i class="fa fa-check"></i></span>
										</span>
										<ul class="tool-bar">
											<li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
											<li><a href="#toDoListWidget" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
										</ul>
									</div>
									<div class="panel-body no-padding collapse in" id="toDoListWidget">
										<ul class="list-group task-list no-margin collapse in">
											<li class="list-group-item selected">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish" checked>
													 <span class="custom-checkbox"></span>
												</label>
												SEO Optimisation
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Unit Testing
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Mobile Development 
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
												<span class="badge badge-success m-right-xs">3</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Database Migration
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												New Frontend Layout <span class="label label-warning m-left-xs">PENDING</span>
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
											<li class="list-group-item">
												<label class="label-checkbox inline">
													 <input type="checkbox" class="task-finish">
													 <span class="custom-checkbox"></span>
												</label>
												Bug Fixes <span class="label label-danger m-left-xs">IMPORTANT</span>
												<span class="pull-right">
													<a href="#" class="task-del"><i class="fa fa-trash-o fa-lg text-danger"></i></a>
												</span>
											</li>
										</ul><!-- /list-group -->
									</div>
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
							<div class="col-lg-6">
								<div class="panel panel-default">	
									<div class="panel-heading clearfix">
										<span class="pull-left">Feeds</span>
										<ul class="tool-bar">
											<li><a href="#" class="refresh-widget" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a></li>
											<li><a href="#feedList" data-toggle="collapse"><i class="fa fa-arrows-v"></i></a></li>
										</ul>
									</div>		
									<ul class="list-group collapse in" id="feedList">
										<li class="list-group-item clearfix">
											<div class="activity-icon small">
												<i class="fa fa-camera"></i>
											</div>
											<div class="pull-left m-left-sm">
												<span>John Doe Add a new photo.</span><br/>
												<small class="text-muted"><i class="fa fa-clock-o"></i> 2m ago</small>
											</div>
										</li>
										<li class="list-group-item clearfix">
											<div class="activity-icon bg-success small">
												<i class="fa fa-usd"></i>
											</div>
											<div class="pull-left m-left-sm">
												<span>2 items sold.</span><br/>
												<small class="text-muted"><i class="fa fa-clock-o"></i> 30m ago</small>
											</div>	
										</li>
										<li class="list-group-item clearfix">
											<div class="activity-icon bg-info small">
												<i class="fa fa-comment"></i>
											</div>
											<div class="pull-left m-left-sm">
												<span>John Doe commented on <a href="#">This Article</a></span><br/>
												<small class="text-muted"><i class="fa fa-clock-o"></i> 1hr ago</small>
											</div>
										</li>
										<li class="list-group-item clearfix">
											<div class="activity-icon bg-success small">
												<i class="fa fa-usd"></i>
											</div>
											<div class="pull-left m-left-sm">
												<span>3 items sold.</span><br/>
												<small class="text-muted"><i class="fa fa-clock-o"></i> 2days ago</small>
											</div>	
										</li>
									</ul><!-- /list-group -->	
									<div class="loading-overlay">
										<i class="loading-icon fa fa-refresh fa-spin fa-lg"></i>
									</div>
								</div><!-- /panel -->
							</div><!-- /.col -->
						</div><!-- ./row -->
					</div><!-- /.col -->
					


				</div><!-- /.row -->
			</div><!-- /.padding-md -->
		</div><!-- /main-container -->
	</div><!-- /wrapper -->

	