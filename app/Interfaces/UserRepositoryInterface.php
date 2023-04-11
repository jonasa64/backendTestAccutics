<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    static function getAll();
    static function add($user_id, $name, $email);
    static function searchUser($email, $name);
}
