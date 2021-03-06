
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
            <div class="thongbao-tc">
            <?php
                if (isset($message)) {
                    $this->load->view('admin/message', $this->data);
                }
                ?>
            <div class="alert alert-success alert-hide">
            <button type="button" class="close" data-dismiss="alert">×</button>            
            <strong>Thành công!</strong>
             <span class="alert-msg"></span>
            </div>

            <div class="alert alert-warning alert-hide">
            <button type="button" class="close" data-dismiss="alert">×</button>            
            <strong>Cảnh báo!</strong>
             <span class="alert-msg"></span>
            </div>

            <div class="alert alert-danger alert-hide">
            <button type="button" class="close" data-dismiss="alert">×</button>            
            <strong>Lỗi!</strong>
             <span class="alert-msg"></span>
            </div>
            </div>
            <div class="candidate-dashboard-wrapper flex space-between no-wrap">

<?php $this->load->view('site/candidate/left'); ?>

                <div class="right-side-content">
                    <div class="tab-content candidate-dashboard">

                        <div id="resume" class="tab-pane fade in active">
                            <div class="profile-badge"><h6>Hồ sơ của tôi</h6></div>
                            <div class="profile-wrapper">                                
                                <form method="post" name="frmmt" action="<?php echo base_url('candidate/view'); ?>" >
                                    <input type="hidden" name="mt">
                                    <div class="profile-info profile-section flex no-column no-wrap">
                                        <div class="profile-picture">
                                            <?php if($user_info->image!=''): ?>
                                            <img src="<?php echo base_url('uploads/candidate/'.$user_info->image); ?>" alt="" class="img-responsive">
                                        <?php else: ?>
                                            <img src="<?php echo public_url('site/images/user.png'); ?>" alt="" class="img-responsive">
                                        <?php endif; ?>
                                        </div> <!-- end .user-picture -->
                                        <div class="profile-meta">
                                            <h4 class="dark"><?php echo $user_info->full_name; ?></h4>
                                            <p><?php echo $user_info->title; ?></p>
                                            <div class="profile-contact flex items-center no-wrap no-column">
                                                <p class="contact-location"><?php echo $user_info->address; ?></span></p>
                                                <p class="contact-phone"><?php echo $user_info->phone; ?></p>
                                                <p class="contact-email"><?php echo $user_info->email; ?></p>
                                            </div> <!-- end .profile-contact -->
                                            <ul class="list-unstyled flex no-column">
                                                <li><a href="<?php echo base_url('ung-vien/ho-so-mau'); ?>" style="padding: 10px; border: 1px solid #ccc; border-radius: 5px;"><i class="ion-clipboard"></i>Tải hồ sơ</a></li>

                                            </ul> <!-- end .social-icons -->
                                        </div> <!-- end .profile-meta -->
                                    </div> <!-- end .profile-info -->

                                    <div class="divider"></div>

                                    <div class="profile-about profile-section">
                                        <h3 class="dark profile-title">Mục tiêu nghề nghiệp<span><a data-toggle="collapse" data-target="#pn_description" style="cursor: pointer;"><i class="ion-edit"></i></a></span></h3>
                                        <?php if (empty($user_info->description)) : ?>
                                            <p>Giới thiệu bản thân và miêu tả mục tiêu nghề nghiệp của bạn.</p>
                                        <?php else: ?>
                                            <p id="user_description"><?php echo $user_info->description; ?></p>
                                                <?php endif; ?>
                                        <div id="pn_description" class="collapse" style="padding-top: 15px;">
                                        <textarea name="description" class="txtarea" id="description"><?php echo $user_info->description; ?></textarea>										
                                            <p class="btnluu" style="padding-top: 15px;text-align: right;">
                                                <button type="button" id="29" class="button" onclick="saveDescription();">Lưu lại</button>
                                                <button type="button" class="button" data-toggle="collapse" data-target="#pn_description" aria-expanded="true">Hủy</button>
                                            </p>
                                        </div>

                                    </div> <!-- end .profile-about -->

                                    <div class="divider"></div>
                                </form>                               
                                <script type="text/javascript">
                                    $(document).ready(function () {


                                        //edit dữ liệu
                                        $(".edit_tr").click(function () {

                                            $("#LoadingImage").show(); //show loading image	
                                            var ID = $(this).attr('id');
                                            var compan = $("#company_" + ID).val();
                                            var descr = $("#desc_" + ID).val();
                                            var posit = $("#position_" + ID).val();
                                            var frdate = $("#fromdate_" + ID).val();
                                            var todate = $("#todate_" + ID).val();

                                            jQuery.ajax({
                                                cache: false,
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/edit", //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: "id=" + ID + "&company_name=" + compan + "&position=" + posit + "&desc=" + descr + "&fromdaten=" + frdate + "&todaten=" + todate, //Form variables
                                                success: function (response) {
                                                    $("#responds").append(response);
                                                    $("#FormEdit").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image; 
                                                    $('#demo_' + ID).fadeOut();
                                                    window.location.reload();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    $("#FormEdit").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    alert("Lỗi không kết nối được");
                                                    //alert(thrownError);
                                                }
                                            });
                                        });

                                    });
                                </script> 

                                <div class="profile-experience-wrapper profile-section">
                                    <div class="content_wrapper">
                                        <h3 class="dark profile-title">Kinh nghiệm làm việc<span><a data-toggle="collapse" data-target="#demo1" style="cursor: pointer;"><i class="ion-edit"></i></a></span></h3>
                                        <div id="demo1" class="collapse">
                                            <div class="form-group-wrapper flex space-between items-center">
                                                <div class="form-group">
                                                    <p class="label">Tên công ty*</p>
                                                    <input type="text" id="companyname" name="company_name" required="">
                                                </div> <!-- end .form-group -->
                                                <div class="form-group">
                                                    <p class="label">Chức danh*</p>
                                                    <input type="text" id="position" name="position" placeholder="Nhập vị trí công việc của bạn" required="">
                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .form-group-wrapper -->
                                            <div class="form-group-wrapper flex space-between items-center">
                                                <div class="form-group">
                                                    <p class="label">Từ tháng*</p>
                                                    <input type="text" class="datepicker" id="fromdate" name="from_date" placeholder="" required="">
                                                </div> <!-- end .form-group -->
                                                <div class="form-group">
                                                    <p class="label">Đến tháng*</p>
                                                    <input type="text" class="datepicker1" name="to_date" id="todate" required="">
                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .form-group-wrapper -->

                                            <div class="form-group textarea">
                                                <p class="label">Mô tả công việc*</p>
                                                <textarea name="desc" id="contentText" rows="6" placeholder="Nhập mô tả công việc của bạn" class="txtarea"></textarea>
                                            </div> <!-- end .form-group -->
                                            <p style="text-align: right;">
                                                <button type="button" class="button" id="FormSubmit" onclick="addExperience()" >Lưu lại</button>
                                                <button type="button" class="button" data-toggle="collapse" data-target="#demo1">Hủy</button>
                                            </p>
                                            <img src="<?php echo public_url('site/images/loading.gif') ?>" id="LoadingImage" style="display:none" />
                                        </div>

                                        <div id="list_exp">
