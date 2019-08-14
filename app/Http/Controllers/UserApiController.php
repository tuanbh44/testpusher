<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserApiController extends Controller
{
    public function getUserApi() {
        $users = User::all();

        return response()->json(['users' => $users]);
    }
}
