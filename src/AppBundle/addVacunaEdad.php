<?php   // src/addUsers.php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../bootstrap.php';

use AppBundle\Entity\VacunaEdad;
use AppBundle\Entity\Users;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

$entityManager = getEntityManager();

$user1 = new Users(1, "user1", "user1", "user1", "", "", "",
    1, "");

$vacunaedad = new VacunaEdad($user1, "user1", "twoMonths", "2 Meses", "Poliomelitis",
    "Difteria-Tétanos-Pertussis", "Haemophilus influenzae b", "Hepatitis B", "Neumocócica conjugada 13V",
    "", false, false, false, false, false, false,
    "", "", "", "", "", "");


try {
    $entityManager->persist($vacunaedad);

    $entityManager->flush();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
