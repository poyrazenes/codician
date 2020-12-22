<?php

namespace App\Http\Controllers;

use App\Address;

class MapController extends Controller
{
    public function show($id)
    {
        $address = Address::findOrFail($id);

        return view('map', compact('address'));
    }
}