<?php foreach ($knlamviec as $row): ?>
                                                <div id="item_<?php echo $row->id; ?>">
                                                    <div class="profile-experience flex space-between no-wrap no-column">
                                                        <div class="">
                                                            <h5 class="profile-designation dark"><?php echo $row->position; ?></h5>
                                                            <span class="profile-company dark"><?php echo $row->company_name; ?></span>
                                                            <p class="small ultra-light">
                                                                Từ tháng <b><?php echo int_to_date($row->from_date); ?></b> đến tháng <b><?php echo int_to_date($row->to_date); ?></b></p>
                                                            <p class="profile-description"><?php echo $row->description; ?></p>

                                                        </div> <!-- end .profile-experience-left -->
                                                        <div class="profile-experience-right">
                                                            <span><a class="link_edit" data-toggle="collapse" data-target="#edit_pn_exp_<?php echo $row->id; ?>" style="cursor: pointer;"><i class="ion-edit"></i></a></span>
                                                            <div class="del_wrapper">
                                                                <span><a  class="link_del"style="cursor: pointer;" onclick="removeExperience(<?php echo $row->id; ?>)"><i class="ion-close-circled"></i></a></span>
                                                            </div>
                                                        </div> <!-- end .profile-experience-right -->
                                                    </div> <!-- end .profile-experience -->

                                                    <div id="edit_pn_exp_<?php echo $row->id ?>" class="collapse">
                                                        <div class="form-group-wrapper flex space-between items-center">
                                                            <div class="form-group">
                                                                <p class="label">Tên công ty*</p>
                                                                <input type="text" id="company_<?php echo $row->id; ?>" value="<?php echo $row->company_name; ?>" class="txt_company">
                                                            </div> <!-- end .form-group -->
                                                            <div class="form-group">
                                                                <p class="label">Chức danh*</p>
                                                                <input type="text" id="position_<?php echo $row->id; ?>" value="<?php echo $row->position; ?>" class="txt_position">
                                                            </div> <!-- end .form-group -->
                                                        </div> <!-- end .form-group-wrapper -->
                                                        <div class="form-group-wrapper flex space-between items-center">
                                                            <div class="form-group">
                                                                <p class="label">Từ tháng*</p>
                                                                <input type="text" class="datepicker from_date" id="fromdate_<?php echo $row->id; ?>" value="<?php echo int_to_date($row->from_date); ?>">
                                                            </div> <!-- end .form-group -->
                                                            <div class="form-group">
                                                                <p class="label">Đến tháng*</p>
                                                                <input type="text" class="datepicker1 to_date" id="todate_<?php echo $row->id; ?>" value="<?php echo int_to_date($row->to_date); ?>">
                                                            </div> <!-- end .form-group -->
                                                        </div> <!-- end .form-group-wrapper -->

                                                        <div class="form-group textarea">
                                                            <p class="label">Mô tả công việc*</p>
                                                            <textarea id="desc_<?php echo $row->id; ?>" rows="6" class="txtarea"><?php echo $row->description; ?></textarea>
                                                        </div> <!-- end .form-group -->
                                                        <p style="text-align: right;">
                                                            <button type="submit" id="<?php echo $row->id; ?>" class="edit_tr button">Lưu lại</button>
                                                            <button type="button" class="button" data-toggle="collapse" data-target="#edit_pn_exp_<?php echo $row->id; ?>">Hủy</button>
                                                        </p>
                                                        <img src="<?php echo public_url('site/images/loading.gif') ?>" id="LoadingImage" style="display:none" />
                                                    </div>

                                                </div>
