<?php

require_once("settings.php");

function nitrostyle_comment($comment, $args, $depth) {
	$GLOBALS["comment"] = $comment;
	?>
	<li class="list-group-item nitrostyle-comment">
		<?php comment_author_link(); ?>&nbsp<?php comment_reply_link(array_merge( $args, array("reply_text" => "回复", "depth" => $depth, "max_depth" => $args['max_depth']))); ?><br />
		<span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp<?php comment_time("Y-m-d H:i"); ?><br />
		<div class="nitrostyle-comment-content">
			<?php comment_text(); ?>
		</div>
	</li>
	<?php
}

function nitrostyle_post_excerpt($length, $isoutput = true) {
	$post_content = get_the_content();
	$post_content_plain = strip_tags($post_content);
	$output = mb_strimwidth($post_content_plain, 0, $length, "");
	if ($isoutput = true) {
		echo $output;
	} else {
		return $output;
	}
}

?>