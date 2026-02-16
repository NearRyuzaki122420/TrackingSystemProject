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
            'trackings' => Tracking::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        Tracking::create($request->validate([
            'tracking_number' => 'required',
            'customer_name' => 'required',
            'status' => 'required',
        ]));

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $tracking = Tracking::findOrFail($id);

        $tracking->update($request->validate([
            'tracking_number' => 'required',
            'customer_name' => 'required',
            'status' => 'required',
        ]));

        return redirect()->back();
    }

public function destroy($id)
{
    $tracking = Tracking::findOrFail($id)->delete();

    // SPA-friendly response: no page reload, no redirect
    return response()->json(['success' => true]);
}



    public function show($id)
{
    $tracking = Tracking::findOrFail($id);
    return Inertia::render('TrackingShow', ['tracking' => $tracking]);
}

}
