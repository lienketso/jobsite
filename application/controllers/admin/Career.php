<?php
Class Career extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('career_model');
	}

		function index(){
		$this->load->library('pagination');
		$total_row = $this->career_model->get_total();
		$this->data['total_row'] = $total_row;
		$config = array();
		$config['base_url']    = admin_url('career/index');
		$config['total_rows']  = $total_row;
		$config['per_page']    = 10;
		$config['uri_segment'] = 4;
		$config['next_link']   = "Next page";
		$config['prev_link']   = "Prev page";
		$this->pagination->initialize($config);
		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		$input = array();
		$input["limit"] = array($config['per_page'], $segment);
		$input['where'] = array();
		$name = $this->input->get('name');
		if($name){
			$input['like'] = array('name', $name);
		}

		$list = $this->career_model->get_list($input);
		$this->data['list'] = $list;
		
		//thông báo dữ liệu
		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/career/index';
		$this->load->view('admin/main', $this->data);
	}

	function add(){

		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề danh  mục','required|min_length[6]');
			$this->form_validation->set_rules('is_order','Thứ tự','numeric');
				if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$is_order = $this->input->post('is_order');
				$cat_name = $this->input->post('cat_name');
				$cat_name = slug($name);
				$parent = $this->input->post('parent');
				if($is_order==""){$is_order=99;}

				$data = array(
					'name'=> $name,
					'cat_name' => $cat_name,
					'is_order' => intval($is_order)
					);
				if($this->career_model->create($data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Lỗi dữ liệu, không thêm được !');
				}
				//chuyển sang trang danh sách admin
				redirect(admin_url('career'));
			}

			
		}

		$this->data['temp'] = 'admin/career/add';
		$this->load->view('admin/main', $this->data);
	}

	function edit(){
		$career_id = $this->uri->rsegment(3);
		$career_id = intval($career_id);
		$info = $this->career_model->get_info($career_id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('career'));
		}
		$this->data['info'] = $info;
		if($this->input->post()){
			$this->form_validation->set_rules('name','Tiêu đề danh  mục','required|min_length[6]');
				if($this->form_validation->run()){
				//tiến hành thêm vào csdl
				$name = $this->input->post('name');
				$is_order = $this->input->post('is_order');
				$cat_name = $this->input->post('cat_name');
				$cat_name = slug($name);
				if($is_order==""){$is_order=99;}

				$data = array(
					'name'=> $name,
					'cat_name' => $cat_name,
					'is_order' => intval($is_order)
					);
				if($this->career_model->update($career_id, $data)){
					// tạo nội dung thông báo
					$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				}
				else{
					$this->session->set_flashdata('message', 'Sửa dữ liệu thành công !');
				}
				//chuyển sang trang danh sách danh mục
				redirect(admin_url('career'));
			}
			
		}

		$this->data['temp'] = 'admin/career/edit';
		$this->load->view('admin/main', $this->data);
	}

	function del(){
		$id = $this->uri->rsegment(3);
		$id = intval($id);

		$info = $this->career_model->get_info($id);
		if (!$info) {
			$this->session->set_flashdata('message','Không tồn tại danh mục này');
			redirect(admin_url('career'));
		}
		$this->data['info'] = $info;

		//kiểm tra xem danh mục có sản phẩm không mới cho xóa
		//$this->load->model('product_model');
		//$product = $this->product_model->get_info_rule(array('carrer_id'=>$id), 'id'); //lấy ra sản phẩm có category_id 
		//if($product){
			//$this->session->set_flashdata('message','Danh mục có chứa bài viết, bạn phải xóa bài viết trước khi xóa danh mục ! ');
			//redirect(admin_url('career'));
		//}

		$this->career_model->deleteOne($id);
			$this->session->set_flashdata('message','Xóa danh mục thành công ! ');
			redirect(admin_url('career'));
	}

	function delete_all()
    {
        $ids = $this->input->post('id[]');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
        $this->session->set_flashdata('message','Xóa tùy chọn thành công');
        redirect(admin_url('career'));
    }
    
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $category = $this->career_model->get_info($id);
        if(!$category)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại danh mục này');
            redirect(admin_url('category'));
        }
        //thuc hien xoa danh mục
        $this->career_model->deleteOne($id);
    }


}