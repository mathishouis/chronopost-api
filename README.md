# Chronopost API

A PHP package to make the Chronopost API easier to use.

## Table of Contents

* [Requirements](#requirements)  
* [Installation](#installation)
* [Usage](#usage)

## Requirements

* PHP 7.3, 7.4 or 8.0

## Installation

```
composer require kozennnn/chronopost-api
```

## Usage

The following code return all the available Chronopost Pickup points.

```php
<?php

use Kozennnn\ChronopostAPI\IChronopostAPI;

$chronopost = new IChronopostAPI();
print_r($chronopost->getPickupPointsFromZipCode('44000')); // will print array with all the pickup points

```
#

The following code return the package tracking informations.

```php
<?php

use Kozennnn\ChronopostAPI\IChronopostAPI;

$chronopost = new IChronopostAPI();
print_r($chronopost->trackPackage('000')); // will print array with all the pickup points package tracking informations.

```