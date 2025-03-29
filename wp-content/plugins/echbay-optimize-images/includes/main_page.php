<?php
defined('ABSPATH') or die('Invalid request.'); ?>
<link rel="stylesheet" href="<?php echo $this->get_url_static_file('admin.css'); ?>" type="text/css" />
<div class="wrap eoi-wrap">
<h1><?php echo EOI_THIS_PLUGIN_NAME; ?></h1>
<p>Speed up your website. Optimize your JPEG, PNG images with EchBay.</p>
<ul class="eoi-tabs-label">
<li data-for="settings">Settings</li>
<li data-for="compression">Compression</li>
</ul>
<div class="eoi-tabs-contents eoi-tabs-settings">
<?php
include __DIR__ . '/settings_page.php'; ?>
</div>
<div class="eoi-tabs-contents eoi-tabs-compression">
<?php
include __DIR__ . '/compression_page.php'; ?>
</div>
</div>
<br>
<script>
var arr_my_settings = <?php echo json_encode($this->my_settings); ?>
</script>
<script src="<?php echo $this->get_url_static_file('admin.js'); ?>" defer></script>
<p>* Other <a href="<?php echo admin_url('plugin-install.php'); ?>?s=itvn9online&tab=search&type=author" target="_blank">WordPress Plugins</a> written by the same author. Thanks for choose us!</p>