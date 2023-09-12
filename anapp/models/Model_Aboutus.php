<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('AN_Model.php');

class Model_Aboutus extends AN_Model{
    /**
     * Initialize table and primary field variable
     */
    var $table              = TBL_ABOUTUS;
    var $aboutus            = TBL_ABOUTUS;
    var $detail             = TBL_PREFIX . 'page_about_detail';
    var $history            = TBL_PREFIX . 'page_about_history';
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
     * Get About Us
     * 
     * @author  Rifal
     * @param   String  $aboutus  
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_aboutus(){
        $this->db->order_by("id", "ASC"); 
        $query = $this->db->get($this->aboutus);
        if ( ! $query || ! $query->num_rows() ) return false;

        $data       = $query->result();
        $arrData    = array();
        foreach ( $data as $row ) {
            $arrData[$row->name] = $row->value;
        }

        return $arrData;
    }

    /**
     * Get About Us Detail
     * 
     * @author  Rifal
     * @param   String  $aboutus detail
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_aboutus_detail(){
        $this->db->order_by("id", "ASC"); 
        $query = $this->db->get($this->detail);
        if ( ! $query || ! $query->num_rows() ) return false;

        $data       = $query->result();
        $arrData    = array();
        foreach ( $data as $row ) {
            $arrData[strtolower($row->name)] = $row;
        }

        return $arrData;
    }

    /**
     * Get About Us Detail
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of Detail
     * @return  Mixed   False on invalid date parameter, otherwise data of history(s).
     */
    function get_aboutus_detaildata($id='', $is_active = false){
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
     * Get About Us History
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of History
     * @return  Mixed   False on invalid date parameter, otherwise data of history(s).
     */
    function get_aboutus_history($id='', $is_active = false){
        if ( !empty($id) ) { 
            $this->db->where($this->primary, $id);
        }

        if ( $is_active ) {
            $this->db->where('status', 1);
        }
        
        $this->db->order_by("id", "ASC"); 
        $query      = $this->db->get($this->history);        
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    /**
     * Retrieve All About Us History Data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of data               default 0
     * @param   Int     $offset             Offset ot data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_aboutus_history($limit=0, $offset=0, $conditions='', $order_by='', $params=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "P.id", $conditions);
            $conditions = str_replace("%name%",             "P.name", $conditions);
            $conditions = str_replace("%slug%",             "P.slug", $conditions);
            $conditions = str_replace("%slug_category%",    "PC.slug", $conditions);
            $conditions = str_replace("%status%",           "P.status", $conditions);
            $conditions = str_replace("%type%",             "P.type", $conditions);
            $conditions = str_replace("%year_from%",        "DF.kode", $conditions);
            $conditions = str_replace("%year_thru%",        "DT.kode", $conditions);
            $conditions = str_replace("%datecreated%",      "DATE(P.datecreated)", $conditions);
            $conditions = str_replace("%dateupdated%",      "DATE(P.dateupdated)", $conditions);
            $conditions = str_replace("%datemodified%",     "DATE(P.datemodified)", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "P.id", $order_by);
            $order_by   = str_replace("%name%",             "P.name", $order_by);
            $order_by   = str_replace("%slug%",             "P.slug", $order_by);
            $order_by   = str_replace("%slug_category%",    "PC.slug", $order_by);
            $order_by   = str_replace("%status%",           "P.status", $order_by);
            $order_by   = str_replace("%type%",             "P.type", $order_by);
            $order_by   = str_replace("%year_from%",        "DF.kode", $order_by);
            $order_by   = str_replace("%year_thru%",        "DT.kode", $order_by);
            $order_by   = str_replace("%datecreated%",      "P.datecreated", $order_by);
            $order_by   = str_replace("%dateupdated%",      "P.dateupdated", $order_by);
            $order_by   = str_replace("%datemodified%",     "P.datemodified", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS P.*, DF.kode AS str_year_from, DT.kode AS str_year_thru
                FROM ' . $this->history . ' P
                    LEFT JOIN ' . $this-> year . ' DF ON DF.id = P.year_from
                    LEFT JOIN ' . $this-> year . ' DT ON DT.id = P.year_thru
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
     * Get About Us Detail by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of member
     */
    function get_detail_by($field='', $value='', $type='', $limit = 0)
    {
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

        $query  = $this->db->get_where($this->detail, $condition);
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


    // =============================================================================================
    // GET ALL DATA FUNCTION
    // =============================================================================================

    /**
     * Retrieve all About Us  Detail data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of Data               default 0
     * @param   Int     $offset             Offset ot Data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_detail_data($limit=0, $offset=0, $conditions='', $order_by='')
    {
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "id", $conditions);
            $conditions = str_replace("%name%",             "name", $conditions);
            $conditions = str_replace("%slug%",             "slug", $conditions);
            $conditions = str_replace("%type%",             "type", $conditions);
            $conditions = str_replace("%status%",           "status", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "id",  $order_by);
            $order_by   = str_replace("%name%",             "name", $order_by);
            $order_by   = str_replace("%slug%",             "slug", $order_by);
            $order_by   = str_replace("%type%",             "type", $order_by);
            $order_by   = str_replace("%status%",           "status", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->detail . ' WHERE id > 0';

        if( !empty($conditions) ){ $sql .= $conditions; }
        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'type ASC, id ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql);
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }

    /**
     * Add About Us
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of aboutus to add
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function add_aboutus($data)
    {
        if( empty($data) ) return false;
        if( $this->db->insert($this->table, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Update About Us
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of aboutus to update
     * @param   Int             $id     (Required)  ID of aboutus
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function update_aboutus($data, $id)
    {
        if( empty($id) ) return false;
        if( empty($data) ) return false;
        if( $this->db->update($this->table, $data, array('id' => $id)) ) return true;
        return false;
    }
    
    /**
     * Update About Us Detail
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of  About Us Detail
     * @param   Array/Object    $data   (Required)  Data of  About Us Detail to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Notification ID
     */
    function update_data_detail($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where($this->primary, $id);
        if( $this->db->update($this->detail, $data) ){
            return true;
        }
        return false;
    }
    
    /**
     * Delete data of About Us Detail
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_detail($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->detail) ) {
            return true;
        };
        return false;
    }

    /**
     * Save data of About Us History
     * 
     * @author  Rifal
     * @param   Array   $data   (Required)  Array data of History
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function save_data_aboutus_history($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->history, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }

    /**
     * Update About Us History
     *
     * @author  Rifal
     * @param   Int     $id     (Required)  id
     * @param   Array   $data   (Required)  Data history
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function update_data_aboutus_history($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        if ( is_array($id) ) $this->db->where_in($this->history, $id);
        else $this->db->where($this->primary, $id);

        if( $this->db->update($this->history, $data) )
            return true;

        return false;
    }

    /**
     * Delete About Us History
     *
     * @author  Yuda
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_aboutus_history($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->history) ) {
            return true;
        };
        return false;
    }
}
/* End of file Model_Aboutus.php */
/* Location: ./application/models/Model_Aboutus.php */
