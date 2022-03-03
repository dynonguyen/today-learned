<?php
$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

echo 'Username: ' . $username . ' - Password: ' . $password;
