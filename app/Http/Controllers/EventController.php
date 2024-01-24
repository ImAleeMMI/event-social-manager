<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index()
    {   
        //Recupera tutti gli eventi del database utilizzando il modello Event
        $events = Event::all();

        //Restituisce la vista 'index', passando i dati degli eventii alla vista
        return view('index', compact('events'));
    }

    public function show($id)
    {
        //Ritornano i dati del evento con $id = id
        $event = Event::findOrFail($id);

        return view('show', compact('event'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $event = Event::create($data);

        return redirect()->route('show', ['id' => $event->id]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('edit', compact('event'));
    }

    public function update(EventRequest $request, $id)
    {
        $data = $request->validated();

        $event = Event::findOrFail($id);
        $event->update($data);

        return redirect()->route('show', ['id' => $id]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect()->route('index');
    }
}
