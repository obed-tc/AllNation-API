<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locality;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LocalityController extends Controller
{
    public function index(Request $request, $regionId)
    {
        try {
            $query = Locality::with('region.country')
                ->where('region_id', $regionId);

            if ($request->has('search')) {
                $search = $request->search;
                $query->whereRaw("unaccent(name) ILIKE unaccent(?)", ["%{$search}%"]);
            }

            $limit = $request->input('limit', 10);
            $localities = $query->limit($limit)->get(['id', 'name', 'region_id']);

            $localities = $localities->map(function ($locality) {
                return [
                    'id' => $locality->id,
                    'name' => $locality->name,
                    'region_name' => $locality->region->name ?? null,
                    'country_name' => $locality->region->country->name ?? null,
                ];
            });

            return response()->json($localities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener las localidades.'], 500);
        }
    }

    public function getAllLocalities(Request $request, $countryId)
    {
        try {
            $query = Locality::with('region.country')
                ->whereHas('region', function ($query) use ($countryId) {
                    $query->where('country_id', $countryId);
                });

            if ($request->has('search')) {
                $search = $request->search;
                $query->whereRaw("unaccent(name) ILIKE unaccent(?)", ["%{$search}%"]);
            }

            $limit = $request->input('limit', 10);
            $localities = $query->limit($limit)->get(['id', 'name', 'region_id']);

            $localities = $localities->map(function ($locality) {
                return [
                    'id' => $locality->id,
                    'name' => $locality->name,
                    'region_name' => $locality->region->name ?? null,
                    'country_name' => $locality->region->country->name ?? null,
                ];
            });

            return response()->json($localities);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener las localidades.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $locality = Locality::with('region.country')->findOrFail($id);
            return response()->json([
                'id' => $locality->id,
                'name' => $locality->name,
                'region_name' => $locality->region->name ?? null,
                'country_name' => $locality->region->country->name ?? null,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Localidad no encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener la localidad.'], 500);
        }
    }
}
