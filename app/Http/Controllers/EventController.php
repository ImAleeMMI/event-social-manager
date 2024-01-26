<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

class EventController extends Controller
{
    public function index()
    {
        //Recupera tutti gli eventi del database utilizzando il modello Event
        $events = Event::all() ?? [];
        //Restituisce la vista 'index', passando i dati degli eventii alla vista
        return view('index', compact('events'));
    }

    public function show($id)
    {
        //Ritornano i dati del evento con $id = id
        $event = Event::findOrFail($id);
        $users = $event->users;
        return view('show', compact('event', 'users'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(EventRequest $request)
    {
        $userAuth = Auth::user();
        $data = $request->validated();

        $data['user_id'] = $userAuth->id;

        $event = Event::create($data);

        return redirect()->route('show', ['id' => $event->id]);
    }

    public function edit($id)
    {
        $userAuth = Auth::user();
        // dd($userAuth);

        $event = Event::find($id);
        // dd($event->user);
        if ($userAuth->id === $event->user_id) {
            return view('edit', compact('event'));
        } else {
            return redirect()->route('show', ['id' => $event->id]);
        }
    }

    public function update(EventRequest $request, $id)
    {
        $userAuth = Auth::user();
        $data = $request->validated();

        $event = Event::findOrFail($id);

        if ($userAuth->id === $event->user_id) {
            $event->update($data);
            return view('show', compact('event'));
        }
    }

    public function destroy($id)
    {
        $userAuth = Auth::user();

        $event = Event::findOrFail($id);

        if ($userAuth->id === $event->user_id) {

            foreach ($event->products as $product) {
                $product->delete();
            }

            $event->delete();
            $events = Event::all();
            return view('index', compact('events'));
        }
    }
    public function subscription($id)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);
        $subscriptions = $user->subscriptions;
        $event = Event::find($id);
        $exist = $subscriptions->firstWhere('id', $id);

        if (!empty($exist)) {
            return back()->withErrors([
                'exist' => 'Ti sei già iscritto'
            ]);
        }
        $event->users()->attach($userAuth->id);
        return redirect()->route('show', ['id' => $id]);
    }

    public function unsubscription($id)
    {
        $userAuth = Auth::user();
        $user = User::find($userAuth->id);
        $subscriptions = $user->subscriptions;
        $event = Event::find($id);

        $exist = $subscriptions->firstWhere('id', $id);

        if (empty($exist)) {
            return back()->withErrors([
                'not_exist' => 'Non sei iscritto a questo evento'
            ]);
        }

        $event->users()->detach($userAuth->id);

        return redirect()->route('show', ['id' => $id]);
    }
}
