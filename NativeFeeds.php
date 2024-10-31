<?php
/*
Plugin Name: NativeFeeds
Plugin URI: https://wordpress.org/plugins/nativefeeds
Description: NativeFeeds WordPress theme is a definite answer to your desire of having your own, fully functional coupon code site. NativeFeeds WordPress theme as well as highly advanced WP Plugin build highly creative combination that ensures not only the coupon code website, but also would play a critical role in attracting and retaining customers.
Author: NativeFeeds
Version: 2.4
Author URI: http://www.nativemedia.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
//Exit if someone acess directly
if(!defined('ABSPATH'))
{
	exit;
}
 function native_admin_actions() {if(current_user_can('administrator')){
        add_menu_page("NativeFeeds","NativeFeeds", 'manage_options', "native_page_of_admin", "native_page_of_admin","dashicons-chart-line",5);
        add_submenu_page("native_page_of_admin","","Settings",'manage_options', "native_page_of_admin", "native_page_of_admin");
        add_submenu_page("native_page_of_admin", "Schedule","Schedule", 'manage_options', "native_page_of_schedule", "native_page_of_schedule");
		add_submenu_page("native_page_of_admin", "NativeFeeds SEO","NativeFeeds SEO", 'manage_options', "native_page_of_SEO_Settings", "native_page_of_SEO_Settings");
		add_submenu_page("native_page_of_admin", "NativeFeeds Images","NativeFeeds Images", 'manage_options', "native_page_of_Images", "native_page_of_Images");
		add_submenu_page("native_page_of_admin", "NativeFeeds Merchant","NativeFeeds Merchant", 'manage_options', "native_page_of_Merchant", "native_page_of_Merchant");
 }
		add_submenu_page("native_page_of_admin", "Shortcodes","Shortcodes", 'manage_options', "native_page_of_shortcodes_admin", "native_page_of_shortcodes_admin");
	}
	
    function native_page_of_admin(){
      require_once( plugin_dir_path( __File__ ) . 'Settings_Admin.php');
    }
    function native_page_of_shortcodes_admin() {
        require_once( plugin_dir_path( __File__ ) . 'Shortcodes_Admin.php');
    }
	function native_page_of_schedule(){
	require_once( plugin_dir_path( __FILE__ ) . 'Schedule_Admin.php' );
	}
	function native_page_of_SEO_Settings(){
	require_once( plugin_dir_path( __FILE__ ) . 'Seo_Settings.php' );
	}
	function native_page_of_Images(){
	require_once( plugin_dir_path( __FILE__ ) . 'Image_Settings.php');
	}
	function native_page_of_Merchant(){
	require_once( plugin_dir_path( __FILE__ ) . 'Merchant_Order.php');
	}	
    add_action('admin_menu', 'native_admin_actions');
		
	register_activation_hook( __FILE__, 'native_page_adder');
function native_page_adder()
  {
update_post_meta(65,'nativefeeds_slider_one_url','#');	
update_post_meta(65,'nativefeeds_slider_two_url','#');
update_post_meta(65,'nativefeeds_slider_three_url','#');
	
  }
   //post status and options
    //**********Short Codes Definition***********//	
	
