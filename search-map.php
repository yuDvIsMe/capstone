<?php

$baseURL = 'http://dev.virtualearth.net/REST/v1/Locations';
$key = 'AlmIeyDzBddgg5hMt7sF9PROmNTOdcynd_uNAY1MfNqqg5UbI4guFUk6YqzkyGoI';

$request_body = file_get_contents('php://input');

$body = json_decode(($request_body), true);

$query = str_ireplace(" ","%20",$body['query']);  
  
// Construct the final Locations API URI  
$findURL = $baseURL."/".$query."?output=json&key=".$key;  
  
// get the response from the Locations API and store it in a string  
$output = file_get_contents($findURL);  
  
$response = json_decode($output, true);

printf($output);