<?php endforeach; ?>

                                        </div>

                                    </div>
                                </div> <!-- end .profile-experience-wrapper -->

                                <div class="divider"></div>


                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        //add dữ liệu
                                        $("#FormCetifiel").click(function (e) {
                                            e.preventDefault();
                                            if ($("#b_major").val() === '')
                                            {
                                                alert("Bạn chưa điền nội dung");
                                                return false;
                                            }
                                            $("#FormCetifiel").hide(); //hide submit button
                                            $("#LoadingImage").show(); //show loading image			
                                            var major = 'major=' + $("#b_major").val(); //build a post data structure
                                            var names = 'name=' + $("#b_name").val();
                                            var literacy = 'literacy=' + $("#b_literacy").val();
                                            var fodate = 'from_date=' + $("#b_fromdate").val();
                                            var tcdate = 'to_date=' + $("#b_todate").val();
                                            var info = 'info=' + $("#b_info").val();
                                            jQuery.ajax({
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/addmajor", //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: major + "&" + names + "&" + literacy + "&" + fodate + "&" + tcdate + "&" + info, //Form variables
                                                success: function ($response) {
                                                    //$("#responds").append($response);
                                                    $("#FormCetifiel").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    $("#demo2").hide();
                                                    window.location.reload();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    $("#FormCetifiel").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    alert("Lỗi không kết nối được");
                                                    //alert(thrownError);
                                                }
                                            });
                                        });

                                        //edit dữ liệu
                                        $(".edit_hocvan").click(function () {

                                            $("#LoadingImage").show(); //show loading image	
                                            var ID = $(this).attr('id');
                                            var tname = $("#name_" + ID).val();
                                            var major = $("#major_" + ID).val();
                                            var literacy = $("#literacy_" + ID).val();
                                            var fromdate = $("#fromdate_" + ID).val();
                                            var todate = $("#todate_" + ID).val();
                                            var info = $("#info_" + ID).val();
                                            jQuery.ajax({
                                                cache: false,
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/editmajor", //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: "id=" + ID + "&name=" + tname + "&major=" + major + "&literacy=" + literacy + "&fromdate=" + fromdate + "&todate=" + todate + "&info=" + info, //Form variables
                                                success: function (response) {
                                                    $("#responds").append(response);
                                                    $("#LoadingImage").hide(); //hide loading image; 
                                                    $('#hocvan_' + ID).fadeOut();
                                                    window.location.reload();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    alert("Lỗi không kết nối được");
                                                    //alert(thrownError);
                                                }
                                            });
                                        });

                                        //del dữ liệu
                                        $(".wrapper_hocvan").on("click", "#respondse .del_hocvan", function (e) {
                                            e.preventDefault();
                                            var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                                            var DbNumberID = clickedID[1]; //and get number from array
                                            var myData = 'recordToDelete=' + DbNumberID; //build a post data structure
                                            $('#itema_' + DbNumberID).addClass("sel"); //change background of this element by adding class
                                            $(this).hide(); //hide currently clicked delete button

                                            jQuery.ajax({
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/delmajor/" + DbNumberID, //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: myData, //Form variables
                                                success: function (response) {
                                                    //on success, hide  element user wants to delete.
                                                    $('#itema_' + DbNumberID).fadeOut();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    //On error, we alert user
                                                    alert(thrownError);
                                                }
                                            });
                                        });
                                    });
                                </script> 

                                <div class="profile-education-wrapper profile-section">
                                    <div class="wrapper_hocvan">
                                        <h3 class="dark profile-title">Học vấn và bằng cấp<span><a data-toggle="collapse" data-target="#demo2" style="cursor: pointer;"><i class="ion-edit"></i></a></span></h3>
                                        <div id="demo2" class="collapse">
                                            <div class="space-between items-center">
                                                <div class="form-group">
                                                    <p class="label">Chuyên nghành*</p>
                                                    <input type="text" id="b_major" name="major" required="">
                                                </div> <!-- end .form-group -->

                                            </div> <!-- end .form-group-wrapper -->
                                            <div class="form-group-wrapper flex space-between items-center">
                                                <div class="form-group">
                                                    <p class="label">Trường*</p>
                                                    <input type="text" id="b_name" name="name" required="">
                                                </div> <!-- end .form-group -->
                                                <div class="form-group">
                                                    <p class="label">Bằng cấp*</p>

                                                    <select name="literacy" id="b_literacy" style="width: 100%;">
                                                        <option value="0">---Vui lòng chọn---</option>
                                                        <?php foreach ($literacyname as $row): ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
