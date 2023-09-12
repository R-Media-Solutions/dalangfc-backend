<div class="header bg-white pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('menu_home') ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo lang('menu_home_list'); ?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"><?php echo lang('menu_home_list'); ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-container">
                        <table class="table align-items-center table-flush" id="home_detail_list" data-url="<?php echo base_url('home/detaillistdata'); ?>">
                            <thead class="thead-light">
                                <tr role="row" class="heading">
                                    <th class="width5 text-center">No</th>
                                    <th class="width55 text-center"><?php echo lang('name') ?></th>
                                    <th class="width55 text-center"><?php echo lang('short_name') ?></th>
                                    <!-- <th class="width15 text-center"><?php echo lang('type') ?></th> -->
                                    <th class="width15 text-center"><?php echo lang('status') ?></th>
                                    <th scope="col" class="text-center"><?php echo lang('update_date'); ?></th>
                                    <th class="width10 text-center"><?php echo lang('actions') ?></th>
                                </tr>
                                <tr role="row" class="filter">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm form-filter" name="search_name" /></td>
                                    <td><input type="text" class="form-control form-control-sm form-filter" name="search_short_name" /></td>
                                    <!--
                                    <td>
                                        <select name="search_type" class="form-control form-control-sm form-filter">
                                            <option value=""><?php echo lang('select'); ?>...</option>
                                            <option value="email">EMAIL</option>
                                            <option value="whatsapp">WHATSAPP</option>
                                        </select>
                                    </td>
                                    -->
                                    <td>
                                        <select name="search_status" class="form-control form-control-sm form-filter">
                                            <option value=""><?php echo lang('select'); ?>...</option>
                                            <option value="active">AKTIIF</option>
                                            <option value="notactive">TIDAK AKTIF</option>
                                        </select>
                                    </td>
                                    <td class="px-1">
                                        <div class="input-group input-group-sm date date-picker mb-1" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control form-control-sm form-filter" readonly name="search_dateupdated_min" placeholder="From" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                                            </span>
                                        </div>
                                        <div class="input-group input-group-sm date date-picker" data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control form-control-sm form-filter" readonly name="search_dateupdated_max" placeholder="To" />
                                            <span class="input-group-btn">
                                                <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                                            </span>
                                        </div>
                                    </td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-sm btn-outline-default btn-tooltip filter-submit" id="btn_homedetail_list" title="Search"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-sm btn-outline-warning btn-tooltip filter-cancel" title="Reset"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Form Detail -->
<div class="modal fade" id="modal-form-homedetail" tabindex="-1" role="dialog" aria-labelledby="modal-form-homedetail" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-envelope" id="homedetail_edit_icon"></i> <span id="homedetail_edit_title"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('home/updatehomedetail'); ?>" role="form" method="post" class="form-horizontal" id="form_homedetail_edit" >
                <input type="hidden" name="homedetail_id" id="homedetail_id" class="hide">
                <input type="hidden" name="homedetail_type" id="homedetail_type" class="hide">
                <div class="modal-body wrapper_homedetail_edit py-2">
                    <div class="form-group mb-2">
                        <label class="control-label">Title <span class="required">*</span></label>
                        <input type="text" name="homedetail_title" id="homedetail_title" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label class="control-label">Nama Pendek<span class="required">*</span></label>
                        <input type="text" name="homedetail_short_name" id="homedetail_short_name" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label class="control-label">Status <span class="required">*</span></label>
                        <select name="homedetail_status" id="homedetail_status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group mb-0 display-none" id="content_email">
                        <label class="control-label">Pesan <span class="required">*</span></label>
                        <textarea class="form-control ckeditor" id="homedetail_content_email" name="homedetail_content_email" rows="5" style="resize: vertical;"></textarea> 
                    </div>
                    <div class="form-group mb-0 display-none" id="content_plain">
                        <label class="control-label">Pesan <span class="required">*</span></label>
                        <textarea class="form-control" id="homedetail_content_plain" name="homedetail_content_plain" rows="5" style="resize: vertical; height: 300px; padding: 5px 10px; border: 1px solid #2b579a;"></textarea> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo lang('back'); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo lang('save'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="homedetail_view_modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    <span class="label label-primary pull-right" id="homedetail_view_color" style="margin-right: 8px">
                        <i class="fa fa-envelope" id="homedetail_view_icon"></i>
                        <span id="homedetail_view_type">Email</span>
                    </span>
                    <b><span id="homedetail_view_title"></span></b>
                </h4>
            </div>
            <div class="modal-body" style="background-color: #F5F5F5">
                <div id="homedetail_view_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>