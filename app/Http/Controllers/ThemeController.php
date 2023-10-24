<?php

namespace App\Http\Controllers;

class ThemeController extends Controller
{
    public function switch($mode)
    {
        if ($mode == 'dark' || $mode == 'light') {
            session(['theme' => $mode]);
            return 'switching theme to ' . $mode;
        } else {
            return redirect('/');
        }
    }
}
