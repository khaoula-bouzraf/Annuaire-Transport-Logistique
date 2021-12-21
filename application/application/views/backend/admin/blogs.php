<div class="row ">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/blog_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_post'); ?></a>
  </div><!-- end col-->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('post_list'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('title');?></div></th>
              <!-- <th><div><?php echo get_phrase('blog_text');?></div></th> -->
              <th><div><?php echo get_phrase('categories');?></div></th>
              <th><div><?php echo get_phrase('status');?></div></th>
              <th><div><?php echo get_phrase('options');?></div></th>
            </tr>
          </thead>
          <tbody>
            <?php $count = 0; ?>
            <?php foreach($blogs as $blog): ?>
            <?php $count++; ?>
              <tr>
                <td><?php echo $count; ?></td>
                <td><a href="<?php echo site_url('home/post/'.$blog['id'].'/'.slugify($blog['title'])); ?>" target="_blank"><?php echo $blog['title']; ?></a></td>
                <!-- <td class="text-center" style="max-width: 200px;">
                    <?php 
                      $string = strip_tags($blog['blog_text']);
                      if (strlen($string) > 100) {

                          // truncate string
                          $stringCut = substr($string, 0, 100);
                          $endPoint = strrpos($stringCut, ' ');

                          //if the string doesn't contain any space then it will cut without word basis.
                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                          $string .= '... <br><a class="text-success" href="javascript: void(0)" data-toggle="tooltip" title="'.$blog['blog_text'].'" data-placement="right">'.get_phrase('read_more').'</a>';
                      }
                      echo $string;
                    ?>
                </td> -->
                <td><?php echo $this->crud_model->get_categories($blog['category_id'])->row('name'); ?></td>
                <td class="text-center">
                  <?php if($blog['status'] == 1): ?>
                    <span class="label label-success"><?php echo get_phrase('active'); ?></span>
                  <?php else: ?>
                    <span class="label label-default"><?php echo get_phrase('inactive'); ?></span>
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
                          <?php if($blog['status'] == 1): ?>
                            <a href="<?php echo site_url('admin/blog_status/inactive/'.$blog['id']); ?>" class="">
                              <i class="entypo-check"></i>
                              <span><?php echo get_phrase('mark_as_inactive'); ?></span>
                            </a>
                          <?php else: ?>
                            <a href="<?php echo site_url('admin/blog_status/active/'.$blog['id']); ?>" class="">
                              <i class="entypo-check"></i>
                              <span><?php echo get_phrase('mark_as_active'); ?></span>
                            </a>
                          <?php endif; ?>
                        </li>
                        <li>
                          <a href="<?php echo site_url('admin/blog_form/edit/'.$blog['id']); ?>">
                            <i class="entypo-pencil"></i>
                            <?php echo get_phrase('edit'); ?>
                          </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                          <a href="#" onclick="confirm_modal('<?php echo site_url('admin/delete_blog/'.$blog['id']); ?>');">
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
  </div>
</div>

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>