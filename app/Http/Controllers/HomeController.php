<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AlterarSenha;
use Mail;
use Ixudra\Curl\Facades\Curl;

use App\Helpers\User as UserHelper;

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

        UserHelper::setUserInformations();

        $ACCESS_TOKEN = "APP_USR-7942076642174757-032409-1c3f83ba6174ff8030f1886020de51cf-118688227";

        $itens = "'https://api.mercadolibre.com/items";

        $produtos = 'https://api.mercadolibre.com/items/MLA600190449';

        $site= "https://api.mercadolibre.com/sites/MLB/search?seller_id=118688227&access_token=$ACCESS_TOKEN";

        $minhainformacoes = "https://api.mercadolibre.com/users/me?access_token=$ACCESS_TOKEN";

        $response = Curl::to($site )
        ->get();

        $data = json_decode($response, true);

        dd($data);



        return view('home');
    }
}
