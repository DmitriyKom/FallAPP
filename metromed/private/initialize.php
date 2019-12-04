<?php
  ob_start(); //output buffering on
  define("PRIVATE_PATH", dirname(__FILE__));
  define("PROJECT_PATH", dirname(PRIVATE_PATH));
  define("PUBLIC_PATH", PROJECT_PATH . '/public');
  define("SHARED_PATH", PRIVATE_PATH . '/shared');

  //OLD - When prior to /public being the DocumentRoot
  // $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
  $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public');

  $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
  define("WWW_ROOT", $doc_root);

  $public_profile_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 19;
  $profile_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_profile_end);
  define("PROFILE", $profile_root);

  require_once('functions.php');
  require_once('database.php');
  require_once('query_functions.php');

  $db = db_connect();

?>
