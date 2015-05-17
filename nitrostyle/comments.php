<ul class="list-group">
	<?php wp_list_comments("callback=nitrostyle_comment"); ?>
</ul>
<nav>
	<ul class="pager">
		<li class="previous"><?php previous_comments_link('&lt;&lt; 上一页', 0); ?></li>
		<li class="next"><?php next_comments_link('下一页 &gt;&gt;', 0); ?></li>
	</ul>
</nav>
<?php
	if ( !comments_open() ) {			
	} elseif ( get_option('comment_registration') && !is_user_logged_in() ) {
?>
		<h2 class="nitrostyle-widget-title">你必须先<a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a>才能够发表评论。</h2>
<?php
	} else {
?>
		<form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
			<h2 class="nitrostyle-widget-title">发表评论</h2>
			<?php if ( !is_user_logged_in() ) : ?>
			<div class="form-group">
				<label for="author">昵称</label>
				<input type="text" class="form-control"  name="author" id="author" tabindex="1" />
			</div>
			<div class="form-group">
				<label for="email">电子邮件</label>
				<input type="text" class="form-control"  name="email" id="email" tabindex="2" />
			</div>
			<div class="form-group">
				<label for="url">网址ַ(选填)</label>
				<input type="text" class="form-control"  name="url" id="url" tabindex="3" />
			</div>
			<?php endif; ?>
			<div class="form-group">
				<label for="comment">评论内容</label>
				<textarea id="comment" name="comment" class="form-control"  tabindex="4" rows="3" cols="40"></textarea>
			</div>
			<button type="submit" class="btn btn-default">提交</button>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
<?php
	}
?>