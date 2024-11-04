<?php

namespace App\Exports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MedicineExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Medicine::select('name', 'code', 'description', 'brand', 'price', 'quantity')->get();
    }

    public function headings(): array
    {
        return [
            'Name', 'Code', 'Description', 'Brand', 'Price', 'Quantity'
        ];
    }
}
