<?php
if(!defined('ABSPATH'))
{
	exit;
} 
include('Common_Admin.php');
?>
<?php 
$nativefeedstitle = '';
$nativefeedskeywords = '';
$nativefeedsdescription = '';
$nativefeedspage = '';
	wp_nonce_field( basename( __FILE__ ), 'nativefeeds_SEOsettings_nonce' );
	// Checks save status
    $is_valid_nonce = ( isset( $_POST[ 'nativefeeds_SEOsettings_nonce' ] ) && wp_verify_nonce( $_POST[ 'nativefeeds_SEOsettings_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
	if ( $is_valid_nonce && isset( $_POST[ 'NativeFeeds_pageselect' ] ) && isset( $_POST[ 'NativeFeeds_title' ] ) && isset( $_POST[ 'NativeFeeds_description' ] ) && isset( $_POST[ 'NativeFeeds_keywords' ] ) && current_user_can('administrator')) {
		$nativefeedspage = sanitize_text_field($_POST['NativeFeeds_pageselect']);
		$nativefeedstitle = sanitize_text_field($_POST['NativeFeeds_title']);
	   update_option($nativefeedspage.'-title', $nativefeedstitle);
	   		$nativefeedskeywords = sanitize_text_field($_POST['NativeFeeds_keywords']);
	   update_option($nativefeedspage.'-keywords', $nativefeedskeywords);
	   		$nativefeedsdescription = sanitize_text_field($_POST['NativeFeeds_description']);
	   update_option($nativefeedspage.'-description', $nativefeedsdescription);
		echo '<div class="alert alert-success"><strong>Saved Successfully!</strong></div>';	
    }
	?>		
<div class="container row">
	<div class="page-header">
		<h1>NativeFeeds SEO</h1>
	</div>
	<form class="form-horizontal col-sm-6" name="" method="post" action="">	
			<div class="form-group">
			<label for="NativeFeeds_select" class="col-sm-2 control-label">Select:</label>
			<div class="col-sm-10">
			<select id="nativeselect"  class="form-control" name="NativeFeeds_pageselect">
			<option value="NativeFeeds-Home">NativeFeeds-Home</option>
			<option value="NativeFeeds-Category">NativeFeeds-Category</option>
			<option value="NativeFeeds-Merchant">NativeFeeds-Merchant</option>
			<option value="NativeFeeds-Store">NativeFeeds-Store</option>
			</select>
			</div>
			</div>
		<div class="form-group">
			<label for="NativeFeeds_title" class="col-sm-2 control-label">TiTle:</label>
			<div class="col-sm-10">
				<input type="text" name="NativeFeeds_title" id= "nativetitle"  class="form-control" value="<?php echo get_option('NativeFeeds-Home-title'); ?>" size="50">
			</div>
		</div>
		<div class="form-group">
			<label for="NativeFeeds_keywords" class="col-sm-2 control-label">KeyWords:</label>
			<div class="col-sm-10">
				<input type="text" name="NativeFeeds_keywords" id="nativekeywords"  class="form-control" value="<?php echo get_option('NativeFeeds-Home-keywords'); ?>" size="50">
			</div>
		</div>
		<div class="form-group">
			<label for="NativeFeeds_description" class="col-sm-2 control-label">Description:</label>
			<div class="col-sm-10">
				<input type="text" name="NativeFeeds_description" id="nativedescription"  class="form-control" value="<?php echo get_option('NativeFeeds-Home-description'); ?>" size="50">
			</div>
		</div>
		<div id="diva"></div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="update" value="Save" class="btn btn-primary" >
			</div>
		</div>
	</form>
</div>
<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$( document ).ready(function() {
        $("#nativeselect").change(function () {
			var Titlevalue ='';
			var Keywordsvalue='';
			var Descriptionvalue='';
            var selectedValue = $(this).val();
			debugger;
			if(selectedValue=='NativeFeeds-Home')
			{
				Titlevalue = "<?php echo get_option('NativeFeeds-Home-title'); ?>";
				Keywordsvalue = "<?php echo get_option('NativeFeeds-Home-keywords'); ?>";
				Descriptionvalue = "<?php echo get_option('NativeFeeds-Home-description'); ?>";
			}
			if(selectedValue=='NativeFeeds-Category')
			{
				Titlevalue = "<?php echo get_option('NativeFeeds-Category-title'); ?>";
				Keywordsvalue = "<?php echo get_option('NativeFeeds-Category-keywords'); ?>";
				Descriptionvalue = "<?php echo get_option('NativeFeeds-Category-description'); ?>";
			}
			if(selectedValue=='NativeFeeds-Merchant')
			{
				Titlevalue = "<?php echo get_option('NativeFeeds-Merchant-title'); ?>";
				Keywordsvalue = "<?php echo get_option('NativeFeeds-Merchant-keywords'); ?>";
				Descriptionvalue = "<?php echo get_option('NativeFeeds-Merchant-description'); ?>";
			}
			if(selectedValue=='NativeFeeds-Store')
			{
				Titlevalue = "<?php echo get_option('NativeFeeds-Store-title'); ?>";
				Keywordsvalue = "<?php echo get_option('NativeFeeds-Store-keywords'); ?>";
				Descriptionvalue = "<?php echo get_option('NativeFeeds-Store-description'); ?>";
			}
            $("#nativetitle").val(Titlevalue);
			$("#nativekeywords").val(Keywordsvalue);
			$("#nativedescription").val(Descriptionvalue);
        });
    });
</script>
