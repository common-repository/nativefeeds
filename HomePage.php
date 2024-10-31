<?php
if(!defined('ABSPATH'))
{
	exit;
}
?>
<?php
$fileExists = locate_template('/css/native-styler.css');
$OfferID= '';
	include_once('Helper.php');
	if(!empty($_REQUEST['O']))
	{
	$OfferID= esc_attr($_REQUEST['O']);
	}
	$nativefeedsclass = new nativefeeds_Plugin();
	$home=trim($nativefeedsclass->DecodeTextForURL(get_query_var('home')));
	$page_no=$nativefeedsclass->DecodeTextForURL(get_query_var('page'));
	if($page_no=='')
	{
		$page_no=0;
	}
	else
	{
		$page_no = 6 * $page_no;
	}
    $results = get_post_meta(65,'native_all_offers',true);
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
	if(!empty($results['Deals']['Deal']))
	{
	$homeoffers = $results['Deals']['Deal'];
		shuffle($homeoffers);
		$TotalRecords =count($homeoffers);
		$outArray = $homeoffers;
		$directory = wp_upload_dir();
	$dirurl = $directory['url'];
	$slider_one = get_post_meta(65,'nativefeeds_slider_one',true);
	if(empty($slider_one) || $slider_one[0] == '' )
	{
		$slider_one = get_template_directory_uri() . '/img/banner.jpg';
	}
	$slider_two = get_post_meta(65,'nativefeeds_slider_two',true);
	if(empty($slider_two) || $slider_two[0] == '' )
	{
		$slider_two = get_template_directory_uri() . '/img/banner.jpg';
	}
	$slider_three = get_post_meta(65,'nativefeeds_slider_three',true);
	if(empty($slider_three) || $slider_three[0] == '' )
	{
		$slider_three = get_template_directory_uri() . '/img/banner.jpg';
	}
	$header_one = get_post_meta(65,'nativefeeds_header_one',true);
	if(empty($header_one) || $header_one[0] == '' )
	{
		$header_one = get_template_directory_uri() . '/img/header.jpg';
	}
	$header_two = get_post_meta(65,'nativefeeds_header_two',true);
	if(empty($header_two) || $header_two[0] == '' )
	{
		$header_two = get_template_directory_uri() . '/img/header.jpg';
	}
	$header_three = get_post_meta(65,'nativefeeds_header_three',true);
	if(empty($header_three) || $header_three[0] == '' )
	{
		$header_three = get_template_directory_uri() . '/img/header.jpg';
	}
	$slider_one_url =  get_post_meta(65,'nativefeeds_slider_one_url',true);
	$slider_two_url =  get_post_meta(65,'nativefeeds_slider_two_url',true);
	$slider_three_url =  get_post_meta(65,'nativefeeds_slider_three_url',true);
if($fileExists)
{	
	try
	{	
	?>
<div class="container">
  <section class="single-item">
    <div><a href="<?php echo $slider_one_url ?>" target="_blank"><img src="<?php echo $slider_one?>" class="img-responsive" alt="" ></a></div>
    <div><a href="<?php echo $slider_two_url ?>" target="_blank"><img src="<?php echo $slider_two?>" class="img-responsive" alt="" ></a></div>
    <div><a href="<?php echo $slider_three_url ?>" target="_blank"><img src="<?php echo $slider_three?>" class="img-responsive" alt=""></a></div>
  </section>
      <?php echo do_shortcode('[native_premium_merchant]'); ?>
  <section class="row wow fadeIn" data-wow-duration="1s" data-wow-delay="2s">
  <?php
  $offcnt = 0;
  foreach ($outArray as $item) { 
  $DealTitle = $item['DealTitle'];
  $DeepLinkUrl =$item['DeepLinkUrl'];
  $MerchantLogoURL = $item['MerchantLogoURL'];
  if($offcnt==0)
  {
  ?>
    <div class="col-sm-4">
      <div class="offer-img-block"><img src="<?php echo $header_one ?>" class="img-responsive" alt=""> <a target="_blank" href="<?php echo $DeepLinkUrl ?>" class="offer"><img src="<?php echo $MerchantLogoURL ?>" width="84" height="21" alt=""> <span><?php echo $nativefeedsclass->GetDescription($DealTitle,50); ?></span></a></div>
    </div>
  <?php }
	if($offcnt==1)
  {
  ?>
    <div class="col-sm-4">
      <div class="offer-img-block"><img src="<?php echo $header_two ?>" class="img-responsive" alt=""> <a target="_blank" href="<?php echo $DeepLinkUrl ?>" class="offer"><img src="<?php echo $MerchantLogoURL ?>" width="84" height="21" alt=""> <span><?php echo $nativefeedsclass->GetDescription($DealTitle,50); ?></span></a></div>
    </div>
  <?php }
	if($offcnt==2)
  {
	?>
    <div class="col-sm-4">
      <div class="offer-img-block"><img src="<?php echo $header_three ?>" class="img-responsive" alt=""> <a target="_blank" href="<?php echo $DeepLinkUrl ?>" class="offer"><img src="<?php echo $MerchantLogoURL ?>" width="84" height="21" alt=""> <span><?php echo $nativefeedsclass->GetDescription($DealTitle,50); ?></span></a></div>
    </div>
	<?php 
	break;
	}
	$offcnt++;
  }	?>
  </section>
</div>
<section class="hot-coupons">
  <div class="container">
    <h2>Hot Coupons </h2>
    <div class="row">
	<?php
		$counter = 0;
		function native_top_expiring_off($var)
	{
	 return $var['DealType']=='Coupon';
	}
	$outArray = array_filter($outArray, "native_top_expiring_off");
		foreach ($outArray as $item) {
				$DealType= $item['DealType'];
				$MerchantID = $item['MerchantID'];
				$MerchantName =$item['MerchantName'];
				$MerchantLogoURL = $item['MerchantLogoURL'];
				$CategoryName = $item['CategoryName'];
				$DealTitle = $item['DealTitle'];
				$DealDescription = $item['DealDescription'];
				$DeepLinkUrl =$item['DeepLinkUrl'];
				$DealId =$item['DealId'];
				$FeaturedDeal =$item['FeaturedDeal'];
				$StartDate = $item['StartDate'];
				$EndDate  = $item['EndDate'];
				$CouponCode = $item['CouponCode'];
				$TotalRecords = $item['TotalRecords'];
	  			
				if($DealType=="Coupon"){
				?>				
      <div class="col-sm-6 col-md-4">
        <div class="hcoup-block">
          <div class="logo-block"><img src="<?php echo $MerchantLogoURL?>" width="120" height="56" alt="$MerchantName"></div>
          <h5><?php echo  $nativefeedsclass->GetDescription($DealTitle,50);  ?></h5>
          <p><?php echo $nativefeedsclass->GetDescription($DealDescription,150); ?></p>
          <div class="text-center">
            <a href="<?php echo $DeepLinkUrl?>" target="blank" class="btn">Get Coupon & Visit site</a></div><br>
			<div class="text-center">
			<?php if ($OfferID==$DealId){?>
			<a class="deal-button view-code" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo esc_url( home_url( '/' ) );?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label"><?php echo $CouponCode ?></a></span>
			<?php }else{
			?>
			<a class="deal-button has-code" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo esc_url( home_url( '/' ) );?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label">Show Coupon</a></span>
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
            <a target="blank" href="<?php echo $DeepLinkUrl?>" class="btn">Get Deal</a>
		  </div>
        </div>
      </div>
	<?php }
	  $counter++;
	  if($counter>5){break;}
  }?>
    </div>
  </div>
</section>
<section class="top-deals">
  <div class="container">  
   <h2>Today's Top Deals & Coupons <?php 
?>  </h2>
    <div class="row">
	<?php
	$topexpiring = $results['Deals']['Deal'];
	function native_top_expiring_offers_filter($var)
	{
	 return $var['ExclusiveDeal']=='true';
	}
	$topexpiring = array_filter($topexpiring, "native_top_expiring_offers_filter");
	
function native_top_epiring_date_sorter($a, $b) {
    return  strtotime($a['EndDate']) - strtotime($b['EndDate']);
}
	  usort($topexpiring, "native_top_epiring_date_sorter");
		shuffle($topexpiring);
	  $countdeal = 0;
      foreach ($topexpiring as $item) {
        $DealType= $item['DealType'];
        $MerchantID = $item['MerchantID'];
        $MerchantName =$item['MerchantName'];
        $MerchantLogoURL = $item['MerchantLogoURL'];
        $CategoryName = $item['CategoryName'];
        $DealTitle = $item['DealTitle'];
        $DealDescription = $item['DealDescription'];
        $DeepLinkUrl =$item['DeepLinkUrl'];
        $DealId =$item['DealId'];
        $FeaturedDeal =$item['FeaturedDeal'];
		$CouponCode = $item['CouponCode'];
        $StartDate = $item['StartDate'];
        $EndDate  = $item['EndDate'];
		$starttime = strtotime($StartDate);
		$endtime = strtotime($EndDate);
        ?>
		<?php if($DealType=="Coupon"){ ?>
      <div class="col-sm-6 col-md-4">
        <div class="top-deals-block">
          <div class="logo-block"><img src="<?php echo $MerchantLogoURL ?>" alt=""></div>
          <h3><?php echo $MerchantName ?></h3>
          <div class="info">
            <p><span class="old-price"><?php echo $nativefeedsclass->GetDescription($DealTitle,50);?></span>:- <span class="new-price"><?php echo $nativefeedsclass->GetDescription($DealDescription,60);?></span></p>
            <p><span class="old-price">Start Date: </span><?php echo date('d/m/Y',$starttime); ?><br/>
			<span class="old-price">  End Date: </span><?php echo date('d/m/Y',$endtime); ?></p>
			<div class="text-center">
            <a href="javascript:void(0);" onclick="CopyCodeVisitSite(this)" value="<?php echo $CouponCode ?>" target="blank" class="btn">Get Coupon & Visit site</a></div><br>
			<div class="text-center">
			<?php if ($OfferID==$DealId){?>
			<a class="deal-button view-code" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo esc_url( home_url( '/' ) );?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label"><?php echo $CouponCode ?></a></span>
			<?php }else{
			?>
			<a class="deal-button has-code" onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo esc_url( home_url( '/' ) );?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label">Show Coupon</a></span>
			<?php
			}
			?>
        </div>
        </div>
      </div>
	 </div>
		<?php }
					else { ?>		
		<div class="col-sm-6 col-md-4">
        <div class="top-deals-block">
          <div class="logo-block"><img src="<?php echo $MerchantLogoURL ?>"  alt=""></div>
          <h3><?php echo $MerchantName ?></h3>
          <div class="info">
            <p><span class="old-price"><?php echo $nativefeedsclass->GetDescription($DealTitle,50);?></span>:- <span class="new-price"><?php echo $nativefeedsclass->GetDescription($DealDescription,60);?></span></p>
            <p><span class="old-price">Start Date: </span><?php echo date('d/m/Y',$starttime); ?><br/>
			<span class="old-price">  End Date: </span><?php echo date('d/m/Y',$endtime); ?></p>
			<a target="blank" href="<?php echo $DeepLinkUrl ?>" class="btn">Get Deal</a>
		  </div>
        </div>
        </div>
		<?php }
	  $countdeal++;
	  if($countdeal>5){break;}
	  }
	  }
	catch(Exception $e)
	{
		echo 'No data is available.';
	}
	  ?>
    </div>
  </div>
</section>
<?php } else{
			foreach ($outArray as $item) {
				$DealType= $item['DealType'];
				$MerchantID = $item['MerchantID'];
				$MerchantName =$item['MerchantName'];
				$MerchantLogoURL = $item['MerchantLogoURL'];
				$CategoryName = $item['CategoryName'];
				$DealTitle = $item['DealTitle'];
				$DealDescription = $item['DealDescription'];
				$DeepLinkUrl =$item['DeepLinkUrl'];
				$DealId =$item['DealId'];
				$FeaturedDeal =$item['FeaturedDeal'];
				$StartDate = $item['StartDate'];
				$EndDate  = $item['EndDate'];
				$CouponCode = $item['CouponCode'];
				$TotalRecords = $item['TotalRecords'];
				?>
				<div>
					<?php if($DealType=="Coupon"){ ?>
					<div>
						<div><img src="<?php echo $MerchantLogoURL ?>" alt="<?php echo $MerchantName ?>" /></div>
						<p><?php echo  $nativefeedsclass->GetDescription($DealTitle,50);  ?></p>
						<h5><?php echo $nativefeedsclass->GetDescription($DealDescription,60); ?> </h5>
						<a onclick="ShowCodeHome(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo esc_url( home_url( '/' ) );?>')" href="javascript:void(0);">
						<?php 
						if ($OfferID==$DealId)
						{
                             echo $CouponCode;
						}
						else
						{
							echo "Show Coupon";
						}
						?>
						</a>
						<p><a href="<?php echo esc_url(home_url( '/' )).'nativefeeds-merchant/?mer='.$nativefeedsclass->EncodeTextForURL($MerchantName) ?>">See all <?php echo $MerchantName ?> Coupons</a></p>
					</div>
					<?php }
					else{ ?>
					<div>
						<div><img src="<?php echo $MerchantLogoURL ?>" alt="$MerchantName"/></div>
						<p><?php echo $nativefeedsclass->GetDescription($DealTitle,50) ?></p>
						<h5><?php echo $nativefeedsclass->GetDescription($DealDescription,60); ?></h5>
						<a target="_blank" href="<?php echo $DeepLinkUrl;?>" class="">Activate deal</a>
						<p><a href="<?php echo esc_url(home_url( '/' )).'nativefeeds-merchant/?mer='.$nativefeedsclass->EncodeTextForURL($MerchantName) ?>">See all <?php echo $MerchantName ?> Coupons</a></p>
					</div>
					<?php } ?>
				</div>
				<?php
			}
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