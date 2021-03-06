<?php 
Class Candidate extends MY_Controller{
	public $userface = "";

	function __construct(){
		parent::__construct();
		$this->load->model('member_candidate_model');
		$this->load->library('facebook');
	}

	//kích hoạt tài khoản
	function activation(){
		if(!empty($_GET['code']) && isset($_GET['code']))
		{
		$code=$_GET['code'];
		$input = array();
		$where = array('token_key'=>$code);
		$user = $this->member_candidate_model->get_info_rule($where);
		$id = $user->id;
		if($user){
			$data = array(
				'status'=>1
				);
			$this->member_candidate_model->update($id,$data);
			$this->session->set_userdata('candidate_id_login', $id);
			redirect(base_url('candidate/activation'));
		}
		else{
			redirect();
		}
		}


		$this->data['temp'] = 'site/candidate/activesuccess';
		$this->load->view('site/layout',$this->data);

	}

	function check_login(){
		$user = $this->_get_userinfo();
		if($user){
			return true;
		}
		else{
			$this->form_validation->set_message(__FUNCTION__,'Đăng nhập thất bại !');
			return false;
		}
	}

	function login(){
		if($this->input->post()){
		$this->form_validation->set_rules('email','Địa chỉ email','required');
		$this->form_validation->set_rules('password','Mật khẩu','required');
		$this->form_validation->set_rules('login','Login','callback_check_login');
		if($this->form_validation->run()){
				//lấy ra thông tin thành viên
				$user = $this->_get_userinfo();
				$this->session->set_userdata('candidate_id_login', $user->id);
				redirect(base_url('candidate/view'));
			}
		}


		//login bằng facebook
		$userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
            pre($userProfile);
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];

            // Insert or update user data
            $userID = $this->_get_emailinfo($userData['email']);

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $this->data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $this->data['authUrl'] =  $this->facebook->login_url();
        }

		$this->data['temp'] = 'site/candidate/login';
		$this->load->view('site/layout',$this->data);
	}

		//lấy ra thông tin thành viên
	private function _get_userinfo(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$where = array('email'=>$email, 'password'=>$password, 'status'>=1);
		$user = $this->member_candidate_model->get_info_rule($where);
		return $user;
	}
	private function _get_emailinfo(){
		$email = $this->input->get('email');
		$where = array('email'=>$email);
		$user = $this->member_candidate_model->get_info_rule($where);
		return $user;
	}

	//mẫu hồ sơ
	function cvonline(){

		$this->data['temp'] = 'site/candidate/cvonline';
		$this->load->view('site/layout',$this->data);
	}

	//việc làm đã lưu
	function savejobs(){

			$user_id = $this->session->userdata('candidate_id_login');
			$id = $this->input->post('cid');
			//echo $id;
			$data = array(
			'recruitment_id'=>$id,
			'candidate_id'=>$user_id
			);
			$this->load->model('map_recruitment_model');
			$this->map_recruitment_model->create($data);
					
	}

	function delbookmark(){
			$id = $this->uri->rsegment(3);
			$id = intval($id);
            $this->load->model('map_recruitment_model');
            $this->map_recruitment_model->deleteOne($id);
	}

	function view(){
		$user_id = $this->session->userdata('candidate_id_login');
		$this->load->model('recruitment_model');
		$this->load->model('map_recruitment_model');
		$this->load->model('member_company_model');
		$this->load->model('city_model');
		$this->load->model('salary_model');
		
		
		$user = $this->member_candidate_model->get_info($user_id);
		if(!$user){
			redirect('candidate/login');
		}
		$this->data['user'] = $user;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
		$alert = $this->session->flashdata('alert');
		$this->data['alert'] = $alert;
		//Sửa mô tả bản thân
		$mota= $this->input->post('mt');
		if($mota == 'ok'){
			$this->form_validation->set_rules('description','Mô tả','required');
			if($this->form_validation->run()){
				$description = $this->input->post('description');
				$data = array(
					'description' =>$description
				);
				$this->member_candidate_model->update($user_id,$data);
	
				redirect(base_url('candidate/view'));
			}
		}
				$this->load->model('literacy_model');
     			$literacyname = $this->literacy_model->get_list();
     			$this->data['literacyname'] = $literacyname;
			//kinh nghiem lam viec
			$this->load->model('work_experience_model');
			$input = array();
			$input['where'] = array('candidate_id'=>$user->id);
			$knlamviec = $this->work_experience_model->get_list($input);
			$this->data['knlamviec'] = $knlamviec;
			//trinh do hoc van
			$this->load->model('certificate_model');
			$input['where'] = array('candidate_id'=>$user_id);
			$hocvan = $this->certificate_model->get_list($input);
			$this->data['hocvan'] = $hocvan;
			//kỹ năng
			$this->load->model('skill_model');
			$cskill = $this->skill_model->get_list($input);
			$this->data['cskill'] = $cskill;


		$this->data['temp'] = 'site/candidate/view';
		$this->load->view('site/layout',$this->data);
	}

	//viec lam da ung tuyen
	function job_applied(){

			$user_id = $this->session->userdata('candidate_id_login');
			$this->load->model('map_candidate_recruitment_model');
			$this->load->library('pagination');
			$input = array();
			$input['where'] = array('candidate_id'=>$user_id);
		$total_row = $this->map_candidate_recruitment_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$config = array();
		$config['base_url']    = home_url('ung-vien/viec-lam-da-ung-tuyen');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="list-unstyled flex no-column items-center">';
    	$config['full_tag_close'] = '</ul>';
    	$config['num_tag_open'] = '<li class="button linkcss">';
    	$config['num_tag_close'] = '</li>';
    	$config['first_link'] = '&laquo; First';
    	$config['first_tag_open'] = '<li class="prev page"> Last';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active button">';
    	$config['cur_tag_close'] = '</li>';
		$config['next_link']   = '<span class="button">Trang kế <i class="ion-ios-arrow-right"></i></span>';
		$config['prev_link']   = '<span class="button"><i class="ion-ios-arrow-left"></i> Quay lại</span>';
		$this->pagination->initialize($config);
		

			$input["limit"] = array($config['per_page'], $segment);

			$listmapcandidate = $this->map_candidate_recruitment_model->get_list($input);
			$this->data['listmapcandidate'] = $listmapcandidate;

			$this->data['temp'] = 'site/candidate/job_applied';
			$this->load->view('site/layout',$this->data);
	}
	function job_saved(){
		$user_id = $this->session->userdata('candidate_id_login');
		$this->load->model('map_recruitment_model');
		$this->load->library('pagination');

		$input = array();
		$input['where'] = array('candidate_id'=>$user_id);
		$total_row = $this->map_recruitment_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$config = array();
		$config['base_url']    = home_url('ung-vien/viec-lam-da-luu');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="list-unstyled flex no-column items-center">';
    	$config['full_tag_close'] = '</ul>';
    	$config['num_tag_open'] = '<li class="button linkcss">';
    	$config['num_tag_close'] = '</li>';
    	$config['first_link'] = '&laquo; First';
    	$config['first_tag_open'] = '<li class="prev page"> Last';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active button">';
    	$config['cur_tag_close'] = '</li>';
		$config['next_link']   = '<span class="button">Trang kế <i class="ion-ios-arrow-right"></i></span>';
		$config['prev_link']   = '<span class="button"><i class="ion-ios-arrow-left"></i> Quay lại</span>';
		$this->pagination->initialize($config);
		

		$input["limit"] = array($config['per_page'], $segment);

		$listsave = $this->map_recruitment_model->get_list($input);
		$this->data['listsave'] = $listsave;

		if(!$this->session->userdata('candidate_id_login')){
			redirect();
		}

			$this->data['temp'] = 'site/candidate/job_saved';
			$this->load->view('site/layout',$this->data);
	}

	function company_view(){
		
		$user_id = $this->session->userdata('candidate_id_login');
		$this->load->model('candidate_view_model');
		$this->load->model('member_company_model');
		$this->load->model('city_model');
		$this->load->library('pagination');
		$input = array();
		$input['where'] = array('candidate_id'=>$user_id);
		$total_row = $this->candidate_view_model->get_total($input);
		$this->data['total_row'] = $total_row;
		$segment = $this->uri->segment(3);
		$segment = intval($segment);
		$config = array();
		$config['base_url']    = home_url('ung-vien/nha-tuyen-dung-xem-ho-so');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul class="list-unstyled flex no-column items-center">';
    	$config['full_tag_close'] = '</ul>';
    	$config['num_tag_open'] = '<li class="button linkcss">';
    	$config['num_tag_close'] = '</li>';
    	$config['first_link'] = '&laquo; First';
    	$config['first_tag_open'] = '<li class="prev page"> Last';
    	$config['first_tag_close'] = '</li>';
    	$config['cur_tag_open'] = '<li class="active button">';
    	$config['cur_tag_close'] = '</li>';
		$config['next_link']   = '<span class="button">Trang kế <i class="ion-ios-arrow-right"></i></span>';
		$config['prev_link']   = '<span class="button"><i class="ion-ios-arrow-left"></i> Quay lại</span>';
		$this->pagination->initialize($config);
		

		$input["limit"] = array($config['per_page'], $segment);

		$listview = $this->candidate_view_model->get_list($input);
		$this->data['listview'] = $listview;

		if(!$this->session->userdata('candidate_id_login')){
			redirect();
		}

			$this->data['temp'] = 'site/candidate/company_view';
			$this->load->view('site/layout',$this->data);
	}

	//Xử lý dữ liệu kinh nghiệm làm việc
	function add(){
		$user_id = $this->session->userdata('candidate_id_login');
		if($user_id == null || $user_id==""){
			$data = array(
				'ERROR' => "Phiên làm việc của bạn đã hết hạn. Xin mời đăng nhập lại"				
				);
			echo json_encode($data);
			return;
		}
				
		$desc = $this->input->post('desc');
		$company_name = $this->input->post('company_name');
		$position = $this->input->post('position');
		$from_date = date_to_int($this->input->post('from_date'));
		$to_date = date_to_int($this->input->post('to_date'));
		$data = array(
			'company_name' => $company_name,
			'position' => $position,
			'from_date' => $from_date,
			'to_date' => $to_date,
			'candidate_id'=>$user_id,
			'description' => $desc
			);
		 $this->load->model('work_experience_model');
		
		 $inserted_id = 444;// $this->work_experience_model->create($data);
		 if($inserted_id>0){
			$data = array(
				'SUCCESS' => "Đã thêm kinh nghiệm việc làm. Bạn hãy ấn F5 để hiển thị dữ liệu mới nhất",
				'ID'=> $inserted_id			
				);
				echo json_encode($data);
		 }else{
			$data = array(
				'ERROR' => "Không thể thêm được kinh nghiệm"				
				);
				echo json_encode($data);
		 }
		

	}

     function edit(){
     		if($this->input->post('id'))
     			$id = $this->input->post('id');
				$desc = $this->input->post('desc');
				$company_name = $this->input->post('company_name');
				$position = $this->input->post('position');
				$from_date = $this->input->post('fromdaten');
				$from_date = date_to_int($from_date);
				$to_date = $this->input->post('todaten');
				$to_date = date_to_int($to_date);
				$data = array(
					'company_name' => $company_name,
					'position' => $position,
					'from_date' => $from_date,
					'to_date' => $to_date,
					'description' => $desc
					);
     			$this->load->model('work_experience_model');
           		$this->work_experience_model->update($id,$data);
           		$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
     }                 

     //xử lý dữ liệu học vấn
     function addmajor(){

				$user_id = $this->session->userdata('candidate_id_login');
				$major = $this->input->post('major');
				$name = $this->input->post('name');
				$literacy = $this->input->post('literacy');
				$from_date = $this->input->post('from_date');
				$from_date = date_to_int($from_date);
				$to_date = $this->input->post('to_date');
				$to_date = date_to_int($to_date);
				$info = $this->input->post('info');
				$data = array(
					'major' => $major,
					'name' => $name,
					'literacy_id'=>$literacy,
					'from_date' => $from_date,
					'to_date' => $to_date,
					'candidate_id'=>$user_id,
					'info' => $info
					);
				$this->load->model('certificate_model');
				$this->certificate_model->create($data);
	}

	function editmajor(){
     		if($this->input->post('id'))
     			$id = $this->input->post('id');
				$name = $this->input->post('name');
				$major = $this->input->post('major');
				$literacy = $this->input->post('literacy');
				$from_date = $this->input->post('fromdate');
				$from_date = date_to_int($from_date);
				$to_date = $this->input->post('todate');
				$to_date = date_to_int($to_date);
				$info = $this->input->post('info');
				$data = array(
					'name' => $name,
					'major' => $major,
					'literacy_id'=>$literacy,
					'from_date' => $from_date,
					'to_date' => $to_date,
					'info' => $info
					);
     			$this->load->model('certificate_model');
           		$this->certificate_model->update($id,$data);
     }
     function delmajor($id){
            $id = $this->uri->rsegment(3);
			$id = intval($id);
            $this->load->model('certificate_model');
            $this->certificate_model->deleteOne($id);
        }
     //xu ly du lieu ky nang
	
	 function addskill(){
    	$user_id = $this->session->userdata('candidate_id_login');
		$skill = $this->input->post('skill');
		$data = array(
					'name' => $skill,
					'candidate_id' => $user_id
					);
     			$this->load->model('skill_model');
           		$this->skill_model->create($data);
	}   
	
    function delskill($id){
            $id = $this->uri->rsegment(3);
			$id = intval($id);
            $this->load->model('skill_model');
            $this->skill_model->deleteOne($id);
		}          
		
	function update_cv(){
		$user_id = $this->session->userdata('candidate_id_login');
		$info = $this->member_candidate_model->get_info($user_id);
		$this->data['info'] = $info;
		if(!$info){
			redirect();
		}
		$this->load->model('level_model');
		$currentlv = $this->level_model->get_list();
		$this->data['currentlv'] = $currentlv;
		$this->load->model('require_experience_model');
		$experience = $this->require_experience_model->get_list();
		$this->data['experience'] = $experience;
		$this->load->model('city_model');
		$city = $this->city_model->get_list();
		$this->data['city'] = $city;
		$this->load->model('career_model');
		$career = $this->career_model->get_list();
		$this->data['career'] = $career;
		$this->load->model('salary_model');
		$salary = $this->salary_model->get_list();
		$this->data['salary'] = $salary;
		$this->load->model('literacy_model');
		$literacy = $this->literacy_model->get_list();
		$this->data['literacy'] = $literacy;
		$this->load->model('job_type_model');
		$jobtype = $this->job_type_model->get_list();
		$this->data['jobtype'] = $jobtype;

		if($this->input->post()){
			$this->form_validation->set_rules('full_name','Tên đầy đủ','required');
			$this->form_validation->set_rules('career_id','Ngành nghề','required');
			$this->form_validation->set_rules('title','Chức danh','required');
			$this->form_validation->set_rules('phone','Số điện thoại','required|numeric');
			if($this->form_validation->run()){
				$full_name = $this->input->post('full_name');
				$title = $this->input->post('title');
				$level_id = $this->input->post('level_id');
				$career_id = $this->input->post('career_id');
				$experience_id = $this->input->post('experience_id');
				$salary_id = $this->input->post('salary_id');
				$literacy_id = $this->input->post('literacy_id');
				$level_desired = $this->input->post('level_desired');
				$job_type = $this->input->post('job_type');
				$nationality = $this->input->post('nationality');
				$birthday = $this->input->post('birthday');
				$birthday = date_to_int($birthday);
				$gender = $this->input->post('gender');
				$city_id = $this->input->post('city_id');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');
				//lấy tên file ảnh, upload ảnh đại diện
				$this->load->library('upload_library');
				$upload_path = './uploads/candidate';
				$upload_data = $this->upload_library->upload($upload_path, 'image');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}

				$data = array(
					'full_name' => $full_name,
					'title' => $title,
					'career_id' => $career_id,
					'salary_id' => $salary_id,
					'literacy_id' => $literacy_id,
					'level_desired' => $level_desired,
					'level_id' => $level_id,
					'job_type' => $job_type,
					'experience_id' => $experience_id,
					'nationality' => $nationality,
					'birthday' => $birthday,
					'gender' => $gender,
					'city_id' => $city_id,
					'phone' =>$phone,
					'address' =>$address,
					'modified_date'=> now()
					);
				
				if($image_link!=''){
					$data['image'] = $image_link;
				}

				$this->member_candidate_model->update($user_id,$data);
				$this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công !');
				redirect(base_url('candidate/view'));
			}
			
			}

		$this->data['temp'] = 'site/candidate/update_cv';
		$this->load->view('site/layout',$this->data);
	}

	function check_pass(){
		$pass = $this->_get_passinfo();
		if($pass){
			return true;
		}
		else{
			$this->form_validation->set_message(__FUNCTION__,'Mật khẩu cũ không đúng !');
			return false;
		}
	}

	function changepass(){
		$user_id = $this->session->userdata('candidate_id_login');
		if($this->input->post()){
     			$this->form_validation->set_rules('oldpass','Mật khẩu cũ','required|min_length[6]|callback_check_pass');
     			$this->form_validation->set_rules('newpass','Mật khẩu mới','required|min_length[6]');
     			$this->form_validation->set_rules('repass','Nhập lại mật khẩu mới','required|matches[newpass]');
     			if($this->form_validation->run()){
     			$id = $this->input->post('id');
				$oldpass = $this->input->post('oldpass');
				$newpass = $this->input->post('newpass');
				$repass = $this->input->post('repass');
				$data = array(
					'password'=> md5($newpass),
					'modified_date' => now()
					);
				$this->member_candidate_model->update($user_id,$data);
				$this->session->set_flashdata('message', 'Đổi mật khẩu thành công !');
				redirect(base_url('candidate/view'));
				}

			}
		$this->data['temp'] = 'site/candidate/changepass';
		$this->load->view('site/layout',$this->data);
	}

		//lấy ra thông tin thành viên
	private function _get_passinfo(){
		$password = $this->input->post('oldpass');
		$password = md5($password);
		$where = array('password'=>$password);
		$pass = $this->member_candidate_model->get_info_rule($where);
		return $pass;
	}

	function uploadcv(){
		$user_id = $this->session->userdata('candidate_id_login');
		//$cvname = $_FILES['file']['cacvupload'];

        		$this->load->library('upload_library');
				$upload_path = './uploads/candidatecv';
				$upload_data = $this->upload_library->upload($upload_path, 'file');
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
    
				$data = array(
				'cv_upload' => $_FILES['file']['name'],
				'created' => now()
				);

			$this->member_candidate_model->update($user_id,$data);
			$this->session->set_flashdata('alert', 'Cập nhật cv thành công !');
		
	}

	function intallcv(){
		ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        // retrieve data from model
        // boost the memory limit if it's low ;)
        //$html['temp'] = 'site/candidate/intallcv';
        // render the view into HTML
        $input = array();
        $user_id = $this->session->userdata('candidate_id_login');

        $data['candidate_info'] = $this->member_candidate_model->get_info($user_id);
        $this->load->model('certificate_model');

        $this->load->model('city_model');
        $city_id = $data['candidate_info']->city_id;
        $data['city'] = $this->city_model->get_info($city_id);

        $input['where'] = array('candidate_id'=>$user_id);
        $data['listcetifie'] = $this->certificate_model->get_list($input);

        $this->load->model('work_experience_model');
        $data['listexperience'] = $this->work_experience_model->get_list($input);
        $this->load->model('skill_model');
        $data['skilllist'] = $this->skill_model->get_list($input);

        //$this->$data['temp'] = 'site/candidate/intallcv';
       // $this->load->view('site/layout', $this->data);
        $html = $this->load->view('site/printdi', $data,true);
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');

       
	}
	
	function logout(){
		if($this->session->userdata('candidate_id_login')){
				$this->session->unset_userdata('candidate_id_login');
				redirect(base_url('ung-vien/dang-nhap'));
			}
	}

	function api_desciption(){		
		$user_id = $this->session->userdata('candidate_id_login');
		if($user_id == null || $user_id==""){
			$data = array(
				'ERROR' => "Phiên làm việc của bạn đã hết hạn. Xin mời đăng nhập lại"				
				);
				echo json_encode($data);
		}else{

			$description = $_POST['desciption'];
			$data = array(
				'description' =>$description
			);
			$this->member_candidate_model->update($user_id,$data);
			$data = array(
				'SUCCESS' => "Cập nhật thành công"				
				);
				echo json_encode($data);
		}			
	}

	function api_del_exp(){		
		$user_id = $this->session->userdata('candidate_id_login');
		if($user_id == null || $user_id==""){
			$data = array(
				'ERROR' => "Phiên làm việc của bạn đã hết hạn. Xin mời đăng nhập lại"				
				);
				echo json_encode($data);
		}else{

			$del_id = $_POST['del_id'];
			$this->load->model('work_experience_model');
            $this->work_experience_model->deleteOne($del_id);
			$data = array(
				'SUCCESS' => "Đã xóa thành công"				
				);
				echo json_encode($data);
		}			
	}
}