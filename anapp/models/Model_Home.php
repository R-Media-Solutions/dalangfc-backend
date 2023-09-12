<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('AN_Model.php');

class Model_Home extends AN_Model{
    /**
     * Initialize table and primary field variable
     */
    var $table              = TBL_PREFIX . 'page_home';
    var $home               = TBL_PREFIX . 'page_home';
    var $client             = TBL_PREFIX . 'page_client';
    var $detail             = TBL_PREFIX . 'page_home';
    var $year               = TBL_PREFIX . 'year';

    /**
     * Initialize primary field
     */
    var $primary            = "id";
    
    /**
	* Constructor - Sets up the object properties.
	*/
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get Home
     * 
     * @author  Rifal
     * @param   String  $home  
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_home(){
        $this->db->order_by("id", "ASC"); 
        $query = $this->db->get($this->home);
        if ( ! $query || ! $query->num_rows() ) return false;

        $data       = $query->result();
        $arrData    = array();
        foreach ( $data as $row ) {
            $arrData[$row->name] = $row->value;
        }

        return $arrData;
    }

    /**
     * Get Home Detail
     * 
     * @author  Rifal
     * @param   String  $home detail
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_home_detail(){
        $this->db->order_by("id", "ASC"); 
        $query = $this->db->get($this->home);
        if ( ! $query || ! $query->num_rows() ) return false;

        $data       = $query->result();
        $arrData    = array();
        foreach ( $data as $row ) {
            $arrData[strtolower($row->name)] = $row;
        }

        return $arrData;
    }

    /**
     * Get detail data
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of detail
     * @return  Mixed   False on invalid date parameter, otherwise data of client(s).
     */
    function get_home_detaildata($id='', $is_active = false){
        if ( !empty($id) ) { 
            $this->db->where($this->primary, $id);
        }

        if ( $is_active ) {
            $this->db->where('status', 1);
        }
        
        $this->db->order_by("id", "ASC"); 
        $query      = $this->db->get($this->detail);        
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    /**
     * Get Home Detail by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of member
     */
    function get_detail_by($field='', $value='', $type='', $limit = 0){
        if ( !$field || !$value ) return false;
        switch ($field) {
            case 'id':
                $field  = 'id';
                $id     = $value;
                break;
            case 'name':
                $field  = 'name';
                $value  = $value;
                break;
            case 'slug':
                $field  = 'slug';
                $value  = $value;
                break;
            case 'type':
                $field  = 'type';
                $value  = $value;
                break;
            return false;
        }

        if( empty($field) ) return false;

        $condition = array($field => $value);

        if( !empty($type) ) { $condition['type'] = $type; }

        $query  = $this->db->get_where($this->home, $condition);
        if ( !$query->num_rows() )
            return false;

        $data   = $query->result();

        $onerow = false;
        if ( $field == 'id' || $field == 'slug' || $limit == 1 ) {
            $onerow = true;
        }
        if ( $field && $type ) {
            $onerow = true;
        }

        if ( $onerow ) {
            foreach ( $data as $row ) {
                $datarow = $row;
            }
            $data = $datarow;
        }

        return $data;
    }

    /**
     * Get client
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of client
     * @return  Mixed   False on invalid date parameter, otherwise data of client(s).
     */
    function get_client($id='', $is_active = false){
        if ( !empty($id) ) { 
            $this->db->where($this->primary, $id);
        }

        if ( $is_active ) {
            $this->db->where('status', 1);
        }
        
        $this->db->order_by("id", "ASC"); 
        $query      = $this->db->get($this->client);        
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    /**
     * Get client by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of product
     */
    function get_client_by($field='', $value='', $conditions='', $limit = 0){
        if ( !$field || !$value ) return false;

        $this->db->where($field, $value);
        if ( $conditions ) { 
            $this->db->where($conditions);
        }

        $this->db->order_by("name", "ASC"); 
        $query  = $this->db->get($this->client);
        if ( !$query->num_rows() ){
            return false;
        }

        $data   = $query->result(); 
        if ($field == 'id' || $limit == 1 ) {
            foreach ( $data as $row ) {
                $datarow = $row;
            }
            $data = $datarow;
        }

        return $data;
    }


    // =============================================================================================
    // GET ALL DATA FUNCTION
    // =============================================================================================

    /**
     * Retrieve all Home Detail data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of Data               default 0
     * @param   Int     $offset             Offset ot Data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_detail_data($limit=0, $offset=0, $conditions='', $order_by=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "id", $conditions);
            $conditions = str_replace("%name%",             "name", $conditions);
            $conditions = str_replace("%short_name%",       "short_name", $conditions);
            $conditions = str_replace("%slug%",             "slug", $conditions);
            $conditions = str_replace("%type%",             "type", $conditions);
            $conditions = str_replace("%status%",           "status", $conditions);
            $conditions = str_replace("%datecreated%",      "DATE(datecreated)", $conditions);
            $conditions = str_replace("%dateupdated%",      "DATE(dateupdated)", $conditions);
            $conditions = str_replace("%datemodified%",     "DATE(datemodified)", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "id",  $order_by);
            $order_by   = str_replace("%name%",             "name", $order_by);
            $order_by   = str_replace("%short_name%",       "short_name", $order_by);
            $order_by   = str_replace("%slug%",             "slug", $order_by);
            $order_by   = str_replace("%type%",             "type", $order_by);
            $order_by   = str_replace("%status%",           "status", $order_by);
            $order_by   = str_replace("%datecreated%",      "datecreated", $order_by);
            $order_by   = str_replace("%dateupdated%",      "dateupdated", $order_by);
            $order_by   = str_replace("%datemodified%",     "datemodified", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->home . ' WHERE id > 0';

        if( !empty($conditions) ){ $sql .= $conditions; }
        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'type ASC, id ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql);
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }

    /**
     * Retrieve All client Data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of data               default 0
     * @param   Int     $offset             Offset ot data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_client($limit=0, $offset=0, $conditions='', $order_by='', $params=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "P.id", $conditions);
            $conditions = str_replace("%client%",           "P.name", $conditions);
            $conditions = str_replace("%name%",             "P.name", $conditions);
            $conditions = str_replace("%slug%",             "P.slug", $conditions);
            $conditions = str_replace("%status%",           "P.status", $conditions);
            $conditions = str_replace("%type%",             "P.type", $conditions);
            $conditions = str_replace("%datecreated%",      "DATE(P.datecreated)", $conditions);
            $conditions = str_replace("%dateupdated%",      "DATE(P.dateupdated)", $conditions);
            $conditions = str_replace("%datemodified%",     "DATE(P.datemodified)", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "P.id", $order_by);
            $order_by   = str_replace("%client%",           "P.name", $order_by);
            $order_by   = str_replace("%name%",             "P.name", $order_by);
            $order_by   = str_replace("%slug%",             "P.slug", $order_by);
            $order_by   = str_replace("%status%",           "P.status", $order_by);
            $order_by   = str_replace("%type%",             "P.type", $order_by);
            $order_by   = str_replace("%datecreated%",      "P.datecreated", $order_by);
            $order_by   = str_replace("%dateupdated%",      "P.dateupdated", $order_by);
            $order_by   = str_replace("%datemodified%",     "P.datemodified", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS
                    P.*
                FROM ' . $this->client . ' P
                WHERE P.id >= 0 ';

        if( !empty($conditions) )   { $sql .= $conditions; }

        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'P.dateupdated DESC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        if ( $params && is_array($params) ) {
            $query = $this->db->query($sql, $params);
        } else {
            $query = $this->db->query($sql);
        }

        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }

    /**
     * Add Home Us
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of home to add
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function add_home($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->table, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Update Home Us
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of home to update
     * @param   Int             $id     (Required)  ID of home
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function update_home($data, $id){
        if( empty($id) ) return false;
        if( empty($data) ) return false;
        if( $this->db->update($this->table, $data, array('id' => $id)) ) return true;
        return false;
    }
    
    /**
     * Update Home Us Detail
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of  home Us Detail
     * @param   Array/Object    $data   (Required)  Data of  home Us Detail to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Notification ID
     */
    function update_data_detail($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where($this->primary, $id);
        if( $this->db->update($this->home, $data) ){
            return true;
        }
        return false;
    }

    /**
     * Save data of detail
     * 
     * @author  Rifal
     * @param   Array   $data   (Required)  Array data of detail
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function save_data_detail($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->detail, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }

    /**
     * Save data of client
     * 
     * @author  Rifal
     * @param   Array   $data   (Required)  Array data of client
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function save_data_client($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->client, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }

    /**
     * Update client
     *
     * @author  Rifal
     * @param   Int     $id     (Required)  client id
     * @param   Array   $data   (Required)  Data client
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function update_data_client($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        if ( is_array($id) ) $this->db->where_in($this->client, $id);
        else $this->db->where($this->primary, $id);

        if( $this->db->update($this->client, $data) )
            return true;

        return false;
    }
    
    /**
     * Delete data of home Us Detail
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_detail($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->home) ) {
            return true;
        };
        return false;
    }

    /**
     * Delete data of client
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_client($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->client) ) {
            return true;
        };
        return false;
    }
}
/* End of file Model_Home.php */
/* Location: ./application/models/Model_Home.php */
