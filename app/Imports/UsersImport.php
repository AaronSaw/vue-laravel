<?php

namespace App\Imports;

use App\Models\Excel;
use App\Models\Product;
use PhpOffice\PhpSpreadsheet\Shared\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Classes\PHPExcel_Worksheet_Drawing;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model($row)
    {

        //dd($row);


        //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet =  \PhpOffice\PhpSpreadsheet\IOFactory::load(request()->file('excel'));
        //$i = 0;
        //$spreadsheet=$row['0'];
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetArray = $worksheet->toArray();
        array_shift($worksheetArray);
//dd(count($worksheetArray));
        foreach ($worksheetArray as $key => $value) {

//            $worksheet = $spreadsheet->getActiveSheet();
//            $drawing = $worksheet->getDrawingCollection()[$key];
//
//            $zipReader = fopen($drawing->getPath(), 'r');
//            $imageContents = '';
//            while (!feof($zipReader)) {
//                $imageContents .= fread($zipReader, 1024);
//            }
//            fclose($zipReader);
//            $extension = $drawing->getExtension();

            Excel::create([
                'media_id' => 0,
                'image' => 'hla',
            ]);
        }
    }
}


//        if (!empty($sheetData)) {
//            for ($i=1; $i<count($sheetData); $i++) {
//                $drawing = $worksheet->getDrawingCollection()[$i];
//                if ($drawing instanceof MemoryDrawing) {
//                    ob_start();
//                    call_user_func(
//                        $drawing->getRenderingFunction(),
//                        $drawing->getImageResource()
//                    );
//                    $imageContents = ob_get_contents();
//                    ob_end_clean();
//                    switch ($drawing->getMimeType()) {
//                        case MemoryDrawing::MIMETYPE_PNG:
//                            $extension = 'png';
//                            break;
//                        case MemoryDrawing::MIMETYPE_GIF:
//                            $extension = 'gif';
//                            break;
//                        case MemoryDrawing::MIMETYPE_JPEG:
//                            $extension = 'jpg';
//                            break;
//                    }
//                } else {
//                    $zipReader = fopen($drawing->getPath(), 'r');
//                    $imageContents = '';
//                    while (!feof($zipReader)) {
//                        $imageContents .= fread($zipReader, 1024);
//                    }
//                    fclose($zipReader);
//                    $extension = $drawing->getExtension();
//                }
//
//                $myFileName = '00_Image_' . uniqid() . '.' . $extension;
//                //dd($myFileName);
//                Storage::put('public/' . $myFileName, file_get_contents($drawing->getPath()));
//                $product = Product::create([
//                    'description' => $sheetData[$i]['1'],
//                ]);
//                Excel::create([
//                    'media_id' => $product->id,
//                    'image' => $myFileName,
//                    'created_at' => $product->created_at,
//                ]);
//            }
//              return $product;
//        }
//    }
//}
//
//    //dd($row);
//        //$imageData = file_get_contents($row['0']);
//        //$base64Image = base64_encode($imageData);
//        //return new Excel([
//        //    'image'=>$base64Image,
//        //]);
