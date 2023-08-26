<?php

namespace App\Services;

use App\Notifications\AlarmNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AlarmService
{
    private const ALARM_STATUS = 'Activate';
    protected int $regionId;
    protected bool $isAlarm;
    public function __construct(Request $request)
    {
        $status = $request->input('status');
        $this->regionId = $request->input('regionId');

        $this->isAlarm = $status === self::ALARM_STATUS;
    }

    public function handler()
    {
        $region = $this->getreregion();

        if ($region) {
            Notification::send('', new AlarmNotification($region['telegram_id'], $region['name'], $this->isAlarm));
        }

        return response()->json([
            'success' => true,
        ]);
    }

    private function getreregion()
    {
        return match ($this->regionId) {
            18 => [
                'name' => 'Одеська область',
                'telegram_id' => -1001874852180
            ],
            19 => [
                'name' => 'Полтавська область',
                'telegram_id' => -1001874852180
            ],
            default => false
        };
    }

}
