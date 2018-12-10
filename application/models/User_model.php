<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 7:27 PM
 */

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    var $table = 'user';
    var $column_order = array('null','username','name','role','email','contactno','access','status',null);
    var $column_search = array('username','name','role','email','contactno','status');
    var $order = array('name' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->select(' a.picture,   a.username, a.name,
                            b.role, a.email, a.contactno,
                            a.status')
            ->from('user a')
            ->join('role b','a.role=b.id','inner');

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->select(' a.picture,   a.username, a.name,
                            b.role, a.email, a.contactno,
                            a.status')
            ->from('user a')
            ->join('role b','a.role=b.id','inner');
        return $this->db->count_all_results();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }



    function get_Roles()
    {
        $this->db->from('role');
        $query = $this->db->get();
        return $query->result();
    }







    function save_order($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update_order($data,$trankey)
    {
        $this->db->update($this->table, $data, $trankey);
        return $this->db->affected_rows();
    }

    public function update_store_crate($data, $storecode)
    {
        $this->db->update('tblstorecrateinv', $data, $storecode);
        return $this->db->affected_rows();
    }

    function getTranKeyUp(){
        $this->db->select('TRANKEY')->from($this->table)->order_by('TRANKEY','DESC','LIMIT 1');
        $query = $this->db->get();
        if($query->num_rows()>0)
            return $query->row()->TRANKEY;
    }

    function saveTranInOut($TranKey, $StoreCode){
        $data = array('Trankey' => $TranKey,
            'StoreCode' => $StoreCode);
        $this->db->insert('tblTranInOut', $data);
        return $this->db->insert_id();
    }

    function getAllTrucker(){
        $this->db->select('TruckerCode,TruckerName');
        $this->db->from('tblTrucker');
        $this->db->order_by('TruckerName', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllStoreCode(){
        $this->db->from('tblStores')
            ->order_by("StoreName", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    function getAllPlateno(){
        $this->db->select('PNC,TruckType,TruckerCode')
            ->from('tblPlateno')
            ->order_by('PNC', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_storer(){
        $this->db->select('storecode,storename')
            ->from('tblStores')
            ->order_by('storename', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_details($id){
        $this->db->from('tbltraninout')
            ->where('StoreCode !=', '10000')
            ->where('Trankey', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_sku(){
        $this->db->select('id,skudesc')
            ->from('sku')
            ->order_by('skudesc', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function load_PNC($truckerID)
    {
        $this->db->select('PNC');
        $this->db->from('tblPlateno');
        $this->db->where('TruckerCode',$truckerID);
        $this->db->order_by('PNC','asc');
        $query = $this->db->get();
        return $query->result();
    }

    function deleteTranInOut($id){
        $this->db->delete('tblTranInOut', array('trankey' => $id, 'storecode !=' => '10000'));

        return $this->db->affected_rows();
    }

    public function get_storecrate_inv($storecode)
    {
        $this->db->select('(SUM(ShippedQty) - SUM(ReturnedQty)) as qty')
            ->from('tbltraninout')
            ->where('StoreCode', $storecode);
        $query = $this->db->get();
        return $query->row()->qty;
    }

    function addTranInOut($data){
        $this->db->insert('tblTranInOut', $data);
        return 1;
    }

    function getCrateInvQTY(){
        $this->db->select('QTY')->from('TBLCRATEINV')->order_by('STORECODE','DESC','LIMIT 1');
        $query = $this->db->get();
        return $query->row()->QTY;
    }

    function updateCrateInv($qty){
        $data = array('QTY' => $qty);
        $this->db->update('tblCrateInv', $data);
    }

    function update_intransit_qty($trankey){
        $this->db->select('sum(ReturnedQty) as ret, sum(ShippedQty) as shp')
            ->from('tbltraninout')
            ->where('trankey',$trankey);
        $query = $this->db->get();
        $storeqty = $query->row();
        $ret = $storeqty->ret;
        $shp = $storeqty->shp;

        $data = array(
            'ReturnedQty' => $ret,
            'ShippedQty' => $shp,
        );
        $this->db->update('tblcrateorders', $data, array('trankey'=>$trankey));
        return $this->db->affected_rows();
    }

    function updateRetShip($trankey, $qtyR, $qtyS){
        $sql = "update tblCrateOrders set ReturnedQTY = $qtyR where trankey = '$trankey'";
        $this->db->query($sql);
        $sql = "update tblCrateOrders set ShippedQTY = $qtyS where trankey = '$trankey'";
        $this->db->query($sql);
        return $this->db->affected_rows();
    }

    public function update_sari_qty($sku)
    {
        //$this->output->enable_profiler(TRUE);                           //CI Profiler
        $this->db->select('QTY')
            ->from('tblcrateinv')
            ->where('storecode','10000')
            ->where('sku',$sku);
        $query = $this->db->get();
        $sariqty = $query->row()->QTY;

        $this->db->select('sum(ReturnedQty) as ReturnedQty, sum(ShippedQty) as ShippedQty')
            ->from('tbltraninout')
            ->where('storecode !=','10000')
            ->where('sku',$sku);
        $query2 = $this->db->get();
        $lesssariqty = $query2->row();

        $data = array(
            'ShippedQty' => $sariqty - ($lesssariqty->ShippedQty - $lesssariqty->ReturnedQty),
        );
        $this->db->update('tbltraninout', $data, array('storecode'=>'10000','sku'=>$sku));
        return $this->db->affected_rows();
    }

}
 
 