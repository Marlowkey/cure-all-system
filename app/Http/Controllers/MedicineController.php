<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{

    public function index()
    {
        $medicines = Medicine::simplePaginate(10);
        return view('medicine.index', compact('medicines'));
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.show', compact('medicine'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    public function store(Request $request)
    {
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->code = $request->code;
        $medicine->description = $request->description;
        $medicine->brand = $request->brand;
        $medicine->price = $request->price;
        $medicine->quantity = $request->quantity;
        $medicine->image_path = $request->image_path;
        $medicine->save();
        return redirect()->route('medicine.index');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::find($id);
        $medicine->name = $request->name;
        $medicine->code = $request->code;
        $medicine->description = $request->description;
        $medicine->brand = $request->brand;
        $medicine->price = $request->price;
        $medicine->quantity = $request->quantity;
        $medicine->image_path = $request->image_path;
        $medicine->save();
        return redirect()->route('medicine.index');
    }

    public function destroy($id)
    {
        $medicine = Medicine::find($id);
        $medicine->delete();
        return redirect()->route('medicine.index');
    }
}
