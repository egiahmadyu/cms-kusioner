<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\NotaDinas;
use App\Models\StorageLocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

      // dd($data);
      $data['sangat_puas'] = Answer::where('answer', 'like', '%SANGAT PUAS%')->count();
      $data['puas'] = Answer::where('answer', 'like', '%PUAS%')->count();
      $data['tidak_puas'] = Answer::where('answer', 'like', '%TIDAK PUAS%')->count();
      $data['total_kuesioner'] =  $data['sangat_puas'] + $data['puas'] + $data['tidak_puas'];

      return view('pages.dashboard.index', $data);
    }
}
