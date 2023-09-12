<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('AN_Model.php');

class Model_Services extends AN_Model{
    /**
     * Initialize table
     */
    var $services           = TBL_PREFIX . "page_services";
    var $services_category  = TBL_PREFIX . "product_category";
    var $member             = TBL_PREFIX . "member";
    var $shop_order         = TBL_PREFIX . "shop_order";
    var $shop_detail        = TBL_PREFIX . "shop_order_detail ";
    
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

    // ---------------------------------------------------------------------------------
    // CRUD
    // ---------------------------------------------------------------------------------
    
    /**
     * Get services
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of services
     * @return  Mixed   False on invalid date parameter, otherwise data of services(s).
     */
    function get_services($id='', $is_active = false){
        if ( !empty($id) ) { 
            $this->db->where($this->primary, $id);
        }

        if ( $is_active ) {
            $this->db->where('status', 1);
        }
        
        $this->db->order_by("id", "ASC"); 
        $query      = $this->db->get($this->services);        
        return ( !empty($id) ? $query->row() : $query->result() );
    }
    
    /**
     * Get services category
     * 
     * @author  Rifal
     * @param   Int     $id     (Optional)  ID of services
     * @return  Mixed   False on invalid date parameter, otherwise data of services_category(s).
     */
    function get_services_category($id='', $is_active = false){
        if ( !empty($id) ) { 
            $this->db->where($this->primary, $id);
        };

        if ( $is_active ) {
            $this->db->where('status', 1);
        }
        
        $this->db->order_by("name", "ASC"); 
        $query      = $this->db->get($this->services_category);        
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    /**
     * Get services by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of product
     */
    function get_services_by($field='', $value='', $conditions='', $limit = 0){
        if ( !$field || !$value ) return false;

        $this->db->where($field, $value);
        if ( $conditions ) { 
            $this->db->where($conditions);
        }

        $this->db->order_by("name", "ASC"); 
        $query  = $this->db->get($this->services);
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

    /**
     * Retrieve All services Data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of data               default 0
     * @param   Int     $offset             Offset ot data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_services($limit=0, $offset=0, $conditions='', $order_by='', $params=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "P.id", $conditions);
            $conditions = str_replace("%id_category%",      "P.id_category", $conditions);
            $conditions = str_replace("%category%",         "PC.name", $conditions);
            $conditions = str_replace("%services%",         "P.name", $conditions);
            $conditions = str_replace("%name%",             "P.name", $conditions);
            $conditions = str_replace("%slug%",             "P.slug", $conditions);
            $conditions = str_replace("%slug_category%",    "PC.slug", $conditions);
            $conditions = str_replace("%status%",           "P.status", $conditions);
            $conditions = str_replace("%type%",             "P.type", $conditions);
            $conditions = str_replace("%datecreated%",      "DATE(P.datecreated)", $conditions);
            $conditions = str_replace("%dateupdated%",      "DATE(P.dateupdated)", $conditions);
            $conditions = str_replace("%datemodified%",     "DATE(P.datemodified)", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "P.id", $order_by);
            $order_by   = str_replace("%id_category%",      "P.id_category", $order_by);
            $order_by   = str_replace("%category%",         "PC.name", $order_by);
            $order_by   = str_replace("%services%",         "P.name", $order_by);
            $order_by   = str_replace("%name%",             "P.name", $order_by);
            $order_by   = str_replace("%slug%",             "P.slug", $order_by);
            $order_by   = str_replace("%slug_category%",    "PC.slug", $order_by);
            $order_by   = str_replace("%status%",           "P.status", $order_by);
            $order_by   = str_replace("%type%",             "P.type", $order_by);
            $order_by   = str_replace("%datecreated%",      "P.datecreated", $order_by);
            $order_by   = str_replace("%dateupdated%",      "P.dateupdated", $order_by);
            $order_by   = str_replace("%datemodified%",     "P.datemodified", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS
                    P.*, PC.name AS category, PC.slug AS slug_category
                FROM ' . $this->services . ' P
                LEFT JOIN ' . $this->services_category . ' PC ON (P.id_category = PC.id)
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
     * Retrieve All category services Data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of data               default 0
     * @param   Int     $offset             Offset ot data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_category($limit=0, $offset=0, $conditions='', $order_by='', $group_by=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "id", $conditions);
            $conditions = str_replace("%name%",             "name", $conditions);
            $conditions = str_replace("%slug%",             "slug", $conditions);
            $conditions = str_replace("%status%",           "status", $conditions);
            $conditions = str_replace("%datecreated%",      "datecreated", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "id", $order_by);
            $order_by   = str_replace("%name%",             "name", $order_by);
            $order_by   = str_replace("%slug%",             "slug", $order_by);
            $order_by   = str_replace("%status%",           "status", $order_by);
            $order_by   = str_replace("%datecreated%",      "datecreated", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->product_category . ' WHERE id > 0 ';

        if( !empty($conditions) )   { $sql .= $conditions; }

        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'name ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql);
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }
    
    /**
     * Save data of services
     * 
     * @author  Rifal
     * @param   Array   $data   (Required)  Array data of services
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function save_data_services($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->services, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Save data of services category
     * 
     * @author  Rifal
     * @param   Array   $data   (Required)  Array data of services_category
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function save_data_services_category($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->services_category, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }

    /**
     * Update services
     *
     * @author  Rifal
     * @param   Int     $id     (Required)  services id
     * @param   Array   $data   (Required)  Data services
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function update_data_services($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        if ( is_array($id) ) $this->db->where_in($this->services, $id);
        else $this->db->where($this->primary, $id);

        if( $this->db->update($this->services, $data) )
            return true;

        return false;
    }

    /**
     * Update services category
     *
     * @author  Rifal
     * @param   Int     $id     (Required)  services_category id
     * @param   Array   $data   (Required)  Data services_categorys
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function update_data_services_category($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        if ( is_array($id) ) $this->db->where_in($this->services_category, $id);
        else $this->db->where($this->primary, $id);

        if( $this->db->update($this->services_category, $data) )
            return true;

        return false;
    }

    /**
     * Delete data of services
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_services($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->services) ) {
            return true;
        };
        return false;
    }

    /**
     * Delete data of Category
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_category($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->services_category) ) {
            return true;
        };
        return false;
    }

    // ---------------------------------------------------------------------------------
}
/* End of file Model_Services.php */
/* Location: ./app/models/Model_Services.php */
