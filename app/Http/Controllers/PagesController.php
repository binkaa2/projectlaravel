<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'index page';
        return view('pages.index', [
            'title' => $title
        ]);
    }

    public function about(){
        return view('pages.about');
    }

    public function test(){
        return 'hello';
    }

    public function service(){
        $data = array(
            'title'     => 'services',
            'services'  => ['dichvu1', 'dichvu2', 'dichvu3']
        );
        return view('pages.service')->with($data);
    }
}
