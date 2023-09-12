<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home Controller.
 *
 * @class     Home
 * @version   1.0.0
 */
class Home extends Admin_Controller
{
    /**
     * Constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    // =============================================================================================
    // Home PAGE
    // =============================================================================================
    /**
     * Home Index function.
     */
    public function index(){
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
            'HomeManage.init();',
            'FV_HomeSetting.init();',
            'TableAjaxHomeList.init();'
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_home') . ' ' . lang('menu_home_new');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['main_content']   = 'home/home';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Client List function.
     */
    public function clientlist(){
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
            'HomeManage.init();',
            'TableAjaxHomeList.init();'
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_home_client');
        $data['title_page']     = '<i class="ni ni-align-left-2 mr-1"></i> ' . lang('menu_home_client');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['main_content']   = 'home/clientlists';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Client New function.
     */
    public function clientnew(){
        auth_redirect();

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
            'HomeManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_home_client_new');
        $data['title_page']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_home');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_client']    = '';
        $data['form_page']      = 'new';
        $data['form_title']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_home_client_new');
        $data['main_content']   = 'home/clientform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Client Edit function.
     */
    public function clientedit($id = 0){
        auth_redirect();
        if (!$id) {
            redirect(base_url('home/clientlist'), 'refresh');
        }

        $id_client = an_decrypt($id);
        if (!$data_client = an_client($id_client)) {
            redirect(base_url('home/clientlist'), 'refresh');
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
            'HomeManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_home_client_edit');
        $data['title_page']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_home');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_client']    = $data_client;
        $data['form_page']      = 'edit';
        $data['form_title']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_home_client_edit');
        $data['main_content']   = 'home/clientform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Detail Edit function.
     */
    public function detailedit($id = 0){
        auth_redirect();
        if (!$id) {
            redirect(base_url('home/new'), 'refresh');
        }

        $id_detail = an_decrypt($id);
        if (!$data_detail = an_home_detail($id_detail)) {
            redirect(base_url('home/new'), 'refresh');
        }

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
            'HomeManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_home_edit');
        $data['title_page']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_home');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_detail']    = $data_detail;
        $data['form_page']      = 'edit';
        $data['form_title']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_home_edit');
        $data['main_content']   = 'home/detailform';

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
        $s_short_name       = $this->input->post('search_short_name');
        $s_short_name       = an_isset($s_short_name, '');
        //$s_type             = $this->input->post('search_type');
        //$s_type             = an_isset($s_type, '');
        $s_status           = $this->input->post('search_status');
        $s_status           = an_isset($s_status, '');
        $s_date_min         = $this->input->post('search_dateupdated_min');
        $s_date_min         = an_isset($s_dateupdated_min, '', '', true);
        $s_date_max         = $this->input->post('search_dateupdated_max');
        $s_date_max         = an_isset($s_dateupdated_max, '', '', true);

        if (!empty($s_name)) {
            $condition .= str_replace('%s%', $s_name, ' AND %name% LIKE "%%s%%"');
        }

        if (!empty($s_short_name)) {
            $condition .= str_replace('%s%', $s_short_name, ' AND %name% LIKE "%%s%%"');
        }
        //if (!empty($s_type)) {
            //$condition .= str_replace('%s%', $s_type, ' AND %type% = "%s%"');
        //}
        if (!empty($s_status)) {
            $s_status   = ($s_status == 'active') ? 1 : 0;
            $condition .= str_replace('%s%', $s_status, ' AND %status% = %s%');
        }
        if ( !empty($s_date_min) )          { $condition .= ' AND %dateupdated% >= ?'; $params[] = $s_date_min; }
        if ( !empty($s_date_max) )          { $condition .= ' AND %dateupdated% <= ?'; $params[] = $s_date_max; }
        
        if ($column == 1) {
            $order_by .= '%name% ' . $sort;
        } elseif ($column == 2) {
            $order_by .= '%short_name% ' . $sort;
        } elseif ($column == 3) {
            $order_by .= '%type% ' . $sort;
        } elseif ($column == 4) {
            $order_by .= '%status% ' . $sort;
        } elseif( $column == 5 ) { 
            $order_by .= '%dateupdated% ' . $sort; 
        }

