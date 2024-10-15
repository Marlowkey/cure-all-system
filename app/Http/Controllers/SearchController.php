<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $medicines = Medicine::query()
            ->where('name', 'LIKE', '%'.request('q').'%')
            ->paginate(10); // Use paginate instead of get()

        return view('medicines.index', ['medicines' => $medicines]);
    }
}
