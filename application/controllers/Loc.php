<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loc extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loc_model','loc');
    }

    public function index()
	{
	    $data['page'] = 'loc';
        $this->load->view('hf/header');
		$this->load->view('pages/nav',$data);
		$this->load->view('pages/maintenance/location');
		$this->load->view('modals/loc');
		$this->load->view('hf/footer', $data);
	}

    public function loc_list()
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $list = $this->loc->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $loc) {
            $no++;
            $row = array();
            $row[] = $loc->loc;
            $row[] = $loc->loctype;
            $row[] = $loc->locationflag;
            $row[] = $loc->status;
            //add html for action
            $row[] = '<a class="btn btn-xs btn-primary" id="edit_tooltip" href="javascript:void(0)" title="Edit"> <i class="fa fa-pencil-alt"></i> </a>
                <a class="btn btn-xs btn-danger" id="delete_tooltip" href="javascript:void(0)" title="Delete"> <i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->loc->count_all(),
            "recordsFiltered" => $this->loc->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function save_loc()
    {
        $data = array(
            'loc' => $this->input->post('loc'),
            'loctype' => $this->input->post('loctype'),
            'locationflag' => 'OK',
            'status' => 'OK');
        $this->loc->save_loc($data);
        echo json_encode(array("status" => TRUE));
    }
}
