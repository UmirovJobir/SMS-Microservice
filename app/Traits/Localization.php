<?php

namespace App\Traits;

trait Localization
{
    public static function column($column, $asName=null){
        $lang = app()->getLocale();
        $asName  = $asName??$column;
        return "{$column}->{$lang} as {$asName}";
    }

    public static function languageList() {
        $languages = config('app.languages');
        $lang = [];
        foreach ($languages as $id => $language) {
            $lang[] = [
                'id' => $id,
                'name' => $language
            ];
        }
        return $lang;
    }
}
