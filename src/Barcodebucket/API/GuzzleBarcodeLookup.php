<?php
namespace Barcodebucket\API;

use Barcodebucket\Model\Barcode;
use Guzzle\Http\ClientInterface;

/**
 * Class GuzzleBarcodeLookup
 * @package Barcodebucket\API
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
            ->get('/barcode/'.$gtin)
            ->send()
            ->json()
        ;

        return new Barcode($data['uuid'], $data['gtin']);
    }
}
