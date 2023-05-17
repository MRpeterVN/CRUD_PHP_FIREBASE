<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;
use Google\Cloud\Storage\StorageClient;



$factory = (new Factory)
    ->withServiceAccount('firebase-url.json')
    ->withDatabaseUri('https://newproject-cd7e7-default-rtdb.firebaseio.com/')
    ->withDefaultStorageBucket('newproject-cd7e7.appspot.com');

$storage = $factory->createStorage();
$database = $factory->createDatabase();
$bucket = $storage->getBucket();



// sử dụng $storage và $database để thao tác với Firebase

?>
