<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 7:27 PM
 */

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    //get the username & password from users table
    function get_data($usr, $pwd)
    {
        $this->db->where('username',$usr);
        $this->db->where('password',$pwd);
        $this->db->from('user');
        $query = $this->db->get();
        return $query->result();
    }

    function get_role($id)
    {
        $this->db->where('id',$id);
        $this->db->from('role');
        $query = $this->db->get();
        return $query->row()->role;
    }

    public function getRealIpAddr()
    {
        $ip = "";
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
 
 