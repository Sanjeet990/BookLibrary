<?php

require "../model/db.class.php";
$db = db::getInstance();

$query = mysql_real_escape_string($_GET['query']) or die("-9");
$type = $_GET['type'];

if($type == 'email')
{
	$sql = "SELECT * FROM students WHERE email = '".$query."'";
}
else if($type == 'mobile')
{
	$sql = "SELECT * FROM students WHERE mobile = '".$query."'";
}
else{
	$sql = "SELECT * FROM students WHERE username = '".$query."'";
}

$getData = mysql_query($sql); 

die("".mysql_num_rows($getData)."");

?>