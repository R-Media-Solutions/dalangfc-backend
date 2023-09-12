<div class="header bg-secondary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-light">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard') ?>"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#"><?php echo lang('menu_home') ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo lang('menu_home_client'); ?></li>
                        </ol>
                    </nav>
                </div>
                <?php if ( $is_admin || $is_member ) { ?>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?php echo base_url('home/clientnew') ?>" class="btn btn-sm btn-outline-default"><i class="fa fa-plus mr-1"></i> <?php echo lang('menu_home_client_new'); ?></a>
                    </div>
                <?php } ?>
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
                            <h3 class="mb-0"><?php echo lang('menu_home_client') ?> </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="table-container">
                        <!--
                        <div class="table-actions-wrapper table-group-actions text-right">
                            <button class="btn btn-sm btn-info text-white table-export-excel">
                                <i class="fa fa-share-square"></i> <span class="hidden-480">Export ke Excel</span>
                            </button>
                        </div>
                        -->
                        <table class="table align-items-center table-flush" id="list_table_client" data-url="<?php echo base_url('home/clientlistsdata'); ?>">
                            <thead class="thead-light">
                                <tr role="row" class="heading">
                                    <th scope="col" style="width: 10px">#</th>
                                    <th scope="col" class="text-center"><?php echo lang('client_name'); ?></th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center"><?php echo lang('update_date'); ?></th>
                                    <th scope="col" class="text-center"><?php echo lang('actions'); ?></th>
                                </tr>
                                <tr role="row" class="filter" style="background-color: #f6f9fc">
                                    <td></td>
                                    <td><input type="text" class="form-control form-control-sm form-filter" name="search_name" /></td>
                                    <td class="px-1">
                                        <select name="search_status" class="form-control form-control-sm form-filter">
                                            <option value=""><?php echo lang('select'); ?>...</option>
                                            <option value="active">Active</option>
                                            <option value="nonactive">Non-Active</option>
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
                                        <button class="btn btn-sm btn-block btn-outline-default btn-tooltip filter-submit" id="btn_list_table_client" title="Search"><i class="fa fa-search"></i></button>
                                        <button class="btn btn-sm btn-block btn-outline-warning btn-tooltip filter-cancel" title="Reset"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <!-- Data Will Be Placed Here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
