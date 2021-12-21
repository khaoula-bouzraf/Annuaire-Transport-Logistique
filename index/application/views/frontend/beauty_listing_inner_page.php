<?php $beauty_services = $this->db->get_where('beauty_service', array('listing_id' => $listing_details['id']))->result_array(); ?>
<h5><?php echo get_phrase('special_beauty_service'); ?></h5>
<div class="row add_bottom_15">
    <?php foreach ($beauty_services as $beauty_service): ?>
        <div class="col-lg-6 col-md-12">

            <ul class="menu_list">

                <li>
                    <div class="thumb">
                        <img src="<?php echo base_url('uploads/beauty_service_images/'.$beauty_service['photo']); ?>" alt="" style="height: 88px; width: 88px;">
                    </div>
                    <h6><?php echo $beauty_service['name']; ?> <span><?php echo currency($beauty_service['price']); ?> </span></h6>
                    <?php
                        $times = explode(',', $beauty_service['service_times']);
                        // $time_from = explode(':', $times[0]);
                        // $time_to = explode(':', $times[1]);
                        // if($time_from[0] > 12){
                        //     $hour = $time_from[0] - 12;
                        //     $minute = $time_from[1];
                        //     $starting_time = $hour.':'.$minute.' '.' PM';
                        // }else{
                        //     $starting_time = $times[0].' AM';
                        // }

                        // if($time_to[1] > 12){
                        //     $end_hour = $time_to[0] - 12;
                        //     $end_minute = $time_to[1];
                        //     $ending_time = $end_hour.':'.$end_minute.' '.' PM';
                        // }else{
                        //     $ending_time = $times[1].' AM';
                        // }
                        // echo '<p style="margin-bottom: 5px;">'.$starting_time.' - '.$ending_time.'</p>';
                        $time_from = strtotime($times[0].":00");
                        $time_to   = strtotime($times[1].":00");
                        echo '<p style="margin-bottom: 5px;">'.get_phrase('availability').' : '.date('h:i A', $time_from).' - '.date('h:i A', $time_to).'</p>'; 
                        echo '<p>'.get_phrase('duration').' : '.$times[2].' '.get_phrase('minutes').'</p>'
                    ?>
                </li>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
