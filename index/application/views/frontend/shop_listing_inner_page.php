<?php $products = $this->db->get_where('product_details', array('listing_id' => $listing_details['id']))->result_array(); ?>
<h5><?php echo get_phrase('featured_products'); ?></h5>
<div class="row">
  <?php foreach ($products as $product): ?>
    <div class="col-lg-6 col-md-12">
      <ul class="menu_list">
        <li>
          <div class="thumb">
            <img src="<?php echo base_url('uploads/product_images/'.$product['photo']); ?>" alt="" style="height: 88px; width: 88px;">
          </div>
          <h6><?php echo $product['name']; ?> <span><?php echo currency($product['price']); ?> </span></h6>
          <p>
            <?php echo str_replace(',', ' / ', $product['variant']); ?>
          </p>
        </li>
      </ul>
    </div>
  <?php endforeach; ?>
</div>
