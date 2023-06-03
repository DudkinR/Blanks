<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
   
    public function index()
    {

        return view("help.about");
   
    }
    public function item($name)
    {
        // если файл существует help.$name, то отдаем его
        if (view()->exists("help." . $name)) {
            return view("help." . $name);
        } else {
            return view("help.about");
        }
    }
}
