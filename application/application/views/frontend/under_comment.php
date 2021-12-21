<?php $under_comments = $this->frontend_model->get_comments($blog['id'], $comment['id'])->result_array(); ?>
<?php foreach($under_comments as $under_comment): ?>
	<ul class="replied-to">
		<li>
			<div class="avatar">
				<a href="javascript: void(0)">
					<img src="<?php echo $this->user_model->get_user_thumbnail($under_comment['user_id']); ?>" alt="">
				</a>
			</div>
			<div class="comment_right clearfix">
				<div class="comment_info">
					<?php echo get_phrase('by'); ?> <a href="javascript: void(0)"><?php echo $this->frontend_model->get_users($under_comment['user_id'])->row('name'); ?></a>
					<span>|</span><?php echo date('d/m/Y', $under_comment['added_date']); ?><span>
						
					<!--Delete button-->
					<?php if($this->session->userdata('admin_login') == 1 || $this->session->userdata('user_id') == $under_comment['user_id']): ?>
						<a href="javascript: void(0)" onclick="confirm_modal('<?php echo site_url('home/delete_blog_comment/'.$under_comment['id'].'/'.$blog['id']); ?>');" class="float-right mb-0 mr-1 text-danger"><i class="icon-trash"></i></a>
					<?php endif; ?>
				</div>
				<p>
					<?php echo $under_comment['comment']; ?>					
				</p>
			</div>
		</li>
	</ul>
<?php endforeach; ?>