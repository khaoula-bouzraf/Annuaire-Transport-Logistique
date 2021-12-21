<?php
  $reviews = $this->frontend_model->get_listing_wise_review($listing_id);
  $rating = $this->frontend_model->get_listing_wise_rating($listing_id);
  $user_id = $this->session->userdata('user_id');
  $user_type = $this->db->get_where('user', array('id' => $user_id))->row('role_id');
?>
<section id="reviews">
  <h2><?php echo get_phrase('reviews'); ?></h2>
  <!-- Ratings starts -->
  <div class="reviews-container add_bottom_30">
    <div class="row">
      <div class="col-lg-3">
        <div id="review_summary">
          <strong><?php echo $rating; ?></strong>
          <em>
            <?php
            if ($rating > 0) {
              $quality = $this->frontend_model->get_rating_wise_quality($listing_id);
              echo $quality['quality'];
            }
            ?>
         </em>
          <small><?php echo get_phrase('based_on').' '.count($reviews).' '.get_phrase('reviews'); ?></small>
        </div>
      </div>
      <div class="col-lg-9">
        <!-- Rating Progeress Bar -->
        <?php for($i = 1; $i <= 5; $i++): ?>
          <div class="row">
            <div class="col-lg-10 col-9">
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $this->frontend_model->get_percentage_of_specific_rating($listing_id, $i); ?>%" aria-valuenow="<?php echo $this->frontend_model->get_percentage_of_specific_rating($listing_id, $i); ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong><?php echo $i.' '.get_phrase('stars'); ?></strong></small></div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- Ratings ends -->

  <div class="reviews-container">
    <!-- Single Review Starts -->
    <?php foreach ($reviews as $review): ?>
      <div class="review-box clearfix">
        <?php $reviewer =  $this->db->get_where('user', array('id' => $review['reviewer_id']))->row_array(); ?>
        
        <?php
          $file_name = 'uploads/user_image/'.$reviewer['id'].'.jpg';
          
          if (file_exists($file_name)) {
        ?>
          <figure class="rev-thumb"><img src="<?php echo base_url('uploads/user_image/'.$reviewer['id'].'.jpg'); ?>" alt=""></figure>
        <?php }else { ?>
          <figure class="rev-thumb"><img src="<?php echo base_url('uploads/user_image/user.png'); ?>" alt=""></figure>
        <?php } ?>
        <div class="rev-content">
          <div class="rating">
            <?php for($i = 1; $i <= $review['review_rating']; $i++): ?>
              <i class="icon_star voted"></i>
            <?php endfor; ?>
            <?php for($i = 1; $i <= (5-$review['review_rating']); $i++): ?>
              <i class="icon_star"></i>
            <?php endfor; ?>
          </div>
          <div class="rev-info">
            <?php echo $reviewer['name']; ?> – <?php echo date('D, d-M-Y', $review['timestamp']); ?>:
          </div>
          <div class="rev-text">
            <p>
              <?php echo $review['review_comment']; ?>

              <?php
                if($user_type == 1){
              ?>
                <span class="p-0 m-0 float-right">
                  <a href="javascript: void(0);" onclick="confirm_modal('<?php echo site_url('admin/review_modify/delete/'.$review['review_id'].'/'.$slug.'/'.$listing_id); ?>');" class="text-danger"><i class="icon-trash pb-2"></i></a>
                </span>

              <?php }elseif($user_type == 2 && $user_id == $reviewer['id']){ ?>
                <span class="p-0 m-0 mt-1 float-right">
                  <a href="javascript: void(0);" onclick="edit_review('<?php echo $review['review_id'] ?>')"><i class="icon-edit" ></i></a>
                  <a href="javascript: void(0);" onclick="confirm_modal('<?php echo site_url('user/review_modify/delete/'.$review['review_id'].'/'.$slug.'/'.$listing_id); ?>');" class="text-danger"><i class="icon-trash pb-2"></i></a>
                </span>
              <?php } ?>
            </p>

            <?php if($user_type == 2 && $user_id == $reviewer['id']){ ?>
              <div class="row" id="<?php echo $review['review_id'] ?>" style="display: none;">
                <div class="col-12">
                  <form method="post" action="<?php echo site_url('user/review_modify/edit/'.$review['review_id'].'/'.$slug.'/'.$listing_id); ?>">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label> <?php echo get_phrase('rating'); ?> </label>
                        <div class="custom-select-form">
                          <select name="review_rating" id="review_rating" class="wide">
                            <option value="1" <?php if(1 == $review['review_rating'])echo 'selected'; ?> >1</option>
                            <option value="2" <?php if(2 == $review['review_rating'])echo 'selected'; ?> >2</option>
                            <option value="3" <?php if(3 == $review['review_rating'])echo 'selected'; ?> >3</option>
                            <option value="4" <?php if(4 == $review['review_rating'])echo 'selected'; ?> >4</option>
                            <option value="5" <?php if(5 == $review['review_rating'])echo 'selected'; ?> >5</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <label> <?php echo get_phrase('your_review'); ?> </label>
                        <textarea name="review_comment" id="review_comment" class="form-control" rows="4"><?php echo $review['review_comment']; ?></textarea>
                      </div>
                      <div class="form-group col-md-12 add_top_20 add_bottom_30">
                        <div class="row">
                          <div class="col-12">
                            <input type="submit" value=" <?php echo get_phrase('submit'); ?> " class="btn_1 float-right" id="submit-review">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php } ?>
            
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- Single Review Endss -->
  </div>
  <!-- /review-container -->
