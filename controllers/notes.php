<?php

$heading = 'My Notes';

$config = require 'config.php';


$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->get();

// dd($notes);

require __DIR__ . '/../views/notes.view.php';
