<?php
defined('ABSPATH') or die('Invalid request.'); ?>
<h2>Compression</h2>
<?php
$wp_upload_dir = wp_upload_dir();
global $wpdb;
$sql = $wpdb->get_results("SELECT COUNT(ID) AS c
FROM
`" . $wpdb->posts . "`
WHERE
post_type = 'attachment'", OBJECT);
$total_post = $sql[0]->c;
if ($total_post > 0) {
$post_per_page = 50;
$trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
if (!is_numeric($trang)) {
$trang = 1; }
$totalPage = ceil($total_post / $post_per_page);
if ($trang > $totalPage) {
$trang = $totalPage;
} else if ($trang < 1) {
$trang = 1; }
$offset = ($trang - 1) * $post_per_page;
if ($offset < 0) {
$offset = 0; }
$sql = $wpdb->get_results("SELECT *
FROM
`" . $wpdb->posts . "`
WHERE
post_type = 'attachment'
ORDER BY
ID ASC
LIMIT " . $offset . ", " . $post_per_page, OBJECT);
$all_sizes = get_intermediate_image_sizes();
$all_sizes[] = 'full';
$all_sizes = array_reverse($all_sizes); ?>
<div>
<input type="button" class="button button-secondary button-large button-compression" onclick="return each_to_compression();" value="Begin compression">
</div>
<ul class="compression-contents">
<?php
$home_url = get_home_url();
$abs_path = rtrim(ABSPATH, '/');
foreach ($sql as $v) {
$prev_filename = '';
foreach ($all_sizes as $v2) {
$a = wp_get_attachment_image_src($v->ID, $v2);
if ($prev_filename == $a[0]) {
continue; }
$prev_filename = $a[0];
$filepath = str_replace($home_url, $abs_path, $prev_filename);
if (!file_exists($filepath)) { ?>
<li title="Path not found!" class="em"><?php echo $prev_filename; ?></li>
<?php
continue; }
$fsize = getimagesize($filepath);
$cl = 'each-to-compression';
if ($v2 == 'full') {
$cl .= ' bold';
} ?>
<li data-size="size-<?php echo $v2 . $v->ID; ?>" data-uri="<?php echo $prev_filename; ?>" data-path="<?php echo $filepath; ?>" class="<?php echo $cl; ?>"><a href="<?php echo $prev_filename; ?>" target="_blank"><?php echo $prev_filename; ?></a> (<?php echo $fsize[0] . 'x' . $fsize[1]; ?> ~<?php echo ceil(filesize($filepath) / 1000); ?>kb)</li>
<?php
}
} ?>
</ul>
<br>
<div>
<input type="button" class="button button-secondary button-large button-compression" onclick="return each_to_compression();" value="Begin compression">
</div>
<?php
}
function EOI_get_sub_dir_in_uploads($dir)
{
foreach (glob(rtrim($dir, '/') . '/*') as $d) {
if (is_dir($d) && is_numeric(basename($d))) { ?>
<li><?php echo str_replace(ABSPATH, '', $d); ?></li>
<?php
EOI_get_sub_dir_in_uploads($d); }
}
} ?>
<!--
<ul>
<?php
?>
</ul>
-->