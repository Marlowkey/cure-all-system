<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Redirect;


class MedicineController extends Controller
{

    public function index()
    {
        $medicines = Medicine::latest()->simplePaginate(8);
        return view('medicines.index', compact('medicines'));
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.show', compact('medicine'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:medicines,code',
            'description' => 'nullable|string',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('medicines', 'public');
            $validatedData['image_path'] = $imagePath;
        }
        Medicine::create($validatedData);

        return redirect()->route('medicines.index')->with('success', 'Medicine added successfully.');
    }


    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:100|unique:medicines,code,' . $id, // Ignore the current record
            'description' => 'nullable|string',
            'brand' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $medicine = Medicine::findOrFail($id);
        $medicine->fill($validatedData);
        $medicine->save();

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully.');
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect()->route('medicines.index');
    }

    public function updateMedicineImage(Request $request, $id)
    {
        $request->validate([
            'image_path' => ['required', File::types(['png', 'jpg', 'webp'])],
        ]);

        $medicine = Medicine::find($id);
        $imagePath = $request->file('image_path')->store('medicines', 'public');
        $medicine->image_path = $imagePath;
        $medicine->save();

        return Redirect::route('medicines.index')->with('success', 'Medicine updated');
    }
}
