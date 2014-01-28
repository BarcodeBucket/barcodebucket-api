<?php

namespace Barcodebucket\API;

use Barcodebucket\Model\Barcode;

interface BarcodeLookupInterface
{
    /**
     * @param $gtin
     * @return Barcode
     */
    public function lookup($gtin);
}
