<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="renderer" content="webkit">
	<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>" />
	<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<title><?php
		if ( is_home() ) {
			$title = get_bloginfo("name") . " - " . get_bloginfo("description");
		} elseif ( is_search() ){
			$title = "搜索 - " . get_bloginfo("name");
		} elseif ( is_404() ) {
			$title = "找不到页面 - " . get_bloginfo("name");
		} else {
			$title = wp_title("", false) . " - " . get_bloginfo("name");
		}
		echo $title;
	?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo("name"); ?> - RSS - 所有文章" href="<?php bloginfo("rss2_url"); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo("name"); ?> - RSS - 所有评论" href="<?php bloginfo("comments_rss2_url"); ?>" />
	<?php wp_head(); ?>
</head>
<body>
	<div class="container">
		<div class="nitrostyle-header">
			<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nitrostyle-navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a>
				</div>
				<div class="collapse navbar-collapse" id="nitrostyle-navbar">
					<ul class="nav navbar-nav">
						<li<?php if ( is_home() ) : ?> class="active"<?php endif; ?>><a href="<?php bloginfo("url"); ?>#">首页</a></li>
						<?php wp_list_pages("title_li="); ?>
					</ul>
				</div>
			</div>
		</nav>
		</div>
		<div class="row">