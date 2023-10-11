<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('AN_Model.php');

class Model_Masterdata extends AN_Model{
    /**
     * Initialize table and primary field variable
     */
    var $table              = TBL_PREFIX . 'client';
    var $client             = TBL_PREFIX . 'client';
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
/* End of file Model_Masterdata.php */
/* Location: ./application/models/Model_Masterdata.php */
