<?php 
if(!defined('ABSPATH'))
{
	exit;
}
?>
<nav class="text-center">

<?php 
include_once('Helper.php');
$nativeclass = new nativefeeds_Plugin();
if($total_records>0)
{
	$page_no='';
	$pg = get_query_var('pageno');
	if(!empty($pg))
	{
$page_no= get_query_var('pageno');
	}
if($page_no=='')
{
	$page_no=1;   
}
$total_pages = ceil($total_records / $limit);
if($total_pages==0)
{
  	$total_pages=1;
}

$pagLink = "<ul class='pagination'>";  
if($page_no<=1)
{
	$pagLink.="<li class='disabled'><a href='javascript:void(0);'>Previous</a></li>";
}
else
{
	$pagLink.="<li ><a href='".$redirect_link. '/' .($page_no-1)."'>Previous</a></li>";
}
$counter=0;
$checker=1;
if($page_no>3)
{
	$checker = $page_no - 3;
}
for ($i=$checker; $i<$total_pages + 1; $i++) {  
if($counter>5)
{break;}
	if($i!=$page_no)
	{
    $pagLink .= "<li><a href='".$redirect_link. '/' .$i."'>".$i."</a></li>";  
    }
    else
    {
      $pagLink .= "<li class='active'><a href='".$redirect_link. '/' .$i."'>".$i."</a></li>";  	
    }
	$counter++;
}

if($page_no==$total_pages)
{
	$pagLink.="<li class='disabled'><a href='javascript:void(0);'>Next</a></li>";
}
else
{
	$pagLink.="<li ><a href='".$redirect_link. '/' . ($page_no+1)."'>Next</a></li>";
}
echo $pagLink . "</ul>";  
}
?> 
</nav>