<?php

namespace App\Repository\Login;

interface LoginRepository
{
    public function getEmail($email);
    public function getUsername($username);
    public function logout($logout);
    public function register($data);
    public function register_web_setting($data);
}
