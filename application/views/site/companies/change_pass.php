<!-- Breadcrumb Bar -->
		<div class="section breadcrumb-bar solid-blue-bg">
			<div class="inner">
				<div class="container">
					<div class="breadcrumb-menu flex items-center no-column">
						<?php if($company_info->logo_url==''): ?>
						<img src="<?php echo public_url('site/images/buildingwhite.png'); ?>" class="img-responsive">
						<?php else: ?>
						<img src="<?php echo base_url('uploads/company/'.$company_info->logo_url) ?>" class="img-responsive">
					<?php endif; ?>
						<div class="breadcrumb-info-dashboard">
							<h2><?php echo $company_info->company_name; ?></h2>
							<h4><?php echo $company_info->company_address; ?></h4>
						</div> <!-- end .candidate-info -->
					</div> <!-- end .breadcrumb-menu -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		<!-- Employer Dashboard -->
		<div class="section employer-dashboard-content solid-light-grey-bg">
			<div class="inner">
				<div class="container">
				<!-- Thông báo dữ liệu -->
				<div class="thongbao-tc"><?php if(isset($message)) { $this->load->view('admin/message', $this->data); } ?></div>
				<!-- End thông báo dữ liệu -->
					<div class="employer-dashboard-wrapper flex space-between no-wrap">

					<?php $this->load->view('site/companies/left'); ?>
						
						<div class="right-side-content">

							<div class="tab-content employer-dashboard">

							    <div id="change-password-employer" class="tab-pane fade in active">							    	
							        <div class="password-form-wrapper">	
							        	<h3 class="dark">Đổi mật khẩu</h3>									
			                            <form class="password-form" method="post">
											<div class="form-group">
											    <label for="InputEmail1">Mật khẩu cũ<sup>*</sup></label>
								<input type="password" class="form-control" id="InputEmail1" name="oldpassword">
								<span style="color: #c00; font-size: 12px"><?php echo form_error('oldpassword'); ?></span>
											</div>

											<div class="form-group">
											    <label for="InputPassword1">Mật khẩu mới<sup>*</sup></label>
											    <input type="password" class="form-control" id="InputPassword1" name="password">
											 <span style="color: #c00; font-size: 12px"><?php echo form_error('password'); ?></span>
											</div>

											<div class="form-group">
											    <label for="InputPassword1">Nhập lại mật khẩu mới<sup>*</sup></label>
											    <input type="password" class="form-control" id="InputPassword1" name="repassword">
											   <span style="color: #c00; font-size: 12px"><?php echo form_error('repassword'); ?></span>
											</div>											
										 <!-- end .password-form -->
										<div class="password-button-wrapper">
												<input type="submit" class="button" value="Xác nhận đổi mật khẩu">
										</div> <!-- end .password-button-wrapper -->
										</form>
							        </div> <!-- end .password-form-wrapper -->						        
							    </div> <!-- end #change-password-tab -->

							</div> <!-- end .employer-dashboard -->
						</div> <!-- end .right-side-content -->

					</div> <!-- end .employer-dashboard-wrapper -->
					</div> <!-- end .candidate-dashboard -->
						</div> <!-- end .right-side-content -->
					</div> <!-- end .candidate-dashboard-wrapper -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->