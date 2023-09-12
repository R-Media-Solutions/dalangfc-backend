<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Services Controller.
 *
 * @class     Services
 * @version   1.0.0
 */
class Services extends Admin_Controller
{
    /**
     * Constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    // =============================================================================================
    // Services PAGE
    // =============================================================================================

    /**
     * Services About Us Index function.
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
            'ServicesManage.init();',
            'TableAjaxServicesManageList.init();'
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_services_new');
        $data['title_page']     = '<i class="ni ni-align-left-2 mr-1"></i> ' . lang('menu_services_new');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['is_member']      = $is_member;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_services']  = '';
        $data['main_content']   = 'services/serviceslists';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Services New function.
     */
    public function servicesnew(){
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
            'ServicesManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_services_new');
        $data['title_page']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_services');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['form_page']      = 'new';
        $data['form_title']     = '<i class="fa fa-plus mr-1 mr-1"></i> ' . lang('menu_services_new');
        $data['main_content']   = 'services/servicesform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }

    /**
     * Sevices Edit function.
     */
    public function servicesedit($id = 0){
        auth_redirect();

        $id_services        = an_decrypt($id);
        if (!$data_services = an_services($id_services)) {
            redirect(base_url('services/serviceslists'), 'refresh');
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
            'ServicesManage.init();',
        ));
        $scripts_add            = '';

        $data['title']          = TITLE . lang('menu_services_edit');
        $data['title_page']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_services');
        $data['member']         = $current_member;
        $data['is_admin']       = $is_admin;
        $data['headstyles']     = $headstyles;
        $data['scripts']        = $loadscripts;
        $data['scripts_init']   = $scripts_init;
        $data['scripts_add']    = $scripts_add;
        $data['data_services']   = $data_services;
        $data['form_page']      = 'edit';
        $data['form_title']     = '<i class="fa fa-edit mr-1 mr-1"></i> ' . lang('menu_services_edit');
        $data['main_content']   = 'services/servicesform';

