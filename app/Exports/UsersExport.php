<?php

namespace App\Exports;

use App\Models\Excel;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;

class UsersExport implements FromView , WithDrawings ,WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.excel', [
            'invoices' => Excel::all()
        ]);
    }
    public function drawings()
    {
        $drawing =[];
        $tables=Excel::all();
        $i=2;
        foreach ($tables as $key => $tab ) {
        $fullPath = trim(storage_path() . "\app\public\ ") . $tab->image;
        $tab->image= new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $tab->image->setName('signature');
        $tab->image->setDescription('This is my signatuer');
        $tab->image->setPath($fullPath);
        $tab->image->setHeight(50);
        $tab->image->setCoordinates('B'.$i);
        $i=++$i;
        array_push($drawing,$tab->image);
        }
        return $drawing;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
        ];
    }
}
