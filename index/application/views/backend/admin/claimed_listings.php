<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('claimed_listing'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('listing');?></div></th>
              <th><div><?php echo get_phrase('name');?></div></th>
              <th><div><?php echo get_phrase('phone');?></div></th>
              <th><div><?php echo get_phrase('additional_information');?></div></th>
              <th><div><?php echo get_phrase('status');?></div></th>
              <th><div><?php echo get_phrase('option');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            $this->db->order_by('id', 'DESC');
            $this->db->where('status', 0);
            $claimed_listings = $this->db->get_where('claimed_listing')->result_array();
            foreach ($claimed_listings as $claimed_listing): ?>
            <tr>
              <td><?php echo ++$counter; ?></td>
              <td>
                <a href="<?php echo get_listing_url($claimed_listing['listing_id']) ?>" target="blank">
                  <?php echo $this->db->get_where('listing', array('id' => $claimed_listing['listing_id']))->row('name'); ?>
                </a>
              </td>
              <td><?php echo $this->db->get_where('user', array('id' => $claimed_listing['user_id']))->row('name'); ?></td>
              <td><?php echo $claimed_listing['phone']; ?></td>
              <td>
                <?php echo get_phrase('full_name'); ?> : <?php echo $claimed_listing['full_name']; ?> <br>
                <?php echo $claimed_listing['additional_information']; ?>
              </td>
              <td>
                <?php if($claimed_listing['status'] == 1): ?>
                  <span class="label label-success"><?php echo get_phrase('approved'); ?></span>
                <?php endif; ?>

                <?php if($claimed_listing['status'] == 0): ?>
                  <span class="label label-warning"><?php echo get_phrase('pending'); ?></span>
                <?php endif; ?>
              </td>
              <td class="text-center">
                <div class="bs-example">
                  <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                      <?php echo get_phrase('action'); ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-blue" role="menu">
                      <li>
                        <a href="<?php echo site_url('admin/claimed_listings/approved/'.$claimed_listing['id'].'/'.$claimed_listing['listing_id']); ?>" class="">
                          <i class="entypo-check"></i>
                          <?php echo get_phrase('approve'); ?>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo site_url('admin/listing_form/edit/'.$claimed_listing['listing_id']); ?>" class="">
                          <i class="entypo-eye"></i>
                          <?php echo get_phrase('listing_editing_page'); ?>
                        </a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/claimed_listings/delete/'.$claimed_listing['id']); ?>');">
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
