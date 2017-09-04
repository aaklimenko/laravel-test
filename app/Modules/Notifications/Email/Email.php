<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 22:35
 */

namespace App\Modules\Notifications\Email;

use App\Modules\Notifications\Email\TemplateProviders\TemplateProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

abstract class Email extends Mailable
{
    const rawTemplate = 'notifications.email.raw';

    use Queueable, SerializesModels;

    public $rawContent;

    public function markdown($view, array $data = [])
    {
        if($existingTemplate = resolve(TemplateProvider::class)->getTemplate($view)) {

            $this->viewData = array_merge($this->viewData, $data);

            $this->rawContent = view(['template' => $existingTemplate], $this->buildViewData())->render();

            return parent::markdown(self::rawTemplate, $data);
        }

        return parent::markdown($view, $data);

    }
}