<?php

namespace Barcodebucket\Tests\API;
use Barcodebucket\API\GuzzleBarcodeLookup;
use Guzzle\Http\Client;

/**
 * Class GuzzleBarcodeLookupTest
 * @package Barcodebucket\Tests\API
 * @group internet
 */
class GuzzleBarcodeLookupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var GuzzleBarcodeLookup
     */
    private $lookup;

    protected function setUp()
    {
        $this->lookup = new GuzzleBarcodeLookup(new Client('http://barcodebucket.com/'));
    }

    public function testLookingUpBarcode09771128436002WorksWell()
    {
        $gtin = '09771128436002';
        $barcode = $this->lookup->lookup($gtin);

        $this->assertSame($gtin, $barcode->getGtin());
        $this->assertRegExp('/^[a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12}$/', $barcode->getUuid());
    }
}
