<!-- Breadcrumb Bar -->
		<div class="section breadcrumb-bar solid-blue-bg">
			<div class="inner">
				<div class="container-fluid">
					<p class="breadcrumb-menu">
						<a href="<?php echo base_url(); ?>"><i class="ion-ios-home"></i></a>
						<i class="ion-ios-arrow-right arrow-right"></i>
						<a href="#0">Chi tiết việc làm</a>
					</p> <!-- end .breabdcrumb-menu -->
					
				</div> <!-- end .container-fluid -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->
		<!-- Job Listings Section -->
		<div class="section jobs-details-section">
			<div class="container-fluid">
				<div class="jobs-details-wrapper flex no-wrap">

			<?php $this->load->view('site/career/left'); ?>

					<div class="right-side-wrapper">
						<div class="right-side-top">
							<h6><span><i class="ion-ios-arrow-left"></i></span>Quay lại <a href="<?php echo base_url(); ?>">Trang chủ</a></h6>
							<div class="right-side-top-inner flex no-wrap">
							
								<div class="job-post-wrapper">
									<div class="job-post-top flex no-column no-wrap">
										<div class="job-post-top-left">
											 <?php if($company->logo_url==''): ?>
                                    <img src="<?php echo public_url('site/images/building.png'); ?>" alt="" class="img-responsive">
                                    <?php else: ?>     
											<img src="<?php echo base_url('uploads/company/'.$company->logo_url); ?>" alt="" class="img-responsive">
									<?php endif; ?>
										</div> <!-- end .left-side-inner -->
										<div class="job-post-top-right">
											<h4 class="dark"><?php echo $info->title; ?></h4>
											<h5><?php echo $company->company_name; ?></h5>
											<div class="job-post-meta flex items-center no-column no-wrap">
												<div class="bookmarked-job-meta flex items-center no-wrap no-column">
													<h6 class="bookmarked-job-category"><?php echo $city->name; ?></h6>
						        					<h6 class="candidate-location"><?php echo $salary->name; ?></h6>
													<h6 class="hourly-rate"><span>Hạn nôp hồ sơ : <?php echo int_to_date($info->end_date); ?></span></h6>
						        				</div>
					        					<h6 class="full-time">Lượt xem : <?php echo $info->view; ?></h6>
											</div> <!-- end .job-post-meta -->
										</div> <!-- end .right-side-inner -->
									</div> <!-- end .job-post-top -->

									<div class="divider"></div>

									<div class="job-post-bottom">
										<img src="<?php echo base_url('uploads/company/'.$company->image); ?>" style="width:100%;"><br><br>
										<h4 class="dark">Mô tả công việc</h4>
										<p><?php echo $info->content; ?></p><br>	

										<h4 class="dark">Yêu cầu công việc</h4>
										<p><?php echo $info->job_requirement; ?></p> 
										<br>

										<h4 class="dark">Lương và phúc lợi</h4>
										<p><?php echo $info->benefit; ?></p><br>
										<h4 class="dark">Yêu cầu hồ sơ</h4>
										<p><?php echo $info->profile; ?></p><br>
										
										<div class="divider"></div>

										<div class="job-post-share flex space-between items-center no-wrap">
											<div class="job-post-share-left flex items-center no-wrap">
												<h6>Chia sẻ việc làm :</h6>
												<ul class="social-share flex no-wrap no-column list-unstyled">
													<li><a href="#0" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a></li>
													<li><a href="#0" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a></li>
													<li><a href="#0" class="button button-sm g-plus-btn"><span><i class="ion-social-googleplus"></i></span>Google plus</a></li>
												</ul> <!-- end .social-share -->
											</div> <!-- end .job-post-share-left -->
											
											<?php if(isset($user_info)): ?>
											<div class="job-post-share-right flex items-center no-column no-wrap">
												<a href="#" id="saved"><i class="ion-flag wishlist-icon"></i></a>
											<?php if($maprecruitment ): ?>
											<?php if($info->id==$maprecruitment->recruitment_id && $maprecruitment->candidate_id==$user_info->id): ?>
												<h6>Đã lưu</h6>
												<a href="#" id=""><i class="ion-flag"></i></a>
										<?php endif; ?>
										<?php else: ?>
												<h6>Lưu việc làm</h6>
												<a href="#" class="FormSubmit" id="<?php echo $info->id; ?>"><i class="ion-ios-heart"></i></a>
											<?php endif; ?>
											</div> <!-- end .job-post-share-right -->
										<?php endif; ?>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
