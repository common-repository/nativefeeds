	<?php
	if(!defined('ABSPATH'))
{
	exit;
}
	try
	{		
		include('Configration.php');
		include('Helper.php');
		$apikey = get_option('NativeFeeds_apikey');
		$ch = curl_init();
		$timeout = 0; // set to zero for no timeout
		$tempserviceURL=$serviceUrl.$apikey.'/GetDeals/xml?PageNo=0&PageSize=0&SortBy=Start';
		curl_setopt ($ch, CURLOPT_URL, $tempserviceURL);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$xml_raw  = curl_exec($ch);
		$xml = simplexml_load_string($xml_raw);
		$json     = json_encode( $xml );
		$options  = json_decode( $json, TRUE );
		update_post_meta(65,'native_all_offers',$options);
		
		curl_setopt ($ch, CURLOPT_URL, "$serviceUrl$apikey/GetHeaderCategories/xml");
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$xml_raw  = curl_exec($ch);
		$xml = simplexml_load_string($xml_raw);
		$json     = json_encode( $xml );
		$options  = json_decode( $json, TRUE );
		update_post_meta(65,'native_category_menu',$options);
		
		curl_setopt ($ch, CURLOPT_URL, "$serviceUrl$apikey/GetCategories/xml?PageNo=1&PageSize=20&Top=true");
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$xml_raw  = curl_exec($ch);
		$xml = simplexml_load_string($xml_raw);
		$json = json_encode($xml);
		$option = json_decode($json,TRUE);
		update_post_meta(65,'native_top_categories',$option);
		
		curl_setopt ($ch, CURLOPT_URL, "$serviceUrl$apikey/GetMerchants/xml");
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$xml_raw  = curl_exec($ch);
		$xml = simplexml_load_string($xml_raw);
		$json = json_encode($xml);
		$options = json_decode($json, TRUE);
		update_post_meta(65,'native_all_merchants',$options);
		
		curl_setopt ($ch, CURLOPT_URL, "$serviceUrl$apikey/GetMerchants/xml?RelationType=JOINED&Popular=true");
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$xml_raw  = curl_exec($ch);
		$xml = simplexml_load_string($xml_raw);
		curl_close($ch);
		$json = json_encode($xml);
		$option = json_decode($json,TRUE);
		update_post_meta(65,'native_joined_merchants',$option);
		$results = get_post_meta(65,'native_joined_merchants',true);
		if(!empty($results['Merchants']['Merchant']))
		{
		$merchant = $results['Merchants']['Merchant'];
		$native_premium_merchant = $merchant;
		$native_order_merchants =	get_post_meta(65,'native_order_merchants');
		if(empty($native_order_merchants))
		{
		update_post_meta(65,'native_order_merchants',array_keys($native_premium_merchant));
		}
		}
		update_post_meta(65,'native_tick',current_time('timestamp'));
		update_post_meta(65,'native_last_updation',current_time('mysql'));
	}	
	catch(Exception $e)
		{
			echo 'No data is available.';
		}
?>
