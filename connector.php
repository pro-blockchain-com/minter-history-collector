#!/usr/bin/php
<?php

include "conf.php";
$f = get_defined_functions();

//print_r($f);die;

$file_lb = __FILE__.".last_block";
$last_block = file_get_contents($file_lb);

$time = time();

while($time>(time()-59))
{
$node_url = node_url();
$kuda = $node_url."/status";
print $kuda."\n";
$a = file_get_contents($kuda);
$a = json_decode($a,1);

$block = $a[result][latest_block_height];
//print_r($a);
print date("H:i:s\t").$last_block."\t".$block."\n";
$flag = 0;
if($last_block == $block){sleep(1);$flag=1;}
if($flag)continue;

$block = $a[result][latest_block_height];
if($last_block<$block)
{
$last_block = $block;

file_put_contents($file_lb,$last_block);

$b = $block;
$b2 = view_number($b,8);
//print "====================\n";
$b2 = direr($b2);
//$d =  __DIR__."/cache/$b2";
$d =  "$cache_dir/$b2";
$d2 = dirname($d);
if(!file_exists($d2))exec("mkdir -p $d2");
    unset($file_mas);
    $file_mas[block] = "$d.b";;
    $file_mas[validators] = "$d.v";;
    $file_mas[candidates] = "$d.c";;

    foreach($file_mas as $k=>$file)
    {
print "\t".$file."\n";
//    $file = __DIR__."/cache/$i";
    if(!file_exists($file))
    {
    $size = filesize($file);
    print "\t=== $k = $size ======";
	switch($k)
	{
	    case "block":
		$kuda = $node_url."/$k?height=$b";
	    break;
	    case "candidates":
	    $kuda = $node_url."/$k?include_stakes";
	    break;
	    default:
	    $kuda = $node_url."/$k";
	}
//	$kuda = $node_url."/$k?height=$b";
	print "\t\t".$kuda."\n";
	$a = file_get_contents($kuda);
	file_put_contents($file,$a);
//	print_r($a);
    }
    }

}


sleep(1);
}