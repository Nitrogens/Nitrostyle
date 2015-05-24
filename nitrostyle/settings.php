<?php

add_action("admin_menu", "nitrostyle_setting_page");

if ( $_POST['nitrostyle_settings'] == "submited" ) {
	nitrostyle_setting_update();
}

function nitrostyle_setting() {
	$isexcerpt = get_option("nitrostyle_isexcerpt");
	$excerptlength = get_option("nitrostyle_excerptlength");
	?>
	<h2>主题选项</h2>
	<form method="post" action="">
		<h3>文章列表显示方式</h3>
		<input type="radio" <?php if ($isexcerpt == "0") { ?>checked="checked"<?php } ?> name="isexcerpt" value="0" />全文&nbsp <input type="radio" <?php if ($isexcerpt == "1") { ?>checked="checked"<?php } ?> name="isexcerpt" value="1" />摘要
		<?php if ($isexcerpt == "1") { ?>
		<h3>摘要字符数</h3>
		<input type="text" name="excerptlength" value="<?php echo $excerptlength; ?>" />
		<?php } ?>
		<p>
		<input type="submit" name="submit" class="button-primary" value="保存" />
		<input type="hidden" name="nitrostyle_settings" value="submited" />
		</p>
	</form>
	<?php
}

function nitrostyle_setting_init() {
	$isinit = get_option("nitrostyle_isinit");
	if ( $isinit != "1" ) {
		update_option("nitrostyle_isinit", "1");
		update_option("nitrostyle_isexcerpt", "0");
		update_option("nitrostyle_excerptlength", "300");
	}
}

function nitrostyle_setting_page() {
	add_menu_page(__("主题选项"), __("主题选项"), "edit_themes", basename(__FILE__), "nitrostyle_setting");
}

function nitrostyle_setting_update() {
	$isinit = get_option("nitrostyle_isinit");
	if ( $isinit != "1" ) {
		update_option("nitrostyle_isinit", "1");
	} 
	update_option("nitrostyle_isexcerpt", $_POST['isexcerpt']);
	update_option("nitrostyle_excerptlength", $_POST['excerptlength']);
}

?>