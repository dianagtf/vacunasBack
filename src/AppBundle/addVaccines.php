<?php   // src/addVaccines.php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../bootstrap.php';

use AppBundle\Entity\Vacunas;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

$entityManager = getEntityManager();

$vaccines1 = new Vacunas("Poliomelitis", "",true, true, false,
    true, false, false, false, false, false);

$vaccines2 = new Vacunas("Difteria-Tétanos-Pertussis", "",true, true, true,
    false, false, false, true, false, true);

$vaccines3 = new Vacunas("Haemophilus inﬂuenzae b", "",true, true, false,
    true, false, false, true, false, true);

$vaccines4 = new Vacunas("Hepatitis BA", "",true, true, false,
    true, false, false, true, false, true);

$vaccines5 = new Vacunas("Neumocócica conjugada 13V", "",true, true, false,
    true, false, false, true, false, true);

$vaccines6 = new Vacunas("Sarampión-Rubeola-Parotiditis", "",true, true, false,
    true, false, false, true, false, true);

$vaccines7 = new Vacunas("Meningococo C", "",true, true, false,
    true, false, false, true, false, true);

$vaccines8 = new Vacunas("Varicela", "",true, true, false,
    true, false, false, true, false, true);

$vaccines9 = new Vacunas("Virus del Papiloma Humano", "",true, true, false,
    true, false, false, true, false, true);

try {
    $entityManager->persist($vaccines1);
    $entityManager->persist($vaccines2);
    $entityManager->persist($vaccines3);
    $entityManager->persist($vaccines4);
    $entityManager->persist($vaccines5);
    $entityManager->persist($vaccines6);
    $entityManager->persist($vaccines7);
    $entityManager->persist($vaccines8);
    $entityManager->persist($vaccines9);

    $entityManager->flush();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
