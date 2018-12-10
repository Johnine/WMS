<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','user');
    }

    public function index()
	{
	    $data['page'] = 'user';
        $this->load->view('hf/header');
		$this->load->view('pages/nav',$data);
		$this->load->view('pages/maintenance/user');
		$this->load->view('modals/user');
		$this->load->view('hf/footer', $data);
	}

    public function user_list()
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();

            if($user->picture=='blank'){
                $row[] = '<img src="'.base_url().'assets/pic/default.png" width="50px" height = "50px">';
            }else{
                $row[] = '<img src="'.base_url().'assets/pic/'.$user->picture.'" width="50px" height = "50px">';
            }
            $row[] = $user->username;
            $row[] = $user->name;
            $row[] = $user->role;
            $row[] = $user->email;
            $row[] = $user->contactno;
            $row[] = $user->status;
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" id="edit_tooltip" href="javascript:void(0)" title="Edit"> <i class="fa fa-pencil-alt"></i> </a>
                <a class="btn btn-xs btn-danger" id="delete_tooltip" href="javascript:void(0)" title="Delete"> <i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save_user($pic)
    {
//        if($pic=='blank'){
//            if($this->input->post('role') != 'User'){
//                $data['inputerror'][] = 'signature';
//                $data['error_string'][] = 'Signature is required.';
//                $data['status'] = FALSE;
//                echo json_encode($data);
//                exit();
//            }
//        }

//        $dateNow = date('Y-m-d');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => uniqid('pass'),
            'name' => $this->input->post('name'),
            'role' => $this->input->post('role'),
            'email' => $this->input->post('email'),
            'contactno' => $this->input->post('contactno'),
            'status' => $this->input->post('status'),
//            'pwdExpiry' => date('Y-m-d', strtotime($dateNow . '+30 days')),
//            'addedBy' => $this->session->userdata['name'],
//            'addedUsing' => gethostbyaddr($_SERVER['REMOTE_ADDR']),
//            'dateAdded' => date("F d, Y  h:i: s A"),
            'picture' => $pic
        );
        $this->user->save($data);
        echo json_encode(array("status" => TRUE));
    }


    public function get_roles()
    {
        $data = $this->user->get_roles();
        echo json_encode($data);
    }

    public function upload_pic()
    {
        $status = "";
        $msg = "";
        $file_element_name = 'picture';
        $file_name = '';
        if ($status != "error")
        {
            $config['upload_path'] = realpath(APPPATH . '../assets/pic/');
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 2048 * 8;
            $config['overwrite'] 			= TRUE;
            $config['remove_spaces'] 		= TRUE;
            $config['file_name'] 			= uniqid('pic');
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_element_name))
            {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
            }
            else
            {
                $data = $this->upload->data();
                $file_name = str_replace(' ', '', $data['file_name']);
                $msg = "File successfully uploaded";
            }
            @unlink($_FILES[$file_element_name]);
        }
        echo json_encode(array('status' => TRUE, 'msg' => $msg, 'name' => $file_name));
    }
}
