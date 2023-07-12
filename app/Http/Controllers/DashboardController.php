<?php

namespace App\Http\Controllers;

use App\Models\Kitab;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'page' => 'Dashboard',
            'title' => 'Dashboard',
            'kitab' => Kitab::all()
        ];
        return view('admin.dashboard',$data);
    }
}
