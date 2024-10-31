<?php
if(!defined('ABSPATH'))
{
	exit;
}
include('Configration.php');
include('Helper.php');
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
$nativeclass = new nativefeeds_Plugin();
$search ='';
$ser = get_query_var('search_text');
if(!empty($ser))
{
$search=esc_attr(get_query_var('search_text'));
}
$page_no = '';
$pge =get_query_var('pageno');
if(!empty($pge))
{
$page_no=esc_attr(get_query_var('pageno')) - 1;
}
if($page_no=='')
{
	$page_no=0; 
}
else{
	$page_no = $page_no * 10;
}
$TotalRecords=0;
$OfferID = '';
if(!empty($_REQUEST['O']))
{
$OfferID=esc_attr($_REQUEST['O']);
}
$curr_link='';
$curr_link=esc_url(home_url( '/' )).'search/'.$nativeclass->EncodeTextForURL($search);
$data = get_post_meta(65,'native_all_offers',true);
if(!empty($data['Deals']['Deal']))
{
$sub = $data['Deals']['Deal'];
$matches = array_filter($sub, function($var) use ($search) { return preg_match("/\b$search\b/i", $var['DealDescription']); });
$searchword = 'Coupon';
		$filtercouponcount = array_filter($matches, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['DealType']); });
		$searchword = 'Discount';
		$filterdealcount = array_filter($matches, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['DealType']); });
		$dealcount = count($filterdealcount);
		$couponcount = count($filtercouponcount);
		$TotalRecords = count($matches);
		$filtertype = '';
		$ft = get_query_var('filter_type');
		if(!empty($ft))
		{
			$filtertype = get_query_var('filter_type');
		}
		if($filtertype == 'Coupon')
		{
			$searchoffers = array_slice($filtercouponcount, $page_no, 10);			
		}
		else if($filtertype == 'Discount')
		{
			$searchoffers = array_slice($filterdealcount, $page_no, 10);
		}
		else{
			$searchoffers = array_slice($matches, $page_no, 10);			
		}
