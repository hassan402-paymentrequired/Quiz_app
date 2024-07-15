<?php

namespace Core;

use Database;
use DatabaseConnection;

require('../config/database.php');


require('./function.php');
session_start();

class AuthenticateUser
{

    public $connection;
    public $verifyEmail;

    public function __construct()
    {
        $this->connection =  DatabaseConnection::connect();
        $this->verifyEmail = new Validate();
    }
    public function login($email, $password)
    {
        // create db connection
        $db = $this->connection;

        // validate email
        $validateEmail = new Validate();
        $valid_email = $validateEmail::validateEmail($email);

        if (!$valid_email) {
            return false;
        }
        $sql = "SELECT * FROM users WHERE email = ?";

        $user = $db->query($sql, [$email])->fetch();

        if (!$user) {
            return false;
        }

        if (!password_verify($password, $user["password"])) {
            return false;
        }

        return $user;
    }

    // TODO:FUNCTIONAL
    // public function logout()

    public function Register($email, $password, $first_name, $last_name, $phone, $role)
    {

        // connect to db and validate the email
        $db = $this->connection;


        $sql = "SELECT * FROM users WHERE email = ?";

        $user = $db->query($sql, [$email])->fetch();

        if ($user) {
            return false;
        }

        try {
            $hashPwd = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (first_name, last_name, email, role, phone, password) VALUE(?,?,?,?,?,?)";

            $newUser = $db->query($sql, [$first_name, $last_name, $email, $role, $phone, $hashPwd]);
            $userOne = $db->query("SELECT * FROM users WHERE email = ?", [$email])->fetch();

            return $userOne;
        } catch (\Throwable $e) {
            var_dump($e->getMessage());
        }
    }
}
