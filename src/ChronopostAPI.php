<?php


namespace Kozennnn\ChronopostAPI;


use Kozennnn\ChronopostAPI\Exceptions\ChronopostAPIException;
use Kozennnn\ChronopostAPI\Interfaces\ChronopostAPIInterface;
use SoapClient;

class ChronopostAPI implements ChronopostAPIInterface
{

    /**
     * The soap client instance.
     *
     * @var SoapClient
     */

    private $client;


    /**
     * ChronopostAPI constructor.
     *
     * @param int $trace
     * @param int $connectionTimeout
     */

    public function __construct(int $trace = 0, int $connectionTimeout = 10)
    {

        $this->client = new SoapClient(
            'http://wsshipping.chronopost.fr/soap.point.relais/services/ServiceRechercheBt?wsdl',
            array(
                'trace' => 0,
                'connection_timeout' => 10,
            )
        );

    }


    /**
     * Return the list of available Pickup points.
     *
     * @param string $zip
     * @return array
     */

    public function getPickupPointsFromZipCode(string $zip)
    {

        try {

            return $response = $this->client->__call('rechercheBtParCodeproduitEtCodepostalEtDate', array(0, $zip, 0));

        } catch ( \SoapFault $e ) {

            throw new ChronopostAPIException($e->getMessage());

        }

    }

}