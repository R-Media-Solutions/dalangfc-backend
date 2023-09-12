<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once('AN_Model.php');

class Model_Option extends AN_Model{
    /**
     * Initialize table and primary field variable
     */
    var $table              = TBL_OPTIONS;
    var $options            = TBL_OPTIONS;
    var $bank               = TBL_PREFIX . 'banks';
    var $notification       = TBL_PREFIX . 'notification';
    var $package            = TBL_PREFIX . 'package';
    var $promo_code         = TBL_PREFIX . 'promo_code';
    var $reward_config      = TBL_PREFIX . 'reward_config';
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
     * Get Options
     * 
     * @author  Rifal
     * @param   String  $option    ID of Package
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_options(){
        $this->db->order_by("id_option", "ASC"); 
        $query = $this->db->get($this->options);
        if ( ! $query || ! $query->num_rows() ) return false;

        $data       = $query->result();
        $arrData    = array();
        foreach ( $data as $row ) {
            $arrData[$row->name] = $row->value;
        }

        return $arrData;
    }

    /**
     * Get Package
     * 
     * @author  Rifal
     * @param   String  $package    ID of Package
     * @return  Mixed   False on invalid date parameter, otherwise data of Package(s).
     */
    function get_packages($package = '', $is_active = true ){
        if ( !empty($package) ) {
            $this->db->where('package', $package);
        }

        if ( $is_active ) {
            $this->db->where('is_active', 1);
        }
        
        $this->db->order_by("is_order", "ASC"); 
        $query = $this->db->get($this->package);
        if ( ! $query || ! $query->num_rows() ) return false;
        return ( !empty($package) ? $query->row() : $query->result() );
    }

