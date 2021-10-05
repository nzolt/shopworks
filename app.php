#!/usr/bin/php
<?php
date_default_timezone_set('UTC');
require __DIR__ . '/vendor/autoload.php';

use App\Exceptions;
use App\Data\Models\Shifts\ShiftModel;
use \App\Data\Models\Shifts\ShiftCollection;
use App\Data\Models\Rotas\Rotas;
use App\Facades\ManningCalculator;

$shiftA = new ShiftModel(
        11,
        21,
        192,
        date_create('2021-08-30 09:00:00'),
        date_create('2021-08-30 13:30:00')
);
$shiftB = new ShiftModel(
    22,
    21,
    145,
    date_create('2021-08-30 12:00:00'),
    date_create('2021-08-30 17:30:00')
);
$shiftC = new \App\Data\Models\Shifts\ShiftModel(
    33,
    21,
    476,
    date_create('2021-08-30 13:30:00'),
    date_create('2021-08-30 17:30:00')
);
$shiftS = new ShiftModel(
    11, 21, 192,
    date_create('2021-08-30 09:00:00'),
    date_create('2021-08-30 17:30:00')
);

// All day single
$shifts = [$shiftS];
$shiftCollection = new ShiftCollection($shifts);
$rota = new Rotas();
$rota->setId(21);
$rota->setShifts($shiftCollection);

$manning = ManningCalculator::calculate($rota);

var_export($manning);
// Shared, no overlap
$shifts = [$shiftA, $shiftC];
$shiftCollection = new ShiftCollection($shifts);
$rota = new Rotas();
$rota->setId(21);
$rota->setShifts($shiftCollection);

$manning = ManningCalculator::calculate($rota);

var_export($manning);

// Shared with overlap
$shifts = [$shiftA, $shiftB];
$shiftCollection = new ShiftCollection($shifts);
$rota = new Rotas();
$rota->setId(21);
$rota->setShifts($shiftCollection);

$manning = ManningCalculator::calculate($rota);

var_export($manning);

echo PHP_EOL;