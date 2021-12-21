<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo site_url('admin/addon_manager'); ?>" class="btn btn-primary alignToTitle"> <i class="fa fa-arrow-left"> </i> <?php echo get_phrase('back_to_addon_list'); ?></a>
    </div><!-- end col-->
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('add_new_addon'); ?>
				</div>
			</div>
			<div class="panel-body">
				<form action="<?php echo site_url('admin/install_addon'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="addon"><?php echo get_phrase('upload_addon_file'); ?></label>
						<input type="file" class="form-control" name="addon_zip" id="addon" required>
					</div>
					<div class="form-group text-right" style="margin-top: 40px;">
						<button type="submit" class="btn btn-success"><?php echo get_phrase('add_addon'); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>