<?php endforeach; ?>
                                                    </select>

                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .form-group-wrapper -->
                                            <div class="form-group-wrapper flex space-between items-center">
                                                <div class="form-group">
                                                    <p class="label">Từ tháng*</p>
                                                    <input type="text" class="datepicker" id="b_fromdate" name="from_date" required="">
                                                </div> <!-- end .form-group -->
                                                <div class="form-group">
                                                    <p class="label">Đến tháng*</p>
                                                    <input type="text" class="datepicker1" name="to_date" id="b_todate" required="">
                                                </div> <!-- end .form-group -->
                                            </div> <!-- end .form-group-wrapper -->

                                            <div class="form-group textarea">
                                                <p class="label">Thành tựu học tập*</p>
                                                <textarea name="info" id="b_info" rows="6" class="txtarea"></textarea>
                                            </div> <!-- end .form-group -->
                                            <p style="text-align: right;">
                                                <button type="submit" class="button" id="FormCetifiel" >Lưu lại</button>
                                                <button type="button" class="button" data-toggle="collapse" data-target="#demo2">Hủy</button>
                                            </p>
                                            <img src="<?php echo public_url('site/images/loading.gif') ?>" id="LoadingImage" style="display:none" />
                                        </div>
                                        <div id="respondse">
<?php foreach ($hocvan as $row): ?>
                                                <div id="itema_<?php echo $row->id; ?>">
                                                    <div class="profile-education">												
                                                        <h5 class="dark"><?php echo $row->name; ?></h5>
                                                        <p><?php echo $row->major; ?></p>
                                                        <p class="ultra-light"><?php echo int_to_date($row->from_date); ?> - <?php echo int_to_date($row->to_date); ?></p>
                                                        <p><?php echo $row->info; ?></p>
                                                        <a data-toggle="collapse" data-target="#hocvan_<?php echo $row->id; ?>" style="cursor: pointer;"><i class="ion-edit"></i> Sửa</a>
                                                        <a class="del_hocvan" id="dele-<?php echo $row->id; ?>" style="cursor: pointer;"><i class="ion-close-circled"></i> Xóa</a>
                                                    </div> <!-- end .profile-education -->
                                                </div>
                                                <div class="spacer-md"></div>

                                                <div id="hocvan_<?php echo $row->id; ?>" class="collapse">
                                                    <div class="space-between items-center">
                                                        <div class="form-group">
                                                            <p class="label">Chuyên nghành*</p>
                                                            <input type="text" id="major_<?php echo $row->id; ?>" value="<?php echo $row->major; ?>">
                                                        </div> <!-- end .form-group -->

                                                    </div> <!-- end .form-group-wrapper -->
                                                    <div class="form-group-wrapper flex space-between items-center">
                                                        <div class="form-group">
                                                            <p class="label">Trường*</p>
                                                            <input type="text" id="name_<?php echo $row->id; ?>" value="<?php echo $row->name; ?>">
                                                        </div> <!-- end .form-group -->
                                                        <div class="form-group">
                                                            <p class="label">Bằng cấp*</p>
                                                            <select id="literacy_<?php echo $row->id; ?>" style="width: 100%;">
                                                                <option value="0">---Vui lòng chọn---</option>
                                                                <?php foreach ($literacyname as $lit): ?>
                                                                    <option value="<?php echo $lit->id; ?>" <?php echo ($row->id == $lit->id) ? "selected" : ""; ?>><?php echo $lit->name; ?></option>
    <?php endforeach; ?>
                                                            </select>
                                                        </div> <!-- end .form-group -->
                                                    </div> <!-- end .form-group-wrapper -->
                                                    <div class="form-group-wrapper flex space-between items-center">
                                                        <div class="form-group">
                                                            <p class="label">Từ tháng*</p>
                                                            <input type="text" class="datepicker" id="fromdate_<?php echo $row->id; ?>"  value="<?php echo int_to_date($row->from_date); ?>">
                                                        </div> <!-- end .form-group -->
                                                        <div class="form-group">
                                                            <p class="label">Đến tháng*</p>
                                                            <input type="text" class="datepicker1" id="todate_<?php echo $row->id; ?>" value="<?php echo int_to_date($row->to_date); ?>">
                                                        </div> <!-- end .form-group -->
                                                    </div> <!-- end .form-group-wrapper -->

                                                    <div class="form-group textarea">
                                                        <p class="label">Thành tựu học tập*</p>
                                                        <textarea id="info_<?php echo $row->id; ?>" rows="6" class="txtarea"><?php echo $row->info; ?></textarea>
                                                    </div> <!-- end .form-group -->
                                                    <p style="text-align: right;">
                                                        <button type="submit" class="edit_hocvan" id="<?php echo $row->id; ?>" >Lưu lại</button>
                                                        <button type="button" class="button" data-toggle="collapse" data-target="#hocvan_<?php echo $row->id; ?>">Hủy</button>
                                                    </p>
                                                    <img src="<?php echo public_url('site/images/loading.gif') ?>" id="LoadingImage" style="display:none" />
                                                </div>

