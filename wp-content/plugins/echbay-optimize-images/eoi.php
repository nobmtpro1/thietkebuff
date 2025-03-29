<?php
/**
* Plugin Name: EchBay - JPEG, PNG image compression
* Description: Speed up your website. Optimize your JPEG, PNG images with EchBay
* Plugin URI: https://www.facebook.com/groups/wordpresseb
* Plugin Facebook page: https://www.facebook.com/webgiare.org
* Author: Dao Quoc Dai
* Author URI: https://www.facebook.com/ech.bay/
* Version: 1.1.2
* Text Domain: webgiareorg
* Domain Path: /languages/
* License: GPLv2 or later
* Document: https://developers.google.com/speed/docs/insights/OptimizeImages
* https://www.imagemagick.org/script/convert.php
*/
defined('ABSPATH') or die('Invalid request.');
define('EOI_DF_VERSION', '1.1.2');
define('EOI_THIS_PLUGIN_NAME', 'EchBay - JPEG, PNG image compression');
if (!class_exists('EOI_Actions_Module')) {
class EOI_Actions_Module
{
public $plugin_path = '';
public $optionName = 'eoi_options';
public $optionGroup = 'eoi-options-group';
public $defaultOptions = array(
'api_key' => '',
'compression_number' => 80,
'resize_original' => '1',
'max_width' => 2048,
'max_height' => 2048,
);
public $minOptions = array(
'compression_number' => 50,
'max_width' => 350,
'max_height' => 350,
);
public $defaultNameOptions = array(
'api_key' => [
'name' => 'API key',
],
'compression_number' => [
'name' => 'Compression to',
'type' => 'number',
],
'resize_original' => [
'name' => 'Resize the original image',
'type' => 'checkbox',
'description' => 'Save space by setting a maximum width and height for all images uploaded.',
],
'max_width' => [
'name' => 'Max Width',
'type' => 'number',
'description' => 'If <strong>Resize the original image</strong> is turned on, the image will be resized with <strong>Max Width</strong>.',
],
'max_height' => [
'name' => 'Max Height',
'type' => 'number',
'description' => 'If <strong>Resize the original image</strong> is turned on, the image will be resized with <strong>Max Height</strong>.',
],
);
public $my_settings = [];
public $plugin_page = 'echbay-image-compression';
public function __construct()
{
$this->my_settings = $this->get_my_options();
add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_action_links'), 10, 2);
add_action('admin_menu', array($this, 'admin_menu'));
add_action('admin_init', array($this, 'register_my_settings')); }
public function add_action_links($links)
{
if (strpos($_SERVER['REQUEST_URI'], '/plugins.php') !== false) {
$settings_link = '<a href="' . admin_url('options-general.php?page=' . $this->plugin_page) . '" title="Settings">Settings</a>';
array_unshift($links, $settings_link); }
return $links; }
public function admin_menu()
{
add_options_page(
EOI_THIS_PLUGIN_NAME,
EOI_THIS_PLUGIN_NAME,
'manage_options',
$this->plugin_page,
array(
$this,
'main_page'
)
); }
public function register_my_settings()
{
register_setting($this->optionGroup, $this->optionName); }
public function get_my_options()
{
$result = wp_parse_args(get_option($this->optionName), $this->defaultOptions);
foreach ($result as $k => $v) {
if ($v == '' && isset($this->defaultOptions[$k]) && $v != $this->defaultOptions[$k]) {
$result[$k] = $this->defaultOptions[$k];
} else if (isset($this->minOptions[$k]) && $v < $this->minOptions[$k]) {
$result[$k] = $this->minOptions[$k]; }
}
return $result; }
public function main_page()
{
include __DIR__ . '/includes/main_page.php'; }
public function get_url_static_file($f)
{
if ($this->plugin_path == '') {
$this->plugin_path = plugin_dir_path(__FILE__); }
return str_replace(ABSPATH, get_home_url() . '/', $this->plugin_path) . $f . '?v=' . filemtime($this->plugin_path . $f); }
}
if (is_admin()) {
$EOI_func = new EOI_Actions_Module(); }
}