<?php
    $package_details = $this->crud_model->get_packages($package_id)->row_array();
?>
<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('update_package'); ?>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo site_url('admin/packages/edit/'.$package_id); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

					<div class="form-group">
						<label for="package_type" class="col-sm-3 control-label"><?php echo get_phrase('package_type'); ?></label>

						<div class="col-sm-7">
							<select name="package_type" id = "package_type" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('package_type'); ?>">
								<?php
										if($package_details['package_type'] == 0){
												$free = 'selected';
												$paid = null;
										}else{
												$free = null;
												$paid = 'selected';
										}
								?>
										<option value="0" id="free" <?php echo $free; ?>><?php echo get_phrase('free'); ?></option>
										<option value="1" id="paid" <?php echo $paid; ?>><?php echo get_phrase('paid'); ?></option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('package_name'); ?></label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('package_name'); ?>" value="<?php echo $package_details['name']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('price').'('.currency_code_and_symbol().')'; ?></label>

						<div class="col-sm-7">
							<input type="text" class="form-control" name="price" id="price" placeholder="<?php echo get_phrase('price'); ?>" value="<?php echo $package_details['price']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label" for = "validity"><?php echo get_phrase('validity_in_days'); ?></label>

						<div class="col-sm-7">
							<div class="input-group">
								<input type="number" class="form-control" name="validity" id="validity" placeholder="<?php echo get_phrase('validity_in_days'); ?>" aria-describedby="days-addon" min="1"  value="<?php echo $package_details['validity']; ?>" required>
								<span class="input-group-addon" id="days-addon"><?php echo get_phrase('days'); ?></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_listings" class="col-sm-3 control-label"><?php echo get_phrase('number_of_listings'); ?></label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_listings" id="number_of_listings" placeholder="<?php echo get_phrase('number_of_listings'); ?>" value="<?php echo $package_details['number_of_listings']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_categories" class="col-sm-3 control-label"><?php echo get_phrase('number_of_categories'); ?></label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_categories" id="number_of_categories" placeholder="<?php echo get_phrase('number_of_categories'); ?>" value="<?php echo $package_details['number_of_categories']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_tags" class="col-sm-3 control-label"><?php echo get_phrase('number_of_tags'); ?></label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_tags" id="number_of_tags" placeholder="<?php echo get_phrase('number_of_tags'); ?>" value="<?php echo $package_details['number_of_tags']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="number_of_photos" class="col-sm-3 control-label"><?php echo get_phrase('number_of_photos'); ?></label>
						<div class="col-sm-7">
							<input type="number" class="form-control" name="number_of_photos" id="number_of_photos" placeholder="<?php echo get_phrase('number_of_photos'); ?>" value="<?php echo $package_details['number_of_photos']; ?>" required>
						</div>
					</div>

					<div class="form-group">
						<label for="ability_to_add_video" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_video" value="1" name = "ability_to_add_video" <?php if($package_details['ability_to_add_video'] == 1) echo 'checked'; ?>>
			        <label for="ability_to_add_video"><?php echo get_phrase('ability_to_add_video'); ?></label>
						</div>
					</div>

					<div class="form-group">
						<label for="ability_to_add_contact_form" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="ability_to_add_contact_form" value="1" name = "ability_to_add_contact_form" <?php if($package_details['ability_to_add_contact_form'] == 1) echo 'checked'; ?>>
			        <label for="ability_to_add_contact_form"><?php echo get_phrase('ability_to_add_contact_form'); ?></label>
						</div>
					</div>

					<div class="form-group">
						<label for="is_recommended" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="is_recommended" value="1" name = "is_recommended" <?php if($package_details['is_recommended'] == 1) echo 'checked'; ?>>
			        <label for="is_recommended"><?php echo get_phrase('mark_this_package_as_recommended'); ?></label>
						</div>
					</div>

					<div class="form-group">
						<label for="featured" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
							<input tabindex="5" type="checkbox" class="icheck-2" id="featured" value="1" name = "featured" <?php if($package_details['featured'] == 1) echo 'checked'; ?>>
			        <label for="featured"><?php echo get_phrase('featured'); ?></label>
						</div>
					</div>

					<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
						<button type="submit" class="btn btn-info"><?php echo get_phrase('save'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div><!-- end col-->
</div>
<script type="text/javascript">

$(document).ready(function(){
	$("#package_type").change(function(){
		var amount = $('#package_type').val();
		if(amount == 0){
			$('#price').val(0);
			$('#price').prop('readonly', true);
		}else{
			$('#price').val();
			$('#price').prop('readonly', false);
		}
	});
});
</script>
