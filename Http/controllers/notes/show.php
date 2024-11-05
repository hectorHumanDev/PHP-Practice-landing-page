<?php
use Core\Database;
use Core\App;
$db = App::container()->resolve(Database::class);

$currentUserId = $db->query('SELECT user_id FROM users WHERE email = :email', params: ['email' => $_SESSION['email']])->findOrFail();


$note = $db->query('select * from notes where id = :id', params: [
    'id' => $currentUserId
])->findOrFail();

authorize(condition: $note['user_id'] === $currentUserId);






view("notes/show.view.php", ['heading' => 'Note', 'note' => $note]);

