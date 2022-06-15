<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileColumn;
use App\Models\FileData;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;


class ImportController extends Controller
{
    public function import(Request $request)
    {
        $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
        if (in_array($_FILES["file"]["type"], $allowedFileType)) {
            $filename = $request->file('file')->getClientOriginalName();

            $path = $request->file('file')->getRealPath();
            $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadSheet = $Reader->load($path);
            $excelSheet = $spreadSheet->getActiveSheet();
            $spreadSheetAry = $excelSheet->toArray();
//            dd($spreadSheetAry);
            $sheetCount = count($spreadSheetAry);

            $file = File::create([
                'name' => $filename,
            ]);
            foreach ($spreadSheetAry[0] as $key => $columnName) {
//                dd($columnName,$key);
                $fileColumn = FileColumn::create([
                    'file_id' => $file->id,
                    'name' => $columnName
                ]);
                for ($i = 1; $i < $sheetCount; $i++) {
//                       dd($spreadSheetAry[$i][$key]);
                       if ($spreadSheetAry[$i][$key]){
                           $filedata = FileData::create([
                               'column_id' => $fileColumn->id,
                               'data' => $spreadSheetAry[$i][$key]
                           ]);
                       }
                }

            }

            dd('file upload');


        }


    }
}
