<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PID extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pid_model','pid');
    }

    public function index()
	{
	    $data['page'] = 'pid';
        $this->load->view('hf/header');
		$this->load->view('pages/nav',$data);
		$this->load->view('pages/maintenance/pid');
		$this->load->view('modals/pid');
		$this->load->view('hf/footer', $data);
	}

    public function pid_list()
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $list = $this->pid->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pid) {
            $no++;
            $row = array();
            $row[] = $pid->pid;
            $row[] = $pid->qty;
            $row[] = $pid->status;
            $row[] = $pid->editdate;
            $row[] = $pid->editwho;
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" id="edit_tooltip" href="javascript:void(0)" title="Edit"> <i class="fa fa-pencil-alt"></i> </a>
                <a class="btn btn-xs btn-danger" id="delete_tooltip" href="javascript:void(0)" title="Delete"> <i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pid->count_all(),
            "recordsFiltered" => $this->pid->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save_pid()
    {
        $data = array('pid' => $this->input->post('pid'),
            'status' => $this->input->post('status'),
            'adddate' => date('Y-m-d H:i:s'),
            'editdate' => date('Y-m-d H:i:s'),
            'editwho' => $this->session->userdata('username'),
            'addwho' => $this->session->userdata('username'));
        $this->pid->save_pid($data);
        echo json_encode(array("status" => TRUE));
    }

    public function get_pid()
    {
        $pid = $this->pid->get_pid();
        echo json_encode($pid);
    }
}
