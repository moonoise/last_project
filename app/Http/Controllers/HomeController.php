<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\app_content;

class HomeController extends Controller
{


    public function show() {
        $v = app_content::all();
        $arrContent = array();
        foreach ($v as $key => $value) {
            $arrContent[$value->contentname] =  $value->contentvalue;
        }
        // $content_title = app_content::where('contentname','=','content_title')->first();
        return view('home',compact('arrContent'));
    }

    public function off(){
        $v = app_content::all();
        $arrContent = array();
        foreach ($v as $key => $value) {
            $arrContent[$value->contentname] =  $value->contentvalue;
        }
        return view('off',compact('arrContent'));
    }
}
