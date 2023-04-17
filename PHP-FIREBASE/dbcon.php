<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;



$factory = (new Factory)
    ->withServiceAccount('firebase-url.json')
    ->withDatabaseUri('https://laravel-test-625e8-default-rtdb.firebaseio.com/')
    ->withDefaultStorageBucket('laravel-test-625e8.appspot.com');

$storage = $factory->createStorage();
$database = $factory->createDatabase();
$bucket = $storage->getBucket();

// sử dụng $storage và $database để thao tác với Firebase

?>