<?php endforeach; ?>
                                        </div>
                                    </div>
                                </div> <!-- end .profile-education-wrapper -->

                                <div class="divider"></div>


                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        //add dữ liệu
                                        $("#FormSkill").click(function (e) {
                                            e.preventDefault();
                                            if ($("#c_skill").val() === '')
                                            {
                                                alert("Bạn chưa điền nội dung");
                                                return false;
                                            }
                                            $("#FormSkill").hide(); //hide submit button
                                            $("#LoadingImage").show(); //show loading image			
                                            var skills = 'skill=' + $("#c_skill").val(); //build a post data structure
                                            jQuery.ajax({
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/addskill", //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: skills, //Form variables
                                                success: function ($response) {
                                                    $("#responds").append($response);
                                                    $("#FormSkill").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    $("#demo3").hide();
                                                    window.location.reload();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    $("#FormSkill").show(); //show submit button
                                                    $("#LoadingImage").hide(); //hide loading image
                                                    alert("Lỗi không kết nối được");
                                                    //alert(thrownError);
                                                }
                                            });
                                        });

                                        //del dữ liệu
                                        $(".wrapper_skill").on("click", "#respondseo .del_skill", function (e) {
                                            e.preventDefault();
                                            var clickedID = this.id.split('-'); //Split ID string (Split works as PHP explode)
                                            var DbNumberID = clickedID[1]; //and get number from array
                                            var myData = 'recordToDelete=' + DbNumberID; //build a post data structure
                                            $('#itemsk_' + DbNumberID).addClass("sel"); //change background of this element by adding class
                                            $(this).hide(); //hide currently clicked delete button

                                            jQuery.ajax({
                                                type: "POST", // HTTP method POST or GET
                                                url: "<?php echo base_url() ?>candidate/delskill/" + DbNumberID, //Where to make Ajax calls
                                                dataType: "text", // Data type, HTML, json etc.
                                                data: myData, //Form variables
                                                success: function (response) {
                                                    //on success, hide  element user wants to delete.
                                                    $('#itemsk_' + DbNumberID).fadeOut();
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    //On error, we alert user
                                                    alert(thrownError);
                                                }
                                            });
                                        });
                                    });
                                </script> 



                                <div class="profile-skills-wrapper profile-section">
                                    <h3 class="dark profile-title">Kỹ năng làm việc<span><a data-toggle="collapse" data-target="#demo3" style="cursor: pointer;"><i class="ion-edit"></i></a></span></h3>
                                    <div id="demo3" class="collapse">
                                        <div class="space-between items-center">
                                            <div class="form-group">
                                                <p class="label">Kỹ năng*</p>
                                                <input type="text" id="c_skill" name="skill" >
                                            </div> <!-- end .form-group -->		
                                            <p style="padding-bottom: 20px;">
                                                <button type="submit" class="button" id="FormSkill" >Lưu lại</button>
                                                <button class="button" data-toggle="collapse" data-target="#demo3"> Hủy</button>
                                            </p>
                                        </div> <!-- end .form-group-wrapper -->
                                    </div>
                                    <div class="wrapper_skill">
                                        <div id="respondseo">
