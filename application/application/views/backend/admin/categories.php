<div class="row ">
  <div class="col-lg-12">
    <a href="<?php echo site_url('admin/category_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_category'); ?></a>
  </div><!-- end col-->
</div>
<div class="gallery-env">
  <div class="row">
    <?php foreach ($categories as $category):
      if($category['parent'] > 0)
      continue;
      $this->db->order_by('name', 'asc');
      $sub_categories = $this->crud_model->get_sub_categories($category['id'])->result_array(); ?>
      <div class="col-sm-4 on-hover-action" id = "<?php echo $category['id']; ?>">
        <article class="album">
          <header>
            <a href="javascript:void(0)">
              <img src="<?php echo base_url('uploads/category_thumbnails/'.$category['thumbnail']); ?>" />
            </a>
          </header>

          <section class="album-info">
            <h3><a href="javascript::"><i class="<?php echo $category['icon_class']; ?>"></i> <?php echo $category['name']; ?></a></h3>
            <p><?php echo count($sub_categories).' '.get_phrase('sub_categories'); ?></p>
          </section>

          <?php foreach ($sub_categories as $sub_category): ?>
            <footer class="on-hover-action" id = "<?php echo $sub_category['id']; ?>">
              <div class="album-images-count">
                <i class="<?php echo $sub_category['icon_class']; ?>"></i> <?php echo $sub_category['name']; ?>
              </div>

              <div class="album-options" id = "subcategory-action-btn-<?php echo $sub_category['id']; ?>" style="display: none;">
                <a href="<?php echo site_url('admin/category_form/edit/'.$sub_category['id']); ?>">
                  <i class="entypo-cog"></i>
                </a>

                <a href="#" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$sub_category['id']); ?>');">
                  <i class="entypo-trash"></i>
                </a>
              </div>
            </footer>
          <?php endforeach; ?>
          <div class="category-actions">
            <a href = "<?php echo site_url('admin/category_form/edit/'.$category['id']); ?>" class="btn btn-info" id = "category-edit-btn-<?php echo $category['id']; ?>" style="display: none; margin-right:5px;">
  						<?php echo get_phrase('edit'); ?>
  					</a>

            <a href = "javascript::" class="btn btn-red" id = "category-delete-btn-<?php echo $category['id']; ?>" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$category['id']); ?>')" style="margin-right:5px; float: right; display: none;">
  						<?php echo get_phrase('delete'); ?>
  					</a>
          </div>
        </article>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script type="text/javascript">
$('.on-hover-action').mouseenter(function() {
  var id = this.id;
  $('#category-delete-btn-'+id).show();
  $('#category-edit-btn-'+id).show();
  $('#subcategory-action-btn-'+id).show();
});
$('.on-hover-action').mouseleave(function() {
  var id = this.id;
  $('#category-delete-btn-'+id).hide();
  $('#category-edit-btn-'+id).hide();
  $('#subcategory-action-btn-'+id).hide();
});
</script>
