<?php

namespace App\Services\Zoom;

class Zoom
{
    public static function user()
    {
        return new ZoomUser();
    }

    public static function meeting()
    {
        return new ZoomMeeting();
    }

    protected function request()
    {
        return new ZoomRequest();
    }
}
