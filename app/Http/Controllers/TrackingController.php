<?php

namespace App\Http\Controllers;

use App\Models\Tracking;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TrackingController extends Controller
{
    public function index()
    {
        return Inertia::render('Tracking', [
            'trackings' => Tracking::latest()->get(),
        ]);
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'tracking_number' => 'required',
        'customer_name'   => 'required',
        'status'          => 'required',
    ]);

    Tracking::create($data);

    return redirect()->back()->setStatusCode(303);
}

public function update(Request $request, Tracking $tracking)
{
    $data = $request->validate([
        'tracking_number' => 'required',
        'customer_name'   => 'required',
        'status'          => 'required',
    ]);

    $tracking->update($data);

    return redirect()->back()->setStatusCode(303);
}

public function destroy(Tracking $tracking)
{
    $tracking->delete();

    return redirect()->back()->setStatusCode(303);
    }
}