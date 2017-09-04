<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 9/4/17
 * Time: 22:31
 */

namespace App\Modules\Notifications\Email\TemplateProviders;


use Illuminate\Support\Facades\DB;

class DatabaseTemplateProviderProvider implements TemplateProvider
{

    public function getTemplate(string $templateType) :string
    {
        return $this->getTemplateStringFromDatabase($templateType);
    }

    private function getTemplateStringFromDatabase($templateType) :string
    {
        $record = DB::table('email_templates')
            ->where('type', $templateType)
            ->where('is_active', true)
            ->first();

        if($record){
            return $record->template;
        }

        return false;
    }

}