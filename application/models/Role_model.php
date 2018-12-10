<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 7:27 PM
 */

class Role_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    function get_roles()
    {
        $this->db->from('role');
        $query = $this->db->get();
        return $query->result();
    }

    function save_role($data)
    {
        $this->db->insert('role', $data);
        return $this->db->insert_id();
    }

    function get_access($id)
    {
        $sql = "select a.role,b.access from
                role a, access b, roleaccess c
                where a.id = c.role and b.id = c.access
                and a.id = " . $id;
        $query = $this->db->query($sql);
        return $query->result();
    }

    function save_access($data)
    {
        $this->db->insert('roleaccess', $data);
        return $this->db->insert_id();
    }

    function del_access($id)
    {
        $this->db->where('role', $id);
        $this->db->delete('roleaccess');
    }
}
 
 