<?php // src/listVaccines.php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../bootstrap.php';

use AppBundle\Entity\Users;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

$entityManager = getEntityManager();

$users = getEntityManager()->getRepository(Users::class)->findAll();

if(in_array( '--json', $argv)){
    echo json_encode($users, JSON_PRETTY_PRINT);
} else{
    foreach ($users as $user){
        echo 'Username: ', $user->getUsername(), ' Firstname: ', $user->getFirstName(), PHP_EOL;
    }
}

