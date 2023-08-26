<?php

namespace App\Http\Controllers;

use App\Services\AlarmService;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    public function index(Request $request)
    {
        return (new AlarmService($request))->handler();
    }
}
