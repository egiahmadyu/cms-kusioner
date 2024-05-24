<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\StorageLocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

      $data = [
        'sangat_puas' => Answer::where('answer','SANGAT PUAS')->count(),
        'puas' => Answer::where('answer', 'PUAS')->count(),
        'tidak_puas' => Answer::where('answer','TIDAK PUAS')->count(),
    ];
      $data['total_kuesioner'] = $data['sangat_puas'] + $data['puas'] + $data['tidak_puas'];

      $data['last_customer'] = Answer::with('customer')
      ->selectRaw('COUNT(*) as count, customer_id')
      ->where('created_at', 'like', '%' . date('Y') . '%')
      ->groupBy('customer_id')
      ->orderBy('customer_id', 'desc') // Menambahkan pengurutan berdasarkan tanggal terbaru
      ->limit(5) // Mengambil hanya satu data terbaru
      ->get();

    $months = [];

    for ($i = 1; $i <= 12; $i++) {
      $months[$i] = $i;
        $sangat_puas[$i] = 0;

        $puas[$i] = 0;

        $tidak_puas[$i] = 0;
    }

    // Mengambil data dari database dan mengelompokkannya berdasarkan bulan dan jawaban
    $answers = Answer::selectRaw('MONTH(created_at) as month, answer, COUNT(*) as count')
        ->where('answer', 'like', '%PUAS%')
        ->orWhere('answer', 'like', '%SANGAT PUAS%')
        ->orWhere('answer', 'like', '%TIDAK PUAS%')
        ->groupBy('month', 'answer')
        ->get();

    // Menggabungkan data bulan dengan jawaban
    foreach ($answers as $answer) {
        $month = $answer->month;
        if ($answer->answer == 'SANGAT PUAS') {
            $sangat_puas[$month] = $answer->count;
        } elseif ($answer->answer == 'PUAS') {
            $puas[$month] = $answer->count;
        } elseif ($answer->answer == 'TIDAK PUAS') {
            $tidak_puas[$month] = $answer->count;
        }
    }

    $data['sangat_puas_chart'] = $sangat_puas;
    $data['puas_chart'] = $puas;
    $data['tidak_puas_chart'] = $tidak_puas;
    $data['months'] = $months;
    // echo json_encode($sangat_puas);
    // die();

      return view('pages.dashboard.index', $data);
    }
}
