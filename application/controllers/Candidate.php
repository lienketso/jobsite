<?php 
Class Candidate extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('member_candidate_model');
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

		$this->data['temp'] = 'site/candidate/login';
		$this->load->view('site/layout',$this->data);
	}

		//lấy ra thông tin thành viên
	private function _get_userinfo(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$password = md5($password);
		$where = array('email'=>$email, 'password'=>$password);
		$user = $this->member_candidate_model->get_info_rule($where);
		return $user;
	}

	function view(){
		if(!$this->session->userdata('candidate_id_login')){
			redirect();
		}
		$user_id = $this->session->userdata('candidate_id_login');
		$user = $this->member_candidate_model->get_info($user_id);
		if(!$user){
			redirect('candidate/login');
		}
		$this->data['user'] = $user;
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;
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
	//Xử lý dữ liệu kinh nghiệm làm việc
	function add(){
				$user_id = $this->session->userdata('candidate_id_login');
				$desc = $this->input->post('desc');
				$company_name = $this->input->post('company_name');
				$position = $this->input->post('position');
				$from_date = $this->input->post('from_date');
				$to_date = $this->input->post('to_date');
				$data = array(
					'company_name' => $company_name,
					'position' => $position,
					'from_date' => date("Y-m-d 00:00:00", strtotime($from_date)),
					'to_date' => date("Y-m-d 00:00:00", strtotime($to_date)),
					'candidate_id'=>$user_id,
					'description' => $desc
					);
				$this->load->model('work_experience_model');
				$this->work_experience_model->create($data);
	}
	function del($id){
            $id = $this->uri->rsegment(3);
			$id = intval($id);
            $this->load->model('work_experience_model');
            $this->work_experience_model->deleteOne($id);
        }
     function edit(){
     		if($this->input->post('id'))
     			$id = $this->input->post('id');
				$desc = $this->input->post('desc');
				$company_name = $this->input->post('company_name');
				$position = $this->input->post('position');
				$from_date = $this->input->post('fromdaten');
				$to_date = $this->input->post('todaten');
				$data = array(
					'company_name' => $company_name,
					'position' => $position,
					'from_date' => date("Y-m-d 00:00:00", strtotime($from_date)),
					'to_date' => date("Y-m-d 00:00:00", strtotime($to_date)),
					'description' => $desc
					);
     			$this->load->model('work_experience_model');
           		 $this->work_experience_model->update($id,$data);
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



	function update_cv(){
		$user_id = $this->session->userdata('candidate_id_login');
		$info = $this->member_candidate_model->get_info($user_id);

		$this->load->model('level_model');
		$currentlv = $this->level_model->get_list();
		$this->data['currentlv'] = $currentlv;
		$this->data['temp'] = 'site/candidate/update_cv';
		$this->load->view('site/layout',$this->data);
	}

	function edit_account(){
		$user_id = $this->session->userdata('candidate_id_login');
		$info = $this->member_candidate_model->get_info($user_id);
		//lấy ra thành phố
		$this->load->model('city_model');
		$input = array();
		//$input['where'] = array('id'=>$info->city_id);
		$city = $this->city_model->get_list($input);
		$this->data['city'] = $city;
		$this->data['info'] = $info;

		if($this->input->post()){
			$this->form_validation->set_rules('full_name','Tên đầy đủ','required');
			if($this->form_validation->run()){
				
				$full_name = $this->input->post('full_name');
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
					'gender' => $gender,
					'city_id' => $city_id,
					'phone' =>$phone,
					'address' =>$address
					);
				
				if($image_link!=''){
					$data['image'] = $image_link;
				}

				$this->member_candidate_model->update($user_id,$data);
			}
			redirect(base_url('candidate/edit_account'));

		}

		$this->data['temp'] = 'site/candidate/edit_account';
		$this->load->view('site/layout',$this->data);
	}

	function logout(){
		if($this->session->userdata('candidate_id_login')){
				$this->session->unset_userdata('candidate_id_login');
				redirect(base_url('candidate/login'));
			}
	}
}