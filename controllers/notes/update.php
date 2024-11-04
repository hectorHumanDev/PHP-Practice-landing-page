<?php




//if no validation errors, update record in notes table 

use Core\Database;
use Core\App;
use Core\Validator;
$db = App::container()->resolve(Database::class);


$currentUserId = 1;

//find corresponding note
$note = $db->query('select * from notes where id = :id', params: [
    'id' => $_POST['id']
])->findOrFail();

//verify whether current user is authorized to edit note
authorize(condition: $note['user_id'] === $currentUserId);

//validate the form
$errors = [];

if (!Validator::string($_POST['body'])) {
    $errors['body'] = "A body between 0 and 255 characters is required";
}

if (!empty($errors)) {
    return view('notes/edit.view.php', ['heading' => 'Edit Note', 'errors' => $errors, "note" => $note]);
}

$db->query("update notes set body = :body where id = :id", [
    "id" => $_POST["id"],
    "body" => $_POST["body"],
]);

//redirect user

header("location: /notes");
die();

