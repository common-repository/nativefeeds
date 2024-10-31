<?php 
if(!defined('ABSPATH'))
{
	exit;
}
?>
  <section class="top-merchants clearfix  wow fadeIn" data-wow-duration="1s" data-wow-delay="2s">
    <ul>
<div class="home-merchant clearfix">
	<ul>
		<?php
		try
		{
		include('Helper.php');
		$count = 0;
		$nativeclass = new nativefeeds_Plugin();
		$ordder = get_post_meta(65,'native_order_merchants');
		$results = get_post_meta(65,'native_joined_merchants',true);
		$merchant = $results['Merchants']['Merchant'];		
		$native_premium_merchant = $merchant;
		$rt = count($native_premium_merchant);
		$offers = get_post_meta(65,'native_all_offers',true);
		$alloffers = $offers['Deals']['Deal'];
		foreach($ordder[0] as $item)
		{
			if(!empty($native_premium_merchant[$item]))
			{
				$MerchantLogoURL= $native_premium_merchant[$item]['MerchantLogoURL'];
				$MerchantName =$native_premium_merchant[$item]['MerchantName'];
				$searchword = $MerchantName;
				$merchantoffers = array_filter($alloffers, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['MerchantName']); });			
				$offerscount = count($merchantoffers);
				echo '<li><a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'/"><img class="img-responsive center-block" src="'.$MerchantLogoURL.'" alt="'.$MerchantName.'" title="'.$MerchantName.'"/><span>'.$offerscount.' offers</span></a></li> ';
				$count++;
				if($count>15)
				{break;}
			}
		}
			}
			catch(Exception $e)
			{
				echo 'No data is available.';
			}
			?>
</ul>
</div>
    </ul>
  </section>

			
			
			 