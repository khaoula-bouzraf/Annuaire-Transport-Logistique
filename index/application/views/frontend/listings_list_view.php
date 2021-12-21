<?php
	$number_of_visible_categories = 10;
	$number_of_visible_amenities 	= 10;
	$number_of_visible_cities 		= 10;

	isset($category_ids) ? "" : $category_ids = array();
	isset($amenity_ids) ? "" 	: $amenity_ids = array();
	isset($city_id) ? "" 			: $city_id = 'all';
	isset($price_range) ? "" 			: $price_range = 0;
	isset($with_video) ? "" 	: $with_video = "";
	isset($with_open) ? "" 	: $with_open = "";
	isset($search_string) ? "": $search_string = "";
?>

<div class="container-fluid full-height">
	<div class="row row-height">
		<div class="col-lg-5 content-left order-md-last order-sm-last order-last">
			<div id="results_map_view">
			   	<div class="container-fluid">
				   	<div class="row">
					   	<div class="col-10">
						   	<h4><strong><?php echo count($listings); ?></strong> <?php echo get_phrase('result_for_all'); ?></h4>
					   </div>
					   <div class="col-2">
						   <a href="#0" class="search_mob btn_search_mobile map_view"></a> <!-- /open search panel -->

					   </div>
				   </div>
				   <!-- /row -->
					<div class="search_mob_wp">
						<div class="custom-search-input-2 map_view">
							<form action="<?php echo site_url('home/search'); ?>" method="GET">
								<div class="form-group">
									<input class="form-control" name="search_string" type="text" value="<?php echo $search_string; ?>" placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>...">
									<i class="icon_search"></i>
								</div>
								<select class="wide" name="selected_category_id">
									<option value=""><?php echo get_phrase('all_categories'); ?></option>
									<?php
									$categories = $this->crud_model->get_categories()->result_array();
									foreach ($categories as $category):?>
										<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
									<?php endforeach; ?>
								</select>
								<input type="submit" value="Search">
							</form>
						</div>
					</div>
					<!-- /search_mobile -->
			   </div>
			   <!-- /container -->
		   </div>
		   <!-- /results -->

			<div class="filters_listing version_3">
				<div class="container-fluid">
					<ul class="clearfix">
						<li class=" float-left mr-1">
							<div class="layout_view">
								<?php
									$active_listing_view = $this->session->userdata('listings_view');

									if($active_listing_view == 'list_view'){
										$color_list = 'text-success';
										$color_grid = null;
									}else{
										$color_grid = 'text-success';
										$color_list = null;
									}

								?>
								
								<a href="javascript::" id="list_view" onclick="toggleListingView('list_view')" class="<?php echo $color_list; ?>"><i class="icon-map mr-1"></i>map view</a>
							</div>
						</li>
						
						<li class=" float-left">
							<div class="layout_view">
								<?php
									$active_listing_view = $this->session->userdata('listings_view');

									if($active_listing_view == 'list_view'){
										$color_list = 'text-success';
										$color_grid = null;
									}else{
										$color_grid = 'text-success';
										$color_list = null;
									}

								?>
								
								<a href="javascript::" id="grid_view" onclick="toggleListingView('grid_view')" class="<?php echo $color_grid; ?>"><i class="icon-th mr-1"></i>grid view</a>
							</div>
						</li>

						<li><a class="btn_filt_map" data-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="filters" data-text-swap="Less filters" data-text-original="More filters"><?php echo get_phrase('more_filters'); ?></a></li>
					</ul>
				</div>
				<!-- /container -->
			</div>
			<!-- /filters -->

			<div class="collapse map_view" id="filters">
				<div class="container-fluid margin_30_5">
					<form class="filter-form" action="" method="get" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<h6><?php echo get_phrase('category'); ?></h6>
								<ul class="">
									<?php
									$counter = 0;
									$categories = $this->db->get('category')->result_array();
									foreach ($categories as $key => $category):
									if($category['parent'] > 0)
									continue;
									$counter++;
									?>
									
										<li class="<?php if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
											<label class="container_check"> <i class="<?php echo $category['icon_class']; ?>"></i> <?php echo $category['name']; ?> <small></small> <!-- Here will be the number of the total listing -->
												<input type="checkbox" name="category[]" class="categories" value="<?php echo $category['slug']; ?>" onclick="filter(this)" <?php if(in_array($category['id'], $category_ids)) echo 'checked'; ?>>
												<span class="checkmark"></span>
											</label>
										</li>

										<?php foreach ($this->crud_model->get_sub_categories($category['id'])->result_array() as $sub_category):
												$counter++;
											?>
											<li class="ml-3 <?php if($counter > $number_of_visible_categories) echo 'hidden-categories hidden'; ?>">
												<label class="container_check"> <?php echo $sub_category['name']; ?> <small></small> <!-- Here will be the number of the total listing -->
													<input type="checkbox" name="category[]" class="categories" value="<?php echo $sub_category['slug']; ?>" onclick="filter(this)" <?php if(in_array($sub_category['id'], $category_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										<?php endforeach; ?>
									
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "category-toggle-btn" onclick="showToggle(this, 'hidden-categories')"><?php echo count($categories) > $number_of_visible_categories ? get_phrase('show_more') : ""; ?></a>
							</div>
							<div class="col-md-6">
								<h6><?php echo get_phrase('amenities'); ?></h6>
								<ul>
									<?php
									$counter = 0;
									$amenities = $this->crud_model->get_amenities()->result_array();
									foreach ($amenities as $amenity):
										$counter++;
									?>
									<?php if ($counter <= $number_of_visible_amenities): ?>
										<div class="">
											<li>
												<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
													<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										</div>
									<?php else: ?>
										<div class="hidden-amenities hidden">
											<li>
												<label class="container_check"> <i class="<?php echo $amenity['icon']; ?>"></i> <?php echo $amenity['name']; ?>
													<input type="checkbox" class="amenities" name="amenity[]" value="<?php echo $amenity['slug']; ?>" onclick="filter(this)" <?php if(in_array($amenity['id'], $amenity_ids)) echo 'checked'; ?>>
													<span class="checkmark"></span>
												</label>
											</li>
										</div>
									<?php endif; ?>
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "amenity-toggle-btn" onclick="showToggle(this, 'hidden-amenities')"><?php echo count($amenities) > $number_of_visible_amenities ? get_phrase('show_more') : ""; ?></a>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<h6><?php echo get_phrase('cities'); ?></h6>
								<ul>
									<li>
										<div class="">
											<input type="radio" id="city_all" name="city" class="city" value="all" onclick="filter(this)" <?php if($city_id == 'all') echo 'checked'; ?>>
											<label for="city_all"><?php echo get_phrase('all'); ?></label>
										</div>
									</li>
									<?php
									$counter = 1;
									$cities = $this->crud_model->get_cities()->result_array();
									foreach ($cities as $city):
										$counter++;
									?>
									<?php if ($counter <= $number_of_visible_cities): ?>
										<div class="">
											<li>
												<div class="">
													<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
											    <label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
												</div>
											</li>
										</div>
									<?php else: ?>
										<div class="hidden-cities hidden">
											<li>
												<div class="">
													<input type="radio" id="city_<?php echo $city['id'];?>" name="city" class="city" value="<?php echo $city['slug']; ?>" onclick="filter(this)" <?php if($city['id'] == $city_id) echo 'checked'; ?>>
													<label for="city_<?php echo $city['id'];?>"><?php echo $city['name']; ?></label>
												</div>
											</li>
										</div>
									<?php endif; ?>
									<?php endforeach; ?>
								</ul>
								<a href="javascript::" id = "city-toggle-btn" onclick="showToggle(this, 'hidden-cities')"><?php echo count($cities) > $number_of_visible_cities ? get_phrase('show_more') : ""; ?></a>
							</div>

							<div class="col-md-6">
								<h6><?php echo get_phrase('video'); ?></h6>
								<ul>
									<li>
										<label class="container_check"> <i class=""></i> <?php echo get_phrase('with_video'); ?>
											<input type="checkbox" class="video_availability" name="with_video" value="1" onclick="filter(this)" <?php if($with_video == 1) echo 'checked'; ?>>
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>

								<h6><?php echo get_phrase('opening_status'); ?></h6>
								<ul>
									<li>
										<label class="container_check"> <i class=""></i> <?php echo get_phrase('open_now'); ?>
											<input type="checkbox" class="openingStatus" name="with_open" value="open" onclick="filter(this)" <?php if($with_open == 'open') echo 'checked'; ?>>
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
							</div>
						</div>
						<!-- /row -->
						<div class="row">
							<div class="col-md-12">
								<div class="add_bottom_30">
									<h6><?php echo get_phrase('price_limit'); ?></h6>
									<div class="distance"> <?php echo get_phrase('price_within'); ?> <span></span> <?php echo get_settings('system_currency'); ?></div>
									<input type="range" class="price-range" min="0" max="<?php echo $this->frontend_model->get_the_maximum_price_limit_of_all_listings(); ?>" step="10" value="<?php echo $price_range; ?>" data-orientation="horizontal" onchange="filter(this)">
								</div>
							</div>
						</div>
						<!-- /row -->
					</form>
				</div>
			</div>
			<!-- /Filters -->

			<?php
				foreach($listings as $listing):
					if(!has_package($listing['user_id']) > 0)
						continue; ?>

				<div class="strip map_view add_top_20 <?php if($listing['is_featured'] == 1) echo 'featured-tag-border'; ?>" id = "<?php echo $listing['code']; ?>" >
					<div class="row no-gutters">
						<div class="col-4">
							<figure>
								<a href="<?php echo get_listing_url($listing['id']); ?>"  id = "listing-banner-image-for-<?php echo $listing['code']; ?>"  class="d-block h-100 img" style="background-image:url('<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>')">
										<!-- <img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing['listing_thumbnail']); ?>" class="img-fluid" alt=""> -->
										<div class="read_more"><span><?php echo get_phrase('watch_details'); ?></span></div>
									</a>
									<small><?php echo $listing['listing_type'] == "" ? ucfirst(get_phrase('general')) : ucfirst(get_phrase($listing['listing_type'])) ; ?></small>
									<?php if($listing['is_featured'] == 1): ?>
										<small class="featured-tag-list"><?php echo get_phrase('featured'); ?></small>
									<?php endif; ?>
							</figure>
						</div>
						<div class="col-8 <?php if($listing['is_featured'] == 1) echo 'featured-body'; ?>">
							<div class="wrapper">
								<a href="javascript::" class="wishlist-icon small" onclick="addToWishList(this, '<?php echo $listing['id']; ?>')">
									<i class=" <?php echo is_wishlisted($listing['id']) ? 'fas fa-heart' : 'far fa-heart'; ?> "></i>
								</a>
								<h3 class="ellipsis">
									<a href="<?php echo get_listing_url($listing['id']); ?>"><?php echo $listing['name']; ?></a>
									<?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing['id']))->row('status'); ?>
					                <?php if($claiming_status == 1): ?>
										<span class="claimed_icon" data-toggle="tooltip" data-placement="right" title="<?php echo get_phrase('this_listing_is_verified'); ?>">
						                	<img src="<?php echo base_url('assets/frontend/images/verified.png'); ?>" width="23" />
						                </span>
									<?php endif; ?>
								</h3>
									<small>
										<?php
											$city 	 = $this->db->get_where('city', array('id' =>  $listing['city_id']))->row_array();
											$country = $this->db->get_where('country', array('id' =>  $listing['country_id']))->row_array();
											echo $city['name'].', '.$country['name'];
										?>
									</small>
									<p class="ellipsis">
										<?php echo $listing['description']; ?>
									</p>
									<?php if ($listing['latitude'] != "" && $listing['longitude'] != ""): ?>
											<a class="address" href="javascript:" button-direction-id = "<?php echo $listing['code']; ?>" target=""><?php echo get_phrase('show_on_map'); ?></a>
									<?php endif; ?>
							</div>
							<ul class="<?php if($listing['is_featured'] == 1) echo 'featured-footer'; ?>">
								<li><span class="<?php echo strtolower(now_open($listing['id'])) == 'closed' ? 'loc_closed' : 'loc_open'; ?>"><?php echo now_open($listing['id']); ?></span></li>
								<li>
									<div class="score">
										<span>
											<?php
					            if ($this->frontend_model->get_listing_wise_rating($listing['id']) > 0) {
					              $quality = $this->frontend_model->get_rating_wise_quality($listing['id']);
					              echo $quality['quality'];
					            }else {
												echo get_phrase('unreviewed');
											}
					            ?>
											<em>
												<?php echo count($this->frontend_model->get_listing_wise_review($listing['id'])).' '.get_phrase('reviews'); ?>
											</em>
										</span>
										<strong><?php echo $this->frontend_model->get_listing_wise_rating($listing['id']); ?></strong></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /strip map_view -->

			<?php endforeach; ?>			

			<!-- custom pagination -->
			<?php if(isset($pagination) && isset($total_page_number) && $pagination == 'search_page'): ?>
				<nav class="text-center" aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				  	<li class=""><a class="page-link" href="<?php echo site_url('home/search/1?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('first')); ?></a></li>
				    <?php for($page_number = 1; $page_number <= $total_page_number; $page_number++){ ?>
				    	<?php
				    		// if($active_page_number > $page_number && ($active_page_number-$page_number) <= 2){
				    		// 	$show_pagination = "";
				    		// }elseif($active_page_number < $page_number && ($page_number-$active_page_number) <= 2){
				    		// 	$show_pagination = "";
				    		// }elseif($active_page_number == $page_number){
				    		// 	$show_pagination = "";
				    		// }else{
				    		// 	$show_pagination = "none";
				    		// }
				    	?>
				    	<li style=""><a class="page-link <?php if($active_page_number == $page_number) { echo 'active'; } ?>" href="<?php echo site_url('home/search/'.$page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo $page_number; ?></a></li>
					<?php } ?>
				    <li class=""><a class="page-link" href="<?php echo site_url('home/search/'.$total_page_number.'?search_string='.$search_string.'&selected_category_id='.$selected_category_id); ?>"><?php echo strtolower(get_phrase('last')); ?></a></li>
				  </ul>
				</nav>
			<?php elseif(isset($pagination) && isset($total_page_number) && $pagination == 'filter_page'): ?>
				<nav class="text-center" aria-label="Page navigation example">
				  <ul class="pagination justify-content-center">
				  	<li class=""><a class="page-link" href="<?php echo site_url('home/filter_listings/1?'.$_SERVER['QUERY_STRING']); ?>"><?php echo strtolower(get_phrase('first')); ?></a></li>
				    <?php for($page_number = 1; $page_number <= $total_page_number; $page_number++){ ?>
				    	<li class=""><a class="page-link <?php if($active_page_number == $page_number) { echo 'active'; } ?>" href="<?php echo site_url('home/filter_listings/'.$page_number.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo $page_number; ?></a></li>
					<?php } ?>
				    <li class=""><a class="page-link" href="<?php echo site_url('home/filter_listings/'.$total_page_number.'?'.$_SERVER['QUERY_STRING']); ?>"><?php echo strtolower(get_phrase('last')); ?></a></li>
				  </ul>
				</nav>
			<?php endif; ?>
			<!-- custom pagination end-->

			<nav class="text-center">
				<?php echo $this->pagination->create_links(); ?>
			</nav>
		</div>
		<!-- /content-left-->

		<div class="col-lg-7 map-right">
			<div class="stiky-map-list custom-mt-7">
				<div id="map" class="map-full map-layout responsive_map_view"></div>
			</div>
		</div>
		<!-- /map-right-->

	</div>
	<!-- /row-->
