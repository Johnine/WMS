<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SKU extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sku_model','sku');
    }

    public function index()
	{
	    $data['page'] = 'sku';
        $this->load->view('hf/header');
		$this->load->view('pages/nav',$data);
		$this->load->view('pages/maintenance/sku');
		$this->load->view('modals/sku');
		$this->load->view('hf/footer', $data);
	}

    public function sku_list()
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $list = $this->sku->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sku) {
            $no++;
            $row = array();
            $row[] = $sku->customerkey;
            $row[] = $sku->sku;
            $row[] = $sku->description;
            $row[] = $sku->adddate;
            $row[] = $sku->addwho;
            $row[] = $sku->editdate;
            $row[] = $sku->editwho;
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" id="edit_tooltip" href="javascript:void(0)" title="Edit"> <i class="fa fa-pencil-alt"></i> </a>
                <a class="btn btn-xs btn-danger" id="delete_tooltip" href="javascript:void(0)" title="Delete"> <i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sku->count_all(),
            "recordsFiltered" => $this->sku->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save_sku()
    {
        $data = array('customerkey' => $this->input->post('customerkey'),
            'sku' => $this->input->post('sku'),
            'description' => $this->input->post('description'));
        $this->sku->save_sku($data);
        echo json_encode(array("status" => TRUE));
    }

    public function get_sku()
    {
        $sku = $this->sku->get_sku();
        echo json_encode($sku);
    }
}
