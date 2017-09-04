<?php

namespace App\Modules\Notifications\Email\TemplateProviders;

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 22:28
 */
interface TemplateProvider
{
    public function getTemplate(string $templateType) :string;
}