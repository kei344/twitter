<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwittersController extends Controller
{
    public function index() {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $twitters = $user->twitters()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'twitters' => $twitter,
            ];
        }

        return view('welcome', $data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->twitters()->create([
            'content' => $request->content,
        ]);

        return back();
    }

    public function destroy($id) {
        $twitter = \App\Twitter::find($id);

        if (\Auth::id() === $twitter->user_id) {
            $twitter->delete();
        }

        return back();
    }
}
