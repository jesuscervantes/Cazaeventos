<?
// dirección IP
$ip=getenv("REMOTE_ADDR");
// dirección mac
echo"IP: $ip<br>MAC: ";
$cmd = "\nbtstat - a $ip'";
system($cmd);
?>