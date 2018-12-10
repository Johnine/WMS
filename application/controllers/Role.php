<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('role_model','role');
    }

    public function index()
	{
	    $role['roles'] = $this->role->get_roles();
	    $data['page'] = 'role';
        $this->load->view('hf/header');
		$this->load->view('pages/nav',$data);
		$this->load->view('pages/maintenance/role',$role);
		$this->load->view('modals/role');
		$this->load->view('hf/footer', $data);
	}

    public function ViewAccess($id,$role)
    {
        $access['access'] = $this->role->get_access($id);
        $access['role'] = $role;
        $access['id'] = $id;
        $data['page'] = 'role';
        $this->load->view('hf/header');
        $this->load->view('pages/nav',$data);
        $this->load->view('pages/maintenance/roleaccess',$access);
        $this->load->view('hf/footer', $data);
    }

    public function save_role()
    {
        $data = array('role' => $this->input->post('role'));
        $this->role->save_role($data);
        echo json_encode(array("status" => TRUE));
    }

    public function save_access()
    {
        $id = $this->input->post('id');
        $access = $this->input->post('access');
        $this->role->del_access($id);
        $accessdata = explode('-',$access);
        foreach ($accessdata as $accss){
            $data = array('role' => $id,
                'access' => $accss);
            $this->role->save_access($data);
        }
        echo json_encode(array("status" => TRUE));
    }
}
