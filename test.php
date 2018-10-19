<?php
$user_ip = $_SERVER['REMOTE_ADDR'];


$restrictedIPs = array(

  '206.190.155.0/140',
  '112.210.250.0/100'

); // array of ips which you want to block

function testUserIP($user_ip, $restrictedIPs) {
  $ipu = explode('.', $user_ip);
  foreach ($ipu as &$v)
    $v = str_pad(decbin($v), 8, '0', STR_PAD_LEFT);
  $ipu = join('', $ipu);
  $res = false;
  foreach ($restrictedIPs as $cidr) {
    $parts = explode('/', $cidr);
    $ipc = explode('.', $parts[0]);
    foreach ($ipc as &$v) $v = str_pad(decbin($v), 8, '0', STR_PAD_LEFT);
    $ipc = substr(join('', $ipc), 0, $parts[1]);
    $ipux = substr($ipu, 0, $parts[1]);
    $res = ($ipc === $ipux);
    if ($res) break;
  }
  return $res;
}

if (!isset($_SESSION['ip'])) {

if (!testUserIP($user_ip, $restrictedIPs)) {
  // user ip is ok
  require_once 'access-denied.php';
  die();
  }else{
    echo "access";
  }


}