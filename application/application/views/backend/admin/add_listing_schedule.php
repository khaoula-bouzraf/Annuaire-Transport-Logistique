<?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>

<div class="col-sm-offset-1 col-sm-10">
  <div class="form-group">
    <?php foreach($days as $day): ?>
      <div class="row" style="margin-bottom: 15px;">
        <div class="col-lg-6">
          <label><?php echo get_phrase($day.'_opening'); ?></label>
          <select class="form-control selectboxit" name="<?php echo $day.'_opening'; ?>" id="<?php echo $day.'_opening'; ?>">
            <option value="closed"><?php echo get_phrase('closed'); ?></option>
            <?php for($i = 0; $i < 24; $i++): ?>
              <option value="<?php echo $i; ?>"> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
            <?php endfor; ?>
          </select>
        </div>
        <div class="col-lg-6">
          <label><?php echo get_phrase($day.'_closing'); ?></label>
          <select class="form-control selectboxit" name="<?php echo $day.'_closing'; ?>" id="<?php echo $day.'_closing'; ?>">
            <option value="closed"><?php echo get_phrase('closed'); ?></option>
            <?php for($i = 0; $i < 24; $i++): ?>
              <option value="<?php echo $i; ?>"><?php echo date('h a', strtotime("$i:00:00")) ?></option>
            <?php endfor; ?>
          </select>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
