<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $limit = (int) $request->query('limit', 10);

        $query = Country::select('id', 'name', 'iso_code');

        if (!empty($search)) {
            $search = trim($search);

            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                    ->orWhereRaw('LOWER(iso_code) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        $countries = $query->take($limit)->get();

        return response()->json($countries);
    }

    public function show($id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }



}
