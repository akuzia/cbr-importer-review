<?php

namespace AKuzia\CBRImporter;

class Currency
{
    public string $code;
    public float $rate;

    public function __construct(
        string $code,
        float $rate
    ) {
        $this->code = $code;
        $this->rate = $rate;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRate(): float
    {
        return $this->rate;
    }
}
