<?php

// set up PDO
$db = new PDO('mysql:host=localhost;dbname=vinogram;charset=utf8', 'root', 'rooot');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
