<?php
function get_spies($port) {

  $addr = $_SERVER['SERVER_ADDR'];

  $c = exec("netstat -tn|grep -c $addr:$port");

  if (!is_numeric($c)) return 'U';
  return intval($c);

}

$cams = array(
  8001 => 'main',
  8002 => 'robot',
  8003 => 'doorcam',
  8004 => 'workshop'
);

foreach($cams as $port => $cam) {
  $spies = get_spies($port);
  echo "$cam: $spies ";
}
echo "\n";

?>
