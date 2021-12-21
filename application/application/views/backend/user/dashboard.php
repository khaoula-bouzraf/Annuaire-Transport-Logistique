<div class="row">
  <div class="col-lg-6">
    <div class="row">
      <div class="col-sm-6">
        <div class="tile-title tile-primary">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              <?php
              $this->db->select_sum('amount_paid');
              $total_spent_amount = $this->db->get_where('package_purchased_history', array('user_id' => $this->session->userdata('user_id')))->row_array();
              echo currency($total_spent_amount['amount_paid']);?>
            </h3>
            <p>
              <?php echo get_phrase('total_amount_spent'); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-red">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              <?php
              $wishlisted_items = $this->crud_model->get_user_wise_wishlist();
              echo count($wishlisted_items);
              ?>
            </h3>
            <p>
              <?php echo get_phrase('number_of_wishlisted_items'); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-blue">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              <?php
              $active_listing = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id'), 'status' => 'active'))->result_array();
              echo count($active_listing);
              ?>
            </h3>
            <p>
                <?php echo get_phrase('number_of_active_listing'); ?>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="tile-title tile-aqua">
          <div class="icon">
            <i class="glyphicon glyphicon-leaf"></i>
          </div>
          <div class="title">
            <h3>
              <?php
              $pending_listing = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id'), 'status' => 'pending'))->result_array();
              echo count($pending_listing);
              ?>
            </h3>
            <p>
                <?php echo get_phrase('number_of_pending_listing'); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="row">
      <?php
      $currently_active_package = has_package($this->session->userdata('user_id'), true);
      if ($currently_active_package['package_id'] > 0):
        $package_details = $this->db->get_where('package', array('id' => $currently_active_package['package_id']))->row_array();?>
        <div class="col-sm-12">
          <div class="tile-progress tile-blue">
            <div class="tile-header">
              <span><?php echo get_phrase('currently_active_package_name'); ?> :</span>
              <h3><?php echo $package_details['name']; ?></h3>
            </div>
            <div class="tile-progressbar">
              <span data-fill="100%"></span>
            </div>
            <div class="tile-footer">
              <h4>
                <span><?php echo get_phrase('expiry_date').' : <b>'.date('D, d M Y', $currently_active_package['expired_date']).'</b>'; ?></span><br>
                <span><?php echo get_phrase('purchase_date').' : <b>'.date('D, d M Y', $currently_active_package['purchase_date']).'</b>'; ?></span><br><br>
                <span><a href="<?php echo site_url('user/packages'); ?>" class="btn btn-white"><?php echo get_phrase('more_info'); ?></a></span><br>
              </h4>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="col-sm-12">
          <div class="tile-progress tile-red">
            <div class="tile-header">
              <h3><?php echo get_phrase('no_package_is_currently_active'); ?></h3>
            </div>
            <div class="tile-progressbar">
              <span data-fill="100%"></span>
            </div>
            <div class="tile-footer">
              <h4>
                <span><a href="<?php echo site_url('user/packages'); ?>" class="btn btn-white btn-rounded"><?php echo get_phrase('buy_package'); ?></a></span><br>
              </h4>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
