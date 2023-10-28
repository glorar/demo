<?php

namespace App\Services\Zoom;

class ZoomMeeting extends Zoom
{
    public function all()
    {
        $path = '/users/me/meetings';

        return $this->request()->get($path);
    }

    public function create(array $params)
    {
        $path = '/users/me/meetings';

        $parameters = array_merge(config('zoom.meeting.params'), $params);

        return $this->request()->post($path, $parameters);
    }

    public function update(array $params, string $meetingId)
    {
        $path = '/meetings/' . $meetingId;

        return $this->request()->patch($path, $params);
    }

    public function delete(string $meetingId)
    {
        $path = '/meetings/' . $meetingId;

        return $this->request()->delete($path);
    }

}
