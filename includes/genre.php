<?php

require "../model/db.class.php";
$db = db::getInstance();


echo "[";

$getData = mysql_query("SELECT * FROM genre"); 

while($info = mysql_fetch_assoc($getData))
{
   echo "{\"key\": \"".$info['id']."\", \"value\": \"".$info['name']."\"}, ";     
}

echo mysql_error();
/*
$data = array();

foreach($getData as $info) 
{
if($myId == $info['user1'])
{
$friend = $info['user2'];
}else{
$friend = $info['user1'];
}

   echo "{\"key\": \"".$info['id']."\", \"value\": \"".$info['name']."\"}, ";     
}

*/
//echo json_encode($data);//data array is converted in json format response

echo '{"key": "None", "value": "None"}]';

?>