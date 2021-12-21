<?php
    $edit_data = $this->db->get_where('review_wise_quality', array('id' => $id))->row_array();
?>
<div class="row">
	<div class="col-lg-10">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_form'); ?>
				</div>
			</div>
			<div class="panel-body">
                <form action="<?php echo site_url('admin/rating_wise_quality/edit/'.$id); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                	<div class="form-group">
                		<label for="rating_from" class="col-sm-3 control-label"><?php echo get_phrase('rating_from'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="rating_from" id="rating_from" placeholder="<?php echo get_phrase('rating_from'); ?>" value="<?php echo $edit_data['rating_from']; ?>" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="rating_to" class="col-sm-3 control-label"><?php echo get_phrase('rating_to'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="rating_to" id="rating_to" placeholder="<?php echo get_phrase('rating_to'); ?>" value="<?php echo $edit_data['rating_to']; ?>" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="quality" class="col-sm-3 control-label"><?php echo get_phrase('quality'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="quality" id="quality" placeholder="<?php echo get_phrase('quality'); ?>" value="<?php echo $edit_data['quality']; ?>" required>
                		</div>
                	</div>



                	<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                		<button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
                	</div>
                </form>
			</div>
		</div>
	</div><!-- end col-->
</div>
