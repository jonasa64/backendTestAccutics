<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        // Get email and name from request
        $email = $request->email ?? "";
        $name = urldecode($request->name) ?? "";

        $users = UserRepository::getAll();

        // Check that email or name was provided
        if (!empty($email) || !empty($name)) {
            $user = UserRepository::searchUser($email, $name);

            // Check user was found
            if ($user)
                return new JsonResponse(["user" => $user], 200);
            else
                return new JsonResponse(["message" => "user not found"], 404);
        }
        return new JsonResponse(["users" => $users], 200);
    }
}
