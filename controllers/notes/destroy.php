<?php
use Core\App;
use Core\Database;


$db = App::container()->resolve(Database::class);

$currentUserId = 1;



$note = $db->query('select * from notes where id = :id', params: [
    'id' => $_POST['id']
])->findOrFail();

authorize(condition: $note['user_id'] === $currentUserId);
//form was submitted. delete the current note 
$db->query('delete from notes where id = :id', params: [
    'id' => $_GET['id']
]);

header('location: /notes');

exit();







