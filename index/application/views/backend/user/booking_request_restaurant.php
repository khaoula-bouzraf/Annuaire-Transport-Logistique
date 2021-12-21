<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('booking_request_for_restaurant'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('listing');?></div></th>
              <th><div><?php echo get_phrase('date');?></div></th>
              <th><div><?php echo get_phrase('additional_information');?></div></th>
              <th><div><?php echo get_phrase('status');?></div></th>
              <th width="200"><div><?php echo get_phrase('options');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php $this->db->order_by('id', 'DESC'); ?>
            <?php $bookings = $this->db->get_where('booking', array('user_id' => $this->session->userdata('user_id'), 'listing_type' => 'restaurant'))->result_array();
            $count = 1;
            foreach($bookings as $booking): ?>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo $this->db->get_where('listing', array('id' => $booking['listing_id']))->row('name'); ?></td>
              <td>
                <?php
                $listing_type = $this->db->get_where('listing', array('id' => $booking['listing_id']))->row('listing_type');
                if($listing_type == 'hotel'){
                  $booking_date = explode(' - ', $booking['booking_date']);
                  echo get_phrase('booking_date').' : <b>'.date('d M Y', $booking_date[0]).' - '.date('d M Y', $booking_date[1]).'</b>';
                }else{
                  echo get_phrase('booking_date').' : <b>'.date('d M Y', $booking['booking_date']).'</b>';
                }
                echo '<br>'.get_phrase('requesting_date').' : '.date('d M Y', $booking['created_at']);
                ?>
              </td>
              <td>
                <h5 class="mt-0 mb-1"><?php echo $this->db->get_where('user', array('id' => $booking['requester_id']))->row('name'); ?></h5>
                <?php
                $informations = json_decode($booking['additional_information']);
                foreach($informations as $key => $value){
                  ?>
                  <span><?php echo get_phrase($key); ?> : <?php echo $value; ?></span><br>
                  <?php
                }
                ?>
              </td>
              <td>
                <?php
                $listing_type = $this->db->get_where('listing', array('id' => $booking['listing_id']))->row('listing_type');
                if($listing_type == 'hotel'){
                  $booking_date = explode(' - ', $booking['booking_date']);
                  $expired_date = $booking_date[1];
                }else{
                  $expired_date = $booking['booking_date'];
                }
                if($expired_date >= strtotime(date('dMY'))){
                  if($booking['status'] == 0){ ?>
                    <span class="label label-warning"><?php echo get_phrase('pending'); ?></span>
                  <?php }else{ ?>
                    <span class="label label-success"><?php echo get_phrase('approved'); ?></span>
                  <?php }
                }else{ ?>
                  <span class="label label-danger"><?php echo get_phrase('expired'); ?></span>
                <?php } ?>
              </td>
              <td class="text-center">
                <?php
                if($listing_type == 'hotel'){
                  $booking_date = explode(' - ', $booking['booking_date']);
                  $expired_date = $booking_date[1];
                }else{
                  $expired_date = $booking['booking_date'];
                }
                if($expired_date >= strtotime(date('dMY'))){ ?>
                  <?php if($booking['status'] == 0){ ?>
                    <a href="<?php echo site_url('user/booking_request_restaurant/approved/'.$booking['id']); ?>" class="btn btn-default btn-sm btn-icon icon-left">
                      <i class="entypo-check"></i>
                      <?php echo get_phrase('approve'); ?>
                    </a>
                  <?php }else{ ?>
                    <a href="<?php echo site_url('user/booking_request_restaurant/pending/'.$booking['id']); ?>" class="btn btn-default btn-sm btn-icon icon-left">
                      <i class="entypo-check"></i>
                      <?php echo get_phrase('pending'); ?>
                    </a>
                  <?php } ?>
                <?php } ?>
                <a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('<?php echo site_url('user/booking_request_restaurant/delete/'.$booking['id']); ?>');">
                  <i class="entypo-cancel"></i>
                  <?php echo get_phrase('delete'); ?>
                </a>
              </td>
            </tr>
            <?php $count++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
