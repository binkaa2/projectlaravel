<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to demo project laravel [pass thru controller]';
        return view('pages.index', [
            'title' => $title
        ]);
    }

    public function about(){
        return view('pages.about');
    }
    
    public function service(){
        $data = array(
            'title'     => 'services',
            'services'  => ['dichvu1', 'dichvu2', 'dichvu3']
        );
        return view('pages.service')->with($data);
    }
}