if($fileExists)
{
?> 
<div class="marchant-details">
  <div class="container">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
      <div class="top-info">
        <h2>Search Results For <?php echo $search ?></h2>
        <ul class="nav nav-tabs" role="tablist">
          <li class="<?php if($filtertype == 'all' || $filtertype == ''){ echo 'active';} ?>"><a href="<?php echo $curr_link.'/all/'?>">All Offers (<?php echo $TotalRecords ?>)</a></li>
          <li class="<?php if($filtertype == 'Coupon'){ echo 'active';} ?>"><a href="<?php echo $curr_link.'/Coupon/'?>">Coupons (<?php echo $couponcount?>)</a></li>
          <li class="<?php if($filtertype == 'Discount'){ echo 'active';} ?>"><a href="<?php echo $curr_link.'/Discount/'?>">Discounts (<?php echo $dealcount ?>)</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div style="background-color:#f2f2f2; padding:30px 0">
  <div class="container">
	 <div class="col-sm-12">
      <div class="offer-list">
       <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="all-offers">
<?php
	try
	{				
			foreach ($searchoffers as $item) {
				$DealType= $item['DealType'];
				$MerchantID = $item['MerchantID'];
				$MerchantName = $item['MerchantName'];
				$MerchantLogoURL = $item['MerchantLogoURL'];
				$CategoryName = $item['CategoryName'];
				$DealTitle = $item['DealTitle'];
				$DealDescription = $item['DealDescription'];
				$CouponCode = $item['CouponCode'];
				$DeepLinkUrl =$item['DeepLinkUrl'];
				$DealId =$item['DealId'];
				$FeaturedDeal =$item['FeaturedDeal'];
				$StartDate = $item['StartDate'];
				$EndDate  = $item['EndDate'];
				$starttime = strtotime($StartDate);
                $endtime = strtotime($EndDate);
				?>				
					<?php if($DealType=="Coupon"){ ?>
					 <div class="vc-block code">
              <div class="code-block">
                <div class="off"><img class="img-responsive" src="<?php echo $MerchantLogoURL ?>"></div>
                <span class="type">Coupon</span> </div>
              <div class="info">
                <h4><?php echo $DealTitle ?></h4>
                <p><?php echo $DealDescription ?></p>
                <ul  class="vc-butttons">
                  <li><a href="<?php echo $DeepLinkUrl ?>"  rel="nofollow" target="_blank" class="btn btn-vc">Get coupon &amp; visit site</a></li>
                  <li>
				  <?php if ($OfferID==$DealId){?>
			<a class="deal-button view-code" onclick="ShowCode(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label"><?php echo $CouponCode ?></a></span>
			<?php }else{
			?>
			<a class="deal-button has-code" onclick="ShowCode(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link?>')" href="javascript:void(0);" ><span class="code"><?php echo $CouponCode?></span><span class="label">Show Coupon</a></span>
			<?php
			}
			?>
				  </li>
                </ul>				
                <ul class="valid-date">
                  <li>Added: <?php echo date('d/m/y',$starttime) ?></li>
                  <li>|</li>
                  <li>Expires: <?php echo date('d/m/y',$endtime) ?></li>
                </ul>
              </div>
            </div>				
					<?php }
					else{ ?>
			<div class="vc-block">
              <div class="code-block">
                <div class="off"><img class="img-responsive" src="<?php echo $MerchantLogoURL ?>"></div>
                <span class="type">DEAL</span></div>
              <div class="info">
                <h4><?php echo $DealTitle ?></h4>
                <p><?php echo $DealDescription ?></p>
                <ul  class="vc-butttons">
                  <li><a href="<?php echo $DeepLinkUrl ?>"  rel="nofollow" target="_blank" class="btn btn-vc">Activate Deal</a></li>
                </ul>
                <ul class="valid-date">
                  <li>Added: <?php echo date('d/m/y',$starttime) ?></li>
                  <li>|</li>
                  <li>Expires: <?php echo date('d/m/y',$endtime) ?></li>
                </ul>
              </div>
            </div>
	<?php } }?>
			</div>
			</div>
			</div>
			</div>
		<?php }
		catch(Exception $e)
		{
			//echo 'No data is available.';
		}
?>
</div>
</div>
 <?php 
 if($OfferID!= '')
 {
 echo do_shortcode('[modal_popup]'); 
 }
 ?>
<?php } else{ ?>
<div class="right-col marchant-offer">
<?php
	try
	{				
			foreach ($searchoffers as $item) {
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
				$EndDate  = $item['EndDate'];
				$starttime = strtotime($StartDate);
                $endtime = strtotime($EndDate);    
				?>				
					<?php if($DealType=="Coupon"){ ?>
					 <div class="">
			            <div class="">
			            	<img alt="" src="<?php echo $MerchantLogoURL; ?>" title="<?php echo $MerchantName; ?>">
			            </div>
			            <div class="">
			              <h3><a href="#"><?php echo $DealTitle;?></a></h3>
			              <p><?php echo $nativeclass->GetDescription($DealDescription,180); ?></p>
			              <ul class="">
			                <li><a onclick="ShowCode(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link.$page_no; ?>')" href="javascript:void(0);"  class="">Get coupon &amp; visit site</a></li>
			                 <li>
			                	<?php if($DealId!=$OfferID){
			                	?>
			                	<a onclick="ShowCode(<?php echo $DealId;?>,'<?php echo $DeepLinkUrl;?>','<?php echo $curr_link.$page_no; ?>')" href="javascript:void(0);" class="" href="<?php echo $DeepLinkUrl;?>" rel="nofollow">
			                	<span class="">
			                		<?php echo $CouponCode;?>
			                    </span>
			                    <span class="">
			                       Show coupon code
			                    </span></a> 
			                    <?php 
			                    }
			                    else
			                    {
			                    ?>
			                    <a  href="javascript:void(0);" class="" href="<?php echo $DeepLinkUrl;?>" rel="nofollow">
			                	<span class="">
			                		<?php echo $CouponCode;?>
			                    </span>
			                    </a> 
			                   <?php
			                    }
			                    ?>
			                </li>
			              </ul>			             
			              <p class=""><span>
			              	<a href="<?php echo esc_url(home_url( '/' )).'stores/'.$nativeclass->EncodeTextForURL($MerchantName).'/' ?>">View all <?php echo $MerchantName ?> Voucher Codes</a>
			              	Added: <?php echo date('d/m/Y',$starttime); ?> </span><span>Expires: <?php echo date('d/m/Y',$endtime); ?></span></p>
			            </div>
			          </div>
					<?php }
					else{ ?>
					<div class="">
			            <div class="">
			            	<img alt="" src="<?php echo $MerchantLogoURL; ?>" title="<?php echo $MerchantName; ?>">
			            </div>
			            <div class="">
			              <h3><a href="#"><?php echo $DealTitle;?></a></h3>
			              <p><?php echo $nativeclass->GetDescription($DealDescription,180); ?></p>
			              <ul class="">
			                <li><a href="<?php echo $DeepLinkUrl;?>" target="_blank" class="">Get coupon &amp; visit site</a></li>          
			              </ul>
			              <p class=""><span>
			              	<a href="<?php echo esc_url(home_url( '/' )).'stores/'.$nativeclass->EncodeTextForURL($MerchantName).'/' ?>">View all <?php echo $MerchantName ?> Voucher Codes</a>
			              	Added: <?php echo date('d/m/Y',$starttime); ?></span><span>Expires: <?php echo date('d/m/Y',$endtime); ?></span></p>
			            </div>
			        </div>
					<?php } ?>
				
				<?php
			}
		}
		catch(Exception $e)
		{
			//echo 'No data is available.';
		}
?>
</div>
<?php }

$total_records=$TotalRecords;
if($filtertype == '' || $filtertype == 'all')
{
	$curr_link = $curr_link.'/all';
}
if($filtertype == 'Coupon')
{
	$curr_link = $curr_link.'/Coupon';
	$total_records=$couponcount;
}
if($filtertype == 'Discount')
{
	$curr_link = $curr_link.'/Discount';
	$total_records=$dealcount;
}
$limit = 10;
$redirect_link = $curr_link;
if($total_records==0)
{
	echo "<div class=''><h2>No Offer found.</h2></div>";
}
if($total_records>10)
{
include('Paging.php');
}
}
else{
	echo'<h2 class="container">please add api key to the nativefeeds plugin</h2>';
}
}
	else{
		echo '<h2 class="container">This theme is not compatible with this plugin version, please update your theme from <a href="https://www.nativemedia.com/nativefeeds/wordpress" target="blank"><u>https://www.nativemedia.com/nativefeeds/wordpress</u></a></h2>';
	}
 ?>