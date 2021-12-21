<div class="" style="background-color: #f5f8fa;">
	<div class="container margin_80_55">
		<div class="main_title_2">
			<span><em></em></span>
			<h2><?php echo get_phrase('popular_categories'); ?></h2>
		</div>
		<div class="row justify-content-center">
			<?php
			$this->db->order_by('name', 'asc');
			$categories = $this->crud_model->get_categories()->result_array();
			foreach ($categories as $key => $category):
				if($category['parent'] > 0)
				continue; ?>
			<div class="col-md-4 mb-3">
				<div class="category-title">
					<a href="<?php echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>" style="color: unset;"><?php echo $category['name']; ?> <small style='font-size: 12px;'>(<?php echo count($this->frontend_model->get_category_wise_listings($category['id'])); ?>)</small></a>
				</div>
				<?php
				$this->db->order_by('name', 'asc');
				$sub_categories = $this->crud_model->get_sub_categories($category['id']);
				foreach ($sub_categories->result_array() as $key => $sub_category): ?>
					<a href="<?php echo site_url('home/filter_listings?category='.slugify($sub_category['name']).'&&amenity=&&video=0&&status=all'); ?>" class="sub-category-link">
						<div class="sub-category">
							<span class="sub-category-number"> <i class="<?php echo $sub_category['icon_class']; ?>"></i> </span>
							<span class="sub-category-title"> <?php echo $sub_category['name']; ?> (<?php echo count($this->frontend_model->get_category_wise_listings($sub_category['id'])); ?>)</span>
							<span class="sub-category-arrow"><i class="fa fa-arrow-right"></i></span>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</div>
