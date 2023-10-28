<?php

namespace App\Services\Zoom;

class ZoomUser extends Zoom
{
    public function me()
    {
        $path = '/users/me';

        return $this->request()->get($path);
    }

}
