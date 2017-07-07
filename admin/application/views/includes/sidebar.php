<aside class="fixed skin-6" style="overflow-y:scroll !important">	
			<div class="sidebar-inner scrollable-sidebars">
				<div class="size-toggle">
					<a class="btn btn-sm" id="sizeToggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm">
						<i class="fa fa-power-off"></i>
					</a>
				</div><!-- /size-toggle -->	
				<div class="user-block clearfix">
					<img src="<?php echo ASSETS; ?>img/user.jpg" alt="User Avatar">
					<div class="detail">
						<strong>John Doe</strong><span class="badge badge-danger bounceIn animation-delay4 m-left-xs">4</span>
						<ul class="list-inline">
							<li><a href="profile.html">Profile</a></li>
							<li><a href="logout.html" class="no-margin">Logout</a></li>
						</ul>
					</div>
				</div><!-- /user-block -->
				<div class="search-block">
					<div class="input-group">
						<input type="text" class="form-control input-sm" placeholder="search here...">
						<span class="input-group-btn">
							<button class="btn btn-default btn-sm" type="button"><i class="fa fa-search"></i></button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /search-block -->
				<div class="main-menu">
					<ul>
						<?php $menu = $this->db->order_by('weight','ASC')->get_where('menu',array('parent_id'=>0))->result(); ?>
						<?php foreach($menu as $mem){
							$sub = $this->db->order_by('weight','ASC')->get_where('menu',array('parent_id'=>$mem->id));
						?>
						<li <?php if($sub->num_rows() > 0) echo "class='openable'"; ?>>
							<a href="<?php if($mem->url != '#'){echo base_url().$mem->url; }else {echo '#';} ?>">
								<span class="menu-icon">
									<i class="<?php echo $mem->icon; ?>"></i> 
								</span>
								<span class="text">
									<?php echo $mem->name; ?>
								</span>
								<span class="menu-hover"></span>
							</a>
							<?php if($sub->num_rows() > 0){ ?>
							<ul class="submenu">
								<?php $sub_menu = $sub->result(); ?>
								<?php foreach($sub_menu as $submenu){?>
									<li><a href="<?php echo base_url().$submenu->url; ?>"><span class="submenu-label"><?php echo $submenu->name; ?></span></a></li>
								<?php } ?>
							</ul>
							<?php } ?>
						</li>
						<?php } ?>						
					</ul>
				</div><!-- /main-menu -->
				
			</div><!-- /sidebar-inner -->
		</aside>