<div class="row">
  <div class="col-sm-12">
    <div class="text-center">
      <h2 class="mt-0">
        <i class="entypo-check"></i>
      </h2>
      <h3 class="mt-0"><?php echo get_phrase('thank_you'); ?> !</h3>
      <p class="w-75 mb-2 mx-auto"><?php echo get_phrase('you_are_almost_there').'. '.get_phrase('please_check_if_you_have_provided_all_the_necessary_things').'.'; ?></p>
      <p> <input type="button" class="btn btn-primary" name="button" value="<?php echo get_phrase('submit'); ?>" onclick="checkMinimumFieldRequired()"></p>
      </div>
    </div>
  </div>
