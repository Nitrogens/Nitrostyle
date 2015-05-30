<?php
$sidebar_newest = get_option("nitrostyle_sidebar_newest");
$sidebar_category = get_option("nitrostyle_sidebar_category");
$sidebar_archive = get_option("nitrostyle_sidebar_archive");
?>
<div class="col-md-4">
	<?php if ( $sidebar_newest == "1" ) : ?>
	<h2 class="nitrostyle-widget-title">最新文章</h2>
	<div class="list-group">
		<?php 
			$new_posts_list_array = get_posts("orderby=post_date&order=DESC&numberposts=3");
			foreach ( $new_posts_list_array as $post ) {
				setup_postdata( $post );
				echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
			}
			wp_reset_postdata();
		?>
	</div>
	<?php endif; ?>
	<?php if ( $sidebar_category == "1" ) : ?>
	<h2 class="nitrostyle-widget-title">文章分类</h2>
	<div class="list-group">
		<?php 
			$categories_list_array = get_categories("orderby=id&hide_empty=0");
			foreach ( $categories_list_array as $category ) {
				echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '<span class="badge">' . $category->category_count . '</span></a>';
			}
		?>
	</div>
	<?php endif; ?>
	<?php if ( $sidebar_archive == "1" ) : ?>
	<h2 class="nitrostyle-widget-title">文章存档</h2>
	<div class="list-group">
		<?php 
			wp_get_archives("format=custom");
		?>
	</div>
	<?php endif; ?>
</div>