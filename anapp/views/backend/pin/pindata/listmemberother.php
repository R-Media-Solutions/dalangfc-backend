<?php $member_other_id = an_encrypt($member_other->id); ?>
       
<div class="row mb-3">
    <div class="col-md-6">
        <h4><?php echo lang('agent'); ?> : 
            <a href="<?php echo base_url('profile/' . $member_other_id); ?>" class="text-primary">
                <strong><?php echo $member_other->name . ' ('. $member_other->username .')'; ?></strong>
            </a>
        </h4>
    </div>
    <div class="col-md-6 text-right">                 
        <a href="<?php echo base_url('productdatalists'); ?>" class="btn btn-sm btn-outline-warning"><i class="fa fa-step-backward"></i> <?php echo lang('back'); ?></a>
    </div>
</div>  

<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card bg-gradient-default">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo lang('pin_total'); ?></h5>
                        <span class="h2 font-weight-bold mb-0 text-white"><?php echo an_accounting($pin_total); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                            <i class="ni ni-folder-17"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="col-xl-4 col-md-6">
        <div class="card bg-gradient-info">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo lang('pin_active'); ?></h5>
                        <span class="h2 font-weight-bold mb-0 text-white"><?php echo an_accounting($pin_active); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                            <i class="ni ni-tag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-gradient-danger">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0 text-white"><?php echo lang('pin_used'); ?></h5>
                        <span class="h2 font-weight-bold mb-0 text-white"><?php echo an_accounting($pin_used); ?></span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                            <i class="ni ni-curved-next"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</div>

<div class="table-container">
    <div class="table-actions-wrapper table-group-actions text-right">
        <button class="btn btn-sm btn-info text-white table-export-excel">
            <i class="fa fa-share-square"></i> <span class="hidden-480">Export ke Excel</span>
        </button>
    </div>
    <table class="table align-items-center table-flush" id="list_table_pin_member" data-url="<?php echo base_url('pin/pinmemberlistdata/'.$member_other_id); ?>">
        <thead class="thead-light">
            <tr role="row" class="heading">
                <th scope="col" style="width: 10px">#</th>
                <th scope="col" class="text-center">ID <?php echo lang('product'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('sender'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('product'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('status'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('date'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('transfer_date'); ?></th>
                <th scope="col" class="text-center"><?php echo lang('actions'); ?></th>
            </tr>
            <tr role="row" class="filter" style="background-color: #f6f9fc">
                <td></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm form-filter" name="search_id_pin" /></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm form-filter" name="search_sender" /></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm form-filter" name="search_product" /></td>
                <td class="px-1">
                    <select name="search_status" class="form-control form-control-sm form-filter">
                        <option value="">Select...</option>
                        <option value="active">ACTIVE</option>
                        <option value="used">USED</option>
                    </select>
                </td>
                <td class="px-1">
                    <div class="input-group input-group-sm date date-picker mb-1" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-control-sm form-filter" readonly name="search_datecreated_min" placeholder="From" />
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                        </span>
                    </div>
                    <div class="input-group input-group-sm date date-picker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-control-sm form-filter" readonly name="search_datecreated_max" placeholder="To" />
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                        </span>
                    </div>
                </td>
                <td class="px-1">
                    <div class="input-group input-group-sm date date-picker mb-1" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-control-sm form-filter" readonly name="search_datetransfer_min" placeholder="From" />
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                        </span>
                    </div>
                    <div class="input-group input-group-sm date date-picker" data-date-format="yyyy-mm-dd">
                        <input type="text" class="form-control form-control-sm form-filter" readonly name="search_datetransfer_max" placeholder="To" />
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-white btn-flat" type="button"><i class="ni ni-calendar-grid-58 text-primary"></i></button>
                        </span>
                    </div>
                </td>
                <td style="text-align: center;">
                    <button class="btn btn-block btn-sm btn-outline-default btn-tooltip filter-submit" id="btn_list_table_pin_member" title="Search"><i class="fa fa-search"></i></button>
                    <button class="btn btn-block btn-sm btn-outline-warning btn-tooltip filter-cancel" title="Reset"><i class="fa fa-times"></i></button>
                </td>
            </tr>
        </thead>
        <tbody class="list">
            <!-- Data Will Be Placed Here -->
        </tbody>
    </table>
</div>