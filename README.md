# Chronopost API

A PHP package to make the Chronopost API easier to use.

## Table of Contents

[Requirements](#requirements)  
[Installation](#installation)

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

use Kozennnn\ChronopostAPI\ChronopostAPI;

$chronopost = new ChronopostAPI();
print_r($chronopost->getPickupPointsFromZipCode('44000')); // will print array with all the pickup points

```