<?php

namespace App\Taxes;

use Psr\Log\LoggerInterface;

class Detector
{
    protected $seuil;
    public function __construct(float $seuil)
    {
        $this->seuil = $seuil;
    }

    public function detector(float $prx): bool
    {
        if ($prx > $this->seuil) {
            return true;
        } else {
            return false;
        }
    }
}