<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo site_url('admin/add_addon'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_addon'); ?></a>
    </div><!-- end col-->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('addon_list'); ?>
				</div>
			</div>
			<div class="panel-body">
        <table class="table table-bordered datatable">
        	<thead>
        		<tr>
        			<th width="80"><div>#</div></th>
        			<th><div><?php echo get_phrase('name');?></div></th>
        			<th><div><?php echo get_phrase('version');?></div></th>
        			<th><div><?php echo get_phrase('status');?></div></th>
        			<th><div><?php echo get_phrase('option');?></div></th>
        		</tr>
        	</thead>
        	<tbody>
                <?php
                 $counter = 0;
                 foreach ($addons as $addon): ?>
                    <tr>
                        <td><?php echo ++$counter; ?></td>

                        <td><?php echo $addon['name']; ?></td>
                        <td><?php echo $addon['version']; ?></td>
                        <td>
                          <?php if($addon['status'] == 1): ?>
                            <i class="entypo-record" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('active'); ?>"></i>
                          <?php else: ?>
                            <i class="entypo-record" style="color: #b3b3b3; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('inactive'); ?>"></i>
                          <?php endif; ?>
                        </td>
                        <td>
                            <div class="bs-example">
                              <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                  <?php echo get_phrase('action'); ?> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-blue" role="menu">
                                    <li>
                                      <?php if($addon['status'] == 1): ?>
                                        <a href="<?php echo site_url('admin/addon_status/'.$addon['id'].'/inactive'); ?>" class="">
                                            <i class="entypo-record" style="color: #b3b3b3; font-size: 12px;"></i>
                                            <?php echo get_phrase('deactivate'); ?>
                                        </a>
                                      <?php else: ?>
                                        <a href="<?php echo site_url('admin/addon_status/'.$addon['id'].'/active'); ?>" class="">
                                          <i class="entypo-record" style="color: #4CAF50; font-size: 12px;"></i>
                                            <?php echo get_phrase('activate'); ?>
                                        </a>
                                      <?php endif; ?>
                                    </li>
                                  <li class="divider"></li>
                                  <li>
                                    <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/addon_delete/'.$addon['id']); ?>');">
                                        <i class="entypo-trash"></i>
                                        <?php echo get_phrase('delete'); ?>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
        	</tbody>
        </table>
			</div>
		</div>
	</div><!-- end col-->
</div>
