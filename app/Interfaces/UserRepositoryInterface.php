<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    static function getAll();
    static function getByName($name);
    static function add($user_id, $name, $email);
}
