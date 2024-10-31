<?php
if(!defined('ABSPATH'))
{
	exit;
}
include('Helper.php');
$nativefeedsclass = new nativefeeds_Plugin();
$OfferID ='';
$fileExists = locate_template('/css/native-styler.css');
$my_theme = wp_get_theme(); 
$version = $my_theme->get('Version');
$versioncheck = false;
if($fileExists)
{
if($version == '1.1')
{
	$versioncheck = true;
}
}
else{
	$versioncheck = true;
}
if($versioncheck)
{
if(!empty($_REQUEST['O']))
{
$OfferID=esc_attr($_REQUEST['O']);
}
$curr_link=esc_url(home_url( '/topcodes' ));
$results = get_post_meta(65,'native_all_offers',true);
		if(!empty($results['Deals']['Deal']))
		{
?> 
<section class="">
  <div class="container">
<?php
	try
	{		
		$alloffers = $results['Deals']['Deal'];
		shuffle($alloffers);
		$exclusiveoffers = array_slice($alloffers, 0, 18);
			foreach ($exclusiveoffers as $item) {
				$DealType= $item['DealType'];
				$MerchantID = $item['MerchantID'];
				$MerchantName =$item['MerchantName'];
				$MerchantLogoURL = $item['MerchantLogoURL'];
				$CategoryName = $item['CategoryName'];
				$DealTitle = $item['DealTitle'];
				$DealDescription = $item['DealDescription'];
				$CouponCode = $item['CouponCode'];
				$DeepLinkUrl =$item['DeepLinkUrl'];
				$DealId =$item['DealId'];
				$FeaturedDeal =$item['FeaturedDeal'];
				$StartDate = $item['StartDate'];
				$ExclusiveDeal = $item['ExclusiveDeal'];
				$EndDate  = $item['EndDate'];
                $TotalRecords = $item['TotalRecords'];
				$starttime = strtotime($StartDate);
                $endtime = strtotime($EndDate);
				if($DealType=="Coupon" ){ ?>
					  <div class="col-sm-6 col-md-4">
        <div class="hcoup-block">
          <div class="logo-block"><img src="<?php echo $MerchantLogoURL?>" width="120" height="56" alt=""></div>
          <h5><?php echo  $nativefeedsclass->GetDescription($DealTitle,50);  ?></h5>
          <p><?php echo $nativefeedsclass->GetDescription($DealDescription,150); ?></p>
          <div class="text-center">
            <a href="<?php echo $DeepLinkUrl?>" target="blank" class="btn">Get Coupon & Visit site</a></div><br>
		<div class="text-center">
			<?php if ($OfferID==$DealId){?>
			<a class="deal-button view-code" target="blank" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label"><?php echo $CouponCode ?></a></span>
			<?php }else{
			?>
			<a class="deal-button has-code" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label">Show Coupon</a></span>
			<?php
			}
			?>
        </div>
		</div>
      </div>
	<?php } 
	else{ ?>
	  <div class="col-sm-6 col-md-4">
        <div class="hcoup-block">
          <div class="logo-block"><img src="<?php echo $MerchantLogoURL?>" width="120" height="56" alt=""></div>
          <h5><?php echo  $nativefeedsclass->GetDescription($DealTitle,50);  ?></h5>
          <p><?php echo $nativefeedsclass->GetDescription($DealDescription,150); ?></p>
          <div class="text-center">
            <a href="<?php echo $DeepLinkUrl?>" target="blank" class="btn">Get Deal</a>
		  </div>
        </div>
      </div>
	<?php } }?>
	</div>
	</section>
		<?php }
		catch(Exception $e)
		{
			//echo 'No data is available.';
		}
		}
		else{
			echo '<h2 class="container">Please add api key to the nativefeeds plugin</h2>';
		}
		}
	else{
		echo '<h2 class="container">This theme is not compatible with this plugin version, please update your theme from <a href="https://www.nativemedia.com/nativefeeds/wordpress" target="blank"><u>https://www.nativemedia.com/nativefeeds/wordpress</u></a></h2>';
	}
?>
 <?php 
 if($OfferID!= '')
 {
 echo do_shortcode('[modal_popup]'); 
 }
 ?>