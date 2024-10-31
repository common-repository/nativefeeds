<?php
if(!defined('ABSPATH'))
{
	exit;
}
require_once('Helper.php');
$nativeclass = new nativefeeds_Plugin();
$category = '';
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
$ct = get_query_var('category');
if(!empty($ct))
{
$category= trim($nativeclass->DecodeTextForURL(get_query_var('category')));
$categorys= trim($nativeclass->DecodeTextForURL(get_query_var('category')));
$categoryforsub= trim(get_query_var('category'));
}
$sub_category = '';
$categoryforsub = '';
$sc =get_query_var('sub_category');
if(!empty($sc))
{
$category= trim($nativeclass->DecodeTextForURL(esc_attr(get_query_var('sub_category'))));
$categoryforsub = trim($nativeclass->DecodeTextForURL(esc_attr(get_query_var('sub_category'))));
}
$category_param=$category;
if($sub_category!="")
{
	$category_param=$category.'|'.$sub_category;
}
$page_no='';
$pg = get_query_var('pageno');
if(!empty($pg))
{
$page_no=$nativeclass->DecodeTextForURL(esc_attr(get_query_var('pageno'))) - 1;
}
if($page_no=='')
{
	$page_no=0;
}
else
{
	$page_no = $page_no*10;
}
$TotalRecords=0;
$OfferID='';
if(!empty($_REQUEST['O']))
{
$OfferID= esc_attr($_REQUEST['O']);
}
$curr_link='';
if($categoryforsub==''&& !empty($ct))
{
  $curr_link=esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL($category);
  }
else
{
  $curr_link=esc_url(home_url( '/' )).'category/'.trim($nativeclass->EncodeTextForURL($categorys)).'/'.trim($nativeclass->EncodeTextForURL($categoryforsub)).'/nf-s/';
  }
		$alloffers = get_post_meta(65,'native_all_offers',true);
		if(!empty($alloffers['Deals']['Deal']))
		{
		$filtercategory = $alloffers['Deals']['Deal'];
		$searchword = $category;
		$filtercategory = array_filter($filtercategory, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['CategoryName']); });
	function native_cat_top_offer_date_sorter($a, $b) {
    return  strtotime($b['StartDate']) - strtotime($a['StartDate']);
}
	  usort($filtercategory, "native_cat_top_offer_date_sorter");
		$native_category_menus = get_post_meta(65,'native_category_menu',true);
		$searchword = $category;
		$filtercategorymenu = array_filter($native_category_menus['Categories']['HeaderCategory'], function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['CategoryName']); });    
	  foreach ($filtercategorymenu as $item) {
		 $counter = 0;
         $CategoryName = $item['CategoryName'];
         $SubCategories = $item['SubCategories'];
		 if(!empty($SubCategories))
		 {
		 $subcatfilter = explode("|" , $SubCategories);			 
	  foreach ($subcatfilter as $sub)
            {
			$filtercategoryy = $alloffers['Deals']['Deal'];
			$search = $nativeclass->DecodeTextForURL(trim($sub));
			$fillcat = array_filter($filtercategoryy, function($var) use ($search) { return preg_match("/\b$search\b/i", $var['CategoryName']); });
			$filtercategory += $fillcat;
			$TotalRecords = count($filtercategory);
			}
		 }
		}		
		$searchword = 'Coupon';
		$filtercouponcount = array_filter($filtercategory, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['DealType']); });
		$searchword = 'Discount';
		$filterdealcount = array_filter($filtercategory, function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['DealType']); });
		$dealcount = count($filterdealcount);
		$couponcount = count($filtercouponcount);
		$TotalRecords = count($filtercategory);
		$filtertype = '';
		$ft = get_query_var('filter_type');
		if(!empty($ft))
		{
			$filtertype = esc_attr(get_query_var('filter_type'));
		}
		if($filtertype == 'Coupon')
		{
			$filteredcategories = array_slice($filtercouponcount, $page_no, 10,false);
		}
		else if($filtertype == 'Discount')
		{			
			$filteredcategories = array_slice($filterdealcount, $page_no, 10,false);
		}
		else{
			$filteredcategories = array_slice($filtercategory, $page_no, 10,false);
		}	
			echo '<script>console.log("sub cat:' . $curr_link . '")</script>';
