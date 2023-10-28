<?php

namespace App\Http\Controllers;

use App\Services\Zoom\Zoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ZoomController extends Controller
{
    public function userInfo()
    {
        return Zoom::user()->me();
    }

    public function meetings()
    {
        return Zoom::meeting()->all();
    }

    public function meetingCreate(Request $request)
    {
        return Zoom::meeting()->create($request->all());
    }

    public function meetingUpdate(Request $request, $id)
    {
        return Zoom::meeting()->update($request->all(), $id);
    }

    public function meetingDelete($id)
    {
        return Zoom::meeting()->delete($id);
    }
}
