<?php
if(!defined('ABSPATH'))
{
	exit;
} 
include('Common_Admin.php');
?>
<?php 
$apikey = get_option('NativeFeeds_apikey');
	wp_nonce_field( basename( __FILE__ ), 'native_settings_nonce' );
	// Checks save status
    $is_valid_nonce = ( isset( $_POST[ 'native_settings_nonce' ] ) && wp_verify_nonce( $_POST[ 'native_settings_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
	if ( $is_valid_nonce && isset( $_POST[ 'NativeFeeds_apikey' ] ) && current_user_can('administrator')) {
		$apikey=sanitize_text_field($_POST['NativeFeeds_apikey']);
	    update_option('NativeFeeds_apikey', $apikey);
		echo '<div class="alert alert-success"><strong>Saved Successfully!</strong></div>';	
    }
?>		
<div class="container row">
	<div class="page-header">
		<h1> Settings</h1>
	</div>
	<form class="form-horizontal col-sm-6" name="" method="post" action="">	
		<div class="form-group">
			<label for="NativeFeeds_apikey" class="col-sm-2 control-label">API Key:</label>
			<div class="col-sm-10">
				<input type="text" name="NativeFeeds_apikey"  class="form-control" value="<?php if(! empty($apikey)) echo esc_attr($apikey)?>" size="50">
			</div>
		</div>
		<div id="diva"></div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="update" value="Save"  class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
