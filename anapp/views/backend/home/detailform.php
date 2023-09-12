<?php 
    $data_detail   = isset($data_detail) ? $data_detail : false; 
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
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('menu_home_edit') ?></a></li>
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
                                        <h5 class="text-muted mb-0"><?php echo $data_detail->name; ?> </h5>
                                    <?php } ?>
                                </div>
                                <div class="col-4 text-right">
                                    <?php if ( $form_page == 'edit' ) { ?>
                                        <a href="<?php echo base_url('home/new') ?>" class="btn btn-sm btn-danger"><span class="fa fa-history"></span> Kembali</a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url('home/new') ?>" class="btn btn-sm btn-outline-default"><span class="fa fa-list"></span> List Data Beranda</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body wrapper-form-homedetail pt-0">
                            <?php 
                                $form_action = base_url('home/savedetail');
                                if ( $form_page == 'edit' ) { 
                                    $form_action .= '/'. an_encrypt($data_detail->id);
                                }
                            ?>
                            <form role="form" method="post" action="<?php echo $form_action; ?>" id="form-homedetail" class="form-horizontal">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-xl-8 order-xl-2 pt-3">
                                            <input type="hidden" name="homedetail_slug" id="homedetail_slug" class="form-control" value="<?php echo( $data_detail ? $data_detail->slug : ''); ?>">
                                            <div class="form-group">
                                                <label class="form-control-label" for="homedetail_title"><?php echo lang('homedetail_title'); ?> <span class="required">*</span></label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                                    </div>
                                                    <input type="text" name="homedetail_title" id="homedetail_title" class="form-control" placeholder="<?php echo lang('homedetail_title'); ?>" value="<?php echo( $data_detail ? $data_detail->title : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="homedetail_short_name"><?php echo lang('homedetail_short_name'); ?> <span class="required">*</span></label>
                                                <div class="input-group input-group-merge input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-box-2"></i></span>
                                                    </div>
                                                    <input type="text" name="homedetail_short_name" id="homedetail_short_name" class="form-control" placeholder="<?php echo lang('homedetail_short_name'); ?>" value="<?php echo( $data_detail ? $data_detail->short_name : ''); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="editor-homedetail">Pesan</label>
                                                <div id="editor-homedetail" data-quill-placeholder="Pesan">
                                                    <?php echo ( $data_detail ? $data_detail->content : ''); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 order-xl-1 bg-secondary py-2">
                                            <div class="form-group">
                                                <?php 
                                                    $file_src   = ASSET_PATH . 'backend/img/no_image.jpg'; 
                                                    if ( $data_detail ) {
                                                        if ( $data_detail->image ) {
                                                            $file_path = PAGEHOME_IMG_PATH . $data_detail->image;
                                                            if ( file_exists($file_path) ) {
                                                                $file_src = PAGEHOME_IMG . $data_detail->image;
                                                            }
                                                        }
                                                    }

                                                ?>
                                                <div class="thumbnail mb-1">
                                                    <img class="img-thumbnail" id="homedetail_img_thumbnail" width="100%" src="<?php echo $file_src; ?>" style="cursor: pointer;">
                                                    <div class="caption">
                                                        <p class="text-muted mb-0" style="font-size: 14px">Image ( jpg, jpeg, png ) and Max 2 MB</p>
                                                        <div class="img-information" style="display: none;">
                                                            <i class="ni ni-album-2 mr-1" id="type_img_thumbnail"></i> 
                                                            <span id="size_img_thumbnail"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="file" name="homedetail_file" id="homedetail_file" class="form-control file-image" accept="image/x-png,image/jpeg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary bg-gradient-default my-2"><?php echo lang('homedetail_save'); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>