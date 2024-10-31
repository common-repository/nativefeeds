<?php
if(!defined('ABSPATH'))
{
	exit;
}
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
?>   
<main>
<div class="container az-stores"> 
        <h2>All Shops</h2>
        <ul class="stotes-az clearfix">
            
                    <li>
                        <a href="#0-9">0-9</a>
                    </li>
                
                    <li>
                        <a href="#A">A</a>
                    </li>
                
                    <li>
                        <a href="#B">B</a>
                    </li>
                
                    <li>
                        <a href="#C">C</a>
                    </li>
                
                    <li>
                        <a href="#D">D</a>
                    </li>
                
                    <li>
                        <a href="#E">E</a>
                    </li>
                
                    <li>
                        <a href="#F">F</a>
                    </li>
                
                    <li>
                        <a href="#G">G</a>
                    </li>
                
                    <li>
                        <a href="#H">H</a>
                    </li>
                
                    <li>
                        <a href="#I">I</a>
                    </li>
                
                    <li>
                        <a href="#J">J</a>
                    </li>
                
                    <li>
                        <a href="#K">K</a>
                    </li>
                
                    <li>
                        <a href="#L">L</a>
                    </li>
                
                    <li>
                        <a href="#M">M</a>
                    </li>
                
                    <li>
                        <a href="#N">N</a>
                    </li>
                
                    <li>
                        <a href="#O">O</a>
                    </li>
                
                    <li>
                        <a href="#P">P</a>
                    </li>
                
                    <li>
                        <a href="#Q">Q</a>
                    </li>
                
                    <li>
                        <a href="#R">R</a>
                    </li>
                
                    <li>
                        <a href="#S">S</a>
                    </li>
                
                    <li>
                        <a href="#T">T</a>
                    </li>
                
                    <li>
                        <a href="#U">U</a>
                    </li>
                
                    <li>
                        <a href="#V">V</a>
                    </li>
                
                    <li>
                        <a href="#W">W</a>
                    </li>
                
                    <li>
                        <a href="#X">X</a>
                    </li>
                
                    <li>
                        <a href="#Y">Y</a>
                    </li>
                
                    <li>
                        <a href="#Z">Z</a>
                    </li>               
        </ul>
<div class="block">
<?php
 include('Helper.php');
