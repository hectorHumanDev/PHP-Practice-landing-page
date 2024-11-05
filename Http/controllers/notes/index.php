<?php
use Core\Database;
use Core\App;
$db = App::container()->resolve(Database::class);


$sesh_name = $_SESSION['name'];
// dd($sesh_name);

$heading = "{$sesh_name}'s Notes";

$notes = $db->query('select * from notes where user_id = 1')->findAll();



view("notes/index.view.php", ['heading' => $heading, 'notes' => $notes]);
