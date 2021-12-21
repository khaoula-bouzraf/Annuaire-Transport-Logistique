<div class="container margin_80_55">
  <div class="step first">
    <h3><?php echo $inner_page_title; ?></h3>
    <ul class="nav nav-tabs" id="tab_checkout" role="tablist">
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'listing_add'):?> active show <?php endif; ?>" id="listing-add-tab" href="<?php echo site_url('home/profile/listing_add'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="true"><?php echo get_phrase('add_new_listing'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'manage_own_listing'):?> active show <?php endif; ?>" id="manage-listing-tab" data-toggle="" href="<?php echo site_url('home/profile/manage_own_listing'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="false"><?php echo get_phrase('manage_own_listing'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'purchase_package'):?> active show <?php endif; ?>" id="purchase-package-tab" data-toggle="" href="<?php echo site_url('home/profile/purchase_package'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="false"><?php echo get_phrase('purchase_package'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'package_purchased_history'):?> active show <?php endif; ?>" id="package-purchased-history-tab" data-toggle="" href="<?php echo site_url('home/profile/package_purchased_history'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="false"><?php echo get_phrase('package_purchased_history'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'wishlist'):?> active show <?php endif; ?>" id="wishlist-tab" data-toggle="" href="<?php echo site_url('home/profile/wishlist'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="false"><?php echo get_phrase('wishlist'); ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($inner_page == 'edit_profile'):?> active show <?php endif; ?>" id="edit-profile-tab" data-toggle="" href="<?php echo site_url('home/profile/edit_profile'); ?>" role="tab" aria-controls="listing-add-tab" aria-selected="false"><?php echo get_phrase('edit_profile'); ?></a>
      </li>
    </ul>
    <div class="tab-content checkout">
      <div class="tab-pane fade active show" id="" role="tabpanel" aria-labelledby="tab_1">

      </div>
    </div>
  </div>
</div>
