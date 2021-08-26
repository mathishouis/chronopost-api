<?php


namespace Kozennnn\ChronopostAPI\Interfaces;


interface IChronopostAPI
{

    /**
     * Return the list of available Pickup points.
     *
     * @param string $zip
     * @return array
     */

    public function getPickupPointsFromZipCode(string $zip);


    /**
     * Return the package informations.
     *
     * @param string $packageCode
     * @return array
     */

    public function trackPackage(string $packageCode);

}