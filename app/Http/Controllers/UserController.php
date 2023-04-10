<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     *
     * @return JsonResponse
     */
    public function index()
    {
        $users = UserRepository::getAll();

        return new JsonResponse(["users" => $users], 200);
    }

    public function searchByName(Request $request)
    {
        $user = UserRepository::getByName(urldecode($request->name));
        return new JsonResponse(["user" => $user], 200);
    }
}
