<?php   // src/addUsers.php

require __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../bootstrap.php';

use AppBundle\Entity\Users;

// Carga las variables de entorno
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

$entityManager = getEntityManager();

$user1 = new Users(1, "user1", "user1", "user1");



try {
    $entityManager->persist($user1);

    $entityManager->flush();
} catch (Exception $exception) {
    echo $exception->getMessage();
}
