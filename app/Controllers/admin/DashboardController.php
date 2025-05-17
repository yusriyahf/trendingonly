<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\ProductModel;
use App\Models\SliderModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard/index');
    }
}
