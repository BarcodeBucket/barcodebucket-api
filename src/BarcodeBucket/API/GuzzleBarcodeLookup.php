<?php
namespace BarcodeBucket\API;

use BarcodeBucket\Model\Barcode;
use Guzzle\Http\ClientInterface;

/**
 * Class GuzzleBarcodeLookup
 * @package BarcodeBucket\API
 */
class GuzzleBarcodeLookup implements BarcodeLookupInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * Constructor
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $gtin
     * @return Barcode
     */
    public function lookup($gtin)
    {
        $data = $this
            ->client
            ->get('/barcodes/'.$gtin)
            ->send()
            ->json()
        ;

        return new Barcode($data->uuid, $data->gtin);
    }
}
