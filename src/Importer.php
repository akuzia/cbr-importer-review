<?php

namespace AKuzia\CBRImporter;

use GuzzleHttp\Client;
use SimpleXMLElement;

class Importer
{
    private const RATES_URL = 'http://www.cbr.ru/scripts/XML_daily.asp';

    private static function getHttpClient(): Client
    {
        return new Client();
    }

    public function getRates(): array
    {
        $client = self::getHttpClient();

        $xml = $client->get(self::RATES_URL)->getBody()->getContents();

        $xmlParser = new SimpleXMLElement($xml);

        $rates = [];
        foreach ($xmlParser->Valute as $valute) {
            $rates[(string) $valute->CharCode] = new Currency(
                (string) $valute->CharCode,
                (float) $valute->Value / (int) $valute->Nominal,
            );
        }

        return $rates;
    }
}
