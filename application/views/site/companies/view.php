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
				
							    <div id="manage-jobs" class="tab-pane fade in">
							        <h3 class="tab-pane-title">Manage Jobs</h3>
							        <div class="posted-jobs-list-wrapper">

							        	<ul class="posted-jobs-table-headings flex items-center no-column list-unstyled">
							        		<li class="posted-job-title-cell"><h6>Name</h6></li>
							        		<li class="posted-job-type-cell"><h6>Job Type</h6></li>
							        		<li class="posted-job-candidates-cell"><h6>Candidates</h6></li>
							        		<li class="posted-job-featured-cell"><h6>Featured</h6></li>
							        	</ul> <!-- end .posted-jobs-table-headings -->

							        	<div class="posted-jobs-wrapper">

							        		<div class="posted-job flex no-wrap no-column items-center list-unstyled">
												<div class="posted-job-title-cell posted-job-cell flex items-center no-column no-wrap">		
													<div class="cell-mobile-label">
														<h6>Name</h6>
													</div> <!-- end .cell-label -->
													<div class="posted-job-cell-inner">
														<div class="cell-text">
															<h4>We're looking for an project leader</h4>
															<p><i class="ion-ios-location-outline"></i>Manhattan, NYC</p>
														</div> <!-- end .cell-text -->
													</div> <!-- end .candidate-cell-inner -->
												</div> <!-- end .candidate-name-cell -->

								        		<div class="posted-job-type-cell posted-job-cell flex no-column no-wrap">
													<div class="cell-mobile-label">
														<h6>Job Type</h6>
													</div> <!-- end .cell-label -->
													<div class="posted-job-cell-inner flex no-column no-wrap">
									        			<button type="button" class="button button-sm full-time">Freelancer</button>
								        			</div> <!-- end .posted-job-cell-inner -->
								        		</div> <!-- end .posted-job-type-cell -->

								        		<div class="posted-job-candidates-cell posted-job-cell flex no-column no-wrap">
													<div class="cell-mobile-label">
														<h6>Candidates</h6>
													</div> <!-- end .cell-label -->													
													<ul class="list-unstyled posted-job-cell-inner candidates-avatar flex items-center no-wrap no-column">
						        						<li><img src="images/avatar02.jpg" tppabs="http://jobpress.wecookcode.com/demo/images/avatar02.jpg" alt="avatar" class="img-responsive"></li>
						        						<li><img src="images/avatar03.jpg" tppabs="http://jobpress.wecookcode.com/demo/images/avatar03.jpg" alt="avatar" class="img-responsive"></li>
						        						<li class="candidates-total-count"><img src="images/avatar04.jpg" tppabs="http://jobpress.wecookcode.com/demo/images/avatar04.jpg" alt="avatar" class="img-responsive"><span>54+</span></li>
						        					</ul> <!-- end .posted-job-cell-inner -->								        			
								        		</div> <!-- end .posted-job-candidates-cell -->

								        		<div class="posted-job-featured-cell posted-job-cell flex no-column no-wrap">
													<div class="cell-mobile-label">
														<h6>Featured</h6>
													</div> <!-- end .cell-label -->													
													<div class="posted-job-cell-inner flex no-wrap no-column">
														<i class="ion-ios-star safron"></i>
						        					</div> <!-- end .posted-job-cell-inner -->								        			
								        		</div> <!-- end .posted-job-candidates-cell -->						        		

								        		<div class="posted-job-edit-cell posted-job-cell flex items-center no-wrap no-column no-wrap">
								        			<i class="ion-ios-compose-outline edit-icon"></i>
								        			<i class="ion-ios-trash-outline trash-icon"></i>
								        			<i class="ion-ios-more-outline options-icon"></i>								        		
												</div> <!-- end .posted-job-edit-cell -->
							        		</div> <!-- end .posted-job -->
							        		
							        		<div class="divider"></div>

							        	</div> <!-- end .posted-jobs-wrapper -->
						        	</div> <!-- end .posted-jobs-list-wrapper -->

						        	<div class="jobpress-custom-pager list-unstyled flex space-center no-column items-center">
										<a href="#0" class="button"><i class="ion-ios-arrow-left"></i>Prev</a>
										<ul class="list-unstyled flex no-column items-center">
											<li><a href="#0">1</a></li>
											<li><a href="#0">2</a></li>
											<li><a href="#0">3</a></li>
											<li><a href="#0">4</a></li>
											<li><a href="#0">5</a></li>									
										</ul>
										<a href="#0" class="button">Next<i class="ion-ios-arrow-right"></i></a>
									</div> <!-- end .jobpress-custom-pager -->							        
							    </div> <!-- end #manage-applications-tab -->

							    <div id="" class="tab-pane fade in active">
							    	<div class="profile-badge"><h6>Thông tin công ty</h6></div>
							        <div class="profile-wrapper">

										<div class="profile-info profile-section flex no-column no-wrap">
											<div class="profile-picture">
												<?php if($company_info->logo_url==''): ?>
												<img src="<?php echo public_url('site/images/building.png'); ?>" alt="logo công ty" class="img-responsive">
											<?php else: ?>
												<img src="<?php echo base_url('uploads/company/'.$company_info->logo_url); ?>" alt="logo công ty" class="img-responsive">
											<?php endif; ?>

											</div> <!-- end .user-picture -->
											<div class="profile-meta">
												<h4 class="dark"><?php echo $company_info->company_name; ?></h4>

												<p><i class="ion-location"></i></a> <?php echo $company_info->company_address; ?></p>
												<div class="items-center no-wrap no-column">													
											<span class="contact-phone"><i class="ion-iphone"></i> <?php echo $company_info->company_phone; ?></span> -
											<span class="contact-email"><i class="ion-email"></i> <?php echo $company_info->email; ?></span>
											
												</div> <!-- end .profile-contact -->
												<div class="items-center no-wrap no-column">	
												<p><i class="ion-android-globe"></i> Website : <?php echo $company_info->website; ?></p>
												</div>
												
											</div> <!-- end .profile-meta -->
										</div> <!-- end .profile-info -->

										<div class="divider"></div>

										<div class="profile-about profile-section">
											<h3 class="dark profile-title">THÔNG TIN NHÀ TUYỂN DỤNG<span>
											<a href="<?php echo base_url('nha-tuyen-dung/cap-nhat-thong-tin'); ?>"><i class="ion-edit"></i></a></span></h3>
											<ul class="profile-ul">
												<li class="reg1"><p>Tên công ty</p></li>
												<li class="reg2"><p><?php echo $company_info->company_name; ?></p></li>
												<li class="reg1"><p>Địa chỉ</p></li>
										<li class="reg2"><p><?php echo $company_info->company_address; ?></p></li>
												
												<li class="reg1"><p>Tỉnh / thành phố</p></li>
												<?php if($company_info->city_id==0): ?>
												<li class="reg2"><p>Chưa cập nhật...</p></li>
											<?php else: ?>
												<li class="reg2"><p><?php echo $citycompany->name; ?></p></li>
											<?php endif; ?>
												<li class="reg1"><p>Quy mô công ty</p></li>
											<?php if($company_info->company_size_id==0): ?>
												<li class="reg2"><p>Chưa cập nhật...</p></li>
												<?php else: ?>
											<li class="reg2"><p><?php echo $companysize->name; ?></p></li>
											<?php endif; ?>
											<li class="reg1"><p>Giới thiệu</p></li>
											<li class="reg2"><p><?php echo $company_info->description; ?></p></li>
											<li class="reg1"><p>Logo công ty</p></li>
											<li class="reg2"><p><img src="<?php echo base_url('uploads/company/'.$company_info->logo_url); ?>" width="100"></p></li>
											<li class="reg1"><p>Website</p></li>
											<li class="reg2"><p style="color: #1790D4"><?php echo $company_info->website; ?></p></li>
											<li class="reg1"><p>Số điện thoại</p></li>
											<li class="reg2"><p style="color: #1790D4"><?php echo $company_info->company_phone; ?></p></li>
											<li class="reg1"><p>Fax</p></li>
											<li class="reg2"><p style="color: #1790D4"><?php echo $company_info->company_fax; ?></p></li>
											</ul>					
											</p>
										</div> <!-- end .profile-about -->

										<div class="divider"></div>

										<div class="profile-experience-wrapper profile-section">
											<h3 class="dark profile-title">THÔNG TIN LIÊN HỆ<span>
											<a href="<?php echo base_url('nha-tuyen-dung/cap-nhat-thong-tin'); ?>"><i class="ion-edit"></i></a></span></h3>
										<ul class="profile-ul">
										<li class="reg1"><p>Người liên hệ</p></li>
										<li class="reg2"><p><?php echo $company_info->company_contact; ?></p></li>
										<li class="reg1"><p>Chức vụ</p></li>
										<li class="reg2"><p><?php echo $company_info->contact_title; ?></p></li>
										<li class="reg1"><p>Số điện thoại</p></li>
										<li class="reg2"><p><?php echo $company_info->contact_phone; ?></p></li>
										<li class="reg1"><p>Email liên hệ</p></li>
										<li class="reg2"><p><?php echo $company_info->contact_email; ?></p></li>
										</ul>
											<div class="spacer-md"></div>
											<div class="profile-experience flex space-between no-wrap no-column">
											
											</div> <!-- end .profile-experience -->
										</div> <!-- end .profile-experience-wrapper -->

							        </div> <!-- end .profile-wrapper -->						        
							    </div> <!-- end #profile-tab -->



							</div> <!-- end .employer-dashboard -->
						</div> <!-- end .right-side-content -->

					</div> <!-- end .employer-dashboard-wrapper -->
					</div> <!-- end .candidate-dashboard -->
						</div> <!-- end .right-side-content -->
					</div> <!-- end .candidate-dashboard-wrapper -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->