<?php

// set up PDO
$db = new PDO('mysql:host=localhost;dbname=movies;charset=utf8', 'root', 'root');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
