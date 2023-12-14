<?php

$heading = 'A Note';

$config = require 'config.php';


$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);


require __DIR__ . '/../views/note.view.php';
