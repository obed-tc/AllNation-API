<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function index($countryId, Request $request)
    {
        $request->validate([
            'limit' => 'sometimes|integer|min:1',
            'search' => 'sometimes|string|max:255',
        ]);

        $query = Region::with(['country', 'administrativeType'])
            ->where('country_id', $countryId);

        if ($request->has('search')) {
            $query->where('name', 'ILIKE', '%' . $request->search . '%');
        }

        if ($request->has('limit')) {
            $regions = $query->limit($request->limit)->get();
        } else {
            $regions = $query->get();
        }

        $formattedRegions = $regions->map(function ($region) {
            return [
                'id' => $region->id,
                'country_id' => $region->country_id,
                'administrative_type_id' => $region->administrative_type_id,
                'region_name' => $region->name,
                'country_name' => $region->country->name,
                'administrative_type_name' => $region->administrativeType->name,
            ];
        });

        return response()->json($formattedRegions);
    }
    public function show($id)
    {
        $region = Region::with(['country', 'administrativeType'])->findOrFail($id);
        return response()->json($region);
    }


}
