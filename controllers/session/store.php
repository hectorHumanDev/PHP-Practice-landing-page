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
    $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
    return view('session/create.view.php', ['errors' => $errors]);
}

//match the credentials
$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view('session/create.view.php', ['error' => ['email' => 'No Matching account found for that email and password.']]);



// view('/store.view.php');