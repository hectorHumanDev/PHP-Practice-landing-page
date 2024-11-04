<?php
use Core\App;
use Core\Database;
use Core\Validator;
//log in the user if the credentials match
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

//match the credentials
$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

if (!$user) {
    return view('sessions/create.view.php', ['error' => ['email' => 'No Matching account found.']]);
}

view('sessions/store.view.php');