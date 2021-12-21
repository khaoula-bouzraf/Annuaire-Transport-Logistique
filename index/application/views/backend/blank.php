<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase(''); ?>
				</div>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div><!-- end col-->
</div>

<form action="<?php echo site_url('admin/cities/add'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
	<div class="form-group">
		<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('city_name'); ?></label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('city_name'); ?>" required>
		</div>
	</div>

	<div class="form-group">
		<label for="country_id" class="col-sm-3 control-label"><?php echo get_phrase('country'); ?></label>

		<div class="col-sm-7">
			<select name="country_id" id = "country_id" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_country'); ?>">
				<option value="0"><?php echo get_phrase('none'); ?></option>
				<?php foreach ($countries as $country): ?>
					<option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>

	<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
		<button type="submit" class="btn btn-info"><?php echo get_phrase('add_city'); ?></button>
	</div>
</form>

<table class="table table-bordered datatable">
	<thead>
		<tr>
			<th width="80"><div>#</div></th>
			<th><div><?php echo get_phrase('city_name');?></div></th>
			<th><div><?php echo get_phrase('country');?></div></th>
			<th><div><?php echo get_phrase('options');?></div></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter = 0;
		foreach ($cities as $city): ?>
		<tr>
			<td><?php echo ++$counter; ?></td>

			<td><?php echo $city['name']; ?></td>
			<td>
				<?php
				$country_details = $this->crud_model->get_countries($city['country_id'])->row_array();
				echo $country_details['name'];
				?>
			</td>
			<td style="text-align: center;">
				<a href="<?php echo site_url('admin/city_form/edit/'.$city['id']); ?>" class="btn btn-default btn-sm btn-icon icon-left">
					<i class="entypo-pencil"></i>
					<?php echo get_phrase('edit'); ?>
				</a>
				<a href="#" class="btn btn-danger btn-sm btn-icon icon-left" onclick="confirm_modal('<?php echo site_url('admin/cities/delete/'.$city['id']); ?>');">
					<i class="entypo-cancel"></i>
					<?php echo get_phrase('delete'); ?>
				</a>

			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
