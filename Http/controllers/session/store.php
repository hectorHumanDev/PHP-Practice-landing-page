<?php
use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;
//log in the user if the credentials match
$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if (!$form->validate($email, $password)) {
    return view('session.view.create.php', ['errors' => $form->errors()]);
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