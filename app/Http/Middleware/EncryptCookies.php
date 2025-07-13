<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    // إذا عندك ملفات تريد استثنائها من التشفير تضيفها هنا في مصفوفة $except
    protected $except = [
        //
    ];
}
