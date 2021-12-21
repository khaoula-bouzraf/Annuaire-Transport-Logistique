<!-- Single Item of popular category starts -->
<?php
$categories = $this->db->get_where('category', array('parent' => 0))->result_array();
foreach ($categories as $key => $category):?>
<div class="col-lg-4 col-md-6">
	<a href="<?php echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>" class="grid_item">
		<figure>
			<img src="<?php echo base_url('uploads/category_thumbnails/').$category['thumbnail'];?>" alt="">
			<div class="info">
				<small><?php echo count($this->frontend_model->get_category_wise_listings($category['id'])).' '.get_phrase('listings'); ?></small>
				<h3><?php echo $category['name']; ?></h3>
			</div>
		</figure>
	</a>
</div>
<?php endforeach; ?>
<!-- Single Item of popular category ends -->