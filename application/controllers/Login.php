<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('html');
        $this->load->database();
        $this->load->model('login_model','login');
        $this->load->library('user_agent');
    }

    public function index()
    {
        //get the posted values
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        //set validations
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('pages/login');
        }
        else
        {
            //validation succeeds
            if ($username){
                $usr_data = $this->login->get_data($username,$password);
                foreach ($usr_data as $row)
                {
                    $name = $row->name;
                    $roleid = $row->role;
                    $id = $row->id;
                    $email = $row->email;
                    $status = $row->status;
                    $picture = $row->picture;
                }
                $role = $this->login->get_role($roleid);
                if (count($usr_data) > 0 )//and $isActive=='Yes') //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        'picture' => $picture,
                        'username' => $username,
                        'name' => $name,
                        'roleid' => $roleid,
                        'role' => $role,
                        'email' => $email,
                        'id' => $id,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);

                    //if you want to set info to cookies for retrival and session timeout issues
                        $cookie = array(
                            'name'   => 'roleid',
                            'value'  => $roleid,
                            'expire' => 86400*5
                        );
                        set_cookie($cookie);

                    $cookiename = array(
                        'name'   => 'name',
                        'value'  => $name,
                        'expire' => 86400*5
                    );
                    set_cookie($cookiename);

                    $cookierole = array(
                        'name'   => 'role',
                        'value'  => $role,
                        'expire' => 86400*5
                    );
                    set_cookie($cookierole);

                    $cookieusr = array(
                        'name'   => 'username',
                        'value'  => $username,
                        'expire' => 86400*5
                    );
                    set_cookie($cookieusr);

                    $this->main();
                }
                else
                {
                    $this->session->set_flashdata('msg', '<div id="errorLogin"><br> <div class="alert alert-danger text-center" style="font-size: 1rem; color: orangered;">Invalid username or password!</div></div>');
                    redirect(base_url());
                }
            }
            else {
                $this->session->set_flashdata('msg', '<div id="errorLogin"><br> <div class="alert alert-danger text-center" style="font-size: 1.1rem; color: orangered;">Invalid username or password!</div></div>');
                redirect(base_url());
            }
        }
    }
    public function main()
    {
        $data['page'] = 'main';
        $this->load->view('hf/header');
        $this->load->view('pages/nav', $data);
        $this->load->view('pages/main');
//        $this->load->view('modals/login');
        $this->load->view('hf/footer', $data);
    }
}
