<?php

if (isset($_SERVER['argv'])
        && isset($_SERVER['argv'][1])) {

   
} else {
   echo "problem with arg";
   exit (0);
}

include('../emulatoragent.php');
$emulatorAgent = new emulatorAgent;
$emulatorAgent->server_urlpath = "/glpi084/plugins/fusioninventory/";

$overload = 0;
$start_time = microtime(true);

$inputXML = file_get_contents($_SERVER['argv'][1]);
$prologXML = $emulatorAgent->sendProlog($inputXML);
echo $prologXML;
exit;

if (strstr("SERVER OVERLOADED", $prologXML)) {
   $overload++;
}
 
echo "Time: ".(microtime(true) - $start_time);
echo " seconds ";
echo "(overload: ".$overload.")\n";

?>