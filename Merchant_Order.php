<?php
if(!defined('ABSPATH'))
{
	exit;
} 
include('Common_Admin.php');
?>
<?php 
wp_nonce_field( basename( __FILE__ ), 'native_order_nonce' );
	// Checks save status
    $is_valid_nonce = ( isset( $_POST[ 'native_order_nonce' ] ) && wp_verify_nonce( $_POST[ 'native_order_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
	if ( $is_valid_nonce && isset( $_POST[ 'order' ] ) && current_user_can('administrator')) {
		$newordering=$_POST['order'];
	   update_post_meta(65,'native_order_merchants',$newordering);
	   echo '<div class="alert alert-success"><strong>Merchant Ordering Saved Successfully!</strong></div>';
    }
	?>
<div class="container row">
	<div class="page-header">
		<h1> Merchant Order</h1>
	</div>
	<form class="form-horizontal col-sm-12" name="" method="post" action="">			
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
  $( function(){
    $( "#sortable" ).sortable({
      revert: true
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();
  });
  </script>
		<?php 
		$ordder = get_post_meta(65,'native_order_merchants');
		$results = get_post_meta(65,'native_joined_merchants',true);
		$merchant = $results['Merchants']['Merchant'];
		function native_premium_merchant_filter($var)
		{
		return $var['Premium']=='true';
		}
		$native_premium_merchant = $merchant;
		$rt = count($native_premium_merchant);
		$counter = 0;
		echo '<ul id="sortable">';
		foreach($ordder[0] as $item)
		{
			if(!empty($native_premium_merchant[$item]))
			{
			$MerchantLogoURL= $native_premium_merchant[$item]['MerchantLogoURL'];
			$MerchantName = $native_premium_merchant[$item]['MerchantName'];
			echo '<div class="well well-sm"><li class="ui-state-default"><img class="img-responsive" src="'.$MerchantLogoURL.'" alt="'.$MerchantName.'" title="'.$MerchantName.'"/></li><input type="hidden" name="order[]" value="'.$item.'"></div>';
			}
		$counter++;
			if($counter == 16)
			{
				break;
			}
		}
echo '</ ul>';
		?>
		<div id="diva"></div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" name="update" value="Save Order" class="btn btn-primary">
			</div>
		</div>
	</form>
</div>
