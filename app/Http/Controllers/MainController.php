<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('dashboard')->with([
            'applications' => Applications::paginate(10),
        ]);
    }

}