//add dữ liệu
$('#saved').hide();
$(".FormSubmit").click(function (e) {
		e.preventDefault();
		$(".FormSubmit").hide(); //hide submit button
		$("#LoadingImage").show(); //show loading image	
		var ID=$(this).attr('id');		
		jQuery.ajax({
		type: "POST", // HTTP method POST or GET
		url: "<?php echo base_url() ?>candidate/savejobs", //Where to make Ajax calls
		dataType:"text", // Data type, HTML, json etc.
		data:"cid="+ID, //Form variables
		success:function(response){
			//$("#"+ID).hide(); //show submit button
			$("#saved").show(); //hide loading image
			$('.FormSubmit').hide();
			window.location.reload();
		},
		error:function (xhr, ajaxOptions, thrownError){
			$(".FormSubmit").show(); //show submit button
			alert("Lỗi không kết nối được");
            //alert(thrownError);
		}
		});
});

});
</script> 
											
										</div> <!-- end .job-post-share -->

									</div> <!-- end .job-post-bottom -->

								</div> <!-- end .left-side-inner -->

								<div class="right-side-inner">
									<div class="job-post-company-info">
										<ul class="list-unstyled">
											<li class="flex no-column no-wrap"><i class="ion-clock"></i> <b>Ngày đăng tuyển</b> : <?php echo int_to_date($info->start_date); ?></li>
											<li class="flex no-column no-wrap"><i class="ion-lock-combination"></i> <b>Hạn nộp hồ sơ</b> : <span style="color: #C00;"><?php echo int_to_date($info->end_date); ?></span></li>
											<li class="flex no-column no-wrap"><i class="ion-person-add"></i> <b>Số lượng cần tuyển </b> : <?php echo $info->amount; ?></li>
											<li class="flex no-column no-wrap"><i class="ion-podium"></i> <b>Kinh nghiệm</b>  : <?php echo $experience->name; ?></li>
											<li class="flex no-column no-wrap"><i class="ion-ribbon-a"></i> <b>Cấp bậc</b> : <?php echo $level->name; ?></li>
											<li class="flex no-column no-wrap"><i class="ion-ios-briefcase"></i><b> Nghành nghề</b> : <?php echo $career->name; ?></li>
											<li class="flex no-column no-wrap"><i class="ion-thumbsup"></i><b>Ngôn ngữ hồ sơ</b> : <?php if($info->language==1): ?>Tiếng Việt
											<?php elseif($info->language==2): ?>Tiếng Anh
											<?php else: ?>Bất kỳ
											<?php endif; ?>
											</li>
											<li class="flex no-column no-wrap"><i class="ion-university"></i><b> Yêu cầu bằng cấp</b> : <?php echo $literacy->name; ?></li>
										</ul>
									</div>
									<div class="job-post-company-info">
										<h5 class="dark"><?php echo $company->company_name; ?></h5>
										<p><?php echo $company->description; ?></p><br>
										<ul class="list-unstyled">
											<li class="flex no-column no-wrap"><i class="ion-ios-location"></i><?php echo $company->company_address; ?></li>
											<li class="flex no-column no-wrap"><i class="ion-earth"></i><a href="<?php echo $company->website; ?>"><?php echo $company->website; ?></a></li>
										</ul>
									</div> <!-- end .job-post-company-info -->
									<div class="job-post-company-info">
										<h5 class="dark">Thông tin liên hệ</h5>
										<ul class="list-unstyled">
											<li class="flex no-column no-wrap">Người liên hệ : <?php echo $company->company_contact; ?></li>
											<li class="flex no-column no-wrap">Chức vụ : <?php echo $company->contact_title; ?></li>
										</ul>
								

									</div> <!-- end .job-post-company-info -->


									<div class="system-login text-center">
										<p class="divider-text text-center"><span>Ứng tuyển việc làm</span></p>
										<?php if(isset($user_info)): ?>
										<a href="<?php echo base_url('ung-vien/nop-ho-so-'.$info->id); ?>" class="button">Nộp đơn ứng tuyển (Apply)</a>
									<?php else: ?>
										<a href="<?php echo base_url('ung-vien/dang-nhap'); ?>" class="button">Đăng nhập để ứng tuyển</a>
									<?php endif; ?>


									</div> <!-- end .system-login -->

								</div> <!-- end .right-side-inner -->

							</div> <!-- end .left-side-top -->

							<div class="right-side-bottom-wrapper">
							
						        <div class="bookmarked-jobs-list-wrapper on-listing-page on-job-detals-page">
									<h3>Việc làm khác từ <span><?php echo $company->company_name; ?></span></h3>
						        	<?php foreach($similarjob as $row): ?>
						        	<?php $company_info = $this->member_company_model->get_info($row->company_id); ?>
						        	<?php $city_info = $this->city_model->get_info($row->city_id); ?>
						        	<?php $salary_info = $this->salary_model->get_info($row->salary_id); ?>
						        	<div class="bookmarked-job-wrapper">
						        		<div class="bookmarked-job flex no-wrap no-column ">
							        		
							        		<div class="bookmarked-job-info" style="width: 100%;">
							        			<h4 class="dark flex no-column"><?php echo $row->title; ?></h4>
							        			<h5><?php echo $company_info->company_name; ?></h5>
							        			<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
							        				<div class="bookmarked-job-meta flex items-center no-wrap no-column">
								        				
												<h6 class="bookmarked-job-category"><?php echo $city_info->name; ?></h6>
							        			<h6 class="candidate-location"><?php echo $salary_info->name; ?></h6>
												<h6 class="hourly-rate"><span><?php echo int_to_date($row->start_date); ?></span></h6>
							        				</div> <!-- end .bookmarked-job-meta -->
							        				<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
							        					<a href="<?php echo base_url($row->cat_name.'-'.$row->id.'-jv'); ?>" class="button">Chi tiết</a>
							        				</div> <!-- end .right-side-bookmarked-job-meta -->
							        			</div> <!-- end .bookmarked-job-info-bottom -->
							        		</div> <!-- end .bookmarked-job-info -->
						        		</div> <!-- end .bookmarked-job -->
						        	</div> <!-- end .bookmarked-job-wrapper --> 
						        <?php endforeach; ?>

						        
					        	</div> <!-- end .bookmarked-jobs-list-wrapper -->
							</div> <!-- end .right-side-bottom-wrapper -->
							</div> <!-- end .right-side-top-inner -->
						</div> <!-- end .right-side-top -->
					</div> <!-- end .right-side-wrapper -->
				</div> <!-- end .jobs-details-wrapper -->
			</div> <!-- end .container-fluid -->
		</div> <!-- end .section -->