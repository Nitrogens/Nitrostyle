<?php get_header(); ?>
<div class="col-md-8">
	<h2 class="nitrostyle-widget-title nitrostyle-widget-title-top">搜索：<?php echo $_GET['s']; ?></h2>
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
	<div class="nitrostyle-post">
		<div class="panel panel-default">
			<div class="panel-heading"><h2 class="nitrostyle-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
			<div class="panel-body">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp<?php the_time('Y-m-d') ?>
				<div class="nitrostyle-post-content">
					<?php
						$isexcerpt = get_option("nitrostyle_isexcerpt");
						$excerptlength = get_option("nitrostyle_excerptlength");
						if ( $isexcerpt == "1" ) {
							nitrostyle_post_excerpt($excerptlength); 
						} else {
							the_content();
						}
					?>
				</div>
			</div>
			<div class="panel-footer">
				<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>&nbsp<?php the_category(", "); ?>&nbsp
				<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp<?php comments_popup_link('0', '1', '%', '', ''); ?>
			</div>
		</div>
	</div>
	<?php endwhile; endif; ?>
	<nav>
		<ul class="pager">
			<li class="previous"><?php previous_posts_link('&lt;&lt; 上一页', 0); ?></li>
			<li class="next"><?php next_posts_link('下一页 &gt;&gt;', 0); ?></li>
		</ul>
	</nav>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>