function native_short_codes_init()
{
  function native_title_shortcode(){	
	$nativedate = get_post_meta(65,'native_last_updation',true);
	$showdata='';
	if(is_page('home'))
	{  
	$native_title = get_option('NativeFeeds-Home-title');
	if($native_title==false)
	{
	update_option('NativeFeeds-Home-title','Exclusive-Offers Voucher Codes for ' .date('F, Y', strtotime($nativedate)));
	}
		$showdata = get_option('NativeFeeds-Home-title');
	}
	if(is_page('merchant'))
	{
	$native_title = get_option('NativeFeeds-Merchant-title');	
	if($native_title==false)
	{
	update_option('NativeFeeds-Merchant-title','Voucher Codes for ');
	}
	if(!empty($_REQUEST['mer']))
	{ $showdata = $_REQUEST['mer']. ' ' .get_option('NativeFeeds-Merchant-title'). ' ' .date('F, Y', strtotime($nativedate)); }
	else{
	$showdata = 'Exclusive-Offers '.get_option('NativeFeeds-Merchant-title'). ' ' .date('F, Y', strtotime($nativedate));}
	}
	if(is_page('category'))
	{
	$native_title = get_option('NativeFeeds-Category-title');	
	if($native_title==false)
	{
	update_option('NativeFeeds-Category-title','Voucher Codes for ');
	}
	if(!empty($_REQUEST['cat']))
	{ $showdata = $_REQUEST['cat']. ' ' .get_option('NativeFeeds-Category-title'). ' ' .date('F, Y', strtotime($nativedate)); }
	else{
	$showdata = 'Exclusive-Offers '.get_option('NativeFeeds-Category-title'). ' ' .date('F, Y', strtotime($nativedate));}
	}
	if(is_page('store'))
	{
	$native_title = get_option('NativeFeeds-Store-title');
	if($native_title==false)
	{
	update_option('Store-title','Voucher Codes for ');
	}
	$showdata = 'Exclusive-Offers '.get_option('NativeFeeds-Store-title'). ' ' .date('F, Y', strtotime($nativedate));
	}
      echo $showdata;
    }
     add_shortcode('native_title', 'native_title_shortcode');
	 
  function native_keyword_shortcode(){
	$nativedate = get_post_meta(65,'native_last_updation',true);
	$showdata='';
	if(is_page('home'))
	{
	$native_title = get_option('NativeFeeds-Home-keywords');
	if($native_title==false)
	{
	update_option('NativeFeeds-Home-keywords','vouchers, coupons, discounts, offers, deals, promo codes, topcashback, cashback, discount coupon, cashback website, cashback paying website, coupons, vouchers, discounts, offers, deals, promo codes, online shopping');
	}
		$showdata = get_option('NativeFeeds-Home-keywords');
	}
	if(is_page('merchant'))
	{  
	$native_title = get_option('NativeFeeds-Merchant-keywords');
	if($native_title==false)
	{
	update_option('NativeFeeds-Merchant-Keywords','vouchers, coupons, discounts, offers, deals, promo codes, topcashback, cashback, discount coupon, cashback website, cashback paying website, coupons, vouchers, discounts, offers, deals, promo codes, online shopping ');
	}
	if(!empty($_REQUEST['mer']))
	{ $showdata = $_REQUEST['mer']. ', ' .get_option('Merchant-keywords'); }
	else{
	$showdata = get_option('NativeFeeds-Merchant-keywords');}
	}
	if(is_page('category'))
	{
	$native_title = get_option('NativeFeeds-Category-keywords');
	if($native_title==false)
	{
	update_option('NativeFeeds-Category-keywords','vouchers, coupons, discounts, offers, deals, promo codes, topcashback, cashback, discount coupon, cashback website, cashback paying website, coupons, vouchers, discounts, offers, deals, promo codes, online shopping');
	}
	if(!empty($_REQUEST['cat']))
	{ $showdata = $_REQUEST['cat']. ' ,' .get_option('NativeFeeds-Category-keywords'); }
	else
		{$showdata = get_option('NativeFeeds-Category-keywords');}
	}
	if(is_page('store'))
	{  
	$native_title = get_option('NativeFeeds-Store-keywords');
	if($native_title==false)
	{
	update_option('NativeFeeds-Store-keywords','vouchers, coupons, discounts, offers, deals, promo codes, topcashback, cashback, discount coupon, cashback website, cashback paying website, coupons, vouchers, discounts, offers, deals, promo codes, online shopping');
	}
	$showdata = get_option('NativeFeeds-Store-keywords');
	}
      echo $showdata;
    }
     add_shortcode('native_keyword', 'native_keyword_shortcode');
	 
  function native_description_shortcode(){
	$nativedate = get_post_meta(65,'native_last_updation',true);
	$showdata='';
	if(is_page('home'))
	{
	$native_title = get_option('NativeFeeds-Home-description');
	if($native_title==false)
	{
	update_option('NativeFeeds-Home-description','Voucher Codes and Offers');
	}
		$showdata = get_option('NativeFeeds-Home-description');
	}
	if(is_page('merchant'))
	{  
	$native_title = get_option('NativeFeeds-Merchant-description');	
	if($native_title==false)
	{
	update_option('NativeFeeds-Merchant-description','Voucher Codes and Offers');
	}
	if(!empty($_REQUEST['mer']))
	{ $showdata = $_REQUEST['mer']. ', ' .get_option('Merchant-description'); }
	else{
	$showdata = get_option('NativeFeeds-Merchant-description');}
	}
	if(is_page('category'))
	{  
	$native_title = get_option('NativeFeeds-Category-description');
	if($native_title==false)
	{
	update_option('NativeFeeds-Category-description','Voucher Codes and Offers');
	}
	if(!empty($_REQUEST['cat']))
	{ $showdata = $_REQUEST['cat']. ' ,' .get_option('NativeFeeds-Category-description'); }
	else
		{$showdata = get_option('NativeFeeds-Category-description');}
	}
	if(is_page('store'))
	{  
	$native_title = get_option('NativeFeeds-Store-description');
	if($native_title==false)
	{
	update_option('NativeFeeds-Store-description','Voucher Codes and Offers');
	}
	$showdata = get_option('NativeFeeds-Store-description');
	}
	echo $showdata;
  }
     add_shortcode('native_description', 'native_description_shortcode');
	
  function native_merchant_all_shortcode(){
        $rType = native_require_to_var('Merchant_All.php');
        return $rType;
     }
     add_shortcode('native_merchant_all', 'native_merchant_all_shortcode');

     function native_premium_merchant_shortcode(){        
         $rType = native_require_to_var('Premium_Merchants.php');
         return $rType;
     }
     add_shortcode('native_premium_merchant', 'native_premium_merchant_shortcode');

     function native_homepage_shortcode(){
         $rType =  wp_cache_get( 'native_homepage' );
         if ( false === $rType  ) {
         $rType = native_require_to_var('HomePage.php');
         wp_cache_set( 'native_homepage', $rType );
         }
         return $rType;
     }
     add_shortcode('native_homepage', 'native_homepage_shortcode');
	 
     function native_TopCodes_shortcode(){
         $rType =  wp_cache_get( 'native_topcodes' );
         if ( false === $rType  ) {
         $rType = native_require_to_var('TopCodes.php');
         wp_cache_set( 'native_topcodes', $rType );
         }
         return $rType;
     }
     add_shortcode('native_topcodes', 'native_TopCodes_shortcode');
	 

     function native_merchant_shortcode(){
        $rType = native_require_to_var('Merchant.php');      
        return  $rType;
     }
     add_shortcode('native_merchant', 'native_merchant_shortcode');

    function native_category_shortcode(){
        $rType = native_require_to_var('Category.php');  
        return  $rType;
     }
     add_shortcode('native_category', 'native_category_shortcode');
	 
    function native_category_menu_shortcode(){
       $rType =  wp_cache_get( 'category_menu' );
       if ( false === $rType  ) {
         $rType = native_require_to_var('CategoryMenu.php'); 
         wp_cache_set( 'category_menu', $rType );
       }
        return  $rType;
     }
     add_shortcode('category_menu', 'native_category_menu_shortcode');

     function native_offers_shortcode(){
        $rType = native_require_to_var('SearchOffers.php');
        return  $rType;       
     }
     add_shortcode('native_offers', 'native_offers_shortcode');
    

     function native_modal_popup_shortcode(){
        $rType = native_require_to_var('ModalPopup.php');
        return  $rType;
     }
     add_shortcode('modal_popup', 'native_modal_popup_shortcode');
}
add_action('init', 'native_short_codes_init');
   
    //**********End short Codes Definition***********//		 

	function native_response_schedule()
	{
	$tii = get_post_meta(65,'native_tick',true);
	if($tii == '')
	{
		update_post_meta(65,'native_tick',3600);
	}
	$current = current_time('timestamp');
	$differenceInSeconds = $current - $tii;
	$interval = get_option('NativeFeeds_Shedule_Ticker');
	$valapi = get_option('NativeFeeds_apikey');
	if($interval==false&&$valapi==true)
	{
		update_option('NativeFeeds_Shedule_Ticker',7200);
		require('filler.php');
	}
		if($differenceInSeconds>$interval)
		{
		require('filler.php');
		}
	}
	add_action('wp','native_response_schedule');