    /**
     * Get promo code
     * 
     * @author  Rifal
     * @param   Int     $id    ID of promo code
     * @return  Mixed   False on invalid date parameter, otherwise data of promo_code(s).
     */
    function get_promo_codes($id='', $is_active = true){
        if ( !empty($id) ) {
            $this->db->where($this->primary, $id);
        } else {
            if ( $is_active ) {
                $this->db->where('status', 1);
            }
        }

        $this->db->order_by("promo_code", "ASC"); 
        $query = $this->db->get($this->promo_code);
        if ( ! $query || ! $query->num_rows() ) return false;
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    /**
     * Get promo code by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of promo code
     */
    function get_promo_code_by($field='', $value='', $conditions='', $limit = 0){
        if ( !$field || !$value ) return false;

        $this->db->where($field, $value);
        if ( $conditions ) { 
            $this->db->where($conditions);
        }

        $this->db->order_by("promo_code", "ASC"); 
        $query  = $this->db->get($this->promo_code);
        if ( !$query->num_rows() ){
            return false;
        }

        $data   = $query->result(); 
        if ($field == 'id' || $field == 'promo_code' || $limit == 1 ) {
            foreach ( $data as $row ) {
                $datarow = $row;
            }
            $data = $datarow;
        }

        return $data;
    }

    /**
     * Get Notification by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of member
     */
    function get_notification_by($field='', $value='', $type='', $limit = 0){
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

        $query  = $this->db->get_where($this->notification, $condition);
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
     * Get Reward by Field
     *
     * @author  Rifal
     * @param   String  $field  (Required)  Database field name or special field name defined inside this function
     * @param   String  $value  (Optional)  Value of the field being searched
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise StdClass of member
     */
    function get_reward_by($field='', $value='', $limit = 0){
        if ( !$field || !$value ) return false;
        switch ($field) {
            case 'id':
                $field  = 'id';
                $id     = $value;
                break;
            case 'reward':
                $field  = 'reward';
                $value  = $value;
                break;
            return false;
        }

        if( empty($field) ) return false;

        $condition = array($field => $value);

        $query  = $this->db->get_where($this->reward_config, $condition);
        if ( !$query->num_rows() )
            return false;

        $data   = $query->result();

        if ($field == 'id' || $field == 'reward' || $limit == 1 ) {
            foreach ( $data as $row ) {
                $datarow = $row;
            }
            $data = $datarow;
        }

        return $data;
    }

    /**
     * Get year 
     * 
     * @author  Rifal
     * @param   Int     $id     (Required)  ID of years
     * @return  Mixed   False on invalid date parameter, otherwise data of years(s).
     */
    function get_year($id=''){
        if ( !empty($id) ) { 
            $id = absint($id); 
            $this->db->where($this->primary, $id);
        };
        
        $this->db->order_by("kode", "DESC"); 
        $query = $this->db->get($this->year);
		if ( ! $query || ! $query->num_rows() )
			return false;
		
        return ( !empty($id) ? $query->row() : $query->result() );
    }

    // =============================================================================================
    // GET ALL DATA FUNCTION
    // =============================================================================================

    /**
     * Retrieve all promo_code data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of Data               default 0
     * @param   Int     $offset             Offset ot Data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_promo_code($limit=0, $offset=0, $conditions='', $order_by=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "id", $conditions);
            $conditions = str_replace("%promo_code%",       "promo_code", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "id",  $order_by);
            $order_by   = str_replace("%promo_code%",       "promo_code", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->promo_code . ' WHERE id > 0';

        if( !empty($conditions) ){ $sql .= $conditions; }
        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'datecreated DESC, promo_code ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql);
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }

    /**
     * Retrieve all Notification data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of Data               default 0
     * @param   Int     $offset             Offset ot Data              default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_notification_data($limit=0, $offset=0, $conditions='', $order_by=''){
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

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->notification . ' WHERE id > 0';

        if( !empty($conditions) ){ $sql .= $conditions; }
        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : 'type ASC, id ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql);
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }

    /**
     * Retrieve Reward data
     *
     * @author  Rifal
     * @param   Int     $limit              Limit of Reward             default 0
     * @param   Int     $offset             Offset ot Reward            default 0
     * @param   String  $conditions         Condition of query          default ''
     * @param   String  $order_by           Column that make to order   default ''
     * @return  Object  Result of data list
     */
    function get_all_reward_data($limit=0, $offset=0, $conditions='', $order_by=''){
        if( !empty($conditions) ){
            $conditions = str_replace("%id%",               "id", $conditions);
            $conditions = str_replace("%reward%",           "reward", $conditions);
            $conditions = str_replace("%nominal%",          "nominal", $conditions);
            $conditions = str_replace("%point%",            "point", $conditions);
            $conditions = str_replace("%start_date%",       "start_date", $conditions);
            $conditions = str_replace("%end_date%",         "end_date", $conditions);
            $conditions = str_replace("%is_active%",        "is_active", $conditions);
        }

        if( !empty($order_by) ){
            $order_by   = str_replace("%id%",               "id", $order_by);
            $order_by   = str_replace("%reward%",           "reward", $order_by);
            $order_by   = str_replace("%nominal%",          "nominal", $order_by);
            $order_by   = str_replace("%point%",            "point", $order_by);
            $order_by   = str_replace("%start_date%",       "start_date", $order_by);
            $order_by   = str_replace("%end_date%",         "end_date", $order_by);
            $order_by   = str_replace("%is_active%",        "is_active", $order_by);
        }

        $sql = 'SELECT SQL_CALC_FOUND_ROWS * FROM ' . $this->reward_config . ' ';

        if( !empty($conditions) )   { $sql .= $conditions; }

        $sql   .= ' ORDER BY '. ( !empty($order_by) ? $order_by : ' point ASC');

        if( $limit ) $sql .= ' LIMIT ' . $offset . ', ' . $limit;

        $query = $this->db->query($sql, array(MEMBER));
        if(!$query || !$query->num_rows()) return false;

        return $query->result();
    }
    
    /**
     * Add Options
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of option to add
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function add_option($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->table, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Insert Data reward_config
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of reward_config
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of reward_config ID
     */
    function save_data_reward_config($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->reward_config, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Insert Data promo_code
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of promo_code
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of promo_code ID
     */
    function save_data_promo_code($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->promo_code, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }
    
    /**
     * Update Options
     * 
     * @author  Rifal
     * @param   Array/Object    $data   (Required)  Data of option to update
     * @param   Int             $id     (Required)  ID of Option
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function update_option($data, $id){
        if( empty($id) ) return false;
        if( empty($data) ) return false;
        if( $this->db->update($this->table, $data, array('id_option' => $id)) ) return true;
        return false;
    }
    
    /**
     * Update Package
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of Package
     * @param   Array/Object    $data   (Required)  Data of Package to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Package ID
     */
    function update_data_package($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where('package', $id);
        if( $this->db->update($this->package, $data) ){
            return true;
        }
        return false;
    }
    /**
     * Update Notification
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of Notification
     * @param   Array/Object    $data   (Required)  Data of Notification to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Notification ID
     */
    function update_data_notification($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where($this->primary, $id);
        if( $this->db->update($this->notification, $data) ){
            return true;
        }
        return false;
    }
    
    /**
     * Update Reward Confirm
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of Reward Confirm
     * @param   Array/Object    $data   (Required)  Data of Reward Confirm to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Reward Confirm ID
     */
    function update_data_reward_config($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where($this->primary, $id);
        if( $this->db->update($this->reward_config, $data) ){
            return true;
        }
        return false;
    }
    
    /**
     * Update promo_code
     * 
     * @author  Rifal
     * @param   Int             $id     (Required)  ID of promo_code
     * @param   Array/Object    $data   (Required)  Data of promo_code to update
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of promo_code ID
     */
    function update_data_promo_code($id, $data){
        if( !$id || empty($id) ) return false;
        if( !$data || empty($data) ) return false;

        $this->db->where($this->primary, $id);
        if( $this->db->update($this->promo_code, $data) ){
            return $id;
        }
        return false;
    }

    /**
     * Delete data of promo_code
     *
     * @author  Rifal
     * @param   Int     $id   (Required)  ID of data
     * @return  Boolean Boolean false on failed process or invalid data, otherwise true
     */
    function delete_data_promo_code($id){
        if( empty($id) ) return false;
        $this->db->where($this->primary, $id);
        if( $this->db->delete($this->promo_code) ) {
            return true;
        };
        return false;
    }
}
/* End of file Model_Option.php */
/* Location: ./application/models/Model_Option.php */
