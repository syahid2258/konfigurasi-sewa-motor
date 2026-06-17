<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Category;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::with('category')->get();
        return view('admin.motors.index', compact('motors'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.motors.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'rating' => 'numeric|min:0|max:5',
            'price' => 'required|string',
            'status' => 'required|string',
            'description' => 'required|string',
            'fuel_capacity' => 'nullable|string',
            'transmission' => 'nullable|string',
            'engine_capacity' => 'nullable|string',
            'is_available' => 'boolean'
        ]);

        $data['is_available'] = $request->has('is_available');

        Motor::create($data);

        return redirect()->route('admin.motors.index')->with('success', 'Motor berhasil ditambahkan');
    }

    public function edit(Motor $motor)
    {
        $categories = Category::all();
        return view('admin.motors.edit', compact('motor', 'categories'));
    }

    public function update(Request $request, Motor $motor)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'image' => 'required|url',
            'rating' => 'numeric|min:0|max:5',
            'price' => 'required|string',
            'status' => 'required|string',
            'description' => 'required|string',
            'fuel_capacity' => 'nullable|string',
            'transmission' => 'nullable|string',
            'engine_capacity' => 'nullable|string',
            'is_available' => 'boolean'
        ]);

        $data['is_available'] = $request->has('is_available');

        $motor->update($data);

        return redirect()->route('admin.motors.index')->with('success', 'Motor berhasil diupdate');
    }

    public function destroy(Motor $motor)
    {
        $motor->delete();
        return redirect()->route('admin.motors.index')->with('success', 'Motor berhasil dihapus');
    }
}
