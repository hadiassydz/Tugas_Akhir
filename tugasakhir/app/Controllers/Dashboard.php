<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    // Dashboard peta (yang sudah ada)
    public function index()
    {
        return view('dashboard_iframe');
    }

    // Dashboard umum (dashboard Flask)
    public function dashboard_umum()
    {
        return view('dashboard_umum');
    }

    public function dashboard_analisis()
    {
        return view('dashboard_analisis');
    }

}