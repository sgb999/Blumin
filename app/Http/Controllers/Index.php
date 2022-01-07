<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Index extends Controller
{
    public static function home()
    {
        $page_title = "Fictitious Limited - CRM";
        return view('admin.pages.home', compact(['page_title']));
    }
}
