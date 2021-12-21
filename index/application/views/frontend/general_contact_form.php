<div class="price">
  <h5 class="d-inline"><?php echo get_phrase('contact_us'); ?></h5>
  <div class="score"><span><?php echo isset($quality['quality']) ? $quality['quality'] : get_phrase('unreviewed'); ?><em><?php echo count($reviews).' '.get_phrase('reviews'); ?></em></span><strong><?php echo $rating; ?></strong></div>
</div>
<div id="message-contact-detail"></div>
  <div class="form-group">
    <input class="form-control" type="text" placeholder="<?= get_phrase('name'); ?>" name="name" id="name" required>
    <i class="ti-user"></i>
  </div>
  <div class="form-group">
    <textarea placeholder="<?= get_phrase('your_message'); ?>" class="form-control" name="message" id="message" required></textarea>
    <i class="ti-pencil"></i>
  </div>
