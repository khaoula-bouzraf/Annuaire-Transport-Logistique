<ol class="breadcrumb bc-3">
    <li class = "active">
        <a href="#">
            <i class="entypo-folder"></i>
            <?php echo get_phrase('dashboard'); ?>
        </a>
    </li>
    <li><a href="<?php echo site_url('admin/categories'); ?>"><?php echo get_phrase('categories'); ?></a> </li>
    <li><a href="#" class="active"><?php echo get_phrase('add_category'); ?></a> </li>
</ol>
<h2><i class="fa fa-arrow-circle-o-right"></i> <?php echo $page_title; ?></h2>
<br />
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('category_add_form'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/categories/add'); ?>" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
                    <div class="col-md-7">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <?php echo get_phrase('basic_information'); ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-group">
                                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('category_title'); ?></label>
                                        <div class="col-sm-5">
                                            <input type="text" name = "name" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('parent'); ?></label>
                                       <div class="col-sm-5">
                                           <select class="form-control selectboxit" id="parent" name="parent"required>
                                               <?php foreach ($categories as $category): ?>
                                                   <?php if ($category['parent'] == 0): ?>
                                                       <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                                   <?php endif; ?>
                                               <?php endforeach; ?>
                                           </select>
                                       </div>
                                   </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-5">
                                            <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('add_category'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="panel panel-primary" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <?php echo get_phrase('thumbnail'); ?>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="form-group" style="text-align: center;">
                                    <label class="form-label"><?php echo get_phrase('category_thumbnail');?></label>

                                    <div class="controls">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?php echo base_url('uploads/thumbnails/thumbnail.png');?>" alt="..." required>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                                    <input type="file" name="category_thumbnail" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
