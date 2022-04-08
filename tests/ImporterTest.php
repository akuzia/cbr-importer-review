<?php

namespace AKuzia\CBRImporter\Tests;

use AKuzia\CBRImporter\Importer;
use PHPUnit\Framework\TestCase;

class ImporterTest extends TestCase
{
    public function testGetRates(): void
    {
        $i = new Importer();

        foreach ($i->getRates() as $currency) {
            $this->assertIsString($currency->getCode());
            $this->assertNotNull($currency->getCode());

            $this->assertIsFloat($currency->getRate());
            $this->assertNotNull($currency->getRate());
        }
    }
}