<?php foreach ($cskill as $row): ?>
                                                <div id="itemsk_<?php echo $row->id; ?>">
                                                    <div class="flex space-between items-center no-wrap">
                                                        <span class="button button-sm grey "><?php echo $row->name; ?> <a class="del_skill" id="delete-<?php echo $row->id; ?>" style="cursor: pointer; color: #fff;"> <i class="ion-close-circled"></i></a></span>
                                                    </div> <!-- end .progress-wrapper -->
                                                    <div class="spacer-xs"></div>
                                                </div>
<?php endforeach; ?>
                                        </div>	
                                    </div>				

                                </div> <!-- end .profile-skills-wrapper -->
                            </div> <!-- end .profile-wrapper -->						        
                        </div> <!-- end #resume-tab -->
                    </div> <!-- end .candidate-dashboard -->
                </div> <!-- end .right-side-content -->
            </div> <!-- end .candidate-dashboard-wrapper -->
        </div> <!-- end .container -->
    </div> <!-- end .inner -->
</div> <!-- end .section -->
<script type="text/javascript">
function saveDescription() {    
    var description= $('#description').val().trim();
    $.ajax({
        type: "post",
        url: "<?php echo base_url() ?>candidate/api_desciption",
        cache: false,               
        data: {'desciption':description},
        success: function(json){                        
        try{        
            var obj = jQuery.parseJSON(json);
            if(typeof obj['ERROR'] != 'undefined'){
            $('.alert-danger > .alert-msg').html(obj['ERROR']);
            $('.alert-danger').removeClass('alert-hide');     
            $("#user_description").html(description);
            $("#pn_description").collapse("hide");      
            };

           if(typeof obj['SUCCESS'] != 'undefined'){
            $('.alert-success > .alert-msg').html(obj['SUCCESS']);
            $('.alert-success').removeClass('alert-hide');     
            $("#user_description").html(description);
            $("#pn_description").collapse("hide");      
            };

        }catch(e) {     
            alert('Exception while request..');
        }       
        },
        error: function(){
            $('.alert-danger > .alert-msg').html('Có lỗi ghi gửi dữ liệu');                      
            $('.alert-danger').removeClass('alert-hide');
            
        }
 });    
}

