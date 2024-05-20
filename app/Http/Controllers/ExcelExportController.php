<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\TypeKuesioner;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExcelExportController extends Controller
{
    public function export() {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Pertanyaan');
        $type_kuesioner = TypeKuesioner::first();
        $num = 2;
        $column_answer = array();
        $start_col = 'C';
        foreach ($type_kuesioner->question as $key => $value) {
            $push = array(
                $value->id => $start_col
            );
            $column_answer = $column_answer + $push;

            $start_col++;
            $sheet->setCellValue('B'.$num, $value->question);
            $sheet->setCellValue('A'.$num, $key+1);
            $num++;
        }
        $num++;
        $num++;
        $num++;
       
        $sheet->setCellValue('A'.$num, 'No Whatsapp');
        $sheet->setCellValue('B'.$num, 'Nama');
        // $start = ''
        foreach ($column_answer as $key => $value) {
            $sheet->setCellValue($value.$num, 'Pertanyaan '.$key);
        }
        $num++;
        $answer = Answer::select('customer_id', DB::raw('hour(answers.created_at) as jam'))
        ->join('questions', 'answers.question_id', '=', 'questions.id')
        ->where('questions.type_kuesioner_id', $type_kuesioner->id)
        ->groupBy('customer_id', 'jam')->get();
        foreach ($answer as $key => $value) {
            $list = Answer::select('answers.*', DB::raw('hour(answers.created_at) as jam'))
            ->where('customer_id', $value->customer_id)
            ->having('jam', $value->jam)
            ->join('questions', 'answers.question_id', '=', 'questions.id')
            ->where('questions.type_kuesioner_id', $type_kuesioner->id)
            ->get();

            $sheet->setCellValue('A'.$num, $value->customer->no_hp);
            $sheet->setCellValue('B'.$num, $value->customer->nama);
            foreach ($list as $keyy => $valuej) {
                $sheet->setCellValue($column_answer[$valuej->question_id].$num, $valuej->answer);
            }
           $num++;
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('hello_world.xlsx');
    }
}
