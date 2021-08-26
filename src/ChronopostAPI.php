<?php


namespace Kozennnn\ChronopostAPI;


use SoapClient;

class ChronopostAPI
{

    public function __construct()
    {

    }

    public static function test(string $zip)
    {

        try {

            $client = new SoapClient(
                'http://wsshipping.chronopost.fr/soap.point.relais/services/ServiceRechercheBt?wsdl', array(
                    'trace' => 0,
                    'connection_timeout' => 10,
                )
            );
            $response = $client->__call('rechercheBtParCodeproduitEtCodepostalEtDate', array(0, $zip, 0));
            return $response;

        } catch ( \SoapFault $e ) {

        }

    }

}