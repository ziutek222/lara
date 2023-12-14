<?php

require 'Validator.php';

$config = require 'config.php';


$db = new Database($config['database']);

$heading = "Create a note";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = "body of no more than 1000 character is required";
    }

    if (empty($errors)) {
        $db->query('INSERT INTO `notes`(`body`, `user_id`) VALUES (:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }

}

require __DIR__ . '/../views/note-create.view.php';