</section>

<?php if($user_type == 2){ ?>
  <hr>
  <!-- Leave a review starts -->
  <div class="add-review">
    <h5><?php echo get_phrase('leave_a_review'); ?></h5>
    <form action="<?php echo site_url('home/listing_review'); ?>" method="post">
      <input type="hidden" name="reviewer_id" value="<?php echo $user_id; ?>">
      <input type="hidden" name="slug" value="<?php echo $slug; ?>">
      <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
      <div class="row">
        <div class="form-group col-md-12">
          <label> <?php echo get_phrase('rating'); ?> </label>
          <div class="custom-select-form">
            <select name="review_rating" id="review_rating" class="wide">
              <option value="1" selected>1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label> <?php echo get_phrase('your_review'); ?> </label>
          <textarea name="review_comment" id="review_comment" class="form-control" style="height:130px;"></textarea>
        </div>
        <div class="form-group col-md-12 add_top_20 add_bottom_30">
          <div class="row">
            <div class="col-6">
              <input type="submit" value=" <?php echo get_phrase('submit'); ?> " class="btn_1" id="submit-review">
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-12">
                  <?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing_id))->row('status'); ?>
                  <?php if($claiming_status == 0): ?>
                    <a href='javascript::' class="btn btn-warning float-right btn-sm" onclick="showClaimForm();"> <?php echo get_phrase('claim_this_listing'); ?>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="col-12">
                  <small style="float: right;" class="mt-2"><a href='javascript::' <?php if ($this->session->userdata('user_login') == 1):?> onclick="showReportForm();" <?php else: ?> onclick="loginAlert()" <?php endif; ?> style="color: #616161;"> <?php echo get_phrase('report_this_listing'); ?> </a></small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="" id = "report_form" style="display: none;">
    <h5><?php echo get_phrase('report_this_listing'); ?></h5>
    <form action="<?php echo site_url('home/report_this_listing'); ?>" method="post">
      <input type="hidden" name="slug" value="<?php echo $slug; ?>">
      <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
      <input type="hidden" name="reporter_id" value="<?php echo $this->session->userdata('user_id'); ?>">
      <div class="row">
        <div class="form-group col-md-12">
          <label> <?php echo get_phrase('report'); ?> </label>
          <textarea name="report" id="report" class="form-control" style="height:130px;"></textarea>
        </div>
        <div class="form-group col-md-12 add_top_20 add_bottom_30">
          <div class="row">
            <div class="col-6">
              <input type="submit" value=" <?php echo get_phrase('submit_report'); ?> " class="btn_1" id="submit-report">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php } ?>

<?php if($this->session->userdata('is_logged_in') == 1): ?>
  <div class="row">
    <div class="col-12">
      <?php $claiming_status = $this->db->get_where('claimed_listing', array('listing_id' => $listing_id))->row('status'); ?>
      <?php if($claiming_status == 0 && $user_type != 2): ?>
        <a href='javascript::' class="btn btn-warning float-right btn-sm" onclick="showClaimForm();"> <?php echo get_phrase('claim_this_listing'); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="" id = "claim_form" style="display: none;">
    <h5><?php echo get_phrase('claim_this_listing'); ?></h5>
    <form action="<?php echo site_url('home/claim_this_listing'); ?>" method="post">
      <input type="hidden" name="listing_id" value="<?php echo $listing_id; ?>">
      <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="name"><?php echo get_phrase('full_name'); ?> </label>
          <input name="full_name" id="name" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
          <label for="phone"><?php echo get_phrase('phone'); ?> </label>
          <input name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group col-md-12">
          <textarea name="additional_information" class="form-control" style="height:130px;" placeholder="<?php echo get_phrase('additional_proof_to_expedite_claim_approval'); ?>..." required></textarea>
        </div>
        <div class="form-group col-md-12 add_top_20 add_bottom_30">
          <div class="row">
            <div class="col-6">
              <input type="submit" value=" <?php echo get_phrase('submit_claim_request'); ?> " class="btn_1" id="submit-report">
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
<?php else: ?>
  <div class="row">
    <div class="col-12">
      <a href="<?php echo site_url('login'); ?>" class="btn btn-warning float-right" ><?php echo get_phrase('login_to_review'); ?></a>
    </div>
    <div class="col-12 mt-1">
      <a href="<?php echo site_url('login'); ?>" class="btn btn-sm btn-warning float-right" ><?php echo get_phrase('claim_this_listing'); ?></a>
    </div>
  </div>
   <br/>
<?php endif; ?>
<!-- Leave a review ends -->


<script>
  function edit_review(review_id){
      $("#" + review_id).slideToggle("slow");
  }
// $(document).ready(function(){
//   $("#edit_review_button").click(function(){
//     $("#edit_review_form").slideToggle("slow");
//   });
// });
</script>
