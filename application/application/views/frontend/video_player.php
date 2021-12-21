<?php if(has_package_feature('ability_to_add_video', $listing_details['user_id']) == 1 && $listing_details['video_url'] != ""): ?>
  <hr>
  <h3><?php echo get_phrase('video'); ?></h3>
  <div class="" style="text-align: center;">
    <?php if (strtolower($listing_details['video_provider']) == 'youtube'): ?>
      <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">

      <div class="plyr__video-embed" id="player">
        <iframe height="500" src="<?php echo $listing_details['video_url'];?>?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1" allowfullscreen allowtransparency allow="autoplay"></iframe>
      </div>

      <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
      <script>const player = new Plyr('#player');</script>

    <?php elseif (strtolower($listing_details['video_provider']) == 'vimeo'):
      $video_details = $this->video_model->getVideoDetails($listing_details['video_url']);
      $video_id = $video_details['video_id'];?>

      <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
      <div class="plyr__video-embed" id="player">
        <iframe height="500" src="https://player.vimeo.com/video/<?php echo $video_id; ?>?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media" allowfullscreen allowtransparency allow="autoplay"></iframe>
      </div>

      <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
      <script>const player = new Plyr('#player');</script>

    <?php else :?>

      <link rel="stylesheet" href="<?php echo base_url();?>assets/global/plyr/plyr.css">
      <video poster="<?php echo base_url('uploads/listing_cover_photo/'.$listing_details['listing_cover']);?>" id="player" playsinline controls>
        <?php if (get_video_extension($listing_details['video_url']) == 'mp4'): ?>
          <source src="<?php echo $listing_details['video_url']; ?>" type="video/mp4">
          <?php elseif (get_video_extension($listing_details['video_url']) == 'webm'): ?>
            <source src="<?php echo $listing_details['video_url']; ?>" type="video/webm">
            <?php else: ?>
              <h4><?php get_phrase('video_url_is_not_supported'); ?></h4>
            <?php endif; ?>
          </video>

          <script src="<?php echo base_url();?>assets/global/plyr/plyr.js"></script>
          <script>const player = new Plyr('#player');</script>

        <?php endif; ?>
    </div>
<?php endif; ?>
