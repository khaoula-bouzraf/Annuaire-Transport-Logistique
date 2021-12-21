<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('sub_categories'); ?>
                  <a href="<?php echo site_url('admin/category_form/add'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_category'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <h4 class="mb-3 header-title"><?php echo get_phrase('sub_categories'); ?></h4>
              <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th><?php echo get_phrase('thumbnail'); ?></th>
                    <th><?php echo get_phrase('title'); ?></th>
                    <th><?php echo get_phrase('sub_category_of'); ?></th>
                    <th><?php echo get_phrase('icon'); ?></th>
                    <th><?php echo get_phrase('option'); ?></th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                     $counter = 0;
                     foreach ($sub_categories as $sub_category):
                         if($sub_category['parent'] == 0)
                          continue;
                      ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td class="text-center"><img class="rounded-circle img-thumbnail" src="<?php echo base_url('uploads/category_thumbnails/'.$sub_category['thumbnail']); ?>" alt="" height="auto" width="50px;"></td>
                            <td><?php echo $sub_category['name']; ?></td>
                            <td>
                                <?php
                                  if ($sub_category['parent'] > 0) {
                                      $parent_category = $this->crud_model->get_categories($sub_category['parent'])->row_array();
                                      echo $parent_category['name'];
                                  }else {
                                      echo '-';
                                  }
                                ?>
                            </td>
                            <td class="text-center">
                                <i class="<?php echo $sub_category['icon_class']; ?>"></i>
                            </td>

                            <td style="text-align: center;">
                                <a href = "<?php echo site_url('admin/category_form/edit/'.$sub_category['id']); ?>" class="btn btn-icon btn-outline-info btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('edit'); ?>">
                                    <i class="mdi mdi-wrench"></i>
                                </a>
                                <button type="button" class="btn btn-icon btn-outline-danger btn-rounded btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('delete'); ?>" onclick="confirm_modal('<?php echo site_url('admin/categories/delete/'.$sub_category['id']); ?>');">
                                    <i class="dripicons-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
