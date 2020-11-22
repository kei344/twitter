<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Twitter;

class UsersController extends Controller
{
    public function index() {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id) {
        $user = User::find($id);
        $twitters = $user->twitters()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'twitters' => $twitters,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }

    public function followings($id) {
        $user = User::find($id);
        $users = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $users,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id) {
        $user = User::find($id);
        $users = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $users,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }

    public function favorites($id) {
        $user = User::find($id);
        $favorite_twitters = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'twitters' => $favorite_twitters,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }
}
