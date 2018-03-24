<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AlterarSenha;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$user = auth()->user();
        //Mail::to($user)->send(new AlterarSenha($user));

        return view('home');
    }
}
