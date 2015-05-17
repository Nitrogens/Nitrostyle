<div class="col-md-4">
	<h2 class="nitrostyle-widget-title nitrostyle-widget-title-top">最新文章</h2>
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
	<h2 class="nitrostyle-widget-title">文章分类</h2>
	<div class="list-group">
		<?php 
			$categories_list_array = get_categories("orderby=id&hide_empty=0");
			foreach ( $categories_list_array as $category ) {
				echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '<span class="badge">' . $category->category_count . '</span></a>';
			}
		?>
	</div>
	<h2 class="nitrostyle-widget-title">文章存档</h2>
	<div class="list-group">
		<?php 
			wp_get_archives("format=custom");
		?>
	</div>
</div>