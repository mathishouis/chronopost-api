<?php


namespace Kozennnn\ChronopostAPI;


use Kozennnn\ChronopostAPI\Exceptions\ChronopostAPIException;
use Kozennnn\ChronopostAPI\Interfaces\IChronopostAPI;
use SoapClient;
use stdClass;

class ChronopostAPI implements IChronopostAPI
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

        /**
         * Check if SOAP is available
         */

        if (!extension_loaded('soap')) {
            die('The SOAP extension is not available, enabled or configured on the server.');
        }

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


    /**
     * Return the package informations.
     *
     * @param string $packageCode
     * @return array
     */

    public function trackPackage(string $packageCode)
    {

        try {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL,"https://api.laposte.fr/suivi/v2/idships/".$packageCode."?lang=fr_FR");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'X-Forwarded-For: 123.123.123.123',
                'X-Okapi-Key: xvhAmC1gMAMH8K+TCjzFyf2P79hcO0XoAyQemoPvNloOnFfBbZ+aQwkyhAVbI1Uv'
            ));
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $server_output = json_decode(curl_exec($ch));

            curl_close ($ch);

            return $server_output;

        } catch ( \SoapFault $e ) {

            throw new ChronopostAPIException($e->getMessage());

        }

    }

}