function addExperience(){
    if ($("#contentText").val() === '')
    {
        bootbox.alert("Bạn chưa điền nội dung!");                                                
        return false;
    }
		
var content = $("#contentText").val().trim(); //build a post data structure
var company = $("#companyname").val().trim();
var position = $("#position").val().trim();
var from_date = $("#fromdate").val().trim();
var to_date = $("#todate").val().trim();
jQuery.ajax({
        type: "POST", // HTTP method POST or GET
        url: "<?php echo base_url() ?>candidate/add", //Where to make Ajax calls
        dataType: "json", // Data type, HTML, json etc.
        data: {'desc':content,'company_name':company,'position':position,'from_date':from_date,'to_date':to_date}, //Form variables
        success: function(resonse){                        
            try{        
              
                if(typeof resonse.ERROR != 'undefined'){
                $('.alert-danger > .alert-msg').html(resonse.ERROR);
                $('.alert-danger').removeClass('alert-hide');     
                };           
            if(typeof  resonse.SUCCESS != 'undefined'){
                // if(typeof resonse.ID != 'undefined'){
                //    var first_child_id= $('#list_exp').children().first().attr('id');
                //     $( "#"+first_child_id ).clone().insertBefore( "#"+first_child_id );

                //     //new element 
                //     $('#list_exp').children().first().attr('id','item_'+resonse.ID);
                //     $('div#item_'+resonse.ID+' h5.profile-designation').html(position);
                //     $('div#item_'+resonse.ID+' span.profile-company').html(company);
                //     $('div#item_'+resonse.ID+' p.small.ultra-light').html("Từ tháng <b>" + from_date + "</b> đến tháng <b>" + to_date + "</b>");
                //     $('div#item_'+resonse.ID+' p.profile-description').html(content);
                // }

                $('.alert-success > .alert-msg').html(resonse.SUCCESS);
                $('.alert-success').removeClass('alert-hide');

                };

            }catch(e) {     
                console.log(e);               
            }       
            },
        error: function(){
            $('.alert-danger > .alert-msg').html('Có lỗi ghi gửi dữ liệu');                      
            $('.alert-danger').removeClass('alert-hide');
            
        }
    });                                       
}
function removeExperience(id){
    bootbox.confirm({
    message: "Bạn thật sự muốn xóa thông tin này?",
    buttons: {
        confirm: {
            label: 'Yes',
            className: 'btn-success'
        },
        cancel: {
            label: 'No',
            className: 'btn-danger'
        }
    },
    callback: function (result) {
        if(result==true){
            $.ajax({
                type: "post",
                url: "<?php echo base_url() ?>candidate/api_del_exp",
                cache: false,               
                data: {'del_id':id},
                success: function(json){                        
                try{        
                    var obj = jQuery.parseJSON(json);
                    if(typeof obj['ERROR'] != 'undefined'){
                    $('.alert-danger > .alert-msg').html(obj['ERROR']);
                    $('.alert-danger').removeClass('alert-hide');     
                    };           
                if(typeof obj['SUCCESS'] != 'undefined'){
                    $('div#item_'+id).remove()
                    $('.alert-success > .alert-msg').html(obj['SUCCESS']);
                    $('.alert-success').removeClass('alert-hide');     
                    };

                }catch(e) {     
                    alert('Exception while request..');
                }       
                },
                error: function(){
                    $('.alert-danger > .alert-msg').html('Có lỗi ghi gửi dữ liệu');                      
                    $('.alert-danger').removeClass('alert-hide');
                    
                }
            });
        }       
    }
});
}
</script>