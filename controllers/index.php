<?php

$_SESSION['name'] = 'Hector';

$heading = "Welcome, {$_SESSION['name']}";




view("index.view.php", ['heading' => $heading]);