</div>
<!-- /container-fluid -->


<script type="text/javascript">
$(document).ready(function() {
	var deviceWidth = $(window).width();
	// windows laptop
	if (deviceWidth >= 1300 && deviceWidth <= 1450) {
		$('#sidebar').removeClass('col-xl-2');
		$('#sidebar').addClass('col-xl-3');
		$('#listings').removeClass('col-xl-5');
		$('#listings').addClass('col-xl-6');
	}
	//Macbook pro Ratina display
	if (deviceWidth >= 2550 && deviceWidth <= 2900) {
		$('#sidebar').removeClass('col-xl-2');
		$('#sidebar').addClass('col-xl-3');
		$('#listings').removeClass('col-xl-5');
		$('#listings').addClass('col-xl-6');
	}
});
	function filter(elem) {
		var urlPrefix 	= '<?php echo site_url('home/filter_listings?'); ?>'
		var urlSuffix = "";
		var slectedCategories = "";
		var selectedAmenities = "";
		var selectedCity = "";
		var selectedVideoAvailability = 0;
		var selectedPriceRange = 0;
		var selectedOpeningStatus = "all";

		$('.categories:checked').each(function() {
			(slectedCategories === "") ? slectedCategories = $(this).attr('value') : slectedCategories = slectedCategories + "--" + $(this).attr('value');
		});

		$('.amenities:checked').each(function() {
			(selectedAmenities === "") ? selectedAmenities = $(this).attr('value') : selectedAmenities = selectedAmenities + "--" + $(this).attr('value');
		});

		$('.city:checked').each(function() {
			(selectedCity === "") ? selectedCity = $(this).attr('value') : selectedCity = selectedCity + "--" + $(this).attr('value');
		});

		$('.video_availability:checked').each(function() {
			(selectedVideoAvailability === 0) ? selectedVideoAvailability = $(this).attr('value') : selectedVideoAvailability = selectedVideoAvailability + "--" + $(this).attr('value');
		});
		$('.openingStatus:checked').each(function() {
			(selectedOpeningStatus === 'all') ? selectedOpeningStatus = $(this).attr('value') : selectedOpeningStatus = $(this).attr('value');
		});

		selectedPriceRange = $('.price-range').val();
		urlSuffix = "category="+slectedCategories+"&&amenity="+selectedAmenities+"&&city="+selectedCity+"&&price-range="+selectedPriceRange+"&&video="+selectedVideoAvailability+"&&status="+selectedOpeningStatus;
		window.location.replace(urlPrefix+urlSuffix);

		selectedPriceRange = $('.price-range').val();
		urlSuffix = "category="+slectedCategories+"&&amenity="+selectedAmenities+"&&city="+selectedCity+"&&price-range="+selectedPriceRange+"&&video="+selectedVideoAvailability+"&&status="+selectedOpeningStatus;
		window.location.replace(urlPrefix+urlSuffix);
	}

	function addToWishList(elem, listing_id) {
		var isLoggedIn = '<?php echo $this->session->userdata('is_logged_in'); ?>';
		if (isLoggedIn === '1') {
			$.ajax({
				type : 'POST',
				url : '<?php echo site_url('home/add_to_wishlist'); ?>',
				data : {listing_id : listing_id},
				success : function(response) {
					if (response == 'added') {
						$(elem).html('<i class="fas fa-heart"></i>');
						toastr.success('<?php echo get_phrase('added_to_wishlist'); ?>');
					}else {
						$(elem).html('<i class="far fa-heart"></i>');
						toastr.success('<?php echo get_phrase('removed_from_the_wishlist'); ?>');
					}
				}
			});
		}else {
			loginAlert();
		}
	}


	function showToggle(elem, selector) {
		$('.'+selector).slideToggle();
		console.log($(elem).text());
		if($(elem).text() === "<?php echo get_phrase('show_more'); ?>")
    {
        $(elem).text('<?php echo get_phrase('show_less'); ?>');
    }
    else
    {
        $(elem).text('<?php echo get_phrase('show_more'); ?>');
    }
	}
</script>

<!-- This map-category.php file has all the fucntions for showing the map, marker, map info and all the popup markups -->
<?php include 'assets/frontend/js/map/map-category.php'; ?>

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<script>
	function toggleListingView(type) {
		$.ajax({
			url:'<?php echo site_url('home/listings_view/'); ?>'+type,
			success: function(response){
				location.reload();
			}
		});
	}
</script>