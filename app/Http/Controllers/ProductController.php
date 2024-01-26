<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index($eventId)
    {
        $event = Event::findOrFail($eventId);
        $products = Product::where('event_id', $eventId)->get();
        return view('show', compact('event', 'products'));
    }

    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('products.create', compact('event'));
    }

    public function store(ProductRequest $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $data = $request->validated();
        $data['event_id'] = $eventId;
        Product::create($data);
        return redirect()->route('show', ['id' => $eventId]);
    }

    public function show($eventId, $productId)
    {
        $event = Event::findOrFail($eventId);
        $product = Product::where('id', $productId)->where('event_id', $eventId)->firstOrFail();
        return view('products.show', compact('event', 'product'));
    }

    public function edit($eventId, $productId)
    {
        $userAuth = Auth::user();
        $event = Event::findOrFail($eventId);
        $product = Product::where('id', $productId)->where('event_id', $eventId)->firstOrFail();

        if ($userAuth->id === $event->user_id) {
            return view('products.edit', compact('event', 'product'));
        }
        return redirect()->route('show' , ['id' => $event->id]);
    }

    public function update(ProductRequest $request, $eventId, $productId)
    {
        $userAuth = Auth::user();

        $event = Event::findOrFail($eventId);

        $data = $request->validated();

        if ($userAuth->id === $event->user_id) {
            $product = Product::find($productId)->update($data);
            return view('show', compact('event', 'product'));
        }
        return redirect()->route('show',['id' => $eventId], ['id' => $productId]);
    }

    public function destroy($eventId, $productId)
    {
        $userAuth = Auth::user();
        $event = Event::findOrFail($eventId);

        if ($userAuth->id === $event->user_id) {
        }

        Product::where('id', $productId)->where('event_id', $eventId)->delete();
        return redirect()->route('products.index', ['id' => $eventId]);
    }
}
