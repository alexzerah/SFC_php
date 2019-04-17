<?php

function get_pets()
{
    $config = require 'config.php';
    $pdo = new PDO(
        $config['database_dsn'],
        $config['database_user'],
        $config['database_pass']
    );
    $result = $pdo->query('SELECT * FROM pet LIMIT 3');
    $pets = $result->fetchAll();

    return $pets;
}

function save_pets($pets)
{
    $json = json_encode($pets, JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $json);
}
