<?php
$user_details = $this->db->get_where('user', array('id' => $purchase_history['user_id']))->row_array();
$package_details = $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row_array();
?>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-body">
        <div class="invoice">

        	<div class="row">

        		<div class="col-sm-6 invoice-left">

        			<a href="#">
        				<img src="<?php echo base_url('assets/global/dark_logo.png'); ?>" height="30"/>
        			</a>

        		</div>

        		<div class="col-sm-6 invoice-right">

        				<h3><?php echo get_phrase('invoice'); ?></h3>
        				<span><b><?php echo get_phrase('printed_on'); ?></b> : <?php echo date('D, d/M/Y'); ?></span>
        		</div>

        	</div>


        	<hr class="margin" />


        	<div class="row">

        		<div class="col-sm-3 invoice-left">

        			<h4><?php echo get_phrase('billing_to'); ?></h4>
              <?php echo $user_details['name']; ?><br>
              <?php echo $user_details['address']; ?><br>
              <?php echo $user_details['phone']; ?><br>

        		</div>

        		<div class="col-sm-3 invoice-left">

        			<h4><?php echo get_phrase('billing_from'); ?></h4>
              <?php echo get_settings('website_title'); ?><br>
              <?php echo get_settings('address'); ?><br>
              <?php echo get_settings('phone'); ?><br>
        		</div>

        		<div class="col-md-6 invoice-right">

        			<h4><?php echo get_phrase('payment_details'); ?>:</h4>
        			<strong><?php echo get_phrase('purchase_date'); ?>:</strong> <?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?>
        			<br />
        			<strong><?php echo get_phrase('purchase_status'); ?>:</strong> <span class="label label-success float-right"><?php echo get_phrase('paid'); ?></span>
        			<br />
        			<strong><?php echo get_phrase('order_id_no'); ?>:</strong> <span class="float-right"><?php echo sprintf('%07d', $purchase_history['id']); ?></span>

        		</div>

        	</div>

        	<div class="margin"></div>

        	<table class="table table-bordered">
        		<thead>
        			<tr>
                <th>#</th>
                <th><?php echo get_phrase('package_name'); ?></th>
                <th><?php echo get_phrase('expired_date'); ?></th>
                <th><?php echo get_phrase('cost'); ?></th>
                <th class="text-right"><?php echo get_phrase('total'); ?></th>
        			</tr>
        		</thead>

        		<tbody>
        			<tr>
                <td>1</td>
                <td>
                  <b><?php echo $package_details['name']; ?></b> <br/>
                </td>
                <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
                <td><?php echo currency($purchase_history['amount_paid']); ?></td>
                <td class="text-right"><?php echo currency($purchase_history['amount_paid']); ?></td>
        			</tr>
        		</tbody>
        	</table>

        	<div class="margin"></div>

        	<div class="row">

        		<div class="col-sm-6">

        		</div>

        		<div class="col-sm-6">

        			<div class="invoice-right">

        				<ul class="list-unstyled">
        					<li>
        						<?php echo get_phrase('sub_total_amount'); ?>:
        						<strong><?php echo currency($purchase_history['amount_paid']); ?></strong>
        					</li>
        					<li>
        						<?php echo get_phrase('grand_total'); ?>:
        						<strong><?php echo currency($purchase_history['amount_paid']); ?></strong>
        					</li>
        				</ul>

        				<br />

        				<a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
        					<?php echo get_phrase('print_invoice'); ?>
        					<i class="entypo-doc-text"></i>
        				</a>
        				&nbsp;
        			</div>

        		</div>

        	</div>

        </div>
      </div>
    </div>
  </div><!-- end col-->
</div>