        $data_list          = $this->Model_Home->get_all_detail_data($limit, $offset, $condition, $order_by);
        $records            = array();
        $records["aaData"]  = array();

        if (!empty($data_list)) {
            $iTotalRecords  = an_get_last_found_rows();
            $i = $offset + 1;
            foreach ($data_list as $row) {
                $lbl_class  = 'default';
                
                $id             = an_encrypt($row->id);
                $img_src        = an_page_home_image($row->image, true);
                $name         = '
                    <div class="media align-items-center">
                        <a href="'.base_url('home/detailedit/' . $id . '').'" class="avatar mr-3">
                            <img alt="Image placeholder" src="'. $img_src .'">
                        </a>
                        <div class="media-body">
                            <a href="'.base_url('home/detailedit/' . $id . '').'" class="">
                                <span class="name mb-0 font-weight-bold text-primary">'. $row->name .'</span>
                            </a>
                        </div>
                    </div>';

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
                    $status     = '<a href="'.base_url('home/detailstatus/'.$id).'" class="btn btn-sm btn-outline-success btn-status-detailhome" data-detail="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-check"></i> Active</a>';
                } else {
                    $status     = '<a href="'.base_url('home/detailstatus/'.$id).'" class="btn btn-sm btn-outline-danger btn-status-detailhome" data-detail="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-times"></i> Non-Active</a>';
                }

                if($row->slug == 'homepage'){
                    $status     = '';
                }

                //$btn_edit   = '<a class="btn btn-sm btn-tooltip btn-default detaildata" title="Edit" href="' . base_url('home/detaildata/' . $row->id . '/edit') . '"><i class="fa fa-edit"></i></a>';
                $btn_edit   = '<a href="'.base_url('home/detailedit/'.$id).'" class="btn btn-sm btn-default btn-tooltip" title="Edit"><i class="fa fa-edit"></i></a>';

                $btn_banner = '<a class="btn btn-sm btn-tooltip btn-primary detaildata" title="Banner" href="' . base_url('home/detaildata/' . $row->id . '/banner') . '"><i class="fa fa-image"></i></a>';
                $btn_banner = '';
                $btn_view   = '<a class="btn btn-sm btn-tooltip btn-secondary detaildata" title="View" href="' . base_url('home/detaildata/' . $row->id . '/view') . '"><i class="fa fa-eye"></i></a>';

                $records["aaData"][]    = array(
                    an_center($i),
                    $name,
                    $row->short_name,
                    //an_center($type),
                    an_center($status),
                    an_center( date('Y-m-d @H:i', strtotime($row->dateupdated)) ),
                    an_center($btn_edit . $btn_banner . $btn_view),
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
     * Client List Data function.
     */
    function clientlistsdata(){
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
        $s_date_min             = $this->input->$search_method('search_dateupdated_min');
        $s_date_min             = an_isset($s_dateupdated_min, '', '', true);
        $s_date_max             = $this->input->$search_method('search_dateupdated_max');
        $s_date_max             = an_isset($s_dateupdated_max, '', '', true);
        $s_status               = $this->input->$search_method('search_status');
        $s_status               = an_isset($s_status, '', '', true);

        if ( !empty($s_name) )              { $condition .= ' AND %name% LIKE CONCAT("%", ?, "%")'; $params[] = $s_name; }
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
        elseif( $column == 2 )  { $order_by .= '%status% ' . $sort; }
        elseif( $column == 3 )  { $order_by .= '%dateupdated% ' . $sort; }
        
        //$data_list          = ( $is_admin ) ? $this->Model_Home->get_all_client($limit, $offset, $condition, $order_by, $params) : array();
        $data_list          = $this->Model_Home->get_all_client($limit, $offset, $condition, $order_by, $params);
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
                $img_src        = an_client_image($row->image, true); 
                
                $client         = '
                    <div class="media align-items-center">
                        <a href="'.base_url('home/clientedit/'.$id).'" class="avatar mr-3">
                            <img alt="Image placeholder" src="'. $img_src .'">
                        </a>
                        <div class="media-body">
                            <a href="'.base_url('home/clientedit/'.$id).'" class="">
                                <span class="name mb-0 font-weight-bold text-primary">'. $row->name .'</span>
                            </a>
                        </div>
                    </div>';
                
                if ( $row->status == 1 ) {
                    $status     = '<a href="'.base_url('home/clientstatus/'.$id).'" class="btn btn-sm btn-outline-success btn-status-client" data-client="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-check"></i> Active</a>';
                } else {
                    $status     = '<a href="'.base_url('home/clientstatus/'.$id).'" class="btn btn-sm btn-outline-danger btn-status-client" data-client="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-times"></i> Non-Active</a>';
                }

                $btn_edit       = '<a href="'.base_url('home/clientedit/'.$id).'" class="btn btn-sm btn-default btn-tooltip" title="Edit"><i class="fa fa-edit"></i></a>';

                $btn_delete     = '<a href="javascript:;" 
                                    data-url="'.base_url('home/clientdelete/'.$id).'"
                                    data-client="'.ucwords($row->name).'"
                                    class="btn btn-sm btn-warning btn-tooltip btn-delete-client" 
                                    title="Delete"><i class="fa fa-trash"></i></a>';

                $records["aaData"][] = array(
                    an_center($i),
                    $client,
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
            redirect(base_url('home/index'), 'location');
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

        // Get Data Home Detail 
        if (!$homedetail = $this->Model_Home->get_detail_by('id', $id)) {
            $data = array('status' => 'error', 'message' => 'Data tidak ditemukan !');
            die(json_encode($data));
        }

        $action     = $action ? $action : 'view';

        if ($action == 'view') {
            if ($homedetail->type == 'email') {
                $homedetail->content = an_notification_email_template($homedetail->content, $homedetail->title);
            } else {
                $homedetail->content = '<div style="padding: 0px 15px"><pre>' . $homedetail->content . '</pre></div>';
            }
        } else {
            if ($homedetail->type != 'email') {
                $homedetail->content = strip_tags($homedetail->content);
            }
        }

        $data = array('status' => 'success', 'process' => $action, 'notification' => $homedetail, 'message' => 'Data Detail ditemukan.');
        die(json_encode($data));
    }

    /**
     * Update Data Home Detail function.
     */
    function updatehomedetail(){
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('home/index'), 'location');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        // POST Input Form
        $homedetail_id       = $this->input->post('homedetail_id');
        $homedetail_id       = an_isset($homedetail_id, '');
        $homedetail_type     = $this->input->post('homedetail_type');
        $homedetail_type     = an_isset($homedetail_type, '');
        $homedetail_title    = $this->input->post('homedetail_title');
        $homedetail_title    = an_isset($homedetail_title, '');
        $homedetail_short_name    = $this->input->post('homedetail_short_name');
        $homedetail_short_name    = an_isset($homedetail_short_name, '');
        $homedetail_status   = $this->input->post('homedetail_status');
        $homedetail_status   = an_isset($homedetail_status, '');
        $content_email  = $this->input->post('content_email');
        $content_email  = an_isset($content_email, '', '', false, false);
        $content_plain  = $this->input->post('content_plain');
        $content_plain  = an_isset($content_plain, '', '', false, false);

        // Get Data Home Detail 
        if (!$homedetail = $this->Model_Home->get_detail_by('id', $homedetail_id)) {
            $data = array('status' => 'error', 'message' => 'Update Detail tidak berhasil. Data Detail tidak ditemukan !');
            die(json_encode($data));
        }

        $content        = (strtolower($homedetail_type) == 'email') ? $content_email : $content_plain;

        // Set and Update Data About Us Detail
        $data_homedetail     = array('title' => $homedetail_title, 'short_name' => $homedetail_short_name, 'content' => $content, 'status' => $homedetail_status);
        if (!$update_homedetail = $this->Model_Home->update_data_detail($homedetail->id, $data_homedetail)) {
            $data = array('status' => 'error', 'message' => 'Update Detail tidak berhasil. Terjasi kesalahan pada proses transaksi.');
            die(json_encode($data));
        }

        // Update Success
        $data = array('status' => 'success', 'message' => 'Update Detail berhasil.');
        die(json_encode($data));
    }

    /**
     * Save Client Function
     */
    function saveclient( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('home/clientnew'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $an_token               = $this->security->get_csrf_hash();
        $return                 = array('status' => 'error', 'token' => $an_token, 'message' => 'Data Pelanggan tidak berhasil disimpan.');

        $client_id              = '';
        $client_name            = '';
        $data_client            = '';
        if ( $id ) {
            $id = an_decrypt($id);
            if ( ! $data_client = an_client($id) ) {
                $return['message'] = 'Data Pelanggan tidak berhasil disimpan. ID Pelanggan tidak ditemukan !';
                die(json_encode($return));
            }
            $client_id          = $data_client->id;
            $client_name        = $data_client->name;
        }

        // set variables
        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $datetime               = date('Y-m-d H:i:s');

        // POST Input Form
        $client                 = trim( $this->input->post('client_name') );
        $client                 = an_isset($client, '');
        /*
        $short_description      = trim( $this->input->post('short_description') );
        $short_description      = an_isset($short_description, '');
        */
        $description            = trim( $this->input->post('description') );
        $description            = an_isset($description, '', '', false, false);

        $this->form_validation->set_rules('client_name','Nama Pelanggan','required');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE){
            $return['message'] = 'Data Pelanggan tidak berhasil disimpan. '.validation_errors();
            die(json_encode($return));
        }else{
            $slug                       = url_title($client, 'dash', TRUE);
            $check_slug                 = true;
            if ( $client_id == $id && strtolower($client_name) == strtolower($client) ) {
                $check_slug             = false;
            }

            if ( $check_slug ) {
                $condition              = ' AND %slug% = "'.$slug.'" OR %slug% LIKE "'.$slug.'-%" ';
                if ( $check_slug = $this->Model_Home->get_all_client(0, 0, $condition) ) {
                    $count_client       = count($check_slug);
                    $slug               = $slug .'-'. $count_client;
                }
            }

            // Config Upload Image
            $img_msg                    = '';
            $img_ext                    = '';
            $get_data_img               = '';
            $img_upload                 = true;
            $img_name                   = $slug.'-'.time();

            $config['upload_path']      = CLIENT_IMG_PATH;
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['overwrite']        = true;
            $config['file_name']        = $img_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if( ! $this->upload->do_upload("client_img")) {
                $img_upload             = false;
                $img_msg                = $this->upload->display_errors();
            }

            $created_by         = $current_member->username;
            if ( $staff = an_get_current_staff() ) {
                $created_by     = $staff->username;
            }

            $data = array(
                'name'              => $client,
                'slug'              => $slug,
                'address'           => $description,
                'datecreated'       => $datetime,
                'dateupdated'       => $datetime,
                'datemodified'      => $datetime,
            );

            if ( $img_upload ) {
                $get_data_img       = $this->upload->data();
                $img_msg            = 'upload success';
                $data['image']      = $get_data_img['file_name'];

                create_thumbnail($data['image'] , CLIENT_IMG_PATH); // Create thumbnail
            }

            if ( $id ) {
                unset($data['datecreated']);
                $data['modified_by'] = $created_by;
                if ( ! $update_data = $this->Model_Home->update_data_client($id, $data) ) {
                    $return['message'] = 'Data Pelanggan tidak berhasil disimpan. Silahkan cek form pelanggan !';
                    die(json_encode($return));
                }

                // Delete Image
                if ( $client_id && $data_client && $img_msg == "upload success" ) {
                    $file_path = $file_thumb_path = $file = $file_thumb = ''; 
                    if ( $data_client->image ) {
                        $file_path = CLIENT_IMG_PATH . $data_client->image;
                        if ( file_exists($file_path) ) {
                            $file = $file_path;
                        }
                        $file_thumb_path = CLIENT_IMG_PATH . 'thumbnail/' . $data_client->image;
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
                if ( ! $saved_data = $this->Model_Home->save_data_client($data) ) {
                    $return['message'] = 'Data Pelanggan tidak berhasil disimpan. Silahkan cek form Pelanggan !';
                    die(json_encode($return));
                }
                $id = $saved_data;
            }

            $id_encrypt         = an_encrypt($id);
            $direct             = base_url('home/clientedit/'.$id_encrypt);
            $direct             = base_url('home/clientlist');
            // Save Success
            $return['status']   = 'success';
            $return['message']  = 'Data Pelanggan berhasil disimpan.';
            $return['url']      = $direct;
            die(json_encode($return));
        }
    }

    /**
     * Status Client Function
     */
    function clientstatus( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('home/clientlist'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID Pelanggan tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_client = an_client($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Pelanggan tidak ditemukan !');
            die(json_encode($data));
        }

        // set variables
        $current_member     = an_get_current_member();
        $is_admin           = as_administrator($current_member);
        $datetime           = date('Y-m-d H:i:s');
        $status             = ( $data_client->status == 1 ) ? 0 : 1;

        $modified_by        = $current_member->username;
        if ( $staff = an_get_current_staff() ) {
            $modified_by    = $staff->username;
        }

        $data = array(
            'status'        => $status,
            'modified_by'   => $modified_by,
            'datemodified'  => $datetime,
        );

        if ( ! $update_data = $this->Model_Home->update_data_client($id, $data) ) {
            $data = array('status' => 'error', 'message' => 'Status Pelanggan tidak berhasil diedit !');
            die(json_encode($data));
        }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Status Pelanggan berhasil diedit.');
        die(json_encode($data));
    }

    /**
     * Save Detail Function
     */
    function savedetail( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('home/new'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $an_token               = $this->security->get_csrf_hash();
        $return                 = array('status' => 'error', 'token' => $an_token, 'message' => 'Data Detail tidak berhasil disimpan.');

        $detail_id              = '';
        $detail_name            = '';
        $data_detail            = '';
        if ( $id ) {
            $id = an_decrypt($id);
            if ( ! $data_detail = an_home_detail($id) ) {
                $return['message'] = 'Data Detail tidak berhasil disimpan. ID Detail tidak ditemukan !';
                die(json_encode($return));
            }
            $detail_id          = $data_detail->id;
            $detail_name        = $data_detail->title;
        }

        // set variables
        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $is_member              = as_member($current_member);
        $datetime               = date('Y-m-d H:i:s');

        // POST Input Form
        $title                  = trim( $this->input->post('homedetail_title') );
        $title                  = an_isset($title, '');
        $short_name             = trim( $this->input->post('homedetail_short_name') );
        $short_name             = an_isset($short_name, '');
        $slug_name              = trim( $this->input->post('homedetail_slug') );
        $slug_name              = an_isset($slug_name, '');
        $description            = trim( $this->input->post('description') );
        $description            = an_isset($description, '', '', false, false);

        $this->form_validation->set_rules('homedetail_title','Nama Judul','required');
        $this->form_validation->set_rules('homedetail_short_name','Nama Pendek','required');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE){
            $return['message'] = 'Data Detail tidak berhasil disimpan. '.validation_errors();
            die(json_encode($return));
        }else{
            // Config Upload Image
            $img_msg                    = '';
            $img_ext                    = '';
            $get_data_img               = '';
            $img_upload                 = true;
            $img_name                   = $slug_name.'-'.time();

            $config['upload_path']      = PAGEHOME_IMG_PATH;
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['overwrite']        = true;
            $config['file_name']        = $img_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if( ! $this->upload->do_upload("homedetail_img")) {
                $img_upload             = false;
                $img_msg                = $this->upload->display_errors();
            }

            $created_by         = $current_member->username;
            if ( $staff = an_get_current_staff() ) {
                $created_by     = $staff->username;
            }

            $data = array(
                'title'             => $title,
                'short_name'        => $short_name,
                'slug'              => $slug_name,
                'content'           => $description,
                'datecreated'       => $datetime,
                'dateupdated'       => $datetime,
                'datemodified'      => $datetime,
            );

            if ( $img_upload ) {
                $get_data_img       = $this->upload->data();
                $img_msg            = 'upload success';
                $data['image']      = $get_data_img['file_name'];

                create_thumbnail($data['image'] , PAGEHOME_IMG_PATH); // Create thumbnail
            }

            if ( $id ) 
            {
                unset($data['datecreated']);
                $data['modified_by'] = $created_by;
                if ( ! $update_data = $this->Model_Home->update_data_detail($id, $data) ) {
                    $return['message'] = 'Data Detail tidak berhasil disimpan. Silahkan cek form detail !';
                    die(json_encode($return));
                }

                // Delete Image
                if ( $detail_id && $data_detail && $img_msg == "upload success" ) {
                    $file_path = $file_thumb_path = $file = $file_thumb = ''; 
                    if ( $data_detail->image ) {
                        $file_path = PAGEHOME_IMG_PATH . $data_detail->image;
                        if ( file_exists($file_path) ) {
                            $file = $file_path;
                        }
                        $file_thumb_path = PAGEHOME_IMG_PATH . 'thumbnail/' . $data_detail->image;
                        if ( file_exists($file_thumb_path) ) {
                            $file_thumb = $file_thumb_path;
                        }
                    }
                    if ( $file ) { unlink($file); }
                    if ( $file_thumb ) { unlink($file_thumb); }
                }

            } else {
                $slug                       = url_title($slug_name, 'dash', TRUE);
                $check_slug                 = true;
                if ( $detail_id == $id && strtolower($slug_name) == strtolower($title) ) {
                    $check_slug             = false;
                }

                if ( $check_slug ) {
                    $condition              = ' AND %slug% = "'.$slug.'" OR %slug% LIKE "'.$slug.'-%" ';
                    if ( $check_slug = $this->Model_Home->get_all_detail_data(0, 0, $condition) ) {
                        $count_client       = count($check_slug);
                        $slug               = $slug .'-'. $count_client;
                    }
                }
                
                $data['slug']       = $slug;
                $data['status']     = 1;
                $data['created_by'] = $created_by;
                if ( ! $saved_data = $this->Model_Home->save_data_detail($data) ) {
                    $return['message'] = 'Data Detail tidak berhasil disimpan. Silahkan cek form Detail !';
                    die(json_encode($return));
                }
                $id = $saved_data;
            }

            $id_encrypt         = an_encrypt($id);
            $direct             = base_url('home/detailedit/'.$id_encrypt);
            $direct             = base_url('home/new');
            // Save Success
            $return['status']   = 'success';
            $return['message']  = 'Data Detail berhasil disimpan.';
            $return['url']      = $direct;
            die(json_encode($return));
        }
    }

    /**
     * Status Detail Function
     */
    function detailstatus( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('home/new'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID Detail tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_detail = an_home_detail($id) ) {
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

        if ( ! $update_data = $this->Model_Home->update_data_detail($id, $data) ) {
            $data = array('status' => 'error', 'message' => 'Status Detail tidak berhasil diedit !');
            die(json_encode($data));
        }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Status Detail berhasil diedit.');
        die(json_encode($data));
    }

    /**
     * Delete Client Function
     */
    function clientdelete( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('home/clientlist'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID Pelanggan tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_client = an_client($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Pelanggan tidak ditemukan !');
            die(json_encode($data));
        }

        $client_img    = $data_client->image;
        if ( ! $delete_data = $this->Model_Home->delete_data_client($id) ) {
            $data = array('status' => 'error', 'message' => 'Pelanggan tidak berhasil dihapus !');
            die(json_encode($data));
        }

        // Delete Image
        $file_path = $file_thumb_path = $file = $file_thumb = ''; 
        if ( $client_img ) {
            $file_path = CLIENT_IMG_PATH . $client_img;
            if ( file_exists($file_path) ) {
                $file = $file_path;
            }
            $file_thumb_path = CLIENT_IMG_PATH . 'thumbnail/' . $client_img;
            if ( file_exists($file_thumb_path) ) {
                $file_thumb = $file_thumb_path;
            }
        }
        if ( $file ) { unlink($file); }
        if ( $file_thumb ) { unlink($file_thumb); }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Pelanggan berhasil dihapus.');
        die(json_encode($data));
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
