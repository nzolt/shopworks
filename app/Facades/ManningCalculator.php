<?php

namespace App\Facades;

use App\Data\Models\Rotas\Rotas;
use App\Service\SingleManning;
use App\Service\SharedManning;

class ManningCalculator
{
    public static function calculate(Rotas $rotas, bool $singleOnly = false): array
    {
        $mannings['single'] = SingleManning::calculateManning($rotas->getShifts());
        $mannings['shared'] = SharedManning::calculateManning($rotas->getShifts());

        return $mannings;
    }
}