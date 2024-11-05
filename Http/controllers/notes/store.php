<?php

use Core\Validator;
use Core\Database;
use Core\App;
$db = App::container()->resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'])) {
    $errors['body'] = "A body between 0 and 255 characters is required";
}

if (!empty($errors)) {
    return view('notes/create.view.php', ['heading' => 'Create Note', 'errors' => $errors]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
die();
