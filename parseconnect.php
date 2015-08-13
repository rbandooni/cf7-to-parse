<?php
require 'autoload.php';
use Parse\ParseClient;
 use Parse\ParseObject;

/*
Get post values from ajax
*/
$masterId = $_POST['masterid'];
$restId = $_POST['restId'];
$parseClass = $_POST['parseclass'];
$appId = $_POST['appid'];

ParseClient::initialize($appId, $restId, $masterId);

$query = new ParseQuery("TestObject");

// Get a specific object:
$object = $query->get("anObjectId");


?>