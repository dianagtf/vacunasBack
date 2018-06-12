<?php // src/listVaccines.php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../bootstrap.php';

use AppBundle\Entity\Vacunas;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

$entityManager = getEntityManager();

$vaccines = getEntityManager()->getRepository(Vacunas::class)->findAll();

if(in_array( '--json', $argv)){
    echo json_encode($vaccines, JSON_PRETTY_PRINT);
} else{
    foreach ($vaccines as $vaccine){
        echo '2 Meses: ', $vaccine->getTwoMonths(), '4 Meses: ', $vaccine->getFourMonths(), PHP_EOL;
    }
}

