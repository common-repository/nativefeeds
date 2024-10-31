<?php
if(!defined('ABSPATH'))
{
	exit;
}
include('Common_Admin.php');
?>
<div class="container row">
  <div class="page-header">
    <h1> Shortcodes</h1>
  </div>

  <div class="col-sm-12">
   <div class="col-sm-3">
     <strong>Home Page Offers</strong>
     <div class="well">[native_homepage]</div>
   </div>
   <div class="col-sm-3">
    <strong>All Merchant</strong>
    <div class="well">[native_merchant_all] </div>
  </div>
   <div class="col-sm-3">
    <strong>All Premium Merchants</strong>
    <div class="well">[native_premium_merchant] </div>
  </div> 
 <div class="col-sm-3">
    <strong>category</strong>
    <div class="well">[native_category] </div>
  </div>
</div>

<div class="col-sm-12">
<div class="col-sm-3">
    <strong>Merchants</strong>
    <div class="well">[native_merchant] </div>
  </div>    
  <div class="col-sm-3">
    <strong>Page Title</strong>
    <div class="well">[native_title]</div>
  </div> 
  <div class="col-sm-3">
    <strong>Page Description</strong>
    <div class="well">[native_description]</div>
  </div>  
   <div class="col-sm-3">
    <strong>Page Keywords</strong>
    <div class="well">[native_keyword]</div>
  </div> 
  
</div>

<div class="col-sm-12">
  
<h2>Shortcodes Discription</h2>
<div class="container">
<h4>[native_homepage]</h4>
<p>Use this in your home page to show the feeds for your offers and coupoun with a responsive User interface.</p>
</div>

<div class="container">
<h4>[native_merchant_all]</h4>
<p>This shortcode shows the merchant.</p>
</div>

<div class="container">
<h4>[native_premium_merchant]</h4>
<p>Shows the list of Merchants those are premium</p>
</div>

<div class="container">
<h4>[native_title]</h4>
<p>Shows the title of the page</p>
</div>

<div class="container">
<h4>[native_description]</h4>
<p>Shows the description related to the page</p>
</div>

<div class="container">
<h4>[native_keyword]</h4>
<p>Shows the keywords related to the page</p>
</div>
</div>

</div>
