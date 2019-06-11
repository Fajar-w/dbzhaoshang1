<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mews\Captcha\Captcha;

class CaptchasController extends Controller
{
    public function Captchas(Captcha $captcha,$config='default')
    {
        return $captcha->create($config);
    }
}
