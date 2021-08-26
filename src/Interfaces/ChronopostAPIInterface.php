<?php


namespace Kozennnn\ChronopostAPI\Interfaces;


interface ChronopostAPIInterface
{

    /**
     * Return the list of available Pickup points.
     *
     * @param string $zip
     * @return array
     */

    public function getPickupPointsFromZipCode(string $zip),

}