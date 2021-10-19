<?php
$file = fopen('users2.csv', 'r') or die("File could not open!");
$users = [];

while (!feof($file)) {
    $user = fgetcsv($file);
    if ($user === false) continue;
    $users[] = $user;
    echo "<div>$user[0] | $user[1] | $user[2]</div>";
}

