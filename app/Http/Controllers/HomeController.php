<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abudaud;
use App\Ahmad;
use App\Bukhari;
use App\Malik;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
}
