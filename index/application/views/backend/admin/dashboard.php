<?php
$number_of_active_listing = 0;
$number_of_pending_listing = 0;
$listings = $this->db->get('listing')->result_array();
foreach ($listings as $key => $listing) {
    if(!has_package($listing['user_id']) > 0)
    continue;
    if ($listing['status'] == 'active') {
        $number_of_active_listing++;
    }
    if ($listing['status'] != 'active') {
        $number_of_pending_listing++;
    }
}

// Package expiration in this month
$current_date_time = strtotime(date('d-m-Y 00:00:00'));
$first_day_this_month = strtotime(date('01-m-Y').' 00:00:00'); // hard-coded '01' for first day
$last_day_this_month  = strtotime(date('t-m-Y').' 00:00:00');
$this->db->where('expired_date >=' , $first_day_this_month);
$this->db->where('expired_date <=' , $last_day_this_month);
$expiration_in_this_month = $this->db->get('package_purchased_history')->result_array();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    <?php echo get_phrase('income_overview_this_year').' ('.currency_code_and_symbol('code').')'; ?>
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="chartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="fa fa-calendar"></i>
                    <?php echo get_phrase('listing_overview'); ?>
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body">
                        <div id="pieChartdiv"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title"><?php echo get_phrase('package_expiration').' : '.date('F'); ?></div>
			</div>

			<table class="table table-bordered table-responsive">
				<tbody>
                    <?php foreach ($expiration_in_this_month as $key => $row):
                        $user_details = $this->user_model->get_all_users($row['user_id'])->row_array();
                        $package_details = $this->crud_model->get_packages($row['package_id'])->row_array();
                    ?>
                        <tr>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $package_details['name']; ?></a></h5>
                                <span class="text-muted font-13"><?php echo get_phrase('package_name'); ?></span>
                            </td>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $user_details['name']; ?></a></h5>
                                <small><?php echo get_phrase('email'); ?>: <span class="text-muted font-13"><?php echo $user_details['email']; ?></span></small>
                            </td>
                            <td>
                                <span class="text-muted font-13"><?php echo get_phrase('expires_in'); ?></span> <br/>
                                <?php if ($current_date_time > $row['expired_date']): ?>
                                    <span class="badge badge-danger-lighten"><?php echo date('D, d-M-Y', $row['expired_date']); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-warning-lighten"><?php echo date('D, d-M-Y', $row['expired_date']); ?></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body" style="cursor: auto;"><?php echo $this->db->get_where('listing', array('user_id' => $row['user_id'], 'status' => 'active'))->num_rows(); ?></a></h5>
                                <small><span class="text-muted font-13"><?php echo get_phrase('total_number_of_listing'); ?></span></small>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (sizeof($expiration_in_this_month) == 0): ?>
                        <tr>
                            <td colspan="4">
                                <h5 class="font-14 my-1"><?php echo get_phrase('no_package_found'); ?></h5>
                            </td>
                        </tr>
                    <?php endif; ?>
				</tbody>
			</table>
		</div>
    </div>
</div>
