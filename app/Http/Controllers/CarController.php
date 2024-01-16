<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    // public function index(Request $request)
    // {
    //     $search = '%'.$request->query('search').'%';
    //     $cars = Car::when($request->filled('search'), function($q) use($search) {
    //         $q->where('merek', 'like', $search)->oRwhere('model', 'like', $search);
    //     })->where('status', $request->query('status'))->latest()->paginate(10);
    //     return view('cars.index',compact('cars'));
    // }

    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $cars = Car::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('merek', 'like', "%$search%")
                    ->orWhere('model', 'like', "%$search%")
                    ->orWhere('warna', 'like', "%$search%")
                    ->orWhere('plat_nomor', 'like', "%$search%");
            });
        })
        ->paginate(10);

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required',
            'status' => 'default',
        ]);

        Car::create($request->all());

        return to_route('cars.index')
            ->with('success','Cars created successfully.');
    }

    public function show(Car $car)
    {
        return view('cars.show',compact('car'));
    }

    public function edit(Car $car)
    {
        return view('cars.edit',compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'tahun' => 'required',
            'warna' => 'required',
            'plat_nomor' => 'required',
            'harga_sewa' => 'required',
            'status' => 'default',
        ]);

        $car->update($validated);

        return to_route('cars.index')
            ->with('success','Cars updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return to_route('cars.index')
            ->with('success','Cars deleted successfully');
    }
}
