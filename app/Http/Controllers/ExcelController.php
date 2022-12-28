<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\Excel;
use App\Models\Product;
use Maatwebsite\Excel\Classes\PHPExcel_Worksheet_Drawing;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Facades\Excel as Fol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Cell\Cell;

class ExcelController extends Controller
{
    public function index()
    {
        $hla = Excel::all();
        // return $hla;
        return view('excel', compact('hla'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'required|mimes:png,jpg',
        ]);
        foreach ($request->file('image') as $key => $image) {
            $excel = new Excel();
            $newName = uniqid() . "_image." . $image->extension();
            $image->storeAs("public", $newName);
            $excel->image = $newName;
            $excel->save();
        }
        $hla = Excel::all();
        return view('excel', compact('hla'));
    }
    public function delete($id)
    {
        $excel = Excel::find($id);
        $excel->delete();
        return view('excel');
    }

    public function import(Request $request)
    {
        $spreadsheet =  \PhpOffice\PhpSpreadsheet\IOFactory::load($request->file('excel'));
        //validation

        //insert image and text to database
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetArray = $worksheet->toArray();
        if (!empty($worksheetArray)) {
            foreach ($worksheetArray as $key => $value) {
                $worksheet = $spreadsheet->getActiveSheet();
                $drawing = $worksheet->getDrawingCollection()[$key];
                $zipReader = fopen($drawing->getPath(), 'r');
                $imageContents = '';
                while (!feof($zipReader)) {
                    $imageContents .= fread($zipReader, 1024);
                }
                fclose($zipReader);
                $extension = $drawing->getExtension();

                $myFileName = '00_Image_' . uniqid() . '.' . $extension;
                //dd($myFileName);
                Storage::put('public/' . $myFileName, file_get_contents($drawing->getPath()));
                $product = Product::create([
                    'description' => $value[1],
                ]);
                Excel::create([
                    'media_id' => $product->id,
                    'image' => $myFileName,
                ]);
            }
        } else {
            dd('this file is empty');
        }
    }

    public function export()
    {
        return Fol::download(new UsersExport, 'users.xlsx');
    }
}
