<?php

Abstract Class baseController {

/*
 * @registry object
 */
protected $registry;

function __construct($registry) {
	db::getInstance();
	$this->registry = $registry;
	$timezone = "Asia/Calcutta";
	if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
}


function getPref($varx)
{

$res = mysql_query("SELECT * FROM `settings` WHERE `id` = '1'");
$res2 = mysql_fetch_assoc($res);
return $res2[$varx];
}

function sanitize($text)
{
return mysql_real_escape_string($text);
}

function sanitizes($text)
{
return htmlentities($text);
}

function mob_num($text)
{
$isOk = preg_match("/^[789][0-9]{9}$/", $text);
if($isOk) return $text;
else false;
}

/**
 * @all controllers must contain an index method
 */
abstract function index();
}

?>
