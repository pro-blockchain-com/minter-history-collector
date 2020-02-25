<?php
function node_url()
{

$node_urls = node_urls();

    $k = count($node_urls);
    $v = rand(0,$k);
    $out = $node_urls[$v];
    if(!$out)$out = node_url();
    return $out;
}
?>