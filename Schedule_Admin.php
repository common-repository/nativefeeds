<?php
if(!defined('ABSPATH'))
{
	exit;
} 
include('Common_Admin.php');
?>
<?php 
$interval = get_option('NativeFeeds_Shedule_Ticker');
	wp_nonce_field( basename( __FILE__ ), 'native_schedule_nonce' );
?>
<?php
	// Checks save status
    $is_valid_nonce = ( isset( $_POST[ 'native_schedule_nonce' ] ) && wp_verify_nonce( $_POST[ 'native_schedule_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
	if ( $is_valid_nonce && isset( $_POST[ 'NativeFeeds_Shedule_Ticker' ] ) && current_user_can('administrator')) {
		if(is_numeric($_POST['NativeFeeds_Shedule_Ticker']))
		{
		$interval=sanitize_text_field($_POST['NativeFeeds_Shedule_Ticker']);
	    update_option('NativeFeeds_Shedule_Ticker', $interval);
		echo '<div class="alert alert-success"><strong>Saved Successfully!</strong></div>';
		}
    }
?>
<div class="container row">
  <div class="page-header">
    <h1> Schedule Event</h1>
  </div>
<div class="container row">
	<form class="form-horizontal col-sm-6" name="" method="post" action="">	
		<div class="form-group">
			<label for="NativeFeeds_Shedule_Ticker" class="col-sm-2 control-label">hours:</label>
			<div class="col-sm-10">
			<select class="form-control" name="NativeFeeds_Shedule_Ticker">
			<option value="3600" <?php if (!empty($interval) && esc_attr($interval) == '3600')  echo 'selected = "selected"'; ?>>1</option>
			<option value="7200" <?php if (!empty($interval) && esc_attr($interval) == '7200')  echo 'selected = "selected"'; ?>>2</option>
			<option value="10800" <?php if (!empty($interval) && esc_attr($interval) == '10800')  echo 'selected = "selected"'; ?>>3</option>
			<option value="14400" <?php if (!empty($interval) && esc_attr($interval) == '14400')  echo 'selected = "selected"'; ?>>4</option>
			<option value="18000" <?php if (!empty($interval) && esc_attr($interval) == '18000')  echo 'selected = "selected"'; ?>>5</option>
			<option value="21600" <?php if (!empty($interval) && esc_attr($interval) == '21600')  echo 'selected = "selected"'; ?>>6</option>
			<option value="25200" <?php if (!empty($interval) && esc_attr($interval) == '25200')  echo 'selected = "selected"'; ?>>7</option>
			<option value="28800" <?php if (!empty($interval) && esc_attr($interval) == '28800')  echo 'selected = "selected"'; ?>>8</option>
			<option value="32400" <?php if (!empty($interval) && esc_attr($interval) == '32400')  echo 'selected = "selected"'; ?>>9</option>
			<option value="36000" <?php if (!empty($interval) && esc_attr($interval) == '36000')  echo 'selected = "selected"'; ?>>10</option>
			<option value="39600" <?php if (!empty($interval) && esc_attr($interval) == '39600')  echo 'selected = "selected"'; ?>>11</option>
			<option value="43200" <?php if (!empty($interval) && esc_attr($interval) == '43200')  echo 'selected = "selected"'; ?>>12</option>
			</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="update" value="Save" class="btn btn-primary" >
			</div>
		</div>
	</form>
</div>
</div>
