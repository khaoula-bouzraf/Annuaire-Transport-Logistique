<div class="row ">
    <div class="col-lg-12">
        <?php if (has_package() > 0): ?> <a href="<?php echo site_url('user/listing_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_directory'); ?></a> <?php endif; ?>
    </div><!-- end col-->
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('all_directories'); ?>
        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered datatable">
          <thead>
            <tr>
              <th width="80"><div>#</div></th>
              <th><div><?php echo get_phrase('title');?></div></th>
              <th><div><?php echo get_phrase('categories');?></div></th>
              <th><div><?php echo get_phrase('location');?></div></th>
              <th><div><?php echo get_phrase('status');?></div></th>
              <th><div><?php echo get_phrase('option');?></div></th>
            </tr>
          </thead>
          <tbody id = "listing_table">
            <?php
            $counter = 0;
            foreach ($listings as $listing):
              $user_details = $this->user_model->get_all_users($listing['user_id'])->row_array();?>
              <tr>
                <td>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="listings_id" value="<?php echo $listing['id']; ?>" class="custom-control-input checkMark" id="<?php echo $counter; ?>">
                      <label class="custom-control-label" for="<?php echo $counter; ?>">
                        <?php echo ++$counter; ?>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <strong>
                    <a href="<?php echo site_url('user/listing_form/edit/'.$listing['id']); ?>">
                      <?php echo $listing['name']; ?>
                      <?php if ($listing['is_featured'] == 1):?>
                        <i class="entypo-star" style="color: #FF5722; font-size: 11px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('featured'); ?>"></i>
                      <?php endif; ?>
                    </a>
                  </strong>
                  <br>
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
                  <span class="mr-2">
                    <?php if ($listing['status'] == 'pending'): ?>
                      <i class="entypo-record" style="color: #FFC107; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
                    <?php elseif ($listing['status'] == 'active'):?>
                      <i class="entypo-record" style="color: #4CAF50; font-size: 19px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase($listing['status']); ?>"></i>
                    <?php endif; ?>
                  </span>

                  <?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
                    <?php if($claiming_status == 1): ?>
                      <span class="claimed_icon" data-toggle="tooltip" title="<?php echo get_phrase('this_listing_is_verified'); ?>">
                        <img src="<?php echo base_url('assets/frontend/images/verified.png'); ?>" width="25" style="padding-bottom: 8px;" />
                      </span>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                  <div class="bs-example">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <?php echo get_phrase('action'); ?> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-blue" role="menu">
                        <li><a href="<?php echo get_listing_url($listing['id']); ?>"><?php echo get_phrase('view_in_website'); ?></a></li>
                        <li><a href="<?php echo site_url('user/listing_form/edit/'.$listing['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
                        <?php if(get_addon_details('fb_messenger') != 0): ?>
                          <li><a href="<?php echo site_url('addons/facebook_messenger/api_manager/'.$listing['id']); ?>"><?php echo get_phrase('facebook_chat_manager'); ?></a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('user/listings/delete/'.$listing['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <button class="btn btn-danger" id="delete_listings" style="display: none;"><?php echo get_phrase('delete_selected'); ?></button>
      </div>
    </div>
  </div><!-- end col-->
</div>
<script type="text/javascript">
function filterTable() {
    $('#preloader_gif').show();
    update_date_range();
    var status = $('#status_filter').val();
    var agent = $('#agent_filter').val();
    var date_range = $('#date_range').val();

    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('user/filter_listing_table'); ?>',
        data : {status : status, agent : agent, date_range : date_range},
        success : function(response){
            console.log(response);
            $('#listing_table').html(response);
            $('#preloader_gif').hide();
        }
    })
}

function update_date_range()
{
    var x = $("#selectedValue").html();
    $("#date_range").val(x);
}
</script>
<script>
//start multiple delete
$(document).ready(function() {
  $(".checkMark").click(function(){

    //for button hide and show
    var favorite = [];
    $.each($("input[name='listings_id']:checked"), function(){
      favorite.push($(this).val());
    });
    if(favorite != ''){
      $('#delete_listings').show();
      $('#delete_listings').animate({
        width: '200px'
      }, 300);

    }else{
      $('#delete_listings').animate({
        width: '130px'
      }, 300);
      $('#delete_listings').slideUp(80);
    }

    //for delete to database
    $('#delete_listings').click(function(){
      var vals = [];
      $(":checkbox").each(function() {
        if (this.checked)
        vals.push(this.value);
      });
      var listings_id = vals.toString();
      $.ajax({
        url: '<?php echo site_url('user/listings/listings_delete/'); ?>'+ listings_id,
        success: function(response){
          location.reload();
        }
      });
    });
  });
});
</script>
