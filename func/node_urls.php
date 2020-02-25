<?php

function node_urls()
{
$f = __FILE__;
$d = dirname($f);
$d = dirname($d);
$f = $d."/node_urls.txt";
if(!file_exists($f))
{
    $txt = "";
    $txt .= "# disabled line start with #\n";
    $txt .= "http://127.0.0.1:8841";
    file_put_contents($f,$txt);
}
$exec = "cat $f | grep -v '#'";
exec($exec,$reg);
$a = implode("\n",$reg);
$a = trim($a);
$node_urls = explode("\n",$a);
//print_r($reg);

return $node_urls;
}
?>