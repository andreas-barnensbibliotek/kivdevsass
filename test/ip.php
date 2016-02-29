<?php
echo "hej ip: ";
$url = "http://checkip.dyndns.org";
echo file_get_contents($url);
?>