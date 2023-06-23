<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show($id) {
        $events=Event::all();
        $userEvents = Event::query()->where('user_id', '=', $id)->get();
        $user = User::query()->find($id);
        if (!$user) {
            return response()->json(['success' => false , 'message' => 'User does not exist']);
        }
         response()->json(['error' => 'null', 'user' => new UserResource($user)]);

        return view('user', compact('user', 'events', 'userEvents'));
    }




}
