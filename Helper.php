<?php
if(!defined('ABSPATH'))
{
	exit;
}	
if ( !class_exists( 'nativefeeds_Plugin' ) ) {
    class nativefeeds_Plugin
    {
    public static function GetDescription($DealDescription, $max_length) {
	  if (strlen($DealDescription) > $max_length)
				{
				  $offset = ($max_length - 3) - strlen($DealDescription);
				  $DealDescription = substr($DealDescription, 0, strrpos($DealDescription, ' ', $offset)) . '...';
				}
	 return $DealDescription;
	}
 
    public static function EncodeTextForURL($StrValue) {
		//$StrValue=str_replace("-", "~",$StrValue);		
        $StrValue=str_replace("&", "†",$StrValue);				
        $StrValue=str_replace("/", "♀",$StrValue);
        $StrValue=str_replace("\"", "~",$StrValue);
        $StrValue=str_replace("'", "`",$StrValue);
        $StrValue=str_replace(":", "®",$StrValue);
        $StrValue=str_replace("%", "ᵅ",$StrValue);
        $StrValue=str_replace("?", "§",$StrValue);
        $StrValue=str_replace("+", "◦",$StrValue);
		$StrValue=str_replace(" ", "-",$StrValue);
        $StrValue =urlencode($StrValue);
	 return $StrValue;
    }
	public static function DecodeTextForURL($StrValue) {
		$StrValue =urldecode($StrValue);
        //$StrValue=str_replace("~", "-",$StrValue);
        $StrValue=str_replace("†", "&",$StrValue);
        $StrValue=str_replace("♀", "/",$StrValue);
        $StrValue=str_replace("~", "\"",$StrValue);
        $StrValue=str_replace("®", ":",$StrValue);
        $StrValue=str_replace("`", "'",$StrValue);
        $StrValue=str_replace("ᵅ", "%",$StrValue);
        $StrValue=str_replace("§", "?",$StrValue);
        $StrValue=str_replace("◦", "+",$StrValue);
		$StrValue=str_replace("-", " ",$StrValue);
        return $StrValue;
    }
}
}


?> 