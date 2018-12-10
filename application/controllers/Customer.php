<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model','cust');
    }

    public function index()
	{
        $data['page'] = 'customer';
        $this->load->view('hf/header');
		$this->load->view('pages/nav', $data);
		$this->load->view('pages/maintenance/customer');
		$this->load->view('modals/customer');
		$this->load->view('hf/footer', $data);
	}

    public function customer_list()
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $list = $this->cust->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cust) {
            $no++;
            $row = array();
            $row[] = $cust->customerkey;
            $row[] = $cust->name;
            $row[] = $cust->address;
            $row[] = $cust->email;
            $row[] = $cust->phone;
            $row[] = $cust->strategy;
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" id="edit_tooltip" href="javascript:void(0)" title="Edit"> <i class="fa fa-pencil-alt"></i> </a>
                <a class="btn btn-xs btn-danger" id="delete_tooltip" href="javascript:void(0)" title="Delete"> <i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->cust->count_all(),
            "recordsFiltered" => $this->cust->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save_customer()
    {
        $data = array('name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'strategy' => $this->input->post('strategy'));
        $this->cust->save_customer($data);

        echo json_encode(array("status" => TRUE));
    }

    public function get_cust()
    {
        $data = $this->cust->get_cust();
        echo json_encode($data);
    }
}
