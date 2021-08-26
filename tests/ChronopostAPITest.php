<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Kozennnn\ChronopostAPI\ChronopostAPI;

$chronopost = new ChronopostAPI();

print_r($chronopost->getPickupPointsFromZipCode('44000'));
print_r($chronopost->trackPackage('000'));