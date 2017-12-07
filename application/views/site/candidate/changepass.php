		<!-- Breadcrumb Bar -->
		<div class="section breadcrumb-bar solid-blue-bg">
			<div class="inner">
				<div class="container">
					<div class="breadcrumb-menu flex items-center no-column">
						
						<div class="breadcrumb-info-dashboard">
							<h2><?php echo $user_info->full_name; ?></h2>
							<h4><?php echo $user_info->email; ?></h4>
						</div> <!-- end .candidate-info -->
					</div> <!-- end .breadcrumb-menu -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
			<!-- Candidate Dashboard -->
		<div class="section candidate-dashboard-content solid-light-grey-bg">
			<div class="inner">
				<div class="container">
				<div class="thongbao-tc"><?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?></div>
					<div class="candidate-dashboard-wrapper flex space-between no-wrap">

						<div class="left-sidebar-menu">							
							<ul class="nav nav-pills nav-stacked">
								<li class="heading">Quản lý tài khoản</li>
							    <li><a href="<?php echo base_url('candidate/view'); ?>">Hồ sơ của tôi</a></li>
							    <li><a href="<?php echo base_url('candidate/update_cv'); ?>">Cập nhật thông tin</a></li>
							    
							    <li class="nav-divider"></li>
							   	<li class="heading">Việc làm của tôi</li>
							   	<li><a data-toggle="pill" href="#bookmarked-jobs">Việc làm đã lưu</a></li>
							    <li class="notification-link flex space-between items-center no-column no-wrap"><a data-toggle="pill" href="#notifications">Việc làm đã ứng tuyển</a> <span class="notification-count">2</span></li>
								<li><a data-toggle="pill" href="#manage-applications">Nhà tuyển dụng xem hồ sơ</a></li>
							    <li class="nav-divider"></li>
							    <li><a class="active" href="#">Đổi mật khẩu</a></li>
							    <li><a href="<?php echo base_url('candidate/logout'); ?>">Đăng xuất</a></li>
							</ul>
						</div> <!-- end .left-sidebar-menu -->
						
						<div class="right-side-content">
							<div class="tab-content candidate-dashboard">

								    <div id="change-password" class="tab-pane fade in active">							  
							        <div class="password-form-wrapper">	
							        	<h3 class="dark">Đổi mật khẩu</h3>									
			                            <form class="password-form" method="post">
											<div class="form-group">
											    <label for="oldpass">Mật khẩu cũ<sup>*</sup></label>
											    <input type="password" class="form-control" name="oldpass" id="oldpass" placeholder="">
									<span style="color: #c00; font-size: 12px"><?php echo form_error('oldpass'); ?></span>
											</div>

											<div class="form-group">
											    <label for="newpass">Mật khẩu mới<sup>*</sup></label>
											    <input type="password" class="form-control" name="newpass" id="newpass" placeholder="">
									<span style="color: #c00; font-size: 12px"><?php echo form_error('newpass'); ?></span>
											</div>

											<div class="form-group">
											    <label for="repass">Nhập lại mật khẩu mới<sup>*</sup></label>
											    <input type="password" class="form-control" name="repass" id="repass" placeholder="">
									<span style="color: #c00; font-size: 12px"><?php echo form_error('repass'); ?></span>
											</div>		
											<div class="password-button-wrapper">
												<input type="submit" class="button" value="Đổi mật khẩu">
										</div> <!-- end .password-button-wrapper -->									
										</form> <!-- end .password-form -->
										
							        </div> <!-- end .password-form-wrapper -->	
							  				        
							    </div> <!-- end #change-password-tab -->

					</div> <!-- end .profile-wrapper -->						        
					</div> <!-- end #resume-tab -->





							</div> <!-- end .candidate-dashboard -->
						</div> <!-- end .right-side-content -->
					</div> <!-- end .candidate-dashboard-wrapper -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->