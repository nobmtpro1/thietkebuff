<?php
defined('ABSPATH') or die('Invalid request.'); ?>
<h2>Settings</h2>
<form method="post" action="<?php echo admin_url('options.php'); ?>" novalidate="novalidate">
<?php settings_fields($this->optionGroup); ?>
<table class="form-table eoi-table">
<tbody>
<?php
foreach ($this->defaultOptions as $k => $v) {
if (!isset($this->defaultNameOptions[$k]['type']) || $this->defaultNameOptions[$k]['type'] == '') {
$this->defaultNameOptions[$k]['type'] = 'text';
} ?>
<tr>
<th scope="row">
<label for="<?php echo $k; ?>"><?php echo $this->defaultNameOptions[$k]['name']; ?></label>
</th>
<td>
<?php
if ($this->defaultNameOptions[$k]['type'] == 'checkbox') { ?>
<input type="checkbox" id="<?php echo $k; ?>" value="1" <?php checked(1, $this->my_settings[$k]); ?> data-for="<?php echo $k; ?>" /> Active
<input type="hidden" value="1" data-k="<?php echo $k; ?>" name="<?php echo $this->optionName; ?>[<?php echo $k; ?>]" />
<?php } else { ?>
<input type="<?php echo $this->defaultNameOptions[$k]['type']; ?>" id="<?php echo $k; ?>" value="<?php echo esc_attr($this->my_settings[$k]); ?>" name="<?php echo $this->optionName; ?>[<?php echo $k; ?>]">
<?php } ?>
<?php
if (isset($this->defaultNameOptions[$k]['description'])) { ?>
<p class="description"><?php echo $this->defaultNameOptions[$k]['description']; ?></p>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php
do_settings_fields($this->optionGroup, 'default');
do_settings_sections($this->optionGroup, 'default'); ?>
<p>* Note: Default values will be used if custom values are not set.</p>
<table class="form-table">
<tbody>
<tr>
<th scope="row">&nbsp;</th>
<td>
<?php
submit_button(); ?>
</td>
</tr>
</tbody>
</table>
</form>