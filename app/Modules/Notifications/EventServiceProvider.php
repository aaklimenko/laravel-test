<?php

namespace App\Modules\Notifications;

use App\Events\PrivateMessageEvent;
use App\Events\UserRegisterEvent;


use App\Events\UserSendFeedbackEvent;
use App\Modules\Notifications\Email\TemplateProviders\DatabaseTemplateProviderProvider;
use App\Modules\Notifications\Email\TemplateProviders\TemplateProvider;
use App\Modules\Notifications\Email\NotificationProcessors\SendConfirmEmailNotification;
use App\Modules\Notifications\Email\NotificationProcessors\SendFeedbackEmailNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Modules\Notifications\Browser\NotificationProcessors\SendPrivateMessageNotification as SendPrivateMessageBrowserNotification;
use App\Modules\Notifications\Mobile\NotificationProcessors\SendPrivateMessageNotification as SendPrivateMessageMobileNotification;
/**
 * Class EventServiceProvider
 * @package App\Modules\Notifications
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the module.
     *
     * @var array
     */
    protected $listen = [

        UserRegisterEvent::class => [
            SendConfirmEmailNotification::class
        ],

        UserSendFeedbackEvent::class => [
          SendFeedbackEmailNotification::class
        ],

        PrivateMessageEvent::class => [
            SendPrivateMessageBrowserNotification::class,
            SendPrivateMessageMobileNotification::class
        ]
    ];

    public function boot()
    {
        $this->app->bind(TemplateProvider::class, function($app) {
            return new DatabaseTemplateProviderProvider();
        });

        parent::boot();
    }
}
