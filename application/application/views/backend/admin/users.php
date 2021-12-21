<div class="row ">
    <div class="col-lg-12">
        <a href="<?php echo site_url('admin/user_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_user'); ?></a>
    </div><!-- end col-->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('general_user_list'); ?>
				</div>
			</div>
			<div class="panel-body">
                <table class="table table-bordered datatable">
                	<thead>
                		<tr>
                			<th width="80"><div>#</div></th>
                			<th><div><?php echo get_phrase('photo');?></div></th>
                			<th><div><?php echo get_phrase('name');?></div></th>
                			<th><div><?php echo get_phrase('email');?></div></th>
                			<th><div><?php echo get_phrase('phone');?></div></th>
                			<th><div><?php echo get_phrase('solcial_links');?></div></th>
                			<th><div><?php echo get_phrase('option');?></div></th>
                		</tr>
                	</thead>
                	<tbody>
                        <?php
                         $counter = 0;
                         foreach ($users->result_array() as $user): ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>

                                <td class="text-center">
                                  <img class="rounded-circle" src="<?php echo $this->user_model->get_user_thumbnail($user['id']); ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%">
                                </td>
                                <td><?php echo $user['name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td class="text-center">
                                    <?php
                                      $social_links = json_decode($user['social'], true);
                                     ?>
                                     <a href="<?php echo $social_links['facebook']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-facebook'></i></a>
                                     <a href="<?php echo $social_links['twitter']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-twitter'></i></a>
                                     <a href="<?php echo $social_links['linkedin']; ?>" style="padding: 5px;" target="_blank"><i class = 'entypo-linkedin'></i></a>
                                </td>
                                <td>
                                    <div class="bs-example">
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                          <?php echo get_phrase('action'); ?> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-blue" role="menu">
                                            <li>
                                                <a href="<?php echo site_url('admin/user_form/edit/'.$user['id']); ?>" class="">
                                                    <i class="entypo-pencil"></i>
                                                    <?php echo get_phrase('edit'); ?>
                                                </a>
                                            </li>
                                          <li class="divider"></li>
                                          <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/users/delete/'.$user['id']); ?>');">
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
