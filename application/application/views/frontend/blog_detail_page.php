<div class="col-lg-9">
	<div class="singlepost">
		<figure>
			<?php if(file_exists('uploads/blog_cover_images/'.$blog['blog_cover'])): ?>
				<img src="<?php echo base_url('uploads/blog_cover_images/'.$blog['blog_cover']); ?>" width="100%" alt="..." style="max-height: 650px;">
			<?php endif ?>
				<!-- <img src="<?php echo base_url('uploads/blog_cover_images/thumbnail.png'); ?>" alt="..."> -->
		</figure>
		<h1><?php echo $blog['title'] ?></h1>
		<div class="postmeta">
			<ul>
				<li>
					<a href="javascript: void(0)">
						<i class="ti-folder"></i>
						<?php echo $this->frontend_model->get_categories($blog['category_id'])->row('name'); ?>
					</a>
				</li>
				<li>
					<a href="javascript: void(0)">
						<i class="ti-calendar"></i>
						<?php echo date('d/m/Y', $blog['added_date']); ?>
					</a>
				</li>
				<li>
					<a href="javascript: void(0)">
						<i class="ti-user"></i>
						<?php echo $this->frontend_model->get_users($blog['user_id'])->row('name'); ?>
					</a>
				</li>
				<li>
					<a href="javascript: void(0)">
						<i class="ti-comment"></i>
						(<?php echo count($this->db->get_where('blog_comments', array('blog_id' => $blog['id']))->result_array()).') '.get_phrase('comments'); ?> 
					</a>
				</li>
			</ul>
		</div>
		<!-- /post meta -->
		<div class="post-content" style="min-height: 200px;">
			<div class="dropcaps blog_text pb-4">
				<?php echo $blog['blog_text']; ?>
			</div>
		</div>
		<!-- /post -->
	</div>
	<!-- /single-post -->

	<div id="comments">
		<h5><?php echo get_phrase('comments'); ?></h5>
		<ul>
			<?php foreach($comments as $comment): ?>
				<li>
					<div class="avatar">
						<a href="javascript: void(0)">
							<img src="<?php echo $this->user_model->get_user_thumbnail($comment['user_id']); ?>" alt="">
						</a>
					</div>
					<div class="comment_right clearfix">
						<div class="comment_info">
							<?php echo get_phrase('by'); ?> <a href="javascript: void(0)"><?php echo $this->frontend_model->get_users($comment['user_id'])->row('name'); ?></a>
								<span>|</span><?php echo date('d/m/Y', $comment['added_date']); ?><span>
								<?php if($comment['modified_date'] != null): ?>
								|</span><?php echo get_phrase('modified_date').' '.date('d/m/Y', $comment['modified_date']); ?><span>
								<?php endif; ?>

								<!--Delete button-->
								<?php if($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_id') == $comment['user_id']): ?>
									<a href="javascript: void(0)" onclick="confirm_modal('<?php echo site_url('home/delete_blog_comment/'.$comment['id'].'/'.$blog['id']); ?>');" class="float-right mb-0 mr-1 text-danger"><i class="icon-trash"></i></a>
								<?php endif; ?>

								<!--Edit button-->
								<?php if($this->session->userdata('user_id') == $comment['user_id']): ?>
									<a href="javascript: void(0)" onclick="edit_blog_comment('<?php echo $comment['id']; ?>')" class="float-right mb-0 mr-1 text-info"><i class="icon-edit"></i></a>
								<?php endif; ?>
						</div>
						<p>
							<?php echo $comment['comment']; ?>

							<!--Edit comment form-->
							<div class="row">
								<div class="col-12">
									<ul class="replied-to" style="display: none;" id="edit_comment_box_<?php echo $comment['id']; ?>">
										<li>
											<div class="form-group">
												<textarea class="form-control" name="comment" id="edit_reply_comment_<?php echo $comment['id']; ?>" rows="4" placeholder="Comment"><?php echo $comment['comment']; ?></textarea>
											</div>
											<div class="form-group">
												<button type="button" onclick="update_blog_comment('<?php echo $comment['id']; ?>')" id="" class="float-right btn-info btn-sm" style="cursor: pointer;">
													<i class="icon-reply"></i>
													<?php echo get_phrase('update'); ?>
												</button>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<!--under comment-->
							<?php include 'under_comment.php'; ?>
							<p class="pb-2 pt-2">
								<!--Reply button-->
								<a href="javascript: void(0)" onclick="reply_comment('<?php echo $comment['id']; ?>')" class="float-right mb-0 mr-1"><i class="icon-reply"></i><?php echo get_phrase('reply'); ?></a>
							</p>

							<!--reply form-->
							<!-- <form action="<?php echo site_url('home/comment_add/under_comment'); ?>" method="POST"> -->
								<ul class="replied-to" style="display: none;" id="comment_box_<?php echo $comment['id']; ?>">
									<li>
										<input type="hidden" id="under_comment_id_<?php echo $comment['id']; ?>" name="under_comment_id" value="<?php echo $comment['id']; ?>">
										<input type="hidden" id="blog_id_<?php echo $comment['id']; ?>" name="blog_id" value="<?php echo $blog['id']; ?>">
										<input type="hidden" id="blog_name_<?php echo $comment['id']; ?>" name="blog_name" value="<?php echo $blog['title']; ?>">
										<div class="form-group">
											<textarea class="form-control" name="comment" id="reply_comment_<?php echo $comment['id']; ?>" rows="4" placeholder="Comment"></textarea>
										</div>
										<div class="form-group">
											<button type="button" onclick="reply_comment_add('<?php echo $this->session->userdata('is_logged_in'); ?>', '<?php echo $comment['id']; ?>')" id="" class="btn_1 add_bottom_15 float-right">
												<i class="icon-reply"></i>
												<?php echo get_phrase('reply'); ?>
											</button>
										</div>
									</li>
								</ul>
							<!-- </form> -->
						</p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

	<hr>

	<h5><?php echo get_phrase('leave_a_comment'); ?></h5>
	
	<div class="form-group">
		<textarea class="form-control" name="comments" id="parent_comment" rows="6" placeholder="Comment"></textarea>
	</div>
	<div class="form-group">
		<button type="submit" onclick="parent_comment_add()" class="btn_1 add_bottom_15"><?php echo get_phrase('submit'); ?></button>
	</div>
	
</div>

<script>
	function reply_comment(comment_id){
		$('#comment_box_' + comment_id).slideToggle(500);
	};

	function reply_comment_add(user_login, comment_id){
		var under_comment_id = $('#under_comment_id_'+comment_id).val();
		var blog_id 		 = $('#blog_id_'+comment_id).val();
		var blog_name 		 = $('#blog_name_'+comment_id).val();
		var comment 		 = $('#reply_comment_'+comment_id).val();
		if(user_login == 1 && comment != ''){
			$.ajax({
				type: 'post',
				url: '<?php echo site_url('home/comment_add'); ?>',
				data: {under_comment_id : under_comment_id, blog_id : blog_id, blog_name : blog_name, comment : comment},
				success: function(){
					location.reload();
				}
			});
		}else{
			if(user_login != 1){
				toastr.error('<?php echo get_phrase('please_login_first'); ?>');
			}else{
				toastr.error('<?php echo get_phrase('write_something_in_the_comment_box'); ?>');
			}
		}
	}

	function parent_comment_add(){
		var user_login = '<?php echo $this->session->userdata('is_logged_in'); ?>';
		var comment    = $('#parent_comment').val();
		var blog_id    = '<?php echo $blog['id']; ?>';
		var blog_name  = '<?php echo $blog['title']; ?>';
		var under_comment_id = 0;
		if(user_login == 1 && comment != ''){
			$.ajax({
				type: 'post',
				url: '<?php echo site_url('home/comment_add'); ?>',
				data: {under_comment_id : under_comment_id, blog_id : blog_id, blog_name : blog_name, comment : comment},
				success: function(){
					location.reload();
				}
			});
		}else{
			if(user_login != 1){
				toastr.error('<?php echo get_phrase('please_login_first'); ?>');
			}else{
				toastr.error('<?php echo get_phrase('write_something_in_the_comment_box'); ?>');
			}
		}
	}

	function edit_blog_comment(comment_id){
		$('#edit_comment_box_'+comment_id).slideToggle(500);
	}
	function update_blog_comment(comment_id){
		var comment = $('#edit_reply_comment_'+comment_id).val();
		if(comment != ''){
			$.ajax({
				type: 'post',
				url: '<?php echo site_url('home/update_blog_comment/'); ?>'+comment_id,
				data: {comment : comment},
				success: function(){
					location.reload();
				}
			});
		}else{
			toastr.error('<?php echo get_phrase('write_something_in_the_comment_box'); ?>');
		}
	}
</script>