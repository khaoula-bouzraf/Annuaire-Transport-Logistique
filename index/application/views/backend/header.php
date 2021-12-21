<div class="row hidden-print" style="margin-left:0px; margin-right:0px;">

	<div class="col-md-12 col-sm-12 clearfix " style="background-color:#ffffff; box-shadow: 0px 10px 30px 0px rgba(82,63,105,0.08); border-radius: 5px;">
		<ul class="list-inline links-list pull-left" style="margin-top:9px;">
			<li>
				<a href="<?php echo site_url('home');?>" target="_blank">
					<i class="entypo-paper-plane"></i> <?php echo get_phrase('website'); ?>
				</a>
			</li>
		</ul>


		<!-- Profile Info -->
		<ul class="user-info pull-right pull-none-xsm" style="margin-top: 6px;">
			<li class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="" class="img-circle" width="44">
					<?php
						$logged_in_user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
						echo $logged_in_user_details['name'];
					?>

					<div style="margin-top: -15px;
							    font-size: 10px;
							    text-align: left;
							    padding-left: 53px;
							    color: #707696;">
						<p style="margin-top: 0px"><?php echo $this->session->userdata('role');?></p>
					</div>
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Settings sub-links -->
					<?php if (strtolower($this->session->userdata('role')) == 'admin'): ?>
						<li>
								<a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
	                  <i class="flaticon-rotate"></i>
	                  <span><?php echo get_phrase('settings'); ?></span>
	              </a>
						</li>
          <?php endif; ?>

					<!-- Profile sub-links -->
					<li>
							<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile');?>">
								<i class="flaticon-rotate"></i>
								<?php echo get_phrase('edit_profile');?>
							</a>
					</li>

					<li>
						<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile');?>">
							<i class="flaticon-lock"></i>
							<?php echo get_phrase('change_password');?>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('login/logout');?>">
							<i class="flaticon-paper-plane-1"></i>
							<?php echo get_phrase('log_out');?>
						</a>
					</li>

				</ul>
			</li>

		</ul>
	</div>

</div>

<hr style="margin-top:0px;" />
