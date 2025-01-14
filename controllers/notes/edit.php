<?php
use Core\Database;
use Core\App;
$db = App::container()->resolve(Database::class);


$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', params: [
    'id' => $_GET['id']
])->findOrFail();

authorize(condition: $note['user_id'] === $currentUserId);

view("notes/edit.view.php", ['heading' => 'Edit Note', 'errors' => [], "note" => $note]);