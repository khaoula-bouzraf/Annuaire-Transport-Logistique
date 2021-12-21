<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('quality_list'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('rating_from');?></div></th>
              <th><div><?php echo get_phrase('rating_to');?></div></th>
              <th><div><?php echo get_phrase('quality');?></div></th>
              <th><div><?php echo get_phrase('options');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            foreach ($qualities as $quality): ?>
            <tr>
              <td><?php echo ++$counter; ?></td>

              <td><?php echo $quality['rating_from']; ?></td>
              <td><?php echo $quality['rating_to']; ?></td>
              <td><?php echo ucfirst($quality['quality']); ?></td>
              <td>
                <a href="<?php echo site_url('admin/rating_wise_quality_form/edit/'.$quality['id']); ?>" class="btn btn-info">
                  <i class="entypo-pencil"></i>
                  <?php echo get_phrase('edit'); ?>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>
