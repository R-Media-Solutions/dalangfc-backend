<?php 
    $data_history   = isset($data_history) ? $data_history : false; 
    $discount_type  = config_item('discount_type');
?>

<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('menu_about') ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="row justify-content-center">
                <div class="col-lg-12 card-wrapper">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-1"><?php echo $form_title; ?> </h3>
                                    <?php if ( $form_page == 'edit' ) { ?>
                                        <h5 class="text-muted mb-0"><?php echo $data_history->name; ?> </h5>
                                    <?php } ?>
                                </div>
                                <div class="col-4 text-right">
                                    <?php if ( $form_page == 'edit' ) { ?>
                                        <a href="<?php echo base_url('about/historylists') ?>" class="btn btn-sm btn-danger"><span class="fa fa-history"></span> Kembali</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('about/historylists') ?>" class="btn btn-sm btn-outline-default"><span class="fa fa-list"></span> Daftar Sejarah Perusahaan</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body wrapper-form-aboutushistory pt-0">
                            <?php 
                                $form_action = base_url('aboutus/saveaboutushistory');
                                if ( $form_page == 'edit' ) { 
                                    $form_action .= '/'. an_encrypt($data_history->id);
                                }
                            ?>
                            <form role="form" method="post" action="<?php echo $form_action; ?>" id="form-aboutushistory" class="form-horizontal">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-xl-8 order-xl-2 pt-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="aboutushistory_name"><?php echo lang('about_history_name'); ?> <span class="required">*</span></label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                                    </div>
                                                    <input type="text" name="aboutushistory_name" id="aboutushistory_name" class="form-control" placeholder="<?php echo lang('about_history_name'); ?>" value="<?php echo( $data_history ? $data_history->name : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label" for="aboutushistory_year_from"><?php echo lang('about_history_date_from'); ?> <span class="required">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="aboutushistory_year_from" id="aboutushistory_year_from">
                                                            <option value=""><?php echo lang('reg_pilih_tahun_mulai'); ?></option>
                                                            <?php
                                                                $year_from  = isset($data_history->year_from) ? $data_history->year_from : '';
                                                                $years      = an_year();
                                                                if( !empty($years) ){
                                                                    foreach($years as $b){
                                                                        $selected = ( $year_from == $b->id ) ? 'selected' : '';
                                                                        echo '<option value="'.$b->id.'" '.$selected.'>'.$b->nama.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label" for="aboutushistory_year_thru"><?php echo lang('about_history_date_thru'); ?> <span class="required">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-control" name="aboutushistory_year_thru" id="aboutushistory_year_thru">
                                                            <option value=""><?php echo lang('reg_pilih_tahun_selesai'); ?></option>
                                                            <?php
                                                                $year_thru  = isset($data_history->year_thru) ? $data_history->year_thru : '';
                                                                $years      = an_year();
                                                                if( !empty($years) ){
                                                                    foreach($years as $b){
                                                                        $selected = ( $year_thru == $b->id ) ? 'selected' : '';
                                                                        echo '<option value="'.$b->id.'" '.$selected.'>'.$b->nama.'</option>';
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="short_description"><?php echo lang('short_description'); ?> </label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-file"></i></span>
                                                    </div>
                                                    <input type="text" name="short_description" id="short_description" class="form-control" placeholder="<?php echo lang('short_description'); ?>" value="<?php echo( $data_history ? $data_history->short_description : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="editor">Deskripsi</label>
                                                <div id="editor-aboutuhistory" data-quill-placeholder="Deskripsi">
                                                    <?php echo ( $data_history ? $data_history->description : ''); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-xl-1 bg-secondary py-2">
                                            <div class="form-group">
                                                <?php 
                                                    $file_src   = ASSET_PATH . 'backend/img/no_image.jpg'; 
                                                    if ( $data_history ) {
                                                        if ( $data_history->image ) {
                                                            $file_path = ABOUTHISTORY_IMG_PATH . $data_history->image;
                                                            if ( file_exists($file_path) ) {
                                                                $file_src = ABOUTHISTORY_IMG . $data_history->image;
                                                            }
                                                        }
                                                    }

                                                ?>
                                                <div class="thumbnail mb-1">
                                                    <img class="img-thumbnail" id="aboutushistory_img_thumbnail" width="100%" src="<?php echo $file_src; ?>" style="cursor: pointer;">
                                                    <div class="caption">
                                                        <p class="text-muted mb-0" style="font-size: 14px">Image ( jpg, jpeg, png ) and Max 2 MB</p>
                                                        <div class="img-information" style="display: none;">
                                                            <i class="ni ni-album-2 mr-1" id="type_img_thumbnail"></i> 
                                                            <span id="size_img_thumbnail"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="file" name="aboutushistory_file" id="aboutushistory_file" class="form-control file-image" accept="image/x-png,image/jpeg">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary bg-gradient-default my-2"><?php echo lang('about_history_save'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Category -->
<div class="modal fade" id="modal-add-category" tabindex="-1" role="dialog" aria-labelledby="modal-add-category" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> <?php echo lang('category'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="<?php echo base_url('productmanage/savecategory'); ?>" id="form-category" class="form-horizontal">
                <input type="hidden" name="form" class="d-none" value="product" />
                <div class="modal-body wrapper-form-category">
                    <div class="form-group">
                        <label class="form-control-label" for="category"><?php echo lang('category'); ?> <span class="required">*</span></label>
                        <input type="text" id="category" name="category" class="form-control" placeholder="<?php echo lang('category'); ?>" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('back'); ?></button>
                    <button type="submit" class="btn btn-default"><?php echo lang('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
