<?php
define('db_host', 'localhost');
define('db_user', 'root');
define('db_pass', '@dmin1234S');
define('db_name', 'db_aqlweb');
define('db_char', 'utf8');
define('db_port', 3306);

function db_connect()
{
    try {
        mysqli_connect(db_host, db_user, db_pass, db_name, db_port);
    } catch (Exception $e) {
        die('Error...: ' . $e->getMessage());
    }
}

// Get request and return value
function get($name, $default = '')
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
}

function genToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[rand(0, $max - 1)];
    }

    return $token;
}