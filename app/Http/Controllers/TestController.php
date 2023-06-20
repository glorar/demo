<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testMethod(Request $request, $id)
    {
        $string = $request->input('model', 'tree');

        return 'id model: ' . $string;
    }
}
