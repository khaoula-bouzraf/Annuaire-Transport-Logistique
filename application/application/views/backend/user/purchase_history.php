<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
      <div class="panel-title">
        <?php echo get_phrase('purchased_packages'); ?>
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-bordered datatable">
      	<thead>
      		<tr>
      			<th width="80"><div>#</div></th>
      			<th><div><?php echo get_phrase('package_name');?></div></th>
      			<th><div><?php echo get_phrase('purchase_date');?></div></th>
      			<th><div><?php echo get_phrase('expired_date');?></div></th>
      			<th><div><?php echo get_phrase('amount_paid');?></div></th>
      			<th><div><?php echo get_phrase('payment_method');?></div></th>
      			<th><div><?php echo get_phrase('action');?></div></th>
      		</tr>
      	</thead>
      	<tbody>
          <?php foreach ($purchase_histories as $key => $purchase_history): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td>
                <?php echo $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row('name'); ?>
                <?php
                $active_package = has_package($this->session->userdata('user_id'), true);
                if ($active_package['id'] == $purchase_history['id']): ?>
                  <br> <small><span class="badge badge-success "><?php echo get_phrase('currently_active'); ?></span></small>
                <?php endif; ?>
              </td>
              <td><?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?></td>
              <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
              <td><?php echo currency($purchase_history['amount_paid']); ?></td>
              <td><?php echo ucfirst($purchase_history['payment_method']); ?></td>
              <td class="text-center"> <a href="<?php echo site_url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-primary"><i class="entypo-print"></i> <?php echo get_phrase('print_invoice'); ?></a> </td>
            </tr>
          <?php endforeach; ?>
      	</tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>
