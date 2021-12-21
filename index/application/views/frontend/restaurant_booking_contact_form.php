<div class="price">
	<h5 class="d-inline"><?php echo get_phrase('book_a_table'); ?></h5>
	<div class="score"><span><?php echo isset($quality['quality']) ? $quality['quality'] : get_phrase('unreviewed'); ?><em><?php echo count($reviews).' '.get_phrase('reviews'); ?></em></span><strong><?php echo $rating; ?></strong></div>
</div>

<div class="form-group" id="input-dates">
	<input class="form-control date-picker" type="text" name="dates" placeholder="<?php echo get_phrase('when'); ?>.." required>
	<i class="icon_calendar"></i>
</div>

<div class="panel-dropdown">
	<a href="#"><?php echo get_phrase('guests'); ?> <span class="qtyTotal">1</span></a>
	<div class="panel-dropdown-content right">
		<div class="qtyButtons">
			<label><?php echo get_phrase('adults'); ?></label>
			<input type="text" name="qtyInput" id = "adult_guests" value="1">
		</div>
		<input type="hidden" name="adult_guests_for_booking" id = 'adult_guests_for_booking' value="0">
		<div class="qtyButtons">
			<label><?php echo get_phrase('childrens'); ?></label>
			<input type="text" name="qtyInput" id ="child_guests" value="0">
		</div>
		<input type="hidden" name="child_guests_for_booking" id = "child_guests_for_booking" value="0">
	</div>
</div>

<div class="form-group clearfix">
	<div class="custom-select-form">
		<select class="wide" name="time" required>
			<option value=""><?php echo get_phrase('time'); ?></option>
			<option value="lunch"><?php echo get_phrase('lunch'); ?></option>
			<option value="dinner"><?php echo get_phrase('dinner'); ?></option>
		</select>
	</div>
</div>
