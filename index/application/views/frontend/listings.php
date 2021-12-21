<?php
	
    $listings_view = $this->session->userdata('listings_view');
    if($listings_view == 'list_view'){
        $listing_view_type = 'list_view';
    }else{
        $listing_view_type = 'grid_view';
    }

	include 'listings_'.$listing_view_type.'.php';
	
	
	$all_json_files = glob('assets/frontend/all-listings-geojson/*'); 
    foreach($all_json_files as $all_json_file){ // iterate files
      if(is_file($all_json_file))
        $json_file_for_this_page = $all_json_file;
    }

?>

<script>
	createListingsMap({
		mapId: 'map',
		jsonFile: '<?php echo base_url($json_file_for_this_page); ?>'
	});
</script>