<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\Campaign;

class UserRepository implements UserRepositoryInterface
{
    public static $users = [];

    /**
     *
     * @return array
     */
    public static function getAll()
    {
        if (count(self::$users) == 0) {
            for ($i = 1; $i <= 20; $i++) {
                UserRepository::add($i, "Test user" . $i, "test@mail$i.dk");
            }
        }

        return self::$users;
    }


    /**
     *
     * @param int $user_id
     * @param string $name
     * @param string $email
     * @return void
     */
    public static function add($user_id, $name, $email)
    {
        if (!in_array($user_id, self::$users)) {
            self::$users[] = [
                "user_id" => $user_id,
                "name" => $name,
                "email" => $email,
                "campaigns" => self::getNumberOfCampaigns($user_id),
            ];
        }
        return;
    }
    /**
     *
     * @param string $email
     * @param string $name
     * @return null|mixed
     */
    public static function searchUser($email, $name)
    {
        $users = self::getAll();
        $user = null;
        for ($i = 0; $i < count($users); $i++) {
            // Check if email or name match what is search for
            if ($users[$i]["email"] == $email || $users[$i]["name"] == $name) {
                $user = $users[$i];
                break;
            }
        }
        return $user;
    }

    /**
     *
     * @param int $user_id
     * @return int
     */
    private static function getNumberOfCampaigns($user_id)
    {
        return Campaign::where("user_id", "=", $user_id)->count();
    }
}
