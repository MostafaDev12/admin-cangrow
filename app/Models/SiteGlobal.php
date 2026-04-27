<?php

namespace App\Models;

class SiteGlobal
{
    public array $content = [];
    public array $images = [];

    public function t($key, $default = '')
    {
        $value = data_get($this->content, $key);

        return $value === null || $value === '' ? $default : $value;
    }

    public function image($key, $default = '')
    {
        $value = data_get($this->images, $key);

        if ($value) {
            return $value;
        }

        return $default !== '' ? $default : asset('dummy/' . $key . '.jpg');
    }
}
