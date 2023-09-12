<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * About Us Controller.
 *
 * @class     About Us
 * @version   1.0.0
 */
class Aboutus extends Admin_Controller
{
    /**
     * Constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    // =============================================================================================
    // About Us PAGE
    // =============================================================================================

    /**
     * About Us About Us Index function.
     */
    public function index(){
        auth_redirect();

        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);

        $headstyles             = an_headstyles(array(
            // Default CSS Plugin
            BE_PLUGIN_PATH . 'datatables/dataTables.bootstrap.css?ver=' . CSS_VER_MAIN
        ));
        $loadscripts            = an_scripts(array(
            // Default JS Plugin
            BE_PLUGIN_PATH . 'bootstrap-notify/bootstrap-notify.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'bootbox/bootbox.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'jquery-validation/dist/jquery.validate.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/jquery.dataTables.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/dataTables.bootstrap.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/datatable.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'ckeditor/ckeditor.js?ver=' . JS_VER_MAIN,
            // Always placed at bottom
            BE_JS_PATH . 'form-validation.js?ver=' . JS_VER_BACK,
            BE_JS_PATH . 'table-ajax.js?ver=' . JS_VER_BACK,
            BE_JS_PATH . 'custom.js?ver=' . JS_VER_BACK
        ));
        $scripts_init           = an_scripts_init(array(
            'AbouUsManage.init();',
            'FV_AboutUsSetting.init();',
            'TableAjaxAboutUsList.init();'
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_about') . ' ' . lang('menu_about_new');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['main_content']   = 'aboutus/about';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * History New function.
     */
    public function historynew(){
        auth_redirect();

        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $is_member              = as_member($current_member);

        $headstyles             = an_headstyles(array(
            // Default CSS Plugin
            BE_PLUGIN_PATH . 'quill/dist/quill.core.css?ver=' . CSS_VER_MAIN,
        ));
        $loadscripts            = an_scripts(array(
            // Default JS Plugin
            BE_PLUGIN_PATH . 'jquery-inputmask/jquery.inputmask.bundle.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'jquery-validation/dist/jquery.validate.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'quill/dist/quill.min.js?ver=' . JS_VER_MAIN,
            // Always placed at bottom
            BE_JS_PATH . 'form-validation.js?ver=' . JS_VER_BACK,
            BE_JS_PATH . 'custom.js?ver=' . JS_VER_BACK
        ));
        $scripts_init           = an_scripts_init(array(
            'InputMask.init();',
            'AbouUsManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_about_detail_new');
        $data['title_page']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_about_detail_new');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['form_page']      = 'new';
        $data['data_history']   = '';
        $data['form_title']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_about_detail_new');
        $data['main_content']   = 'aboutus/historyform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * History Edit function.
     */
    public function historyedit($id = 0){
        auth_redirect();
        if (!$id) {
            redirect(base_url('about/historylists'), 'refresh');
        }

        $id_history         = an_decrypt($id);
        if (!$data_history  = an_aboutus_history($id_history)) {
            redirect(base_url('about/historylists'), 'refresh');
        }

        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);

        $headstyles             = an_headstyles(array(
            // Default CSS Plugin
            BE_PLUGIN_PATH . 'quill/dist/quill.core.css?ver=' . CSS_VER_MAIN,
        ));
        $loadscripts            = an_scripts(array(
            // Default JS Plugin
            BE_PLUGIN_PATH . 'jquery-inputmask/jquery.inputmask.bundle.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'jquery-validation/dist/jquery.validate.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'quill/dist/quill.min.js?ver=' . JS_VER_MAIN,
            // Always placed at bottom
            BE_JS_PATH . 'form-validation.js?ver=' . JS_VER_BACK,
            BE_JS_PATH . 'custom.js?ver=' . JS_VER_BACK
        ));
        $scripts_init           = an_scripts_init(array(
            'InputMask.init();',
            'AbouUsManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_about_edit');
        $data['title_page']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_about');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_history']   = $data_history;
        $data['form_page']      = 'edit';
        $data['form_title']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_about_edit');
        $data['main_content']   = 'aboutus/historyform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Status About Us History Function
     */
    function historystatus( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('about/historylists'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $id = an_decrypt($id);
        if ( ! $data_history = an_aboutus_history($id) ) {
            $data = array('status' => 'error', 'message' => 'Data tidak ditemukan !');
            die(json_encode($data));
        }

        // set variables
        $current_member     = an_get_current_member();
        $is_admin           = as_administrator($current_member);
        $datetime           = date('Y-m-d H:i:s');
        $status             = ( $data_history->status == 1 ) ? 0 : 1;

        $modified_by        = $current_member->username;
        if ( $staff = an_get_current_staff() ) {
            $modified_by    = $staff->username;
        }

        $data = array(
            'status'        => $status,
            'modified_by'   => $modified_by,
            'datemodified'  => $datetime,
        );

        if ( ! $update_data = $this->Model_Aboutus->update_data_aboutus_history($id, $data) ) {
            $data = array('status' => 'error', 'message' => 'Status tidak berhasil diedit !');
            die(json_encode($data));
        }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Status berhasil diedit.');
        die(json_encode($data));
    }

    /**
     * Delete About Us History Function
     */
    function productdelete( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('about/historylists'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $id = an_decrypt($id);
        if ( ! $data_history = an_aboutus_history($id) ) {
            $data = array('status' => 'error', 'message' => 'Data tidak ditemukan !');
            die(json_encode($data));
        }

        $history_img        = $data_history->image;
        if ( ! $delete_data = $this->Model_Aboutus->delete_data_aboutus_history($id) ) {
            $data = array('status' => 'error', 'message' => 'Data tidak berhasil dihapus !');
            die(json_encode($data));
        }

        // Delete Image
        $file_path = $file_thumb_path = $file = $file_thumb = ''; 
        if ( $history_img ) {
            $file_path = ABOUTHISTORY_IMG_PATH . $history_img;
            if ( file_exists($file_path) ) {
                $file = $file_path;
            }
            $file_thumb_path = ABOUTHISTORY_IMG_PATH . 'thumbnail/' . $history_img;
            if ( file_exists($file_thumb_path) ) {
                $file_thumb = $file_thumb_path;
            }
        }
        if ( $file ) { unlink($file); }
        if ( $file_thumb ) { unlink($file_thumb); }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Data berhasil dihapus.');
        die(json_encode($data));
    }


    /**
     * History List function.
     */
    public function historylist(){
        auth_redirect();

        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $is_member              = as_member($current_member);

        $headstyles             = an_headstyles(array(
            // Default CSS Plugin
            BE_PLUGIN_PATH . 'datatables/dataTables.bootstrap.css?ver=' . CSS_VER_MAIN
        ));
        $loadscripts            = an_scripts(array(
            // Default JS Plugin
            BE_PLUGIN_PATH . 'bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'jquery-inputmask/jquery.inputmask.bundle.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/jquery.dataTables.min.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/dataTables.bootstrap.js?ver=' . JS_VER_MAIN,
            BE_PLUGIN_PATH . 'datatables/datatable.js?ver=' . JS_VER_MAIN,
            // Always placed at bottom
            BE_JS_PATH . 'table-ajax.js?ver=' . JS_VER_BACK,
            BE_JS_PATH . 'custom.js?ver=' . JS_VER_BACK
        ));
        $scripts_init           = an_scripts_init(array(
            'InputMask.init();',
            'AbouUsManage.init();',
            'TableAjaxAboutUsList.init();'
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_about_detail_list');
        $data['title_page']     = '<i class="ni ni-align-left-2 mr-1"></i> ' . lang('menu_about_detail_list');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['main_content']   = 'aboutus/historylists';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }
    // ---------------------------------------------------------------------------------------------

    // =============================================================================================
    // LIST DATA SETTING
    // =============================================================================================

    /**
     * About Us Detail List Data function.
     */
    function detaillistdata(){
        $member_data        = '';
        $current_member     = an_get_current_member();
        $is_admin           = as_administrator($current_member);

        $condition          = '';
        $order_by           = '';
        $iTotalRecords      = 0;

        $iDisplayLength     = intval($_REQUEST['iDisplayLength']);
        $iDisplayStart      = intval($_REQUEST['iDisplayStart']);

        $sEcho              = intval($_REQUEST['sEcho']);
        $sort               = $_REQUEST['sSortDir_0'];
        $column             = intval($_REQUEST['iSortCol_0']);

        $limit              = ($iDisplayLength == '-1' ? 0 : $iDisplayLength);
        $offset             = $iDisplayStart;

        $s_name             = $this->input->post('search_name');
        $s_name             = an_isset($s_name, '');
        //$s_type             = $this->input->post('search_type');
        //$s_type             = an_isset($s_type, '');
        $s_status           = $this->input->post('search_status');
        $s_status           = an_isset($s_status, '');

        if (!empty($s_name)) {
            $condition .= str_replace('%s%', $s_name, ' AND %name% LIKE "%%s%%"');
        }
        //if (!empty($s_type)) {
            //$condition .= str_replace('%s%', $s_type, ' AND %type% = "%s%"');
        //}
        if (!empty($s_status)) {
            $s_status   = ($s_status == 'active') ? 1 : 0;
            $condition .= str_replace('%s%', $s_status, ' AND %status% = %s%');
        }

        if ($column == 1) {
            $order_by .= '%name% ' . $sort;
        } elseif ($column == 2) {
            $order_by .= '%type% ' . $sort;
        } elseif ($column == 3) {
            $order_by .= '%status% ' . $sort;
        }

        $data_list          = $this->Model_Aboutus->get_all_detail_data($limit, $offset, $condition, $order_by);
        $records            = array();
        $records["aaData"]  = array();

        if (!empty($data_list)) {
            $iTotalRecords  = an_get_last_found_rows();
            $i = $offset + 1;
            foreach ($data_list as $row) {
                $lbl_class  = 'default';
                $id             = an_encrypt($row->id);
                if ($row->type == 'email') {
                    $lbl_class = 'primary';
                }
                if ($row->type == 'whatsapp') {
                    $lbl_class = 'success';
                }
                $type       = '<span class="badge badge-sm badge-' . $lbl_class . '">' . strtoupper($row->type) . '</span>';
                
                /*
                $status     = '<span class="badge badge-sm badge-danger">TIDAK AKTIF</span>';
                if ($row->status > 0) {
                    $status = '<span class="badge badge-sm badge-success">AKTIF</span>';
                }
                */

                if ( $row->status == 1 ) {
                    $status     = '<a href="'.base_url('aboutus/detailstatus/'.$id).'" class="btn btn-sm btn-outline-success btn-status-detailaboutus" data-detail="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-check"></i> Active</a>';
                } else {
                    $status     = '<a href="'.base_url('aboutus/detailstatus/'.$id).'" class="btn btn-sm btn-outline-danger btn-status-detailaboutus" data-detail="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-times"></i> Non-Active</a>';
                }

                $btn_edit   = '<a class="btn btn-sm btn-tooltip btn-default detaildata" title="Edit" href="' . base_url('aboutus/detaildata/' . $row->id . '/edit') . '"><i class="fa fa-edit"></i></a>';
                $btn_view   = '<a class="btn btn-sm btn-tooltip btn-secondary detaildata" title="View" href="' . base_url('aboutus/detaildata/' . $row->id . '/view') . '"><i class="fa fa-eye"></i></a>';

                $records["aaData"][]    = array(
                    an_center($i),
                    $row->name,
                    //an_center($type),
                    an_center($status),
                    an_center($btn_edit . $btn_view),
                );
                $i++;
            }
        }

        $end                = $iDisplayStart + $iDisplayLength;
        $end                = $end > $iTotalRecords ? $iTotalRecords : $end;

        $records["sEcho"]                   = $sEcho;
        $records["iTotalRecords"]           = $iTotalRecords;
        $records["iTotalDisplayRecords"]    = $iTotalRecords;

        echo json_encode($records);
    }

    /**
     * About Us History List Data function.
     */
    function aboutushistorylistsdata(){
        // This is for AJAX request
        if ( ! $this->input->is_ajax_request() ) exit('No direct script access allowed');

        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            // Set JSON data
            $data = array('status' => 'access_denied', 'url' => base_url('login')); 
            die(json_encode($data));
        }

        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $is_member              = as_member($current_member);

        $params                 = array();
        $condition              = '';
        $order_by               = '';
        $iTotalRecords          = 0;

        $sExport                = $this->input->get('export');
        $sAction                = an_isset($_REQUEST['sAction'],'');
        $sAction                = an_isset($sExport, $sAction);

        $search_method          = 'post';
        if( $sAction == 'download_excel' ){
            $search_method      = 'get';
        }

        $iDisplayLength         = intval($_REQUEST['iDisplayLength']);
        $iDisplayStart          = intval($_REQUEST['iDisplayStart']);
        $sEcho                  = intval($_REQUEST['sEcho']);
        $sort                   = $_REQUEST['sSortDir_0'];
        $column                 = intval($_REQUEST['iSortCol_0']);

        $limit                  = ( $iDisplayLength == '-1' ? 0 : $iDisplayLength );
        $offset                 = $iDisplayStart;

        $s_name                 = $this->input->$search_method('search_name');
        $s_name                 = an_isset($s_name, '', '', true);
        $s_year_from            = $this->input->$search_method('search_year_from');
        $s_year_from            = an_isset($s_year_from, '', '', true);
        $s_year_thru            = $this->input->$search_method('search_year_thru');
        $s_year_thru            = an_isset($s_year_thru, '', '', true);

        $s_status               = $this->input->$search_method('search_status');
        $s_status               = an_isset($s_status, '', '', true);
        $s_date_min             = $this->input->$search_method('search_dateupdated_min');
        $s_date_min             = an_isset($s_dateupdated_min, '', '', true);
        $s_date_max             = $this->input->$search_method('search_dateupdated_max');
        $s_date_max             = an_isset($s_dateupdated_max, '', '', true);

        if ( !empty($s_name) )              { $condition .= ' AND %name% LIKE CONCAT("%", ?, "%")'; $params[] = $s_name; }
        if ( !empty($s_year_from) )         { $condition .= ' AND year_from >= ?'; $params[] = $s_year_from; }
        if ( !empty($s_year_thru) )         { $condition .= ' AND year_thru <= ?'; $params[] = $s_year_thru; }
        if ( !empty($s_date_min) )          { $condition .= ' AND %dateupdated% >= ?'; $params[] = $s_date_min; }
        if ( !empty($s_date_max) )          { $condition .= ' AND %dateupdated% <= ?'; $params[] = $s_date_max; }
        if ( !empty($s_status) )            { 
            if ( $s_status == 'active' ) {
                $condition .= ' AND %status% = 1'; 
            } else {
                $condition .= ' AND %status% <> 1'; 
            }
        }

        if( $column == 1 )      { $order_by .= 'name ' . $sort; }
        elseif( $column == 2 )  { $order_by .= 'year_from ' . $sort; }
        elseif( $column == 3 )  { $order_by .= 'year_thru ' . $sort; }
        elseif( $column == 4 )  { $order_by .= '%status% ' . $sort; }
        elseif( $column == 5 )  { $order_by .= '%dateupdated% ' . $sort; }
        
        //$data_list          = ( $is_admin ) ? $this->Model_Aboutus->get_all_aboutus_history($limit, $offset, $condition, $order_by, $params) : array();
        $data_list          = $this->Model_Aboutus->get_all_aboutus_history($limit, $offset, $condition, $order_by, $params);
        $records            = array();
        $records["aaData"]  = array();

        if( !empty($data_list) ){
            $iTotalRecords  = an_get_last_found_rows();
            $access         = TRUE;
            if ( $staff = an_get_current_staff() ) {
                if ( $staff->access == 'partial' ) {
                    $role   = array();
                    if ( $staff->role ) {
                        $role = $staff->role;
                    }

                    foreach ( array( STAFF_ACCESS4 ) as $val ) {
                        if ( empty( $role ) || ! in_array( $val, $role ) )
                            $access = FALSE;
                    } 
                }
            }
            $i = $offset + 1;
            foreach($data_list as $row){
                $id             = an_encrypt($row->id);
                $img_src        = an_aboutus_history_image($row->image, true); 
                
                $history        = '
                    <div class="media align-items-center">
                        <a href="'.base_url('about/historyedit/'.$id).'" class="avatar mr-3">
                            <img alt="Image placeholder" src="'. $img_src .'">
                        </a>
                        <div class="media-body">
                            <a href="'.base_url('about/historyedit/'.$id).'" class="">
                                <span class="name mb-0 font-weight-bold text-primary">'. $row->name .'</span>
                            </a>
                        </div>
                    </div>';
                
                if ( $row->status == 1 ) {
                    $status     = '<a href="'.base_url('about/historystatus/'.$id).'" class="btn btn-sm btn-outline-success btn-status-history" data-history="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-check"></i> Active</a>';
                } else {
                    $status     = '<a href="'.base_url('about/historystatus/'.$id).'" class="btn btn-sm btn-outline-danger btn-status-history" data-history="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-times"></i> Non-Active</a>';
                }

                $btn_edit       = '<a href="'.base_url('about/historyedit/'.$id).'" class="btn btn-sm btn-default btn-tooltip" title="Edit"><i class="fa fa-edit"></i></a>';

                $btn_delete     = '<a href="javascript:;" 
                                    data-url="'.base_url('aboutus/historydelete/'.$id).'"
                                    data-history="'.ucwords($row->name).'"
                                    class="btn btn-sm btn-warning btn-tooltip btn-delete-history" 
                                    title="Delete"><i class="fa fa-trash"></i></a>';

                $records["aaData"][] = array(
                    an_center($i),
                    $history,
                    an_center( $row->str_year_from ),
                    an_center( $row->str_year_thru ),
                    an_center( $status ),
                    an_center( date('Y-m-d @H:i', strtotime($row->dateupdated)) ),
                    an_center( ( (($is_admin || $is_member) && $access) ? $btn_edit.$btn_delete : '' ) )
                );
                $i++;
            }
        }

        $end = $iDisplayStart + $iDisplayLength;
        $end = $end > $iTotalRecords ? $iTotalRecords : $end;

        $records["sEcho"]                   = $sEcho;
        $records["iTotalRecords"]           = $iTotalRecords;
        $records["iTotalDisplayRecords"]    = $iTotalRecords;

        echo json_encode($records);
    }

    // ---------------------------------------------------------------------------------------------

    // =============================================================================================
    // ACTIONS SETTING
    // =============================================================================================

    /**
     * Get Data Detail function.
     */
    function detaildata($id = '', $action = ''){
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('aboutus/index'), 'location');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        // ID Data 
        if (!$id) {
            $data = array('status' => 'error', 'message' => 'ID Page Detail tidak dikenali !');
            die(json_encode($data));
        }

        // Get Data About Us Detail 
        if (!$aboutusdetail = $this->Model_Aboutus->get_detail_by('id', $id)) {
            $data = array('status' => 'error', 'message' => 'Data Notification tidak ditemukan !');
            die(json_encode($data));
        }

        $action     = $action ? $action : 'view';

        if ($action == 'view') {
            if ($aboutusdetail->type == 'email') {
                $aboutusdetail->content = an_notification_email_template($aboutusdetail->content, $aboutusdetail->title);
            } else {
                $aboutusdetail->content = '<div style="padding: 0px 15px"><pre>' . $aboutusdetail->content . '</pre></div>';
            }
        } else {
            if ($aboutusdetail->type != 'email') {
                $aboutusdetail->content = strip_tags($aboutusdetail->content);
            }
        }

        $data = array('status' => 'success', 'process' => $action, 'notification' => $aboutusdetail, 'message' => 'Data Detail ditemukan.');
        die(json_encode($data));
    }

    /**
     * Update Data AboutUs Detail function.
     */
    function updateaboutusdetail(){
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('aboutus/index'), 'location');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        // POST Input Form
        $aboutusdetail_id       = $this->input->post('aboutusdetail_id');
        $aboutusdetail_id       = an_isset($aboutusdetail_id, '');
        $aboutusdetail_type     = $this->input->post('aboutusdetail_type');
        $aboutusdetail_type     = an_isset($aboutusdetail_type, '');
        $aboutusdetail_title    = $this->input->post('aboutusdetail_title');
        $aboutusdetail_title    = an_isset($aboutusdetail_title, '');
        $aboutusdetail_status   = $this->input->post('aboutusdetail_status');
        $aboutusdetail_status   = an_isset($aboutusdetail_status, '');
        $content_email  = $this->input->post('content_email');
        $content_email  = an_isset($content_email, '', '', false, false);
        $content_plain  = $this->input->post('content_plain');
        $content_plain  = an_isset($content_plain, '', '', false, false);

        // Get Data About Us Detail 
        if (!$aboutusdetail = $this->Model_Aboutus->get_detail_by('id', $aboutusdetail_id)) {
            $data = array('status' => 'error', 'message' => 'Update Detail tidak berhasil. Data Detail tidak ditemukan !');
            die(json_encode($data));
        }

        $content        = (strtolower($aboutusdetail_type) == 'email') ? $content_email : $content_plain;

        // Set and Update Data About Us Detail
        $data_aboutusdetail     = array('title' => $aboutusdetail_title, 'content' => $content, 'status' => $aboutusdetail_status);
        if (!$update_aboutusdetail = $this->Model_Aboutus->update_data_detail($aboutusdetail->id, $data_aboutusdetail)) {
            $data = array('status' => 'error', 'message' => 'Update Detail tidak berhasil. Terjasi kesalahan pada proses transaksi.');
            die(json_encode($data));
        }

        // Update Success
        $data = array('status' => 'success', 'message' => 'Update Detail berhasil.');
        die(json_encode($data));
    }

    /**
     * Save About Us History Function
     */
    function saveaboutushistory( $id = 0 ){
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('about/historynew'), 'refresh');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $an_token               = $this->security->get_csrf_hash();
        $return                 = array('status' => 'error', 'token' => $an_token, 'message' => 'Data Produk tidak berhasil disimpan.');

        $history_id             = '';
        $history_name           = '';
        $data_history           = '';
        if ( $id ) {
            $id = an_decrypt($id);
            if ( ! $data_history = an_aboutus_history($id) ) {
                $return['message'] = 'Data Produk tidak berhasil disimpan. ID Produk tidak ditemukan !';
                die(json_encode($return));
            }
            $history_id         = $data_history->id;
            $history_name       = $data_history->name;
        }

        // set variables
        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $datetime               = date('Y-m-d H:i:s');

        // POST Input Form
        $name                   = trim( $this->input->post('aboutushistory_name') );
        $name                   = an_isset($name, '');

        $year_from              = trim( $this->input->post('aboutushistory_year_from') );
        $year_from              = an_isset($year_from, 0, '', true);
        $year_thru              = trim( $this->input->post('aboutushistory_year_thru') );
        $year_thru              = an_isset($year_thru, 0, '', true);

        $short_description      = trim( $this->input->post('short_description') );
        $short_description      = an_isset($short_description, '');
        $description            = trim( $this->input->post('description') );
        $description            = an_isset($description, '', '', false, false);

        $this->form_validation->set_rules('aboutushistory_name','Nama Sejarah','required');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE){
            $return['message'] = 'Data tidak berhasil disimpan. '.validation_errors();
            die(json_encode($return));
        }else{
            $slug                       = url_title($name, 'dash', TRUE);
            $check_slug                 = true;
            if ( $history_id == $id && strtolower($history_name) == strtolower($name) ) {
                $check_slug             = false;
            }

            if ( $check_slug ) {
                $condition              = ' AND %slug% = "'.$slug.'" OR %slug% LIKE "'.$slug.'-%" ';
                if ( $check_slug = $this->Model_Aboutus->get_all_aboutus_history(0, 0, $condition) ) {
                    $count_history      = count($check_slug);
                    $slug               = $slug .'-'. $count_history;
                }
            }

            // Config Upload Image
            $img_msg                    = '';
            $img_ext                    = '';
            $get_data_img               = '';
            $img_upload                 = true;
            $img_name                   = $slug.'-'.time();

            $config['upload_path']      = ABOUTHISTORY_IMG_PATH;
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['overwrite']        = true;
            $config['file_name']        = $img_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if( ! $this->upload->do_upload("history_img")) {
                $img_upload             = false;
                $img_msg                = $this->upload->display_errors();
            }

            $created_by         = $current_member->username;
            if ( $staff = an_get_current_staff() ) {
                $created_by     = $staff->username;
            }

            $data = array(
                'id_page_about'     => 1,
                'name'              => $name,
                'slug'              => $slug,
                'year_from'         => $year_from,
                'year_thru'         => $year_thru,
                'short_description' => $short_description,
                'description'       => $description,
                'status'            => 1,
                'datecreated'       => $datetime,
                'dateupdated'       => $datetime,
                'datemodified'      => $datetime,
            );

            if ( $img_upload ) {
                $get_data_img       = $this->upload->data();
                $img_msg            = 'upload success';
                $data['image']      = $get_data_img['file_name'];

                create_thumbnail($data['image'] , ABOUTHISTORY_IMG_PATH); // Create thumbnail
            }

            if ( $id ) {
                unset($data['datecreated']);
                $data['modified_by'] = $created_by;
                if ( ! $update_data = $this->Model_Aboutus->update_data_aboutus_history($id, $data) ) {
                    $return['message'] = 'Data Produk tidak berhasil disimpan. Silahkan cek form produk !';
                    die(json_encode($return));
                }

                // Delete Image
                if ( $history_id && $data_history && $img_msg == "upload success" ) {
                    $file_path = $file_thumb_path = $file = $file_thumb = ''; 
                    if ( $data_history->image ) {
                        $file_path = ABOUTHISTORY_IMG_PATH . $data_history->image;
                        if ( file_exists($file_path) ) {
                            $file = $file_path;
                        }
                        $file_thumb_path = ABOUTHISTORY_IMG_PATH . 'thumbnail/' . $data_history->image;
                        if ( file_exists($file_thumb_path) ) {
                            $file_thumb = $file_thumb_path;
                        }
                    }
                    if ( $file ) { unlink($file); }
                    if ( $file_thumb ) { unlink($file_thumb); }
                }

            } else {
                $data['status']     = 1;
                $data['created_by'] = $created_by;
                if ( ! $saved_data  = $this->Model_Aboutus->save_data_aboutus_history($data) ) {
                    $return['message'] = 'Data History tidak berhasil disimpan. Silahkan cek form !';
                    die(json_encode($return));
                }
                $id = $saved_data;
            }

            $id_encrypt         = an_encrypt($id);
            //$direct             = base_url('productmanage/productedit/'.$id_encrypt);
            $direct             = base_url('about/historylists');
            // Save Success
            $return['status']   = 'success';
            $return['message']  = 'Data History berhasil disimpan.';
            $return['url']      = $direct;
            die(json_encode($return));
        }
    }

    /**
     * Status Home Function
     */
    function detailstatus( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('about/new'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_detail = an_aboutus_detail($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Detail tidak ditemukan !');
            die(json_encode($data));
        }

        // set variables
        $current_member     = an_get_current_member();
        $is_admin           = as_administrator($current_member);
        $datetime           = date('Y-m-d H:i:s');
        $status             = ( $data_detail->status == 1 ) ? 0 : 1;

        $modified_by        = $current_member->username;
        if ( $staff = an_get_current_staff() ) {
            $modified_by    = $staff->username;
        }

        $data = array(
            'status'        => $status,
            'modified_by'   => $modified_by,
            'datemodified'  => $datetime,
        );

        if ( ! $update_data = $this->Model_Aboutus->update_data_detail($id, $data) ) {
            $data = array('status' => 'error', 'message' => 'Status Detail tidak berhasil diedit !');
            die(json_encode($data));
        }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Status Detail berhasil diedit.');
        die(json_encode($data));
    }
}

/* End of file Aboutus.php */
/* Location: ./application/controllers/Aboutus.php */
