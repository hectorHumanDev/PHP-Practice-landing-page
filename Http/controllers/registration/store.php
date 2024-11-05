<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

//validate form inputs 
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characters';
}

if (!empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}

//check if account already exists 
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

//if yes, then alert and redirect to login page 
if ($user) {
    header('location: registration/create.view.php');
    exit();
} else {
    //if no, save to db, log user in, and redirect to dashboard 
    $user = $db->query('insert into users(email, password) VALUES(:email, :password)', ['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

    login($user);

    header('location: /');
    exit();
}




// view('registration/create.view.php');