<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public static function index(Request $request) {

        $users = User::getAllData();
        $project = Project::getAllData();
        return view('app.users', [
            'users' => $users,
            'projects' => $project
        ]);

    }

    public function create (Request $request) {

        $data = $request->all();

        // assign projects to user
        $user = User::set($data);

        if (!$user) {
            return response()->json([
                'success' => false
            ]);
        }

        return response()->json([
            'user' => $user,
            'success' => true
        ]);

    }

}
