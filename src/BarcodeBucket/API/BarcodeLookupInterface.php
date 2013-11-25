<?php

namespace BarcodeBucket\API;

use BarcodeBucket\Model\Barcode;

interface BarcodeLookupInterface {
    /**
     * @param $gtin
     * @return Barcode
     */
    function lookup($gtin);
}