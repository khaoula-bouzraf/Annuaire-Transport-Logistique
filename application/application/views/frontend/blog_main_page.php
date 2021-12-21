<div class="col-lg-9">
			<div class="row">
				<?php foreach($blogs as $blog): ?>
					<?php if($blog['status'] != 0): ?>
						<div class="col-md-6">
							<article class="blog">
								<figure>
									<a href="<?php echo site_url('home/post/'.$blog['id'].'/'.slugify($blog['title'])); ?>">
										<?php if(file_exists('uploads/blog_thumbnails/'.$blog['blog_thumbnail'])): ?>
											<img src="<?php echo base_url('uploads/blog_thumbnails/'.$blog['blog_thumbnail']); ?>" alt="...">
										<?php else: ?>
											<img src="<?php echo base_url('uploads/blog_thumbnails/thumbnail.png'); ?>" alt="...">
										<?php endif; ?>
										<div class="preview"><span><?php echo get_phrase('read_more'); ?></span></div>
									</a>
								</figure>
								<div class="post_info">
									<small><?php echo $this->frontend_model->get_categories($blog['category_id'])->row('name'); ?> - <?php echo date('d M Y', $blog['added_date']); ?></small>
									<h2><a href="<?php echo site_url('home/post/'.$blog['id'].'/'.slugify($blog['title'])); ?>"><?php echo $blog['title']; ?></a></h2>
									<p>
										<?php 
					                      $string = strip_tags($blog['blog_text']);
					                      if (strlen($string) > 268) {

					                          // truncate string
					                          $stringCut = substr($string, 0, 268);
					                          $endPoint = strrpos($stringCut, ' ');

					                          //if the string doesn't contain any space then it will cut without word basis.
					                          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
					                          $string .= '... <a class="" href="'.site_url('home/post/'.$blog['id'].'/'.slugify($blog['title'])).'">'.get_phrase('read_more').'</a>';
					                      }
					                      echo $string;
					                    ?>
									</p>
									<ul>
										<li>
											<div class="thumb">
												<img src="<?php echo $this->user_model->get_user_thumbnail($blog['user_id']); ?>" alt="">
											</div>
											<?php echo $this->frontend_model->get_users($blog['user_id'])->row('name'); ?>
										</li>
										<li>
											<i class="ti-comment"></i>
											<?php echo count($this->db->get_where('blog_comments', array('blog_id' => $blog['id']))->result_array()); ?>
										</li>
									</ul>
								</div>
							</article>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
			<!-- /row -->

			<!-- /pagination -->
			<nav class="text-center">
				<?php echo $this->pagination->create_links(); ?>
			</nav>
			<!-- /pagination -->
			
		</div>