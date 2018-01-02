        <!-- Hero Section -->
        <div class="section hero-section transparent" style="background-image: url('<?php echo public_url(); ?>/site/images/background.jpg');">
            <div class="inner">
                <div class="container">
                    <div class="job-search-form">
                        <h2></h2>
                        <form class="form-inline flex" method="GET" action="<?php echo base_url('home/find_jobs'); ?>">
                            <div class="form-group">
                                <div class="form-group-inner">
                                    <input type="text" class="form-control" name="keyword" id="input-field-1" placeholder="Chức danh / Từ khóa / Tên công ty">
                                    <i class="ion-ios-briefcase-outline"></i>
                                </div>
                            </div>
               <div class="form-group">
              <div class="form-group-inner">
             <select class="selectpicker" data-live-search="true" name="careerid">
             <option value="0">Tất cả ngành nghề</option>
            <?php foreach($category_home as $row): ?>
            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
             <?php endforeach; ?>
             </select>
                    </div>
                     </div>

                            <div class="form-group">                            
                            <select class="selectpicker" data-live-search="true" name="cityid">
                            <option value="0">Tất cả địa điểm</option>
                            <?php foreach($cityinfo as $row): ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                            <?php endforeach; ?>
                                </select>
                            
                            </div>
                            <button type="submit" class="button"><i class="ion-ios-search-strong"></i></button>
                        </form>

                        
                        <div class="keywords flex">
        <h4 class="self-center"><a href="<?php echo base_url('ung-vien/dang-nhap'); ?>" class="button item-center"><i class="ion-ios-cloud-upload-outline"></i>  Tải lên hồ sơ của bạn</a></h4>
                        </div> 
                        
                    </div> <!-- end .job-search-form -->
                    <div>
                    <a href="home/near_jobs">Việc làm gần nhà</a>
                    </div>    
                </div> <!-- end .container -->
                <div class="features-bar">
                    <div class="container">
                        <div class="features-bar-inner flex space-between">
                       
                        </div> <!-- end .features-bar-inner -->
                    </div> <!-- end .container -->
                </div> <!-- end .features-bar -->   
            </div> <!-- end .inner -->
        </div> <!-- end .section -->
        <!-- Latest Jobs Section -->      

        <div class="section Latest-jobs-section">
        <div class="inner">
            <div class="container">
            <div class="jobs-table">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_job_hightlight" data-toggle="tab">
                                    <h3>Việc làm nổi bật</h3>
                                     </a>
                            </li>
                            <li>
                                <a href="#tab_job_suggest" data-toggle="tab">
                                    <h3>Việc làm gợi ý</h3>  
                                </a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab_job_hightlight">
                            <ul class="list-group row">
                            <?php foreach($lastestjob as $row): ?>
                            <?php $company = $this->member_company_model->get_info($row->company_id); ?>
                            <?php $salary = $this->salary_model->get_info($row->salary_id); ?>
                            <?php $city = $this->city_model->get_info($row->city_id); ?>

                                <li class="list-group-item col-md-6">
                                    <div class="media">
                                        <div class="media-left">
                                <?php if($company->logo_url==''): ?>
                                    <img class="media-object" src="<?php echo public_url('site/images/building.png'); ?>" alt="" class="img-responsive" width="70">
                                    <?php else: ?>     
                                    <img class="media-object" src="<?php echo base_url('uploads/company/'.$company->logo_url); ?>" alt="" class="img-responsive" width="70">
                                <?php endif; ?>                                          
                                        </div>
                                        <div class="media-body">
                                        <h4><a href="<?php echo base_url($row->cat_name.'-'.$row->id.'-jv'); ?>"><?php echo $row->title; ?></a> <img src="<?php echo public_url('site/images/bg.gif'); ?>" style="width: 40px;"></h4>
                                        <p><?php echo $company->company_name; ?></p>
                                        </div>
                                    </div>
                                </li>

                            <?php endforeach; ?>                                    
                            </ul>
                            </div>
                            <div class="tab-pane fade" id="tab_job_suggest">
                            <ul class="list-group row">
                            <?php foreach($recommentjobs as $row): ?>
                            <?php $company = $this->member_company_model->get_info($row->company_id); ?>
                            <?php $salary = $this->salary_model->get_info($row->salary_id); ?>
                            <?php $city = $this->city_model->get_info($row->city_id); ?>
                                <li class="list-group-item col-md-6">
                                    <div class="media">
                                        <div class="media-left">
                                <?php if($company->logo_url==''): ?>
                                    <img class="media-object" src="<?php echo public_url('site/images/building.png'); ?>" alt="" class="img-responsive" width="70">
                                    <?php else: ?>     
                                    <img class="media-object" src="<?php echo base_url('uploads/company/'.$company->logo_url); ?>" alt="" class="img-responsive" width="70">
                                <?php endif; ?>                                          
                                        </div>
                                        <div class="media-body">
                                        <h4><a href="<?php echo base_url($row->cat_name.'-'.$row->id.'-jv'); ?>"><?php echo $row->title; ?></a> </h4>
                                        <p><?php echo $company->company_name; ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                               
                            </ul>
                            </div>                     
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- Latest News Section -->
        <div class="section Latest-news-section">
            <div class="inner">
                <div class="container">
                    <div class="section-top-content flex items-center">
                        <h1>Kiến thức bổ ích</h1>
                        <a href="#">Xem tất cả<i class="ion-ios-arrow-thin-right"></i></a>
                    </div> <!-- end .section-top-content -->
                    <div class="news-grid">
                        <div class="news-grid-row flex space-between">
                            
                        <?php foreach($newshome_list as $row): ?>
                            <?php $newsname = $row->news_name; ?>
                            <div class="news-item">
                                <img src="<?php echo base_url('uploads/news/'.$row->image); ?>" alt="" class="img-responsive">
                                <div class="news-content">
                                    <div class="news-meta flex no-column">
                                        <h6 class="publish-date"><?php echo int_to_date($row->created); ?></h6>
                                        <h6><a href="#0" class="comment-count"><?php echo $row->view; ?> Lượt xem</a></h6>
                                    </div> <!-- end .news-meta -->
                                    <h3 class="news-title"><?php echo $row->title; ?></h3>
                                    <p class="news-excerpt"><?php echo sub($row->description,130); ?> ...</p>
                                    <a href="<?php echo base_url($newsname.'-'.$row->id.'.html'); ?>" class="button">Đọc tiếp</a>
                                </div> <!-- end .news-content -->
                            </div> <!-- end .news-item -->
                        <?php endforeach; ?>

                        </div>  <!-- end .news-grid-row -->                     
                    </div> <!-- end .news-grid -->
                </div> <!-- end .container -->  
            </div> <!-- end .inner -->
        </div> <!-- end .section -->

        <div class="section Latest-news-section">
                <div class="container">
                <?php if($adverone): ?>
                <div class="ad-home1">
                    <?php foreach($adverone as $row): ?>
                    <div class="col-md-3 col-lg-12 col-xs-12" style="text-align: center;">
                        <a href="<?php echo $row->link; ?>" target="_blank"><img src="<?php echo base_url('uploads/adver/'.$row->image); ?>"></a>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if($advertwo): ?>
                <div class="ad-home2">
                <?php foreach($advertwo as $row): ?>
                 <div class="col-md-12 col-lg-3 col-xs-3" style="text-align: center;">
                      <a href="<?php echo $row->link; ?>" target="_blank"><img src="<?php echo base_url('uploads/adver/'.$row->image); ?>"></a>
                 </div>
                 <?php endforeach; ?>
                </div>
            <?php endif; ?>
                </div>
                </div>

        <!-- Category Section -->
        <div class="section category-section solid-blue-bg">
            <div class="inner">
                <div class="container">
                    <h1 class="light">Việc làm theo danh mục</h1>
                    <div class="category-grid">                 
                        <div class="category-row space-between items-center">
                            <?php foreach($category_home as $row) : ?>
                            <?php $input['where'] = array('career_id'=>$row->id); ?>
                            <?php $total_career = $this->recruitment_model->get_total($input); ?>
                            <?php $catname = $row->cat_name; ?>
                            <div class="item">
                               <a href="<?php echo base_url('viec-lam/'.$catname.'-d'.$row->id); ?>"> <img src="<?php echo public_url(); ?>/site/images/category-icon09.png" alt="" class="img-responsive"></a>
                                <h4><a href="<?php echo base_url('viec-lam/'.$catname.'-d'.$row->id); ?>"><?php echo $row->name; ?></a></h4>
                                <p class="light">( <?php echo $total_career; ?> ) Việc làm</p>
                            </div> <!-- end .item -->
                        <?php endforeach; ?>
                        </div> <!-- end .category-row -->
                     
                    </div>  <!-- end .category-grid -->         
                </div> <!-- end .container -->
            </div> <!-- end .inner --> 
        </div> <!-- end .section -->

        <!-- Clients Section -->
        <div class="section clients-section solid-grey-bg">
            <div class="inner">
                <div class="container">
                    <h1 class="section-title">Nhà tuyển dụng nổi bật</h1>

                    <div class="logo-grid">
                        <div class="logo-grid-row flex space-between">
                           <?php foreach($partners as $row): ?>
                            <div class="logo-item">
                               <a href="<?php echo $row->link; ?>" target="_blank"> <img src="<?php echo base_url('uploads/partner/'.$row->image); ?>"  alt="" title="<?php echo $row->name; ?>" class="img-responsive self-center"></a>
                            </div> <!-- end .logo-item -->
                        <?php endforeach; ?>
                           
                        </div> <!-- end .logo-grid-row -->
                    </div> <!-- end .logo-grid -->



                </div> <!-- end .container -->
            </div> <!-- end .inner -->



        </div> <!-- end .section -->