$nativeclass = new nativefeeds_Plugin();
$results = get_post_meta(65,'native_all_merchants',TRUE);
if(!empty($results['Merchants']['Merchant']))
{
$digitMerchants='';
$aMerchants ='';
$bMerchants ='';
$cMerchants ='';
$dMerchants ='';
$eMerchants ='';
$fMerchants ='';
$gMerchants ='';
$hMerchants ='';
$iMerchants ='';
$jMerchants ='';
$kMerchants ='';
$lMerchants ='';
$mMerchants ='';
$nMerchants ='';
$oMerchants ='';
$pMerchants ='';
$qMerchants ='';
$rMerchants ='';
$sMerchants ='';
$tMerchants ='';
$uMerchants ='';
$vMerchants ='';
$wMerchants ='';
$xMerchants ='';
$yMerchants ='';
$zMerchants ='';


foreach ($results['Merchants']['Merchant'] as $item) {

	$MerchantLogoURL= $item['MerchantLogoURL'];
	$MerchantName =$item['MerchantName'];
	if(empty($MerchantLogoURL))
	{$MerchantLogoURL='#';}

    if(ctype_digit(strtolower(substr($MerchantName, 0, 1 ))))
    {
      $digitMerchants =$aMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

    if(strtolower(substr($MerchantName, 0, 1 )) === "a")
    {
      $aMerchants =$aMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "b")
    {
      $bMerchants =$bMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "c")
    {
      $cMerchants =$cMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "d")
    {
     $dMerchants =$dMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "e")
    {    
      $eMerchants =$eMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "f")
    {
      $fMerchants =$fMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "g")
    {
	  $gMerchants =$gMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "h")
    {
      $hMerchants =$hMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "i")
    {
      $iMerchants =$iMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "j")
    {
      $jMerchants =$jMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

     if(strtolower(substr($MerchantName, 0, 1 )) === "k")
    {
      $kMerchants =$kMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "l")
    {
      $lMerchants =$lMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "m")
    {
      $mMerchants =$mMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "n")
    {
      $nMerchants =$nMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "o")
    {
      $oMerchants =$oMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "p")
    {
	  $pMerchants =$pMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "q")
    {
      $qMerchants =$qMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "r")
    {
      $rMerchants =$rMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "s")
    {
      $sMerchants =$sMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "t")
    {
      $tMerchants =$tMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "u")
    {
      $uMerchants =$uMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "v")
    {
      $vMerchants =$vMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "w")
    {
      $wMerchants =$wMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "x")
    {
      $xMerchants =$xMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "y")
    {
      $yMerchants =$yMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }

      if(strtolower(substr($MerchantName, 0, 1 )) === "z")
    {
      $zMerchants =$zMerchants.'<div class="col-sm-3"> <a href="'.esc_url(home_url( "/" )).'merchant/'.$nativeclass->EncodeTextForURL($MerchantName).'" class="store-az"> <span class="marchant"><img src="'.$MerchantLogoURL.'" width="130" height="86" alt=""> </span> <span class="mt-name">'.$MerchantName.'</span> </a> </div>';	
    }
}

?>	
    <div class="letter-title" id="0-9"><span>0-9</span></div>
	<div class="row row-all-stores">
		<?php echo $digitMerchants; ?>
	</div>
	<div class="letter-title" id="A"><span>A</span></div>
	<div class="row row-all-stores">
		<?php echo $aMerchants; ?>
	</div>
	<div class="letter-title" id="B"><span>B</span></div>
	<div class="row row-all-stores">
		<?php echo $bMerchants; ?>
	</div>

	<div class="letter-title" id="C"><span>C</span></div>
	<div class="row row-all-stores">
		<?php echo $cMerchants; ?>
	</div>


	<div class="letter-title" id="D"><span>D</span></div>
	<div class="row row-all-stores">
		<?php echo $dMerchants; ?>
	</div>


	<div class="letter-title" id="E"><span>E</span></div>
	<div class="row row-all-stores">
		<?php echo $eMerchants; ?>
	</div>


	<div class="letter-title" id="F"><span>F</span></div>
	<div class="row row-all-stores">
		<?php echo $fMerchants; ?>
	</div>


	<div class="letter-title" id="G"><span>G</span></div>
	<div class="row row-all-stores">
	<?php echo $gMerchants; ?>
	</div>


	<div class="letter-title" id="H"><span>H</span></div>
	<div class="row row-all-stores">
	<?php echo $hMerchants; ?>
	</div>

	<div class="letter-title" id="I"><span>I</span></div>
	<div class="row row-all-stores">
       <?php echo $iMerchants; ?>
	</div>

	<div class="letter-title" id="J"><span>J</span></div>
	<div class="row row-all-stores">
       <?php echo $jMerchants; ?>
	</div>

	<div class="letter-title" id="K"><span>K</span></div>
	<div class="row row-all-stores">
       <?php echo $kMerchants; ?>
	</div>

	<div class="letter-title" id="L"><span>L</span></div>
	<div class="row row-all-stores">
      <?php echo $lMerchants; ?>
	</div>

	<div class="letter-title" id="M"><span>M</span></div>
	<div class="row row-all-stores">
		<?php echo $mMerchants; ?>

	</div>

	<div class="letter-title" id="N"><span>N</span></div>
	<div class="row row-all-stores">
		<?php echo $nMerchants; ?>
	</div>

	<div class="letter-title" id="O"><span>O</span></div>
	<div class="row row-all-stores">
		<?php echo $oMerchants; ?>
	</div>

	<div class="letter-title" id="P"><span>P</span></div>
	<div class="row row-all-stores">
		<?php echo $pMerchants; ?>

	</div>

	<div class="letter-title" id="Q"><span>Q</span></div>
	<div class="row row-all-stores">
		<?php echo $qMerchants; ?>
	</div>

	<div class="letter-title" id="R"><span>R</span></div>
	<div class="row row-all-stores">
		<?php echo $rMerchants; ?>
	</div>

	<div class="letter-title" id="S"><span>S</span></div>
	<div class="row row-all-stores">
	    <?php echo $sMerchants; ?>
	</div>

	<div class="letter-title" id="T"><span>T</span></div>
	<div class="row row-all-stores">
	    <?php echo $tMerchants; ?>
	</div>

    <div class="letter-title" id="U"><span>U</span></div>
	<div class="row row-all-stores">
	    <?php echo $uMerchants; ?>
	</div>

	 <div class="letter-title" id="V"><span>V</span></div>
	<div class="row row-all-stores">
	    <?php echo $vMerchants; ?>
	</div>

	<div class="letter-title" id="W"><span>W</span></div>
	<div class="row row-all-stores">
	    <?php echo $wMerchants; ?>
	</div>

	<div class="letter-title" id="X"><span>X</span></div>
	<div class="row row-all-stores">
	    <?php echo $xMerchants; ?>
	</div>

	<div class="letter-title" id="Y"><span>Y</span></div>
	<div class="row row-all-stores">
		<?php echo $yMerchants; ?>
	</div>

	<div class="letter-title" id="Z"><span>Z</span></div>
	<div class="row row-all-stores">
	<?php echo $zMerchants; ?>
	</div>
</div>
</div>
<?php }
else{
	echo '<h2 class="container">Please add the api key to the nativefeeds plugin </h2>';
}
}
	else{
		echo '<h2 class="container">This theme is not compatible with this plugin version, please update your theme from <a href="https://www.nativemedia.com/nativefeeds/wordpress" target="blank"><u>https://www.nativemedia.com/nativefeeds/wordpress</u></a></h2>';
	}
 ?>

</main>