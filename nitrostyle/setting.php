<?php

add_action("admin_menu", "nitrostyle_setting_page");

if ( $_POST['nitrostyle_setting'] == "submited" ) {
	nitrostyle_setting_update();
}

function nitrostyle_setting() {
	$isexcerpt = get_option("nitrostyle_isexcerpt");
	$excerptlength = get_option("nitrostyle_excerptlength");
	$sidebar_newest = get_option("nitrostyle_sidebar_newest");
	$sidebar_category = get_option("nitrostyle_sidebar_category");
	$sidebar_archive = get_option("nitrostyle_sidebar_archive");
	?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/setting.css" />
	<div class="nitrostyle-setting">
		<h2>主题选项</h2>
		<hr />
		<form method="post" action="">
			<table class="form-table">
				<tr>
					<td><label>文章列表显示方式</label></td>
					<td><input type="radio" <?php if ($isexcerpt == "0") { ?>checked="checked"<?php } ?> name="isexcerpt" value="0" />全文&nbsp <input type="radio" <?php if ($isexcerpt == "1") { ?>checked="checked"<?php } ?> name="isexcerpt" value="1" />摘要</td>
				</tr>
				<?php if ($isexcerpt == "1") { ?>
				<tr>
					<td><label for="excerptlength">摘要字符数</label></td>
					<td><input type="text" name="excerptlength" id="excerptlength" value="<?php echo $excerptlength; ?>" /></td>
				</tr>
				<tr>
					<td><label>是否显示最新文章</label></td>
					<td><input type="radio" <?php if ($sidebar_newest == "1") { ?>checked="checked"<?php } ?> name="sidebar_newest" value="1" />是&nbsp <input type="radio" <?php if ($sidebar_newest == "0") { ?>checked="checked"<?php } ?> name="sidebar_newest" value="0" />否</td>
				</tr>
				<tr>
					<td><label>是否显示文章分类</label></td>
					<td><input type="radio" <?php if ($sidebar_category == "1") { ?>checked="checked"<?php } ?> name="sidebar_category" value="1" />是&nbsp <input type="radio" <?php if ($sidebar_category == "0") { ?>checked="checked"<?php } ?> name="sidebar_category" value="0" />否</td>
				</tr>
				<tr>
					<td><label>是否显示文章存档</label></td>
					<td><input type="radio" <?php if ($sidebar_archive == "1") { ?>checked="checked"<?php } ?> name="sidebar_archive" value="1" />是&nbsp <input type="radio" <?php if ($sidebar_archive == "0") { ?>checked="checked"<?php } ?> name="sidebar_archive" value="0" />否</td>
				</tr>
				<?php } ?>			
			</table>
			<p>
			<input type="submit" name="submit" class="button-primary" value="保存" />
			<input type="hidden" name="nitrostyle_setting" value="submited" />
			</p>
		</form>
	</div>
	<?php
}

function nitrostyle_setting_init() {
	$isinit = get_option("nitrostyle_isinit");
	if ( $isinit != "1" ) {
		update_option("nitrostyle_isinit", "1");
		update_option("nitrostyle_isexcerpt", "0");
		update_option("nitrostyle_excerptlength", "300");
		update_option("nitrostyle_sidebar_newest", "1");
		update_option("nitrostyle_sidebar_category", "1");
		update_option("nitrostyle_sidebar_archive", "1");
	}
}

function nitrostyle_setting_page() {
	add_menu_page(__("Nitrostyle"), __("Nitrostyle"), "edit_themes", "nitrostyle", "");
	add_submenu_page("nitrostyle", __("主题选项"), __("主题选项"), "edit_themes", "nitrostyle_setting", "nitrostyle_setting");
	remove_submenu_page("nitrostyle", "nitrostyle");
}

function nitrostyle_setting_update() {
	$isinit = get_option("nitrostyle_isinit");
	if ( $isinit != "1" ) {
		update_option("nitrostyle_isinit", "1");
	} 
	update_option("nitrostyle_isexcerpt", $_POST['isexcerpt']);
	update_option("nitrostyle_excerptlength", $_POST['excerptlength']);
	update_option("nitrostyle_sidebar_newest", $_POST['sidebar_newest']);
	update_option("nitrostyle_sidebar_category", $_POST['sidebar_category']);
	update_option("nitrostyle_sidebar_archive", $_POST['sidebar_archive']);
}

?>