function native_remove_post_meta() {
	 delete_post_meta(65, 'native_modal_popup');
	 delete_post_meta(65, 'native_top_categories');
	 delete_post_meta(65, 'native_all_merchants');
	 delete_post_meta(65, 'native_all_offers');
	 delete_post_meta(65, 'native_category_menu');
	 delete_post_meta(65,'native_joined_merchants');
	 delete_post_meta(65,'native_order_merchants');	 
	 delete_post_meta(65, 'native_tick');
	 delete_post_meta(65, 'native_last_updation');	 
	 delete_post_meta(65,'native_logo');
	 delete_post_meta(65,'nativefeeds_slider_one');
	 delete_post_meta(65,'nativefeeds_slider_two');
	 delete_post_meta(65,'nativefeeds_slider_three');
	 delete_post_meta(65,'nativefeeds_header_one');
	 delete_post_meta(65,'nativefeeds_header_two');	
	 delete_post_meta(65,'nativefeeds_header_three');	
	 delete_post_meta(65,'nativefeeds_slider_one_url');	
	 delete_post_meta(65,'nativefeeds_slider_two_url');
	 delete_post_meta(65,'nativefeeds_slider_three_url');
	 
	 delete_option('NativeFeeds_Shedule_Ticker');
	 delete_option('NativeFeeds_apikey');
	 delete_option('NativeFeeds-Home-title');
	 delete_option('NativeFeeds-Home-keywords');
	 delete_option('NativeFeeds-Home-description');
	 delete_option('NativeFeeds-Category-title');
	 delete_option('NativeFeeds-Category-keywords');
	 delete_option('NativeFeeds-Category-description');
	 delete_option('NativeFeeds-Merchant-title');
	 delete_option('NativeFeeds-Merchant-keywords');
	 delete_option('NativeFeeds-Merchant-description');
	 delete_option('NativeFeeds-Store-title');
	 delete_option('NativeFeeds-Store-keywords');
	 delete_option('NativeFeeds-Store-description');
}
register_deactivation_hook( __FILE__, 'native_remove_post_meta' );
	  
    function native_require_to_var($file){
    ob_start();
    require($file);
    return ob_get_clean();
}


?>
