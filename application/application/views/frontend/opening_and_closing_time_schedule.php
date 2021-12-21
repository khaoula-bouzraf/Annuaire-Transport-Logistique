
<div class="opening">
  <div class="ribbon">
    <span class="<?php echo strtolower(now_open($listing_id)) == 'closed' ? 'closed' : 'open'; ?>"><?php echo now_open($listing_id); ?></span>
  </div>
  <i class="icon_clock_alt"></i>
  <h4><?php echo get_phrase('opening_hours'); ?></h4>
  <?php $time_config = $this->db->get_where('time_configuration', array('listing_id' => $listing_id))->row_array(); ?>
  <div class="row">
    <div class="col-md-6">
      <ul>
        <li>
          <?php echo get_phrase('saturday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['saturday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          <?php echo get_phrase('sunday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['sunday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          <?php echo get_phrase('monday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['monday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          <?php echo get_phrase('tuesday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['tuesday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul>
        <li>
          <?php echo get_phrase('wednesday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['wednesday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          <?php echo get_phrase('thursday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['thursday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
        <li>
          <?php echo get_phrase('friday'); ?>
          <span>
            <?php
             $time_interval = explode('-', $time_config['friday']);
             if ($time_interval[0] == 'closed' || $time_interval[1] == 'closed') {
               echo get_phrase('closed');
             }else {
              echo date('h a', strtotime("$time_interval[0]:00:00")).' - '.date('h a', strtotime("$time_interval[1]:00:00"));
             }
            ?>
          </span>
        </li>
      </ul>
    </div>
  </div>
</div>
