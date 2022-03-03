<?php
$username = isset($_GET['username']) ? $_GET['username'] : null;
$password = isset($_GET['password']) ? $_GET['password'] : null;

echo 'Username: ' . $username . ' - Password: ' . $password;
