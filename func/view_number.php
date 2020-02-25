<?php
function view_number($temp_number=1,$digits=20,$symbol = "0")
{
if (strlen($temp_number)<$digits) for ($i=strlen($temp_number);$i<$digits;$i++) $temp_number=$symbol.$temp_number;
        return @$temp_number;
}
?>
