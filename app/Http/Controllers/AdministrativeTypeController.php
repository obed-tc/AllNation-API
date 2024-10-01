<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrativeType;
class AdministrativeTypeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $limit = (int) $request->query('limit', 10);


        $query = AdministrativeType::select('id', 'name');

        if (!empty($search)) {
            $search = trim($search);

            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        $administrativeTypes = $query->take($limit)->get();

        return response()->json($administrativeTypes);
    }

    public function show($id)
    {
        $type = AdministrativeType::findOrFail($id);
        return response()->json($type);
    }


}
