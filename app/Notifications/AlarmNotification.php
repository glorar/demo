<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class AlarmNotification extends Notification
{
    use Queueable;

    protected string $status;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected int $telegramId, protected string $region, bool $isAlarm)
    {
        $this->status = $isAlarm
            ? '👀 повітряна тривога'
            : 'відбій повітряної тривоги';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(): array
    {
        return [TelegramChannel::class];
    }

    public function toTelegram()
    {
        return TelegramMessage::create()
            ->to($this->telegramId)
            ->content("{$this->region} {$this->status}");
    }
}
