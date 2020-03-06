#!/usr/bin/php
<?php

$dir = __DIR__."/";

$a = "* * * * *       root    cd $dir;./connector.php > connector.log 2>&1\n";

print $a;
