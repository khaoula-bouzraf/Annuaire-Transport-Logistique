<nav id="menu" class="main-menu">
    <ul>
        <li><span><a href="<?php echo base_url();?>"><?php echo get_phrase('home'); ?></a></span></li>
        <li><span><a href="<?php echo base_url();?>home/listings"><?php echo get_phrase('listings'); ?></a></span></li>
        <li><span><a href="<?php echo base_url();?>home/category"><?php echo get_phrase('category'); ?></a></span></li>
        <!--<li><span><a href="<?php echo base_url();?>home/pricing"><?php echo get_phrase('pricing'); ?></a></span></li>-->
        <li><span><a href="<?php echo base_url();?>home/blog"><?php echo get_phrase('blog'); ?></a></span></li>
        <li><span><a href="<?php echo base_url();?>home/contact"><?php echo get_phrase('contact'); ?></a></span></li>
        <?php if ($this->session->userdata('is_logged_in') == 1): ?>
            <li><span><a href="javascript::"><?php echo get_phrase('account'); ?></a></span>
                    <ul class="manage_account_navbar">
                        <li><a href="<?php echo base_url(strtolower($this->session->userdata('role')).'/dashboard');?>"><?php echo get_phrase('manage_account'); ?></a></li>
                        <li><a href="<?php echo site_url('login/logout') ?>"><?php echo get_phrase('logout'); ?></a></li>
                    </ul>
                </li>
        <?php endif; ?>
    </ul>
</nav>