<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\EventUserResource;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{




    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $title = $request->get('title');
        $text = $request->get('text');
        $authorId=Auth::id();

        $event = Event::create([
            'title' => $title,
            'text' => $text,
            'user_id' => $authorId,
        ]);

        EventUser::create([
            'user_id' => $authorId,
            'event_id' => $event->id,
        ]);

        return redirect()->route('home');

    }

    public function show($id) {
        $events=Event::all();
        $userEvents = Event::query()->where('user_id', '=', Auth::id())->get();
        $event = Event::query()->find($id);
        if (!$event) {
            return response()->json(['success' => false , 'message' => 'Event does not exist']);
        }
        response()->json(['error' => 'null', 'event' => new EventResource($event)]);
        $users = $event->users();

        return view('event', compact('event', 'users', 'events', 'userEvents'));

    }


    public function addParticipant(Request $request) {
        $event = $request->get('event');
        $participant = Auth::id();

        EventUser::firstOrCreate([
            'event_id' => $event,
            'user_id' => $participant,
        ]);

        return back();

    }

    public function destroy(Request $request)
    {
        $event=$request->input('event');
        Event::destroy($event);
        return redirect()->route('home');
    }

    public function destroyParticipant(Request $request) {

        $userId = $request->input('user');
        $eventId = $request->input('event');
        $data = EventUser::query()->where('user_id', '=', $userId)->where('event_id', '=', $eventId)->get();

       $events = EventUserResource::collection($data);

        $eventIds=[];
        foreach($events as $event) {
            $eventIds[] = $event->id;

        }

       EventUser::destroy($eventIds[0]);

       return redirect()->route('home');

    }



}
