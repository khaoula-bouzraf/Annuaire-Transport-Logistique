<?php
$counter = 0;
foreach ($listings as $listing):
$user_details = $this->user_model->get_all_users($listing['user_id'])->row_array();?>
<tr>
    <td><?php echo ++$counter; ?></td>
    <td>
        <strong><a href="<?php echo get_listing_url($listing['id']); ?>" target="_blank"><?php echo strlen($listing['name']) > 20 ? substr($listing['name'],0,20)."..." : $listing['name']; ?></a></strong><br>
        <small>
            <?php
            echo $user_details['name'].'<br/>'.date('D, d-M-Y', $listing['date_added']);
            ?>
        </small>
    </td>
    <td>
        <?php
        $categories = json_decode($listing['categories']);
        foreach ($categories as $category):
            $category_details = $this->crud_model->get_categories($category)->row_array();?>
            <span class="badge badge-secondary"><?php echo $category_details['name']; ?></span><br>
        <?php endforeach; ?>
    </td>
    <td>
        <?php
        $country_details = $this->crud_model->get_countries($listing['country_id'])->row_array();
        $city_details = $this->crud_model->get_cities($listing['city_id'])->row_array();
        echo $city_details['name'].', '.$country_details['name'];
        ?>
    </td>
    <td class="text-center">
        <?php if ($listing['status'] == 'pending'): ?>
            <i class="mdi mdi-circle" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
        <?php elseif ($listing['status'] == 'active'):?>
            <i class="mdi mdi-circle" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
        <?php endif; ?>
    </td>


    <td class="text-center">

        <!-- Single button -->
        <div class="dropright dropright">
            <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?php echo site_url('admin/listing_form/edit/'.$listing['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
                <?php if ($listing['status'] == 'pending'): ?>
                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_active/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_active'); ?></a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/make_pending/'.$listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_pending'); ?></a></li>
                <?php endif; ?>
                <li><a class="dropdown-item" href="<?php echo get_listing_url($listing['id']); ?>" target="_blank"><?php echo get_phrase('view_in_website'); ?></a></li>
                <li role="separator" class="divider"></li>
                <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/listings/delete/'.$listing['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
            </ul>
        </div>
    </td>
</tr>
<?php endforeach; ?>