if($fileExists) {
		?>
<div class="marchant-details">
  <div class="container">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
      <div class="top-info">
        <h2>Offers In <?php echo $category ?></h2>
        <ul class="nav nav-tabs" role="tablist">
          <li class="<?php if($filtertype == 'all' || $filtertype == ''){ echo 'active';} ?>"><a href="<?php echo $curr_link?>">All Offers (<?php echo $TotalRecords ?>)</a></li>
          <li class="<?php if($filtertype == 'Coupon'){ echo 'active';} ?>"><a href="<?php echo $curr_link.'/Coupon/'?>">Coupons (<?php echo $couponcount?>)</a></li>
          <li class="<?php if($filtertype == 'Discount'){ echo 'active';} ?>"><a href="<?php echo $curr_link.'/Discount/'?>">Discounts (<?php echo $dealcount ?>)</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div style="background-color:#f2f2f2; padding:30px 0">
  <div class="container">
  <div class="col-sm-3">
      <div class="left-col">
        <h5>Sub Categories</h5>       
        <div class="filter-block subcate">
          <ul>            
			<?php
$native_category_menus = get_post_meta(65,'native_category_menu',true);
$searchword = $category;
$filtercategory = array_filter($native_category_menus['Categories']['HeaderCategory'], function($var) use ($searchword) { return preg_match("/\b$searchword\b/i", $var['CategoryName']); });    
	  foreach ($filtercategory as $item) {
		 $counter = 0;
         $CategoryName = $item['CategoryName'];
         $SubCategories = $item['SubCategories'];
if(!empty($SubCategories ))
{	
		 $subcatfilter = explode("|" , $SubCategories);			
foreach ($subcatfilter as $sub)
            {
			echo'<li><a href="'.esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL(trim($CategoryName)).'/'.$nativeclass->EncodeTextForURL(trim($sub)).'/nf-s/">'.$sub.'</a></li>';
			}
}
		}?>                            
          </ul>         
        </div>  
      </div>
    </div>
	 <div class="col-sm-9">
      <div class="offer-list">
       <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="all-offers">
<?php
global $wpdb;
	try
	{
			foreach ($filteredcategories as $item) {
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
			 	if($DealType=="Coupon"){ ?>
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
			echo 'No data is available.';
		}
?>
</div>
</div>
<?php 
//Pagination Variables
$total_records=$TotalRecords;
if($filtertype == 'all' || $filtertype == '')
{
	$curr_link = $curr_link.'/all/';
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
$redirect_link=$curr_link;
$limit = 10;

if($total_records>10)
{
include('Paging.php');
}
?>
 <?php 
 if($OfferID!= '')
 {
 echo do_shortcode('[modal_popup]'); 
 }
 ?>
 <?php } else{ ?>
 <div class="">
<?php
global $wpdb;
	try
	{
			foreach ($filteredcategories as $item) {
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
 <?php
$total_records=$TotalRecords;
if($filtertype == 'all' || $filtertype == '')
{
	$curr_link = $curr_link.'/all/';
}
if($filtertype == 'Coupon')
{
	$curr_link = $curr_link.'&&filtertype=Coupon';
	$total_records=$couponcount;
}
if($filtertype == 'Discount')
{
	$curr_link = $curr_link.'&&filtertype=Discount';
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
}
else{
	echo'<h2 class="container">please add api key to the nativefeeds plugin</h2>';
}
}
	else{
		echo '<h2 class="container">This theme is not compatible with this plugin version, please update your theme from <a href="https://www.nativemedia.com/nativefeeds/wordpress" target="blank"><u>https://www.nativemedia.com/nativefeeds/wordpress</u></a></h2>';
	}
 ?>