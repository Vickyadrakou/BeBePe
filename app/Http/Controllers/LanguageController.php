<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Swap the application locale.
     *
     * @param  string  $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($locale)
    {
        if (! in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        Session::put('locale', $locale);
        App::setLocale($locale);

        return redirect()->back();
    }
}
