<?php
if(!defined('ABSPATH'))
{
	exit;
}
	include_once('Helper.php');
	$nativeclass = new nativefeeds_Plugin();
?>
  <ul class="dropdown-menu">
              <li>
                <div class="container">
                  <div class="row">                   
					<?php
$native_category_menus = get_post_meta(65,'native_category_menu',true);
if(!empty($native_category_menus['Categories']['HeaderCategory']))
{
$categorycounter = 100;
$morecategoryadder ='';
      foreach ($native_category_menus['Categories']['HeaderCategory'] as $item) {
		 $counter = 0;
         $CategoryName = $item['CategoryName'];
         $SubCategories = $item['SubCategories'];
		if(empty($SubCategories))
		{
			$SubCategories = '';
		}
		 $subcatfilter = explode("|" , $SubCategories);
 $morecater = count($subcatfilter);
			if($morecater<3){
foreach ($subcatfilter as $sub)
            {
				if(!empty($sub))
				{			
			$morecategoryadder .= '<li><a href="'.esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL(trim($CategoryName)).'/'.$nativeclass->EncodeTextForURL(trim($sub)).'/nf-s/">'.$sub.'</a></li>';			
			break;
				}
			}
			}
		    else{  
echo '<div class="col-sm-2"><ul class="list-unstyled nm-list">';
echo'<li><a href="'.esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL(trim($CategoryName)).'/">'.$CategoryName.'</a></li>' ;			
			foreach ($subcatfilter as $sub)
            {			
			if($counter == 3 ){
				echo'<li><a href="javascript:void(0);" onclick="nativeshowmorecat('.$categorycounter.')" class="nativeshowmore_'.$categorycounter.'">Show More [+]</a></li>';
			}
			if($counter<3)
			{
			echo'<li><a href="'.esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL(trim($CategoryName)).'/'.$nativeclass->EncodeTextForURL(trim($sub)).'/nf-s/">'.$sub.'</a></li>';			
			}
			else{
				echo'<li><a href="'.esc_url(home_url( '/' )).'category/'.$nativeclass->EncodeTextForURL(trim($CategoryName)).'/'.$nativeclass->EncodeTextForURL(trim($sub)).'/" class="nativeshower_'.$categorycounter.' hidden">'.$sub.'</a></li>';
			}			
			$counter++;
			if($counter>5){break;}
			}			
			echo'<li><a href="javascript:void(0);" onclick="nativeshowlesscat('.$categorycounter.')" class="nativeshowless_'.$categorycounter.' hidden">Show Less [-]</a></li>';
			$categorycounter++;
			echo'</ul></div>';
			}
			//if($counter%2!=0){echo'</div>';}
	  }
	  echo '<div class="col-sm-2"><ul class="list-unstyled nm-list"><li>Some More Categories</li>'.$morecategoryadder.'</ul>';
}
	  ?>  
	</li>
</ul>