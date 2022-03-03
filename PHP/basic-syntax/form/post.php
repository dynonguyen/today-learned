<?php
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

echo 'Username: ' . $username . ' - Password: ' . $password;
