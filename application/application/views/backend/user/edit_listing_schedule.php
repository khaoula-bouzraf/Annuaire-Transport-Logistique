<?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>

<div class="col-sm-offset-1 col-sm-10">
  <div class="form-group">
    <?php foreach($days as $day):
      $interval_array = explode('-', $time_configuration_details[$day]); ?>
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-6">
            <label><?php echo get_phrase($day.'_opening'); ?></label>
            <select class="form-control selectboxit" data-toggle="" name="<?php echo $day.'_opening'; ?>" id="<?php echo $day.'_opening'; ?>">
              <?php for($i = 0; $i <= 24; $i++): ?>
                <?php if ($i < 24): ?>
                  <option value="<?php echo $i; ?>" <?php if($interval_array[0] == $i): ?> selected <?php endif; ?>> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                <?php else: ?>
                  <option value="closed" <?php if($interval_array[0] == 'closed'): ?> selected <?php endif; ?> ><?php echo get_phrase('closed'); ?></option>
                <?php endif; ?>
              <?php endfor; ?>
            </select>
        </div>
        <div class="col-lg-6">
            <label><?php echo get_phrase($day.'_closing'); ?></label>
            <select class="form-control selectboxit" data-toggle="" name="<?php echo $day.'_closing'; ?>" id="<?php echo $day.'_closing'; ?>">
                <?php for($i = 0; $i <= 24; $i++): ?>
                  <?php if ($i < 24): ?>
                    <option value="<?php echo $i; ?>" <?php if($interval_array[1] == $i): ?> selected <?php endif; ?>><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                  <?php else: ?>
                    <option value="closed" <?php if($interval_array[1] == 'closed'): ?> selected <?php endif; ?> ><?php echo get_phrase('closed'); ?></option>
                  <?php endif; ?>
                <?php endfor; ?>
            </select>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
