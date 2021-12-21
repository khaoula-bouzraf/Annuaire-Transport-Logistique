<?php
	//$this->db->limit($limitation);
	$categories = $this->db->get_where('category', array('parent' => 0))->result_array();
	foreach ($categories as $key => $category):?>
	<li><a href="<?php echo site_url('home/filter_listings?category='.slugify($category['name']).'&&amenity=&&video=0&&status=all'); ?>"><?php echo $category['name']; ?></a></li>
	<?php $last_id = $category['id']; ?>
<?php endforeach; ?>