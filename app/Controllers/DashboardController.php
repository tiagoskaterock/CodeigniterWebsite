<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    function index() {  
        $title = "Dashboard";      
        return view('Dashboard/index', compact('title'));
    }

}