        $this->load->view(VIEW_BACK . 'template_index', $data);
    }
    // ---------------------------------------------------------------------------------------------

    // =============================================================================================
    // LIST DATA SETTING
    // =============================================================================================
    /**
     * Services List Data function.
     */
    function serviceslistsdata(){
        auth_redirect();
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('services/servicesnew'), 'refresh');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
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
        $s_category             = $this->input->$search_method('search_category');
        $s_category             = an_isset($s_category, '', '', true);
        $s_status               = $this->input->$search_method('search_status');
        $s_status               = an_isset($s_status, '', '', true);
        $s_date_min             = $this->input->$search_method('search_dateupdated_min');
        $s_date_min             = an_isset($s_dateupdated_min, '', '', true);
        $s_date_max             = $this->input->$search_method('search_dateupdated_max');
        $s_date_max             = an_isset($s_dateupdated_max, '', '', true);
        
        if ( !empty($s_name) )              { $condition .= ' AND %name% LIKE CONCAT("%", ?, "%")'; $params[] = $s_name; }
        if ( !empty($s_category) )          { $condition .= ' AND %category% LIKE CONCAT("%", ?, "%")'; $params[] = $s_category; }
        if ( !empty($s_date_min) )          { $condition .= ' AND %dateupdated% >= ?'; $params[] = $s_date_min; }
        if ( !empty($s_date_max) )          { $condition .= ' AND %dateupdated% <= ?'; $params[] = $s_date_max; }
        if ( !empty($s_status) )            { 
            if ( $s_status == 'active' ) {
                $condition .= ' AND %status% = 1'; 
            } else {
                $condition .= ' AND %status% <> 1'; 
            }
        }
        //if ( !empty($s_type) )              { $condition .= ' AND %type% LIKE CONCAT("%", ?, "%")'; $params[] = $s_type; }

        if( $column == 1 )      { $order_by .= 'name ' . $sort; }
        elseif( $column == 2 )  { $order_by .= '%category% ' . $sort; }
        elseif( $column == 3 )  { $order_by .= '%status% ' . $sort; }
        elseif( $column == 4 )  { $order_by .= '%dateupdated% ' . $sort; }

        //$data_list          = ( $is_admin ) ? $this->Model_Services->get_all_services($limit, $offset, $condition, $order_by, $params) : array();
        $data_list          = $this->Model_Services->get_all_services($limit, $offset, $condition, $order_by, $params);
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
                $category       = an_strong(ucwords($row->category));
                $img_src        = an_services_image($row->image, true); 
                
                $services    = '
                    <div class="media align-items-center">
                        <a href="'.base_url('services/servicesedit/'.$id).'" class="avatar mr-3">
                            <img alt="Image placeholder" src="'. $img_src .'">
                        </a>
                        <div class="media-body">
                            <a href="'.base_url('services/servicesedit/'.$id).'" class="">
                                <span class="name mb-0 font-weight-bold text-primary">'. $row->name .'</span>
                            </a>
                        </div>
                    </div>';
                
                if ( $row->status == 1 ) {
                    $status     = '<a href="'.base_url('services/servicesstatus/'.$id).'" class="btn btn-sm btn-outline-success btn-status-services" data-services="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-check"></i> Active</a>';
                } else {
                    $status     = '<a href="'.base_url('services/servicesstatus/'.$id).'" class="btn btn-sm btn-outline-danger btn-status-services" data-services="'.$row->name.'" data-status="'.$row->status.'"><i class="fa fa-times"></i> Non-Active</a>';
                }

                $btn_edit       = '<a href="'.base_url('services/servicesedit/'.$id).'" class="btn btn-sm btn-default btn-tooltip" title="Edit"><i class="fa fa-edit"></i></a>';

                $btn_delete     = '<a href="javascript:;" 
                                    data-url="'.base_url('services/servicesdelete/'.$id).'"
                                    data-services="'.ucwords($row->name).'"
                                    class="btn btn-sm btn-warning btn-tooltip btn-delete-services" 
                                    title="Delete Produk"><i class="fa fa-trash"></i></a>';

                $records["aaData"][] = array(
                    an_center($i),
                    $services,
                    $category,
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
     * Save Services Function
     */
    function saveservices( $id = 0 ){
        auth_redirect();
        // Check for AJAX Request
        if (!$this->input->is_ajax_request()) {
            redirect(base_url('services/servicesnew'), 'refresh');
        }
        $auth = auth_redirect($this->input->is_ajax_request());
        if (!$auth) {
            $data = array('status' => 'login', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        $an_token               = $this->security->get_csrf_hash();
        $return                 = array('status' => 'error', 'token' => $an_token, 'message' => 'Data Layanan tidak berhasil disimpan.');
        
        $services_id            = '';
        $services_name          = '';
        $data_services          = '';
        if ( $id ) {
            $id = an_decrypt($id);
            if ( ! $data_services = an_services($id) ) {
                $return['message'] = 'Data Layanan tidak berhasil disimpan. ID Layanan tidak ditemukan !';
                die(json_encode($return));
            }
            $services_id        = $data_services->id;
            $services_name      = $data_services->name;
        }

        // set variables
        $current_member         = an_get_current_member();
        $is_admin               = as_administrator($current_member);
        $datetime               = date('Y-m-d H:i:s');

        // POST Input Form
        $services               = trim( $this->input->post('services_name') );
        $services               = an_isset($services, '');
        $category               = $this->input->post('services_category');
        $category               = an_isset($category, 0, '', true);

        $short_description      = trim( $this->input->post('short_description') );
        $short_description      = an_isset($short_description, '');
        $description            = trim( $this->input->post('description') );
        $description            = an_isset($description, '', '', false, false);

        $this->form_validation->set_rules('services_name','Nama Layanan','required');
        //$this->form_validation->set_rules('services_category','Kategori','required');
        $this->form_validation->set_message('required', '%s harus di isi');
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run() == FALSE){
            $return['message'] = 'Data Layanan tidak berhasil disimpan. '.validation_errors();
            die(json_encode($return));
        }else{
            $slug                       = url_title($services, 'dash', TRUE);
            $check_slug                 = true;
            if ( $services_id == $id && strtolower($services_name) == strtolower($services) ) {
                $check_slug             = false;
            }

            if ( $check_slug ) {
                $condition              = ' AND %slug% = "'.$slug.'" OR %slug% LIKE "'.$slug.'-%" ';
                if ( $check_slug = $this->Model_Services->get_all_services(0, 0, $condition) ) {
                    $count_services     = count($check_slug);
                    $slug               = $slug .'-'. $count_services;
                }
            }

            // Config Upload Image
            $img_msg                    = '';
            $img_ext                    = '';
            $get_data_img               = '';
            $img_upload                 = true;
            $img_name                   = $slug.'-'.time();

            $config['upload_path']      = SERVICES_IMG_PATH;
            $config['allowed_types']    = 'jpg|png|jpeg';
            $config['max_size']         = '2048';
            $config['overwrite']        = true;
            $config['file_name']        = $img_name;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if( ! $this->upload->do_upload("services_img")) {
                $img_upload             = false;
                $img_msg                = $this->upload->display_errors();
            }

            $created_by         = $current_member->username;
            if ( $staff = an_get_current_staff() ) {
                $created_by     = $staff->username;
            }

            $data = array(
                'name'              => $services,
                'slug'              => $slug,
                'id_category'       => $category,
                'short_description' => $short_description,
                'description'       => $description,
                'datecreated'       => $datetime,
                'dateupdated'       => $datetime,
                'datemodified'      => $datetime,
            );

            if ( $img_upload ) {
                $get_data_img       = $this->upload->data();
                $img_msg            = 'upload success';
                $data['image']      = $get_data_img['file_name'];

                create_thumbnail($data['image'] , SERVICES_IMG_PATH); // Create thumbnail
            }

            if ( $id ) {
                unset($data['datecreated']);
                $data['modified_by'] = $created_by;
                if ( ! $update_data = $this->Model_Services->update_data_services($id, $data) ) {
                    $return['message'] = 'Data Layanan tidak berhasil disimpan. Silahkan cek form layanan !';
                    die(json_encode($return));
                }

                // Delete Image
                if ( $services_id && $data_services && $img_msg == "upload success" ) {
                    $file_path = $file_thumb_path = $file = $file_thumb = ''; 
                    if ( $data_services->image ) {
                        $file_path = SERVICES_IMG_PATH . $data_services->image;
                        if ( file_exists($file_path) ) {
                            $file = $file_path;
                        }
                        $file_thumb_path = SERVICES_IMG_PATH . 'thumbnail/' . $data_services->image;
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
                if ( ! $saved_data = $this->Model_Services->save_data_services($data) ) {
                    $return['message'] = 'Data Layanan tidak berhasil disimpan. Silahkan cek form layanan !';
                    die(json_encode($return));
                }
                $id = $saved_data;
            }

            $id_encrypt         = an_encrypt($id);
            $direct             = base_url('services/servicesedit/'.$id_encrypt);
            $direct             = base_url('services/serviceslists');
            // Save Success
            $return['status']   = 'success';
            $return['message']  = 'Data Layanan berhasil disimpan.';
            $return['url']      = $direct;
            die(json_encode($return));
        }
    }

    /**
     * Status Services Function
     */
    function servicesstatus( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('services/serviceslists'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID Produk tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_services = an_services($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Produk tidak ditemukan !');
            die(json_encode($data));
        }

        // set variables
        $current_member     = an_get_current_member();
        $is_admin           = as_administrator($current_member);
        $datetime           = date('Y-m-d H:i:s');
        $status             = ( $data_services->status == 1 ) ? 0 : 1;

        $modified_by        = $current_member->username;
        if ( $staff = an_get_current_staff() ) {
            $modified_by    = $staff->username;
        }

        $data = array(
            'status'        => $status,
            'modified_by'   => $modified_by,
            'datemodified'  => $datetime,
        );

        if ( ! $update_data = $this->Model_Services->update_data_services($id, $data) ) {
            $data = array('status' => 'error', 'message' => 'Status Layanan tidak berhasil diedit !');
            die(json_encode($data));
        }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Status Layanan berhasil diedit.');
        die(json_encode($data));
    }

    /**
     * Delete Services Function
     */
    function servicesdelete( $id = 0 ){
        if ( ! $this->input->is_ajax_request() ) { redirect(base_url('services/serviceslists'), 'refresh'); }
        $auth = auth_redirect( $this->input->is_ajax_request() );
        if( !$auth ){
            $data = array('status' => 'access_denied', 'url' => base_url('login'));
            die(json_encode($data)); // JSON encode data
        }

        if( !$id ){
            $data = array('status' => 'error', 'message' => 'ID Layanan tidak ditemukan !');
            die(json_encode($data));
        }

        $id = an_decrypt($id);
        if ( ! $data_services = an_services($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Layanan tidak ditemukan !');
            die(json_encode($data));
        }

        $services_img    = $data_services->image;
        if ( ! $delete_data = $this->Model_Services->delete_data_services($id) ) {
            $data = array('status' => 'error', 'message' => 'Data Layanan tidak berhasil dihapus !');
            die(json_encode($data));
        }

        // Delete Image
        $file_path = $file_thumb_path = $file = $file_thumb = ''; 
        if ( $services_img ) {
            $file_path = SERVICES_IMG_PATH . $services_img;
            if ( file_exists($file_path) ) {
                $file = $file_path;
            }
            $file_thumb_path = SERVICES_IMG_PATH . 'thumbnail/' . $services_img;
            if ( file_exists($file_thumb_path) ) {
                $file_thumb = $file_thumb_path;
            }
        }
        if ( $file ) { unlink($file); }
        if ( $file_thumb ) { unlink($file_thumb); }

        // Save Success
        $data = array('status'=>'success', 'message'=>'Data Layanan berhasil dihapus.');
        die(json_encode($data));
    }

}

/* End of file Services.php */
/* Location: ./application/controllers/Services.php */
