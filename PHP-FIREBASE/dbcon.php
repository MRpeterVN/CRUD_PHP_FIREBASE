<?php

require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;



$factory = (new Factory)
    
$storage = $factory->createStorage();
$database = $factory->createDatabase();
$bucket = $storage->getBucket();

// sử dụng $storage và $database để thao tác với Firebase

?>
