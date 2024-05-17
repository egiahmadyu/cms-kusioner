<?php

namespace App\Http\Controllers;

use App\Models\NotaDinas;
use App\Models\StorageLocation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

      // dd($data);

      return view('pages.dashboard.index');
    }
}
